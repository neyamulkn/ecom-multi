@extends('layouts.frontend')
@section('title', Config::get('siteSetting.title'))
@section('metatag')
    <meta name="description" content="Multipurpose eCommerce website">

    <meta name="keywords" content="Multipurpose, eCommerce, website" />

    <meta name="robots" content="index,follow" />
    <link rel="canonical" href="{{ url()->full() }}">
    <link rel="amphtml" href="{{ url()->full() }}" />
    <link rel="alternate" href="{{ url()->full() }}">

    <!-- Schema.org for Google -->

    <meta itemprop="description" content="Multipurpose eCommerce website">
    <meta itemprop="image" content="{{asset('frontend')}}/images/logo/logo.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="Multipurpose eCommerce website">
    <meta name="twitter:title" content="Multipurpose eCommerce website">
    <meta name="twitter:description" content="Multipurpose eCommerce website">
    <meta name="twitter:site" content="{{url('/')}}">
    <meta name="twitter:creator" content="@Neyamul">
    <meta name="twitter:image:src" content="{{asset('frontend')}}/images/logo/logo.png">
    <meta name="twitter:player" content="#">
    <!-- Twitter - Product (e-commerce) -->

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:description" content="Multipurpose eCommerce website">
    <meta name="og:image" content="{{asset('frontend')}}/images/logo/logo.png">
    <meta name="og:url" content="{{ url()->full() }}">
    <meta name="og:site_name" content="Bdtype">
    <meta name="og:locale" content="en">
    <meta name="og:type" content="website">
    <meta name="fb:admins" content="1323213265465">
    <meta name="fb:app_id" content="13212465454">
    <meta name="og:type" content="article">
@endsection
@section('css')
<style type="text/css">
    .brand-list{border: 2px solid #de560d;}
    .brand-thumb{position: relative;width: 100%;padding: 3px;height: 100px;
    background: #fff;text-align: center;}
    .desc-listcategoreis {
        color: #ffffff;
        text-align: center;
        padding: 0px;
        background: #0000006b;
  
    }
    .brand-thumb img{max-height: 100%}
    .homepage .section{max-height: 400px !important; overflow: hidden;}
    .homepage .products-list .product-layout {
      
        max-width: 230px;
        max-height: 335px;
    }
</style>
@endsection

@section('content')
  
    <!-- Slider Arae Start -->
    @include('frontend.sliders.slider2')
    <!-- Slider Arae End -->
  
    <!-- Main Container  -->
  
  	<div class="so-page-builder">
  		<div class="page-builder-ltr homepage" id="loadProducts">
            @include('frontend.homepage.homesection')
      	</div>

        <div class="ajax-load  text-center" id="data-loader" style="display: none;"><img src="{{asset('frontend/image/loading.gif')}}"></div>
    </div>
  
@endsection

@section('js')
<script type="text/javascript">
    var page = 1;
    $(window).scroll(function() {
            
        //check section last page
        if(page <= '{{$sections->lastPage()}}' ){
            page++;
            loadMoreProducts(page);
        }
        
    });

    function loadMoreProducts(page){
       
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                $('.ajax-load').hide();
                $("#loadProducts").append(data.html);
               
                // Content slider
                $('.yt-content-slider').each(function () {
                    var $slider = $(this),
                    $panels = $slider.children('div'),
                    data = $slider.data();
                    // Remove unwanted br's
                    //$slider.children(':not(.yt-content-slide)').remove();
                    // Apply Owl Carousel
        
                    $slider.owlCarousel2({
                        responsiveClass: true,
                        mouseDrag: true,
                        video:true,
                    lazyLoad: (data.lazyload == 'yes') ? true : false,
                        autoplay: (data.autoplay == 'yes') ? true : false,
                        autoHeight: (data.autoheight == 'yes') ? true : false,
                        autoplayTimeout: data.delay * 1000,
                        smartSpeed: data.speed * 1000,
                        autoplayHoverPause: (data.hoverpause == 'yes') ? true : false,
                        center: (data.center == 'yes') ? true : false,
                        loop: (data.loop == 'yes') ? true : false,
                  dots: (data.pagination == 'yes') ? true : false,
                  nav: (data.arrows == 'yes') ? true : false,
                        dotClass: "owl2-dot",
                        dotsClass: "owl2-dots",
                  margin: data.margin,
                    navText:  ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                        
                        responsive: {
                            0: {
                                items: data.items_column4 
                                },
                            480: {
                                items: data.items_column3
                                },
                            768: {
                                items: data.items_column2
                                },
                            992: { 
                                items: data.items_column1
                                },
                            1200: {
                                items: data.items_column0 
                                }
                        }
                    });
                });
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                $('.ajax-load').hide();
            });
        }
</script>
@endsection