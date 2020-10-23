@extends('layouts.frontend')
@section('title', 'Mega Discount | '. Config::get('siteSetting.site_name') )
@section('css')

@endsection
@section('content')

    <!-- Main Container  -->
    <div class="breadcrumbs">
        <div class="container">
            
            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
                <li>Mega Discount</li>
            </ul>
        </div>
    </div>
    @include('frontend.sliders.slider2')
    <div class="container">
        <div class="row">
         
            <div id="content" class="col-md-12 col-sm-12 col-xs-12" >

                <div id="pageLoading"></div>
                
                <div class="products-category">
                     
                    @if(count($products)>0)
                        
                        <div class="products-list grid row number-col-6 so-filter-gird">
                            @foreach($products as $product)
                            <div class="product-layout col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                @include('frontend.homepage.products')
                            </div>
                            @endforeach
                        </div>

                        <div class="product-filter product-filter-bottom filters-panel">
                            <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                               {{$products->appends(request()->query())->links()}}
                              </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 text-right">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of total {{$products->total()}} entries ({{$products->lastPage()}} Pages)</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   
@endsection
