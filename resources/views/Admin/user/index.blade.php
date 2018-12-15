@extends('templates.Admin.master')
@section('title','Admin Page - Management User')
@section('content')
    @if (session('flash_message'))
    <div id ="alertMessage" class="alert alert-{{ session('flash_type') }}" role="alert">
        {{ session('flash_message') }}
    </div>
    @endif
<div class="d-flex justify-content-between">
    <h1 class="text-uppercase">users management</h1>
    <button class="btn btn-primary my-3" id="btnAdd"><i class="fas fa-plus" id="iconBtnAdd"></i></button>
</div>
<div class="w-100">
    <div class="mb-4">
        <div id="layoutCreate" class="border border-secondary rounded NoDisp">
            <div class="d-flex justify-content-between mt-3 px-2">
                <h3 class="text-uppercase text-primary">create user</h3>
                <button id="btnReset" class="btn btn-sm btn-warning text-uppercase">Reset</button>
            </div>
            <hr width="96%">
            <form action="{{ route('user.store') }}" id="txtFormCreate" method="post" class="p-2">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="text" id="txtName" name="name" value="" placeholder="Nguyen Van A">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="email" id="txtEmail" name="email" value="" placeholder="example@mail.com">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Password:</span>
                    </div>
                    <input class="form-control" type="password" id="txtPassword" name="password" value="" placeholder="**********">
                    <div class="input-group-append">
                        <button id="btnShowPw" class="input-group-text btn btn-sm btn-secondary">Show password</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-success text-uppercase" data-toggle="modal" data-target="#createConfirm">
                        Create
                    </button>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="createConfirm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Alert!!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you want to add user?
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
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
                <td><a href="{{ asset('admin/user\/').$user->id.'/edit' }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->total_comment }}</td>
                <td class="d-flex justify-content-around align-items-center">
                    <form action="{{ route('user.edit',$user->id) }}" method="get"><button class="btn btn-sm btn-warning text-uppercase">Edit</button>
                    </form>

                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if ($user->role==='user')
                        <button type="button" class="btn btn-sm btn-danger text-uppercase" data-toggle="modal"
                            data-target="#delConfirm{{ $user->id }}">
                            Delete
                        </button>
                        @else
                        <button type="button" class="btn btn-sm btn-sencondary text-uppercase" disabled data-toggle="modal"
                            data-target="#delConfirm{{ $user->id }}">
                            Delete
                        </button>
                        @endif

                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="delConfirm{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Alert!!!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to <span class="text-danger">delete {{ $user->name }}</span>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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