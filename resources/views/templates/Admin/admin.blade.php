<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
</head>

<body>
    {{-- Start header --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
                    <a class="navbar-brand" href="{{ route('admin') }}">Admin Page</a>
                    <div class="navbar-nav mx-3">
                        <i class="fas fa-user-circle fa-fw text-light mt-2 mr-1"></i>
                        <span class="text-light mr-2 mt-1">{{ Auth::user()->name }}</span>
                        <button class="btn border-0 btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{-- End header --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 navbar-nav Left-sidebar--Height">
                <!-- Sidebar -->
                    <div class="nav-item ml-2">
                        <a id="1" class="nav-link d-flex text-muted {{ Request::is('admin') ? 'active' : '' }}" href="">
                            <i class="fas fa-fw fa-tachometer-alt mt-1 mr-2"></i>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div class="nav-item ml-2">
                        <a id="2" class="nav-link d-flex text-muted {{ Request::is('admin/user*') ? 'active' : '' }}" href="">
                            <i class="fas fa-users-cog mt-1 mr-2"></i>
                            <span>User</span></a>
                    </div>

                    <div class="nav-item ml-2">
                        <a id="3" class="nav-link d-flex text-muted {{ Request::is('admin/category*') ? 'active' : '' }}" href="">
                            <i class="fas fa-fw fa-table mt-1 mr-2"></i>
                            <span>Category</span></a>
                    </div>

                    <div class="nav-item ml-2">
                        <a id="4" class="nav-link d-flex text-muted {{ Request::is('admin/product*') ? 'active' : '' }}" href="">
                            <i class="fas fa-shopping-basket mt-1 mr-2"></i>
                            <span>Product</span></a>
                    </div>

                    <div class="nav-item ml-2">
                        <a id="5" class="nav-link d-flex text-muted {{ Request::is('admin/comment*') ? 'active' : '' }}" href="">
                            <i class="fas fa-fw fa-table mt-1 mr-2"></i>
                            <span>Comment</span></a>
                    </div>
                </div>
            </div>
        </div>











    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/Admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/Admin/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/Admin/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/Admin/sb-admin.min.js') }}"></script>
<script>
$('a').click(function(){
    // e.preventDefault();
    $('a').removeClass('active');
    $(this).addClass('active');
})
</script>
</body>

</html>