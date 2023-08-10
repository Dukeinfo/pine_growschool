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
                        <h2 class="bannerTitle">Contact Us</h2>
                        <div class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Contact</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Hero Banner End -->
    
        <!-- BEGIN: Contact Section Start -->
        <section class="contactSection02">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="contactFWrapper pt-0">
                            <h5 class="subTitle">Get in Touch</h5>
                            <h3 class="secTitle">Have any Question?<br> Feel Free to Reach Us</h3>
                            <div class="contactForm">
                                <form id="contact_form" wire:submit.prevent="send">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-6">
                                            <div class="input-box">
                                                <input type="text" wire:model="name" name="firstName" placeholder="Name">
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-6">
                                            <div class="input-box">
                                                <input type="email" wire:model="email" name="conEmail" placeholder="Email address">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                           
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-6">
                                            <div class="input-box">
                                                <input type="text" wire:model="phone" name="conPhone" placeholder="Phone" autocomplete="off">
                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                            
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-6">
                                            <div class="input-box">
                                                <input type="text" wire:model="subject" name="conSubject" placeholder="Subject">
                                                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                                            
                                            </div> 
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <textarea name="conMessage"  wire:model="message" placeholder="Message"></textarea>
                                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                            
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" wire:loading.attr="disabled" value="Send Message" class="immiPressBtn">
                                                <span>Send Message</span>
                                            </button>


                                          
                                            <div wire:loading wire:target="send">
                                                <img src="{{asset('loading.gif')}}" width="70" height="70" class="m-auto mt-1/4">
                                             </div>
                                            {{-- <div class="alert con_message"></div> --}}
                                            @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="conInfoWrapper" style="background-image: url(assets/images/bg/9.jpg);">
                            <h5 class="text-white">Customer Ratings</h5>
                            <div class="starRatings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <h5 class="text-white mb-5">4.8 / 5.0</h5>
                            <!-- Icon Box -->
                            <div class="iconBox05 ib0501">
                                <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                                <h3 class="ibTitle">Any Questions? Call us</h3>
                                <p>+91 980 5004 116</p>
                            </div>
                            <!-- Icon Box -->
                            <!-- Icon Box -->
                            <div class="iconBox05">
                                <div class="ibBox"><i class="flaticon-email"></i></div>
                                <h3 class="ibTitle">Any Questions? Email us</h3>
                                <p>subathu@pinegroveschool.com</p>
                            </div>
                            <!-- Icon Box -->
                            <!-- Icon Box -->
                            <div class="iconBox05">
                                <div class="ibBox"><i class="flaticon-location"></i></div>
                                <h3 class="ibTitle">Kuthar Road, Subathu 173 206</h3>
                                <p>District Solan HP, India</p>
                            </div>
                            <!-- Icon Box -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Contact Section End -->
    
        <!-- BEGIN: Contact Form Success Modal Message -->
        <div class="modal" id="message_sent" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header alert-success">
                        <h5 class="modal-title">Message Sent Successfully</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Thank you for contacting us. We will get back to you shortly.<br>Have a great day!</p>
                    </div>
                    <div class="modal-footer alert-success">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Contact Form Success Modal Message -->
    
    
        <!-- BEGIN: Contact Form Fail Modal Message -->
        <div class="modal" id="message_fail" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Oops! Something went wrong, please try again.</p>
                    </div>
                    <div class="modal-footer alert-danger">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Contact Form Fail Modal Message End -->
    
        <!-- Begin:: Google Maps -->
        <section class="mapsSection">
            <div class="">
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6841.7408470106075!2d76.97798800000001!3d30.974098!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3905635171d14131%3A0xb59e9f18c38cb75e!2sPinegrove%20School%2C%20Subathu!5e0!3m2!1sen!2sin!4v1691146748326!5m2!1sen!2sin"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
        <!-- End:: Google Maps -->
</div>
