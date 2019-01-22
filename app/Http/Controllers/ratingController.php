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
		
		
		if(Auth::check())
		{
			
			$product_rate = new Product_rating;
			$user_rated = DB::table('product_ratings')->where('user_id',Auth::user()->id)->first();
			if($user_rated)
			{
				 DB::table('product_ratings')->where('user_id',Auth::user()->id)->update(['rate' => $request->rate]);
				
				
			
			}
			else
			{
				$product_rate->user_id = $request->userId;
				$product_rate->product_id = $request->productId;
				$product_rate->rate = $request->rate;
				$product_rate->save();
				
			}
			return 1;
			

		}
		else
		{
			return 0;

		}
	}
    
}
