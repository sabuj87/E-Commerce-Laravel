<?php

use Illuminate\Support\Facades\Route;

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
//Front Route
Route::get('/','front\HomeController@Home')->name('home');


//Products route for frontend

Route::get('/products','front\ProductController@products')->name('products');
Route::get('/product/{slug}','front\ProductController@show')->name('product.show');
Route::get('/search','front\SearchController@search')->name('search');
Route::get('/category/{id}','front\ProductController@category')->name('category.product');
//Product review
Route::post("/review/store",'front\ProductController@reviewstore')->name('review.product.store');
Route::get("/review/delete/{id}/{uid}",'front\ProductController@reviewdelete')->name('review.product.delete');
//Category route for fronted
Route::get('/allcategory','front\CategoryController@mainCategory')->name('maincategory');
Route::get('/subcategory/{pid}','front\CategoryController@subCategory')->name('subcategory');


//Cart route for frontend
Route::post("/carts/store",'front\CartController@store')->name('cart.store');
Route::post("/carts/update/{id}",'front\CartController@update')->name('carts.update');
Route::get("/carts",'front\CartController@index')->name('carts');
Route::post("/carts/delete",'front\CartController@delete')->name('carts.delete');


//checkouts
Route::get("/checkouts",'front\CheckoutController@index')->name('checkouts');
Route::post("/checkouts/store",'front\CheckoutController@store')->name('checkouts.store');


//Back Route
Route::group(["prefix"=>"admin"],function(){

    Route::get("/",'back\HomeController@dashboard')->name('admin.index');
    Route::get("/login",'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post("/login/submit",'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::get("/logout",'Auth\Admin\LoginController@logout')->name('admin.logout');
    Route::get("/password/reset",'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post("/password/email",'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get("/password/reset/{token}",'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post("/password/reset",'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');
//Products Route 
Route::get("/product/create",'back\ProductController@create')->name('admin.product.create');
Route::get("/product/edit/{id}",'back\ProductController@edit')->name('admin.product.edit');
Route::get("/products",'back\ProductController@index')->name('admin.products');
Route::get("/product/category",'Adminpagecontroller@manage_Products')->name('admin.product.category');
Route::post("/product/store",'back\ProductController@store')->name('admin.product.store');
Route::post("/product/update/{id}",'back\ProductController@update')->name('admin.product.update');
Route::post("/product/delete/{id}",'back\ProductController@delete')->name('admin.product.delete');

//Cetegory Route for Admin
Route::get("/category",'back\CategoryController@categories')->name('admin.categories');
Route::get("/category/edit/{id}",'back\CategoryController@edit')->name('admin.category.edit');
Route::get("/category/create",'back\CategoryController@create')->name('admin.category.create');
Route::post("/category/delete/{id}",'back\CategoryController@delete')->name('admin.category.delete');
Route::post("/category/store",'back\CategoryController@store')->name('admin.category.store');
Route::post("/category/update/{id}",'back\CategoryController@update')->name('admin.category.update');
Route::get("/category/manage",'back\CategoryController@manage')->name('admin.category.manage');

//Brand Route for Admin
Route::get("/brand",'back\BrandController@brands')->name('admin.brands');
Route::get("/brand/edit/{id}",'back\BrandController@edit')->name('admin.brand.edit');
Route::get("/brand/create",'back\BrandController@create')->name('admin.brand.create');
Route::post("/brand/delete/{id}",'back\BrandController@delete')->name('admin.brand.delete');
Route::post("/brand/store",'back\BrandController@store')->name('admin.brand.store');
Route::post("/brand/update/{id}",'back\BrandController@update')->name('admin.brand.update');
Route::get("/brand/manage",'back\BrandController@manage')->name('admin.brand.manage');

//Seller Route for Admin
Route::get("/seller",'back\SellerController@brands')->name('admin.sellers');
Route::get("/seller/edit/{id}",'back\SellerController@edit')->name('admin.seller.edit');
Route::get("/brand/create",'back\SellerController@create')->name('admin.seller.create');
Route::post("/seller/delete/{id}",'back\SellerController@delete')->name('admin.seller.delete');
Route::post("/seller/store",'back\SellerController@store')->name('admin.seller.store');
Route::post("/seller/update/{id}",'back\SellerController@update')->name('admin.seller.update');
Route::get("/seller/manage",'back\SellerController@manage')->name('admin.seller.manage');


//Order Route 
Route::get("/orders",'back\OrderController@orders')->name('admin.orders');
Route::get("/order/view/{id}",'back\OrderController@view')->name('admin.order.view');
Route::post("/order/delete/{id}",'back\OrderController@delete')->name('admin.order.delete');
Route::post("/order/paid/{id}",'back\OrderController@paid')->name('admin.order.paid');
Route::post("/order/completed/{id}",'back\OrderController@completed')->name('admin.order.completed');
Route::post("/order/charge-update/{id}",'back\OrderController@chargeUpdate')->name('admin.order.charge');
Route::get("/order/invoice/{id}",'back\OrderController@generateInvoice')->name('admin.order.invoice');


//slider Route for Admin
Route::get("/sliders",'back\SliderController@sliders')->name('admin.sliders');
Route::post("/slider/delete/{id}",'back\SliderController@delete')->name('admin.slider.delete');
Route::post("/slider/store",'back\SliderController@store')->name('admin.slider.store');
Route::post("/slider/update/{id}",'back\SliderController@update')->name('admin.slider.update');


//Banner Route for Admin
Route::get("/banners",'back\BannerController@banners')->name('admin.banners');
Route::post("/banner/delete/{id}",'back\BannerController@delete')->name('admin.banner.delete');
Route::post("/banner/store",'back\BannerController@store')->name('admin.banner.store');
Route::post("/banner/update/{id}",'back\BannerController@update')->name('admin.banner.update');


//Divisions Route for Admin
Route::get("/divisions",'AdminDivisionsController@brands')->name('admin.divisions');
Route::get("/divisions/edit/{id}",'AdminDivisionsController@edit')->name('admin.divisions.edit');
Route::get("/divisions/create",'AdminDivisionsController@create')->name('admin.divisions.create');
Route::post("/divisions/delete/{id}",'AdminDivisionsController@delete')->name('admin.divisions.delete');
Route::post("/divisions/store",'AdminDivisionsController@store')->name('admin.divisions.store');
Route::post("/divisions/update/{id}",'AdminDivisionsController@update')->name('admin.divisions.update');

//Districts Route for Admin
Route::get("/districts",'AdminDistrictsController@brands')->name('admin.districts');
Route::get("/districts/edit/{id}",'AdminDistrictsController@edit')->name('admin.districts.edit');
Route::get("/districts/create",'AdminDistrictsController@create')->name('admin.districts.create');
Route::post("/districts/delete/{id}",'AdminDistrictsController@delete')->name('admin.districts.delete');
Route::post("/districts/store",'AdminDistrictsController@store')->name('admin.districts.store');
Route::post("/districts/update/{id}",'AdminDistrictsController@update')->name('admin.districts.update');

});

//user  
Route::get("/token/{token}",'front\VerificationController@verify')->name('user.verification');
Route::get("/user/dashboard",'UserController@dashboard')->name('user.dashboard');
Route::get("/user/profile",'UserController@profile')->name('user.profile');
Route::post("/user/profile/update",'UserController@update')->name('user.profile.update');




//Auth Routes for user
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
