<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="stylesheet" href="{{asset('css/Admin/bootstrap.min.css')}}">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-2 d-flex justify-content-center align-items-center">
                <a href=""><button class="btn btn-primary">Home</button></a>
            </div>
            <div class="col-10 d-flex justify-content-center align-items-center ">
                <h1 class="font-weight-bold">LARAVEL CRUD USERS DEMO
                </h1>
            </div>
        </div>
    </div>
    <hr>
    <div class="container my-2">
        <div class="row">
            <div class="col-12">
                <span class="badge badge-success text-uppercase text-left">@yield('page-description')</span>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="d-flex flex-row">
            <div class="col-12 px-0">
                @yield('table')
            </div>
        </div>
    </div>
    <hr>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-uppercase text-muted">
                        laravel crud users demo
                    </span>
                    <form action="" method="get">
                        <button type="submit" class="btn btn-info text-uppercase font-weight-bold rounded-0">
                            create an user
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>