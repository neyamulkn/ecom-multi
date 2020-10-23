<?php $brands = App\Models\Brand::where('brands.top', 1)->where('brands.status', 1)
            ->leftJoin('products', 'products.brand_id', 'brands.id')
            ->leftJoin('order_details', 'products.id', 'order_details.product_id')
            ->selectRaw('brands.*, count(order_details.product_id)  as total_order')
            ->groupBy('brands.id')
            ->orderBy('total_order', 'desc')->take(12)->get(); ?>

@section('perpage-css')
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
<div class="row page-builder-ltr">
    <div class="col-md-12 catalog">
    	<div class="nav nav-tabs"> <span class="title">{{$section->title}}</span>  </div>
    </div>
    @foreach($brands as $brand)
    <div class="col-xs-6 col-md-2" style="padding: 0 5px;">
    	<div class="brand-list cat-border">
           
            <div class="brand-thumb">
               
                <img src="{{asset('upload/images/brand/thumb/'.$brand->logo)}}" >
               
                <div class="desc-listcategoreis" >
                    <div class="name_categories">
                        <h6>{{$brand->name}}</h6>
                    </div>
                    <span class="number_product">{{ count($brand->products)}} Products</span>
                     <a href="{{ route('product.search') }}?brand={{$brand->id}}"> Shop Now <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
</div>