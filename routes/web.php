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


use Illuminate\Support\Facades\Route;





Route::group(['prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => 'admin'] , function (){


    //users
    Route::get('/users' , 'UserController@index')->name('admin.user.list');
    Route::get('/users/create' , 'UserController@create')->name('admin.user.create');
    Route::post('/users/create' , 'UserController@store')->name('admin.user.create');
    Route::get('/users/edit/{id}' , 'UserController@edit')->name('admin.user.edit');
    Route::post('/users/edit/{id}' , 'UserController@update')->name('admin.user.edit');
    Route::get('/users/delete/{id}' , 'UserController@delete')->name('admin.user.delete');

    //products
    Route::get('/products' , 'ProductController@index')->name('admin.product.list');
    Route::get('/products/create' , 'ProductController@create')->name('admin.product.create');
    Route::post('/products/create' , 'ProductController@store')->name('admin.product.create');
    Route::get('/products/edit/{id}' , 'ProductController@edit')->name('admin.product.edit');
    Route::post('/products/edit/{id}' , 'ProductController@update')->name('admin.product.edit');
    Route::get('/products/delete/{id}' , 'ProductController@delete')->name('admin.product.delete');


    //categories routes
    Route::get('/categories', 'CategoryController@index')->name('admin.categories.list');
    Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create');
    Route::post('/categories/create', 'CategoryController@store')->name('admin.categories.store');
    Route::get('/categories/edit/{category_id}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('/categories/edit/{category_id}', 'CategoryController@update')->name('admin.categories.update');
    Route::get('/categories/remove/{category_id}', 'CategoryController@remove')->name('admin.categories.remove');


    //shippingMethods routes
    Route::get('/shippingMethods', 'ShippingMethodController@index')->name('admin.shippingMethods.list');
    Route::get('/shippingMethods/create', 'ShippingMethodController@create')->name('admin.shippingMethods.create');
    Route::post('/shippingMethods/create', 'ShippingMethodController@store')->name('admin.shippingMethods.store');
    Route::get('/shippingMethods/edit/{id}', 'ShippingMethodController@edit')->name('admin.shippingMethods.edit');
    Route::post('/shippingMethods/edit/{id}', 'ShippingMethodController@update')->name('admin.shippingMethods.update');
    Route::get('/shippingMethods/remove/{id}', 'ShippingMethodController@remove')->name('admin.shippingMethods.remove');


    //sync
    Route::get('/sync' , 'SyncController@index')->name('admin.sync.index');
    Route::get('/syncProducts' , 'SyncController@syncProducts')->name('admin.syncProducts');




});

Route::group(['namespace' => 'Frontend'] , function (){
    Route::get('/' , 'HomeController@index')->name('home');


    Route::get('/login' , 'UserController@login')->name('login');
    Route::post('/register' , 'UserController@doRegister')->name('register');
    Route::post('/doLogin' , 'UserController@doLogin')->name('doLogin');
    Route::get('account/logout', 'UserController@logout')->name('logout');


    Route::get('/user/dashboard' , 'UserController@dashboard')->name('user.dashboard')->middleware('auth');
    Route::post('/user/dashboard' , 'UserController@updateUser')->name('user.dashboard')->middleware('auth');
    Route::get('/user/changePassword' , 'UserController@changePassword')->name('user.changePassword')->middleware('auth');
    Route::post('/user/changePassword' , 'UserController@updatePassword')->name('user.changePassword')->middleware('auth');
    Route::get('/user/orders' , 'UserController@showOrders')->name('user.showOrders')->middleware('auth');
    Route::get('/user/orders/{id}' , 'UserController@showOrderDetails')->name('user.showOrderDetails')->middleware('auth');
    Route::get('/user/payments' , 'UserController@showPayments')->name('user.showPayments')->middleware('auth');


    Route::get('/products/{id}' , 'ProductController@single')->name('frontend.product.single');


    Route::post('/basket/add' , 'BasketController@add')->name('basket.add');
    Route::post('/basket/totalPrice' , 'BasketController@totalPrice')->name('basket.totalPrice');
    Route::post('/basket/remove' , 'BasketController@remove')->name('basket.remove');


    Route::get('/basket/review'  , 'BasketController@review')->name('basket.review');
    Route::post('/basket/review'  , 'BasketController@doReview')->name('basket.review');
    Route::get('/basket/check-address'  , 'BasketController@checkAddress')->name('basket.checkAddress')->middleware('auth');
    Route::post('/basket/check-address'  , 'BasketController@doCheckAddress')->name('basket.checkAddress')->middleware('auth');
    Route::get('/basket/how-to-pay'  , 'BasketController@howToPay')->name('basket.howToPay')->middleware('auth');
    Route::get('/basket/confirm-and-pay'  , 'BasketController@confirmAndPay')->name('basket.confirmAndPay')->middleware('auth');



    //payments
    Route::post('/payment' , 'PaymentController@redirect')->name('payment.start');
    Route::post('/payment/verify' , 'PaymentController@verify')->name('payment.verify');



    //category
    Route::get('/category/{id}' , 'CategoryController@index')->name('frontend.category.index');


});