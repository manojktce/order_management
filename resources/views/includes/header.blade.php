<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    
    <!-- Summernote editor -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}"> --}}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Datatables Css & Script for Vendor -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Datatables Css & Script for Vendor -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <style>

        .price_value input {
            border: 0px;
            text-align: center;
            max-width: 60px;
        }

        .error
        {
            color: red;
        }

        .dropzone.dz-started .dz-message {
            display: none;
        }

        .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 30px;
        }

        .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
        }

        .rating label:last-child {
        position: static;
        }

        .rating label:nth-child(1) {
        z-index: 5;
        }

        .rating label:nth-child(2) {
        z-index: 4;
        }

        .rating label:nth-child(3) {
        z-index: 3;
        }

        .rating label:nth-child(4) {
        z-index: 2;
        }

        .rating label:nth-child(5) {
        z-index: 1;
        }

        .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        }

        .rating label .icon {
        float: left;
        color: transparent;
        }

        .rating label:last-child .icon {
        color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
        color: #09f;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
        }

    </style>
</head>

<body>

    @php
    if(Auth::user())  
    {
        $role_name = Auth::user()->roles[0]->name; 
    }
    @endphp
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    @include('includes.header_menu')
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->