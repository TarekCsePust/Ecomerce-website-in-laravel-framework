<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_manage;
use Cookie;
use App\Category;
use App\Product_category;

class checkoutController extends Controller
{
    public function index()
    {
        $this->cookieSet();
        $cart_quan = count(unserialize($_COOKIE['cart']));
     
        $cart_products = array();
        $total=0;
        if(isset($_COOKIE['cart']) && $cart_quan>0)
        {
        	$products = unserialize($_COOKIE['cart']);
        	
        	foreach ($products as $product_id => $product_quan) {
        		
        		$pro = Product_manage::find($product_id);
        		if($pro)
        		{
        			array_push($cart_products,[
        			   "id"=>$pro->id,
        			    "name"=>$pro->product_name,
        			    "actual_price"=>$pro->actual_price,
        			    "offere_price"=>$pro->offer_price,
        			    "image"=>$pro->image,
        			    "quantity"=>$product_quan
        			]);
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

         $categories = Category::get();
        $subcats = $this->getSubcategory();

        
        return view('checkout',compact('cart_quan','cart_products','total','categories','subcats'));
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
                 array_push($scat,["name"=>$product_category->pro_cat_name,"id"=>$product_category->id]);
            }

              array_push($subcats,$scat);

          
           
            

        }

        return  $subcats;
    }


     public function cookieSet()
    {
    	if(!isset($_COOKIE['cart']))
    	{
    		$cart=array();
    		setcookie('cart', serialize($cart), time()+(86400*30));
    		
    	}
    	
    }

    public function deleteProduct(Request $request)
    {

    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	if(array_key_exists($id."", $data))
		{
			unset($data[$id.""]);
			
			
		}
		setcookie('cart');
		$this->cookieSet();
		setcookie('cart', serialize($data), time()+(86400*30));
		
    	return count($data);
    	

	
    }

    public function removeProduct(Request $request)
    {
    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	if(array_key_exists($id."", $data))
		{

			$data[$id.""]--;
			
		}
		unset($_COOKIE['cart']);
		$this->cookieSet();
		setcookie('cart', serialize($data), time()+(86400*30));
        return "done";
		
    }


    public function addProduct(Request $request)
    {
        return "hello add";
    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	if(array_key_exists($id."", $data))
		{

			$data[$id.""]++;
			
		}
		unset($_COOKIE['cart']);
		$this->cookieSet();
		setcookie('cart', serialize($data), time()+(86400*30));
        return "done";
    }


    public function decrement_Product_quan(Request $request)
    {
    	$id = $request->id;
    	$data = unserialize($_COOKIE['cart']);
    	
    	if(array_key_exists($id."", $data))
		{

			$data[$id.""]--;
			
		}

		unset($_COOKIE['cart']);
		setcookie('cart', serialize($data), time()+(86400*30));
		return "done";
    }

    
}
