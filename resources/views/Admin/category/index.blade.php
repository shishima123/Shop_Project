@extends('templates.Admin.master')
@section('title','Admin Page - Management Category')
@section('header','Categories management')
@section('content')
@include('error.error')
{{-- Flash Message --}}
@if (session('flash_message'))
<div id="alertMessage" class="text-center alert alert-{{ session('flash_type') }}" role="alert">
    {{ session('flash_message') }}
</div>
@endif
{{-- End Flash Message --}}

{{-- Button Show Create --}}
<div class="d-flex justify-content-end">
    <button class="btn btn-primary my-3" id="btnAdd"><i class="fas fa-plus" id="iconBtnAdd"></i></button>
</div>
{{-- End Button Show Create --}}

{{-- Create User --}}
<div class="mb-4 NoDisp" id="layoutCreate">
    <div class="border border-secondary rounded ">
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
                <input class="form-control" type="text" id="txtName" name="name" value="{{ old('name') }}" placeholder="Nguyen Van A">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;&nbsp;&nbsp;</span>
                </div>
                <input class="form-control" type="email" id="txtEmail" name="email" value="{{ old('email') }}"
                    placeholder="example@mail.com">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Password:</span>
                </div>
                <input class="form-control" type="password" id="txtPassword" name="password" value="" placeholder="**********">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Password Confirm:</span>
                </div>
                <input class="form-control" type="password" id="txtPasswordConfirm" name="password_confirmation" value=""
                    placeholder="**********">
                <div class="input-group-append">
                    <button type="button" id="btnShowPw" class="input-group-text btn btn-sm btn-secondary">Show
                        password</button>
                </div>
            </div>
            <div>
                <input type="radio" class="mx-2 Radio--Button--Size" name="role" value="administrator">
                <label for="administrator" class="mb-0">Administrator</label>
                <input type="radio" class="ml-4 mr-2 Radio--Button--Size" name="role" value="user">
                <label for="user" class="mb-0">User</label>
            </div>
            <hr width="96%">
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
                                Do you want to <span class="text-success text-uppercase">add</span> new user?
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
{{-- End Create User --}}

{{-- Table User --}}
@foreach ($categories as $key=>$category)
<h5 class="font-weight-bold">Category: <span class="text-capitalize text-success font-weight-normal">{{ $category->name }}</span></h5>
<table class="table table-sm table-bordered table-hover table-striped">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Total Products</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
@foreach ($category->children as $subcategory)
        <tr class="text-center">
            <th scope="row">{{ $categories->firstItem()+$key }}</th>
            <td><a href="{{ asset('admin/user\/').$category->id.'/edit' }}" class="No--UdLine">{{ $subcategory->name }}</a></td>
            <td>{{ $category->total_comment }}</td>
            <td class="d-flex justify-content-around align-items-center">
                <form action="{{ route('user.edit',$category->id) }}" method="get"><button class="btn btn-sm btn-warning text-uppercase">Edit</button>
                </form>

                <form action="{{ route('user.destroy',$category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    @if ($category->name!==Auth::user()->name)
                    <button type="button" class="btn btn-sm btn-danger text-uppercase" data-toggle="modal" data-target="#delConfirm{{ $category->id }}">
                        Delete
                    </button>
                    @else
                    <button type="button" class="btn btn-sm btn-sencondary text-uppercase" disabled data-toggle="modal"
                        data-target="#delConfirm{{ $category->id }}">
                        Delete
                    </button>
                    @endif
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="delConfirm{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Alert!!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you want to <span class="text-danger text-uppercase">delete</span> this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary text-uppercase">Okay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal --}}

                </form>
            </td>
        </tr>

    </tbody>
    @endforeach
</table>

@endforeach
{{-- End Table User --}}

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $categories->url(1) }}" rel="prev">«</a></li>

        @for ($i=1;$i<=$categories->lastPage();$i++)
            <li class="page-item @if ($categories->currentPage()===$i) {{ 'active' }} @endif)">
                <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a></li>
            @endfor

            <li class="page-item"><a class="page-link" href="{{ $categories->url($categories->lastPage()) }}" rel="next">»</a></li>
    </ul>
</div>
{{-- End Pagination --}}
@endsection