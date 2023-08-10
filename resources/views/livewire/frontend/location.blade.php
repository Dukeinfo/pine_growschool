<div>
   
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    <!-- END: Header Section -->

    <!-- BEGIN: Hero Banner Start -->
    <section class="pageBanner" style="background-image: url(assets/images/bg/school-bg.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="bannerTitle">Location</h2>
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a>
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
                    <h2 class="secTitle">Our Location</h2>

                    <img src="{{asset('assets/images/location.jpg')}}" class="img-fluid rounded mb-4" alt="">

                    <p>Pinegrove School, Subathu is located in the salubrious and pristine environment of Solan District in the Shimla ranges and is situated in the most picturesque scenery and pollution-free environment at a height of about 3300 feet in exotic valley of erstwhile Kuthar State on the Subathu-Kuthar-Kasauli- State Highway along the banks of a perennial stream. The gentle gurgling brook with cascading waters, babbles through the campus thus heightening the serenity of the campus.</p>
                    
                    

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h3 class="widgetTitle text-dark fs-5">Area of school campus (Subathu)</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td>In Acres</td>
                                            <td>5.81</td>
                                        </tr>
                                        <tr>
                                            <td>In Sq. Mtrs.</td>
                                            <td>23516</td>
                                        </tr>
                                        <tr>
                                            <td>Built up area (sq. mtrs)</td>
                                            <td>9998.29 </td>
                                        </tr>
                                        <tr>
                                            <td>Area of playground in sq. mtrs</td>
                                            <td>4207</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <h3 class="widgetTitle text-dark fs-5">Address for Correspondence</h3>
                            <aside class="contactWidget mt-0">
                                <div class="iconBox01 mb-3">
                                    <div class="ibBox text-dark"><i class="flaticon-placeholder"></i></div>
                                    <h3 class="ibTitle text-dark">Address</h3>
                                    <p class="text-dark">Kuthar Road, Subathu, District Solan HP, 173 206 (India)</p>
                                </div>
                                <div class="iconBox01 mb-3">
                                    <div class="ibBox text-dark"><i class="flaticon-phone-call"></i></div>
                                    <h3 class="ibTitle text-dark">Phone</h3>
                                    <p class="text-dark">+91 980 5004 116</p>
                                </div>
                                <div class="iconBox01">
                                    <div class="ibBox text-dark"><i class="flaticon-email-1"></i></div>
                                    <h3 class="ibTitle text-dark">Email</h3>
                                    <p class="text-dark">subathu@pinegroveschool.com</p>
                                    <p class="text-dark">director@pinegroveschool.com</p>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="widgetTitle text-dark fs-5 mb-3">Climate</h3>
                            <p>The Shimla Hills have one of the best climates in the country. The weather is relatively cool all through the year with temperature varying from 0-27 degrees centigrade in winter and 20-35 degrees centigrade in summer. Monsoons hit the region during the months of July and August. As the winter months of January and February tend to be quite cold, we close for our winter vacation during these months.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
