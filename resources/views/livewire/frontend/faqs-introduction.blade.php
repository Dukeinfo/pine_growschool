<div>
    {{-- Success is as dangerous as failure. --}}
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
                        {{-- <h5 class="subTitle">How can we help you?</h5> --}}
                        <h2 class="secTitle">{{$faqCatName ?? ''}}</h2>
    
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div id="accordion-holder" class="tmjAccordion accordion">
                                    @forelse ($faqpageData as $key => $faqdata )
                                        
                                 
                                    <div class="card ">
                                        <div class="faqInner">
                                            <div class="card-header" id="heading834{{$faqdata->id}}">
                                                <h5 class="title" data-bs-toggle="collapse" data-bs-target="#tab{{$faqdata->id}}" aria-expanded="false" aria-controls="tab1{{$faqdata->id}}">
                                                 {!!$faqdata->question   ?? ''!!} ?
                                                    <svg fill="#233152" width="22" height="12" viewBox="0 0 22 12" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.0001 11.6246C10.7603 11.6246 10.5203 11.5329 10.3372 11.3499L0.962246 1.97488C0.595918 1.60855 0.595918 1.01535 0.962246 0.649258C1.32857 0.283164 1.92178 0.28293 2.28787 0.649258L11.0001 9.36145L19.7122 0.649258C20.0786 0.28293 20.6718 0.28293 21.0379 0.649258C21.404 1.01559 21.4042 1.60879 21.0379 1.97488L11.6629 11.3499C11.4798 11.5329 11.2398 11.6246 11.0001 11.6246Z"/>
                                                    </svg>
                                                </h5>
                                            </div>
                                            <div id="tab{{$faqdata->id}}" class="collapse " aria-labelledby="heading834{{$faqdata->id}}" data-bs-parent="#accordion-holder">
                                                <div class="card-body">
                                                    {!!$faqdata->answer   ?? ''!!} ?

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                                    <p class="text-center">  Data not found</p>
                                    @endforelse
                                    {{-- <div class="card">
                                        <div class="faqInner">
                                            <div class="card-header" id="heading833">
                                                <h5 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#tab2" aria-expanded="false" aria-controls="tab2">
                                                    What is the size of your school and the number of pupils?
                                                    <svg fill="#233152" width="22" height="12" viewBox="0 0 22 12" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.0001 11.6246C10.7603 11.6246 10.5203 11.5329 10.3372 11.3499L0.962246 1.97488C0.595918 1.60855 0.595918 1.01535 0.962246 0.649258C1.32857 0.283164 1.92178 0.28293 2.28787 0.649258L11.0001 9.36145L19.7122 0.649258C20.0786 0.28293 20.6718 0.28293 21.0379 0.649258C21.404 1.01559 21.4042 1.60879 21.0379 1.97488L11.6629 11.3499C11.4798 11.5329 11.2398 11.6246 11.0001 11.6246Z"/>
                                                    </svg>
                                                </h5>
                                            </div>
                                            <div id="tab2" class="collapse" aria-labelledby="heading833" data-bs-parent="#accordion-holder">
                                                <div class="card-body">
                                                    The Subathu Campus of Pinegrove School has about 350 resident pupils approximately. The campus is fully-residential school.
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                        
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
</div>
