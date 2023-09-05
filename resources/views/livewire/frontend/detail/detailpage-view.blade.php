
<div>
    
    <section class="pageBanner" style="background-image: url({{ $backimage ? getsubmenuImage($backimage) : asset('assets/images/bg/school-bg.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="bannerTitle">{{Str::title( $display_name) ??  Str::title($name) }}   </h2>
                    <div class="breadcrumbs">
                        <a href="{{route('home.homepage')}}">Home</a>
                        <span>/</span>
                        <a href="javascript:void()">About Us</a>
                        <span>/</span>
                        Location
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Hero Banner End -->

    <!-- BEGIN: Section -->
    <section class="serviceSection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar lft">
                        <aside class="widget">
                            <h3 class="widgetTitle">Quick Links</h3>
                            <ul>
                                <li><a href="javascript:void()">About School</a></li>
                                <li><a href="javascript:void()" class="active">Location</a></li>
                                <li><a href="javascript:void()">Director's Message</a></li>
                                <li><a href="javascript:void()">Raison D'etre</a></li>
                                <li><a href="javascript:void()">Life at Pinegrove</a></li>
                                <li><a href="javascript:void()">Faculties</a></li>
                                <li><a href="javascript:void()">The Board</a></li>
                                <li><a href="javascript:void()">SMC</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8">
                    @forelse ($getpageData as $index => $data)
                   @if($index === 0)
                        <h2 class="secTitle">{!! $data->heading ?? "" !!}</h2>
                    @else
                        <h3 class="widgetTitle text-dark fs-5 mb-3">{!! $data->heading ?? "" !!}</h3>
                    @endif
                        @if(isset($data->image))
                            <img src="{{ getpageImage($data->image) ?? '' }}" class="img-fluid rounded mb-4" alt="submenu img">
                        @endif
                        <p>{!! $data->description ?? "" !!}</p>
                       
                    @empty
                
                    @endforelse
                
                
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
