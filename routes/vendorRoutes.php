<?php

use Illuminate\Support\Facades\Route;

Route::get('vendor/login', 'Vendor\VendorLoginController@LoginForm')->name('vendorLoginForm');
Route::post('vendor/login', 'Vendor\VendorLoginController@login')->name('vendorLogin');
Route::get('vendor/logout', 'Vendor\VendorLoginController@logout')->name('vendorLogout');

Route::get('vendor/register', 'Vendor\VendorRegController@registerForm')->name('vendorRegisterForm');
Route::post('vendor/register', 'Vendor\VendorRegController@register')->name('vendorRegister');




// authenticate routes & check role vendor
route::group(['middleware' => ['auth:vendor'], 'prefix' => 'vendor', 'namespace' => 'Vendor'], function(){
	Route::get('/', 'VendorController@dashboard')->name('vendor.dashboard');

		// product routes
	Route::get('product/upload', 'VendorProductController@upload')->name('vendor.product.upload');
	Route::post('product/store', 'VendorProductController@store')->name('vendor.product.store');
	Route::get('product/list/{status?}', 'VendorProductController@index')->name('vendor.product.list');
	Route::get('product/edit/{id}', 'VendorProductController@edit')->name('vendor.product.edit');
	Route::post('product/update', 'VendorProductController@update')->name('vendor.product.update');
	Route::get('product/delete/{id}', 'VendorProductController@delete')->name('vendor.product.delete');

	//order routes
	Route::get('order/{status?}', 'VendorOrderController@orderHistory')->name('vendor.orderList');
	Route::get('order/search/{status?}', 'VendorOrderController@orderHistory')->name('vendor.orderSearch');
	Route::get('order/invoice/{order_id?}', 'VendorOrderController@orderInvoice')->name('vendor.orderInvoice');
	Route::get('order/return/{order_id?}', 'VendorOrderController@orderReturn')->name('vendor.orderReturn');

});


