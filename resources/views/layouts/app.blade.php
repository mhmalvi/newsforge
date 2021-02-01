<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicons ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    {{--  --}}
    @include('layouts.styles')
</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        @include('layouts.header')
        <!-- Header Section End -->

        <!-- Posts Filter Bar Start -->
        @include('components.filterBar')
        <!-- Posts Filter Bar End -->

        <!-- News Ticker Start -->
        @include('components.newsTicker')
        <!-- News Ticker End -->

        <!-- Main Content Section Start -->
        <div class="main-content--section pbottom--30">
            @yield('content')
        </div>
        <!-- Main Content Section End -->

        <!-- Footer Section Start -->
        @include('layouts.footer')
        <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- Sticky Social Start -->
    @include('components.social')
    <!-- Sticky Social End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    {{-- Scripts --}}
    @include('layouts.scripts')

</body>
</html>
