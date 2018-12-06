<?php 
// dd($top_selling); 
?>
@extends('templates.frontend.master')
@section('title','Trang chủ')
@section('content')


<!-- NEW PRODUCT -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							@for ($i = 0; $i < count($data); $i++) @if ($i===0 && $data[$i]->parent_id===0) <li class="active"><a
									 data-toggle="tab" href="kai_nay_se_dung_ajax_de_viet">{{
										$data[$i]->name }}</a></li>
								@endif
								@if ($i!==0 && $data[$i]->parent_id===0)
								<li class=""><a data-toggle="tab" href="kai_nay_se_dung_ajax_de_viet">{{ $data[$i]->name }}</a></li>
								@endif
								@endfor
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								@for ($i = 0; $i < count($data[0]->products); $i++)
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="{{ $data[0]->products[$i]->picture }}" alt="">
											<div class="product-label">
												@if ( $data[0]->products[$i]->sale)
												<span class="sale">-{{ $data[0]->products[$i]->sale}}%</span>
												@endif
												@if ($data[0]->products[$i]->new)
												<span class="new">NEW</span>
												@endif

											</div>
										</div>
										<div class="product-body">
											<p class="product-category">{{ $data[0]->name }}</p>
											<h3 class="product-name"><a href="#">{{ $data[0]->products[$i]->name}}</a></h3>

											<h4 class="product-price">{{ $data[0]->products[$i]->price - ($data[0]->products[$i]->price *
												$data[0]->products[$i]->sale)/100 }} $</h4>

											@if ($data[0]->products[$i]->sale)
											<del class="product-old-price">{{ $data[0]->products[$i]->price}}$</del>
											@else
											<br />
											@endif

											<div class="product-rating">
												@for ($j = 0; $j < $data[0]->products[$i]->rating; $j++)
													<i class="fa fa-star"></i>
													@endfor
											</div>
											<div class="product-btns">
												<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
												<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									<!-- /product -->
									@endfor


							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEW PRODUCT -->

<!-- TOP SELLING -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">TOP SELLING</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							@for ($i = 0; $i < count($data); $i++) @if ($i===0 && $data[$i]->parent_id===0) <li class="active"><a
									 data-toggle="tab" href="kai_nay_se_dung_ajax_de_viet">{{
										$data[$i]->name }}</a></li>
								@endif
								@if ($i!==0 && $data[$i]->parent_id===0)
								<li class=""><a data-toggle="tab" href="kai_nay_se_dung_ajax_de_viet">{{ $data[$i]->name }}</a></li>
								@endif
								@endfor
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								@foreach ($top_selling as $top_selling)
								<div class="product">
									<div class="product-img">
										<img src="{{ $top_selling->picture }}" alt="">
										<div class="product-label">
											@if ($top_selling->sale)
											<span class="sale">-{{ $top_selling->sale }}%</span>
											@endif
											@if ($top_selling->sale)
											<span class="new">NEW</span>
											@endif

										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{ $top_selling->category_name }}</p>
										<h3 class="product-name"><a href="#">{{ $top_selling->name }}</a></h3>
										<h4 class="product-price">{{ $top_selling->price-$top_selling->price*$top_selling->sale/100 }} </h4>
										@if ($top_selling->sale)
										<del class="product-old-price">{{ $top_selling->price }}</del>
										@else
										<br/>
										@endif

										<div class="product-rating">
											@for ($i = 0; $i < $top_selling->rating; $i++)
												<i class="fa fa-star"></i>
											@endfor
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
								<!-- /product -->
								@endforeach
								<!-- product -->


							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /TOP SELLING -->

@endsection