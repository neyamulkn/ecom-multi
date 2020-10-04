@extends('layouts.frontend')
@section('title', 'Checktout')
@section('css')
 	<link href="{{asset('frontend')}}/css/themecss/so_onepagecheckout.css" rel="stylesheet">

<style type="text/css">

	#submitBtn{width: 100%}
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
</style>

@endsection
@section('content')
    
	<div class="breadcrumbs">
	    <div class="container">
		    <ul class="breadcrumb-cate">
		        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
		        <li><a href="#">Checkout</a></li>
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
					<div class="col-left col-lg-6 col-md-6 col-sm-6 col-xs-12 sticky-content">
						<form action="{{ route('shippingRegister') }}" name="shipping_form" id="shipping_form" data-parsley-validate method="post" class="form-horizontal form-shipping">
						@csrf
						@if(!Auth::check())
						<div class="checkout-content login-box">
							<h2 class="secondary-title"><i class="fa fa-user"></i>Create an Account or Login</h2>
							<div class="box-inner">
								<div class="radio">
									<label> <input type="radio" data-dismiss="modal" id="register" name="account" value="register" checked="checked">Register Account</label>
								</div>

								<div class="radio">
									<label> <input type="radio" name="account" id="guest" value="guest">Guest Checkout </label>
								</div>

								<div class="radio">
									<label><input type="radio" data-toggle="modal" data-target="#so_sociallogin"  name="account" value="login">Returning Customer</label>
								</div>
							</div>
						</div>
						@endif
						<div class="checkout-content checkout-register">
			
							@if(!Auth::check())
							<fieldset id="account">
								<h2 class="secondary-title"><i class="fa fa-map-marker"></i>Billing Details</h2>
								<div class=" box-inner">
									
									<div class="form-group input-firstname required" >
										<span>Full Name</span>
										<input type="text" name="name" required value="{{old('name')}}" placeholder="First Name *" id="fullname_required" class="form-control">
									</div>
									
									<div class="form-group required" style="width: 49%; float: left;">
										<span>Email</span>
										<input type="email" required value="{{old('email')}}" name="email" onkeyup ="checkField(this.value, 'email', 'email')" placeholder="E-Mail *" id="email_required" class="form-control">
										<span id="email"></span>
									</div>

									<div class="form-group required" style="width: 49%; float: right;">
										<span>Phone Number</span>
										<input type="text" required name="mobile" value="{{old('mobile')}}" placeholder="Phone Number *" onkeyup ="checkField(this.value, 'mobile', 'mobile')" data-parsley-required-message = "Phone is required"  id="mobile_required" class="form-control">
										<span id="mobile"></span>
									</div>

									<div class="form-group required">
										<span>Select Your Rejion</span>
										<select name="region" onchange="get_city(this.value)" required id="input-payment-country" class="form-control">
											<option value=""> --- Please Select --- </option>
											@foreach($states as $state)
											<option value="{{$state->id}}"> {{$state->name}} </option>
											@endforeach
										</select>
									</div>
									<div class="form-group required">
										<span>City</span>
										<select name="city" onchange="get_area(this.value)"  required id="show_city" class="form-control">
											<option value=""> Select first rejion </option>
											
										</select>
									</div>
									<div class="form-group required">
										<span>Area</span>
										<select name="area" required id="show_area" class="form-control">
											<option value=""> Select first city </option>
										</select>
									</div>
									
									<div class="form-group required">
										<span class="required">Address</span>
										<input type="text" value="{{old('address')}}" required name="address" placeholder="Enter Address" id="input-payment-address" class="form-control">
									</div>
									
									<div id="password" style="display: block;">
									
										<div class="form-group required" style="width: 49%; float: left;">
											<span>Password</span>
											<input required type="password" name="password"  data-parsley-required-message= "Password is required" placeholder="Password *" minlength="6" id="userpassword" class="form-control">
										</div>
										<div class="form-group required" style="width: 49%; float: right;">
											<span>Confirm Password</span>
											<input type="password" required placeholder="Retype password" data-parsley-equalto="#userpassword"  name="password_confirmation" minlength="6" id="password2" class="form-control">
										</div>
									</div>

								</div>

							</fieldset>
							
							
							<div class="checkbox" style="padding: 0px 20px;">
								<label>
									<input type="checkbox" id="shipping_address" name="shipping_address" value="1" checked="checked"> My billing and shipping addresses are the same.
								</label>
							</div>
							@endif
							<fieldset id="shipping-address" @if(!Auth::check()) style="display: none" @endif>
								<h2 class="secondary-title"><i class="fa fa-truck fa-2x"></i>Shipping Address</h2>
								<div class=" checkout-shipping-form">
									<div class="box-inner">
										
										<div id="shipping-new" style="display: block">
											
											<div class="form-group input-lastname required" >
												<span>Full Name</span>
												<input type="text" value="{{( Auth::check() ? Auth::user()->name : '' )}}" name="shipping_name" value="" placeholder="Enter Full Name *" id="shipping_name" class="form-control">
											</div>
											<div class="form-group required" style="width: 49%; float: left;">
												<span>Email</span>
												<input type="text" value="{{(Auth::check() ? Auth::user()->email : '')}}" name="shipping_email" value="" placeholder="E-Mail *" id="input-payment-email" class="form-control">
											</div>
											<div class="form-group required" style="width: 49%; float: right;">
												<span>Phone Number</span>
												<input type="text" value="{{(Auth::check() ? Auth::user()->mobile : '')}}" name="shipping_phone" placeholder="Phone Number *" id="shipping_phone" class="form-control">
											</div>
											<div class="form-group required">
											<span>Select Your Rejion</span>
											<select name="shipping_region" onchange="get_city(this.value, 'shipping')"  id="shipping_region" class="form-control">
												<option value=""> --- Please Select --- </option>
												@foreach($states as $state)
												<option value="{{$state->id}}"> {{$state->name}} </option>
												@endforeach
											</select>
											</div>
											<div class="form-group required">
												<span>City</span>
												<select name="shipping_city"  onchange="get_area(this.value, 'shipping')"  id="show_cityshipping" class="form-control">
													<option value=""> Select first rejion </option>
													
												</select>
											</div>
											<div class="form-group required">
												<span>Area</span>
												<select name="shipping_area" id="show_areashipping" class="form-control">
													<option value=""> Select first city </option>
												</select>
											</div>
											
											<div class="form-group required">
												<span class="required">Address</span>
												<input type="text" value="{{old('ship_address')}}" name="ship_address" placeholder="Enter Address" id="input-payment-address" class="form-control">
											</div>
											
										</div>
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
										<button type="submit" form="shipping_form" id="submitBtn" data-loading-text="Loading..." class="btn btn-success button confirm-button">Placed Order</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


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

@endsection

@section('js')
<script type="text/javascript" src="{{asset('frontend/js/parsley.min.js')}}"></script>
<script type="text/javascript">
    function cartUpdate(id){
        document.getElementById('pageLoading').style.display = 'block';
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
                    document.getElementById('pageLoading').style.display = 'none';
                },
                error: function(jqXHR, exception) {
                    toastr.error('Internal server error.');
                    document.getElementById('pageLoading').style.display = 'none';
                }
            });
        }else{
            toastr.error('Invalid Number.');
            document.getElementById('pageLoading').style.display = 'none';
        }
    }    

   $("#couponForm").submit(function(e) {
        e.preventDefault(); 
        var coupon_code = $('#coupon_code').val();
       
        document.getElementById('pageLoading').style.display = 'block';
        $.ajax({
            url:"{{route('coupon.apply')}}",
            method:"get",
            data:{ coupon_code:coupon_code},
            success:function(data){
                document.getElementById('pageLoading').style.display = 'none';
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
                document.getElementById('pageLoading').style.display = 'none';
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


    function get_city(id, type=''){
       
        var  url = '{{route("get_city", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data.status){
                    $("#show_city"+type).html(data.allcity);
                    $("#shipping_cost").html(data.shipping_cost);
                    $('#couponAmount').html(data.couponAmount);
                   	$('#grandTotal').html(data.grandTotal);
                    $("#show_city"+type).focus();
                }else{
                    $("#show_city"+type).html('<option>City not found</option>');
                }
            }
        });
    }  	 

    function get_area(id, type=''){
           
        var  url = '{{route("get_area", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#show_area"+type).html(data);
                    $("#show_area"+type).focus();
                }else{
                    $("#show_area"+type).html('<option>Area not found</option>');
                }
            }
        });
    }  

</script>

@if(!Auth::check())
<script type="text/javascript">

	$('#register').on('click', function(){
		$('#fullname_required').attr('required', 'required');
		$('#username_required').attr('required', 'required');
		$('#email_required').attr('required', 'required');
		$('#phone_required').attr('required', 'required');
		$('#userpassword').attr('required', 'required');
		$('#password2').attr('required', 'required');
	});
	$('#guest').on('click', function(){

		$('#email_required').removeAttr('required');
		$('#userpassword').removeAttr('required');
		$('#password2').removeAttr('required');
        $('#submitBtn').removeAttr('disabled');
        $('#submitBtn').removeAttr('style', 'cursor:not-allowed');
	});	

	$('#shipping_address').on('click', function(){
		if ($("#shipping_address").is(":checked")) {
			$('#shipping_name').removeAttr('required');
			$('#shipping_email').removeAttr('required');
			$('#shipping_phone').removeAttr('required');
			$('#shipping_region').removeAttr('required');
			$('#show_cityshipping').removeAttr('required');
			$('#show_areashipping').removeAttr('required');
			$('#ship_address').removeAttr('required');
		}else{
			
			$('#shipping_name').attr('required', 'required');
			$('#shipping_email').attr('required', 'required');
			$('#shipping_phone').attr('required', 'required');
			$('#shipping_region').attr('required', 'required');
			$('#show_cityshipping').attr('required', 'required');
			$('#show_areashipping').attr('required', 'required');
			$('#ship_address').attr('required', 'required');
		}
	
	});
		


	function checkField(value, field, type=''){
        if ($("#register").is(":checked")) {
		  
	        if(value != ""){
	            $.ajax({
	                method:'get',
	                url:"{{ route('checkField') }}",
	                data:{table:'users', field:field, value:value, type:type},
	                success:function(data){
	                    
	                    if(data.status){
	                        $('#'+field).html("<span style='color:green'><i class='fa fa-check'></i> "+data.msg+"</span>");
	                        
	                        $('#submitBtn').removeAttr('disabled');
	                        $('#submitBtn').removeAttr('style', 'cursor:not-allowed');
	                        
	                    }else{
	                        $('#'+field).html("<span style='color:red'><i class='fa fa-times'></i> "+data.msg+"</span>");
	                        
	                        $('#submitBtn').attr('disabled', 'disabled');
	                        $('#submitBtn').attr('style', 'cursor:not-allowed');
	                        
	                    }
	                },
	                error: function(jqXHR, exception) {
	                    toastr.error('Unexpected error occur.');
	                }
	            });
	        }else{
	            $('#'+field).html("<span style='color:red'>"+field +" is required</span>");
	            
	            $('#submitBtn').attr('disabled', 'disabled');
	            $('#submitBtn').attr('style', 'cursor:not-allowed');
	            
	        }
	    }
    }
</script>
@endif
@endsection