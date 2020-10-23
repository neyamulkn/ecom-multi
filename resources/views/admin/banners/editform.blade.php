    <input type="hidden" value="{{$data->id}}" name="id">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name required">Select Banner Type</label>
                <select required onchange="bannerType(this.value, 'edit')" name="banner_type" class="form-control">
                    <option value="">Select Banner</option>
                    <option @if($data->banner_type == 1) selected @endif value="1">Large Banner</option>
                    <option @if($data->banner_type == 2) selected @endif value="2">Two Banner</option>
                    <option @if($data->banner_type == 3) selected @endif value="3">Three Banner</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row" id="showBannerImageedit">

        <?php 
           
            $width = (1170/$data->banner_type) - ($data->banner_type*5);

         ?>                                                  
        @for($i=0; $i < $data->banner_type; $i++)
       
        @if(isset($data->bannerImage[$i]))
        <div class="col-md-{{12/$data->banner_type}}">
            <div class="form-group">
                <label class="required dropify_image">Banner Image {{$i}}</label>
                <input type="hidden" name="width" value="{{$width}}'">
                <span class="image{{$i}}" >
                    <div class="dropify-wrapper" onclick="removeImage('{{$data->bannerImage[$i]->phato}}', '{{$data->bannerImage[$i]->id}}', 'image{{$i}}')">
                        <img src="{{asset('upload/images/banner/'.$data->bannerImage[$i]->phato)}}" style="width: 100%;height: 100%;">
                        <span  style="position: absolute;top: 0;right: 0;border: 1px solid #fff;padding: 3px;color: red;">Remove</span>
                    </div>
                    
                </span>
                <p style="color:red">Image Size: {{$width}}px * 250px</p> 
                <label class="required" for="btn_link">Link {{$i}}</label>
                <input type="text" value="{{ $data->bannerImage[$i]->btn_link }}" required id="btn_link" name="btn_link[]" placeholder="Exp: {{url('/')}}" class="form-control">
            </div>
        </div>
        @else
        <div class="col-md-{{12/$data->banner_type}}">
            <div class="form-group">
                <label class="required dropify_image">Banner Image {{$i}}</label>
                <input type="hidden" name="width" value="{{$width}}'">
                <span class="image{{$i}}" >
                <input type="file" accept="image/*" data-type='image' data-allowed-file-extensions="jpg jpeg png gif"  name="phato[]"  class="dropify">
               
                    
                </span>
                <p style="color:red">Image Size: {{$width}}px * 250px</p> 
                <label class="required" for="btn_link">Link {{$i}}</label>
                <input type="text"  required id="btn_link" name="btn_link[]" placeholder="Exp: {{url('/')}}" class="form-control">
            </div>
        </div>
        @endif
     @endfor
</div>

<div class="row justify-content-md-center">
                                        
    <div class="col-md-12">
        <div class="form-group">
            <label class="required" for="title">Banner Title</label>
            <input name="title" id="title" value="{{$data->title}}" type="text" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="title_style">Title Font Style</label>
            <input placeholder="Exp. arial" name="title_style" id="title_style" value="{{$data->title_style}}"  type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title_size">Title Font Size(px)</label>
            <input placeholder="Exp. 50" name="title_size" id="title_size" value="{{$data->title_size}}"  type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title_color">Title Font Color</label>
            <input placeholder="Exp. #00000" name="title_color" id="title_color" value="{{$data->title_color}}" type="color" class="form-control">
        </div>
    </div>

<div class="col-md-12">
    <div class="form-group">
        <label for="subtitle">Banner Sub Title</label>
        <input placeholder="Enter sub title" name="subtitle" id="subtitle" value="{{$data->subtitle}}" type="text" class="form-control">
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="subtitle_style">Font Style</label>
        <input placeholder="Exp. arial" name="subtitle_style" id="subtitle_style" value="{{$data->subtitle_style}}"  type="text" class="form-control">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="subtitle_size">Font Size(px)</label>
        <input placeholder="Exp. 50" name="subtitle_size" id="subtitle_size" value="{{$data->subtitle_size}}"  type="text" class="form-control">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="subtitle_color">Font Color</label>
        <input placeholder="Exp. #00000" name="subtitle_color" id="subtitle_color" value="{{$data->subtitle_color}}"  type="color" class="form-control">
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label  for="text_position">Text Position</label>
        <select class="form-control" name="text_position">
            <option {{($data->text_position == 'left') ? 'selected' : ''}} value="left">Left</option>
            <option {{($data->text_position == 'center') ? 'selected' : ''}} value="center">Center</option>
            <option {{($data->text_position == 'right') ? 'selected' : ''}} value="right">Right</option>
        </select>
    </div>
</div>
<div class="col-md-12 mb-12">
    <div class="form-group">
        <label class="switch-box">Status</label>
        <div  class="status-btn" >
            <div class="custom-control custom-switch">
                <input name="status" {{($data->status == 1) ?  'checked' : ''}}   type="checkbox" class="custom-control-input" id="status-edit">
                <label class="custom-control-label" for="status-edit">Publish/UnPublish</label>
            </div>
        </div>
    </div>
</div>

