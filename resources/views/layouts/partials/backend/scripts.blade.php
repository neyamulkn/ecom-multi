    <script src="{{ mix('js/app.js') }}"></script>
   
    <script src="{{ mix('js/laravel-echo.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    
    @yield('js')

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