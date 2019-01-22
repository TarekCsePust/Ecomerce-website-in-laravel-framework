<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_manage;
use App\Product_details_image;
use Cookie;
use DB;
use App\Product_review;
use App\User;
use App\Product_rating;
use Auth;
use App\Category;
use App\Product_category;
class homeController extends Controller
{
    public function index()
    {
    	$products = Product_manage::get();
        $categories = Category::get();
        $subcats = $this->getSubcategory();

       
    	 $this->cookieSet();    	
    	
    	$cart_quan = count(unserialize($_COOKIE['cart']));	
    	
    	return view('index',compact('products','cart_quan','categories','categories','subcats'));
    }


    public function addToCart(Request $request)
    {
       
    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	
    	if(array_key_exists($id."", $data))
		{

			$data[$id.""]++;
			
		}
		else
		{

			
			$data=$this->array_push_assoc($data,$id."",1);
		}
		unset($_COOKIE['cart']);
		setcookie('cart', serialize($data), time()+(86400*30));
		return count($data);
    	
    	
    }

    public function removeToCart(Request $request)
    {
        $id = $request->id;
        $data = unserialize($_COOKIE['cart']);
        
        if(array_key_exists($id."", $data))
        {

            $data[$id.""]--;
            
        }
        else
        {

            
            $data=$this->array_push_assoc($data,$id."",1);
        }
        unset($_COOKIE['cart']);
        setcookie('cart', serialize($data), time()+(86400*30));
        return count($data);
       
    }

    public function emptyCart(Request $request)
    {
    
    	setcookie('cart');
    	$cart=array();
    	setcookie('cart', serialize($cart), time()+(86400*30));
    	return 0;
    }

    public function rating(Request $request)
    {
        return "do";
    }

    public function productView($id)
    {
    	
    	$this->cookieSet();
    	$cart_quan = count(unserialize($_COOKIE['cart']));
    	$product =  Product_manage::find($id);
    	$detailsImgs =  Product_details_image::get()->where('pro_manage_id',$id);
        $reviews = Product_review::get()->where('product_id',$id);
        $product_reviews = array();
        foreach ($reviews as  $review) {
            $user = User::find($review->user_id);
            array_push($product_reviews,[
                'user_name'=>$user->name,
                'user_photo'=>$user->image,
                'review_msg'=>$review->review
            ]);
            # code...
        }

        $ratings = Product_rating::get()->where('product_id',$id);
        $rateSum = 0;
        foreach($ratings as $rating)
        {
            $rateSum+=$rating->rate;
        }
        $rating_times = count($ratings);
        if(count($ratings))
        {
            $rate_value = $rateSum/$rating_times;
            $rate_bg = (($rate_value)/5)*100;
        }
        else
        {
            $rating_times = 0;
            $rate_value = 0;
            $rate_bg = 0;
        }
        $product_rating = array("rate_times"=>$rating_times,"rate_value"=>$rate_value,
        "rate_bg"=>$rate_bg); 

        $categories = Category::get();
        $subcats = $this->getSubcategory();
        
    	
    	 return view('product_view',compact('cart_quan','product','detailsImgs','product_reviews','product_rating','categories','subcats'));
    }

    public function cookieSet()
    {
    	if(isset($_COOKIE['cart']))
    	{
    		$cart=array();
    		setcookie('cart', serialize($cart), time()+(86400*120));
    		
            return "ok";
    	}
        else
        {
            return "no";
        }
    	
    }

    public function array_push_assoc($array, $key, $value)
    {
		$array[$key] = $value;
		return $array;
	}


    public function profileView()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('user_profile',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }


  

    public function getSubcategory()
    {
        $categories = Category::get();
        $subcats = array();

        foreach($categories as $category)
        {
            
            $product_categories = Product_category::get()->where('category_id',$category->id);
            
             $scat = array();
            foreach($product_categories as $product_category)
            {
                 array_push($scat,["name"=>$product_category->pro_cat_name,
                    "id"=>$product_category->id,
                    "cate_id"=>$category->id]);
            }

              array_push($subcats,$scat);

          
          
            

        }

        return  $subcats;
    }

    public function updateProfile()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('update_profile',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function updatePassword()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('update_password',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function rechargeAccount()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('recharge_account',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function orderProducts()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('order_products',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function updatePhoto()
    {
        if(Auth::check())
        {
            $this->cookieSet();
            $cart_quan = count(unserialize($_COOKIE['cart']));
             $categories = Category::get();
             $subcats = $this->getSubcategory();
            return view('update_photo',compact('cart_quan','categories','subcats'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function show_products($id)
    {
        $products = Product_manage::get()->where('pro_cat_id',$id);
        $categories = Category::get();
        $subcats = $this->getSubcategory();

         $this->cookieSet();
        
        $cart_quan = count(unserialize($_COOKIE['cart']));
        
        return view('sub_products',compact('products','cart_quan','categories','categories','subcats'));
        
    }

    public function shipping()
    {
        if(Auth::check())
        {
             $products = Product_manage::get();
        $categories = Category::get();
        $subcats = $this->getSubcategory();
         $this->cookieSet();
        

         $cart_quan = count(unserialize($_COOKIE['cart']));
     
        $total=0;
        if(isset($_COOKIE['cart']) && $cart_quan>0)
        {
            $products = unserialize($_COOKIE['cart']);
            
            foreach ($products as $product_id => $product_quan) {
              
                $pro = Product_manage::find($product_id);
                if($pro)
                {
                   
                    if($pro->offer_price>0)
                    {
                        $total+=$pro->offer_price*$product_quan;

                    }
                    else
                    {
                        $total+=$pro->actual_price*$product_quan;
                    }
                }
                
            }

           
            
        }

        

             
        return view('shipping',compact('total','cart_quan','categories','subcats'));
        }
        else
        {
             session()->flash('msg', 'You have to login at first for checkout.');
            return redirect()->back();
        }
       

    }

    public function order(Request $request)
    {
        
    }
   
}
