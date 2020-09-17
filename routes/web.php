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


Route::get('/', 'HomeController@index')->name('home');
Route::get('category/{catslug?}/{subslug?}/{childslug?}', 'HomeController@category')->name('home.category');
//search products
Route::get('search', 'HomeController@search')->name('product.search');


Route::get('product/{slug?}', 'HomeController@product_details')->name('product_details');

Route::get('cart/add', 'CartController@cartAdd')->name('cart.add');
Route::get('cart', 'CartController@cartView')->name('cart');
Route::get('cart/update', 'CartController@cartUpdate')->name('cart.update');
Route::get('cart/item/remove/{id}', 'CartController@itemRemove')->name('cart.itemRemove');
Route::get('cart/remove/allitem', 'CartController@clearCart')->name('cart.clear');
Route::get('cart/view/header', 'AjaxController@getCartHead')->name('getCartHead');

//apply coupon
Route::get('coupon/apply', 'HomeController@couponApply')->name('coupon.apply');
//add to cart for direct buy
Route::get('buy/direct', 'HomeController@buyDirect')->name('buyDirect');
Route::get('checkout/{buy_product_id?}', 'User\CheckoutController@checkout')->name('checkout');
Route::get('checkout/shipping/{buy_product_id?}', 'User\CheckoutController@shipping')->name('shipping');
Route::post('checkout/order/confirm', 'User\OrderController@placeOrder')->name('orderConfirm');
Route::get('checkout/payment/{orderId}', 'User\OrderController@orderPayment')->name('order.payment');

//paypal payment 
Route::post('order/paypal/payment/{orderId}', 'PaymentController@paypalPayment')->name('paypalPayment');
Route::get('paypal/payment/status/success', 'PaymentController@paymentSuccess')->name('paypalPaymentSuccess');
Route::get('paypal/payment/status/cancel', 'PaymentController@paymentCancel')->name('paypalPaymentCancel');



Route::get('check/unique/value', 'AjaxController@checkField')->name('checkField');

Auth::routes();

Route::get('{page}', 'HomeController@page')->name('page');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
