<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">


  <!-- Bootstrap core CSS-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/Admin/bootstrap.min.css') }}" />


  <!-- Custom fonts for this template-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/Admin/all.min.css') }}" />


  <!-- Page level plugin CSS-->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/Admin/dataTables.bootstrap4.css') }}" />


  <!-- Custom styles for this template-->

  <link type="text/css" rel="stylesheet" href="{{ asset('css/Admin/sb-admin.css') }}" />


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Admin Page</a>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav mx-3 ml-md-0">
      <li class="nav-item dropdown no-arrow">
          <i class="fas fa-user-circle fa-fw text-light ml-2"></i>
          <span class="text-light mr-2">{{ Auth::user()->name }}</span>
          <button class="btn border-0 btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
          </button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
      </li>
    </ul>

  </nav>
