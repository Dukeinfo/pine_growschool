
<div>

    <!-- END: Header Section -->
    <!-- BEGIN: Hero Slider Start -->
    <section class="heroSection04">
        <div class="heroSlider02 owl-carousel">
            @if(isset($sliders) )
            @foreach($sliders as $slider)
              @if(isset($slider->image))
                <div class="singleSlide">
                <img src="{{ asset('storage/uploads/slider').'/'.$slider->image }}" class="img-fluid" alt="">
                </div>
            @endif
            @endforeach
            @endif
        </div>
        <!-- Nav Item  -->
        <a href="javascript:void(0);" class="prevArrow">
            <svg fill="#CFCFCF" width="38" height="71" viewBox="0 0 38 71" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.931278 35.1077L35.3173 1.35766C36.4783 0.23872 38.2389 1.97211 37.0689 3.14241C37.069 3.14233 3.5918 36 3.5918 36L37.069 68.8577C37.5615 69.3417 37.5688 70.1327 37.0854 70.6258C36.6012 71.1183 35.81 71.1254 35.3173 70.6423L0.931278 36.8923C0.438141 36.4251 0.435478 35.575 0.931278 35.1077Z" />
            </svg>
        </a>
        <a href="javascript:void(0);" class="nextArrow">
            <svg fill="#CFCFCF" width="38" height="71" viewBox="0 0 38 71" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M37.0687 35.1077L2.68274 1.35766C1.52175 0.23872 -0.238938 1.97211 0.9311 3.14241C0.931025 3.14233 34.4082 36 34.4082 36L0.931026 68.8577C0.438476 69.3417 0.431151 70.1327 0.914551 70.6258C1.39884 71.1183 2.18999 71.1254 2.68274 70.6423L37.0687 36.8923C37.5619 36.4251 37.5645 35.575 37.0687 35.1077Z" />
            </svg>
        </a>
        <!-- Nav Item  -->
    </section>
    <!-- END: Hero Slider End -->
    <!-- BEGIN: About Section Start -->
    <section class="aboutSection03 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- About Thumb -->
                    <div class="abFact">
                        <img src="assets/images/about.jpg" alt="Pingrove">
                        <div class="abContent">
                            <a href="https://pinegrove.in/assets/img/School.mp4" class="popup_video withText">
                                <i class="fa-sharp fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- About Thumb -->
                </div>
                <div class="col-lg-6">
                    <!-- About Content -->
                    <div class="aboutContent02">
                        <h5 class="subTitle">Unlocking Excellence</h5>
                        <h2 class="secTitle">Embrace Limitless Potential at Our Premier Boarding School</h2>
                        <p>
                            Pinegrove School, established in 1991, is a co-educational, purely residential, English
                            medium boarding school affiliated to the Central Board of Secondary Education (CBSE), Delhi,
                            upto Class 12th. Pinegrove is a proud member of the prestigious Indian Public Schools'
                            Conference (IPSC), Global Member of the Round Square, member of the NPSC, NCC, AFS, and is
                            accredited with ISO 9001:2015 (BSI) certification. The school is also a member of the IAYP
                        </p>
                        <div class="row">
                            <div class="col-xl-12 col-sm-6">
                                <div class="iconBox02">
                                    <h3 class="ibTitle">High standards in value education</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Safety and Discipline</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Highest standards of academic and sporting excellence</h3>
                                </div>
                            </div>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();"><span>Discover More</span></a>
                    </div>
                    <!-- About Content -->
                </div>
            </div>
        </div>
        <div class="bg-corner corner-position"></div>
        <div class="background-text-wrapper">
            <div class="bg-custom-header-text">
                Why Us?
            </div>
        </div>
    </section>
    <!-- END: About Section End -->
    <!-- BEGIN: News Section Start -->
    <section class="blogSction02">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5 class="subTitle">Stay up to Date</h5>
                    <h2 class="secTitle">Pinegrove News & Events</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="blogItem02 text-end">
                        <div class="blogThumb">
                            <img src="assets/images/news/news1.jpg" alt="Pingrove">
                            <div class="pDate"><span>21</span> Jul</div>
                        </div>
                        <div class="blogContent text-start">
                            <h3><a href="javascript:void();">The Teak House Show, titled 'Swaranjali - A Musical
                                    Tribute</a>
                            </h3>
                            <p>The Teak House Show, titled 'Swaranjali - A Musical Tribute,' held at Pinegrove School,
                                Subathu, mesmerized the audience with its fabulous display of talent and diligence. The
                                skilled performances of the Teakians...
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();">
                            <span>
                                Read More
                                <svg fill="#E94D4E" width="12" height="10" viewBox="0 0 12 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 5.71429V4.28571H9L6 1.42857L6.75 0L12 5L6.75 10L6 8.57143L9 5.71429H0Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogItem02 text-end">
                        <div class="blogThumb">
                            <img src="assets/images/news/news2.jpg" alt="Pingrove">
                            <div class="pDate"><span>15</span> Jul</div>
                        </div>
                        <div class="blogContent text-start">
                            <h3><a href="javascript:void();">Inter House MUN Competition, held at Pinegrove School</a>
                            </h3>
                            <p>The three-day Inter House MUN Competition, held at Pinegrove School, Subathu, concluded
                                successfully on July 15th, 2023, after intense brainstorming sessions. The competition
                                witnessed eight delegates from each...
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();">
                            <span>
                                Read More
                                <svg fill="#E94D4E" width="12" height="10" viewBox="0 0 12 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 5.71429V4.28571H9L6 1.42857L6.75 0L12 5L6.75 10L6 8.57143L9 5.71429H0Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="blogItem02 text-end">
                        <div class="blogThumb">
                            <img src="assets/images/news/news3.jpg" alt="Pingrove">
                            <div class="pDate"><span>03</span> Jul</div>
                        </div>
                        <div class="blogContent text-start">
                            <h3><a href="javascript:void();">International Plastic Bag Free Day</a></h3>
                            <p>Pinegrove School, Subathu actively participated in observing International Plastic Bag
                                Free Day to increase awareness about the detrimental impact of plastic on the
                                environment. During the morning assembly...
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();">
                            <span>
                                Read More
                                <svg fill="#E94D4E" width="12" height="10" viewBox="0 0 12 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 5.71429V4.28571H9L6 1.42857L6.75 0L12 5L6.75 10L6 8.57143L9 5.71429H0Z" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: News Section End -->
    <section class="serviceSection04 pt-0">
        <div class="container">
            @php
            $ourTopper =   App\Models\OurTopper::where('status','Active')->get();	 
           @endphp
               @if(isset( $ourTopper))
            <div class="row">
              
       
                <div class="col-lg-6"> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5 class="subTitle">Our Gems</h5>
                            <h2 class="secTitle">Meet Our Toppers</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        
                            <div class="serviceSlider owl-carousel">
                            
                                @foreach($ourTopper as $student )
                                @if($student->category  == 'Topper')
                                <div class="serviceItem02 text-center">
                                    <div class="serviceWrapper p-4">
                                        <p class="h5 mb-2">{{$student->name ?? ''}}</p>
                                        <img src="{{getTopperImages($student->image)}}" class="img-fluid rounded" alt="">
                                        <p class="mb-1 mt-3 h6">Class {{$student->class ?? ''}}</p>
                                        <p class="mb-0">{{$student->percentage ?? ''}}</p>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                             
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5 class="subTitle">Today's Birthday</h5>
                            <h2 class="secTitle">Birthday Celebration</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="serviceSlider owl-carousel">
                            

                                @foreach($ourTopper as $student )
                                @if($student->category  == 'Birthday')
                                <div class="serviceItem02 text-center">
                                    <div class="serviceWrapper p-4">
                                        <p class="h5 mb-2">{{$student->name ?? ''}}</p>
                                        <img src="{{getTopperImages($student->image)}}" class="img-fluid rounded" alt="">
                                        <p class="mb-1 mt-3 h6">Class {{$student->class ?? ''}}</p>
                                    
                                        <p class="mb-0">&nbsp;</p>
                                    </div>
                                </div>
                             @endif
                            @endforeach
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- BEGIN: Service Section Start -->
    <section class="serviceSection04 pt-0" style="background-image: url(assets/images/bg/8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5 class="subTitle">Discover the Perfect Blend</h5>
                    <h2 class="secTitle">Where Knowledge Meets Home</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="serviceItem02 si04 text-center">
                        <div class="serviceWrapper">
                            <div class="serIcon"><i class="flaticon-open-book"></i></div>
                            <h3><a href="javascript:void()">Academics</a></h3>
                            <p>Great emphasis is laid on Academics as this is one of the important prerequisites for a
                                successful future for the students.
                            </p>
                            <a class="immiPressBtn" href="javascript:void()"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="serviceItem02 si04 text-center">
                        <div class="serviceWrapper">
                            <div class="serIcon"><i class="flaticon-graduating-student"></i></div>
                            <h3><a href="javascript:void()">Co-curriculars</a></h3>
                            <p>Combined with Academics and Sports, Co-curricular activities at Pinegrove help in making
                                a well-rounded individual.
                            </p>
                            <a class="immiPressBtn" href="javascript:void()"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="serviceItem02 si04 text-center">
                        <div class="serviceWrapper">
                            <div class="serIcon"><i class="flaticon-targeting"></i></div>
                            <h3><a href="javascript:void()">Games & Sports</a></h3>
                            <p>Harnessing the Power of Sports: Fostering Leadership, Integrity, Hard Work and Teamwork
                                through Physical Fitness.
                            </p>
                            <a class="immiPressBtn" href="javascript:void()"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="serviceItem02 si04 text-center">
                        <div class="serviceWrapper">
                            <div class="serIcon"><i class="flaticon-online-registration"></i></div>
                            <h3><a href="javascript:void()">How to Apply</a></h3>
                            <p>The admission procedure starts with Registration of the child for admission. Registration
                                is normally open throughout the year.
                            </p>
                            <a class="immiPressBtn" href="javascript:void()"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Service Section End -->
    <section class="aboutSection02 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="aboutContent02">
                        <h5 class="subTitle">Where Excellence Meets Education</h5>
                        <h2 class="secTitle">A Home Away from Home</h2>
                        <p>
                            Pinegrove is very conscious of the quality of its finished product "The Child". The
                            resultant fruit of an all-round nicely developed and well-balanced personality is harvested
                            by the school after long, onerous, time consuming and tedious hours of labour put in by a
                            competent team of trained, zealous and devoted teachers.
                        </p>
                        <div class="row">
                            <div class="col-xl-12 col-sm-6">
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Immersive and Focused Learning Environment</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Wide Range of Extracurricular Activities</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Well-Equipped Classrooms with Modern Technology</h3>
                                </div>
                            </div>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();"><span>Discover More</span></a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div id="pineCarousel" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/f2.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/f10.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/f12.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#pineCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#pineCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-corner corner-position"></div>
    </section>
    <section class="aboutSection02 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div id="pineCarousel1" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#pineCarousel1" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#pineCarousel1" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#pineCarousel1" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/f16.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/f15.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/f14.jpg" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#pineCarousel1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#pineCarousel1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="aboutContent02">
                        <h5 class="subTitle">International Exchange Programs</h5>
                        <h2 class="secTitle">International Outlook</h2>
                        <p>
                            To provide our students with a global outlook, we offer annual International Exchange
                            Programs and Projects in various countries including Australia, South Africa, Germany,
                            France, the USA, and the UK. Through these experiences, our students gain valuable
                            international perspectives that broaden their horizons and enhance their educational
                            journey.
                        </p>
                        <div class="row">
                            <div class="col-xl-12 col-sm-6">
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Learn to navigate cross-cultural interactions</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Enhances language skills and boosts fluency</h3>
                                </div>
                                <div class="iconBox02">
                                    <h3 class="ibTitle">Facilitate the creation of international networks of friends
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <a class="immiPressBtn" href="javascript:void();"><span>Discover More</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bgsketch">
            <img src="assets/images/bg-sketch.png" class="" alt="">
        </div>
    </section>
    <!-- BEGIN: Coaching Section Start -->
    <section class="coachingSction04" style="background-image: url(assets/images/bg/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5 class="subTitle">The Best You Deserve</h5>
                    <h2 class="secTitle">Get the Best Education<br> You Deserve</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <!-- Coaching Item -->
                    <div class="coachingItem02 ci04 text-end">
                        <div class="coachingThumb">
                            <img src="assets/images/f110.jpg" alt="Pingrove">
                        </div>
                        <div class="coachingContent text-start">
                            <h3><a href="javascript:void()">Academic Facilities</a></h3>
                            <p>The classrooms are very modern, large and airy with proper lighting and provide the most
                                conducive atmosphere for learning.
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void()"><span>View Details</span></a>
                    </div>
                    <!-- Coaching Item -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Coaching Item -->
                    <div class="coachingItem02 ci04 text-end">
                        <div class="coachingThumb">
                            <img src="assets/images/f10.jpg" alt="Pingrove">
                        </div>
                        <div class="coachingContent text-start">
                            <h3><a href="javascript:void()">Boarding Life</a></h3>
                            <p>All requisite infrastructures are available in Pinegrove School, to provide the children
                                with facilities needed for quality education.
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void()"><span>View Details</span></a>
                    </div>
                    <!-- Coaching Item -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Coaching Item -->
                    <div class="coachingItem02 ci04 text-end">
                        <div class="coachingThumb">
                            <img src="assets/images/games.jpg" alt="Pingrove">
                        </div>
                        <div class="coachingContent text-start">
                            <h3><a href="javascript:void()">Games & Sports</a></h3>
                            <p>At Pinegrove we offer an environment that gives every child an opportunity to discover
                                his talents and explore them.
                            </p>
                        </div>
                        <a class="immiPressBtn" href="javascript:void()"><span>View Details</span></a>
                    </div>
                    <!-- Coaching Item -->
                </div>
            </div>
        </div>
    </section>
    <!-- END: Coaching Section End -->
    <!-- BEGIN: Call To Action Start -->
    <!-- <section class="CTASection02" style="background-image: url(assets/images/bg/bg1.jpg);">
			<div class="container">
			<div class="row">
			<div class="col-xl-7 col-sm-7">
			<h2 class="secTitle">Highest standards of academic and sporting excellence</h2>
			</div>
			<div class="col-xl-5 col-sm-5 text-end">
			<a class="immiPressBtn" href="javascript:void()"><span>Contact Us</span></a>
			</div>
			</div>
			</div>
			</section> -->
    <!-- END: Call To Action End -->
    <section class="countrySection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="subTitle">Facilities We Provide</h5>
                    <h2 class="secTitle">Preparing Children for a<br>Dynamic Future</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="countrySlider owl-carousel">
                        <div class="countryItem02 text-center">
                            <div class="countryThumb">
                                <img src="assets/images/facilities/fac1.jpg" alt="Pingrove">
                            </div>
                            <div class="countryContent">
                                <h3><a href="javascript:void()">Courses of Study</a></h3>
                                <p>Courses of study as laid down by the NCERT and the syllabi framed by the Central
                                    Board of Secondary Education (CBSE), of the Government of India, Delhi are strictly
                                    adhered to and followed.
                                </p>
                            </div>
                        </div>
                        <div class="countryItem02 text-center">
                            <div class="countryThumb">
                                <img src="assets/images/facilities/fac3.jpg" alt="Pingrove">
                            </div>
                            <div class="countryContent">
                                <h3><a href="javascript:void()">Computer Education</a></h3>
                                <p>The aim of computer education in the school is to get the children acquainted with
                                    the latest in computer technology and to assist in removing their introversion of
                                    the machines.
                                </p>
                            </div>
                        </div>
                        <div class="countryItem02 text-center">
                            <div class="countryThumb">
                                <img src="assets/images/facilities/fac4.jpg" alt="Pingrove">
                            </div>
                            <div class="countryContent">
                                <h3><a href="javascript:void()">Library</a></h3>
                                <p>The library is very effective for broadening the horizons of the children and keeps
                                    them entertained, educated and well informed. It helps in Cultivating the Love for
                                    Reading.
                                </p>
                            </div>
                        </div>
                        <div class="countryItem02 text-center">
                            <div class="countryThumb">
                                <img src="assets/images/facilities/fac5.jpg" alt="Pingrove">
                            </div>
                            <div class="countryContent">
                                <h3><a href="javascript:void()">Laboratories</a></h3>
                                <p>Modern and well-equipped science labs have the requisite essential equipment for
                                    conducting practicals for Physics, Chemistry and Biology as per the new curriculam,
                                    laid down by the CBSE.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-text-wrapper">
                <div class="bg-custom-header-text">
                    Facilities
                </div>
            </div>
        </div>
    </section>
    <!-- BEGIN: Testimonial Section Start -->
    <section class="testimonialSection01" style="background-image: url(assets/images/bg/school-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonialSlider01 owl-carousel">
                        
                        <div class="testimonilaItem01">
                            <div class="tsAuthor">
                                <img src="assets/images/testimonial/t1.jpg" alt="Pingrove">
                                <h5 class="tsNM">Colonel Rahul Mishra</h5>
                                <span class="tsDesign">Father of Palak Mishra</span>
                            </div>
                            <div class="qutation">
                                My daughter Palak Mishra has been a student in the school for last 03 yrs. I am so very
                                satisfied to see her have an all round development. This transformation is singularly
                                accredited to the School faculty, teachers, the curriculum and seamless implementation
                                of laid down protocols. Annual Function 2022 was a live example of the exemplary
                                standards maintained by the school. Kudos and all the very best for all your future
                                endeavors.
                            </div>
                        </div>
                        
                        
                        <div class="testimonilaItem01">
                            <div class="tsAuthor">
                                <img src="assets/images/testimonial/t2.jpg" alt="Pingrove">
                                <h5 class="tsNM">Shamsher Chauhan</h5>
                                <span class="tsDesign">&nbsp;</span>
                            </div>
                            <div class="qutation">
                                Excellent residential School, nestled in the lap of nature, with state of art
                                Infrastructure. Carefully designed school curriculum ensures all round growth of the
                                students. Faculty as well as the admin team is highly qualified and professional. The
                                school functions with clockwork precision. My daughter studied here for seven years and
                                today the transformation that I see in her is remarkable. Sending my daughter to this
                                coveted and prestigious institution of the country was the best decision of my life. My
                                sincere thanks to team Pinegrove for all their hard work and contribution.
                            </div>
                        </div>
                        
                        
                        <div class="testimonilaItem01">
                            <div class="tsAuthor">
                                <img src="assets/images/testimonial/t3.jpg" alt="Pingrove">
                                <h5 class="tsNM">Japsahib Singh Ahuja</h5>
                                <span class="tsDesign">&nbsp;</span>
                            </div>
                            <div class="qutation">
                                Passing out from a prestigious school like Pinegrove after studying there for 10 years
                                was my life's best decision taken by my parents. I can fully claim that all the success
                                I have achieved or would achieve in my life, would be majorly be attributed to my school
                                and my parents for their bold decision of sending me to Pinegrove. Pinegrove's faculty
                                has never been like teachers to me and rather have always treated me as a part of their
                                family. Even today the teacher's here welcome me in a very homely manner and that is
                                what makes Pinegrove my second home. God Bless Pinegrove.
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Testimonial Section End -->

    <section class="blogSction02">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 text-center mx-auto">
                    <h5 class="subTitle">Schol Accreditation</h5>
                    <h2 class="secTitle">Affiliations, Associations & Memberships</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme">
                 
                        @if(isset($memberships) )
                        @foreach($memberships as $membership)
                          @if(isset($membership->logo))
                            <div class="item">
                            <a href="#"><img src="{{ asset('storage/uploads/membership').'/'.$membership->logo }}" class="border" alt=""></a>
                            </div>
                        @endif
                        @endforeach
                        @endif

                     
         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>