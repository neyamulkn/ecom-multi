<?php  

$products = App\Models\Product::whereIn('id', explode(',', $section->product_id))->where('status', 1)->selectRaw('id,title,selling_price,discount, slug, feature_image')->orderBy('id', 'desc')->take(10)->get();
?>
@if(count($products)>0)
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <section id="box-link1" class="section-style">
        <div class="nav nav-tabs">
          <span class="title">{{$section->title}}</span> 
          <span class="moreBtn"><a href="{{route('moreProducts', $section->slug)}}">See More</a></span>
        </div>
       
          <div class="clearfix module horizontal">
            <div class="products-category">
                <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="5" data-items_column0="5" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                  @foreach($products as $product)
                  <div class="item-inner product-thumb trg transition product-layout">
                      @include('frontend.homepage.products')
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
   
    </section>
  </div>
</div>
@endif