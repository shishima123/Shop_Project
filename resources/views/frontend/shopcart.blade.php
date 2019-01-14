@extends('templates.frontend.master')
@section('title','Trang chủ')
@section('content')
@if(Session::has('cart'))
<div class="row">
    <div class="col-sm-6 col-md-6-offset-3 col-sm-offset-3">
        <ul class="list-group">
            @foreach ($addtocart as $addtocart)
            <li class="list-group-item">
                {{-- <span class="badge">{{$addtocart->}}</span> --}}

                <span class="badge">{{$addtocart['qty']}}</span>

                <span class="label label-success">{{$addtocart['price']}}</span>
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toogle="dropdown">Action
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Recude By 1</a></li>
                        <li><a href="">Recude By All</a></li>

                    </ul>
                </div> --}}
            </li>

            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total:{{ $totaLPrice}}</strong>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <button type="button" class="btn btn-success" ><a href="{{route('checkout')}}"></a> Chekcout</button>
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