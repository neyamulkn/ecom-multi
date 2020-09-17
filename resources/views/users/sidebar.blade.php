<aside class="col-md-3 col-sm-4 col-xs-12 sticky-content content-aside right_column sidebar-offcanvas">
   <span id="close-sidebar" class="fa fa-times"></span>
    <div class="module">
        <h3 class="modtitle"><span>My Account </span></h3>
        <div class="module-content custom-border">
          <ul class="list-box">
             
            <li><a href="login.html">Login </a> / <a href="register.html">Register </a></li>
            <li><a href="#">Forgotten Password </a></li>
             
            <li><a href="{{route('user.myAccount')}}">My Account </a></li>
             
            <li><a href="{{route('user.wishlist')}}">Wish List </a></li>
            <li><a href="{{route('user.productCompare')}}">Compare</a></li>
            <li><a href="{{route('user.orderHistory')}}">Order History </a></li>
            <li><a href="#">Downloads </a></li>
            <li><a href="#">Recurring payments </a></li>
            <li><a href="#">Reward Points </a></li>
            <li><a href="#">Returns </a></li>
            <li><a href="#">Transactions </a></li>
            <li><a href="#">Newsletter </a></li>
            <li><a href="{{route('userLogout')}}">Logout</a></li>
             
          </ul>
        </div>
      </div>
</aside>