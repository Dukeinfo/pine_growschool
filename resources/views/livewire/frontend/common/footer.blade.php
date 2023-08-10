
<footer class="footer_02" style="background-image: url({{asset('assets/images/bg/footer-bg.png')}});">

    @php
     $contactInfo = App\Models\ContactInfo::orderBy('sort_id','asc')->where('status','Active')->first();     
                           
    @endphp
    <div class="container">
        <div class="row">
            <!-- About Widget -->
            <div class="col-lg-3 col-md-5">
                <aside class="aboutWidget">
                     <a href="{{url('/')}}"><img src="{{asset('assets/images/flogo.png')}}" alt="Pinegrove"></a>
                    
                    
                    <p>{{$contactInfo->disclaimer ?? ''}}
                    </p>
                    <div class="abSocial">
                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </aside>
            </div>
            <!-- About Widget -->
            <!-- Links Widget -->
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
            <!-- Links Widget -->
            <!-- Contact Widget -->
            <div class="col-lg-3 col-md-6">
                <aside class="contactWidget">
                    <h3 class="widgetTitle">Get in touch</h3>
                    <div class="iconBox01">
                        <div class="ibBox"><i class="flaticon-placeholder"></i></div>
                        <h3 class="ibTitle">Address</h3>
                        <p>{{$contactInfo->address ?? ''}}</p>
                    </div>
                    <div class="iconBox01">
                        <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                        <h3 class="ibTitle">Phone</h3>
                        <p>{{$contactInfo->phone ?? ''}}</p>
                    </div>
                    <div class="iconBox01">
                        <div class="ibBox"><i class="flaticon-email-1"></i></div>
                        <h3 class="ibTitle">Email</h3>
                        <p>{{$contactInfo->email ?? ''}}</p>
                    </div>
                </aside>
            </div>
            <!-- Contact Widget -->
            <!-- Newsletter Widget -->
            <div class="col-lg-3 col-md-6">
                <aside class="mailchimpWidget">
                    <h3 class="widgetTitle">Stay Connected</h3>
                    <p>Sign up to our newsletter, so you can be the first to find out the latest news and activities
                        about school.
                    </p>
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
    <div class="container pb-5">
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