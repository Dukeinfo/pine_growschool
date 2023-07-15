<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="">

    <!-- BEGIN: CSS -->
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/lightcase.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('public/assets')}}/css/main.css">
    <!-- END: CSS -->

    <!-- BEGIN: Favicon -->
    <link rel="icon" type="image/png" href="{{asset('public/assets')}}/images/favicon.png">
    <!-- END: Favicon -->
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
    <section class="topbar01">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topBarWrapper">
                        <!-- Info Text -->
                        <div class="infoText"><i class="flaticon-placeholder"></i><a href="#">Kuthar Road, Subathu HP, India</a></div>
                        <!-- Info Text -->
                        <!-- Info Text -->
                        <div class="infoText infoText02"><i class="flaticon-telephone"></i>+91 980 5004 114</div>
                        <!-- Info Text -->
                        <!-- Social Item -->
                        <div class="topBarSocial">
                            <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                        <!-- Social Item -->
                        <!-- Link Text -->
                        <a href="https://www.youtube.com/watch?v=ZBFL7ltIRtQ" target="_blank" class="linkText">Campus Virtual Tour</a>
                        <!-- Link Text -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Topbar Section -->

    <!-- BEGIN: Header Section -->
    <header class="header01 isSticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header01Inner">
                        <!-- Logo -->
                        <div class="logo01">
                            <a href="{{url('/')}}"><img src="{{asset('public/assets')}}/images/logo.png" alt="Pinegrove" /></a>
                        </div>
                        <!-- Logo -->
                        <!-- Nav Menu -->
                        <a href="javascript:void(0)" class="menuBtn"><i class="fa-solid fa-bars"></i></a>
                        <nav class="mainMenu">
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0);">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:void();">Location</a></li>
                                        <li><a href="javascript:void();">Director</a></li>
                                        <li><a href="javascript:void();">Raison D'etre</a></li>
                                        <li><a href="javascript:void();">Life at Piegrove</a></li>
                                        <li><a href="javascript:void();">Faculties</a></li>
                                        <li><a href="javascript:void();">Group Photo</a></li>
                                        <li><a href="javascript:void();">Scales of Pay</a></li>
                                        <li><a href="javascript:void();">Enrollment</a></li>
                                        <li><a href="javascript:void();">The Board</a></li>
                                        <li><a href="javascript:void();">SMC</a></li>
                                        <li><a href="javascript:void();">Mandatory Disclosure</a></li>
                                        <li><a href="javascript:void();">Rules</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Facilities</a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:void();">Introduction</a></li>
                                        <li><a href="javascript:void();">Academic Facilities</a></li>
                                        <li><a href="javascript:void();">Games & Sports</a></li>
                                        <li><a href="javascript:void();">Activities</a></li>
                                        <li><a href="javascript:void();">Boarding</a></li>
                                        <li><a href="javascript:void();">New Developments</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Admission & Fees</a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:void();">Admission Process</a></li>
                                        <li><a href="javascript:void();">Fees</a></li>
                                        <li><a href="javascript:void();">Clothing</a></li>
                                        <li><a href="javascript:void();">Withdrawl</a></li>
                                        <li><a href="javascript:void();">Contact for Admission</a></li>
                                        <li><a href="javascript:void();">Transfer Certificate</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Memories</a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:void();">Our Founder</a></li>
                                        <li><a href="javascript:void();">Alumni</a></li>
                                        <li><a href="javascript:void();">Guest Book</a></li>
                                        <li><a href="javascript:void();">Grapevine</a></li>
                                        <li><a href="javascript:void();">Roll of Hounour</a></li>
                                        <li><a href="javascript:void();">Picture Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">FAQs</a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:void();">Introduction</a></li>
                                        <li><a href="javascript:void();">Admission & Fees</a></li>
                                        <li><a href="javascript:void();">Academics</a></li>
                                        <li><a href="javascript:void();">Facilities & Activities</a></li>
                                        <li><a href="javascript:void();">Boarding</a></li>
                                        <li><a href="javascript:void();">Descipline</a></li>
                                        <li><a href="javascript:void();">Others</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Calendar</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Nav Menu -->
                        <!-- Popup Btn -->
                        <a class="popupBtn" href="javascript:void(0);">
                            <svg fill="#E94D4E" width="24" height="16" viewBox="0 0 24 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 15.5V13H23.25V15.5H0.75ZM0.75 9.25V6.75H23.25V9.25H0.75ZM0.75 3V0.5H23.25V3H0.75Z" />
                            </svg>
                        </a>
                        <!-- Popup Btn -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- BEGIN: Popup Sidebar Widget -->
    <section class="popupSidebarSsec">
        <div class="popupSidebarOverlay"></div>
        <div class="widgetArea">
            <a href="javascript:void(0);" class="widgetCloser"><i class="fa-solid fa-xmark"></i></a>
            <div class="aboutWidgetArea">
                <div class="wdLogo">
                    <a href="{{url('/')}}"><img src="{{asset('public/assets')}}/images/logo.png" alt="Pinegrove"></a>
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


    @yield('content')

    <!-- BEGIN: Footer Start -->
    <footer class="footer_02" style="background-image: url({{asset('public/assets')}}/images/bg/footer-bg.png);">
        <div class="container">
            <div class="row">
                <!-- About Widget -->
                <div class="col-lg-3 col-md-5">
                    <aside class="aboutWidget">
                        <a href="{{url('/')}}"><img src="{{asset('public/assets')}}/images/flogo.png" alt="Pinegrove"></a>
                        <p>Pinegrove School, established in 1991, is a Co-educational, purely residential, English medium public school affiliated to the Central Board of Secondary Education (CBSE), Delhi, up to 10th and 12th Grades. Pinegrove is a Regional Member of the Round Square, is accredited with ISO 9001:2008 (BSI) and is a member of the prestigious Indian Public Schools` Conference (IPSC).</p>
                        <div class="abSocial">
                            <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                            <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </aside>
                </div>
                <!-- About Widget -->
                <!-- Service Widget -->
                <div class="col-lg-3 col-md-7">
                    <aside class="widget serviceMenu">
                        <h3 class="widgetTitle">Useful Links</h3>
                        <ul class="menu">
                            <li><a href="javascript:void();">Downloads</a></li>
                            <li><a href="javascript:void();">Admissions</a></li>
                            <li><a href="javascript:void();">Alumni</a></li>
                            <li><a href="javascript:void();">Jobs at Pinegrove</a></li>
                            <li><a href="javascript:void();">Parent Login</a></li>
                            <li><a href="javascript:void();">Staff Login</a></li>
                        </ul>
                    </aside>
                </div>
                <!-- Service Widget -->
                <!-- Contact Widget -->
                <div class="col-lg-3 col-md-6">
                    <aside class="contactWidget">
                        <h3 class="widgetTitle">Get in touch</h3>
                        <div class="iconBox01">
                            <div class="ibBox"><i class="flaticon-placeholder"></i></div>
                            <h3 class="ibTitle">Address</h3>
                            <p>Kuthar Road, Subathu 173 206 Distt. Solan HP, India</p>
                        </div>
                        <div class="iconBox01">
                            <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                            <h3 class="ibTitle">Phone</h3>
                            <p>+91 980 5004 115</p>
                        </div>
                        <div class="iconBox01">
                            <div class="ibBox"><i class="flaticon-email-1"></i></div>
                            <h3 class="ibTitle">Email</h3>
                            <p>subathu@pinegroveschool.com</p>
                        </div>
                    </aside>
                </div>
                <!-- Contact Widget -->
                <!-- Newsletter Widget -->
                <div class="col-lg-3 col-md-6">
                    <aside class="mailchimpWidget">
                        <h3 class="widgetTitle">Stay Connected</h3>
                        <p>Sign up to our newsletter, so you can be the first to find out the latest news and activities about school.</p>
                        <div class="mailForm">
                            <form method="get" action="#">
                                <input type="email" placeholder="Email Address">
                                <button class="immiPressBtn" type="submit"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </aside>
                </div>
                <!-- Newsletter Widget -->
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brhr"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="copyright">Copyright 2023 by Pinegrove All Right Reserved.</p>
                </div>
                <div class="col-md-6">
                    <div class="crMenu">
                        <ul class="menu">
                            <li><a href="javascript:void(0);">Privacy Policy</a></li>
                            <li><a href="javascript:void(0);">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END: Footer End -->

    <!-- Bact To Top -->
    <a href="javascript:void(0);" id="backtotop"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- Bact To Top -->

    <!-- BEGIN: JS -->
    <script src="{{asset('public/assets')}}/js/jquery.js"></script>
    <script src="{{asset('public/assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.appear.js"></script>
    <script src="{{asset('public/assets')}}/js/lightcase.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.nice-select.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.plugin.min.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('public/assets')}}/js/jquery.validate-1.16.9.min.js"></script>

    <!-- Custome Js -->
    <script src="{{asset('public/assets')}}/js/theme.js"></script>
    <!-- END: JS -->
</body>

</html>