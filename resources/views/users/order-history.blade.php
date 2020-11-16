@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
@section('css')
   <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">


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
								<td class="text-left">{{Carbon\Carbon::parse($order->order_date)->format(Config::get('siteSetting.date_format'))}}</td>
								<td class="text-center">{{$order->total_qty}}</td>
								<td class="text-center">{{$order->currency_sign .$order->total_price}}</td>
								<td class="text-center"><span class="label label-{{($order->payment_method !='pending') ? 'success' : 'danger' }}"> {{ ucfirst(str_replace('-', ' ', $order->payment_method))}}</span> 
                                    @if($order->payment_info)
                                    <br/><strong>Tnx_id:</strong> <span> {{$order->tnx_id}}</span><br/>
                                    <span><strong>Info:</strong> {{$order->payment_info}}</span>
                                    @endif
                                </td>
								<td class="text-center"><span class="label label-{{($order->payment_status=='paid') ? 'success' : 'danger' }}">{{$order->payment_status}}</span></td>
								<td class="text-center" id="ship_status{{$order->order_id}}"><span class="label label-{{($order->order_status=='delivered') ? 'success' : 'danger' }}"> {{$order->order_status}} </span></td>
								
								<td class="text-center">
									<div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item text-inverse" title="View order" data-toggle="tooltip" href="{{route('user.orderDetails', $order->order_id)}}" data-original-title="View"><i class="fa fa-eye"></i> View Details</a></li>
                                            
                                            @if($order->order_status != 'delivered' && $order->order_status != 'cancel')
                                            <li><a title="Cancel Order" data-target="#orderCancel" onclick="orderCancelPopup('{{ route("user.orderCancel", $order->order_id ) }}')" data-toggle="modal" class="dropdown-item" ><i class="fa fa-trash"></i> Cancel order</a></li>
                                            @endif
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
            responsive: true,
            ordering: false
        });
    </script>
@endsection		


