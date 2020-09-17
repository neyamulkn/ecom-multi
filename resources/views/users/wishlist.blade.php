@extends('layouts.frontend')
@section('title', 'wishtlist | '. Config::get('siteSetting.site_name') )
@section('css')

@endsection
@section('content')
<div class="breadcrumbs">
  <div class="container">
    
    <ul class="breadcrumb-cate">
        <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">wishtlist</a></li>
     </ul>
  </div>
</div>
<!-- Main Container  -->
<div class="container">
    <div class="row">
        @include('users.sidebar')
        <div id="content" class="col-sm-9 sticky-content">
            <h2>My Wish List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-right">Stock</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center">
                                <a href="product.html"><img src="image/catalog/demo/product/spa/9.jpg" alt="Burger King Japan debuts Monster  Baby Force Bralette" title="Burger King Japan debuts Monster  Baby Force Bralette" class="img-thumbnail"></a>
                            </td>
                            <td class="text-left"><a href="product.html">Burger King Japan debuts Monster  Baby Force Bralette</a></td>
                            <td class="text-left">Product 3</td>
                            <td class="text-right">In Stock</td>
                            <td class="text-right">
                                <div class="price"> <b>$80.00</b> <s>$100.00</s> </div>
                            </td>
                            <td class="text-right">
                                <button type="button" onclick="cart.add('106');" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                                <a href="#" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="product.html"><img src="image/catalog/demo/product/travel/2.jpg" alt="Canada Travel One or Two European Facials at  Studio" title="Canada Travel One or Two European Facials at  Studio" class="img-thumbnail"></a>
                            </td>
                            <td class="text-left"><a href="product.html">Canada Travel One or Two European Facials at  Studio</a></td>
                            <td class="text-left">Simple Product</td>
                            <td class="text-right">In Stock</td>
                            <td class="text-right">
                                <div class="price"> <b>$70.00</b> <s>$100.00</s> </div>
                            </td>
                            <td class="text-right">
                                <button type="button" onclick="cart.add('108');" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                                <a href="#" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="buttons clearfix">
                <div class="pull-right"><a href="#" class="btn btn-primary">Continue</a></div>
            </div>
        </div>
    </div>
</div>	
<!-- //Main Container -->
@endsection	   
