<?php  $services = App\Models\Services::where('status', 1)->orderBy('position', 'asc')->take(5)->get(); ?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="block-service-home6">
      <ul>
        @foreach($services as $service)
        <li class="item">
          <div class="wrap">
            <div class="icon">@if($service->image)<img src="{{asset('upload/images/services/'.$service->image)}}" alt="Image">@else <i style="font-size: 45px;" class="{{$service->font}}"></i>@endif</div>
            <div class="text" style="text-align: left;">
              <h5><a>{{$service->title}}</a></h5>
              <p>{{$service->subtitle}}</p>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>