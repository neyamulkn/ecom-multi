@extends('layouts.frontend')
@section('title', 'Order information | '. Config::get('siteSetting.site_name') )
@section('css')

@endsection
@section('content')
  <div class="breadcrumbs">
      <div class="container">
          <ul class="breadcrumb-cate">
              <li><a href="{{url('/')}}"><i class="fa fa-home"></i> </a></li>
              <li><a href="#">Order History</a></li>
          </ul>
      </div>
  </div>
	<!-- Main Container  -->
	<div class="main-container container">
		<div class="row">
			@include('users.sidebar')
			<!--Middle Part Start-->
			<div id="content" class="col-md-9 sticky-content">
				<h2 class="title">Order History</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-center">Order ID</td>
								<td class="text-center">Qty</td>
								<td class="text-center">Status</td>
								<td class="text-center">Date Added</td>
								<td class="text-right">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">
									<a href="product.html"><img width="85" class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="image/catalog/demo/product/fashion/1.jpg">
									</a>
								</td>
								<td class="text-left"><a href="product.html">Aspire Ultrabook Laptop</a>
								</td>
								<td class="text-center">#214521</td>
								<td class="text-center">1</td>
								<td class="text-center">Shipped</td>
								<td class="text-center">21/06/2016</td>
								<td class="text-right">$228.00</td>
								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="{{route('user.orderDetails', 'fdsf')}}" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<a href="product.html"><img  width="85" class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="image/catalog/demo/product/fashion/4.jpg">
									</a>
								</td>
								<td class="text-left"><a href="product.html">Xitefun Causal Wear Fancy Shoes</a>
								</td>
								<td class="text-center">#1565245</td>
								<td class="text-center">1</td>
								<td class="text-center">Shipped</td>
								<td class="text-center">20/06/2016</td>
								<td class="text-right">$133.20</td>
								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="{{route('user.orderDetails', 'fsdfd')}}" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
			<!--Middle Part End-->
			
		</div>
	</div>
	<!-- //Main Container -->
@endsection		
