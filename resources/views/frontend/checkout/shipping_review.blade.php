@extends('layouts.frontend')
@section('title', 'Shipping Review')
@section('css')
    <link href="{{asset('frontend')}}/css/themecss/so_onepagecheckout.css" rel="stylesheet">
    <style type="text/css">

        /*delete confirm popup*/

        .modal-confirm {
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

        /*delete confirm popup*/
        .shipping-address-list {margin: 0px 0 10px 0;
        border-bottom: 1px solid #e0e0e0;
        padding: 5px 0;}
        .shipping-address-list label{position: relative; width: inherit !important; float: inherit;margin-bottom: -1px !important;min-height: 30px !important;}
        .shipping-address-list input {display: none;}
        .shipping-address-list .active{background: #4267B2;color: #fff;}
        .shipping-address-list li{cursor: pointer; display: inline-block;padding: 8px 10px 0px !important;border: 1px solid #efefef; border-radius: 3px;min-width: 80px;}
        #shipping-new i{padding-right: 10px;font-size: 18px;
        color: #5a75f9;}
        .new-address{float: right; background: #4267b2;border-radius: 3px; padding: 2px 5px; font-size: 12px; line-height: 3; font-weight: 400; padding-right: 5px;  color: #fff; cursor: pointer; text-transform: capitalize;}
        .address_name{  position: absolute;  left: 0; top: -10px; white-space: nowrap;
        }
    </style>
@endsection
@section('content')
	<div class="breadcrumbs">
	    <div class="container">
		    <ul class="breadcrumb-cate">
		        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
		        <li><a href="#">Shipping Review</a></li>
		    </ul>
	    </div>
	</div>
	<!-- Main Container  -->
	<div class="container">
		<div id="dataLoading"></div>
		<div class="row">
			<div id="content" class="col-sm-12">
				@if(Session::has('alert'))
				<div class="alert alert-danger">
				  {{Session::get('alert')}}
				</div>
				@endif
				<div class="so-onepagecheckout layout1 row">
					<div class="col-left col-lg-6 col-md-6 col-sm-6 col-xs-12 sticky-content">
					<form action="{{ route('orderConfirm') }}" name="order_form" id="order_form" method="post" class="form-horizontal form-shipping">
						@csrf
						
						<div class="checkout-content checkout-register">
							<fieldset>
								<h2 class="secondary-title"><i class="fa fa-truck fa-2x"></i>Shipping Address <span class="new-address" title="Add new shipping address" data-toggle="modal" data-target="#shippingModal"><i style="background: none;font-size: 14px;width: inherit;height: inherit;margin:0px;line-height: 0;" class="fa fa-plus"></i> Add New Shipping</span></h2>
								<div class="checkout-shipping-form">
									<div class="box-inner">
										@if(Auth::check())
                                            <ul class="shipping-address-list">
                                                <?php $i= 1;?>
                                                @foreach($get_shipping as $shipping)
                                                <li @if($i==1) class="active" @endif><label for="confirm_shipping_address{{$i}}">
                                                <input onclick="get_shipping_address(this.value)" type="radio" id="confirm_shipping_address{{$i}}" name="confirm_shipping_address" value="{{$shipping->id}}" @if($i==1) checked="checked" @endif> {{$shipping->name}} <br/><span class="address_name">  <i class="fa fa-map-marker"></i> Address {{$i}}</span></label>
                                                </li>
                                                <?php $i++;?>
                                                @endforeach
                                               
                                            </ul>
                                        @endif
										<div  style="display: block">
											<div id="get_shipping_address">
											<div class="form-group" >
												<strong><i class="fa fa-user"></i></strong> {{$get_shipping->toArray()[0]['name']}}
											</div>

                                            <div class="form-group" >
                                                <strong><i class="fa fa-envelope"></i></strong> {{$get_shipping->toArray()[0]['email']}}
                                            </div>
                                            <div class="form-group" >
                                                <strong><i class="fa fa-phone"></i></strong> {{$get_shipping->toArray()[0]['phone']}}
                                            </div>
                                            <div class="form-group" >
                                                <strong><i class="fa fa-map-marker"></i></strong>
                                                {{
                                                    $get_shipping->toArray()[0]['address'] .', '.
                                                    $get_shipping->toArray()[0]['get_area']['name'] .', '.
                                                    $get_shipping->toArray()[0]['get_city']['name'] .', '.
                                                    $get_shipping->toArray()[0]['get_state']['name']
                                                }}
                                            </div>
                                            </div>
                                            <strong><i class="fa fa-comment"></i>Add Comments About Your Order</strong>
                                  
                                            <textarea style="width: 100%" name="order_notes" rows="3" class="form-control "></textarea>
										</div>
                                        <img src="{{asset('assets/images/icon/payments.png')}}">
									</div>
								</div>
							</fieldset>
						</div>
					</form>
					</div>

					<div class="col-right col-lg-6 col-md-6 col-sm-6 col-xs-12 sticky-content">
						<div class="checkout-content checkout-cart">
							<h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Order Details</h2>
							<div class="box-inner">
								<div class="table-responsive checkout-product">
									<table  id="order_summary" class="table table-bordered table-hover">
										@include('frontend.checkout.order_summery')
									</table>
                                    <div class="confirm-order">
                                        <button type="submit" form="order_form" id="submitBtn" style="width: 100%" data-loading-text="Loading..." class="btn btn-success button confirm-button">Process To Pay</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@if(!Auth::check())	
	<!-- login Modal -->
	@include('users.modal.login')
@endif
<!-- delete Modal -->
<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">Are you sure remove product from cart.?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" value="" id="deleteItemId" onclick="deleteCartItem(this.value, 'checkout')" data-dismiss="modal" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- shipping address Modal -->
<div id="shippingModal" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">

    <div id="so_sociallogin" class="modal-dialog block-popup-login">
        <a href="javascript:void(0)" title="Close" class="close close-login fa fa-times-circle" data-dismiss="modal"></a>
        <div class="tt_popup_login"><strong>Add New Shipping Address</strong></div>
       
            <div class=" col-reg registered-account">
                <div class="block-content">
                    <form class="form form-login" action="{{route('shippingRegister')}}" method="post" id="login-form">
                        @csrf
                       <fieldset id="shipping-address">
                            <div class=" checkout-shipping-form">
                                <div class="box-inner">
                                    
                                    <div id="shipping-new" style="display: block; text-align: left;">
                                        
                                        <div class="form-group input-lastname " >
                                            <span class="required">Full Name</span>
                                            <input type="text" required value="{{old('shipping_name')}}" name="shipping_name" placeholder="Enter Full Name *" id="input-payment-lastname" class="form-control">
                                        </div>
                                        <div class="form-group " style="width: 49%; float: left;">
                                            <span class="required">Email</span>
                                            <input type="text" value="{{old('shipping_email')}}" name="shipping_email"placeholder="E-Mail *" id="input-payment-email" class="form-control">
                                        </div>
                                        <div class="form-group" style="width: 49%; float: right;">
                                            <span class="required">Phone Number</span>
                                            <input type="text"  required value="{{old('shipping_phone')}}" name="shipping_phone" placeholder="Phone Number *" id="input-payment-telephone" class="form-control">
                                        </div>
                                        <div class="form-group" style="width: 49%; float: left;">
                                        <span class="required">Select Your Rejion</span>
                                        <select name="shipping_region" onchange="get_city(this.value)" required id="input-payment-country" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            @foreach($states as $state)
                                            <option value="{{$state->id}}"> {{$state->name}} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group " style="width: 49%; float: right;">
                                            <span class="required">City</span>
                                            <select name="shipping_city"  onchange="get_area(this.value)"  required id="show_city" class="form-control">
                                                <option value=""> Select first rejion </option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <span class="required" >Area</span>
                                            <select name="shipping_area" required id="show_area" class="form-control">
                                                <option value=""> Select first city </option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group ">
                                            <span class="required">Address</span>
                                            <input type="text" value="{{old('ship_address')}}" required name="ship_address" placeholder="Enter Address" id="input-payment-address" class="form-control">
                                        </div>
                                        <div class="actions-toolbar">
                                            <div class="primary">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary" name="send" id="send2"><span>Cancel</span></button>

                                                <button type="submit" class="btn btn-success" name="send" id="send2"><span>Save Now</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{asset('frontend/js/parsley.min.js')}}"></script>
<script type="text/javascript">
    function cartUpdate(id){
        document.getElementById('dataLoading').style.display = 'block';
        var qty = $('#qtyTotal'+id).val();
       
        if(parseInt(qty) && qty>0){
            $.ajax({
                url:"{{route('cart.update')}}",
                method:"get",
                data:{ id:id,qty:qty,page:'checkout'},
                success:function(data){
                    if(data.status == 'error'){
                        toastr.error(data.msg);
                    }else{
                        $('#order_summary').html(data);
                        toastr.success('Quantity Update Successful');
                    }
                    document.getElementById('dataLoading').style.display = 'none';
                },
                error: function(jqXHR, exception) {
                    toastr.error('Internal server error.');
                    document.getElementById('dataLoading').style.display = 'none';
                }
            });
        }else{
            toastr.error('Invalid Number.');
            document.getElementById('dataLoading').style.display = 'none';
        }
    }    

   $("#couponForm").submit(function(e) {
        e.preventDefault(); 
        var coupon_code = $('#coupon_code').val();
       	
        document.getElementById('dataLoading').style.display = 'block';
        $.ajax({
            url:"{{route('coupon.apply')}}",
            method:"get",
            data:{ coupon_code:coupon_code},
            success:function(data){
                document.getElementById('dataLoading').style.display = 'none';
                if(data.status){
                	document.getElementById('couponSection').style.display = 'table-row';
                    $('#couponAmount').html(data.couponAmount);
                    $('#grandTotal').html(data.grandTotal);
                    toastr.success(data.msg);
                }else{
                    toastr.error(data.msg);
                }
            },
            error: function(jqXHR, exception) {
                toastr.error('Internal server error.');
                document.getElementById('dataLoading').style.display = 'none';
            }
        });
    });


	 //get cart item
	function cartDeleteConfirm(id) {
	    document.getElementById('deleteItemId').value = id;
	}

   // delete cart item
    function deleteCartItem(id, page) {

        var link = "{{route('cart.itemRemove', ':id')}}"
        link = link.replace(':id', id);
      
        $.ajax({
            url:link,
            method:"get",
            data:{page:page},
            success:function(data){
                if(data){
                    $('#order_summary').html(data);
                    $('#carItem'+id).hide();
                    toastr.success('Cart item deleted.');
                }else{
                    toastr.error(data.msg);
                }
            }

        });
    }


    function get_city(id){
           
        var  url = '{{route("get_city", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data.status){
                    $("#show_city").html(data.allcity);
                    $("#shipping_cost").html(data.shipping_cost);
                    $('#couponAmount').html(data.couponAmount);
                    $('#grandTotal').html(data.grandTotal);
                    $("#show_city").focus();
                }else{
                    $("#show_city").html('<option>City not found</option>');
                }
            }
        });
    }  	 

    function get_area(id){
           
        var  url = '{{route("get_area", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#show_area").html(data);
                    $("#show_area").focus();
                }else{
                    $("#show_area").html('<option>Area not found</option>');
                }
            }
        });
    }  

</script>


<script type="text/javascript">

    $('.shipping-address-list li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    });

    function get_shipping_address(id){
        $("#get_shipping_address").html("<div style='height:135px' class='loadingData-sm'></div>");
        var  url = '{{route("getShippingAddress", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data.status){
                    $("#get_shipping_address").html(data.shipping_addess);
                    $("#shipping_cost").html(data.shipping_cost);
                    $('#couponAmount').html(data.couponAmount);
                    $('#grandTotal').html(data.grandTotal);
                }
            }
        });
    }  

</script>

@endsection