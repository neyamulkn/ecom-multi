@extends('layouts.frontend')
@section('title', Config::get('siteSetting.title'))
@section('metatag')
    <meta name="description" content="Multipurpose eCommerce website">

    <meta name="keywords" content="Multipurpose, eCommerce, website" />

    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="{{ url()->full() }}">
    <link rel="amphtml" href="{{ url()->full() }}" />
    <link rel="alternate" href="{{ url()->full() }}">

    <!-- Schema.org for Google -->

    <meta itemprop="description" content="Multipurpose eCommerce website">
    <meta itemprop="image" content="{{asset('frontend')}}/images/logo/logo.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="Multipurpose eCommerce website">
    <meta name="twitter:title" content="Multipurpose eCommerce website">
    <meta name="twitter:description" content="Multipurpose eCommerce website">
    <meta name="twitter:site" content="{{url('/')}}">
    <meta name="twitter:creator" content="@Neyamul">
    <meta name="twitter:image:src" content="{{asset('frontend')}}/images/logo/logo.png">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:description" content="Multipurpose eCommerce website">
    <meta name="og:image" content="{{asset('frontend')}}/images/logo/logo.png">
     <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="Bdtype">
    <meta name="og:locale" content="en">
    <meta name="og:type" content="website">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="article">
@endsection

@section('content')
        @if(Config::get('siteSetting.slider'))
        <!-- Slider Arae Start -->
        @include('frontend.sliders.slider')
        <!-- Slider Arae End -->
        @endif
		<!-- Main Container  -->
		<div id="content">
			
			<div class="so-page-builder" style="background: #fff;">
				
				<section class="container">
					<div class="row page-builder-ltr">
						<div class="col-md-12 catalog">
							<div class="nav nav-tabs"> <span class="title">Popular Categories</span>  </div>
						</div>
						<div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div>
						<div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div>
						<div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div><div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div><div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div><div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div><div class="col-md-3">
							<div class="category-list cat-border">
	                            <div class="category-thumb" style="float: right; ">
	                                <a href="shop.php">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/116.jpg" alt="">
	                                </a>
	                            </div>
	                            <div class="desc-listcategoreis" style=" float: left;">
	                                <div class="name_categories">
	                                    <h6>Sport &amp; Outdoor</h6>
	                                </div>
	                                <span class="number_product">17 Products</span>
	                                <a href="shop.php"> Shop Now <i class="fa fa-angle-right"></i></a>
	                            </div>
	                        </div>
						</div>
						
					</div>
				</section>
				<div class="container page-builder-ltr">
					<div class="row row_k43m row-style ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_hmsd block block_2">
							<div class="home4-banner-1 row clearfix ">
								<div class="item-1 col-lg-4 col-md-4 col-sm-4 col-xs-6 mrb-30 banners">
									<div>
										<a title="Static Image" href="#"><img src="{{asset('frontend')}}/image/catalog/demo/banners/home4/banner4-1.jpg" alt="Static Image"></a>
									</div>
								</div>
								<div class="item-2 col-lg-4 col-md-4 col-sm-4 col-xs-6 mrb-30 banners">
									<div>
										<a title="Static Image" href="#"><img src="{{asset('frontend')}}/image/catalog/demo/banners/home4/banner4-2.jpg" alt="Static Image"></a>
									</div>
								</div>
								<div class="item-2 col-lg-4 col-md-4 col-sm-4 hidden-xs mrb-30 banners">
									<div>
										<a title="Static Image" href="#"><img src="{{asset('frontend')}}/image/catalog/demo/banners/home4/banner4-3.jpg" alt="Static Image"></a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				 
		       	<section class="section-style">
		      
					<div class="container page-builder-ltr">
						<div class="nav nav-tabs">
				          	<span class="title">Feature Products</span> 
				          	<span style="float: right;"><a data-toggle="tab" href="#">See More</a></span>
				        </div>
			            <div class="clearfix module horizontal">
			              <div class="products-category">
			                <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="5" data-items_column0="6" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
			                


			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="addToCart(8);" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">

			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>

			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                            	<div class="rating">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
											</div>
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Buy this Product"><i class="fa fa-retweet"></i></button>
			                            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>


			                </div>
			              </div>
			            </div>
			        </div>
			    </section>

			    <section class="section-style">
					<div class="container page-builder-ltr">
						<div class="nav nav-tabs">
				          	<span class="title">New Arrivals</span> 
				          	<span style="float: right;"><a data-toggle="tab" href="#">See More</a></span>
				        </div>
			            <div class="clearfix module horizontal">
			              <div class="products-category">
			                <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="1" data-items_column0="6" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
			                <div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/3.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div><div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div><div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div><div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/8.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <div class="product-layout">
			                    <div class="product-item-container">
			                      <div class="left-block">
			                        <div class="product-image-container">
			                          <a href="product.html" title="Portable  Compact Charger (External Battery) t45 ">
			                            <img src="{{asset('frontend')}}/image/catalog/demo/product/electronic/28.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45 " class="img-1 img-responsive">
			                          </a>
			                        </div>
			                      </div>
			                      <div class="box-label">
			                        <span class="label-product label-sale">
			                           -40%
			                        </span>
			                      </div> 
			                      <div class="right-block">
			                        <div class="caption">
			                          <h4><a href="product.html">Portable  Compact Charger (External Battery) t45 </a></h4>
			                          <div class="total-price clearfix" style="visibility: hidden; display: block;">
			                            <div class="price price-left">
			                              <span class="price-new">$74.00</span>
			                              <span class="price-old">$122.00</span>
			                            </div>
			                            <div class="price-sale price-right">
			                              <span class="discount">
			                                -40%
			                                <strong>OFF</strong>
			                              </span>
			                            </div>
			                          </div>
			                          <div class="description hidden">
			                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
			                          </div>
			                        </div>
			                        <div class="button-group">
			                          <div class="button-inner so-quickview">
			                            <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="" data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> <i class="fa fa-search"></i> </a>
			                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('78');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
			                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('78');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
			                            <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('78', '2');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
			                          </div>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			        </div>
			    </section>
	          
				
			
				<!--Extra-->
				<div class="container page-builder-ltr">
					<div class="row row-style row_a6">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col_siw1  block block_9">
							<div class="moduletable module so-extraslider-ltr home1-extra clearfix">
								<div class="head-title font-ct">
								<h2 class="modtitle">Sport &amp; Entertaiment</h2>
								</div>
								<div class="modcontent">
								<div id="so_extra_slider_sport" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
									<div class="extraslider-inner owl2-carousel owl2-theme owl2-loaded extra-animate">
									<div class="category-slider-inner products-list yt-content-slider-2" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Men Collection Outfit Grid, Outfit and  Colored Sport ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/sport/9-120x120.jpg" alt="Men Collection Outfit Grid, Outfit and  Colored Sport ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Men Collection Outfit Grid, Outfit and  Colored Sport ">
													Men Collection Outfit Grid, Outfit and  Colored Sport 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$74.20 
														</span>
														<span class="price-old">$122.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-40% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Xumstick teachings  uttempor the actual of the great">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/sport/6-120x120.jpg" alt="Xumstick teachings  uttempor the actual of the great">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Xumstick teachings  uttempor the actual of the great">
													Xumstick teachings uttempor the actual of...
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$98.00 
														</span>
														<span class="price-old">$122.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-20% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Amy Byer Big Girls' Colorblock  Trapeze Dress orilamra">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/sport/1-120x120.jpg" alt="Amy Byer Big Girls' Colorblock  Trapeze Dress orilamra">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Amy Byer Big Girls' Colorblock  Trapeze Dress orilamra">
													Amy Byer Big Girls' Colorblock Trapeze Dre... 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$122.00 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Drumstick uttempor the actual teachings of the great">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/spa/12-120x120.jpg" alt="Drumstick uttempor the actual teachings of the great">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Drumstick uttempor the actual teachings of the great">
													Drumstick uttempor the actual teachings of the great
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$123.20 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Drumstick uttempor the actual teachings of the great">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/sport/1-120x120.jpg" alt="Drumstick uttempor the actual teachings of the great">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Drumstick uttempor the actual teachings of the great">
													Drumstick uttempor the actual teachings of the great 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$122.00 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image" href="#" target="_self" title="Amy Byer Big Girls' Colorblock  Trapeze orilamra ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/sport/4-120x120.jpg" alt="Amy Byer Big Girls' Colorblock  Trapeze orilamra ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Amy Byer Big Girls' Colorblock  Trapeze orilamra">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$1,990.00 
														</span>
														<span class="price-old">$2,000.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-1% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col_lhsd  block block_9">
							<div class="moduletable module so-extraslider-ltr home1-extra clearfix home1-extra-style2">
								<div class="head-title font-ct">
								<h2 class="modtitle">Food & Restaurant</h2>
								</div>
								<div class="modcontent">
								<div  id="so_extra_slider_food" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
									<div class="extraslider-inner owl2-carousel owl2-theme owl2-loaded extra-animate">
									<div class="category-slider-inner products-list yt-content-slider-2" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/2-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$123.20 
														</span>
														<span class="price-old">$98.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-13% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/8-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$123.20 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/1-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$123.20 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/9-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$123.20 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/7-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$182.00 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/food/4-120x120.jpg" alt="Vitaeelit pilama loves or pursues or desires to pain">
													</a>
												</div>
												</div>
												<div class="box-label">
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Vitaeelit pilama loves or pursues or desires to pain ">
													Vitaeelit pilama loves or pursues or desires to pain 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$182.00 
														</span>
													</div>
													<div class="price-sale price-right">
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col_dkfx  block block_9">
							<div class="moduletable module so-extraslider-ltr home1-extra clearfix home1-extra-style3">
								<div class="head-title font-ct">
								<h2 class="modtitle">Book Stationery</h2>
								</div>
								<div class="modcontent">
								<div id="so_extra_slider_book" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
									<div class="extraslider-inner owl2-carousel owl2-theme owl2-loaded extra-animate">
									<div class="category-slider-inner products-list yt-content-slider-2" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/3-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos">
													Bazem Carlo again is there anyone who loves oreos
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$98.00 
														</span>
														<span class="price-old">$122.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-20% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/5-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos">
													Bazem Carlo again is there anyone who loves oreos 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$108.80 
														</span>
														<span class="price-old">$122.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-20% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/8-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													Bazem Carlo again is there anyone who loves oreos  
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$122.00 
														</span>
														<span class="price-old">$146.00</span> 
													</div>
													<div class="price-sale price-right">
														<span class="discount">-17% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
										<div class="item products-list grid">
										<div class="item-wrap product-layout style1 ">
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/9-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													Bazem Carlo again is there anyone who loves oreos 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$42.80 
														</span>
														<span class="price-old">$1,202.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-97% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/1-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													Bazem Carlo again is there anyone who loves oreos  
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$50.00 
														</span>
														<span class="price-old">$122.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-60% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<div class="item-wrap-inner product-item-container">
											<div class="left-block">
												<div class="item-image">
												<div class="item-img-info product-image-container ">
													<a class="lt-image"  href="#" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													<img src="{{asset('frontend')}}/image/catalog/demo/product/book/2-120x120.jpg" alt="Bazem Carlo again is there anyone who loves oreos ">
													</a>
												</div>
												</div>
												<div class="box-label">
												<span class="label-product label-sale">Sale</span>
												</div>
											</div>
											<div class="right-block">
												<div class="caption">
												<h4 class="item-title">
													<a href="product.html" target="_self" title="Bazem Carlo again is there anyone who loves oreos ">
													Bazem Carlo again is there anyone who loves oreos 
													</a>
												</h4>
												<!-- Begin item-content -->
												<div class="item-content">
													<div class="total-price">
													<div class="price price-left">
														<span class="price product-price">
														$56.00 
														</span>
														<span class="price-old">$62.00</span>
													</div>
													<div class="price-sale price-right">
														<span class="discount">-10% 
														<strong>OFF</strong>
														</span>
													</div>
													</div>
												</div>
												<!-- End item-content -->
												</div>
												<!-- End item-info -->
											</div>
											</div>
											<!-- End item-wrap-inner -->
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<section>
					<div class="container page-builder-ltr">
						
						<div class="module so-latest-blog custom-ourblog clearfix default-nav preset01-2 preset02-2 preset03-2 preset04-2 preset05-1">
							<h2 class="modtitle"><span>Latest Blog</span></h2>
							<div class="modcontent">
							<div id="so_latest_blog_1" class="so-blog-external button-type2 button-type2">
								<div class="category-slider-inner products-list yt-content-slider blog-external clearfix " data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="2" data-items_column0="2" data-items_column1="2" data-items_column2="2"  data-items_column3="2" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="blog-detail.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/8-260x190.jpg" alt="Aestibulum ipsum a ornare car">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Aestibulum ipsum a ornare car" target="_self">Aestibulum ipsum a ornare car</a>
										</h4>
										<div class="description">
											Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi v..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="blog-detail.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/9-260x190.jpg" alt="Aestibulum ipsum a ornare lectus">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Aestibulum ipsum a ornare lectus" target="_self">Aestibulum ipsum a ornare lectus</a>
										</h4>
										<div class="description">
											Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi v..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="product.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/5-260x190.jpg" alt="Baby Came Back! Missed Out? Grab Your">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Baby Came Back! Missed Out? Grab Your" target="_self">Baby Came Back! Missed Out? Grab Your</a>
										</h4>
										<div class="description">
											Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi v..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="blog-detail.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/2-260x190.jpg" alt="Biten demonstraverunt lector ">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Biten demonstraverunt lector " target="_self">Biten demonstraverunt lector </a>
										</h4>
										<div class="description">
											Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi v..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="blog-detail.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/7-260x190.jpg" alt="Commodo laoreet semper">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Commodo laoreet semper" target="_self">Commodo laoreet semper</a>
										</h4>
										<div class="description">
											Commodo laoreet semper tincidunt lorem Vestibulum nunc at In Curabitur magna. Euismod euismod Suspendisse tortor ante ad..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								<div class="media">
									<div class="item head-button">
									<div class="content-img col-sm-6 col-xs-12">
										<a href="blog-detail.html" target="_self">
										<img src="{{asset('frontend')}}/image/catalog/demo/blog/3-260x190.jpg" alt="Neque porro quisquam est">
										</a>
									</div>
									<div class="content-detail col-sm-6 col-xs-12">
										<div class="media-content so-block">
										<div class="entry-date font-ct date-bottom">
											<span class="media-date-added"><i class="fa fa-clock-o"></i> 17 Oct 2017</span>
										</div>
										<h4 class="media-heading head-item">
											<a href="blog-detail.html" title="Neque porro quisquam est" target="_self">Neque porro quisquam est</a>
										</h4>
										<div class="description">
											Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius ..
										</div>
										<div class="readmore">
											<a href="blog-detail.html" target="_self">Read more</a>
										</div>
										</div>
									</div>
									</div>
								</div>
								</div>
							</div>
							</div>
						</div>
						
					</div>
				</section>
				<section>
					<div class="container page-builder-ltr">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_swee  block block_12">
					<div id="content_slider_mfn4" class="yt-content-slider owl2-theme yt-content-slider-style-default arrow-default top-brand owl2-carousel owl2-responsive-1200 owl2-loaded yt-testimonials-slider" data-transitionin="fadeIn" data-transitionout="fadeOut" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="6" data-items_column1="5" data-items_column2="4" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-pagination="no" data-lazyload="no" data-loop="yes" data-hoverpause="yes">
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-1.jpg" alt="title_dsdfg">
						</div>
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-2.jpg" alt="title_dsdfg">
						</div>
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-3.jpg" alt="title_dsdfg">
						</div>
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-4.jpg" alt="title_dsdfg">
						</div>
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-5.jpg" alt="title_dsdfg">
						</div>
						<div class="yt-content-slide yt-clearfix yt-content-wrap"> <img src="{{asset('frontend')}}/image/catalog/demo/brand/brand-6.jpg" alt="title_dsdfg">
						</div>
					</div>
					</div>
					</div>
				</section>
			</div>
		</div>
		<!-- //Main Container -->
@endsection