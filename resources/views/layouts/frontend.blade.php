<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!-- Mobile specific metas
            ============================================ -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Favicon
            ============================================ -->
        <link rel="shortcut icon" type="text/css" href="{{asset('frontend')}}/ico/favicon-16x16.png"/>
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
    <body class="common-home res layout-4">
        <div id="wrapper" class="wrapper-fluid banners-effect-3">
            <div id="app">
            <!-- Header Start -->
            @include('layouts.partials.frontend.header')
            <!-- Header End -->
            @yield('content')
            <!-- Footer Area start -->
            @include('layouts.partials.frontend.footer')
            <!--  Footer Area End -->
            </div>
        </div>
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
        @include('layouts.partials.frontend.scripts')
    </body>
</html>