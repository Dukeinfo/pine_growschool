<div>
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    
        <!-- BEGIN: Hero Banner Start -->
        <section class="pageBanner" style="background-image: url(assets/images/bg/school-bg.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="bannerTitle">Picture Gallery</h2>
                        <div class="breadcrumbs">
                            <a href="index.html">Home</a>
                            <span>/</span>
                            <a href="javascript:void()">Memories</a>
                            <span>/</span>
                            Picture Gallery
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
                                    <li><a href="javascript:void()">Our Founder</a></li>
                                    <li><a href="javascript:void()">Alumni</a></li>
                                    <li><a href="javascript:void()">Guest Book</a></li>
                                    <li><a href="javascript:void()">Grapevine</a></li>
                                    <li><a href="javascript:void()">Roll of Hounour</a></li>
                                    <li><a href="javascript:void()" class="active">Picture Gallery</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h5 class="subTitle">Picture Gallery</h5>
                        <h2 class="secTitle">{{$category}}</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A ducimus similique error asperiores fugit provident iure beatae odit cumque, doloribus vero fugiat ex, rerum quidem maxime iste maiores consectetur? Aliquid voluptatum sunt illum eius!</p>
    
                        <div class="row photos g-4">
                         @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
   
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="{{ asset('storage/uploads/gallery').'/'.$record->image }}" data-lightbox="photos">
                                    <img class="img-fluid" src="{{ asset('storage/uploads/gallery').'/'.$record->image }}">
                                </a>
                            </div>
                          @endforeach
                              @endif   
                           <!--  <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd1.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd1.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd2.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd2.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd3.JPG" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd3.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd4.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd4.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd5.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd5.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd6.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd6.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd7.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd7.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd8.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd8.jpg">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 item">
                                <a href="assets/images/gallery/gd9.jpg" data-lightbox="photos">
                                    <img class="img-fluid" src="assets/images/gallery/gd9.jpg">
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
</div>
