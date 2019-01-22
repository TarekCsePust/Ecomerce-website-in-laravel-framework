<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use Auth;
use App\recharge_card;

class userController extends Controller
{
    public function signUp(Request $request)
    {
    	$this->validate($request,
            [ 
               'name'=>'required|max:120',
               'email'=>'required|email|unique:users',
               
               'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               'password'=>'required|min:6',
               'repassword'=>'required|min:6',
            ]
            );
    
    	$password = $request['password'];
    	$repassword =  $request['repassword'];
    	if($password==$repassword)
    	{
    		$name = $request['name'];
    		$email = $request['email'];
    		$password = bcrypt($request['password']);
    		$imageName = time().rand().'.'.request()->photo->getClientOriginalExtension();
	    	 $image = $request->file('photo');
	    	 $image_resize = Image::make($image->getRealPath()); 
	    	 $image_resize->resize(300, 300);
	    	 
	    	 $image_resize->save(public_path('storage/' .$imageName));
    		$user = new User();
	    	$user->email = $email;
	    	$user->name = $name;
	    	$user->image = $imageName;
	    	$user->password = $password;
	    	//Auth::login($user);
    	    $user->save();

    	}
    	else
    	{
            $request->session()->flash('msg', 'Registarion is not completed something was wrong your provided information try again please.');
    		return redirect()->back();
    	} 
    	
       
    	return redirect('/');
    }

    public function signIn(Request $request)
    {
    	  $this->validate($request,
            [ 
               'email'=>'required',
               'password'=>'required'
            ]
            );
    	if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
        {
            
               return redirect('/');
    
           
        }
        else
        {
            $request->session()->flash('msg', 'Email or password is wrong.');
        }
        return redirect()->back();
    }

    public function updateDetails(Request $request)
    {
        //return $request;
        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();
           
        }

         return redirect('/profile');
        
        
    }


    public function updatePassword(Request $request)
    {
        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
           
        }
        return redirect('/profile');
    }

    public function updatePhoto(Request $request)
    {
        $this->validate($request,
            [ 
               
               
               'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              
            ]
            );
        if(Auth::check())
        {
            $user = User::find(Auth::user()->id);
            if(Storage::delete('public/'.$user->image))
            {
                 $imageName = time().rand().'.'.request()->photo->getClientOriginalExtension();
                 $image = $request->file('photo');
                 $image_resize = Image::make($image->getRealPath()); 
                 $image_resize->resize(300, 300);
                 
                 $image_resize->save(public_path('storage/' .$imageName));
                $user->image = $imageName;
                 $user->save();
                    
            }
            return redirect('/profile');

               
        }
        return redirect()->back();
    }


    public function rechargeAccount(Request $request)
    {
        if(Auth::check())
        {
            $cards = recharge_card::get()->where('card_digits',$request->sec_num);
            if(count($cards))
            {
                foreach ($cards as $card) {

                    # code...
                    if(!$card->use_status)
                    {
                    $user = User::find(Auth::user()->id);
                    $valence = $user->valence + $card->amount;
                     $card->use_status = 1;
                     $card->save();
                    DB::table('users')->where('id',Auth::user()->id)->update(['valence' =>$valence]);
                   
                    //$card->save();
                    //$user->save();

                    //return $user->valence;
                    }
                    else
                    {
                        $request->session()->flash('msg', 'This card already used.');
                         return redirect()->back();
                    }
                }
              
            }
        }
        return redirect('/profile');;
        //return $request;
    }

    public function createCards()
    {
        for($i=0;$i<100;$i++)
        {
            $n = mt_rand(104001,105000);
           
            if(!$this->isCreatedCard($n))
            {
                $card = new recharge_card;
                $card->card_digits = $n;
                $card->amount = 1000;
                $card->save();
            }
            else
            {
                $i--;
            }

        }
        return "created";
    }

    public function isCreatedCard($n)
    {
         $isCreated = recharge_card::get()->where('card_digits',$n);
         if(count($isCreated))
         {
            return true;
         }
         else
         {
            return false;
         }
    }

    public function recharge(Request $request)
    {

    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
