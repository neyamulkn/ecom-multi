<?php include('inc/main-header.php'); ?>

<style type="text/css">
  .grid .col-lg-3{padding-right: 0px !important;}
</style>
	<!-- Main Container  -->
	<div class="breadcrumbs">
		<div class="container">
			
			<ul class="breadcrumb-cate">
        @if(Request::route('catslug'))
        <li><a href="{{route('home.category', Request::route('catslug') )}}">{{ Request::route('catslug') }}</a></li>
        @endif
        @if(Request::route('subslug'))
        <li><a href="{{route('home.category', [Request::route('catslug'), Request::route('subslug')] )}}">{{ Request::route('subslug')}}</a></li>
        @endif
        @if(Request::route('childslug'))
        <li>{{Request::route('childslug')}}</li>
        @endif
			</ul>
		</div>
	</div>
	
	<div class="container product-detail">
		<div class="row">
			<aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas">
				<span id="close-sidebar" class="fa fa-times"></span>
				<div class="module so_filter_wrap filter-horizontal">
					<h3 class="modtitle"><span>Filter By</span></h3>
					<div class="modcontent">
						<ul>
							

              <li class="so-filter-options" data-option="Size">
								<div class="so-filter-heading">
									<div class="so-filter-heading-text">
										<span>Related Categories</span>
									</div>
									<i class="fa fa-chevron-down"></i>
								</div>
								<div class="so-filter-content-opts" style="display: block;">
									
                  <div class="mod-content box-category">
                     <ul class="accordion" id="accordion-category">
                      <li class="panel">
                       <a href="#">{{$category->name}}</a>
                       <span class="head"><a class="pull-right accordion-toggle " data-toggle="collapse" data-parent="#accordion-category" href="#category0 "></a></span>
                       <div id="category0" class="panel-collapse collapse  " style="clear:both">
                        <ul>
                          @foreach($filterCategories as $filterCategory )
                            <?php 
                            $category = $subcategory = $childcategory = '';
                            if(Request::route('catslug')){
                                $category = Request::route('catslug');
                                $subcategory = $filterCategory->slug;
                            }
                            if(Request::route('subslug')){
                                $category = Request::route('catslug');
                                $subcategory = Request::route('subslug');
                                $childcategory = $filterCategory->slug;
                            }
                              ?>
                             <li>
                                <a href="{{route('home.category', [$category, $subcategory, $childcategory])}}">{{$filterCategory->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                       </div>
                      </li>
                      
                     </ul>
                  </div>
                 
                </div>

            </li>

              <li class="so-filter-options" data-option="Size">
                <div class="so-filter-heading">
                  <div class="so-filter-heading-text">
                    <span>Size</span>
                  </div>
                  <i class="fa fa-chevron-down"></i>
                </div>
                <div class="so-filter-content-opts" style="display: block;">
                  <div class="so-filter-content-opts-container">

                    
										<div class="so-filter-option opt-select  opt_enable" data-type="option" data-option_value="46" data-count_product="1" data-list_product="111">
											<div class="so-option-container">
												<div class="option-input">
													<span class="fa fa-square-o">
													</span>
												</div>
												<label>S</label>
												<div class="option-count ">
													<span>1</span>
													<i class="fa fa-times"></i>
												</div>
											</div>
										</div>
											<div class="so-filter-option opt-select  opt_enable" data-type="option" data-option_value="47" data-count_product="1" data-list_product="111">
												<div class="so-option-container">
													<div class="option-input">
														<span class="fa fa-square-o">
														</span>
													</div>
													<label>M</label>
													<div class="option-count ">
														<span>1</span>
														<i class="fa fa-times"></i>
													</div>
												</div>
											</div>
											<div class="so-filter-option opt-select  opt_enable" data-type="option" data-option_value="48" data-count_product="1" data-list_product="111">
												<div class="so-option-container">
													<div class="option-input">
														<span class="fa fa-square-o">
														</span>
													</div>
													<label>L</label>
													<div class="option-count ">
														<span>1</span>
														<i class="fa fa-times"></i>
													</div>
												</div>
											</div>
									</div>
								</div>
							</li>
							<li class="so-filter-options" data-option="Manufacturer">
								<div class="so-filter-heading">
									<div class="so-filter-heading-text">
										<span>Manufacturer</span>
									</div>
									<i class="fa fa-chevron-down"></i>
								</div>

								<div class="so-filter-content-opts">
									<div class="so-filter-content-opts-container">
										<div class="so-filter-option opt-select  opt_enable" data-type="manufacturer" data-manufacturer_value="8" data-count_product="4" data-list_product="30,58,61,105">
											<div class="so-option-container">
												<div class="option-input">
													<span class="fa fa-square-o">
													</span>
												</div>
												<label><img src="image/placeholder.png" style="width: 20px; height: 20px;"> Apple</label>
												<div class="option-count ">
													<span>4</span>
													<i class="fa fa-times"></i>
												</div>
											</div>
										</div>
										<div class="so-filter-option opt-select  opt_enable" data-type="manufacturer" data-manufacturer_value="10" data-count_product="1" data-list_product="68">
											<div class="so-option-container">
												<div class="option-input">
													<span class="fa fa-square-o">
													</span>
												</div>
												<label><img src="image/placeholder.png" style="width: 20px; height: 20px;"> Sony</label>
												<div class="option-count ">
													<span>1</span>
													<i class="fa fa-times"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="so-filter-options" data-option="Price">
								<div class="so-filter-heading">
									<div class="so-filter-heading-text">
										<span>Price</span>
									</div>
									<i class="fa fa-chevron-down"></i>
								</div>
								<div class="so-filter-content-opts">
									<div class="so-filter-content-opts-container">
										<div class="so-filter-content-wrapper so-filter-iscroll">
											<div class="so-filter-options">
												<div class="so-filter-option so-filter-price">
													<div class="content_min_max">
														<div class="put-min put-min_max">
														$ <input type="number" class="input_min form-control" value="74" min="74" max="1202">
														</div>
														<div class="put-max put-min_max">
														$ <input type="number" class="input_max form-control" value="1202" min="74" max="1202">
														</div>
													</div>
													<div class="content_scroll">
														<div id="slider-range"</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<div class="clear_filter">
							<a href="javascript:;" class="btn btn-default inverse" id="btn_resetAll">
								<span class="hidden fa fa-times" aria-hidden="true"></span> Reset All
							</a>
						</div>
					</div>
				</div>
				
			</aside>
			<div id="content" class="col-md-9 col-sm-12 col-xs-12">
      
				<a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>
        
				<div class="products-category">
					
					<div class="products-category">
						<div class="product-filter filters-panel">
							<div class="row">
                <div class="col-sm-4">(5) products found</div>
								
							
								<div class="short-by-show form-inline text-right col-md-6 col-sm-6">
									<div class="form-group short-by">
										<label class="control-label" for="input-sort">Sort By:</label>
										<select id="input-sort" class="form-control" onchange="location = this.value;">
											<option value="" selected="selected">Default</option>
											<option value="">Name (A - Z)</option>
											<option value="">Name (Z - A)</option>
											<option value="">Price (Low &gt; High)</option>
											<option value="">Price (High &gt; Low)</option>
											<option value="">Rating (Highest)</option>
											<option value="">Rating (Lowest)</option>
											<option value="">Model (A - Z)</option>
											<option value="">Model (Z - A)</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="input-limit">Show:</label>
										<select id="input-limit" class="form-control" onchange="location = this.value;">
											<option value="" selected="selected">12</option>
											<option value="">25</option>
											<option value="">50</option>
											<option value="">75</option>
											<option value="">100</option>
										</select>
									</div>
									
								</div>
                <div class="col-sm-2 view-mode hidden-sm hidden-xs">
                  <div class="list-view" style="float: right;">
                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                  </div>
                </div>
							
							</div>
						</div>
						<div class="products-list grid row number-col-4 so-filter-gird">
              
              <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
							 <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
               <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title="Portable  Compact Charger (External Battery) t45">
                        <img src="image/catalog/demo/product/electronic/4.jpg" alt=" Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/6.jpg" alt="Portable  Compact Charger (External Battery) t45" title="Portable  Compact Charger (External Battery) t45" class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="box-label">
                      
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html">Portable  Compact Charger (External Battery) t45</a></h4>
                      <div class="total-price clearfix">
                        <div class="price price-left">
                          <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                          </div>
                          <span class="price-new">$74.00</span>
                          <span class="price-old">$122.00</span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">
                            -40%
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button  type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="product-layout  col-lg-3 col-md-4 col-sm-6 col-xs-6" >
                <div class="product-item-container">
                  <div class="left-block">
                    <div class="product-image-container  second_img  ">
                      <a href="product.html" title=" Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus ">
                        <img src="image/catalog/demo/product/electronic/1.jpg" alt=" Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus " title=" Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus " class="img-1 img-responsive">
                        <img src="image/catalog/demo/product/electronic/10.jpg" alt=" Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus " title=" Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus " class="img-2 img-responsive">
                      </a>
                    </div>
                    <div class="countdown_box">
                      <div class="countdown_inner">
                      </div>
                    </div>
                    <div class="box-label">
                      <span class="label-product label-sale">
                        Sale
                      </span>
                    </div> 
                  </div>
                  <div class="right-block">
                    <div class="caption">
                      <h4><a href="product.html"> Magnetic Air Vent Phone Holder for iPhone 7 / 7 Plus </a></h4>
                      <div class="total-price">
                        <div class="price price-left">
                          <span class="price-new">$98.00 </span> <span class="price-old">$122.00 </span>
                        </div>
                        <div class="price-sale price-right">
                          <span class="discount">-20% 
                            <strong>OFF</strong>
                          </span>
                        </div>
                      </div>
                      <div class="description item-desc hidden">
                        <p>【Neckband Designed】: Around-the-Neck Wearing Style With Body-contoured Fit. Made of ultra-light shape-memory alloy, great for easy carrying and all day comfort. Ensures a 100% comfortable fit especial.. </p>
                      </div>
                      <div class="list-block hidden">
                        <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
                        <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                        <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                      </div>
                    </div>
                    <div class="button-group">
                      <a class="quickview iframe-link visible-lg btn-button" data-fancybox-type="iframe" href="#"> <i class="fa fa-search"></i> </a>
                      <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                      <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>
                      <button class="addToCart btn-button" type="button" data-toggle="tooltip" title="" onclick="cart.add('30', '1');" data-original-title="Add to Cart"><span class="hidden">Add to Cart </span></button>
                    </div>
                  </div>
                </div>
              </div>
              
						</div>
						
						<div class="product-filter product-filter-bottom filters-panel">
							<div class="col-sm-6 text-left">
                <ul class="pagination">
                  <li class="active"><span>1</span>
                  </li>
                  <li><a href="#">2</a>
                  </li>
                  <li><a href="#">&gt;</a>
                  </li>
                  <li><a href="#">&gt;|</a>
                  </li>
                </ul>
              </div>
							<div class="col-sm-6 text-right">Showing 1 to 9 of 9 (1 Pages)</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
  <?php include('inc/main-footer.php'); ?>
  <script type="text/javascript" src="js/themejs/noui.js"></script>

	<!-- //Main Container -->
	   
   

 