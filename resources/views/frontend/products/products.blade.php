
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
        <h4><a href="{{ route('product_details', $product->slug) }}">{{Str::limit($product->title, 22)}}</a></h4>
        <div class="total-price clearfix">
            <div class="price price-left">
                <div class="rating">
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                </div>
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
            <div class="description item-desc hidden">
                <p>{!! Str::limit($product->summery, 150) !!} </p>
            </div>
            <div class="list-block hidden">
                <button  type="button" data-toggle="tooltip" onclick="addToCart({{$product->id}})" data-original-title="Add to Cart "><i class="fa fa-cart-plus"></i> </button>
                <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
            </div>
        </div>
        <div class="button-group">
            <a class="quickview visible-lg btn-button" onclick="quickview('{{$product->id}}')" href="#"> <i class="fa fa-search"></i> </a>
            <button class=" btn-button" type="button" data-toggle="tooltip" title="" onclick="addToCart('{{$product->id}}')" data-original-title="Add to Cart"><i class="fa fa-cart-plus"></i> </button>
            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30');" data-original-title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30');" data-original-title="Compare this Product"><i class="fa fa-retweet"></i></button>

        </div>
    </div>
</div>
