@extends('layouts.admin-master')
@section('title', Request::route('status'). ' order lists')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

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


        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">{{Request::route('status')}} order lists</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                    

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="margin-bottom: 2px;">
                           
                            <form action="{{route('admin.orderList')}}" method="get">
                              
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Order Status  </label>
                                                    <select name="status" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="pending" {{ (Request::get('status') == 'pending') ? 'selected' : ''}} >Pending</option>
                                                        <option value="accepted" {{ (Request::get('status') == 'accepted') ? 'selected' : ''}}>Accepted</option>
                                                        <option value="delivered" {{ (Request::get('status') == 'delivered') ? 'selected' : ''}}>Delivered</option>
                                                        <option value="cancel" {{ (Request::get('status') == 'cancel') ? 'selected' : ''}}>Cancel</option>
                                                        <option value="all" {{ (Request::get('status') == "all") ? 'selected' : ''}}>All</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">From Date</label>
                                                    <input name="from_date" value="{{ Request::get('from_date')}}" type="date" class="form-control">
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">End Date</label>
                                                    <input name="end_date" value="{{ Request::get('end_date')}}" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label class="control-label">.</label>
                                                   <button type="submit" class="form-control btn btn-success"><i style="color:#fff; font-size: 20px;" class="ti-search"></i> </button>
                                                </div>
                                            </div>
                                          
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h3>
                                        @if(Route::current()->getName() == 'order.search')
                                            Total Record: ({{count($orders)}})
                                        @endif
                                    </h3>
                                    <div class="table-responsive">
                                   <table id="config-table" class="table display table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Delivery Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @if(count($orders)>0)
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_id}}</td>
                                                   <td>{{\Carbon\Carbon::parse($order->created_at)->format('M d, Y')}}</td>
                                                  
                                                    <td>{{$order->total_qty}}</td>
                                                    <td>{{$order->currency_sign . ($order->total_price + $order->shipping_cost - $order->coupon_discount)  }}</td>
                                                    
                                                    <td> <span class="label label-primary font-weight-100">{{ str_replace( '-', ' ', $order->payment_method) }}</span></td>
                                                     <td>
                                                        <select style="background: rgb(3 169 243);color: #fff" id="order_status" onchange="changeOrderStatus(this.value, '{{$order->order_id}}', 'payment_status')">
                                                            <option  value="pending" @if($order->payment_status == 'pending') selected @endif >Pending</option>
                                                            <option value="on-review" @if($order->payment_status == 'on-review') selected @endif >On Review</option>
                                                            <option value="paid" @if($order->payment_status == 'paid') selected @endif >Paid</option>
                                                        </select>
                                                     </td>
                                                    
                                                    <td>
                                                        <select style="background: #f3ca03;color: #fff" name="status" id="order_status" onchange="changeOrderStatus(this.value, '{{$order->order_id}}', 'order_status')">
                                                            <option value="pending" @if($order->order_status == 'pending') selected @endif>Pending</option>
                                                            <option value="accepted" @if($order->order_status == 'accepted') selected @endif>Accepted</option>
                                                            <option value="on-review" @if($order->order_status == 'on-review') selected @endif>On Review</option>
                                                            <option value="on-delivery" @if($order->order_status == 'on-delivery') selected @endif>On Delivery</option>
                                                            <option value="delivered" @if($order->order_status == 'delivered') selected @endif>Delivered</option>
                                                           @if($order->order_status == 'cancel')
                                                            <option value="cancel" selected >Cancel</option>
                                                           @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                           
                                                            <a href="javascript:void(0)" class="dropdown-item" onclick="order_details('{{$order->order_id}}')" title=" View order details" data-toggle="tooltip" class="text-inverse p-r-10" ><i class="ti-eye"></i> View Details</a> 

                                                            <a class="dropdown-item" href="{{route('admin.orderInvoice', $order->order_id)}}" class="text-inverse" title="View Order Invoice" data-toggle="tooltip"><i class="ti-printer"></i> Order Invoice</a>

                                                            <span title="Cancel Order" data-toggle="tooltip">
                                                                <button data-target="#orderCancel"  data-toggle="modal" class="dropdown-item" onclick="orderCancelPopup('{{ route("admin.orderCancel", $order->order_id) }}')"><i class="ti-trash"></i> Cancel Order</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    </td>
                                                    
                                                </tr>
                                               @endforeach
                                            @else <tr><td colspan="8"> <h1>No orders found.</h1></td></tr> @endif
                                          
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <div class="modal bs-example-modal-lg" id="getOrderDetails" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Order Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" id="order_details"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- ordr cancel Modal -->
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

    <script type="text/javascript">
        function order_details(id){
            $('#order_details').html('<div class="loadingData"></div>');
            $('#getOrderDetails').modal('show');
            var  url = '{{route("getOrderDetails", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                   
                    $("#order_details").html(data);
                }
            }
        });
    }

    function changeOrderStatus(status, order_id, field) {
       
        if (confirm("Are you sure "+status+ " this order.?")) {
           
            var link = '{{route("admin.changeOrderStatus")}}';

            $.ajax({
                url:link,
                method:"get",
                data:{'status': status, 'order_id': order_id, 'field':field},
                success:function(data){
                    if(data){
                        toastr.success(data.message);
                    }else{
                        toastr.error(data.message);
                    }
                }
            
            });
        }
        return false;
    }

    //order cancel
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
    <!-- This page plugins -->
    <!-- ============================================================== -->
       <script src="{{asset('assets')}}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
        <script>
    // responsive table
        $('#config-table').DataTable({
            responsive: true
        });
    </script>
@endsection