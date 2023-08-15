
<div>
   
    <!-- BEGIN: Popup Sidebar Widget -->

    <!-- END: Header Section -->

    <!-- BEGIN: Hero Banner Start -->
    <section class="pageBanner" style="background-image: url(assets/images/bg/school-bg.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="bannerTitle">{{$name ?? ''}}</h2>
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
                    <h5 class="subTitle">Where We Are?</h5>
                    <h2 class="secTitle">{!!$heading  ?? "" !!}</h2>

                    <img src="{{getsubmenuImage($image)}}" class="img-fluid rounded mb-4" alt="submenu img">

                    <p>  {!! $desc ?? ""!!}</p>
                    <a class="immiPressBtn" href="{{$url_link ?? ''}}"><span>Discover More</span></a>
                    

                  

                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
