<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Management</title>
    <link rel="icon" href="{{ asset('/common/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/owl.carousel.min.css') }}">
    
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/nice-select.css') }}">
    <!-- light slider CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/lightslider.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/common/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/common/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/common/css/price_rangs.css') }}">
    
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('/common/css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <style>

        .price_value input {
            border: 0px;
            text-align: center;
            max-width: 60px;
        }

    </style>
</head>

<body>
    
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('/common/img/logo.png') }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                                </li>
                                
                                @if(Auth::user())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Others
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{ route('showCart') }}">Cart</a>
                                        <a class="dropdown-item" href="tracking.html">My Orders</a>
                                    </div>
                                </li>
                                @endif
                            
                            </ul>
                        </div>
                        
                        <div class="hearer_icon d-flex">
                            <!-- Check Users Authenticated & show icons-->
                            @if(Auth::user())
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <a href=""><i class="ti-heart"></i></a>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cart-plus"></i>
                                        <b>{{ \Cart::session(Auth::user()->id)->getTotalQuantity()}}</b>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                        <a class="dropdown-item" href="{{ route('showCart') }}">Cart</a>
                                    </div>                                
                                </div>
                            @endif
                            <!-- Check Users Authenticated & show icons-->

                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    @if(Auth::user())
                                        <a class="dropdown-toggle" href="#" id="navbarDropdown_3"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user"></i> {{ Auth::user()->first_name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                            <a class="dropdown-item" href="login.html">My Account</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    @endif
                                </li>

                                <li class="nav-item">
                                    @if(empty(Auth::user()))
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    @endif
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        {{-- <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> --}}
    </header>
    <!-- Header part end-->

    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <strong>Whoops!</strong> There were some problems with your input.<br>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif