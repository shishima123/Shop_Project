@extends('templates.frontend.master')
@section('title','Login')
    @section('content')
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="page-banner-wrap row row-0 d-flex align-items-center ">

        <!-- Page Banner -->
        <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
            <div class="page-banner">
                <h1>Login</h1>
                <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="col-lg-4 col-md-6 col-12 order-lg-1">
            <div class="banner"><a href="#"><img src="frontend/images/banner/banner-15.jpg" alt="Banner"></a></div>
        </div>

        <!-- Banner -->
        <div class="col-lg-4 col-md-6 col-12 order-lg-3">
            <div class="banner"><a href="#"><img src="frontend/images/banner/banner-14.jpg" alt="Banner"></a></div>
        </div>

    </div>
</div><!-- Page Banner Section End -->

<!-- Login Section Start -->
<div class="login-section section mt-90 mb-90">
    <div class="container">
        <div class="row">
            
            <!-- Login -->
            <div class="col-md-6 col-12 d-flex">
                <div class="ee-login">
                    
                    <h3>Login to your account</h3>
                    <p>E&E provide how all this mistaken idea of denouncing pleasure and sing pain born an will give you a complete account of the system, and expound</p>
                    
                    <!-- Login Form -->
                    <form action="#">
                        <div class="row">
                            <div class="col-12 mb-30"><input type="text" placeholder="Type your username or email address"></div>
                            <div class="col-12 mb-20"><input type="password" placeholder="Enter your passward"></div>
                            <div class="col-12 mb-15">
                                
                                <input type="checkbox" id="remember_me">
                                <label for="remember_me">Remember me</label>
                                
                                <a href="#">Forgotten pasward?</a>
                                
                            </div>
                            <div class="col-12"><input type="submit" value="LOGIN"></div>
                        </div>
                    </form>
                    <h4>Don’t have account? please click <a href="register">Register</a></h4>
                    
                </div>
            </div>
            
            <div class="col-md-1 col-12 d-flex">
                
                <div class="login-reg-vertical-boder"></div>
                
            </div>
            
            <!-- Login With Social -->
            <div class="col-md-5 col-12 d-flex">
                
                <div class="ee-social-login">
                    <h3>Also you can login with...</h3>
                    
                    <a href="#" class="facebook-login">Login with <i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter-login">Login with <i class="fa fa-twitter"></i></a>
                    <a href="#" class="google-plus-login">Login with <i class="fa fa-google-plus"></i></a>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div><!-- Login Section End -->
    @endsection