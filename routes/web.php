<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/show_products/{id}','homeController@show_products');

Route::get('/shipping','homeController@shipping');

Route::get('/','homeController@index');
Route::post('/addCart','homeController@addToCart');
Route::post('/removeproCart','homeController@removeToCart');
Route::post('/emptyCart','homeController@emptyCart');
//Route::post('/rating','homeController@rating');
Route::get('/proView/{id}','homeController@productView');
Route::get('/profile','homeController@profileView');
Route::get('/update_profile','homeController@updateProfile');
Route::get('/change_password','homeController@updatePassword');
Route::get('/recharge_account','homeController@rechargeAccount');

Route::get('/order_products','homeController@orderProducts');
Route::get('/update_photo','homeController@updatePhoto');
//Route::get('/checkout','homeController@getCheckout');


Route::post('/signup','userController@signUp');
Route::post('/signin','userController@signIn');
Route::post('/logout','userController@Logout');
Route::post('/change_user_info','userController@updateDetails');
Route::post('/change_password','userController@updatePassword');
Route::post('/change_photo','userController@updatePhoto');
Route::post('/recharge','userController@rechargeAccount');
Route::get('/create_card','userController@createCards');
Route::get('/admin', function () {
    return view('admin.index');
});



Route::post('/review','reviewController@addReview');
Route::post('/rating','ratingController@addRating');




Route::get('/checkout','checkoutController@index');
Route::post('/removeCart','checkoutController@deleteProduct');
Route::post('/addPro','checkoutController@addProduct');
Route::post('/removePro','checkoutController@removeProduct');



Route::get('/add_cat','categoryManageController@index');

Route::post('/addCategory','categoryManageController@insert');




Route::get('/all_cat', function () {
    return view('admin.all_category');
});

Route::get('/add_proCat','proCategoryController@index');

Route::post('/addProCategory','proCategoryController@insert');

Route::get('/all_proCat', function () {
    return view('admin.all_pro_category');
});

Route::get('/add_pro','productManageController@index');
Route::post('/addProduct','productManageController@insert');

Route::get('/all_pro', function () {
    return view('admin.all_product');
});



