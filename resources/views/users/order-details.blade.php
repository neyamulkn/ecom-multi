@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
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
			@include('users.inc.sidebar')
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 sticky-content">
				<h2 class="title"><a href="{{ route('user.orderHistory') }}"> <i class="fa fa-angle-left"></i>  Order Details #{{ $order->order_id }}</a></h2>

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
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
							<td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">{{$order->billing_name}}
								<br>{{$order->billing_email}}
								<br>{{$order->billing_phone}}
								<br>
								{{ $order->billing_address }}
								@if( $order->get_area), {{ $order->get_area->name}} @endif
								@if($order->get_city), {{$order->get_city->name}}, @endif
								@if($order->get_state), {{$order->get_state->name}} @endif
								
							</td>
							<td class="text-left">{{$order->shipping_name}}
								<br>{{$order->shipping_email}}
								<br>{{$order->shipping_phone}}
								<br>
								{{
									$order->shipping_address. ', '.
									$order->shipping_area. ', '.
									$order->shipping_city. ', '.
									$order->shipping_region
								
								}} 
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
                                    	@if($order_detail->shipping_status == 'deliverd')
                                    	<li><a title="Cancel Order" data-toggle="tooltip" data-original-title=" Write Product Review"><i class="fa fa-edit"></i> Write Review</a></li>
                                    	@endif

                                        <li><a onclick="addToCart({{$order_detail->product_id}})" title="" data-toggle="tooltip" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i> Reorder</a></li>
                                        
		                        	@if($order_detail->shipping_status != 'cancel' && $order->payment_method != 'pending')

		                        		<?php 
					                        $current_time = strtotime(Carbon\Carbon::parse(now())->format('Y-m-d'));
					                        $refund_time = strtotime(Carbon\Carbon::parse($order_detail->shipping_date)->addDays(7)->format('Y-m-d'));
		                        		?>
		                        		@if($current_time<=$refund_time && $order_detail->shipping_status == 'deliverd')
                                      	<li><a title="Return Order" data-toggle="tooltip" href="{{route('user.orderReturn', [$order->order_id, $order_detail->product->slug])}}" data-original-title="Return ? Replace Order"><i class="fa fa-reply"></i> Return / Replace <br/> Eligible til {{Carbon\Carbon::parse($order_detail->shipping_date)->addDays(7)->format(Config::get('siteSetting.date_format'))}} </a></li>
                                      	
                                      	@else
                                      	<li><a title="Return Order" data-toggle="tooltip" href="{{route('user.orderReturn', [$order->order_id, $order_detail->product->slug])}}" data-original-title="Return"><i class="fa fa-reply"></i> Return / Replace</a></li>
                                      	@endif
                                    @endif

                                    	@if($order_detail->product->shipping_status != 'delivered' || $order_detail->product->shipping_status != 'cancel')
                                        <li><a title="Cancel Order" data-toggle="tooltip" data-original-title=" Cancel order"><i class="fa fa-trash"></i> Cancel</a></li>
                                        @endif
                                    </ul>
                                   
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>Sub-Total</b>
								</td>
								<td class="text-right">{{$order->currency_sign . $order->total_price}}</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>Shipping Cost(+)</b>
								</td>
								<td class="text-right">{{$order->currency_sign . $order->shipping_cost}}</td>
								<td></td>
							</tr>
							@if($order['coupon_discount'] != null)
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>Coupon Discount(-)</b>
								</td>
								<td class="text-right">{{$order->currency_sign . $order->coupon_discount}}</td>
								<td></td>
							</tr>
							@endif
							<tr>
								<td colspan="2"></td>
								<td class="text-right"><b>Total</b>
								</td>
								<td class="text-right">{{$order->currency_sign . ($order->total_price + $order->shipping_cost - $order->coupon_discount)  }}</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
	
				<div class="buttons clearfix">
					<div class="pull-right"><a class="btn btn-primary" href="{{url('/')}}">Continue Shop</a>
					</div>
				</div>
			</div>
			<!--Middle Part End-->
			
		</div>
	</div>
	<!-- //Main Container -->
@endsection
