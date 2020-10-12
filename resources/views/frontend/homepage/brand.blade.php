<?php $brands = App\Models\Brand::where('status', 1)->orderBy('position', 'asc')->take(12)->get(); ?>

<div class="row page-builder-ltr">
<div class="col-md-12 catalog">
	<div class="nav nav-tabs"> <span class="title">{{$section->title}}</span>  </div>
</div>
    @foreach($brands as $brand)
    <div class="col-xs-6 col-md-2" style="padding: 0 5px;">
    	<div class="brand-list cat-border">
           
            <div class="brand-thumb" style="position: relative;width: 100%;padding: 3px;height: 100%;border: 2px solid #de560d;background: #fff;">
               
                <img src="{{asset('upload/images/brand/thumb/'.$brand->logo)}}" style="width:100%;height:100%">
               
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