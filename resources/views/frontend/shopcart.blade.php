@extends('templates.frontend.master')
@section('title','Trang chủ')
@section('content')
@if(Session::has('cart'))
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{route('index')}}">Home</a></li>
							<li class="active">Your Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<div class="row">
    <div class="col-sm-6 col-md-6-offset-3 col-sm-offset-3">
        <ul class="list-group">
            
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quanty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addtocart as $addtocart)
                    <tr>
                        <td>{{$addtocart['item']['name']}}</td>
                        <td> {{$addtocart['price']}}</td>
                        <td>{{$addtocart['qty']}}</td>
                    </tr>
                              @endforeach

                </tbody>
            </table>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total : {{ $totaLPrice}}</strong>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <button type="button" class="btn btn-success"><a href="{{route('checkout')}}"> Chekcout</a></button>
    </div>
</div>

@else

<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h2>No Items in Cart</h2>
    </div>
</div>
@endif

@endsection