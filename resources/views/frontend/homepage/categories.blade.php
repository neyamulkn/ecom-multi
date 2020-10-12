<?php  
	$products = App\Models\Product::whereIn('id', explode(',', $section->product_id))->orderBy('position', 'asc')->take(10)->get(); 
	$cat = 2;
?>
@if(count($products)>0)
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 col_hksd block">
        <div class="module so-listing-tabs-ltr home3_listingtab_style2">
	        <div class="head-title">
	            <h3 class="modtitle">{{$section->title}}</h3>
	        </div>
	        <div class="modcontent">
	            <div id="so_listing_tabs_727" class="so-listing-tabs first-load module">
	              <div class="ltabs-wrap">
	                <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-margin="0">
	                      <!--Begin Tabs-->
	                    <div class="ltabs-tabs-wrap">
	                        <span class="ltabs-tab-selected"></span>
	                        <span class="ltabs-tab-arrow">▼</span>
	                        <div class="item-sub-cat">
	                            <ul class="ltabs-tabs cf">

	                               <li class="ltabs-tab tab-sel" data-category-id="40" data-active-content=".items-category-40">
	                               		<div class="ltabs-tab-img">
	                                    <img src="{{asset('frontend')}}/image/catalog/demo/category/94.jpg"
	                                        title="CASE" alt="CASE"
	                                        style="background:#fff"/>
	                                    </div>
	                                    <span class="ltabs-tab-label">
	                                    CASE
	                                    </span>
	                                </li>
	                                
	                            </ul>
	                         </div>
	                    </div>
	                    <!-- End Tabs-->
	                </div>
	                <div class="wap-listing-tabs products-list grid">
	                    <div class="ltabs-items-container">
	                        <div class="ltabs-items ltabs-items-selected items-category-40" data-total="12">
	                            <div class="ltabs-items-inner ltabs-slider ">
	                            @foreach($products as $product)
	                              	@if($cat % 2 == 0)
	                                <div class="ltabs-item">
	                                    <div class="item-inner product-thumb trg transition product-layout">
	                                      	@include('frontend.homepage.products')
	                                    </div>
	                                @else
	                                    <div class="item-inner product-thumb trg transition product-layout">
		                                   @include('frontend.homepage.products')
	                                    </div>
	                                </div>
	                                @endif
	                                <?php $cat++; ?>
	                            @endforeach
	                            </div>
	                        </div>
	                    </div>
	                </div>
	              </div>
	            </div>
	        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col_ksh4  block block_3 hidden-sm ">
		<div class="banner-layout-2 bn-2 clearfix">
			<div class="banners">
				 <a title="Static Image" href="#"><img src="{{asset('frontend')}}/image/catalog/demo/banners/home2/banner04.jpg" alt="Static Image"></a>
			</div>
		</div>
	</div>
</div>
@endif