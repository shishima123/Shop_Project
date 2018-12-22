@extends('templates.Admin.master')
@section('title','Admin Page - Management Product')
@section('content')
@section('header','Products management')
@include('templates.Admin.error')
@include('templates.Admin.flash_message')
@include('templates.Admin.btnCreate')

{{-- table Product --}}
<div class="w-100">
    {{-- Create Product --}}
    <div class="mb-4 NoDisp" id="layoutCreate">
        <div class="border border-secondary rounded ">
            <div class="d-flex justify-content-between mt-3 px-2">
                <h3 class="text-uppercase text-primary">create product</h3>
                <button id="btnReset" class="btn btn-sm btn-warning text-uppercase">Reset</button>
            </div>
            <hr width="96%">
            <form action="{{ route('product.store') }}" id="txtFormCreate" method="post" class="p-2">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;Name:&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="text" id="txtName" name="name" value="{{ old('name') }}"
                        placeholder="Insert Name Products Here">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Category</label>
                    </div>

                    <select class="custom-select" name="parent_id">
                        @foreach ($categories as $category)
                        @if (empty($category->parent_id))
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">&nbsp;&nbsp;Name:&nbsp;&nbsp;</span>
                    </div>
                    <input class="form-control" type="text" id="txtName" name="name" value="{{ old('name') }}"
                        placeholder="Insert Name Products Here">
                </div>
                <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
  </div>
  <div class="input-group-append">
    <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
  </div>
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
    {{-- End Create Product --}}

    {{-- Table Product --}}
    <table class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Picture</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$product)
            <tr class="text-center">
                <th scope="row">{{ $products->firstItem()+$key }}</th>

                <td>
                    <a href="{{ asset('admin/user\/').$product->id.'/edit' }}" class="No--UdLine">
                        {{ $product->name }}
                        @if ($product->sale)
                        <span class="badge badge-danger">-{{$product->sale }}%</span>
                        @endif
                        @if ($product->new)
                        <span class="badge badge-success">NEW</span>
                        @endif
                        @if ($product->top_selling)
                        <span class="badge badge-warning">TOP</span>
                        @endif
                    </a>
                </td>

                <td scope="col"><img style="height:50px;width:50px;" src="{{asset($product->picture) }}" alt="product"></td>
                <td>{{ number_format($product->price,0,',','.').' $' }}</td>

                <td class="d-flex justify-content-around align-items-center">
                    <form action="{{ route('product.edit',$product->id) }}" method="get"><button class="btn btn-sm btn-warning text-uppercase">Edit</button>
                    </form>

                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-sm btn-danger text-uppercase" data-toggle="modal"
                            data-target="#delConfirm{{ $product->id }}">
                            Delete
                        </button>

                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="delConfirm{{ $product->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Alert!!!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to <span class="text-danger text-uppercase">delete</span> this
                                        user?
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
            @endforeach
        </tbody>
    </table>
    {{-- End Table Product --}}

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $products->url(1) }}" rel="prev">«</a></li>

            @for ($i=1;$i<=$products->lastPage();$i++)
                <li class="page-item @if ($products->currentPage()===$i) {{ 'active' }} @endif)">
                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                @endfor

                <li class="page-item"><a class="page-link" href="{{ $products->url($products->lastPage()) }}" rel="next">»</a></li>
        </ul>
    </div>
    {{-- End Pagination --}}
</div>
{{-- end table Product --}}
@endsection