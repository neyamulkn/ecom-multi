@extends('layouts.frontend')
@section('title', $page->title . ' | '. Config::get('siteSetting.site_name') )
@section('css')


<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 100%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
      
        font-size: 27px;
        padding: 10px;
    }
</style>
@endsection
@section('content')

<!-- Main Container  -->
<div class="breadcrumbs">
    <div class="container">
        
        <ul class="breadcrumb-cate">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
            <li>{{$page->title}}</li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header">{{$page->title}}</div>
                    <div class="panel-body text-center">
                        
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57498.00018486391!2d89.22702579641296!3d25.749911571544892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e32de6fca6019b%3A0x9fa496e687f818c8!2sRangpur!5e0!3m2!1sen!2sbd!4v1605505402333!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-md-6">
             <div class="well well-sm">
                <fieldset>
                    <legend class="text-center header">Address</legend>
                </fieldset>
                <div class="panel-body text-center">
                     {!! $page->description !!}
                    <hr />
                </div>
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact Form</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="name" name="name" type="text" placeholder="Full Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>
    </div>
</div>


  
    
    
@endsection

@section('js')

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>
@endsection