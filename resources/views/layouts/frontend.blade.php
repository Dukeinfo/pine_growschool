<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>{{ $metaTitle ?: 'Pinegrow school' }}</title> --}}
    <title>'Pinegrove School' </title>
    <meta name="author" content="TheCodeholic">
    <meta name="description" content="">



    <!-- BEGIN: CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">


    <!-- END: CSS -->

    <!-- BEGIN: Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <!-- END: Favicon -->
    @livewireStyles

</head>

<body>
    <!-- BEGIN: PreLoder Section -->
    <!-- <section class="preloader" id="preloader">
        <button class="closeLoader PinegroveBtn"><span>Cancel Preloader</span></button>
        <div class="spinner-eff spinner-eff-1">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
        </div>
    </section> -->
    <!-- END: PreLoder Section -->

    <!-- BEGIN: Topbar Section -->
@include('livewire.frontend.common.header')
    <!-- BEGIN: Header Section -->

    <!-- BEGIN: Popup Sidebar Widget -->
@include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
 @include('livewire.frontend.common.news_ticker')
    
    <div class="blanks"></div>
    <!-- END: Header Section -->

{{-- 
    <main class="dashMain"> --}}

        {{ $slot }}
    {{-- </main> --}}

    <!-- BEGIN: Footer Start -->
 @include('livewire.frontend.common.footer')
    <!-- END: Footer End -->

    <!-- Bact To Top -->
    <a href="javascript:void(0);" id="backtotop"><i class="fa-solid fa-arrow-up"></i></a>
    {{-- <a href="javascript:void(0);" id="backtotop"><i class="fa-solid fa-arrow-up"></i></a> --}}
    <!-- Bact To Top -->
<script>
  document.addEventListener('livewire:load', function () {
        $('.popupBtn').on('click', function (e) {
        e.preventDefault();
        $('.popupSidebarSsec').toggleClass('active');
    });
    $('.popupSidebarOverlay, .widgetCloser').on('click', function () {
        $('.popupSidebarSsec').removeClass('active');
    });
});


</script>
    <!-- BEGIN: JS -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('assets/js/lightcase.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate-1.16.9.min.js')}}"></script>

    <!-- Custome Js -->
    <script src="{{asset('assets/js/theme.js')}}"></script>

    <!-- new Custome Js added -->
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <!-- END: JS -->
    @livewireScripts

</body>

</html>