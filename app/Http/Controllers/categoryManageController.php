<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Category;

class categoryManageController extends Controller
{
    public function index()
    {
    	 return view('admin.add_category');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
        'category_name' => 'required',
        'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    	]);

    	
    	$category = new Category;
    	$category->category_name = $request->category_name;
    
    	
    	 $imageName = time().'.'.request()->category_image->getClientOriginalExtension();
    	  $image = $request->file('category_image');
    	  $image_resize = Image::make($image->getRealPath()); 
    	  $image_resize->resize(300, 300);
    	 
    	  $image_resize->save(public_path('storage/' .$imageName));

    	  $category->category_image=$imageName;

    	 if($request->publish)
    	 {
    	 	$category->publish=1;
    	 }

    	 $category->save();

    	 //$request->session()->flash('msg', 'Category added sucessfully.');


    	 
    	return view('admin.add_category');
    }


    public function allCategory()
    {
    	$categories = Category::get();
    	return view('admin.all_category',compact('categories'));
    }

    public function Update(Request $request)
    {
    	$category = Category::find($request->id);
    	$category->category_name = $request->category_name;
    	if(Storage::has('public/'.$category->category_image))
    	{
    		Storage::delete('public/'.$category->category_image);
    		 $imageName = time().'.'.request()->category_image->getClientOriginalExtension();
	    	  $image = $request->file('category_image');
	    	  $image_resize = Image::make($image->getRealPath()); 
	    	  $image_resize->resize(300, 300);
	    	 
	    	  $image_resize->save(public_path('storage/' .$imageName));

	    	  $category->category_image=$imageName;

	    	 if($request->publish)
	    	 {
	    	 	$category->publish=1;
	    	 }

	    	 $category->save();

	    	// $request->session()->flash('msg', 'Category updated sucessfully.');

    	}
    	

    }

    public function delete(Request $request)
    {
    	Category::find($request->id)->delete();
    }
}
