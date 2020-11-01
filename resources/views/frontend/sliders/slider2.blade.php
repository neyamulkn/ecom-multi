@if(count($sliders)>0)
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_k2sd col-style">
        <div class="module sohomepage-slider so-homeslider-ltr" style="overflow: hidden; max-height: 375px !important">
            <div class="modcontent">
                <div id="sohompage-slider1" style="margin-top: 5px;">
                    <div class="so-homeslider yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6"data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                    @foreach($sliders as $slider)
                    <div class="item">
                        <a href="{{$slider->btn_link}}" target="_self">
                        <img class="responsive" src="{{asset('upload/images/slider/'.$slider->phato)}}" alt="slider image">
                        </a>
                        <div class="slider-details">
                           <div class="slider-content-5 slider-animated-1 text-{{$slider->text_position}}" style="overflow: hidden;">
                                <h1><strong style="font-size:{{$slider->title_size}}px; color:{{$slider->title_color}}; font-family: {{$slider->title_style}}"> {{ $slider->title }} </strong></h1>
                                <p style="font-size:{{$slider->title_size}}px; color:{{$slider->title_color}}; font-family: {{$slider->title_style}}">{{$slider->subtitle}}</p>
                               @if($slider->btn_text) <a href="{{$slider->btn_link}}" class="btn btn-info">{{($slider->btn_text) ? $slider->btn_text : 'SHOP NOW'}}</a>@endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endif


