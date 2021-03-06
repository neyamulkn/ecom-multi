@extends('layouts.admin-master')
@section('title', 'banner list')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <link href="{{asset('assets')}}/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .dropify_image{
            position: absolute;top: -12px!important;left: 12px !important; z-index: 9; background:#fff!important;padding: 3px;
        }
        .dropify-wrapper{
            height: 180px !important;
        }
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
                        <h4 class="text-themecolor">Banner List</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">banner</a></li>
                                <li class="breadcrumb-item active">list</li>
                            </ol>
                            <button data-toggle="modal" data-target="#add" class="btn btn-info d-none d-lg-block m-l-15"><i
                                    class="fa fa-plus-circle"></i> Add New banner</button>
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

                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Page</th>
                                                <th>Link</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                        <tbody id="positionSorting">
                                            @foreach($banners as $banner)
                                            <tr id="item{{$banner->id}}">
                                                
                                                <td>
                                                    @if($banner->banner1)
                                                    <img src="{!! asset('upload/images/banner/'. $banner->banner1) !!}" width="120">
                                                    @endif
                                                    @if($banner->banner2)
                                                    <img src="{!! asset('upload/images/banner/'. $banner->banner2) !!}" width="120">
                                                    @endif
                                                    @if($banner->banner3)
                                                    <img src="{!! asset('upload/images/banner/'. $banner->banner3) !!}" width="120">
                                                    @endif
                                                </td>
                                                <td>{{$banner->title}}</td>
                                                <td>{{str_replace('_', ' ', $banner->page_name)}}</td>
                                                <td>
                                                    @if($banner->btn_link1)
                                                    <small> {!! $banner->btn_link1 !!} <br/> </small>
                                                    @endif
                                                    @if($banner->btn_link2)
                                                    <small> {!! $banner->btn_link2 !!} <br/> </small>
                                                    @endif
                                                    @if($banner->btn_link3)
                                                    <small> {!! $banner->btn_link3 !!} <br/> </small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                      <input  name="status" onclick="satusActiveDeactive('banners', {{$banner->id}})"  type="checkbox" {{($banner->status == 1) ? 'checked' : ''}}  type="checkbox" class="custom-control-input" id="status{{$banner->id}}">
                                                      <label style="padding: 5px 12px" class="custom-control-label" for="status{{$banner->id}}"></label>
                                                
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="edit('{{$banner->id}}')"  data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="ti-pencil" aria-hidden="true"></i> </button>
                                                    <button data-target="#delete" onclick="confirmPopup('{{ $banner->id }}')" class="btn btn-danger btn-sm" data-toggle="modal"><i class="ti-trash" aria-hidden="true"></i> </button>
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
                        <h4 class="modal-title">Add New banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row">
                        <div class="card-body">
                            <form action="{{route('banner.store')}}" enctype="multipart/form-data" data-parsley-validate method="POST" >
                                {{csrf_field()}}
                                <div class="form-body">
                                    <!--/row-->
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="" for="title">Banner Title</label>
                                                <input name="title" id="title" value="{{old('title')}}"  type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name required">Select Banner Type</label>
                                                <select required onchange="bannerType(this.value)" name="banner_type" class="form-control">
                                                    <option value="">Select Banner</option>
                                                    <option  value="1">Large Banner</option>
                                                    <option  value="2">Two Banner</option>
                                                    <option  value="3">Three Banner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name required">Select Page</label>
                                                <select required  name="page_name" class="form-control">
                                                    <option value="all">All Page</option>
                                                    <option value="homepage">HomePage</option>
                                                    <option  value="category_page">Category page</option>
                                                    <option  value="product_detail_page">Proudct details page</option>
                                                    <option  value="offer_page">Offer Page</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center" id="showBannerImage"> </div>
                                    
                                         
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <div class="head-label">
                                                <label class="switch-box">Status</label>
                                                <div  class="status-btn" >
                                                    <div class="custom-control custom-switch">
                                                        <input name="status" checked  type="checkbox" class="custom-control-input" {{ (old('status') == 'on') ? 'checked' : '' }} id="status">
                                                        <label  class="custom-control-label" for="status">Publish/UnPublish</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" value="add" class="btn btn-success"> <i class="fa fa-check"></i> Add New banner</button>
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
            <div class="modal-dialog modal-lg">
                <form action="{{route('banner.update')}}" enctype="multipart/form-data"  method="post">
                      {{ csrf_field() }}
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="edit_form"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>

        <!-- delete Modal -->
        <div id="delete" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title">Are you sure?</h4>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                        <button type="button" value="" id="itemID" onclick="deleteItem(this.value)" data-dismiss="modal" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>


@endsection
@section('js')
    <!-- This is data table -->
    <script src="{{asset('assets')}}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/dropify/dist/js/dropify.min.js"></script>
 
   <script>
        $(function () {
           $('#myTable').DataTable({"ordering": false});
        });

        function removeImage(id, imageNo){
            if ( confirm("Are you sure delete it.?")) {
                       
                $.ajax({
                    url:"{{route('bannerImage_delete')}}",
                    method:"get",
                    data: {id:id, imageNo:imageNo},
                    success:function(data){
                        if(data){
                            $('.image'+imageNo).html('<input type="file" required accept="image/*" data-type="image" data-allowed-file-extensions="jpg jpeg png gif"  name="banner'+imageNo+'" id="'+imageNo+'" class="dropify" />');
                            $("#image"+imageNo).addClass('dropify');
                            $('.dropify').dropify();
                            toastr.success(data.msg);
                        }
                    }
                }); 
            }
            return false;
        }

    </script>

    <script type="text/javascript">

      function edit(id){
            $('#edit_form').html('<div class="loadingData"></div>');
            var  url = '{{route("banner.edit", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                    if(data){
                        $("#edit_form").html(data);
                        $('.dropify').dropify();
                    }
                }, 
                // $ID Error display id name
                @include('common.ajaxError', ['ID' => 'edit_form'])

            });

    }      

    function bannerType(type, edit=''){
        var width = (1170/type) - (type*5);
        var output = '';
        for(var i=1; i<=type; i++){
            output += '<div class="col-md-'+12/type+'"><div class="form-group"><label class="required dropify_image">Banner '+i+'</label><input type="hidden" name="width" value="'+width+'"><input required type="file" class="dropify" accept="image/*" data-type="image" data-allowed-file-extensions="jpg jpeg png gif"  data-max-file-size="2M"  name="banner'+i+'" id="input-file-events"><p style="color:red">Image Size: '+width+'px * 250px</p> <label class="required" for="btn_link">Link '+i+'</label><input type="text" required id="btn_link" name="btn_link'+i+'" placeholder="Exp: {{url("/")}}" class="form-control"></div></div>';
        }
        document.getElementById('showBannerImage'+edit).innerHTML = output;
        $('.dropify').dropify();

    }


     function confirmPopup(id) {

          document.getElementById('itemID').value = id;
     }
    function deleteItem(id) {

        var link = '{{route("banner.delete", ":id")}}';
        var link = link.replace(':id', id);
       
            $.ajax({
            url:link,
            method:"get",
            success:function(data){
                if(data.status){
                    $("#item"+id).hide();
                    toastr.success(data.msg);
                }else{
                    toastr.error(data.msg);
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
                        data:{ids:ids,table:'banners'},
                        success:function(data){
                            toastr.success(data)
                        }
                    });
                }
            });
        });
    </script>
@endsection
