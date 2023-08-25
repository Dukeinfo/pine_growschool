<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
        <!-- BEGIN: Popup Sidebar Widget -->
        @include('livewire.frontend.common.sidebar')
        <!-- END: Popup Sidebar Widget -->
        @include('livewire.frontend.common.news_ticker')
        <!-- END: Header Section -->
    
        <!-- BEGIN: Hero Banner Start -->
        @include('livewire.frontend.common.herobanner')

        <!-- END: Hero Banner End -->
    
        <!-- BEGIN: Section -->
        <section class="serviceSection02">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sidebar lft">
                            @livewire('frontend.common.quick-links')

                        </div>
                    </div>
                    <div class="col-lg-8">
                         <h5 class="subTitle">{{$pageData->heading ?? 'Loving Memory'}} </h5>
                        <h2 class="secTitle">{{$pageData->sub_heading ?? 'Our Founder'}}</h2>
    
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                       @if (isset($pageData->image))
                        <img src="{{ asset('storage/uploads/page/' . $pageData->image) }}"  alt="Pinegrove">
                        @else
                       <img src="assets/images/gyaniji.png" class="img-fluid rounded mb-4" alt="">
                    @endif
                               
                            </div>
                        </div> 

                    @if (isset($pageData->description))

                      {!!$pageData->description!!}

                     @else                   
    
                        <p class="h5">A Tribute to Our Founder Wg. Cdr. S. S. Gyani Ji</p>
                        <p>Born on 19th February, 1919, Wing Commander S. S. Gyani, the Founder Director of St. Soldier Divine Public Schools at Panchkula and Banur (Patiala) and Pinegrove Schools at Dharampur and Subathu left for his heavenly abode on 30th Sept 2004.</p>
    
                        <p>One is always sad and disappointed to lose ones elders no matter what the age as we humans always believe that they will always be there for us no matter their age. But when the call comes from the Almighty, one must go and we can only help in the soul's journey, with prayer.</p>
    
                        <p>On hearing the news there was a kind of stillness in the whole campus. It seemed as if every inch of the place was agonized at the loss of its creator, father and initiator. No words, no speech or consolation can fill this void. The whole place was desolate as the man who had envisioned these prestigious institutions had sailed away to unknown horizons leaving us stranded. Each one of us was shocked beyond comprehension at this irreparable loss.</p>
    
                        <p>Wg. Cdr. Gyani knew no rest and worked relentlessly to build these institutions from which many hundreds have got their livelihood and many thousands have got educated. He worked his way up to success with determination and hard work. 'By Toil he reached the Stars'. He never shied away from work and placed duty before self and even family, always and every time. Forever ready to take challenges and had a never-say-die attitude. His mind was alive while the body started giving way, about which he said:-</p>
    
                        <p class="text-center h5"><i>"Lehron se baccha, Toofan se baccha, par bach na saka kismet ka likha, Bas do chaar haath sahil se raha, himmat to rahi par dam na raha..."</i></p>
    
                        <p>These form the real epilogue to the saga of this visionary and reflect thekind of disposition of which he was formed. His grit can surely be determined by the spirit of these words before the cruel hands of death snatched him away from this world. His spirit was undaunted even whilst being relieved of worldly pain and misery through death, which may have taken him away from this earth, this nation, this town, this school but can never take him away from our hearts.</p>
    
                        <p>In the preface to his book 'Ripples in Modernism and Remedies', Lt. General Depinder Singh PVSM, AVSM (Retd.) aptly states that, “This great man had a distinguished tenure with the Indian Air Force, at some time or the other teaching or coaching most of the past and present top brass of the Force. Upon retirement he directed his enormous energy to starting Public Schools which he directed more in the mould of a parent-child relationship rather than that of a teacher-pupil. He was a man of God, devoting quite a few hours everyday to worship. Above all he was a thorough gentleman”.</p>
    
                        <p>This progressive educationist who stood for supreme ideals has left us bereaved but will continue to live eternally in our institution. This pious yet secular believer saw his last during the auspicious days of 'Shraad' and according to Hindu mythology the gates of heaven were wide open for him. We pray, may the Almighty grant him blessings and peace in eternity.</p>
                      @endif  
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
</div>
