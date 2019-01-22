<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product_category;

class proCategoryController extends Controller
{
    public function index()
    {
    	$cats = Category::get();
    	return view('admin.add_pro_category',compact('cats'));
    }

    public function insert(Request $request)
    {
       
    	$this->validate($request, [

        'category' => 'required',
        'product_category' => 'required',
       
        
    	]);


    	$proCat = new Product_category;
    	$proCat->pro_cat_name = $request->product_category;


    	$proCat->category_id =$request->category;

    	if($request->publish)
    	 {
    	 	$proCat->publish=1;
    	 }
    	 $proCat->save();

    	

         return redirect('add_proCat');
    }
}
