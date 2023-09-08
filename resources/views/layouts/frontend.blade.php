<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- OR -->
    {!! SEO::generate() !!}
    {{-- @stack('keywords') --}}
    <!-- BEGIN: CSS -->
    @php
        $headerSnippets = App\Models\Headersnippets::get();
    @endphp
        @forelse($headerSnippets as $snippet)
            {{ $snippet->description }}
        @empty
        @endforelse

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">


    <!-- END: CSS -->

    <!-- BEGIN: Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
    <!-- END: Favicon -->
    @livewireStyles

</head>

<body>
    <!-- BEGIN: PreLoder Section -->
  <section class="preloader" id="preloader">
        {{-- <button class="closeLoader PinegroveBtn"><span>Cancel Preloader</span></button> --}}
        <div class="spinner-eff spinner-eff-1">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
        </div>
    </section> 
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
<!-- Include JavaScript to load submenu items when a menu item is clicked -->

<!-- Include JavaScript to load submenu items when hovering over a menu item -->
<script>
    const submenuLoaders = {};

    document.addEventListener("DOMContentLoaded", function () {
        const menuItemsWithSubmenus = document.querySelectorAll('.menu-item-has-children > a');

        menuItemsWithSubmenus.forEach(menuItem => {
            const menuId = /* extract menu ID from data attribute or other logic */;
            submenuLoaders[menuId] = Livewire.find('submenu-loader:' + menuId);

            menuItem.addEventListener('mouseenter', function () {
                if (!submenuLoaders[menuId]) {
                    return;
                }

                // Call the loadSubmenus method of the Livewire component
                submenuLoaders[menuId].call('loadSubmenus');
            });
        });
    });
</script>

<script>
    
//   document.addEventListener('livewire:load', function () {
//         $('.popupBtn').on('click', function (e) {
//         e.preventDefault();
//         $('.popupSidebarSsec').toggleClass('active');
//     });
//     $('.popupSidebarOverlay, .widgetCloser').on('click', function () {
//         $('.popupSidebarSsec').removeClass('active');
//     });
// });


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    <!-- Custome Js -->
    <script src="{{asset('assets/js/theme.js')}}"></script>


    <!-- END: JS -->
    @livewireScripts

</body>

</html>