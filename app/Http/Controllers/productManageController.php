<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product_category;
use App\Product_Manage;
use App\Product_details_image;
use Intervention\Image\ImageManagerStatic as Image;

class productManageController extends Controller
{
    public function index()
    {
    	$cats = Category::get();
    	$pro_cats =Product_category::get();
    	return view('admin.add_product',compact('cats','pro_cats')); 
    }

    public function insert(Request $request)
    {
    	
      $this->validate($request, [
        'category' => 'required',
         'product_category' => 'required',
          'product_name' => 'required',
          'actual_price' => 'required',
          'quantity' => 'required',
          'description' => 'required', 
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'product_details_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        

        
      ]);

    	 $imageName = time().rand().'.'.request()->product_image->getClientOriginalExtension();
    	  $image = $request->file('product_image');
    	  $image_resize = Image::make($image->getRealPath()); 
    	  $image_resize->resize(300, 300);
    	 
    	  $image_resize->save(public_path('storage/' .$imageName));
          $product = new Product_Manage;

          $product->category_id = $request->category;
          $product->pro_cat_id = $request->product_category;
          $product->product_name = $request->product_name;
          $product->actual_price = $request->actual_price;
          if($request->offer_price)
          {
                $product->offer_price = $request->offer_price;
          }
        
          $product->quantity= $request->quantity;
          $product->image = $imageName;
          $product->description = $request->description;
          if($request->publish)
          {
              $product->publish= $request->publish;
          }

          if($request->new_arrivel)
          {
             $product->new_arrivel = $request->new_arrivel;
          }
          
          if($request->size)
          {
              $product->size= $request->size;
          }

          if( $request->color)
          {
              $product->color = $request->color;

          }
         
        
         
          $product->save();



    	   $id =  $product->id;
         $images = $request->product_details_images;
         foreach($images as $img)
         {
            $pro_img = new Product_details_image;

             $imageName = time().rand().'.'.$img->getClientOriginalExtension();
              $image =$img;
              $image_resize = Image::make($image->getRealPath()); 
              $image_resize->resize(300, 300);
             
              $image_resize->save(public_path('storage/' .$imageName));
              $pro_img->image = $imageName;
              $pro_img->pro_manage_id = $id;
              $pro_img->save();

         }

          



         return redirect('add_pro');

    }
}
