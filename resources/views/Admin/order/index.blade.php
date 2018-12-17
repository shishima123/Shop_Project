@extends('templates.Admin.master')
@section('title','Admin Page - Management Order')
@section('content')

{{-- Status Order --}}
<div>
    <a href="{{ route('order.index') }}"><button class="btn btn-primary mr-2">All</button></a>
    <a href=""><button class="btn btn-warning mx-2">Pending</button></a>
    <a href=""><button class="btn btn-success mx-2">Compelete</button></a>
</div>
<hr>
<p class="text-uppercase font-weight-bold">All order</p>
{{-- End Status Order --}}

{{-- Table Order --}}
<table class="table table-bordered table-hover mt-3">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">User Order</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key=>$order)
        <tr class="text-center">
            <th scope="row">{{ $orders->firstItem()+$key }}</th>
            <td>{{ $order->user->name }}</td>
            <td>{{ number_format($order->total,0,',','.').' $' }}</td>
            <td>
                @if ($order->status)
                <h4><span class="badge badge-success">Completed</span></h4>
                @else
                <h4><span class="badge badge-warning">Pending</span></h4>
                @endif
            </td>
            <td class="d-flex justify-content-center h-100">
                @if ($order->status)
                <form action="{{ route('order.show',$order->id) }}" method="get">
                    <button class="btn btn-primary text-uppercase">Show</button>
                </form>
                @else
                <form action="{{ route('order.show',$order->id) }}" method="get">
                    <button class="btn btn-success text-uppercase mx-2">Approve</button>
                </form>
                <form action="{{ route('order.show',$order->id) }}" method="get">
                    <button class="btn btn-secondary text-uppercase mx-2">Cancel</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- End Table Order --}}

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $orders->url(1) }}" rel="prev">«</a></li>

        @for ($i=1;$i<=$orders->lastPage();$i++)
            <li class="page-item @if ($orders->currentPage()===$i) {{ 'active' }} @endif)">
                <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a></li>
            @endfor

            <li class="page-item"><a class="page-link" href="{{ $orders->url($orders->lastPage()) }}" rel="next">»</a></li>
    </ul>
</div>
{{-- End Pagination --}}

@endsection