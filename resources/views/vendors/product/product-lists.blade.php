@extends('vendors.partials.vendor-master')
@section('title', 'Product list')
@section('css')

    <link href="{{asset('assets')}}/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets')}}/node_modules/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <link href="{{asset('css')}}/pages/bootstrap-switch.css" rel="stylesheet">

    <style type="text/css">
        .dropify_image{
            position: absolute;top: -12px!important;left: 12px !important; z-index: 9; background:#fff!important;padding: 3px;
        }
        .dropify-wrapper{
            height: 100px !important;
        }
        svg{width: 20px}
     
    </style>

@endsection
@section('content')
                <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Product List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                                <li class="breadcrumb-item active">list</li>
                            </ol>
                            <a class="btn btn-info d-none d-lg-block m-l-15" href="{{ route('vendor.product.upload') }}"><i
                                    class="fa fa-plus-circle"></i> Add New Product</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
              
                <!-- Start Page Content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" style="overflow-x: initial !important;overflow-y: initial !important;">
                                    <table  class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Sales</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($products)>0)
                                                @foreach($products as $product)
                                                <tr id="item{{$product->id}}">
                                                    <td> <img src="{{asset('upload/images/product/thumb/'.$product->feature_image)}}" alt="Image" width="60"> </td>
                                                    <td><a href="{{ route('product_details', $product->slug) }}"> {{Str::limit($product->title, 40)}}</a></td>
                                                    
                                                    <td>{{$product->get_category->name}}</td>
                                                    <td>{{($product->stock) ? $product->stock : 0 }}</td>
                                                    <td>{{ $product->sales }}</td>
                                                    <td>{{$site['currency_symble']}}{{$product->purchase_price}}</td>
                                                 
                                                    <td>
                                                        @if($product->status != 'unapprove')
                                                        <div class="custom-control custom-switch">
                                                          <input  name="status" onclick="satusActiveDeactive('products', {{$product->id}})"  type="checkbox" {{($product->status == 1 || $product->status == 'active') ? 'checked' : ''}}  type="checkbox" class="custom-control-input" id="status{{$product->id}}">
                                                          <label style="padding: 5px 12px" class="custom-control-label" for="status{{$product->id}}"></label>
                                                        </div>
                                                        @else
                                                            <span class="label label-warning"> Un Approved </span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-inverse" title="View product" data-toggle="tooltip" href="{{ route('product_details', $product->slug) }}"><i class="ti-eye"></i> View Product</a>
                                                            <a class="dropdown-item" title="Edit product" data-toggle="tooltip" href=""><i class="ti-pencil-alt"></i> Edit</a>
                                                            <span title="Highlight product (Ex. Best Seller, Top Rated etc.)" data-toggle="tooltip">
                                                            <a onclick="producthighlight({{ $product->id }})" class="dropdown-item"  href="javascript:void(0)"><i class="ti-pin-alt"></i> Highlight</a></span>
                                                            <span title="Manage Gallery Images" data-toggle="tooltip">
                                                            <a onclick="setGallerryImage({{ $product->id }})" data-toggle="modal" data-target="#GallerryImage" class="dropdown-item" href="javascript:void(0)"><i class="ti-image"></i> Gallery Images</a></span>
                                                            <span title="Delete" data-toggle="tooltip"><button   data-target="#delete" onclick='deleteConfirmPopup("{{route("vendor.product.delete", $product->id)}}")'  data-toggle="modal" class="dropdown-item" ><i class="ti-trash"></i> Delete Product</button></span>
                                                        </div>
                                                    </div>                                                  
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else <tr><td>No Products Found.</td></tr>@endif
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-12 text-center">
                                           {{$products->appends(request()->query())->links()}}
                                          </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- Gallery Modal -->
        <div class="modal fade" id="GallerryImage" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Gallery Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row">
                        <div class="card-body">
                            <form action="{{route('product.storeGalleryImage')}}" enctype="multipart/form-data" method="POST" class="floating-labels">
                                {{csrf_field()}}
                               
                                <div class="form-body">
                                   
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-group"> 
                                                <label class="dropify_image">Select Multiple Image</label>
                                                <input  type="file" multiple class="dropify" accept="image/*" data-type='image' data-allowed-file-extensions="jpg jpeg png gif"  data-max-file-size="2M"  name="gallery_image[]" id="input-file-events">
                                            </div>
                                            @if ($errors->has('gallery_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('gallery_image') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12" id="showGallerryImage"></div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="submit" value="add" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-inverse">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <!-- HightLight Modal -->
        <!-- Gallery Modal -->
        <div class="modal fade" id="producthighlight_modal" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hightlight Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row">
                        <div class="card-body">
                            
                            <div class="form-body">
                               <div id="highlight_form"></div>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
        @include('admin.modal.delete-modal')
@endsection
@section('js')


    <script type="text/javascript">


    function setGallerryImage(id) {
       
        $('#showGallerryImage').html('<div class="loadingData"></div>');
        var  url = '{{route("product.getGalleryImage", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#showGallerryImage").html(data);
                }else{
                     $('#showGallerryImage').html('Gallery image not fuond. Please upload image.');
                }
            },
            // $ID = Error display id name
            @include('common.ajaxError', ['ID' => 'showGallerryImage'])

        });
    }


    function deleteGallerryImage(id) {
       
        if (confirm("Are you sure delete this image.?")) {
           
            var url = '{{route("product.deleteGalleryImage", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                    if(data){
                        $('#gelImage'+id).hide();
                        toastr.success(data.message);
                    }else{
                        toastr.error(data.message);
                    }
                }
            });
        }
        return false;
    }


    function producthighlight(id){
        $('#highlight_form').html('<div class="loadingData"></div>');
        $('#producthighlight_modal').modal('show');
        var  url = '{{route("product.highlight", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#highlight_form").html(data);
                }
            },
            // $ID = Error display id name
            @include('common.ajaxError', ['ID' => 'highlight_form'])

        });
    }

        //change status by id
        function highlightAddRemove(section_id, product_id){
            var  url = '{{route("highlightAddRemove")}}';
            $.ajax({
                url:url,
                method:"get",
                data:{section_id:section_id, product_id:product_id},
                success:function(data){
                    if(data.status){
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                }
            });
        }

</script>
   <script src="{{asset('assets')}}/node_modules/dropify/dist/js/dropify.min.js"></script>
     <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
    </script>

        <!-- bt-switch -->
    <script src="{{asset('assets')}}/node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>
@endsection
