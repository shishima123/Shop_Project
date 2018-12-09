@extends('master')
@section('tittle','Edit User')
@section('page-description','EDIT PAGE')
@section('table')
<form action="{{ asset($users->id.'/edit') }}" method="POST">
  {{-- <input type="hidden" name="_method" value="PATCH">       --}}
  <div class="form-group">
    <label class="text-uppercase font-weight-bold" for="name">name</label>
    <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="name" value="{{ $users->name }}">
  </div>
  <div class="form-group">
    <label class="text-uppercase font-weight-bold" for="email">email</label>
    <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="email" value="{{ $users->email }}">
  </div>

  <div class="form-group">
    {{ csrf_field() }}
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    {{ method_field('PUT') }}
    <button type="submit" class="btn btn-warning text-uppercase rounded-0 font-weight-bold">
      save
    </button>

  </div>
</form>
@endsection