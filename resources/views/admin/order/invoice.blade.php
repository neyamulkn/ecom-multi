@extends('layouts.admin-master')
@section('title', 'Invoice ')
@section('css')
<style type="text/css">
    b, strong {
    font-weight: 700;
}
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
                        <h4 class="text-themecolor">Invoice</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            
                            <a href="{{route('admin.orderList')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-eye"></i> Order list</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-right no-print">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-body printableArea">
                                <h3><b>INVOICE NO: </b> <span class="pull-right">#{{$order->order_id}}</span></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left" style="float: left;">
                                            <div style="width:160px; height: 55px;">
                                                <img style="height: 100%; width: 100%;" src="{{asset('frontend/image/logo/'.Config::get('siteSetting.logo'))}}" title="Home" alt="Logo">
                                            </div>
                                        </div>

                                        <div class="pull-right text-right">
                                            <address>
                                           
                                            Plaza Jacinto Benavente 08950 Esplugues de LLobregat (Barcelona)<br/>
                                            Eco Sayan Tex, S.L.
                                            B 67162776
                                            Tel: 930054102<br/>
                                            Phone: +34640691007 (Whatsapp)<br/>
                                            
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @include('inc.order-details')
                            </div>

                            <div class="text-right no-print">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
           
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
@endsection

@section('js')
    <script src="{{asset('js/pages/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
@endsection