@extends('layouts.frontend')
@section('title', $product->title . ' | '. Config::get('siteSetting.site_name'))
@section('metatag')
    <meta name="description" content="{!! strip_tags($product->description) !!}">
    <meta name="image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta name="rating" content="5">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="{{$product->title}}">
    <meta itemprop="description" content="{!! strip_tags($product->description) !!}">
    <meta itemprop="image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$product->title}}">
    <meta name="twitter:description" content="{!! strip_tags($product->description) !!}">
    <meta name="twitter:site" content="{{ url()->full() }}">
    <meta name="twitter:creator" content="{{$product->user->name}}">
    <meta name="twitter:image:src" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->
    
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta property="og:title" content="{{$product->title}}">
    <meta property="og:description" content="{!! strip_tags($product->description) !!}">
    <meta property="og:image" content="{{asset('upload/images/product/'.$product->feature_image) }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:site_name" content="{{Config::get('siteSetting.site_name')}}">
    <meta property="og:locale" content="en">
    <meta property="og:video" content="#">
    <meta property="fb:admins" content="1323213265465">
    <meta property="fb:app_id" content="13212465454">
    <meta property="og:type" content="product">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "category":"Corporate",
      "name": "{{$product->title}}",
      "image": [
        "{{asset('upload/images/product/'.$product->feature_image) }}"
       ],
      "description": "{!! strip_tags($product->description) !!}",
      "sku": "{{Config::get('siteSetting.site_name')}}",
      "mpn": "925872",
      "brand": {
        "@type": "Thing",
        "name": "{{Config::get('siteSetting.site_name')}}"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "{{$product->user->name}}"
        }
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.4",
        "reviewCount": "89"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{ url()->full() }}",
        "priceCurrency": "USD",
        "price": "{{ $product->selling_price }}",
        "priceValidUntil": "{!!  \Carbon\Carbon::parse($product->created_at)->format('M d, Y') !!}",
        "itemCondition": "https://schema.org/UsedCondition",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "name": "{{$product->user->name}}"
        }
      }
    }
    </script>

@endsection

@section('css')   
<style>

  .reviews{background: #fff;}
  .single-review{border-bottom: 1px solid #eff0f5;padding: 10px;}
  .single-review .review-img{float: left;flex: inherit;}
  .single-review .review-top-wrap{margin:0px;}

  .heading {
    font-size: 25px;
    margin-right: 25px;
  }

  .average-ratting .fa {
    font-size: 25px;
  }

  .checked {
    color: orange;
  }

  /* Three column layout */
  .side {
    float: left;
    width: 15%;
    margin-top:10px;
  }

  .middle {
    margin-top:10px;
    float: left;
    width: 70%;
  }

  /* Place text to the right */
  .right {
    text-align: right;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* The bar container */
  .bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
  }

  /* Individual bars */
  .bar-5 {width: 100%; height: 18px; background-color: #ff9800;}
  .bar-4 {width: 30%; height: 18px; background-color: #ff9800;}
  .bar-3 {width: 10%; height: 18px; background-color: #ff9800;}
  .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
  .bar-1 {width: 15%; height: 18px; background-color: #ff9800;}

  /* Responsive layout - make the columns stack on top of each other instead of next to each other */
  @media (max-width: 400px) {
    .side, .middle {
      width: 100%;
    }
    .right {
      display: none;
    }
  }

  .review-filterSort {
      height: 44px;
      padding-left: 10px;
      margin: 10px 0;
      border-top: 1px solid #eff0f5;
      border-bottom: 1px solid #eff0f5;
  }
  .review-filterSort .filterSort {
      float: right;
      display: inline-block;
      padding: 0 12px;
      height: 44px;
      line-height: 44px;
      border-left: 1px solid #eff0f5;
      font-size: 13px;
      color: #757575;
      cursor: pointer;
  }


  .review-filterSort .title {
      display: inline-block;
      height: 44px;
      line-height: 44px;
      font-size: 14px;
      color: #212121;
  }

  .availability.in-stock span {
      color: #fff;
      background-color: #5cb85c;
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 12px;
      font-weight: bold;
  }

  /*text more & less*/

  a.morelink {
      text-decoration:none;
      outline: none;
  }
  .morecontent span {
      display: none;
  }
  /*text more & less*/
  .divrigth_border:after {
  content: '';
    width: 0;
    height: 100%;
    position: absolute;
    top: 3px;
    right: 0px;
    margin-left: 0px;
    z-index: 999;
    border-right: 1px solid #ececec;
  }

  .delivery_header {
      padding: 10px 0px;
      margin-bottom: 8px;
      border-bottom: 1px solid #eff0f5;
  }
  .location_icon {
      width: 24px;
      font-size: 25px;
      padding-right: 10px;
      display: table-cell;
      vertical-align: middle;

  }


  .all_location{
      position: absolute;
      top: 65px;
      right: 15px;
      background: #fff;
      width: 95%;
      padding: 0 10px;
      text-align: left;
      z-index: 999;
      display: none;
    }

  ul.location-list li{border-bottom: 1px solid #e6e6e6cc;cursor: pointer;padding:2px 5px;}
  ul.location-list li:hover{background: #f9f9f9;}

  .location_address {
      max-width: 195px;
      line-height: initial;
      word-break: break-word;
      display: table-cell;
      vertical-align: middle;
      color: #202020;
      padding-right: 15px;
  }
  .location_address p{padding: 0;margin: 0;}
  .location_address i{font-size: 11px;}


  .location_link{
    font-size: 11px;
    display: table-cell;
    vertical-align: middle;
    color: #009db4;
    text-align: right;
    text-transform: uppercase;
    white-space: nowrap;
  }
  .location_link .rate{font-size: 20px;color:#e74c3c;}

  .wishlistbtn{width: 100%;margin-bottom: 10px;}
  .buy-now{width: 100%;background: #ef8c0f;}
  .seller-option{ margin: 10px 0;}
  .seller-header{ border-bottom: 1px solid #eae9e9;font-size: 17px;color: #000;}
  .seller_content { width: 150px; padding-right: 10px; display: table-cell; font-size: 12px;vertical-align: text-bottom;padding: 0 5px;border-right: 1px solid #e6e6e6;}
  .seller_ratting span.fa-stack{margin: -2px;}
  .chat_response, .seller_shipTime{font-size: 25px;}
  .view-stor{width:100%;margin:3px 0px; }
  .contact-seller{margin-top: 7px;}
  .contact-seller a{background: #0077B5 !important;}

  .best-seller-custom.best-seller {

    border-top: 0 !important; 
    box-shadow: none;
    border: none;;
 
  }
  .attribute_title{display: inline-block;vertical-align: top;min-width: 50px;}

  .attributes{
    box-sizing: border-box;
    display: inline-block;
    position: relative;
    margin-right: 5px;
    overflow: hidden;
    text-align: center;

  }
  .attributes_value{
    box-sizing: border-box;
    display: inline-block;
    position: relative;
    height: 25px;
    margin-right: 5px;
    overflow: hidden;
    text-align: center;
    border: 1px solid #eff0f5;
    border-radius: 2px;
    padding: 0 3px;
   
  }

  .attribute-select select {
      border-radius: 3px;
      background: #fff;
      border: 1px solid #ff5e00;
      color: #3d3d3d;
      padding: 0 9px;
      margin-bottom: 10px;
   
  }

  .attributes label{margin: 0;cursor: pointer;text-shadow: 0px 1px 0px #0000003d;}
  .attributes input{display: none;}
   
 .attributes .active .selected{
    background: url('{{asset('frontend')}}/image/icon/icon-whylist.png') no-repeat left;
    padding-left: 15px;
   
   
}
    
</style>
@endsection
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-cate">
                <li><a href="{{route('home.category', $product->get_category->slug) }}">{{$product->get_category->name}}</a></li>
                <li><a href="{{route('home.category', [$product->get_category->slug, $product->get_subcategory->slug]) }}">{{$product->get_subcategory->name}}</a></li>
                @if($product->get_childcategory)
                <li><a href="{{route('home.category', [$product->get_category->slug, $product->get_subcategory->slug, $product->get_childcategory->slug]) }}">{{$product->get_childcategory->name}}</a></li>
                @endif
                <li>{{$product->title}}</li>
            </ul>
        </div>
    </div>

    <!-- Shop details Area start -->
    <div class="container product-detail">
        <div class="row" style="background: #fff">
            <div id="content" class="col-md-9 col-sm-9 col-xs-12 divrigth_border sticky-content">
                <div class="sidebar-overlay "></div>
                <div class="product-view product-detail">
                  <div class="product-view-inner clearfix">
                     <div class="content-product-left  col-md-5 col-sm-6 col-xs-12">
                      <div class="so-loadeding"></div>
                      <div class="large-image  class-honizol">
                       
                       <img class="product-image-zoom" src="{{asset('upload/images/product/zoom/'. $product->feature_image)}}" data-zoom-image="{{asset('upload/images/product/'. $product->feature_image)}}" title="image">
                      </div>
                      <div id="thumb-slider" class="full_slider category-slider-inner products-list yt-content-slider" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="3" data-items_column1="3" data-items_column2="3" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                          <div class="owl2-item " >
                            <div class="image-additional">
                             <a data-index="0" class="img thumbnail" data-image="{{asset('upload/images/product/'. $product->feature_image)}}" title="Canada Travel One or Two European Facials at  Studio">
                             <img src="{{asset('upload/images/product/thumb/'. $product->feature_image)}}" title="thumbnail" >
                             </a>
                            </div>
                           </div>
                          <?php $index = 1; ?>
                          @foreach($product->get_galleryImages as $image)
                           <div class="owl2-item " >
                            <div class="image-additional">
                             <a data-index="{{$index}}" class="img thumbnail" data-image="{{asset('upload/images/product/gallery/'. $image->image_path)}}" title="Canada Travel One or Two European Facials at  Studio">
                             <img src="{{asset('upload/images/product/gallery/thumb/'. $image->image_path)}}" title="thumbnail {{$index}}" >
                             </a>
                            </div>
                           </div>
                            <?php $index++; ?>
                         @endforeach

                           
                      </div>
                    </div>
                    <div class="content-product-right col-md-7 col-sm-6 col-xs-12">
                      
                      <div class="title-product">
                       <h1>{{$product->title}}</h1>
                      </div>
                      <div class="box-review">
                        <div class="rating">
                          <div class="rating-box">
                            @for($i=1; $i<=5; $i++)
                               <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            @endfor
                            <a class="reviews_button" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a> / <a class="write_review_button" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                          </div>
                        </div>
                       
                        @if($product->get_brand)
                        <p>Brand: {{$product->get_brand->name}} | @endif <span class="availability in-stock"> Availability: <span> <i class="fa fa-check-square-o"></i> In Stock</span></span> </p>
                      </div>
                      <div class="product_page_price price">
                     
                        @if($product->discount)
                          <span class="price-new"><span id="price-special">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</span></span>
                            <span>
                              <span class="price-old" id="price-old">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span> 
                              <span class="discount">
                                -{{$product->discount}}%
                                <strong>OFF</strong>
                              </span>
                            </span>
                        @else
                            <span class="price-new"><span id="price-special">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span></span>
                        @endif
                      
                      </div>
                      <form action="{{route('cart.add')}}" id="addToCart" method="get"> 
                      <div class="product-box-desc">
                        <div class="inner-box-desc">
                          <div class="model"><span>Product Code: </span> Simple Product</div>
                          <div class="reward"><span>Reward Points:</span> 400</div>
                        </div>
                        <!-- //get feature attribute-->
                        @foreach ($product->get_features->where('attribute_id', '!=', null) as $feature)
                          <!-- show attribute name -->
                          <?php $i=1; $attribute_name = str_replace(' ', '', $feature->get_attribute->name); ?>
                          @if($feature->get_attribute->display_type==2)

                          <div class="product-size attribute-select">
                              <span class="attribute_title"> {{$feature->get_attribute->name}}: </span>
                              <select name="{{$attribute_name}}">
                                  <!-- get feature details -->
                                  @foreach($feature->get_featureDetails as $featureDetail)

                                    <option value="{{ $featureDetail->get_attributeValue->name}}">{{ $featureDetail->get_attributeValue->name}}</option>
                                   
                                  @endforeach
                              </select>
                          </div>
                          @else
                          <div class="product-size">
                            <ul>
                                <li class="attribute_title">{{$feature->get_attribute->name}}: </li>
                                <li class="attributes {{$attribute_name}}">
                                <!-- get feature details -->
                                 @foreach($feature->get_featureDetails as $featureDetail)
                                  <!-- show feature attribute value name -->
                                    
                                    <label @if($featureDetail->color) style="background:{{$featureDetail->color}}; color:#ebebeb; " @endif class="attributes_value @if($i == 1) active @endif" for="{{$attribute_name.$featureDetail->get_attributeValue->id}}" >
                                    <span class="selected"></span>
                                    <input @if($i == 1) checked @endif onclick="changeColor('{{$attribute_name}}', {{$featureDetail->get_attributeValue->id}})" id="{{$attribute_name.$featureDetail->get_attributeValue->id}}" value="{{ $featureDetail->get_attributeValue->name}}" name="{{$attribute_name}}"  type="{{($feature->get_attribute->display_type==3) ? 'radio' : 'radio'}}" />
                                      
                                    {{ $featureDetail->get_attributeValue->name}}</label>
                                    <?php $i++; ?>
                                  
                                  @endforeach
                                </li>
                              </ul>
                          </div>
                          @endif
                        @endforeach
                      </div>
                      <div class="short_description form-group">
                       <h3>OverView</h3>
                       {{Str::limit($product->summery, 150)}}
                      </div>
                      <div id="product">
                          <div class="box-cart clearfix">
                          <div class="form-group box-info-product">
                             <div class="option quantity">
                              <div class="input-group quantity-control" unselectable="on" style="user-select: none;">
                               <input class="form-control" type="text" name="quantity" value="1">
                               <input type="hidden" name="product_id" value="{{$product->id}}">
                               <span class="input-group-addon product_quantity_down fa fa-caret-down"></span>
                               <span class="input-group-addon product_quantity_up fa fa-caret-up"></span>
                              </div>
                             </div>
                             <div class="cart">
                              <input type="button" value="Add to Cart" class="addToCartBtn btn btn-mega btn-lg " data-toggle="tooltip" title="Add to cart" data-original-title="Add to cart">
                           
                              <input style="background: #0077b5;" type="button" id="buy-now" value="Buy Now" class="btn btn-success" data-toggle="tooltip" title="Buy Now" data-original-title="Buy Now">
                              </div>
                             <div class="add-to-links wish_comp">
                              <ul class="blank">
                               <li class="wishlist">
                                <a title="Add To Wishlist" onclick="addToWishlist({{$product->id}})" ><i class="fa fa-heart"></i></a>
                               </li>
                               <li class="compare">
                                <a title="Add To Compare" onclick="addToCompare({{$product->id}})"  ><i class="fa fa-random"></i></a>
                               </li>
                              </ul>
                             </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 sticky-content">
                <div class="delivery-option">
                  <div class="delivery-header">
                    <div class="delivery_header_title">Delivery Options</div>
                  </div>
                  <div class="delivery_header">
                      <div class="delivery_location">
                        <div class="location_icon">
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="location_address">
                            Dhaka, Dhaka - North, Bashundhara R/A
                        </div>
                        <div class="location_link">
                            <i class="fa fa-edit"></i> <a class="">CHANGE</a>
                            <div class="all_location">
                              <p>Select Region</p>
                              <input placeholder="Select Region" type="text" class="form-control" name="">
                              <ul class="location-list">
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                                <li>fasdf</li>
                              </ul>
                            </div>
                        </div>
                      </div> 
                  </div>
                  <div class="delivery_header">
                    <div class="delivery_location">
                          <div class="location_icon">
                            <i class="fa fa-home"></i>
                          </div>
                          <div class="location_address"> 
                            <p>Home Delivery</p>
                            <i>Shipping Time: 5-7 days</i>
                           </div>
                          <div class="location_link">
                             <a class="rate">$ 60</a>
                          </div>
                      </div> 
                  </div>
                  <div class="delivery_header">
                    <div class="delivery_location">
                          <div class="location_icon">
                            <i class="fa fa-money"></i>
                          </div>
                          <div class="location_address"> 
                            <p>Cash on Delivery Available</p>
                            
                           </div>
                          
                      </div> 
                  </div>
                </div>
           
                <a href="javascript:void(0)" title="Add To Wishlist" @if(Auth::check())  onclick="addToWishlist({{$product->id}})" @else data-toggle="modal" data-target="#so_sociallogin" @endif class="btn wishlistbtn" > Add To Wishlist </a>
                <a  href="javascript:void(0)" title="Add To Compare" onclick="addToCompare({{$product->id}})"  class="btn buy-now">Add To Compare </a>
                <div class="seller-option">
                  Sold By
                  <div class="seller-header">
                     <i class="fa-shopping-bag"></i> SkySara

                      <span style="float: right;"><i class="fa fa-comments"></i> Chat Now</span>
                  </div>


                  <div class="delivery_header">
                    <div class="delivery_location">
                          <div class="seller_content ">
                            Ratings
                            <div class="seller_ratting">
                             @for($i=1; $i<=5; $i++)
                               <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            @endfor
                            </div>
                          </div>
                          <div class="seller_content ">
                             Ship on Time

                             <div class="seller_shipTime"> 90%</div>
                           
                           </div>
                          <div class="seller_content">
                            Response Rate
                            <div class="chat_response"> 90%</div>
                           
                          </div>
                          
                            <div class="contact-seller">
                              <ul class="list">
                                <li>
                                  <a class="view-stor btn" href="javascript:;" data-toggle="modal" data-target="#comment-log-reg">
                                    <i class="icofont-plus"></i>
                                    Visit Store
                                  </a>
                                </li>
                                <li>
                                  <a class="view-stor btn" href="javascript:;" data-toggle="modal" data-target="#comment-log-reg">
                                    <i class="icofont-plus"></i>
                                    Add To Favorite Seller
                                  </a>
                                </li>
                                <li>
                                  <a class="view-stor btn" >
                                    <i class="icofont-ui-chat"></i>
                                    Contact Seller
                                  </a>
                                </li>
                              </ul>
                          </div>
                      </div> 
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="product-attribute module">
          <div class="row content-product-midde clearfix">
              <div class="col-xs-12">
                <div class="producttab ">
                  <div class="tabsslider  ">
                    <ul class="nav nav-tabs font-sn">
                       <li class="active"><a data-toggle="tab" href="#tab-description">Description</a></li>
                       
                       <li><a href="#tab-specification" data-toggle="tab">Specification</a></li>
                       <li><a href="#tab-review" data-toggle="tab">Reviews (0)</a></li>
                       <li><a href="#tab-review" data-toggle="tab">Buy & Return Policy</a></li>
                    </ul>
                    <div class="tab-content ">
                      <div class="tab-pane active" id="tab-description">
                       
                         {!!$product->description!!}
                         
                      </div>

                      <div class="tab-pane" id="tab-specification">
                        <div class="row">
                          <div class="col-md-8" >
                          @foreach($product->get_features->where('attribute_id', '=', null) as $feature)
                           
                            <div class="col-6 col-md-6">
                                <strong>{{$feature->name}}: </strong> {{$feature->value}} 
                            </div>
                          @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab-review">
                        <form class="form-horizontal" id="form-review">
                         <div id="review">
                          <p>There are no reviews for this product.</p>
                         </div>
                         <h2>Write a review</h2>
                         <div class="form-group required">
                          <div class="col-sm-12">
                             <label class="control-label" for="input-name">Your Name</label>
                             <input type="text" name="name" value="" id="input-name" class="form-control">
                          </div>
                         </div>
                         <div class="form-group required">
                          <div class="col-sm-12">
                             <label class="control-label" for="input-review">Your Review</label>
                             <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                             <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                          </div>
                         </div>
                         <div class="form-group required">
                          <div class="col-sm-12">
                             <label class="control-label">Rating</label>
                             &nbsp;&nbsp;&nbsp; Bad&nbsp;
                             <input type="radio" name="rating" value="1">
                             &nbsp;
                             <input type="radio" name="rating" value="2">
                             &nbsp;
                             <input type="radio" name="rating" value="3">
                             &nbsp;
                             <input type="radio" name="rating" value="4">
                             &nbsp;
                             <input type="radio" name="rating" value="5">
                             &nbsp;Good
                          </div>
                         </div>
                         <div class="buttons clearfix" style="visibility: hidden; display: block;">
                          <div class="pull-right">
                             <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                          </div>
                         </div>
                        </form>
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
      <div class="container">
        <div class="row" style="background: #fff">
            <div class="col-md-9 sticky-content divrigth_border">
              <div class="row">
                  <div class="col-md-12">
                      <!-- Section Title -->
                      <div class="section-title">
                          <h2>Customer reviews</h2>
                      </div>
                      <!-- Section Title -->
                  </div>
              </div>  
              <div class="row">
                  <div class="col-md-4 average-ratting">
                      <h1 class="heading">User Rating</h1>
                      <p style="font-size: 30px;padding: 10px 0;"><span style="font-size: 50px">4.8</span>/5</p>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <p>4.1 average based on 254 reviews.</p>
                      
                      <a href="#">Write Your review</a>

                  </div>
                  <div class="col-md-8">
                      <div class="side">
                      <div>5 star</div>
                      </div>
                      <div class="middle">
                      <div class="bar-container">
                      <div class="bar-5"></div>
                      </div>
                      </div>
                      <div class="side right">
                      <div>150</div>
                      </div>
                      <div class="side">
                      <div>4 star</div>
                      </div>
                      <div class="middle">
                      <div class="bar-container">
                      <div class="bar-4"></div>
                      </div>
                      </div>
                      <div class="side right">
                      <div>63</div>
                      </div>
                      <div class="side">
                      <div>3 star</div>
                      </div>
                      <div class="middle">
                      <div class="bar-container">
                      <div class="bar-3"></div>
                      </div>
                      </div>
                      <div class="side right">
                      <div>15</div>
                      </div>
                      <div class="side">
                      <div>2 star</div>
                      </div>
                      <div class="middle">
                      <div class="bar-container">
                      <div class="bar-2"></div>
                      </div>
                      </div>
                      <div class="side right">
                      <div>6</div>
                      </div>
                      <div class="side">
                      <div>1 star</div>
                      </div>
                      <div class="middle">
                      <div class="bar-container">
                      <div class="bar-1"></div>
                      </div>
                      </div>
                      <div class="side right">
                      <div>20</div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="review-filterSort">
                          <span class="title">Product Reviews</span>
                          <div class="filterSort">
                              <i class="fa fa-sort"></i><span data-spm-anchor-id="a2a0e.pdp.ratings_reviews.i4.321c6d0b3BAEBk">Filter:</span><span class="condition">All star</span>
                          </div>
                          <div class="filterSort">
                              <i class="fa fa-sort"></i><span>Sort:</span>
                              <span class="condition" data-spm-anchor-id="a2a0e.pdp.ratings_reviews.i3.321c6d0b3BAEBk">Relevance</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="review-wrapper">
                          <div class="single-review">
                              <div class="review-img">
                                  <img width="50" src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/electronic/7.jpg" alt="" />
                              </div>
                              <div class="review-content">
                                  <div class="review-top-wrap">
                                      <div class="review-left">
                                          <div class="rating-product">
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star "></i>
                                          </div>
                                      </div>
                                      <div class="review-left">
                                          <a href="#">Reply</a>
                                      </div>
                                  </div>
                                  By <a href="#">White Lewis</a> | 4 weeks ago
                                  <div class="review-bottom">
                                      <p class="more">
                                          Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                      </p>
                                  </div>
                              </div>
                          </div>
                         <div class="single-review">
                              <div class="review-img">
                                  <img width="50" src="{{asset('frontend')}}/images/testimonial-image/1.png" alt="" />
                              </div>
                              <div class="review-content">
                                  <div class="review-top-wrap">
                                      <div class="review-left">
                                          <div class="rating-product">
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star checked"></i>
                                              <i class="fa fa-star "></i>
                                          </div>
                                      </div>
                                      <div class="review-left">
                                          <a href="#">Reply</a>
                                      </div>
                                  </div>
                                  By <a href="#">White Lewis</a> | 4 weeks ago
                                  <div class="review-bottom">
                                      <p class="more">
                                          Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                      </p>
                                  </div>
                              </div>
                          </div>
                         
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-3 sticky-content">
              <div class="moduletable module so-extraslider-ltr best-seller best-seller-custom">
                <h3 class="modtitle"><span>Best Sellers</span></h3>
                <div class="modcontent">
                  <div id="so_extra_slider" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
                    <div class="extraslider-inner " >
                      <div class="item ">
                        <div class="item-wrap style1 ">
                          <div class="item-wrap-inner">
                           <div class="media-left">
                            <div class="item-image">
                               <div class="item-img-info product-image-container ">
                                <div class="box-label">
                                </div>
                                <a class="lt-image" data-product="104" href="#" target="_self" title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2)">
                                <img src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/electronic/25.jpg" alt="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2)">
                                </a>
                               </div>
                            </div>
                           </div>
                           <div class="media-body">
                            <div class="item-info">
                               <!-- Begin title -->
                               <div class="item-title">
                               <a href="product.html" target="_self" title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2) ">
                                Toshiba Pro 21"(21:9) FHD  IPS LED 1920X1080 HDMI(2) 
                                </a>
                               </div>
                               <!-- Begin ratting -->
                               <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                               </div>
                               <!-- Begin item-content -->
                               <div class="price">
                                <span class="old-price product-price">$62.00</span>
                                <span class="price-old">$337.99</span>
                               </div>
                            </div>
                           </div>
                           <!-- End item-info -->
                          </div>
                          <!-- End item-wrap-inner -->
                        </div>
                         <!-- End item-wrap -->
                        <div class="item-wrap style1 ">
                          <div class="item-wrap-inner">
                           <div class="media-left">
                            <div class="item-image">
                               <div class="item-img-info product-image-container ">
                                <div class="box-label">
                                </div>
                                <a class="lt-image" data-product="66" href="#" title="Compact Portable Charger (Power Bank) with Premium">
                                <img src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/electronic/19.jpg" alt="Compact Portable Charger (Power Bank) with Premium">
                                </a>
                               </div>
                            </div>
                           </div>
                           <div class="media-body">
                            <div class="item-info">
                               <!-- Begin title -->
                               <div class="item-title">
                                <a href="product.html" target="_self" title="Compact Portable Charger (Power Bank) with Premium ">
                                Compact Portable Charger (Power Bank) with Premium 
                                </a>
                               </div>
                               <!-- Begin ratting -->
                               <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                               </div>
                               <!-- Begin item-content -->
                               <div class="price">
                                <span class="old-price product-price">$74.00</span>
                                <span class="price-old">$241.99</span>
                               </div>
                            </div>
                           </div>
                           <!-- End item-info -->
                          </div>
                          <!-- End item-wrap-inner -->
                         </div>
                         <div class="item-wrap style1 ">
                          <div class="item-wrap-inner">
                           <div class="media-left">
                            <div class="item-image">
                               <div class="item-img-info product-image-container ">
                                <div class="box-label">
                                </div>
                                <a class="lt-image" data-product="66" href="#" title="Compact Portable Charger (Power Bank) with Premium">
                                <img src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/electronic/19.jpg" alt="Compact Portable Charger (Power Bank) with Premium">
                                </a>
                               </div>
                            </div>
                           </div>
                           <div class="media-body">
                            <div class="item-info">
                               <!-- Begin title -->
                               <div class="item-title">
                                <a href="product.html" target="_self" title="Compact Portable Charger (Power Bank) with Premium ">
                                Compact Portable Charger (Power Bank) with Premium 
                                </a>
                               </div>
                               <!-- Begin ratting -->
                               <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                               </div>
                               <!-- Begin item-content -->
                               <div class="price">
                                <span class="old-price product-price">$74.00</span>
                                <span class="price-old">$241.99</span>
                               </div>
                            </div>
                           </div>
                           <!-- End item-info -->
                          </div>
                          <!-- End item-wrap-inner -->
                         <!-- End item-wrap -->
                         <div class="item-wrap style1 ">
                          <div class="item-wrap-inner">
                           <div class="media-left">
                            <div class="item-image">
                               <div class="item-img-info product-image-container ">
                                <div class="box-label">
                                </div>
                                <a class="lt-image" target="_self" title="Philipin Tour Group Manila/ Pattaya / Mactan ">
                                <img src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/travel/8.jpg" alt="Philipin Tour Group Manila/ Pattaya / Mactan ">
                                </a>
                               </div>
                            </div>
                           </div>
                           <div class="media-body">
                            <div class="item-info">
                               <!-- Begin title -->
                               <div class="item-title">
                                <a href="product.html" target="_self" title="Philipin Tour Group Manila/ Pattaya / Mactan  ">
                                Philipin Tour Group Manila/ Pattaya / Mactan  
                                </a>
                               </div>
                               <!-- Begin ratting -->
                               <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                               </div>
                               <!-- Begin item-content -->
                               <div class="price">
                                <span class="old-price product-price">$74.00</span>
                                <span class="price-old">$122.00</span>
                               </div>
                            </div>
                           </div>
                           <!-- End item-info -->
                          </div>
                          <!-- End item-wrap-inner -->
                         </div>
                         <!-- End item-wrap -->
                         <div class="item-wrap style1">
                          <div class="item-wrap-inner">
                           <div class="media-left">
                            <div class="item-image">
                               <div class="item-img-info product-image-container ">
                                <div class="box-label">
                                </div>
                                <a class="lt-image" data-product="78" href="#">
                                <img src="{{asset('frontend')}}/{{asset("frontend")}}/image/catalog/demo/product/electronic/4.jpg" alt="Portable  Compact Charger (External Battery) t45">
                                </a>
                               </div>
                            </div>
                           </div>
                           <div class="media-body">
                            <div class="item-info">
                               <!-- Begin title -->
                               <div class="item-title">
                                <a href="product.html" target="_self" title="Portable  Compact Charger (External Battery) t45 ">
                                Portable  Compact Charger (External Battery) t45 
                                </a>
                               </div>
                               <!-- Begin ratting -->
                               <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                               </div>
                               <!-- Begin item-content -->
                               <div class="price">
                                <span class="old-price product-price">$74.00</span>
                                <span class="price-old">$122.00</span>
                               </div>
                            </div>
                           </div>
                           <!-- End item-info -->
                          </div>
                          <!-- End item-wrap-inner -->
                         </div>
                         <!-- End item-wrap -->
                      </div>
                     
                    </div>
                  </div>
                </div>
             </div>
            </div>
          </div>
        </div>
    </section>
        
@endsection


@section('js')

  <script>
    $('.large-image').magnificPopup({
      items: [
        {src: '{{asset("upload/images/product/". $product->feature_image)}}' },
      @foreach($product->get_galleryImages as $image)
        {src: '{{asset("upload/images/product/gallery/". $image->image_path)}}' },
      @endforeach
      ],
      gallery: { enabled: true, preload: [0,2] },
      type: 'image',
      mainClass: 'mfp-fade',
      callbacks: {
        open: function() {
          
          var activeIndex = parseInt($('#thumb-slider .img.active').attr('data-index'));
          var magnificPopup = $.magnificPopup.instance;
          magnificPopup.goTo(activeIndex);
        }
      }
    });
</script>
   
    <script type="text/javascript">
      function changeColor(name, id){
       
        $('.'+name+' label').click(function() {
          $(this).addClass('active').siblings().removeClass('active');
        });
         
      }

      $('#buy-now').click(function(){
          $.ajax({
            url:'{{route("buyDirect")}}',
            type:'get',
            data:$('#addToCart').serialize()+ '&buyDirect=buy',
            success:function(data){
                if(data.status == 'success'){
                  link = "{{route('checkout', ':product_id')}}";
                  link = link.replace(':product_id', data.buy_product_id);
                  window.location.href = link+"?process-to-checkout";
                }else{
                  toastr.error(data.msg);
                }
              }
          });
      });

      $('.addToCartBtn').click(function(){
          
          $.ajax({
            url:'{{route("cart.add")}}',
            type:'get',
           
            data:$('#addToCart').serialize(),
            success:function(data){
                if(data.status == 'success'){
                    var url = window.location.origin;
                    addProductNotice(data.msg, '<img src="'+url+'/upload/images/product/thumb/'+data.image+'" alt="">', '<h3>'+data.title+'</h3>', 'success');
       
                    $('#cartCount').html(Number($('#cartCount').html())+1);
                   
                }else{
                    toastr.error(data.msg);
                }
              }
          });
      });

    </script>

    <!-- text more & less -->
    <script type="text/javascript">

      $(document).ready(function() {
        var showChar = 100;
        var ellipsestext = "...";
        var moretext = "more";
        var lesstext = "less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
    </script>
    <!-- text more & less -->
@endsection