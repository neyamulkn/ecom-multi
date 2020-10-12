@extends('layouts.frontend')
@section('title', 'Checktout')

@section('content')
    
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-cate">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="blog-header">
                    <h3>Simple Blog</h3>
                </div>
                <div class="blog-listitem row">
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block">
                                <div class="article-image banners">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/5.jpg">
                                        <img src="{{asset('frontend')}}/image/catalog/demo/blog/5.jpg" alt="Baby Came Back! Missed Out? Grab Your">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Baby came back! missed out? grab your</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi vel dignissim. Morbi mollis eli...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Tuandt</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>
                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/8.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/8.jpg" alt="Nure caten raverunt lector legere erd"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Nure caten raverunt lector legere erd</a></h4>
                                    </div>
                                    <p class="article-description">
                                         Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi vel dignissim. Morbi mollis eli...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>
                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/8.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/8.jpg" alt="Aestibulum ipsum a ornare car"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Aestibulum ipsum a ornare car</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi vel dignissim. Morbi mollis eli...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">2 Comments</a></span>
                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/9.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/9.jpg" alt="Aestibulum ipsum a ornare lectus"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Aestibulum ipsum a ornare lectus</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Morbi tempus, non ullamcorper euismod, erat odio suscipit purus, nec ornare lacus turpis ac purus. Mauris cursus in mi vel dignissim. Morbi mollis eli...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>

                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/4.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/4.jpg" alt="Aestibulum ipsum a ornare lectus"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Nire Tmas Kite Traverunt Lector</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labor...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>

                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/3.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/3.jpg" alt="Neque porro quisquam est"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Neque Porro Quisquam Est</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labor...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>

                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/7.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/7.jpg" alt="Commodo laoreet semper"></a>
                                    </div>

                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Commodo Laoreet Semper</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Commodo laoreet semper tincidunt lorem Vestibulum nunc at In Curabitur magna. Euismod euismod Suspendisse tortor ante adipiscing risus Aenean Lorem vi...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>

                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-item col-md-6 col-sm-6">
                        <div class="blog-item-inner">
                            <div class="itemBlogImg left-block ">
                                <div class="article-image banners ">
                                    <div>
                                        <a class="popup-gallery" href="{{asset('frontend')}}/image/catalog/demo/blog/2.jpg"><img src="{{asset('frontend')}}/image/catalog/demo/blog/2.jpg" alt="Biten demonstraverunt lector "></a>
                                    </div>

                                </div>
                            </div>
                            <div class="itemBlogContent right-block ">
                                <div class="blog-content">
                                    <div class="article-date">
                                        <div class="date">
                                            <span class="article-date">
                                                <b>17</b> Oct
                                            </span>
                                        </div>
                                    </div>
                                    <div class="article-title font-title">
                                        <h4><a href="blog-detail.html">Biten Demonstraverunt Lector</a></h4>
                                    </div>
                                    <p class="article-description">
                                        Commodo laoreet semper tincidunt lorem Vestibulum nunc at In Curabitur magna. Euismod euismod Suspendisse tortor ante adipiscing risus Aenean Lorem vi...
                                    </p>
                                    <div class="blog-meta">
                                        <span class="author"><span>Post by </span>Admin</span> / &nbsp;
                                        <span class="comment_count"><a href="#">0 Comments</a></span>
                                    </div>
                                    <div class="readmore hidden">
                                        <a class="btn-readmore font-title" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
