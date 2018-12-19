@extends('templates.Admin.master')
@section('title','Admin Page - Management Order')
@section('content')
<p>ma don hang:{{ $order->token }}</p>
<?php $i=1?>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Picture</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->products as $item)
        <tr>
            <th>{{ $i++ }}</th>
            <td scope="col">{{ $item->name }}</td>
            <td scope="col"><img style="height:100px;width:100px;" src="{{asset($item->picture) }}" alt="product"></td>
            <td scope="col">{{ $item->price }}</td>
            <td scope="col">x{{ $item->pivot->quantity }}</td>
            <td scope="col">{{ $item->pivot->total }}</td>
        </tr>
        @endforeach
    </tbody>
    @endsection
