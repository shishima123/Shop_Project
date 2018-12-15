@extends('templates.Admin.master')
@section('title','User')
@section('content')

<div class="row">
    <div class="col-4 text-center">
        <img src="{{ asset($user->picture) }}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
        <h6 class="mt-4">Upload a different photo</h6>
        <button class="btn btn-secondary">Choose file</button>
    </div>

    <div class="col-8">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
            </li>
        </ul>
        <div class="tab-content py-4">
            <div class="tab-pane active show fade" id="profile">
                <h1 class="mb-3 text-success text-center">{{ $user->name }} Profile</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h3>About</h3>
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Role: {{ $user->role }}</p>
                        <p>Phone: {{ $user->phone }}</p>
                        <p>Address: {{ $user->address }}</p>
                    </div>
                    <div class="col-md-12">
                        <h3 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Comment</h3>
                        <table class="table table-sm table-hover table-striped">
                            <tbody>
                                @if (count($user->products))
                                @foreach ($user->products as $comment)
                                <tr>
                                    <td>
                                        <strong>{{ $user->name }}</strong> commented on <strong>{{ $comment->name }}
                                        </strong><i class="far fa-question-circle" data-toggle="tooltip" title="{{ $comment->pivot->content }}"></i>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    User no comment.
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/row-->
            </div>
            <div class="tab-pane fade" id="edit">
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="phone" value="{{ $user->phone }}" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Address</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="address" value="{{ $user->address }}" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <button type="reset" class="btn btn-sm btn-danger">Cancel</button>
                                                <button type="button" class="btn btn-sm btn-primary text-uppercase" data-toggle="modal" data-target="#updateConfirm">
                        Save Changes
                    </button>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="updateConfirm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Alert!!!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn lưu thay đổi?
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection