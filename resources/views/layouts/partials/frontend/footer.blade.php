<footer class="footer-container typefooter-2">
  <div class="footer-has-toggle collapse" id="collapse-footer"  >
    <div class="so-page-builder">
      
      @include('frontend.newsletters')
      <section class="section_3">
        <div class="container">
          <div class="row row_bh6y  row-style ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_mehx  col-style">
              <div class="row row_q34c  border ">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col_5j8y col-style">
                  <div class="contactinfo">
                    <img width="200" src="{{ asset('upload/images/logo/'.Config::get('siteSetting.logo') )}}" title="" alt="">
                    
                    <p>{{Config::get('siteSetting.footer')}}</p>
                    <div class="content-footer">

                      <div class="address">
                        <label><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                        <span>{{Config::get('siteSetting.address')}}</span>
                      </div>
                      <div class="phone">
                        <label><i class="fa fa-phone" aria-hidden="true"></i></label>
                        <span>{{Config::get('siteSetting.phone')}}</span>
                      </div>
                      <div class="email">
                        <label><i class="fa fa-envelope"></i></label>
                        <a href="#">{{Config::get('siteSetting.email')}}</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col_oz7e col-style">
                  <div class="footer-links">
                    <h4 class="title-footer">
                      Information
                    </h4>
                    <ul class="links">
                      <li>
                        <a title="About US" href="about-us.html">About US</a>
                      </li>
                      <li>
                        <a title="Contact us" href="contact.html">Contact us</a>
                      </li>
                      <li>
                        <a title="Warranty And Services" href="warranty.html">Warranty And Services</a>
                      </li>
                      <li>
                        <a title="Support 24/7 Page" href="support.html">Support 24/7 Page</a>
                      </li>
                      <li>
                        <a title="Terms And Conditions" href="#">Terms And Conditions</a>
                      </li>
                      <li>
                        <a href="#"> CSR Policy</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col_l99d col-style">
                  <div class="footer-links">
                    <h4 class="title-footer">
                      My Account
                    </h4>
                    <ul class="links">
                      <li>
                        <a title="My Account" href="{{route('user.myAccount')}}">My Account</a>
                      </li>
                     
                      <li>
                        <a title="Checkout" href="{{route('checkout')}}">Checkout</a>
                      </li>
                      <li>
                        <a href="{{route('wishlists')}}"> Wishlist</a>
                      </li>
                      <li>
                        <a title="Order History" href="{{route('user.orderHistory')}}">Order History</a>
                      </li>
                      <li>
                        <a title="Your Transactions" href="#">Your Transactions</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col_lv09 col-style">
                  <div class="module so-latest-blog footer_lastestblog footer-links  preset01-4 preset02-4 preset03-3 preset04-2 preset05-1">
                    <h4 class="title-footer"><span>Lastest From Blog</span></h4>
                    <div class="modcontent">
                      <div id="so_latest_blog_736" class="so-blog-external button-type2 button-type2">
                        <div class="blog-external">
                        <div class="blog-external-simple">
                          <div class="cat-wrap">
                            <div class="media">
                              <div class="item">
                                <div class="media-left">
                                  <a href="#" target="_self">
                                  <img src="{{asset('frontend')}}/image/catalog/demo/blog/8-65x50.jpg" alt="" class="media-object"/>
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading">
                                    <a href="#" title="Aestibulum ipsum a ornare car" target="_self">Aestibulum ipsum a ornare car</a>
                                  </h4>
                                  <div class="media-content">
                                    <div class="media-subcontent">
                                      <span class="media-author"><span class="txt">By: </span><span class="author">ytcdemo</span></span>
                                      <div class="media-date-added"><i class="fa fa-calendar"></i> October 17th, 2017</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                          
                        </div>
                        <div class="blog-external-simple">
                          <div class="cat-wrap">
                            <div class="media">
                              <div class="item">
                                <div class="media-left">
                                  <a href="#" target="_self">
                                  <img src="{{asset('frontend')}}/image/catalog/demo/blog/8-65x50.jpg" alt="" class="media-object"/>
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading">
                                    <a href="#" title="Aestibulum ipsum a ornare car" target="_self">Aestibulum ipsum a ornare car</a>
                                  </h4>
                                  <div class="media-content">
                                    <div class="media-subcontent">
                                      <span class="media-author"><span class="txt">By: </span><span class="author">ytcdemo</span></span>
                                      <div class="media-date-added"><i class="fa fa-calendar"></i> October 17th, 2017</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="clr1"></div> -->
                          <div class="cat-wrap">
                            <div class="media">
                              <div class="item">
                                <div class="media-left">
                                  <a href="#" target="_self">
                                  <img src="{{asset('frontend')}}/image/catalog/demo/blog/9-65x50.jpg" alt="" class="media-object"/>
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading">
                                    <a href="#" title="Aestibulum ipsum a ornare lectus" target="_self">Aestibulum ipsum a ornare lectus</a>
                                  </h4>
                                  <div class="media-content">
                                    <div class="media-subcontent">
                                      <span class="media-author"><span class="txt">By: </span><span class="author">ytcdemo</span></span>
                                      <div class="media-date-added"><i class="fa fa-calendar"></i> October 17th, 2017</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="clr1 clr2"></div> -->
                          <div class="cat-wrap">
                            <div class="media">
                              <div class="item">
                                <div class="media-left">
                                  <a href="#" target="_self">
                                  <img src="{{asset('frontend')}}/image/catalog/demo/blog/5-65x50.jpg" alt="" class="media-object"/>
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading">
                                    <a href="#" title="Baby Came Back! Missed Out? Grab Your" target="_self">Baby Came Back! Missed Out? Grab Your</a>
                                  </h4>
                                  <div class="media-content">
                                    <div class="media-subcontent">
                                      <span class="media-author"><span class="txt">By: </span><span class="author">None Author</span></span>
                                      <div class="media-date-added"><i class="fa fa-calendar"></i> October 17th, 2017</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_4 ">
        <div class="container page-builder-ltr">
          <div class="row row_njct  row-style ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_7f0l  col-style">
              <div class="border">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item-1">
                    <div class="app-store spcustom_html">
                      <div>
                        <a class="app-1" href="#">google store</a> 
                        <a class="app-2" href="#">apple store</a>
                        <a class="app-3" href="#">window store</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item-2">
                    <div class="footer-social">
                      <h3 class="block-title hidden">Follow us</h3>
                      <div class="socials">
                        @php
                          if(!Session::has('socialLists')){
                              Session::put('socialLists', App\Models\Social::where('status', 1)->get());
                          }
                        @endphp
                        @foreach(Session::get('socialLists') as $social)
                        <a href="{{$social->link}}" class="facebook" target="_blank">
                          <i class="fa {{$social->icon}}" style="background:{{$social->background}}; color:{{$social->text_color}}"></i>
                          <p>on</p>
                          <span class="name-social">{{$social->social_name}}</span>
                        </a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
    </div>
  </div>
  <div class="footer-toggle hidden-lg hidden-md">
    <a class="showmore collapsed" data-toggle="collapse" href="#collapse-footer" aria-expanded="false" aria-controls="collapse-footer">
    <span class="toggle-more"><i class="fa fa-angle-double-down"></i>Show More</span> 
    <span class="toggle-less"><i class="fa fa-angle-double-up"></i>Show less</span>            
    </a>     
  </div>
  <div class="footer-bottom ">
    <div class="container">
      <div class="row">
        <div class="col-md-7  col-sm-7 copyright">
          Copyright  © 2020. All Rights Reserved. Designed by <a href="#" target="_blank">Neyamul</a>
        </div>
        <div class="col-md-5 col-sm-5 paymen">
          <img src="{{asset('frontend')}}/image/catalog/demo/payment/payments-1.png"  alt="imgpayment">
        </div>
      </div>
    </div>
  </div>
</footer>