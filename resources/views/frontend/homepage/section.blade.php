<?php  

$products = App\Models\Product::whereIn('id', explode(',', $section->product_id))->where('status', 'active')->selectRaw('id,title,selling_price,discount, slug, feature_image')->orderBy('id', 'desc')->take(7)->get();
?>
@if(count($products)>0)
<section class="section" style="background:{{$section->background_color}}">
    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <section id="box-link1" class="section-style">
                <div class="nav nav-tabs">
                  <span class="title" style="color: {{$section->text_color}} !important;">{{$section->title}}</span> 
                  <span class="moreBtn"><a href="{{route('moreProducts', $section->slug)}}" style="color: {{$section->text_color}} !important;">See More</a></span>
                </div>
               
                  <div class="clearfix module horizontal">
                    <div class="products-category">
                        <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="yes" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="5" data-items_column0="6" data-items_column1="5" data-items_column2="5" data-items_column3="4" data-items_column4="3" data-arrows="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
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
    </div>
</section>
@endif