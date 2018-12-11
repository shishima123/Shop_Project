@extends('templates.Admin.master')
@section('title','User')
@section('content')
<div class="w-100">
<table class="table table-bordered table-hover">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Comment</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$user)
        <tr class="text-center">
            <th scope="row">{{ $users->firstItem()+$key }}</th>
            <td><a href="{{ asset('admin/user\/').$user->id }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->total_comment }}</td>
            <td class="d-flex justify-content-around align-items-center">
                <form action="{{ route('admin.user.destroy',$user->id).'/edit' }}" method="get"><button class="btn btn-sm btn-warning rounded-0">Edit</button>
                </form>

                <form action="{{ route('admin.user.destroy',$user->id) }}" method="POST">
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