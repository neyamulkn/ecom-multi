<?php $brands = App\Models\Brand::where('brands.top', 1)->where('brands.status', 1)
            ->leftJoin('products', 'products.brand_id', 'brands.id')
            ->leftJoin('order_details', 'products.id', 'order_details.product_id')
            ->selectRaw('brands.*, count(order_details.product_id)  as total_order')
            ->groupBy('brands.id')
            ->orderBy('total_order', 'desc')->take(12)->get(); ?>
@if(count($brands)>0)

<section class="section" style="background:{{$section->background_color}}">
  <div class="container">
        <div class="row">
            <div class="col-md-12 catalog">
            	<div class="nav nav-tabs"> <span class="title">{{$section->title}}</span>  </div>
            </div>
            @foreach($brands as $brand)
            <div class="col-xs-6 col-md-2" style="padding-right: 0px;margin-bottom:10px;">
            	<div class="brand-list">
                    <a href="{{ route('product.search') }}?brand={{$brand->id}}"> 
                    <div class="brand-thumb">
                        <img src="{{asset('upload/images/brand/thumb/'.$brand->logo)}}" >
                    </div>
                    <div class="desc-listcategoreis" >
                        <span style="font-weight: bold;font-size: 16px">{{$brand->name}}</span><br/>
                        <span>{{ count($brand->products)}} Products</span>
                           
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif