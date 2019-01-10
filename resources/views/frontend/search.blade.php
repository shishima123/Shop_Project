@extends('templates.frontend.master')
@section('title','Search')
@section('content')
<div class="container">
	<div class="row">
<div class="col-md-12">
	<div class="section-title">
		<h3 class="title">Search: {{count($search)}}</h3>
	</div>
</div>
</div>
</div>
<div class="container">
	<div class="row">
<div class="col-md-12">
	<div class="row">
		<div class="products-tabs">
			
			<div id="tab2" class="tab-pane fade in active">
				<div class="products-slick" data-nav="#slick-nav-1">
					@foreach ($search as $search)
					<div class="product">
						<div class="product-img">
							<img src="{{ asset($search->picture) }}" alt="">
							<div class="product-label">
								@if ($search->sale)
								<span class="sale">-{{ $search->sale }}%</span>
								@endif
								@if ($search->sale)
								<span class="new">NEW</span>
								@endif

							</div>
						</div>
						<div class="product-body">
							<p class="product-category">{{ $search->category->name }}</p>
							<h3 class="product-name"><a href="#">{{ $search->name }}</a></h3>
							<h4 class="product-price">{{ $search->price-$search->price*$search->sale/100 }} </h4>
							@if ($search->sale)
							<del class="product-old-price">{{ $search->price }}</del>
							@else
							<br />
							@endif

							<div class="product-rating">
								@for ($i = 0; $i < $search->rating; $i++)
									<i class="fa fa-star"></i>
									@endfor
							</div>
							<div class="product-btns">
								<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
								<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
								<button class="quick-view"><a href="{{route('product',$search->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick
											view</span></a></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				
					@endforeach

				</div>
				<div id="slick-nav-1" class="products-slick-nav"></div>
			</div>
			
		</div>
	</div>
</div>
</div>
</div>
@endsection