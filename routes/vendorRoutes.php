<?php

use Illuminate\Support\Facades\Route;

Route::get('seller/login', 'VendorLoginController@LoginForm')->name('vendorLoginForm');
Route::post('seller/login', 'VendorLoginController@login')->name('vendorLogin');
Route::get('seller/logout', 'VendorLoginController@logout')->name('vendorLogout');

Route::get('seller/register', 'VendorRegController@registerForm')->name('vendorRegisterForm');
Route::post('seller/register', 'VendorRegController@register')->name('vendorRegister');

// authenticate routes & check role vendor
route::group(['middleware' => ['auth:vendor', 'vendor']], function(){
	Route::get('vendor/dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
});


