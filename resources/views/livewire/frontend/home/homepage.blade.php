
<div>
    @push('keywords')
    <meta name="keywords" content="{{$seo_keywords ?? ''}}">
    @endpush
    <!-- END: Header Section -->
    <!-- BEGIN: Hero Slider Start -->
    <section class="heroSection04">
        <div class="heroSlider02 owl-carousel">
            @if(isset($sliders) )
            @foreach($sliders as $slider)
              @if(isset($slider->image))   
                <div class="singleSlide">
                <img src="{{ getsliderImages($slider->image ) ?? '' }}" class="img-fluid" alt="{{$slider->alt_tag}}">
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
                 @php
                 $categoryFirst = App\Models\Whyus::where('category', 'Unlocking Excellence')->where('status', 'Active')->first();
                 @endphp
                    <div class="abFact">
                    @if (isset($categoryFirst->image))
                        <img src="{{ asset('storage/uploads/whyus/' . $categoryFirst->image) }}"  alt="Pinegrove">
                        @else
                       <img src="assets/images/about.jpg" alt="Pingrove">
                    @endif
                        <div class="abContent">
                            <a href="https://pinegrove.in/assets/img/School.mp4" class="popup_video withText">
                                <i class="fa-sharp fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- About Thumb -->
                </div>

                <!-- category 1 for common page-->
                <div class="col-lg-6">
                    <!-- About Content -->
                    <div class="aboutContent02">
                        <h5 class="subTitle">{{$categoryFirst->title ?? 'Unlocking Excellence'}}</h5>
                        <h2 class="secTitle">{{$categoryFirst->sub_title ?? 'Embrace Limitless Potential at Our Premier Boarding School'}}</h2>

                        @if(isset($categoryFirst->description) )
                        
                            {!! isset($categoryFirst->description) 
                             ? 
                             str_limit($categoryFirst->description, $limit=800 )
                              : ''!!}

                        
                        @else 
                         <p>
                            Pinegrove School, established in 1991, is a co-educational, purely residential, English medium boarding school affiliated to the Central Board of Secondary Education (CBSE), Delhi, upto Class 12th. Pinegrove is a proud member of the prestigious Indian Public Schools' Conference (IPSC), Global Member of the Round Square, member of the NPSC, NCC, AFS, and is accredited with ISO 9001:2015 (BSI) certification. The school is also a member of the IAYP
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

                         @endif  
                      
                       
                        <a class="immiPressBtn" href="{{$categoryFirst->link ?? 'javascript:void()'}}" target="_blank"><span>Discover More</span></a>
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
                @if(isset($boardmembers) && count($boardmembers)>0  )
                @foreach($boardmembers as $boardmember)
                <div class="col-lg-4 col-sm-6">
                    <div class="blogItem02 text-end">
                        <div class="blogThumb">
                            <img src="{{getboardmembers($boardmember->image)}}" alt="Pingrove">
                            <div class="pDate"><span>{{ \Carbon\Carbon::parse($boardmember->dated)->format('d') ?? '' }}
                            </span>  {{ \Carbon\Carbon::parse($boardmember->dated)->format('M') ?? ''}} </div>
                            <span></span>
                           
                        </div>
                        <div class="blogContent text-start">
                            <h3><a href="javascript:void();">
                                
                                {{Str::limit($boardmember->heading, 50) ?? ''}}
                            </a>
                            </h3>
                            <p>{!!Str::limit($boardmember->description, 220) ?? ''!!}
                            </p>
                        </div>
                        <a class="immiPressBtn" href="{{$boardmember->link ?? '#'}}" target="_blank">
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
                @endforeach
                @else
                <center><h4>No Record Found</h4>
                @endif
            </div>
        </div>
    </section>
    <!-- END: News Section End -->
    <section class="serviceSection04 pt-0">
        <div class="container">
            @php
            $ourTopper =   App\Models\OurTopper::where('status','Active')->orderBy('percentage' ,'DESC')->get();	 
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
                                        <img src="{{isset($student->image) ? getTopperImages($student->image) : asset('no_image.jpg')}}" class="img-fluid rounded" alt="">
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
                                        <img src="{{isset($student->image) ? getTopperImages($student->image) : asset('no_image.jpg')}}" class="img-fluid rounded" alt="">
                                         
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
                @if(isset($knowledgeHome))
                @foreach($knowledgeHome as $knowldge)
                <div class="col-lg-3 col-sm-6">
                    <div class="serviceItem02 si04 text-center">   
                        <div class="serviceWrapper">
                            <div class="serIcon"><i class="{{$knowldge->logo ?? ''}}"></i></div>
                            <h3><a href="javascript:void()">{{$knowldge->title ?? ""}}</a></h3>
                            <p>

                                {!!Str::limit($knowldge->description, 200) ?? ''!!}
                            </p>
                            <a class="immiPressBtn" href="{{$knowldge->link ?? ''}}" target="_blank"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
         
            </div>
        </div>
    </section>
    <!-- END: Service Section End -->


 @php
  $categorySecond = App\Models\Whyus::where('category', 'Where Excellence Meets Education')->where('status', 'Active')->first();
 @endphp
    <section class="aboutSection02 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="aboutContent02">
                        <h5 class="subTitle">
                         {{$categorySecond->title ?? 'Where Excellence Meets Education'}}</h5>
                        <h2 class="secTitle">
                        {{$categorySecond->sub_title ?? 'A Home Away from Home'}}</h2>

                        @if(isset($categorySecond->description) )
                        
                        {!!Str::limit($categorySecond->description, 8000) ?? ''!!}    
                        
                        @else 
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


                      @endif  
                        
                          <a class="immiPressBtn" href="{{$categorySecond->link ?? 'javascript:void()'}}" target="_blank"><span>Discover More</span></a>
                    </div>
                </div>


                <!-- slider first for category second -->
                @if(isset($categorySecond->id))
                @php
                 $secondSeoSlider = App\Models\MultipleImages::where('whyus_id', $categorySecond->id)->where('status', 'Active')->get();
                 @endphp
                    <div class="col-lg-5 offset-lg-1">
                        <div id="pineCarousel" class="carousel slide" data-bs-ride="carousel"> <!-- Changed data-bs-ride value to "carousel" -->
                            <div class="carousel-indicators">
                                @if(isset($secondSeoSlider))
                                    @foreach($secondSeoSlider as $key => $multiple)
                                        <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="{{ $key }}" @if($key === 0) class="active" aria-current="true" @endif aria-label="Slide {{ $key + 1 }}"></button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="carousel-inner">
                                @if(isset($secondSeoSlider))
                                    @foreach($secondSeoSlider as $key => $multiple)
                                        <div class="carousel-item @if($key === 0) active @endif">
                                            <img src="{{ isset($multiple->multi_images) ? getmultiple_images($multiple->multi_images) : asset('assets/images/f14.jpg') }}" class="d-block w-100 img-thumbnail" alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#pineCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#pineCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                 @endif
            </div>
        </div>
        <div class="bg-corner corner-position"></div>
    </section>
   
    

    @php
    $categoryThird = App\Models\Whyus::where('category', 'International Exchange Programs')->where('status', 'Active')->first();
    @endphp

    <section class="aboutSection02 position-relative">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-lg-5">
                    <div id="pineCarousel1" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#pineCarousel1" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                  
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/f16.jpg" class="d-block w-100 img-thumbnail" alt="">
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
                </div> --}}

<!-- slide second for category third -->
@if(isset($categoryThird->id))
@php
$homeSlidersec2 = App\Models\MultipleImages::where('whyus_id', $categoryThird->id)->where('status', 'Active')->get();
@endphp
                <div class="col-lg-5">
                    <div id="pineCarousel1" class="carousel slide" data-bs-ride="carousel"> <!-- Changed data-bs-ride value to "carousel" -->
                        <div class="carousel-indicators">
                            @if(isset($homeSlidersec2))
                                @foreach($homeSlidersec2 as $key => $multiple)
                                    <button type="button" data-bs-target="#pineCarousel1" data-bs-slide-to="{{ $key }}" @if($key === 0) class="active" aria-current="true" @endif aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            @endif
                        </div>
                        <div class="carousel-inner">
                            @if(isset($homeSlidersec2))
                                @foreach($homeSlidersec2 as $key => $multiple)
                                    <div class="carousel-item @if($key === 0) active @endif">
                                        <img src="{{ isset($multiple->multi_images) ? getmultiple_images($multiple->multi_images) : asset('assets/images/f16.jpg') }}" class="d-block w-100 img-thumbnail" alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#pineCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#pineCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
 @endif               
          
                <div class="col-lg-6 offset-lg-1">
                    <div class="aboutContent02">
                        <h5 class="subTitle">{{$categoryThird->title ?? 'International Exchange Programs'}}</h5>
                        <h2 class="secTitle">
                        {{$categoryThird->title ?? 'International Outlook'}}</h2>
                        @if(isset($categoryThird->description) )
                    
                            {!!Str::limit($categoryThird->description, 800) ?? ''!!}    
                        @else 
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

                      @endif

                       <a class="immiPressBtn" href="{{$categoryThird->link ?? 'javascript:void()'}}" target="_blank"><span>Discover More</span></a>
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

               @if(isset($getCoachings) && count($getCoachings)>0  )
                        @foreach($getCoachings as $coaching)  
                <div class="col-lg-4 col-sm-6">
                    <!-- Coaching Item -->
                    <div class="coachingItem02 ci04 text-end">
                        <div class="coachingThumb">
                            <img src="{{getCoaching($coaching->image)}}" alt="Pingrove">
                        </div>
                 {{ $coaching->title  ?? 'Academic Facilities' }}       
                        <div class="coachingContent text-start">
                            <h3><a href="javascript:void()">Academic Facilities</a></h3>
                 @if(isset($coaching->description) )
                        {!!$coaching->description ?str_limit($coaching->description, $limit=150 ) : '' !!}
                        @else            
                            <p>The classrooms are very modern, large and airy with proper lighting and provide the most
                                conducive atmosphere for learning.
                            </p>

                  @endif            
                        </div>
                        <a class="immiPressBtn" href="{{$coaching->link ?? '#'}}"><span>View Details</span></a>
                    </div>
                    <!-- Coaching Item -->
                </div>
          @endforeach
          @else
          <center><h4>No Record Found</h4>

          @endif     
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
                        @forelse ($getfacilities as $getfacility)
  
                        <div class="countryItem02 text-center">
                            <div class="countryThumb">
                                <img src="{{getfacility($getfacility->image)}}" alt="Pingrove">
                            </div>
                            <div class="countryContent">
                                <h3><a href="javascript:void()">{{ $getfacility->title  ?? 'Courses of Study' }}</a></h3>
                                @if($getfacility->description)
        
                               {!!$getfacility->description ?str_limit($getfacility->description, $limit=150 ) : '' !!}

                                @else
                                <p>
                                    Courses of study as laid down by the NCERT and the syllabi framed by the Central
                                    Board of Secondary Education (CBSE), of the Government of India, Delhi are strictly
                                    adhered to and followed.
                                </p>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p>No facility</p>
                    @endforelse
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
                        @if(isset($testimonials))
                        @foreach($testimonials as $teat)
                        <div class="testimonilaItem01">
                            <div class="tsAuthor">
                                <img src="{{gettestimonia($teat->photo)}}" alt="Pingrove">
                                <h5 class="tsNM">{{$teat->name ?? ""}}</h5>
                                <span class="tsDesign"> {{$teat->position ?? ""}}</span>
                            </div>
                            <div class="qutation">
                           
                           {!!Str::limit($teat->description, 1000) ?? ''!!} 
                            </div>
                        </div>
                        
                        @endforeach
                        @else
                        @endif
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