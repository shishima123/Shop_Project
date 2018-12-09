@extends('master')
@section('tittle','Create User')
@section('page-description','CREATE PAGE')
@section('table')
     @include('error')
    <form action="" method="post">
          <div class="form-group ">
            <label class="text-uppercase font-weightdd-bold" for="name">name</label>
            <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="name">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="email">email</label>
            <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="email">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="password">password</label>
            <input type="password" class="form-control rounded-0" id="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              confirm
            </button>
            {{ csrf_field() }}
          </div>
        </form>
@endsection
