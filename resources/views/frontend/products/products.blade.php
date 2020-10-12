<div class="product-item-container">
    <div class="left-block">
        <div class="product-image-container">
            <a href="{{ route('product_details', $product->slug) }}" >
            <img src="{{asset('upload/images/product/thumb/'. $product->feature_image)}}" class="img-1 img-responsive">
            </a>
        </div>
    </div>
    <div class="right-block">
        <div class="caption">
            <h4><a href="{{ route('product_details', $product->slug) }}">{{Str::limit($product->title, 20)}}</a></h4>
            <div class="total-price clearfix">
                <div class="price price-left">
                     <label for="ratting5"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></label><br/>
                @if($product->discount)
                    <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price-($product->discount*$product->selling_price)/100 }}</span>
                    <span class="price-old">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                @else
                    <span class="price-new">{{Config::get('siteSetting.currency_symble')}}{{$product->selling_price}}</span>
                @endif
                </div>
                @if($product->discount)
                <div class="price-sale price-right">
                  <span class="discount">
                    -{{$product->discount}}%
                    <strong>OFF</strong>
                  </span>
                </div>
                @endif
            </div>
        @if(!Request::is('/'))
            <div class="description item-desc hidden">
                <p>{!! Str::limit($product->summery, 150) !!} </p>
            </div>
            <div class="list-block hidden">
                <button  type="button" data-toggle="tooltip" onclick="addToCart({{$product->id}})" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                <button class="wishlist btn-button" type="button"  title="Add to Wish List"  @if(Auth::check()) onclick="addToWishlist({{$product->id}})" data-toggle="tooltip" @else data-toggle="modal" data-target="#so_sociallogin" @endif data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                <button class="compare btn-button" type="button"  title="Compare this Product" onclick="addToCompare({{$product->id}})" data-toggle="tooltip" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
            </div>
        @endif
        </div>
        <div class="button-group">
        @if(!Request::is('/'))
            <a class="visible-lg btn-button" onclick="quickview('{{$product->id}}')" href="javascript:void(0)"> <i class="fa fa-search"></i> </a>
        @endif
            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="addToCart('{{$product->id}}')" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>

            <button class="wishlist btn-button" type="button"  title="Add to Wish List" @if(Auth::check()) onclick="addToWishlist({{$product->id}})" data-toggle="tooltip" @else data-toggle="modal" data-target="#so_sociallogin" @endif data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
            
            <button class="compare btn-button" type="button" title="Compare this Product" data-toggle="tooltip" onclick="addToCompare({{$product->id}})" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>

        </div>
    </div>
</div>
