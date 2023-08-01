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
    <section class="popupSidebarSsec">
        <div class="popupSidebarOverlay"></div>
        <div class="widgetArea">
            <a href="javascript:void(0);" class="widgetCloser"><i class="fa-solid fa-xmark"></i></a>
            <div class="aboutWidgetArea">
                <div class="wdLogo">
                    <a href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Pinegrove"></a>
                </div>
                <p>
                    Pinegrove School, established in 1991, is a Co-educational, purely residential, English medium public school affiliated to the Central Board of Secondary Education (CBSE), Delhi, up to 10th and 12th Grades. Pinegrove is a Regional Member of the Round Square, is accredited with ISO 9001:2008 (BSI) and is a member of the prestigious Indian Public Schools` Conference (IPSC).
                </p>
                <h3>Contact info</h3>
                <div class="iconBox01">
                    <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                    <h3 class="ibTitle">Call Us</h3>
                    <p><a href="tel:09805004115">+91 980 5004 115</a></p>
                </div>
                <div class="iconBox01">
                    <div class="ibBox"><i class="flaticon-email"></i></div>
                    <h3 class="ibTitle">Email us</h3>
                    <p><a href="mailto:subathu@pinegroveschool.com">subathu@pinegroveschool.com</a></p>
                </div>
                <div class="iconBox01">
                    <div class="ibBox"><i class="flaticon-placeholder"></i></div>
                    <h3 class="ibTitle">Address</h3>
                    <p><a href="https://goo.gl/maps/PZ8BLmk3CbRwXGAt9" target="_blank">Kuthar Road, Subathu 173 206 District Solan HP, India</a></p>
                </div>
                <div class="socialItem">
                    <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6841.7408470106075!2d76.97798800000001!3d30.974098!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3905635171d14131%3A0xb59e9f18c38cb75e!2sPinegrove%20School%2C%20Subathu!5e0!3m2!1sen!2sin!4v1688810990830!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- END: Popup Sidebar Widget -->
    <div class="container-fluid bg-custom p-3 position-relative">
        <marquee behavior="scroll" scrollamount="5" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
            <span class="dot"></span><span class="text-custom">15-06-2023:</span>
            <a href="#" class="text-custom me-5">Ananya Kalia to Join NDA</a>

            <span class="dot"></span><span class="text-custom">15-06-2023:</span>
            <a href="#" class="text-custom me-5">Presentation on rules to be followed at home and the duties individuals have towards society.</a>

            <span class="dot"></span><span class="text-custom">15-06-2023:</span>
            <a href="#" class="text-custom me-5">Seminar on the intersection of Law and Technology at Pinegrove School in Subathu</a>

            <span class="dot"></span><span class="text-custom">15-06-2023:</span>
            <a href="#" class="text-custom me-5">The book list for the new academic session 2023-24 is uploaded under Admission Menu.</a>
        </marquee>
    </div>
    
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
    <!-- Bact To Top -->

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
    <!-- END: JS -->
    @livewireScripts

</body>

</html>