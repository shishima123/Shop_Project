@extends('templates.Admin.master')
@section('title','Admin Page - Dashboard')
@section('content')
<div class="row justify-content-center">
    @foreach ($data as $item)
    <div class="card text-white m-3 text-center" style="width:250px">
        <a href="{{ asset('admin\/').$item[1] }}" class="Admin--LeftBar--Effect--Hover">
        <div class="card-header bg-primary px-0">
                <h5 class="m-0 text-uppercase text-light Admin--LeftBar--Effect--Hover">{{ $item[1] }}</h5>         
        </div></a>
        <div class="card-body bg-dark">
            <h1 class="card-title font-weight-bold">{{ $item[0] }}</h1>
        </div>
    </div>
    @endforeach
</div>
@endsection