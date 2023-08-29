<div>
    {{-- In work, do what you enjoy. --}}
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
                        <h5 class="subTitle">School Staff</h5>
                        <h2 class="secTitle">Our Faculties</h2>
    
                        <div class="row">

                            @if(isset($getStaffList))
                            @foreach($getStaffList as $getStaff )
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Team Item -->
                                <div class="teamItem01">
                                    <div class="teamThumb">
                                        <img src="{{isset($getStaff->image) ? 
                                         getOurStaff($getStaff->image): 
                                         asset('assets/images/staff/92.jpg')}}" alt="{{$getStaff->name ?? '...'}}" > 
                                        
                                    </div>
                                    <div class="teamContent">
                                        <h3><a href="javascript:void()" data-bs-toggle="modal"
                                             data-bs-target="#staffDetail{{$getStaff->id}}">
                                             {{ ucwords($getStaff->name) ?? ''}}</a></h3>
                                        <h5 class="designation">
                                            {{ ucwords($getStaff->designation) ?? ''}}
                                        </h5>
                                    </div>
                                </div>
                                <!-- Team Item -->
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staffDetail{{$getStaff->id}}" tabindex="-1" aria-labelledby="staffDetailLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staffDetailLabel">{{ ucwords($getStaff->name) ?? ''}} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{!! $getStaff->description!!}.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p class="text-center"> No staff data found</p>  
                            @endif
                        </div>
    
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
</div>
