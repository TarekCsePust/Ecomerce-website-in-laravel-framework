<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_rating;
use Auth;
use Illuminate\Support\Facades\DB;
class ratingController extends Controller
{
	public function addRating(Request $request)
	{   
		//return "donr";
		
		if(Auth::check())
		{
			
			$product_rate = new Product_rating;
			$user_rated = DB::table('product_ratings')->where('user_id',Auth::user()->id)->first();
			if($user_rated)
			{
				 DB::table('product_ratings')->where('user_id',Auth::user()->id)->update(['rate' => $request->rate]);
				//return $user_rated->rate;
				//$user_rated->rate = $request->rate;
				//$user_rated->save();
				
			
			}
			else
			{
				$product_rate->user_id = $request->userId;
				$product_rate->product_id = $request->productId;
				$product_rate->rate = $request->rate;
				$product_rate->save();
				
			}
			return 1;
			//return $user_rated->rate;
			//$user_rated =  Product_rating::get()->where('user_id',Auth::user()->id);
			
			//return "donr";
			/*$product_rate = new Product_rating;
			
			$user_rated =  Product_rating::get()->where('user_id',Auth::user()->id);
			
			if(count($user_rated))
			{
				
				$user_rated[0]->rate = $request->rate;
				$user_rated[0]->save();
				return "done";
			
			}
			else
			{
				$product_rate->user_id = $request->userId;
				$product_rate->product_id = $request->productId;
				$product_rate->rate = $request->rate;
				$product_rate->save();
				return "done";
			}*/
			
			/*if($user_rated)
			{
				$user_rated->rate = $request->rate;
				$user_rated->save();
			}
			else
			{
				return "donr";
				//$product_rate->user_id = $request->userId;
				//$product_rate->product_id = $request->productId;
				//$product_rate->rate = $request->rate;
			}

			return "rated";*/
			//return count($user_rated);

		}
		else
		{
			return 0;

		}
	}
    
}
