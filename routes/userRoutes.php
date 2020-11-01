<?php

use Illuminate\Support\Facades\Route;

Route::get('user/login', 'User\UserLoginController@LoginForm')->name('LoginForm');
Route::post('user/login', 'User\UserLoginController@login')->name('userLogin');
Route::get('user/register', 'User\UserRegController@RegisterForm')->name('userRegisterForm');
Route::post('user/register', 'User\UserRegController@register')->name('userRegister');
Route::get('user/logout', 'User\UserLoginController@logout')->name('userLogout');

Route::get('checkout/get/city/{state_id?}', 'User\CheckoutController@get_city')->name('checkout.get_city');
Route::post('user/shipping/register', 'User\CheckoutController@ShippingRegister')->name('shippingRegister');
// get shipping address by shipping id
Route::get('get/shipping/address/{shipping_id}', 'User\CheckoutController@getShippingAddress')->name('getShippingAddress');

Route::get('addto/compare/{product_id}', 'User\CompareController@addToCompare')->name('addToCompare');
Route::get('compare/product', 'User\CompareController@compare')->name('productCompare');
Route::get('compare/product/remove/{product_id}', 'User\CompareController@remove')->name('productCompareRemove');

route::group(['middleware' => ['auth'], 'namespace' => 'User'], function(){
	Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');

	Route::get('user/account', 'UserController@myAccount')->name('user.myAccount');
	Route::post('user/profile/update', 'UserController@profileUpdate')->name('user.profileUpdate');
	Route::post('user/address/update', 'UserController@addressUpdate')->name('user.addressUpdate');
	Route::get('addto/wishlist', 'WishlistController@store')->name('wishlist.add');
	Route::get('wishlist', 'WishlistController@index')->name('wishlists');
	Route::get('wishlist/remove/{id}', 'WishlistController@remove')->name('wishlist.remove');
	
	Route::get('checkout/shipping/review', 'CheckoutController@shippingReview')->name('shippingReview');
	Route::post('checkout/order/confirm', 'OrderController@orderConfirm')->name('orderConfirm');
	Route::get('checkout/payment/{orderId}', 'PaymentController@orderPaymentGateway')->name('order.paymentGateway');
	Route::post('checkout/payment/{orderId}', 'PaymentController@orderPayment')->name('order.payment');
	Route::get('checkout/payment/confirm/{orderId}', 'PaymentController@paymentConfirm')->name('order.paymentConfirm');

	Route::get('product/review/form', 'ReviewController@getReviewForm')->name('getReviewForm');
	Route::post('product/review/insert', 'ReviewController@productReviewInsert')->name('review.insert');


	// Cash  payment 
	Route::post('order/cash/payment/{orderId}', 'PaymentController@handCashPayment')->name('handCashPayment');

	Route::get('order/history', 'OrderController@orderHistory')->name('user.orderHistory');
	Route::get('order/details/{order_id?}', 'OrderController@orderDetails')->name('user.orderDetails');
	Route::get('order/return/{order_id?}', 'OrderController@orderReturn')->name('user.orderReturn');
	
	Route::get('order/cancel/{order_id?}', 'OrderController@orderCancel')->name('user.orderCancel');

	Route::get('user/change-password', 'UserController@changePasswordForm')->name('user.change-password');
	Route::post('user/change-password', 'UserController@changePassword')->name('user.change-password');

});


