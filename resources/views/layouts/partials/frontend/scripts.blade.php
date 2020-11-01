<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{asset('frontend')}}/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/themejs/so_megamenu.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/slick-slider/slick.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/themejs/libs.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/unveil/jquery.unveil.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/datetimepicker/moment.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/modernizr/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/minicolors/jquery.miniColors.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/jquery.nav.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/quickview/jquery.magnific-popup.min.js"></script>
<!-- Theme files
   ============================================ -->
<script type="text/javascript" src="{{asset('frontend')}}/js/themejs/application.js"></script>

<script type="text/javascript" src="{{asset('frontend')}}/js/themejs/addtocart.js"></script>
<script src="{{ mix('js/laravel-echo.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script src="{{ asset('frontend/js/typeahead.js') }}"></script>
<script src="{{ asset('frontend/js/toastr.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function ($) {
    "use strict";
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

    // Resonsive Sidebar aside
    $(document).ready(function(){
        $(".open-sidebar").click(function(e){
            e.preventDefault();
            $(".sidebar-overlay").toggleClass("show");
            $(".sidebar-offcanvas").toggleClass("active");
        });
           
        $(".sidebar-overlay").click(function(e){
            e.preventDefault();
            $(".sidebar-overlay").toggleClass("show");
            $(".sidebar-offcanvas").toggleClass("active");
        });
        $('#close-sidebar').click(function() {
            $('.sidebar-overlay').removeClass('show');
            $('.sidebar-offcanvas').removeClass('active');
            
        }); 

    });
        
            
    
    /*function buttonpage(element){
        var $element = $(element),
            $slider = $(".yt-content-slider", $element),
            data = $slider.data();
        if (data.buttonpage == "top") {
            $(".owl2-controls",$element).insertBefore($slider);
            $(".owl2-dots",$element).insertAfter($(".owl2-prev", $slider));
        } else {
            $(".owl2-nav",$element).insertBefore($slider);
            $(".owl2-controls",$element).insertAfter($slider);
        }   
    }
    
    // Home 1 - Latest Blogs
    (function (element) {
        buttonpage(element);
    })(".blog-sidebar");
    
    (function (element) {
        buttonpage(element);
    })("#so_extra_slider_1");
    
    (function (element) {
        buttonpage(element);
    })("#so_extra_slider_2");*/

}); 

</script>
@yield('js')

{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>


<!--     <script>
    
    Echo.channel('postBroadcast')
    .listen('PostCreated', (e) => {
        toastr.info(e.post['title']);
    });
</script> -->
 
<script type="text/javascript">
    //get cart item in header
    function getCart(){
        var url =  window.location.origin+"/cart/view/header";
       
        $.ajax({
            method:'get',
            url:url,
            success:function(data){
               
                if(data){
                    $('#getCartHead').html(data);
                }else{
                    toastr.error('Your cart is empty.');
                }
            }
        });
    } 
</script>
<!-- quickview product -->
<script type="text/javascript">
    function quickview(id){
      
        $('#quickviewModal').modal('show');
        $('#quickviewProduct').html('<div class="loadingData-sm"></div>');
        var url =  "{{route('quickview', ':id')}}";
        url = url.replace(':id',id);
        $.ajax({
            method:'get',
            url:url,
            success:function(data){
                if(data){
                    $('#quickviewProduct').html(data);
                }else{
                    $('#quickviewProduct').html('');
                }
            }
        });
    } 

    $(document).on('hide.bs.modal','#quickviewModal', function () {
        $('#quickviewProduct').html('');
        $('.zoomContainer').html('');
        $(".zoomContainer").css("display", "none");
    });
</script>

<script>
    $(document).ready(function () {
  
        $('#searchKey').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: '{{ route("search_keyword") }}',
                    data: 'q=' + query,            
                    dataType: "json",
                    type: "get",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });

 
</script>