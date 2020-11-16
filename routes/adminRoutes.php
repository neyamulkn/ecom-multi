<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Admin\AdminLoginController@LoginForm')->name('adminLoginForm');
Route::post('/login', 'Admin\AdminLoginController@login')->name('adminLogin');
Route::get('/register', 'Admin\AdminLoginController@RegisterForm')->name('adminRegisterForm');
Route::post('/register', 'Admin\AdminLoginController@register')->name('adminRegister');
Route::get('/logout', 'Admin\AdminLoginController@logout')->name('adminLogout');


Route::group(['middleware' => ['auth:admin', 'admin']], function(){

	//setting
	Route::get('general/setting', 'GeneralSettingController@generalSetting')->name('generalSetting');
	Route::post('general/setting/update/{id}', 'GeneralSettingController@generalSettingUpdate')->name('generalSettingUpdate');

	Route::get('logo/setting', 'GeneralSettingController@logoSetting')->name('logoSetting');
	Route::post('logo/setting/update/{id}', 'GeneralSettingController@logoSettingUpdate')->name('logoSettingUpdate');
	
	Route::get('social/setting', 'GeneralSettingController@socialSetting')->name('socialSetting');
	Route::post('social/setting/store', 'GeneralSettingController@socialSettingStore')->name('socialSettingStore');
	Route::get('social/setting/edit/{id}', 'GeneralSettingController@socialSettingEdit')->name('socialSettingEdit');
	Route::post('social/setting/update/{id}', 'GeneralSettingController@socialSettingUpdate')->name('socialSettingUpdate');
	Route::get('social/setting/delete/{id}', 'GeneralSettingController@socialSettingDelete')->name('socialSettingDelete');
	
	Route::get('footer/setting', 'GeneralSettingController@footerSetting')->name('footerSetting');
	Route::post('footer/setting/update/{id}', 'GeneralSettingController@footerSettingUpdate')->name('footerSettingUpdate');

	Route::get('refund/request/{status?}', 'RefundController@adminReturnRequestList')->name('admin.refundRequest');
	Route::get('refund/request/status/{id}', 'RefundController@refundRequestStatus')->name('admin.refundRequestStatus');
	Route::get('refund/request/details/{id}', 'RefundController@refundRequestDetails')->name('admin.refundRequestDetails');
	Route::get('refund/request/approved/{id}/{status}', 'RefundController@refundRequestApproved')->name('admin.refundRequestApproved');

	Route::get('site/setting/update/status', 'SiteSettingController@siteSettingActiveDeactive')->name('siteSettingActiveDeactive');
	Route::post('site/setting/update', 'SiteSettingController@siteSettingUpdate')->name('siteSettingUpdate');


});

// authenticate routes & check role admin
Route::group(['middleware' => ['auth:admin', 'admin'], 'namespace' => 'Admin'], function(){
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

	
	//category routes
	Route::get('category', 'CategoryController@category')->name('category');
	Route::get('get/category', 'CategoryController@getcategory')->name('getcategory');
	Route::post('category/store', 'CategoryController@category_store')->name('category.store');
	Route::get('category/edit/{id}', 'CategoryController@category_edit')->name('category.edit');
	Route::post('category/update', 'CategoryController@category_update')->name('category.update');
	Route::get('category/delete/{id}', 'CategoryController@category_delete')->name('category.delete');

	// sub category routes
	Route::get('subcategory', 'CategoryController@subcategory')->name('subcategory');

	Route::post('subcategory/store', 'CategoryController@subcategory_store')->name('subcategory.store');
	Route::get('subcategory/list', 'CategoryController@subcategory_index')->name('subcategory.list');
	Route::get('subcategory/edit/{id}', 'CategoryController@subcategory_edit')->name('subcategory.edit');
	Route::post('subcategory/update', 'CategoryController@subcategory_update')->name('subcategory.update');
	Route::get('subcategory/delete/{id}', 'CategoryController@subcategory_delete')->name('subcategory.delete');

	Route::get('get/subcategory/{id}', 'CategoryController@get_subcategory')->name('get_subcategory');

	Route::get('subchild/category', 'CategoryController@subchildcategory')->name('subchildcategory');
	Route::post('subchild/category/store', 'CategoryController@subchildcategory_store')->name('subchildcategory.store');

	Route::get('subchild/category/edit/{id}', 'CategoryController@subchildcategory_edit')->name('subchildcategory.edit');

	Route::post('subchild/category/update', 'CategoryController@subchildcategory_update')->name('subchildcategory.update');
	Route::get('subchild/category/delete/{id}', 'CategoryController@subchildcategory_delete')->name('subchildcategory.delete');

	Route::get('category/sorting', 'CategoryController@categorySorting')->name('categorySorting');

		// productAttribute routes
	Route::get('product/attribute', 'ProductAttributeController@attribute_create')->name('productAttribute');
	Route::post('product/attribute/store', 'ProductAttributeController@attribute_store')->name('productAttribute.store');
	Route::get('product/attribute/list', 'ProductAttributeController@attribute_list')->name('productAttribute.list');
	Route::get('product/attribute/edit/{id}', 'ProductAttributeController@attribute_edit')->name('productAttribute.edit');
	Route::post('product/attribute/update', 'ProductAttributeController@attribute_update')->name('productAttribute.update');
	Route::get('product/attribute/delete/{id}', 'ProductAttributeController@attribute_delete')->name('productAttribute.delete');

	// productAttributeValue routes
	Route::get('product/attributevalue/{attribute_slug}/list', 'ProductAttributeController@attributevalue')->name('productAttributeValue');
	Route::post('product/attributevalue/store', 'ProductAttributeController@attributevalue_store')->name('productAttributeValue.store');
	Route::get('product/attributevalue/list', 'ProductAttributeController@attributevalue_list')->name('productAttributeValue.list');
	Route::get('product/attributevalue/edit/{id}', 'ProductAttributeController@attributevalue_edit')->name('productAttributeValue.edit');
	Route::post('product/attributevalue/update', 'ProductAttributeController@attributevalue_update')->name('productAttributeValue.update');
	Route::get('product/attributevalue/delete/{id}', 'ProductAttributeController@attributevalue_delete')->name('productAttributeValue.delete');

	// feature routes
	Route::get('feature', 'FeatureController@index')->name('feature');
	Route::post('feature/store', 'FeatureController@store')->name('feature.store');
	Route::get('feature/list', 'FeatureController@index')->name('feature.list');
	Route::get('feature/edit/{id}', 'FeatureController@edit')->name('feature.edit');
	Route::post('feature/update', 'FeatureController@update')->name('feature.update');
	Route::get('feature/delete/{id}', 'FeatureController@delete')->name('feature.delete');


	// predefined Feature routes
	Route::get('predefined/feature', 'PredefinedFeatureController@index')->name('predefinedFeature');
	Route::post('predefined/feature/store', 'PredefinedFeatureController@store')->name('predefinedFeature.store');
	Route::get('predefined/feature/list', 'PredefinedFeatureController@index')->name('predefinedFeature.list');
	Route::get('predefined/feature/edit/{id}', 'PredefinedFeatureController@edit')->name('predefinedFeature.edit');
	Route::post('predefined/feature/update', 'PredefinedFeatureController@update')->name('predefinedFeature.update');
	Route::get('predefined/feature/delete/{id}', 'PredefinedFeatureController@delete')->name('predefinedFeature.delete');


	// brand routes
	Route::get('brand', 'BrandController@index')->name('brand');
	Route::post('brand/store', 'BrandController@store')->name('brand.store');
	Route::get('brand/list', 'BrandController@index')->name('brand.list');
	Route::get('brand/edit/{id}', 'BrandController@edit')->name('brand.edit');
	Route::post('brand/update', 'BrandController@update')->name('brand.update');
	Route::get('brand/delete/{id}', 'BrandController@delete')->name('brand.delete');

	// product routes
	Route::get('product/upload', 'ProductController@upload')->name('admin.product.upload');
	Route::post('product/store', 'ProductController@store')->name('admin.product.store');
	Route::get('product/{status?}', 'ProductController@index')->name('admin.product.list');
	Route::get('product/edit/{slug}', 'ProductController@edit')->name('admin.product.edit');
	Route::post('product/update/{product_id}', 'ProductController@update')->name('admin.product.update');
	Route::get('product/delete/{id}', 'ProductController@delete')->name('admin.product.delete');
	//get highlight popup
	Route::get('product/highlight//popup/{id}', 'ProductController@highlight')->name('product.highlight');
 	//add/remove highlight product
	Route::get('product/highlight/addRemove', 'ProductController@highlightAddRemove')->name('highlightAddRemove');
	//upload product gallery image
	Route::get('product/gallery/image/{product_id}', 'ProductController@getGalleryImage')->name('product.getGalleryImage');
	Route::post('product/gallery/image', 'ProductController@storeGalleryImage')->name('product.storeGalleryImage');
	Route::get('product/gallery/image/delete/{id}', 'ProductController@deleteGalleryImage')->name('product.deleteGalleryImage');

	// slider routes
	Route::get('slider/create', 'SliderController@index')->name('slider.create');
	Route::post('slider/store', 'SliderController@store')->name('slider.store');
	Route::get('manage/slider', 'SliderController@index')->name('slider.list');
	Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
	Route::post('slider/update', 'SliderController@update')->name('slider.update');
	Route::get('slider/delete/{id}', 'SliderController@delete')->name('slider.delete');

	// homepage routes
	Route::get('homepage/section', 'HomepageSectionController@index')->name('admin.homepageSection');
	Route::post('homepage/section/store', 'HomepageSectionController@store')->name('admin.homepageSection.store');
	Route::get('homepage/section/edit/{id}', 'HomepageSectionController@edit')->name('admin.homepageSection.edit');
	Route::post('homepage/section/update', 'HomepageSectionController@update')->name('admin.homepageSection.update');
	Route::get('homepage/section/delete/{id}', 'HomepageSectionController@delete')->name('admin.homepageSection.delete');

	Route::get('homepage/section/get/single-product', 'HomepageSectionController@getSingleProduct')->name('admin.getSingleProduct');

	Route::get('homepage/section/sorting', 'HomepageSectionController@homepageSectionSorting')->name('admin.homepageSectionSorting');

	// offer routes
	Route::get('offer', 'OfferController@index')->name('admin.offer');
	Route::post('offer/store', 'OfferController@store')->name('admin.offer.store');
	Route::get('offer/list', 'OfferController@index')->name('admin.offer.list');
	Route::get('offer/edit/{id}', 'OfferController@edit')->name('admin.offer.edit');
	Route::post('offer/update', 'OfferController@update')->name('admin.offer.update');
	Route::get('offer/delete/{id}', 'OfferController@delete')->name('admin.offer.delete');
	Route::get('offer/get/all/product', 'OfferController@getAllProducts')->name('offer.getAllProducts');
	Route::get('offer/get/single/product', 'OfferController@getSingleProduct')->name('offer.getSingleProduct');

	// page routes
	Route::get('page/create', 'PageController@create')->name('page.create');
	Route::post('page/store', 'PageController@store')->name('page.store');
	Route::get('page/list', 'PageController@index')->name('page.list');
	Route::get('page/{slug}/edit', 'PageController@edit')->name('page.edit');
	Route::post('page/update/{id}', 'PageController@update')->name('page.update');
	Route::get('page/delete/{id}', 'PageController@delete')->name('page.delete');
	Route::get('page/slug/create', 'PageController@getSlug')->name('page.slug');

	Route::get('page/status/{id}', 'PageController@status')->name('page.status');
	Route::get('page/homepage-status/{id}', 'PageController@homepageStatus')->name('page.homepageStatus');


	// menu routes
	Route::get('menu', 'MenuController@index')->name('menu');
	Route::post('menu/store', 'MenuController@store')->name('menu.store');
	Route::get('menu/list', 'MenuController@index')->name('menu.list');
	Route::get('menu/edit/{id}', 'MenuController@edit')->name('menu.edit');
	Route::post('menu/update', 'MenuController@update')->name('menu.update');
	Route::get('menu/delete/{id}', 'MenuController@delete')->name('menu.delete');

	// user routes
	
	Route::post('customer/store', 'CustomerController@store')->name('customer.create');
	Route::get('customer/{id}/edit', 'CustomerController@edit')->name('customer.edit');
	Route::post('customer/update/{id}', 'CustomerController@update')->name('customer.update');
	Route::get('customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');

	Route::get('customer/list/{status?}', 'CustomerController@customerList')->name('customer.list');
	
	Route::get('customer/profile/{username}', 'CustomerController@customer_profile')->name('customer.profile');
	
	// designation routes
	Route::get('designation/create', 'DesignationController@create')->name('designation.create');
	Route::post('designation/store', 'DesignationController@store')->name('designation.store');
	Route::get('designation/list', 'DesignationController@index')->name('designation.list');
	Route::get('designation/{id}/edit', 'DesignationController@edit')->name('designation.edit');
	Route::post('designation/update', 'DesignationController@update')->name('designation.update');
	Route::get('designation/delete/{id}', 'DesignationController@delete')->name('designation.delete');

	// staff routes
	Route::get('staff/create', 'StaffController@create')->name('staff.create');
	Route::post('staff/store', 'StaffController@store')->name('staff.store');
	Route::get('staff/list', 'StaffController@index')->name('staff.list');
	Route::get('staff/{id}/edit', 'StaffController@edit')->name('staff.edit');
	Route::post('staff/update', 'StaffController@update')->name('staff.update');
	Route::get('staff/delete/{id}', 'StaffController@delete')->name('staff.delete');
	// role routes
	Route::get('role/create', 'RoleController@create')->name('role.create');
	Route::post('role/store', 'RoleController@store')->name('role.store');
	Route::get('role/list', 'RoleController@index')->name('role.list');
	Route::get('role/{id}/edit', 'RoleController@edit')->name('role.edit');
	Route::post('role/update', 'RoleController@update')->name('role.update');
	Route::get('role/delete/{id}', 'RoleController@delete')->name('role.delete');

	// banner routes
	Route::get('banner/list/{type?}', 'BannerController@index')->name('banner');
	Route::post('banner/store', 'BannerController@store')->name('banner.store');

	Route::get('banner/{id}/edit', 'BannerController@edit')->name('banner.edit');
	Route::post('banner/update', 'BannerController@update')->name('banner.update');
	Route::get('banner/delete/{id}', 'BannerController@delete')->name('banner.delete');
	Route::get('banner/image/delete', 'BannerController@bannerImage_delete')->name('bannerImage_delete');

	// service routes
	Route::post('service/store', 'ServicesController@store')->name('service.store');
	Route::get('service/list', 'ServicesController@index')->name('service.list');
	Route::get('service/{id}/edit', 'ServicesController@edit')->name('service.edit');
	Route::post('service/update', 'ServicesController@update')->name('service.update');
	Route::get('service/delete/{id}', 'ServicesController@delete')->name('service.delete');

	// coupon routes
	Route::get('coupon', 'CouponController@index')->name('coupon');
	Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
	Route::get('coupon/{id}/edit', 'CouponController@edit')->name('coupon.edit');
	Route::post('coupon/update', 'CouponController@update')->name('coupon.update');
	Route::get('coupon/delete/{id}', 'CouponController@delete')->name('coupon.delete');

	Route::get('shipping/method', 'ShippingChargeController@shipping_method')->name('shipping');

	//location all routes

	//state
	Route::get('state', 'LocationController@state')->name('state');
	Route::post('state/store', 'LocationController@state_store')->name('state.store');
	Route::get('state/edit/{id}', 'LocationController@state_edit')->name('state.edit');
	Route::post('state/update', 'LocationController@state_update')->name('state.update');
	Route::get('state/delete/{id}', 'LocationController@state_delete')->name('state.delete');

	// city route
	Route::get('city', 'LocationController@city')->name('city');
	Route::post('city/store', 'LocationController@city_store')->name('city.store');
	Route::get('city/edit/{id}', 'LocationController@city_edit')->name('city.edit');
	Route::post('city/update', 'LocationController@city_update')->name('city.update');
	Route::get('city/delete/{id}', 'LocationController@city_delete')->name('city.delete');

	// area route
	Route::get('area', 'LocationController@area')->name('area');
	Route::post('area/store', 'LocationController@area_store')->name('area.store');
	Route::get('area/edit/{id}', 'LocationController@area_edit')->name('area.edit');
	Route::post('area/update', 'LocationController@area_update')->name('area.update');
	Route::get('area/delete/{id}', 'LocationController@area_delete')->name('area.delete');

	// payment route
	Route::get('payment/gateway', 'PaymentGatewayController@index')->name('paymentGateway');
	Route::post('payment/gateway/store', 'PaymentGatewayController@store')->name('paymentGateway.store');
	Route::get('payment/gateway/edit/{id}', 'PaymentGatewayController@edit')->name('paymentGateway.edit');
	Route::post('payment/gateway/update', 'PaymentGatewayController@update')->name('paymentGateway.update');
	Route::get('payment/gateway/delete/{id}', 'PaymentGatewayController@delete')->name('paymentGateway.delete');
	Route::get('payment/gateway/mode/change', 'PaymentGatewayController@paymentModeChange')->name('paymentModeChange');


	Route::get('order/{status?}', 'AdminOrderController@orderHistory')->name('admin.orderList');
	Route::get('order/invoice/{order_id?}', 'AdminOrderController@orderInvoice')->name('admin.orderInvoice');
	
	//change order status
	Route::get('order/status/change', 'AdminOrderController@changeOrderStatus')->name('admin.changeOrderStatus');
	Route::get('order/cancel/{order_id?}', 'AdminOrderController@orderCancel')->name('admin.orderCancel');


	// refund Config route
	Route::get('refund/configuration', 'RefundReasonController@refundConfig')->name('admin.refundConfig');
	Route::post('refund/configuration/update', 'RefundReasonController@refundConfigUpdate')->name('admin.refundConfigUpdate');

	// refund reason route
	Route::get('return/order/reason', 'RefundReasonController@index')->name('returnReason');
	Route::post('return/order/reason/store', 'RefundReasonController@store')->name('returnReason.store');
	Route::get('return/order/reason/edit/{id}', 'RefundReasonController@edit')->name('returnReason.edit');
	Route::post('return/order/reason/update', 'RefundReasonController@update')->name('returnReason.update');
	Route::get('return/order/reason/delete/{id}', 'RefundReasonController@delete')->name('returnReason.delete');


	
});



?>
