@extends('templates.frontend.master')
@section('title','Checkout')
@section('content')
{{--
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Checkout</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-3">

			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<div class="order-products">
						<div class="order-col">
							<div>1x Product Name Goes Here</div>
							<div>$980.00</div>
						</div>
						<div class="order-col">
							<div>2x Product Name Goes Here</div>
							<div>$980.00</div>
						</div>
					</div>
					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total">$2940.00</strong></div>
					</div>
				</div>
				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1">
						<label for="payment-1">
							<span></span>
							Direct Bank Transfer
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-2">
						<label for="payment-2">
							<span></span>
							Cheque Payment
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Paypal System
						</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua.</p>
						</div>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms">
					<label for="terms">
						<span></span>
					</label>
				</div>
				<a href="#" class="primary-btn order-submit">Place order</a>
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION --> --}}
<div class="container">
	<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
		<h1>Chekout</h1>
		<h4>Your Total: ${{$total}}</h4>
		<form action="{{route('checkout')}}" method="POST" id="checkout-form" >
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" id="address" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-name">Card Holder Name</label>
						<input type="text" id="card-name" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Credit Card Number</label>
						<input type="text" id="card-number" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label for="card-expiry-month">Expiration Month</label>
								<input type="text" id="card-expiry-month" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="card-expiry-year">Expiration Year</label>
								<input type="text" id="card-expiry-year" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-cvc">CVC</label>
						<input type="text" id="card-cvc" class="form-control" required>
					</div>
				</div>
            {{ csrf_field() }}
				<button type="submit" class="btn btn-success">Buy now</button>
		</form>
	</div>
</div>
</div>
@endsection