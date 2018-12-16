@extends('templates.Admin.master')
@section('title','Admin Page - Management Order')
@section('content')

 {{-- Table Order --}}
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">User Order</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key=>$order)
            <tr class="text-center">
                <th scope="row">{{ $orders->firstItem()+$key }}</th>
                <td>{{ $order->user->name }}</td>
                <td>{{ number_format($order->total,0,',','.').' $' }}</td>
                <td class="d-flex justify-content-around align-items-center">
                    <form action="{{ route('order.show',$order->id) }}" method="get"><button class="btn btn-sm btn-primary text-uppercase">Show</button>
                    </form>
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