@extends('layouts.admin-master')
@section('title', 'Homepage section list')

@section('css-top')
    <link href="{{asset('assets')}}/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('css')

    <style type="text/css">
        .select2-container--default .select2-selection--multiple .select2-selection__rendered{height: 100px!important}
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
                        <h4 class="text-themecolor">Homepage section List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">homepage</a></li>
                                <li class="breadcrumb-item active">list</li>
                            </ol>
                            <button data-toggle="modal" data-target="#add" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                 <i class="drag-drop-info">Drag & drop sorting position</i>
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Section Title</th>
                                                <th>Section Type</th>
                                                <th>Is Default</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="positionSorting">
                                            @foreach($homepageSections as $data)
                                            <tr style="background:{{$data->background_color}};color: {{$data->text_color}}" id="item{{$data->id}}">
                                                <td>{{$data->title}}</td>
                                                <td>{{str_replace('_', ' ', $data->type)}}</td>
                                               <td><span class="label label-info"> {!!($data->is_default == 1) ? 'Default' : 'Custom' !!}</span>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch" style="padding-left: 3.25rem;">
                                                      <input name="status" onclick="satusActiveDeactive('homepage_sections', {{$data->id}})"  type="checkbox" {{($data->status == 1) ? 'checked' : ''}} class="custom-control-input" id="status{{$data->id}}">
                                                      <label class="custom-control-label" for="status{{$data->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="edit('{{$data->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="ti-pencil" aria-hidden="true"></i> Edit</button>
                                                    <button title="Delete" data-target="#delete" onclick="deleteConfirmPopup('{{route("admin.homepageSection.delete", $data->id)}}')" class="btn btn-danger btn-sm" data-toggle="modal"><i class="ti-trash" aria-hidden="true"></i> </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- update Modal -->
        <div class="modal fade" id="add" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Homepage section</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row">
                        <div class="card-body">
                            <form action="{{route('admin.homepageSection.store')}}" method="POST" >
                                {{csrf_field()}}
                                <div class="form-body">
                                    <!--/row-->
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required" for="name">Section Title</label>
                                                <input  name="title" id="name" value="{{old('title')}}" required="" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name required">Select Type</label>
                                                <select required onchange="sectionType(this.value)" name="section_type" class="form-control">
                                                    <option value="">Selct one</option>
                                                    <option value="banner">Banner</option>
                                                    <option  value="category">Product Category</option>
                                                    <option  value="section">Products</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required" for="name">Bacground Color</label>
                                                <input name="background_color" value="#ffffff" class="form-control" onfocus="(this.type='color')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required" for="name">Text Color</label>
                                                <input name="text_color" value="#000000" class="form-control" onfocus="(this.type='color')">
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="showSection"></div>

                                    </div>

                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="head-label">
                                                <label class="switch-box" style="margin-left: -12px; top:-12px;">Status</label>
                                                <div  class="status-btn" >
                                                    <div class="custom-control custom-switch">
                                                        <input name="status" checked  type="checkbox" class="custom-control-input" {{ (old('status') == 'on') ? 'checked' : '' }} id="status">
                                                        <label  class="custom-control-label" for="status">Publish/UnPublish</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" value="add" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <button type="button" data-dismiss="modal" class="btn btn-inverse">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <!-- update Modal -->
        <div class="modal fade" id="edit" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <form action="{{route('admin.homepageSection.update')}}"  method="post">
                      {{ csrf_field() }}
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update homepage section</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row" id="edit_form"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>

        <!-- delete Modal -->
        @include('admin.modal.delete-modal')

@endsection
@section('js')

    <script src="{{asset('assets')}}/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

    <!-- end - This is for export functionality only -->
    <script>
        $(".select2").select2();
    </script>

    <script type="text/javascript">


    function sectionType(sectionType){
        var output = '';
        if(sectionType== 'banner'){
            output = '<div class="col-md-12"><div class="form-group"> <label class="required" for="product_id">Select Banner</label> <select name="product_id" required="required" id="product_id" class="form-control custom-select"> <option value="">Select banner</option>@foreach($banners as $banner)<option value="{{$banner->id}}" > {{$banner->title}}</option>@endforeach</select> </div></div>';
        }else if(sectionType== 'category'){
            output = '<div class="col-md-12"><div class="form-group"> <label class="required" for="product_id">Product Categories</label> <select name="product_id" required="required" id="product_id" class="form-control custom-select"> <option value="">Select category</option>@foreach($categories as $category)<option value="{{$category->id}}" {{ (old("category") == $category->id) ? "selected" : '' }}> {{$category->name}}</option>@endforeach</select> </div></div>';

        }else if(sectionType== 'section'){
            output += '<div class="col-md-12"><div class="form-group"> <label class="required" for="category">Product Categories</label> <select onchange="getAllProducts(this.value)"  required="required" id="category" class="form-control custom-select"> <option value="">Select category</option>@foreach($categories as $category)<option value="{{$category->id}}" {{ (old("category") == $category->id) ? "selected" : '' }}> {{$category->name}}</option>@endforeach</select> </div></div><div class="col-md-12"> <div class="form-group"><label for="homepage">Select Product</label><select required onchange="getProduct(this.value)" id="showAllProducts" class="form-control custom-select" style="width: 100%"></select></div></div><div class="col-md-12"><div class="form-group"><label for="getProducts">Selected Products</label><select required name="product_id[]" id="showSingleProduct" class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose"></select></div></div>';
        }else{

        }
        $('#showSection').html(output);
    }

    function edit(id){

        var  url = '{{route("admin.homepageSection.edit", ":id")}}';
        url = url.replace(':id',id);
        $.ajax({
            url:url,
            method:"get",
            success:function(data){
                if(data){
                    $("#edit_form").html(data);
                    $(".select2").select2();
                }
            }
        });

    }

    // get homepage Sourch
    function getAllProducts(id){

        var  url = '{{route("admin.getProductsByField", "category_id")}}';

        $.ajax({
            url:url,
            method:"get",
            data:{id:id},
            success:function(data){

                if(data){
                    $("#showAllProducts").html(data);

                }else{
                    $("#showAllProducts").html('<option>Product not found</option>');
                }
            }
        });
    }

    // get homepage Sourch
    function getProduct(id){

        var  url = '{{route("admin.getSingleProduct")}}';

        $.ajax({
            url:url,
            method:"get",
            data:{id:id},
            success:function(data){
                if(data){
                    $("#showSingleProduct").append(data);
                    $(".select2").select2();
                }
            }
        });
    }
        // if occur error open model
        @if($errors->any())
            $("#{{Session::get('submitType')}}").modal('show');
        @endif
    </script>

    <script>
        $(document).ready(function(){
         $( "#positionSorting" ).sortable({
          placeholder : "ui-state-highlight",
          update  : function(event, ui)
          {

           var ids = new Array();
           $('#positionSorting tr').each(function(){
            ids.push($(this).attr("id"));
           });
           $.ajax({
            url:"{{route('positionSorting')}}",
            method:"get",
            data:{ids:ids,table:'homepage_sections'},
            success:function(data)
            {
             toastr.success(data)
            }
           });
          }
         });

        });
    </script>
@endsection
