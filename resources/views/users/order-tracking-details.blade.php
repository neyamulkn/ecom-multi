@extends('layouts.frontend')
@section('title', 'Tracking Details | '. Config::get('siteSetting.site_name') )
@section('css')
    <style type="text/css">

        .orderprogressbar {
          counter-reset: step;
        }

        .orderprogressbar li {
          position: relative;
          list-style: none;
          float: left;
          width: 19.33%;
          text-align: center;
        }

        /* Circles */
        .orderprogressbar li:before {
          content: counter(step);
          counter-increment: step;
          width: 40px;
          height: 40px;
          border: 1px solid #2979FF;
          display: block;
          text-align: center;
          margin: 0 auto 10px auto;
          border-radius: 50%;
          background-color: #ddd;
           
          /* Center # in circle */
          line-height: 39px;
        }

        .orderprogressbar li:after {
          content: "";
          position: absolute;
          width: 100%;
          height: 5px;
          background: #ddd ;
          top: 20px; /*half of height Parent (li) */
          left: -50%;
          z-index: -1;
        }

        .orderprogressbar li:first-child:after {
          content: none;
        }

        .orderprogressbar li.active:before {
          background: #0f7d0f;
          content: "✔";  
          color: #fff;
        }
        .orderprogressbar li.orderprocess:before {
          background: orange;
          content: "\039F";  
        }

        .orderprogressbar li.active + li:after {
          background: #0f7d0f;
        }

       
        .title{border-bottom: 1px solid #ccc;padding-bottom:10px;}
    </style>
@endsection
@section('content')
  <div class="breadcrumbs">
      <div class="container">
          <ul class="breadcrumb-cate">
              <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
              <li><a href="#">Order Infomation</a></li>
          </ul>
      </div>
  </div>
    <!-- Main Container  -->
    <div class="container">
        
        <div class="row">
           
            <!--Middle Part Start-->
            <div id="content" class="col-md-9 sticky-content">
                <h2 class="title"><a href="{{ url()->previous() }}"> <i class="fa fa-angle-left"></i>  Tracking Details</a></h2>

                <div style="width: 100%; display: inline-block;">
                  <ul class="orderprogressbar">
                    @if($order->payment_method == 'pending')
                    <li class="@if('payment_method' != 'cod') orderprocess @endif">Payment @if('cod' == 'cod') Pending @endif</li>
                    @endif
                   
                    <li  @if($order->order_status == 'pending' && $order->payment_method != 'pending') class="orderprocess" @endif @if($order->order_status != 'pending' && $order->payment_method != 'pending') class="active" @endif >Order placed</li>

                    @if($order->order_status != 'cancel')
                    <li  @if($order->order_status == 'processing') class="orderprocess" @endif  @if($order->order_status == 'on-delivery' || $order->order_status == 'processing' || $order->order_status == 'delivered') class="active" @endif>Processing</li>

                    <li  @if($order->order_status == 'on-delivery') class="orderprocess" @endif   @if($order->order_status == 'delivered') class="active" @endif>On Delivery</li>
                    <li @if($order->order_status == 'delivered') class="active" @endif >Delivered</li>
                    @else
                    <li class="active">Cancel</li>
                    @endif
                  </ul>
                </div>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            @if($order->payment_method == 'pending')
                            <td colspan="2">
                                <span  class="text-left">Order Details</span> 
                                <span style="float: right;" class="text-right"> Payment Pending <a style="margin-top: 5px;" href="{{route('order.paymentGateway', $order->order_id)}}" class="btn btn-danger">Pay Now</a></span>
                            </td>
                            @else
                            <td colspan="2" class="text-left">Order Details</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{$order->order_id}}
                                <br>
                                <b>Order Date:</b> {{Carbon\Carbon::parse($order->order_date)->format(Config::get('siteSetting.date_format'))}}
                            </td>
                            <td style="width: 50%;" class="text-left"> 
                                <b>Order Status::</b> {{ $order['order_status'] }} <br>
                                <b>Payment Status:</b> {{$order->payment_status}} <br>
                                <b>Payment Method:</b> {{$order->payment_method}} <br>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
              
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-left">Product Name</td>
                                <td class="text-right">Quantity</td>
                                <td class="text-right">Price</td>
                                <td class="text-right">Total</td>
                                <td style="width: 20px;"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->order_details as $order_detail)
                                         
                            <tr>
                                <td class="text-left">
                                    <img width="50" src="{{ asset('upload/images/product/thumb/'.$order_detail->product->feature_image) }}">
                                     <a href="{{route('product_details', $order_detail->product->slug)}}">{{Str::limit($order_detail->product->title, 50)}}</a><br>
                                    @foreach(json_decode($order_detail->attributes) as $key=>$value)
                                    <small> {{$key}} : {{$value}} </small>
                                    @endforeach
                                </td>
                                
                                <td class="text-right">{{$order_detail->qty}}</td>
                                <td class="text-right">{{$order->currency_sign. $order_detail->price}}</td>
                                <td class="text-right">{{$order->currency_sign. $order_detail->price*$order_detail->qty}}</td>
                            
                                <td style="width: 150px; white-space: nowrap;">
                                    
                                    <ul>
                                      

                                        <li><a onclick="addToCart({{$order_detail->product_id}})" title="" data-toggle="tooltip" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i> Reorder</a></li>
                                        
                                   
                                    </ul>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                       
                    </table>
                </div>
    
                <div class="buttons clearfix">
                    <div class="pull-right"><a class="btn btn-primary" href="{{url('/')}}">Continue Shop</a>
                    </div>
                </div>
            </div>
            <!--Middle Part End-->
            <div  class="col-md-3 sticky-content">
              @if(count($related_products)>0)
              <div class="moduletable module so-extraslider-ltr best-seller best-seller-custom">
              
                <div class="modcontent">
                  <div id="so_extra_slider" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
                    <div class="extraslider-inner " >
                        <div class="item ">
                          @foreach($related_products as $product)
                          <div class="item-wrap style1 ">
                            <div class="item-wrap-inner">
                             <div class="media-left">
                              <div class="item-image">
                                 <div class="item-img-info product-image-container ">
                                  <div class="box-label">
                                  </div>
                                  <a class="lt-image" data-product="66" href="{{ route('product_details', $product->slug) }}" >
                                  <img src="{{asset('upload/images/product/thumb/'. $product->feature_image)}}" alt="">
                                  </a>
                                 </div>
                              </div>
                             </div>
                             <div class="media-body">
                              <div class="item-info">
                                 <!-- Begin title -->
                                 <div class="item-title">
                                  <a href="{{ route('product_details', $product->slug) }}" target="_self">
                                 {{Str::limit($product->title, 20)}}
                                  </a>
                                 </div>
                                 <!-- Begin ratting -->
                                 <div class="rating">
                                 {{\App\Http\Controllers\HelperController::ratting(round($product->reviews->avg('ratting'), 1))}}
                                 </div>
                                 <!-- Begin item-content -->
                                 <div class="price">
                                 
                                   @php
                                      $discount =  \App\Http\Controllers\OfferController::discount($product->id, Session::get('offerId'));
                                      @endphp

                                  @if($discount)
                                      <span class="price-new  product-price">{{Config::get('siteSetting.currency_symble')}}{{ $discount['discount_price'] }}</span>
                                      <span class="price-old">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                                  @else
                                      <span class="price-new  product-price">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                                  @endif
                                 </div>
                              </div>
                             </div>
                             <!-- End item-info -->
                            </div>
                            <!-- End item-wrap-inner -->
                          </div>
                          @endforeach
                        </div>
                    </div>
                  </div>
                </div>
             </div>
             @endif
            </div>
        </div>
    </div>
    <!-- //Main Container -->
@endsection
