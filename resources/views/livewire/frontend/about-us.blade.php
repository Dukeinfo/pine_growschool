<div>
        <!-- BEGIN: Popup Sidebar Widget -->
@include('livewire.frontend.common.sidebar')
        <!-- END: Popup Sidebar Widget -->
@include('livewire.frontend.common.news_ticker')
        <!-- END: Header Section -->
    
        <!-- BEGIN: Hero Banner Start -->
        <section class="pageBanner" style="background-image: url({{asset('assets/images/bg/school-bg.jpg')}});">

            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="bannerTitle">About Us</h2>
                        <div class="breadcrumbs">
                            <a href="index.html">Home</a>
                            <span>/</span>
                            <a href="javascript:void()">About Us</a>
                            <span>/</span>
                            About School
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
                                    <li><a href="javascript:void()" class="active">About School</a></li>
                                    <li><a href="javascript:void()">Location</a></li>
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
                        <h5 class="subTitle">{{$pageData->heading ?? 'Who We Are?'}} </h5>
                        <h2 class="secTitle">{{$pageData->sub_heading ?? 'About School'}}</h2>

                    @if (isset($pageData->image))
                        <img src="{{ asset('storage/uploads/page/' . $pageData->image) }}"  alt="Pinegrove">
                        @else
                       <img src="{{asset('assets/images/pinegrove-subathu.jpg')}}" class="img-fluid rounded mb-4" alt="">
                    @endif
    
                   @if (isset($pageData->description))

                         {!!$pageData->description!!}
                   @else
    
                        <p>Pinegrove School Subathu established in 1998, is a co-educational, purely residential, English medium boarding school affiliated to the Central Board of Secondary Education (CBSE), Delhi, from Class 6th up to Class 12th.</p>
                       <p>Pinegrove is a prominent member of the IPSC (Indian Public Schools' Conference), the Round Square (UK), BSAI (Boarding Schools' Association of India), the BSA (UK), IAYP (International Awards for Young People) AFS (American Field Ambulance), NPSC (National Progressive Schools' Conference) and was awarded the International School Awards (ISA) from the British Council. The school encompasses NCC (National Cadet Corps), Nurtured Heart Approach (NHA) and holds the prestigious ISO 9001:2015 certification (BSI).</p>
                       <p>Nestled amidst the forest and woodlands in the verdant foothills of Shivalik hills with snowcapped Himalayas to the north and rolling plains to the south, the school is situated at a height of about 3300 feet in exotic valley of erstwhile Kuthar State on the Subathu-Kuthar-Kasauli- State Highway along the banks of a perennial stream. The gentle gurgling brook with cascading waters, babbles through the campus thus heightening the serenity of the campus.</p>
                       <p>The mystic ambience of the location is congenial for spiritual and academic nurturing of young souls. The divine beams pierce through the misty dawn of the school's pristine and salubrious environs thereby illuminating the winding paths, the sharp and refreshing fragrance of the flora fills every infinitesimal part of the campus with boundless energy, cool breeze rustles through the foliage and   orchestrate the Grovian symphony while the avian species offer their rendition of veritable chirruping, as an accompaniment. The musical notes resonate in every nook and corner of the Pinegrove School's 5.81 acres campus and the sheer joie-devivre leaves you asking for more.</p>
                       <p>The School admits both boys and girls, from all religions, castes, creeds, race or colour, without any distinction and has pupils from all over India and abroad. Pinegrove makes an endeavour to inculcate a spirit of secularism in the students, with no emphasis on any one religion and yet with deep respect for all religions.</p>

                     @endif  
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
</div>
