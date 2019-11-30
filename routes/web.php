<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| This ecommerce site Developed by shamsul huda with love.
|
*/

Route::get('/', 'FrontEndController@index')->name('frontend');//homepage view
Route::get('product-details/{id}', 'FrontEndController@productDetails')->name('details');//product details
Route::get('product/view', 'FrontEndController@productView')->name('product.view');//product view
Route::get('add-to-cart', 'CartController@index')->name('view_cart');//view cart page
Route::get('add/to/cart/{id}', 'CartController@addCart')->name('addToCart');//Add items to cart
Route::get('cartcheck', 'CartController@check')->name('cartcheck'); //test
Route::delete('/remove/item/{id}', 'CartController@destroy')->name('removeItem'); //delete cart item

Auth::routes();
// admin routes
Route::group(['prefix'=>'admin', 'middleware'=>'admin', 'namespace'=>'admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');//dashboard home

	Route::resource('category', 'CategoryController');//category CRUD
	Route::resource('product', 'ProductController');//product CRUD
	Route::resource('slider', 'SliderController');//Slider CRUD
});
//user routes
Route::group(['prefix'=>'user', 'middleware'=>'auth', 'namespace'=>'user'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('user.dashboard');//dashboard home

});

Route::group(['middleware'=>'auth'], function(){
	Route::get('wishlist', 'WishListController@index')->name('user.wishlist');//wishlist
	Route::post('/add/to/wishlist', 'WishListController@add_wishitem')->name('add.wishitem');//wishlist
});


