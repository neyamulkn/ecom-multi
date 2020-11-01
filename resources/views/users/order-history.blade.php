@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
@section('css')
   <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

<style type="text/css">
	
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
</style>

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
	<div class="container">
		<div class="row">
			@include('users.inc.sidebar')
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 sticky-content">
				<h2 class="title">Order History</h2>
				<div class="table-responsive" >
					<table  id="config-table" class="table display table-bordered table-striped">
						<thead>
							<tr>
								<td class="text-left">Order ID</td>
								<td class="text-left">Order Date</td>
								<td class="text-center">Qty</td>
								<td class="text-center">Amount</td>
								<td>Payment Method</td>
								<td class="text-center">Payment Status</td>
								<td class="text-center">Shipping Status</td>
								<td class="text-right">Action</td>
								
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr >
								<td class="text-left"> {{$order->order_id}} </td>
								<td class="text-left">{{Carbon\Carbon::parse($order->order_date)->format('M d, Y')}}</td>
								<td class="text-center">{{$order->total_qty}}</td>
								<td class="text-center">{{$order->currency_sign .$order->total_price}}</td>
								<td class="text-center">{{ ucfirst(str_replace('-', ' ', $order->payment_method))}}</td>
								<td class="text-center">{{$order->payment_status}}</td>
								<td class="text-center" id="ship_status{{$order->order_id}}">{{$order->order_status}}</td>
								
								<td class="text-center">
									<div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item text-inverse" title="View order" data-toggle="tooltip" href="{{route('user.orderDetails', $order->order_id)}}" data-original-title="View"><i class="fa fa-eye"></i> View Details</a></li>
                                          
                                            <li><a title="Cancel Order" data-target="#orderCancel" onclick="orderCancelPopup('{{ route("user.orderCancel", $order->order_id ) }}')" data-toggle="modal" class="dropdown-item" ><i class="fa fa-trash"></i> Cancel order</a></li>
                                        </ul>
                                    </div> 
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
	<!-- canel Modal -->
	<div id="orderCancel" class="modal fade">
	    <div class="modal-dialog modal-confirm">
	        <div class="modal-content">
	            <div class="modal-header">
	                <div class="icon-box">
	                    <i class="fa fa-times" aria-hidden="true"></i>
	                </div>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            </div>
	            <div class="modal-body">
	                <h4 class="modal-title">Are you sure?</h4>
	                <p>Do you really want to cancel order?</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
	                <button type="button" value="" id="orderCancelRoute" onclick="orderCancel(this.value)" data-dismiss="modal" class="btn btn-danger">Order Cancel</button>
	            </div>
	        </div>
	    </div>
	</div>

@endsection		
@section('js')
   <script src="{{asset('assets')}}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    function orderCancelPopup(route) {
        document.getElementById('orderCancelRoute').value = route;
    }

    function orderCancel(route) {
        //separate id from route
        var id = route.split("/").pop();
     
        $.ajax({
            url:route,
            method:"get",
            success:function(data){
                if(data.status){
                    $("#ship_status"+id).html('cancel');
                    toastr.success(data.msg);
                }else{
                    toastr.error(data.msg);
                }
            }
        });
    }

</script>
        <script>
    // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
    </script>
@endsection		


