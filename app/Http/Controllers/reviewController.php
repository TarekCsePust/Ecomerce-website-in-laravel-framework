<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_review;
use Auth;
class reviewController extends Controller
{
    public function addReview(Request $request)
    {
    	if(Auth::check())
    	{
    		$productReview = new  Product_review;
    		$productReview->user_id = $request->userId;
    		$productReview->review = $request->review_message;
    		$productReview->product_id = $request->productId;
    		$productReview->save();
    		return redirect()->back();

    	}
    	else
    	{
             $request->session()->flash('msg', 'You have to login at first for review.');
    		 return redirect()->back();
    	}
    	
    }
}
