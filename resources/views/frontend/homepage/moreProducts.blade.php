@extends('layouts.2frontend')
@section('title', $section->title)

@section('content')

    <!-- Main Container  -->
    <div class="breadcrumbs">
        <div class="container">
            
            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
              
                <li><a href="#">{{ $section->title }}</a></li>
             
            </ul>
        </div>
    </div>
    
    <div class="container product-detail">
        <div class="row">
         
            <div id="content" class="col-md-9 col-sm-9 col-xs-12 sticky-content" >

                <div id="pageLoading"></div>
                <div class="category-ksh form-group">
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="banners">
                      <div>
                        <a href="#">
                        <img src="{{asset('frontend')}}/image/catalog/demo/category/electronic-cat.png" alt="Apple Cinema 30&quot;">
                        </a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="products-category">
                     
                    @if(count($products)>0)
                        
                        <div class="products-list grid row number-col-6 so-filter-gird">
                            @foreach($products as $product)
                            <div class="product-layout col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                @include('frontend.homepage.products')
                            </div>
                            @endforeach
                        </div>

                        <div class="product-filter product-filter-bottom filters-panel">
                            <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                               {{$products->appends(request()->query())->links()}}
                              </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 text-right">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of total {{$products->total()}} entries ({{$products->lastPage()}} Pages)</div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12  sticky-content">
                <?php $related_products = App\Models\Product::whereNotIn('id', explode(',', $section->product_id))->where('subcategory_id', $products[0]->subcategory_id)->orderBy('id', 'desc')->paginate(5);
                                ?>
                @if(count($related_products)>0)
                <div class="module so-deals-ltr home2_deals_style3">
                    <h3 class="modtitle font-ct">Related Products</h3>
                    <div class="modcontent">
                        <div id="so_deals_0399" class="so-deal products-list grid modcontent clearfix preset02-2 preset02-2 preset02-2 preset03-2 preset04-1  button-type1  style2">
                            <div class="extraslider-inner product-layout" data-effect="none">
                                
                                @foreach($related_products as $product)
                                <div class="item" style="border-bottom: 1px solid #ddd;padding:0 10px;">
                                    <div class="product-thumb product-item-container transition">
                                        <div class="left-block">
                                            <div class="product-image-container so-quickview">
                                                @if($product->discount)
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-{{$product->discount}}%</span>
                                                </div>
                                                @endif
                                                <a href="{{ route('product_details', $product->slug) }}" target="_self">
                                                <img src="{{asset('upload/images/product/thumb/'. $product->feature_image)}}"  class="img-responsive">
                                                </a>
                                                <a title="Quickview product details" data-toggle="tooltip" class="btn-button btn-quickview quickview quickview_handler" onclick="quickview({{$product->id}})" href="javascript:void(0)"> <i class="fa fa-search"></i> </a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                
                                                <h4><a href="{{ route('product_details', $product->slug) }}" target="_self" title="Computer Science saepe eveniet ut et volu redae">{{Str::limit($product->title, 20)}}</a></h4>
                                                <div class="price">
                                                     <label for="ratting5"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></label><br/>
                                                    @if($product->discount)
                                                        <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</span>
                                                        <span class="price-old">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                                                    @else
                                                        <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                            <div class="button-group2">
                                                <button class="bt-cart addToCart" type="button" data-toggle="tooltip" title="Add to cart" onclick="addToCart({{$product->id}})" > <span>Add to cart</span></button>
                                                <button class="bt wishlist" type="button" title="Add to Wish List"  @if(Auth::check()) onclick="addToWishlist({{$product->id}})" data-toggle="tooltip" @else data-toggle="modal" data-target="#so_sociallogin" @endif><i class="fa fa-heart"></i></button>
                                                <button class="bt compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="addToCompare({{$product->id}})" ><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    
 @endsection
