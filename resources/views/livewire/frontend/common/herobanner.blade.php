{{-- <section class="pageBanner" style="background-image: url({{asset('assets/images/bg/school-bg.jpg')}});">

    <div class="overlay"></div>
    <div class="container">
        @foreach(Route::getRoutes() as $route)
    @if (str_starts_with($route->getName(), 'home.'))
        @php
            $routeName = ucwords(str_replace('home.', '', $route->getName()))
        @endphp
        <div class="row">
            <div class="col-md-12">
                @if (Route::currentRouteName() === $route->getName())
                <h2 class="bannerTitle">{{ str_replace('_', ' ', $routeName) }}</h2>
                <div class="breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>/</span>
                    <a  href="{{ route($route->getName()) }}" target="_blank">{{ str_replace('_', ' ', $routeName) }}</a>
                    <span>/</span>
                    {{ str_replace('_', ' ', $routeName) }}
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section> --}}

<section class="pageBanner" style="background-image: url({{ asset('assets/images/bg/school-bg.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach(Route::getRoutes() as $route)
                @if (str_starts_with($route->getName(), 'home.'))
                    @php
                        $routeName = ucwords(str_replace('home.', '', $route->getName()));
                    @endphp
                       @if (Route::currentRouteName() === $route->getName())
                <h2 class="bannerTitle">     {{  Str::title(str_replace('_', ' ', $routeName))  }}</h2> 
                <div class="breadcrumbs">
                    <a href="{{url('/')}}">Home</a>
                    <span>/</span>
                    <a href="javascript:void()">About Us</a>
                    <span>/</span>
                    <a href="{{ route($route->getName()) }}">{{ str_replace('_', ' ', $routeName) }}</a>

                </div>
                @endif
                @endif
            @endforeach
            </div>
        </div>
    </div>
</section>

<!-- END: Hero Banner End -->