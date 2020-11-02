<a href="javascript:void(0)" class="btn btn-info open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i> Sidebar</a>
<div class="product-detail user-profile col-md-3 col-sm-4 col-xs-12 sticky-content" style="z-index: 999;margin-top: 15px;">
  
    <aside style="background: #fff;padding-top: 10px; " class=" content-aside right_column sidebar-offcanvas">

        <span id="close-sidebar" class="fa fa-times"></span>
        <div class="user-image">
        <img src="{{ asset('upload/users/avatars/'. Auth::user()->phato) }}" class=" rounded-circle">
        </div>
        <div class="module-content custom-border ">
            <ul class="list-box">
                 
                <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('user.myAccount')}}">My Account </a></li> 
                <li><a href="{{route('wishlists')}}">Wish List </a></li>
                <li><a href="{{route('productCompare')}}">Compare</a></li>
                <li><a href="{{route('user.orderHistory')}}">Order History </a></li>
                <li><a href="{{route('user.return_request')}}">Return Request</a></li>
               <!--  <li><a href="#">Transactions </a></li> -->
         <!--        <li><a href="#">Newsletter </a></li> -->
               <!--  <li><a href="#">Reward Points </a></li> -->
                <li><a href="{{route('user.change-password')}}">Change Password </a></li>
                <li><a href="{{route('userLogout')}}">Logout</a></li>
                 
            </ul>
        </div>
    </aside>
</div>