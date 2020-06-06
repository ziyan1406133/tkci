<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{asset('images/logo.jpg')}}">

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" media="all">

    @yield('head')

<body class="animsition">
    <div class="page-wrapper">
        @include('layouts.partial.backsite.header-mobile')
        @include('layouts.partial.backsite.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include('layouts.partial.backsite.header-desktop')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="container-fluid">
                    @include('layouts.partial.backsite.alert')
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
        <div class="text-muted text-center fixed-bottom mb-3">
            <p>
                Copyright © 2018 Colorlib. All rights reserved. 
                Template by <a href="https://colorlib.com">Colorlib</a>.
            </p>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>

    <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>

    @yield('js')
</body>
</html>
