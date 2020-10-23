@extends('layouts.frontend')
@section('title', 'Top Brand | '. Config::get('siteSetting.site_name') )
@section('css')
<style type="text/css">
    .brand-thumb{position: relative;width: 100%;padding: 3px;height: 100%;border: 2px solid #de560d;background: #fff;direction: rtl;}
    .desc-listcategoreis {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        color: #ffffff;
        text-align: left;
        padding: 12% 20px;
        top: 50%;
        background: #0000006b;
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .brand-thumb img{max-height: 100%}
</style>
@endsection
@section('content')

    <!-- Main Container  -->
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
                <li>Top Brand</li>
            </ul>
        </div>
    </div>
    @include('frontend.sliders.slider2')
    <div class="container" style="background: #fff;">
        <div class="row">
            <h1 style="padding: 0px"><img style="width: 130px;" src="{{asset('frontend/image/brand/brand.png')}}"> Top {{count($brands)}} Brands</h1>
            @foreach($brands as $brand)
            <div class="col-xs-6 col-md-3" style="padding: 0 5px;">
                <div class="brand-list cat-border" style="height: 130px; max-height: 130px">
                   
                    <div class="brand-thumb">
                       <a href="{{ route('product.search') }}?brand={{$brand->id}}">
                        <img src="{{asset('upload/images/brand/thumb/'.$brand->logo)}}">
                       
                        <div class="desc-listcategoreis" >
                            <div class="name_categories">
                                <h6>{{$brand->name}}</h6>
                            </div>
                            <span class="number_product">{{ count($brand->products)}} Products</span>
                            Shop Now <i class="fa fa-angle-right"></i>
                        </div>
                        </a>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
      
@endsection

@section('js')

@endsection