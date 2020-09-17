<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'VendorLoginController@LoginForm')->name('vendorLoginForm');
Route::post('/login', 'VendorLoginController@login')->name('vendorLogin');
Route::get('/register', 'VendorLoginController@RegisterForm')->name('vendorRegisterForm');
Route::post('/register', 'VendorLoginController@register')->name('vendorRegister');
Route::get('/logout', 'VendorLoginController@logout')->name('vendorLogout');

// authenticate routes & check role vendor
route::group(['middleware' => ['auth:vendor', 'vendor']], function(){
	Route::get('vendor/dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
});


