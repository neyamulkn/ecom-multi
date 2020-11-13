<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

//backend common routes

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

//paypal payment
Route::get('order/paypal/payment/{orderId}', 'PaypalController@paypalPayment')->name('paypalPayment');
Route::get('paypal/payment/status/success', 'PaypalController@paymentSuccess')->name('paypalPaymentSuccess');
Route::get('paypal/payment/status/cancel', 'PaypalController@paymentCancel')->name('paypalPaymentCancel');

Route::get('check/unique/value', 'AjaxController@checkField')->name('checkField');
//product quickview
Route::get('quickview/product/{product_id}', 'HomeController@quickview')->name('quickview');

Auth::routes();

Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('contact-us', 'HomeController@contactUs')->name('contactUs');
Route::get('about-us', 'HomeController@aboutUs')->name('contactUs');

Route::get('brand/{slug}', 'HomeController@brandProducts')->name('brandProducts');
Route::get('more/{slug}', 'HomeController@moreProducts')->name('moreProducts');

Route::get('offer', 'OfferController@offers')->name('offers');
Route::get('offer/{slug}', 'OfferController@offerDetails')->name('offer.details');

Route::get('gift-cards', 'HomeController@giftCards')->name('giftCards');
Route::get('top-brand', 'FrontPagesController@topBrand')->name('topBrand');

Route::get('today-deals', 'FrontPagesController@todayDeals')->name('todayDeals');
Route::get('mega-discount', 'FrontPagesController@megaDiscount')->name('megaDiscount');
Route::get('{page}', 'FrontPagesController@page')->name('page');

Route::get('auth/redirect/{provider}', 'SocialLoginController@redirectToProvider')->name('social.login');
Route::get('auth/{provider}/callback', 'SocialLoginController@handleProviderCallback')->name('social.callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
