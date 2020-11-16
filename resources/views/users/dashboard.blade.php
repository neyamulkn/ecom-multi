@extends('layouts.frontend')
@section('title', 'Dashboard | '. Config::get('siteSetting.site_name') )
@section('css')

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

    .d-flex {
        display: flex!important;
    }
    .icon-box i{font-size: 4rem}
    .ml-auto, .mx-auto {
        margin-left: auto!important;
    }
    .user-box{padding: 15px}
    .card-title, .icon-box{color: #fff}
    .user-box a{    font-size: 3rem !important; color: #fff}
    #user-dashboard{padding-top: 15px;}
    #user-dashboard section{background: #fff;margin-bottom: 10px;padding: 10px 0;}
}
</style>

@endsection
@section('content')

    <!-- Main Container  -->
    <div class="container">
        <div class="row">
            @include('users.inc.sidebar')
            <!--Middle Part Start-->
            <div id="user-dashboard" class="col-md-9 sticky-content">
                <p class="lead">Hello, <strong>{{Auth::user()->name}} </strong> </p>
                <section class="row">
                    <div class="col-md-3">
                        <div class="card label-info">
                            <div class="user-box">
                                <h5 class="card-title">Total Orders</h5> 
                                <div class="d-flex  no-block align-items-center">
                                    <span class="icon-box"><i class="fa fa-cart-plus"></i></span> 
                                    <a href="javscript:void(0)" class="link ml-auto">{{count($orders)}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card label-info">
                            @php $orderStatus = array_count_values(array_column($orders->toArray(), 'order_status')); @endphp
                            <div class="user-box">
                                <h5 class="card-title">Pending Orders</h5> 
                                <div class="d-flex  no-block align-items-center">
                                    <span class="icon-box"><i class="fa fa-hourglass-half"></i></span> 
                                    <a href="javscript:void(0)" class="link ml-auto">{{ array_key_exists('pending', $orderStatus) ? $orderStatus['pending'] : '0' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card label-info">
                            <div class="user-box">
                                <h5 class="card-title">Wallet Balance</h5> 
                                <div class="d-flex  no-block align-items-center">
                                    <span class="icon-box" style="font-size: 4rem;padding: 8px;">{{Config::get('siteSetting.currency_symble')}}</span> 
                                    <a href="javscript:void(0)" class="link ml-auto">{{$profile->wallet_balance}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card label-info">
                            <div class="user-box">
                                <h5 class="card-title">Earning Points</h5> 
                                <div class="d-flex  no-block align-items-center">
                                    <span class="icon-box"><i class="fa fa-bookmark"></i></span> 
                                    <a href="javscript:void(0)" class="link ml-auto">0</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>

                <section class="row">
                    <div class="col-md-12">
                        <h2 class="title">Recent Orders</h2>
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
                                           <a class="dropdown-item text-inverse" title="View order" data-toggle="tooltip" href="{{route('user.orderDetails', $order->order_id)}}" data-original-title="View"><i class="fa fa-eye"></i> View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <!--Middle Part End-->
            
        </div>
    </div>
    <!-- //Main Container -->

@endsection     
@section('js')

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

@endsection     


