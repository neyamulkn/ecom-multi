<aside class="col-md-3 col-sm-4 col-xs-12 sticky-content content-aside right_column sidebar-offcanvas">
   <span id="close-sidebar" class="fa fa-times"></span>
    <div class="module">
        
        <img src="{{ asset('upload/users/avatars/'. Auth::user()->phato) }}" class="img-thumbnail">
        
        <div class="module-content custom-border">
          <ul class="list-box">
             
            <li><a href="{{route('user.myAccount')}}">My Account </a></li>
             
            <li><a href="{{route('wishlists')}}">Wish List </a></li>
            <li><a href="{{route('productCompare')}}">Compare</a></li>
            <li><a href="{{route('user.orderHistory')}}">Order History </a></li>
            <li><a href="#">Downloads </a></li>
            <li><a href="#">Recurring payments </a></li>
            <li><a href="#">Reward Points </a></li>
            <li><a href="#">Returns </a></li>
            <li><a href="#">Transactions </a></li>
            <li><a href="#">Newsletter </a></li>
            <li><a href="#">Change Password </a></li>
            <li><a href="{{route('userLogout')}}">Logout</a></li>
             
          </ul>
        </div>
      </div>
</aside>