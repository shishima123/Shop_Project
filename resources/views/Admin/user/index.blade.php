@extends('templates.Admin.master')
@section('title','User')
@section('content')
<div class="w-100">
<table class="table table-bordered table-hover">
    <thead>
        <tr class="text-center">
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$user)
        <tr class="text-center">
            <th scope="row">{{ $users->firstItem()+$key }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td class="d-flex justify-content-around align-items-center">
                <form action="" method="get"><button class="btn btn-sm btn-primary rounded-0">Show</button>
                </form>

                <form action="" method="get"><button class="btn btn-sm btn-warning rounded-0">Edit</button>
                </form>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger rounded-0">Delete</button></form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $users->url(1) }}" rel="prev">«</a></li>

        @for ($i=1;$i<=$users->lastPage();$i++)
            <li class="page-item @if ($users->currentPage()===$i) {{ 'active' }} @endif)">
                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a></li>
            @endfor

            <li class="page-item"><a class="page-link" href="{{ $users->url($users->lastPage()) }}" rel="next">»</a></li>
    </ul>
</div> 
</div>
@endsection