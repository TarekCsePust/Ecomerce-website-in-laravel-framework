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

        /*foreach($categories as $category)
        {
             //return  $category;
            $product_categories = Product_category::get()->where('category_id',$category->id);
            //return  $product_categories;
             $scat = array();
            foreach($product_categories as $product_category)
            {
                 array_push($scat,["name"=>$product_category->pro_cat_name,"id"=>$product_category->id]);
            }

              array_push($subcats,$scat);

          
            //return $cats;
            

        }*/
       
       //$v = ceil(11/6);
       
      // return count($subcats[1]);
      // return $subcats;
       
       
        /*array_push($scat,["name"=>"Taek","id"=>2]);
        array_push($cat,$scat);
        $scat = array();
        array_push($scat,["name"=>"Harek","id"=>3]);
        array_push($scat,["name"=>"Maek","id"=>4]);
        array_push($cat,$scat);
        return $cat[0][0]["name"];*/
        //$product_categories = Product_category::get();
    	//return unserialize($_COOKIE['cookie']);
    	/*$a = array("blue"=>1,"blood"=>2,"1"=>5);
		$a=$this->array_push_assoc($a, "cm",3);
		$i = 1;
		if(array_key_exists($i."d", $a))
		{
			return "y";
		}
		return $a["1"];*/
    	//setcookie('cookie', serialize($info), time()+3600);
    	//unset($_COOKIE['cookie']);
    	//setcookie('cookie');
    	 $this->cookieSet();
    	
    	
    	
    	
    	$cart_quan = count(unserialize($_COOKIE['cart']));
    	
    	
    	
    	
    	return view('index',compact('products','cart_quan','categories','categories','subcats'));
    }


    public function addToCart(Request $request)
    {
        //return "Tarek";
    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	//return $data;
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
    	/*array_push($a,"blue","yellow");
    	if (in_array("Glenn", $people))
		  {
		  echo "Match found";
		  }
		else
		  {
		  echo "Match not found";
		  }*/
    	
    }

    public function removeToCart(Request $request)
    {
        //return "remove";
        $id = $request->id;
        $data = unserialize($_COOKIE['cart']);
        //return $data;
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
        /*array_push($a,"blue","yellow");
        if (in_array("Glenn", $people))
          {
          echo "Match found";
          }
        else
          {
          echo "Match not found";
          }*/
    }

    public function emptyCart(Request $request)
    {
    	//return "hell";
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
    	//return $id;
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
        //return $product_reviews;
    	//return $images;
    	
    	 return view('product_view',compact('cart_quan','product','detailsImgs','product_reviews','product_rating','categories','subcats'));
    }

    public function cookieSet()
    {
    	if(isset($_COOKIE['cart']))
    	{
    		$cart=array();
    		setcookie('cart', serialize($cart), time()+(86400*30));
    		//$data = unserialize($_COOKIE['cookie']);
    		//return $data;
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
             //return  $category;
            $product_categories = Product_category::get()->where('category_id',$category->id);
            //return  $product_categories;
             $scat = array();
            foreach($product_categories as $product_category)
            {
                 array_push($scat,["name"=>$product_category->pro_cat_name,
                    "id"=>$product_category->id,
                    "cate_id"=>$category->id]);
            }

              array_push($subcats,$scat);

          
            //return $cats;
            

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
        //return $id;
    }

    public function shipping()
    {
        if(Auth::check())
        {
             $products = Product_manage::get();
        $categories = Category::get();
        $subcats = $this->getSubcategory();
         $this->cookieSet();
        //$cart_quan = count(unserialize($_COOKIE['cart']));






         $cart_quan = count(unserialize($_COOKIE['cart']));
     //return view('checkout',compact('cart_quan'));
        //$cart_products = array();
        $total=0;
        if(isset($_COOKIE['cart']) && $cart_quan>0)
        {
            $products = unserialize($_COOKIE['cart']);
            
            foreach ($products as $product_id => $product_quan) {
                //return $key;
                $pro = Product_manage::find($product_id);
                if($pro)
                {
                    /*array_push($cart_products,[
                       "id"=>$pro->id,
                        "name"=>$pro->product_name,
                        "actual_price"=>$pro->actual_price,
                        "offere_price"=>$pro->offer_price,
                        "image"=>$pro->image,
                        "quantity"=>$product_quan
                    ]);*/
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

            //return $cart_products;
            
        }

         //$categories = Category::get();
        //$subcats = $this->getSubcategory();

        //return $total;
       // return $cart_quan;
        //return view('checkout',compact('cart_quan','total','categories','subcats'));











             
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
