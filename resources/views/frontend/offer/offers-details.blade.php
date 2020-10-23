@extends('layouts.frontend')
@section('title', 'Offers  | '. Config::get('siteSetting.site_name') )
@section('css')

@endsection
@section('content')
<div id="pageLoading"></div>
    <!-- Main Container  -->
    <div class="breadcrumbs">
        <div class="container">

            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
                <li><a href="{{ route('offers') }}"></a> Offers</li></li>
                <li>{{$offer->title}}</li>
            </ul>
        </div>
    </div>
    @if($offer->banner)
    <div class="category-ksh form-group">
      <div class="row">
        <div class="col-sm-12">
        <div class="banners">
          <div>
            <a href="#">
            <img src="{{asset('upload/images/offer/banner/'.$offer->banner)}}">
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
    @endif
    @if(count($products)>0)

        <section class="offers" style="padding: 10px 0; background:{{$offer->background_color}}">
            <div class="container">
                <div class="products-category">
                    <div class="products-list grid row ">
                        @foreach($products as $product)
                        <div class="product-layout col-lg-2 col-md-2 col-sm-4 col-xs-6">
                           @include('frontend.offer.products')
                        </div>
                        @endforeach
                    </div>

                    <div class="row" style="background: #fff;">
                        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                           {{$products->appends(request()->query())->links()}}
                          </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 text-right">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of total {{$products->total()}} entries ({{$products->lastPage()}} Pages)</div>
                    </div>
                </div>
            </div>
        </section>

    @else
        <div style="text-align: center;">
            <i style="font-size: 80px;" class="fa fa-shopping-cart"></i>
            <h1>Sorry at this moment any offer not available.</h1>
            <p>Looks line you have no items in your shopping cart.</p>
            Click here <a href="{{url('/')}}">Continue Shopping</a>
        </div>
    @endif
 @endsection

@section('js')

@endsection
