<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!-- Mobile specific metas
            ============================================ -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Favicon
            ============================================ -->
        <link rel="shortcut icon" type="text/css" href="{{asset('upload/images/logo/'. Config::get('siteSetting.favicon'))}}"/>
        <!-- Basic page needs
            ============================================ -->
        <title>@yield('title')</title>
        @yield('metatag')
        
        @include('layouts.partials.frontend.css')
        
        <!-- Google web fonts
            ============================================ -->
      <!--   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" type="text/css"> -->

    </head>
    <body class="common-home res layout-6" >
        <div id="wrapper" class="wrapper-fluid banners-effect-11">
            <div id="app">
            <?php 

                if(!Session::has('menus')){
                   $menus =  \App\Models\Menu::with(['get_categories'])->orderBy('position', 'asc')->where('status', 1)->get();
                    Session::put('menus', $menus);
                }
                $menus = Session::get('menus');

                if(!Session::has('categories')){
                    $categories =  \App\Models\Category::where('parent_id', '=', null)->orderBy('orderBy', 'asc')->where('status', 1)->get();
                    Session::put('categories', $categories);
                }
              $categories = Session::get('categories');

            ?>
            <!-- Header Start -->
            @include('layouts.partials.frontend.header')
         
            <!-- Header End -->
            @yield('content')
            </div>
            <!-- Footer Area start -->
            @include('layouts.partials.frontend.footer')
            <!--  Footer Area End -->
            </div>
        </div>
        <div class="modal fade" id="quickviewModal" role="dialog"  tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="border:none;">
                        <button type="button" id="modalClose" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body form-row" id="quickviewProduct"></div>
                    
                </div>
            </div>
          </div>
        @if(!Auth::check()) 
            <!-- login Modal -->
            @include('users.modal.login')
        @endif
        <div class="back-to-top hidden-top"><i class="fa fa-angle-up"></i></div>
        @include('layouts.partials.frontend.scripts')
    </body>
</html>