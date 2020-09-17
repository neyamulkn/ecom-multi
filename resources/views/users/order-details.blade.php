@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
@section('css')
	<style type="text/css">
		.order_success{
			text-align: center;
		}
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
	<div class="main-container container">
		
		<div class="row">
			@include('users.sidebar')
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 sticky-content">


				<div class="order_success">
					<div>
					<i class="fa fa-check-circle" style="font-size: 125px;color: #16a20d;"></i></div>
					<h3>Thank you for shopping at {{Config::get('siteSetting.site_name')}}!</h3>
					We'll email you an order confirmation with details and tracking info.
				</div>
				<h2 class="title">Order Information</h2>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="2" class="text-left">Order Details</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{$order->order_id}}
								<br>
								<b>Order Date:</b> {{Carbon\Carbon::parse($order->created_at)->format('M d, Y')}}</td>
							<td style="width: 50%;" class="text-left"> <b>Payment Method:</b> {{$order->payment_method}}
								<br>
								<b>Shipping Fee:</b> {{$site['currency_symble']}} {{$order->shipping_cost}} </td>
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
								{{
									$order->billing_address. ', '.
									$order->get_area->name. ', '.
									$order->get_city->name. ', '.
									$order->get_state->name
								
								}} 
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
							@foreach($order->order_details as $item)
                                         
							<tr>
								<td class="text-left">
									 <a href="{{route('product_details', $item->product->slug)}}">{{Str::limit($item->product->title, 50)}}</a><br>
                                    @foreach(json_decode($item->attributes) as $key=>$value)
                                    <small> {{$key}} : {{$value}} </small>
                                    @endforeach
								</td>
								
								<td class="text-right">{{$item->qty}}</td>
								<td class="text-right">{{$order->currency_sign. $item->price}}</td>
								<td class="text-right">{{$order->currency_sign. $item->price*$item->qty}}</td>
								<td style="white-space: nowrap;" class="text-right"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="#" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
									<a class="btn btn-danger" title="" data-toggle="tooltip" href="{{route('user.orderReturn')}}" data-original-title="Return"><i class="fa fa-reply"></i></a>
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
				<h3>Order History</h3>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td class="text-left">Date</td>
							<td class="text-left">Status</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">20/06/2016</td>
							<td class="text-left">Processing</td>
						</tr>
					
					</tbody>
				</table>
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
