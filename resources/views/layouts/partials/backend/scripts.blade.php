    <script src="{{ mix('js/app.js') }}"></script>
   
    <script src="{{ mix('js/laravel-echo.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{asset('assets/node_modules/jqueryui/jquery-ui.min.js')}}"></script>
    @yield('js')
    @yield('perpage-js')
    <script type="text/javascript">
        //change status by id
        function satusActiveDeactive(table, id, field = null){
            var  url = '{{route("statusChange")}}';
            $.ajax({
                url:url,
                method:"get",
                data:{table:table,field:field,id:id},
                success:function(data){
                    if(data.status){
                        toastr.success(data.message);
                    }else{
                        toastr.error(data.message);
                    }
                }
            });
        }
    </script>     

    <script type="text/javascript">
        // delete product feature detail
        function deleteDataCommon(table,id, field=''){
            if(confirm('Are you sure delete.?')) {
                var route = '{{ route("deleteDataCommon") }}';
                route = route.replace(":id", id);
                $.ajax({
                    url:route,
                    method:"get",
                    data:{table:table,id:id,field:field},
                    success:function(data){
                        if(data.status){
                            $("#"+table+id).remove();
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                });
             }else{
                return false;
            }
        }
    </script>    

    <script type="text/javascript">
        //change status by id
        function approveUnapprove(table, id, field = null){
            var  url = '{{route("approveUnapprove")}}';
            $.ajax({
                url:url,
                method:"get",
                data:{table:table,field:field,id:id},
                success:function(data){
                    if(data.status){
                        toastr.success(data.message);
                    }else{
                        toastr.error(data.message);
                    }
                }
            });
        }
    </script>

    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
            
            @if(Session::get('submitType'))
                // if occur error open model
                $("#{{Session::get('submitType')}}").modal('show');
                //open edit modal by id
                @if(Session::get('submitType')=='edit')
                    edit({{old('id')}});
                @endif
            @endif

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