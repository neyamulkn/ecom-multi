@extends('layouts.frontend')
@section('title', 'Order Payment')
@section('css')
    <link href="{{asset('frontend')}}/css/themecss/so_onepagecheckout.css" rel="stylesheet">
    <style type="text/css">
        .nav-tabs{background: #f1f1f1;}
        .nav-tabs li a{height: 65px; min-width: 95px;}
       
    </style>
@endsection
@section('content')
	<div class="breadcrumbs">
	    <div class="container">
		    <ul class="breadcrumb-cate">
		        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
		        <li><a href="#">Order Payment</a></li>
		    </ul>
	    </div>
	</div>
	<!-- Main Container  -->
	<div class="container">
		<div id="pageLoading"></div>
		<div class="row">
			<div id="content" class="col-sm-12">
				@if(Session::has('alert'))
				<div class="alert alert-danger">
				  {{Session::get('alert')}}
				</div>
				@endif
				<div class="so-onepagecheckout layout1 row">
					<div class="col-left col-lg-7 col-md-7 col-sm-6 col-xs-12 sticky-content">
					
						<div class="checkout-content checkout-register">
							<fieldset>
								<h2 class="secondary-title"><i class="fa fa-map-marker"></i>Select Payment Method</h2>
								<div class="checkout-shipping-form">
									<div class="box-inner">
										
                                        <ul class="nav nav-tabs">
                                            <li><a data-toggle="tab" href="#home"><img src="{{asset('assets/images/icon/cash.png')}}"></a></li>
                                            <li><a data-toggle="tab" href="#paypalPayment"><img src="{{asset('assets/images/icon/paypal.png')}}"></a></li>
                                            <li><a data-toggle="tab" href="#menu2"><img src="{{asset('assets/images/icon/mastercard.png')}}"></a></li>
                                            <li><a data-toggle="tab" href="#menu3"><img src="{{asset('assets/images/icon/bkash-rocket.png')}}"></a></li>
                                           
                                        </ul>

                                        <div class="tab-content">

                                            <div id="home" class="tab-pane fade">
                                              
                                               <div class="">
                                                  <div class="text-left">
                                                    <span class="secure-checkout-banner1">
                                                      <i class="fa fa-lock"></i>
                                                      Secure checkout
                                                    </span>
                                                  </div>


                                                  <div class="text-right">
                                                    <form action="{{url('/')}}" method="post">
                                                        <button style="width: 40%" class="btn  btn-default"><span><i class="fa fa-money" aria-hidden="true"></i> Pay Cash</span></button>
                                                    </form>
                                                  </div>
                                                </div>

                                            </div>


                                            <div id="paypalPayment" class="tab-pane fade">
                                              <div class="">
                                                  <div class="text-left">
                                                    <span class="secure-checkout-banner1">
                                                      <i class="fa fa-lock"></i>
                                                      Secure checkout
                                                    </span>
                                                  </div>


                                                  <div class="text-right">
                                                    <form action="{{route('paypalPayment',[ $order['order_id']])}}" method="post">
                                                        @csrf
                                                        <button style="width: 40%" class="btn  btn-default"><span><i class="fa fa-paypal" aria-hidden="true"></i> Pay with PayPal</span></button>
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>
                                            <div id="menu2" class="tab-pane fade">
                                                <div class="">
                                                      <div class="text-left">
                                                        <span class="secure-checkout-banner1">
                                                          <i class="fa fa-lock"></i>
                                                          Secure checkout
                                                        </span>
                                                      </div>


                                                      <div class="text-right">
                                                        <form action="{{url('/')}}" method="post">
                                                            <button style="width: 40%" class="btn  btn-default"><span><i class="fa fa-cc-mastercard" aria-hidden="true"></i> Pay with PayPal</span></button>
                                                        </form>
                                                      </div>
                                                </div>
                                            </div>
                                            <div id="menu3" class="tab-pane fade">
                                              <div class="">
                                                  <div class="text-left">
                                                    <span class="secure-checkout-banner1">
                                                      <i class="fa fa-lock"></i>
                                                      Secure checkout
                                                    </span>
                                                  </div>


                                                  <div class="text-right">
                                                    <form action="{{url('/')}}" method="post">
                                                        <button style="width: 40%" class="btn  btn-default"><span><i class="fa fa-cc-mastercard" aria-hidden="true"></i> Pay with Bkash</span></button>
                                                    </form>
                                                  </div>
                                            </div>
                                        </div>
                                       
                                    </div>
								</div>
							</fieldset>
						</div>
				
					</div>

					<div class="col-right col-lg-5 col-md-5 col-sm-6 col-xs-12 sticky-content">
						<div class="checkout-content checkout-cart">
							<h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Order Details</h2>
							<div class="box-inner">
								<div class="table-responsive checkout-product">
									<table  id="order_summary" class="table table-bordered table-hover">
										<thead>
                                            <tr>
                                                <th class="text-left name" colspan="2">Product Name</th>
                                                <th class="text-center checkout-price">Price</th>
                                                <th class="text-center quantity">Quantity</th>
                                                <th class="text-right total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            @foreach($order['order_details'] as $item)
                                           
                                            <tr>
                                              
                                                 <td class="text-left name"> 
                                                    <a href="{{route('product_details', $item['product']['slug'])}}"><img width="70" src="{{asset('upload/images/product/thumb/'.$item['product']['feature_image'])}}" class="img-thumbnail"></a> 
                                                </td>

                                                <td class="text-left attributes">
                                                    <a href="{{route('product_details', $item['product']['slug'])}}">{{Str::limit($item['product']['title'], 50)}}</a><br>
                                                    @foreach(json_decode($item['attributes']) as $key=>$value)
                                                    <small> {{$key}} : {{$value}} </small>
                                                    @endforeach
                                                </td>

                                                <td class="text-right price">{{$order['currency_sign']}}<span class="amount">{{$item['price']}}</span></td>
                                                <td class="text-left quantity">
                                                    <div class="input-group"> {{$item['qty']}} </div>
                                                </td>
                                                <td class="text-right total">{{$order['currency_sign']}}<span id="subtotal">{{$item['price']*$item['qty']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Sub-Total:</strong></td>
                                                <td class="text-right">{{$order['currency_sign']}}<span id="cartTotal">{{$order['total_price']}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>VAT (0%):</strong></td>
                                                <td class="text-right">$0.00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Shipping cost(+):</strong></td>
                                                <td class="text-right">+{{$order['currency_sign']}}<span id="shipping_cost">{{$order['shipping_cost']}}</span></td>
                                            </tr>
                                            @if($order['coupon_discount'] != null)
                                            <tr id="couponSection">
                                                <td class="text-right" colspan="4"><strong>Coupon Discount(-):</strong></td>
                                                <td class="text-right">-{{$order['currency_sign']}}<span id="couponAmount">{{$order['coupon_discount']}}</span> </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right">{{$order['currency_sign']}}<span  id="grandTotal">{{$order['total_price'] + $order['shipping_cost'] - $order['coupon_discount']  }}</td>
                                            </tr>
                                        </tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('frontend/js/parsley.min.js')}}"></script>

<script type="text/javascript">


    function get_shipping_address(id){
        $("#get_shipping_address").html("<div style='height:135px' class='loadingData-sm'></div>");
        var  url = '{{route("getShippingAddress", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#get_shipping_address").html(data);
                }
            }
        });
    }  

</script>

@endsection