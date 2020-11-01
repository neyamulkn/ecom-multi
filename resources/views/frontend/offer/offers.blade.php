@extends('layouts.frontend')
@section('title', 'Offers  | '. Config::get('siteSetting.site_name') )

@section('content')
   
    <!-- Main Container  -->
    <div class="breadcrumbs">
        <div class="container">
            
            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
                <li>Offers</li>
            </ul>
        </div>
    </div>
    @include('frontend.sliders.slider2')
    @if(count($offers)>0)
        @foreach($offers as $offer)
        <section class="offers" style="padding: 10px 0; background:{{$offer->background_color}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section id="box-link1" class="section-style">
                            <div class="nav nav-tabs">
                              <span class="title" style="color: {{$offer->text_color}} !important;">{{$offer->title}}</span> 
                              <span class="moreBtn"><a style="color: {{$offer->text_color}} !important;" href="{{route('offer.details', $offer->slug)}}">See More</a></span>
                            </div>
                           
                              <div class="clearfix module horizontal">
                                <div class="products-category">
                                    <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="5" data-items_column0="6" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                      @foreach($offer->offer_products as $products)

                                      <div class="item-inner product-thumb trg transition product-layout">
                                          <div class="product-item-container">
                                                <div class="left-block ">
                                                    <div class="image product-image-container">
                                                        <a class="lt-image" href="{{ route('product_details', $products->product->slug) }}" >
                                                        <img src="{{asset('upload/images/product/thumb/'. $products->product->feature_image)}}" class="img-1 img-responsive">
                                                        </a>
                                                         @if(!Request::is('/'))
                                                        <a title="Quickview product details" data-toggle="tooltip" class="btn-button btn-quickview quickview quickview_handler" onclick="quickview('{{$products->product->id}}')" href="javascript:void(0)"> <i class="fa fa-search"></i> </a>
                                                        @endif
                                                    </div>
                                                    <div class="box-label">
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="{{ route('product_details', $products->product->slug) }}">{{Str::limit($products->product->title, 20)}}</a></h4>
                                                        <div class="total-price clearfix" style="visibility: hidden; display: block;">
                                                            <div class="price price-left">
                                                                <label for="ratting5">{{\App\Http\Controllers\HelperController::ratting(round($products->product->reviews->avg('ratting'), 1))}}</label><br/>
                                                            @php
                                                                $discount =  \App\Http\Controllers\OfferController::discount($products->product->id, Session::get('offerId'), 'offerpage');
                                                            @endphp

                                                            @if($discount)
                                                                <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{ $discount['discount_price'] }}</span>
                                                                <span class="price-old">{{Config::get('siteSetting.currency_symble')}}{{$products->product->selling_price}}</span>
                                                            @else
                                                                <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{$products->product->selling_price}}</span>
                                                            @endif
                                                            </div>
                                                            @if($discount)
                                                            <div class="price-sale price-right">
                                                              <span class="discount">
                                                                  -@if($discount['discount_type'] != '%'){{$discount['discount_type']}}@endif{{$discount['discount']}}@if($discount['discount_type'] == '%'){{$discount['discount_type']}}@endif
                                                                <strong>OFF</strong>
                                                              </span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="button-group2">

                                                        <button class="bt-cart addToCart" type="button" data-toggle="tooltip" title="Add to cart" onclick="addToCart({{$products->product->id}})" > <span>Add to cart</span></button>
                                                        <button class="bt wishlist" type="button" title="Add to Wish List"  @if(Auth::check()) onclick="addToWishlist({{$products->product->id}})" data-toggle="tooltip" @else data-toggle="modal" data-target="#so_sociallogin" @endif><i class="fa fa-heart"></i></button>
                                                        <button class="bt compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="addToCompare({{$products->product->id}})" ><i class="fa fa-exchange"></i></button>
                                                  </div>
                                                </div>
                                            </div>
                                      </div>
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    @else
        <div style="text-align: center;">
            <i style="font-size: 80px;" class="fa fa-shopping-cart"></i>
            <h1>Sorry at this moment any offer not available.</h1>
            <p>Looks line you have no items in your shopping cart.</p>
            Click here <a href="{{url('/')}}">Continue Shopping</a>
        </div>
    @endif
 @endsection

@section('js')

@endsection