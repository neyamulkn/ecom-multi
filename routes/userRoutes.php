<?php

use Illuminate\Support\Facades\Route;

Route::get('user/login', 'UserLoginController@LoginForm')->name('LoginForm');
Route::post('user/login', 'UserLoginController@login')->name('userLogin');
Route::get('user/register', 'UserRegController@RegisterForm')->name('userRegisterForm');
Route::post('user/register', 'UserRegController@register')->name('userRegister');
Route::get('user/logout', 'UserLoginController@logout')->name('userLogout');

Route::get('checkout/get/city/{state_id?}', 'CheckoutController@get_city')->name('checkout.get_city');
Route::post('user/shipping/register', 'CheckoutController@ShippingRegister')->name('shippingRegister');
// get shipping address by shipping id
Route::get('get/shipping/address/{shipping_id}', 'CheckoutController@getShippingAddress')->name('getShippingAddress');

Route::get('addto/compare/{product_id}', 'CompareController@addToCompare')->name('addToCompare');
Route::get('compare/product', 'CompareController@compare')->name('productCompare');
Route::get('compare/product/remove/{product_id}', 'CompareController@remove')->name('productCompareRemove');

route::group(['middleware' => ['auth']], function(){
	Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');

	Route::get('my-account', 'UserController@myAccount')->name('user.myAccount');
	Route::get('addto/wishlist', 'WishlistController@store')->name('wishlist.add');
	Route::get('wishlist', 'WishlistController@index')->name('wishlists');
	Route::get('wishlist/remove/{id}', 'WishlistController@remove')->name('wishlist.remove');
	
	Route::get('checkout/shipping/review', 'CheckoutController@shippingReview')->name('shippingReview');
	Route::post('checkout/order/confirm', 'OrderController@orderConfirm')->name('orderConfirm');
	Route::get('checkout/payment/{orderId}', 'PaymentController@orderPaymentGateway')->name('order.paymentGateway');
	Route::post('checkout/payment/{orderId}', 'PaymentController@orderPayment')->name('order.payment');
	Route::get('checkout/payment/confirm/{orderId}', 'PaymentController@paymentConfirm')->name('order.paymentConfirm');


	// Cash  payment 
	Route::post('order/cash/payment/{orderId}', 'PaymentController@handCashPayment')->name('handCashPayment');

	Route::get('order/history', 'OrderController@orderHistory')->name('user.orderHistory');
	Route::get('order/details/{order_id?}', 'OrderController@orderDetails')->name('user.orderDetails');
	Route::get('order/return/{order_id?}', 'OrderController@orderReturn')->name('user.orderReturn');
	
	Route::get('order/cancel/{order_id?}', 'OrderController@orderCancel')->name('user.orderCancel');

});


