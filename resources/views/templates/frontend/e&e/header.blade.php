<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-font.min.css') }}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css') }}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

<!-- Header Section Start -->
<div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-one header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-10 mb-10">
                    <!-- Header Links Start -->
                    <div class="header-links">
                        <a href="{{ asset('track-order') }}"><img src="{{ asset('frontend/images/icons/car.png') }}" alt="Car Icon"> <span>Track your order</span></a>
                        <a href="{{ asset('store') }}"><img src="{{ asset('frontend/images/icons/marker.png') }}" alt="Car Icon"> <span>Locate Store</span></a>
                    </div><!-- Header Links End -->
                </div>

                <div class="col order-12 order-xs-12 order-lg-2 mt-10 mb-10">
                    <!-- Header Advance Search Start -->
                    <div class="header-advance-search">
                        
                        <form action="#">
                            <div class="input"><input type="text" placeholder="Search your product"></div>
                            <div class="select">
                                <select class="nice-select">
                                    <option>All Categories</option>
                                    <option>Mobile</option>
                                    <option>Computer</option>
                                    <option>Laptop</option>
                                    <option>Camera</option>
                                </select>
                            </div>
                            <div class="submit"><button><i class="icofont icofont-search-alt-1"></i></button></div>
                        </form>
                        
                    </div><!-- Header Advance Search End -->
                </div>

                <div class="col order-2 order-xs-2 order-lg-12 mt-10 mb-10">
                    <!-- Header Account Links Start -->
                    <div class="header-account-links">
                        <a href="{{ asset('register') }}"><i class="icofont icofont-user-alt-7"></i> <span>my account</span></a>
                        <a href="{{ asset('login') }}"><i class="icofont icofont-login d-none"></i> <span>Login</span></a>
                    </div><!-- Header Account Links End -->
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="{{ asset('index') }}">
                            <img src="{{ asset('frontend/images/logo.png') }}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                            <img class="theme-dark" src="{{ asset('frontend/images/logo-light.png') }}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
                    <!-- Main Menu Start -->
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ asset('index') }}">HOME</a></li>
                                <li class="menu-item-has-children"><a href="{{ asset('shop-grid') }}">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children"><a href="{{ asset('shop-grid') }}shop-grid">shop grid</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop-grid">shop grid</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="single-product">Single Product</a>
                                            <ul class="sub-menu">
                                                <li><a href="single-product">Single Product 1</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">PAGES</a>
                                    <ul class="mega-menu three-column">
                                        <li><a href="#">Column One</a>
                                            <ul>
                                                <li><a href="about-us">About us</a></li>
                                                <li><a href="best-deals">Best Deals</a></li>
                                                <li><a href="cart">Cart</a></li>
                                                <li><a href="checkout">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Two</a>
                                            <ul>
                                                <li><a href="compare">Compare</a></li>
                                                <li><a href="faq">Faq</a></li>
                                                <li><a href="feature">Feature</a></li>
                                                <li><a href="login">Login</a></li>
                                                <li><a href="register">Register</a></li>
                                                <li><a href="store">Store</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Three</a>
                                            <ul>
                                                <li><a href="terms-conditions">Terms & Conditions</a></li>
                                                <li><a href="track-order">Track Order</a></li>
                                                <li><a href="wishlist">Wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="blog-1-column-left-sidebar">BLOG</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-1-column-left-sidebar">Blog 1 Column Left Sidebar</a></li>
                                        <li><a href="single-blog-left-sidebar">Single Blog Left Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div><!-- Main Menu End -->
                </div>

                <div class="col order-2 order-lg-12 order-xl-12">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">
                        
                        <!-- Compare -->
                        <a href="compare" class="header-compare"><i class="ti-control-shuffle"></i></a>
                        <!-- Wishlist -->
                        <a href="wishlist" class="header-wishlist"><i class="ti-heart"></i> <span class="number">3</span></a>
                        <!-- Cart -->
                        <a href="cart" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number">3</span></a>
                        
                    </div><!-- Header Shop Links End -->
                </div>
                
                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header Bottom End -->

    <!-- Header Category Start -->
    <div class="header-category-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!-- Header Category -->
                    <div class="header-category">
                        
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap d-block d-lg-none">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>
                        
                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <li><a href="category-1">Tv & Audio System</a></li>
                                <li><a href="category-2">Computer & Laptop</a></li>
                                <li><a href="category-3">Phones & Tablets</a></li>
                                <li><a href="category-1">Home Appliances</a></li>
                                <li><a href="category-2">Kitchen appliances</a></li>
                                <li><a href="category-3">Accessories</a></li>
                            </ul>
                        </nav>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- Header Category End -->

</div><!-- Header Section End -->

<!-- Mini Cart Wrap Start -->                      
<div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">    
    
        <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>
        
    </div>

    <!-- Mini Cart Products -->
    <ul class="mini-cart-products">
        <li>
            <a class="image"><img src="{{ asset('frontend/images/product/product-1.png') }}" alt="Product"></a>
            <div class="content">
                <a href="single-product" class="title">Waxon Note Book Pro 5</a>
                <span class="price">Price: $295</span>
                <span class="qty">Qty: 02</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
        <li>
            <a class="image"><img src="{{ asset('frontend/images/product/product-2.png') }}" alt="Product"></a>
            <div class="content">
                <a href="single-product" class="title">Aquet Drone D 420</a>
                <span class="price">Price: $275</span>
                <span class="qty">Qty: 01</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
        <li>
            <a class="image"><img src="{{ asset('frontend/images/product/product-3.png') }}" alt="Product"></a>
            <div class="content">
                <a href="single-product" class="title">Game Station X 22</a>
                <span class="price">Price: $295</span>
                <span class="qty">Qty: 01</span>
            </div>
            <button class="remove"><i class="fa fa-trash-o"></i></button>
        </li>
    </ul>

    <!-- Mini Cart Bottom -->
    <div class="mini-cart-bottom">    
    
        <h4 class="sub-total">Total: <span>$1160</span></h4>

        <div class="button">
            <a href="checkout">CHECK OUT</a>
        </div>
        
    </div>

</div><!-- Mini Cart Wrap End --> 

<!-- Cart Overlay -->
<div class="cart-overlay"></div>