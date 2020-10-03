@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
@section('css')

@endsection
@section('content')
  <div class="breadcrumbs">
      <div class="container">
          <ul class="breadcrumb-cate">
              <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
              <li><a href="#">Order History</a></li>
          </ul>
      </div>
  </div>
	<!-- Main Container  -->
	<div class="main-container container">
		<div class="row">
			@include('users.sidebar')
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 sticky-content">
				<h2 class="title">Order History</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-left">Order ID</td>
								<td class="text-left">Order Date</td>
								<td class="text-center">Qty</td>
								<td class="text-center">Amount</td>
								<th>Payment Method</th>
								<td class="text-center">Payment Status</td>
								<td class="text-center">Shipping Status</td>
								<td class="text-right">Action</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td class="text-left"> {{$order->order_id}} </td>
								<td class="text-left">{{Carbon\Carbon::parse($order->order_date)->format('M d, Y')}}</td>
								<td class="text-center">{{$order->total_qty}}</td>
								<td class="text-center">{{$order->currency_sign .$order->total_price}}</td>
								<td class="text-center">{{ ucfirst(str_replace('-', ' ', $order->payment_method))}}</td>
								<td class="text-center">{{$order->payment_status}}</td>
								<td class="text-center">{{$order->order_status}}</td>
								
								<td class="text-center">
									<div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-inverse" title="View order" data-toggle="tooltip" href=""><i class="ti-eye"></i> View order</a>
                                                            <a class="dropdown-item" title="Edit order" data-toggle="tooltip" href=""><i class="ti-pencil-alt"></i> Edit</a>
                                                            <span title="Highlight order (Ex. Best Seller, Top Rated etc.)" data-toggle="tooltip">
                                                            <a onclick="orderhighlight({{ $order->id }})" data-toggle="modal" data-target="#orderhighlight_modal" class="dropdown-item"  href=""><i class="ti-pin-alt"></i> Highlight</a></span>
                                                            <span title="Manage Gallery Images" data-toggle="tooltip">
                                                            <a onclick="setGallerryImage({{ $order->id }})" data-toggle="modal" data-target="#add" class="dropdown-item" href="javascript:void(0)"><i class="ti-image"></i> Gallery Images</a></span>
                                                            <span title="Delete" data-toggle="tooltip"><button   data-target="#delete"  data-toggle="modal" class="dropdown-item" ><i class="ti-trash"></i> Delete order</button></span>
                                                        </div>
                                                    </div>                                                  
									<a class="btn btn-info" title="" data-toggle="tooltip" href="{{route('user.orderDetails', $order->order_id)}}" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
			<!--Middle Part End-->
			
		</div>
	</div>
	<!-- //Main Container -->
@endsection		
