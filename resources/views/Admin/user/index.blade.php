@extends('templates.Admin.master')
@section('title','User')
@section('content')
<div class="d-flex justify-content-between">
    <h1 class="text-uppercase">users management</h1>
    <button class="btn btn-primary my-3" id="btnAdd"><i class="fas fa-plus" id="iconBtnAdd"></i></button>
</div>
<div class="w-100">
    <div class="mb-4">
        <div id="layoutCreate" style="display:none;" class="border border-secondary rounded">
            <div class="d-flex justify-content-between mt-3 px-2">
                <h3 class="text-uppercase text-primary">create user</h3>
                <button id="btnReset" class="btn btn-warning text-uppercase">Reset</button>
            </div>
            <hr width="96%">
            <form action="#" method="post" class="p-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="text" id="txtName" name="name" value="" placeholder="Insert Name Please">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="email" id="txtEmail" name="email" value="" placeholder="Insert Email Please">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Password:</span>
                    </div>
                    <input class="form-control" type="password" id="txtPassword" name="password" value="" placeholder="Insert Password Please">
                    <div class="input-group-append">
                        <button class="input-group-text btn btn-secondary">Show password</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-uppercase btn btn-success mr-2">Create</button>
                    <button id="btnCancel" class="text-uppercase btn btn-danger mx-2">Cancel</button>
                </div>

            </form>

        </div>
    </div>
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