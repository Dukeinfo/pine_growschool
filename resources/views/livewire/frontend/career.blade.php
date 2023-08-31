<div>
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
                    <h5 class="subTitle">Career with Us</h5>
                    <h2 class="secTitle">Jobs at Pinegrove</h2>
                    <form action="" wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="widgetTitle text-dark fs-5 mb-3">Required Details</h3>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Application Date</label>
                                            <input type="date" class="form-control" wire:model="application_date" />
                                            @error('application_date') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Date of Birth</label>
                                            <input type="date" class="form-control" wire:model="date_of_birth" />
                                            @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Post Group</label>
                                            <select name="" id="" class="form-select" wire:model="post_group">                                         
                                                    <option value="">Select</option>
                                                    <option value="Head">Head</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Coach">Coach</option>
                                                    <option value="Other Staff">Other Staff</option>
                                            
                                            </select>
                                            @error('post_group') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Post Name</label>
                                            <input type="text" class="form-control" wire:model="post_name" placeholder="Post Name" />
                                            @error('post_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Can Teach</label>
                                            <select name="" id="" class="form-select"  wire:model="can_teach"  >
                                                    <option value="">Select</option>
                                                    @if( isset($getSubjects))
                                                        @forelse($getSubjects as $subject)
                                                            <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                        @empty
                                                            <option value="">Not Found</option>
                                                        @endforelse
                                                    @endif
                                            </select>
                                            @error('can_teach') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Upto Class</label>
                                            <select name="" id="" class="form-select" wire:model="upto_class" >
                                                <option value="">Select</option>
                                            
                                                @if( isset($getClassname))
                                                @forelse($getClassname as $class)
                                                    <option value="{{$class->id}}">{{$class->classname ?? ''}}</option>
                                                @empty
                                                    <option value="">Not Found</option>
                                                @endforelse
                                            @endif
                                    
                                            
                                            </select>
                                            @error('upto_class') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                </div>

                
                                {{--======================= Qualification Details ======================= --}}
                                <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Qualification Details</h3>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>Qualification</th>
                                                        <th>Select Stream</th>
                                                        <th>Subject</th>
                                                        <th>University/Board</th>
                                                        <th>percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10th</td>
                                                        <td>
                                                            <select name="" id="" class="form-select"  wire:model="stream_10th" >
                                                                <option value="">Select</option>
                                                                <option value="10th">10th</option>

                                                            </select>
                                                            @error('stream_10th') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="subject_10th">
                                                                <option value="">Select</option> 
                                                                @if( isset($getSubjects))
                                                                @forelse($getSubjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                                @empty
                                                                    <option value="">Not Found</option>
                                                                @endforelse
                                                            @endif
                                                            </select>
                                                            @error('subject_10th') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="university_10th" placeholder="">
                                                            @error('university_10th') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="percentage_10th" placeholder="Percentage" >
                                                            @error('percentage_10th') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12th</td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="stream_12">
                                                                    <option value="Select Stream">Select Stream</option>
                                                                    <option value="Non Medical">Non Medical</option>
                                                                    <option value=" Medical">Medical</option>
                                                                    <option value="Arts">Arts</option>
                                                                    <option value="Commerce">Commerce</option>
                                                                    <option value="Vocational">Vocational</option>
                                                            </select>
                                                            @error('stream_12') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="subject_12">
                                                                <option value="">Select</option>
                                                                @if( isset($getSubjects))
                                                                    @forelse($getSubjects as $subject)
                                                                        <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                                    @empty
                                                                        <option value="">Not Found</option>
                                                                    @endforelse
                                                                @endif
                                                            </select>
                                                            @error('subject_12') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="university_12">
                                                            @error('university_12') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                        <td><input type="text" class="form-control"  wire:model="percentage_12" placeholder="Percentage" >
                                                            @error('percentage_12') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Graduation</td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="stream_graduation">
                                                                    <option value="Select">Select</option>
                                                                    <option value="B.A">B.A</option>
                                                                    <option value="B.Com">B.Com</option>
                                                                    <option value="B.Sc[NM]">B.Sc[NM]</option>
                                                                    <option value="B.Sc[MED]">B.Sc[MED]</option>
                                                            </select>
                                                         
                                                            @error('stream_graduation') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="subject_graduation">
                                                                <option value="">Select</option>
                                                                @if( isset($getSubjects))
                                                                @forelse($getSubjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                                @empty
                                                                    <option value="">Not Found</option>
                                                                @endforelse
                                                            @endif
                                                            </select>
                                                            @error('subject_graduation') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="university_graduation">
                                                            @error('university_graduation') <span class="text-danger">{{ $message }}</span> @enderror</td>
                                                        <td><input type="text" class="form-control" wire:model="percentage_graduation" placeholder="Percentage">
                                                            @error('percentage_graduation') <span class="text-danger">{{ $message }}</span> @enderror</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Post Graduation</td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="stream_post_graduation">
                                                                <option value="">Select</option>
                                                                    <option value="M.A">M.A</option>
                                                                    <option value="M.Sc">M.Sc</option>
                                                                    <option value="M.Tec">M.Tec</option>
                                                            </select>
                                                            @error('stream_post_graduation') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="subject_post_graduation">
                                                                <option value="">Select</option>
                                                                @if( isset($getSubjects))
                                                                @forelse($getSubjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                                @empty
                                                                    <option value="">Not Found</option>
                                                                @endforelse
                                                            @endif
                                                            </select>
                                                            @error('subject_post_graduation') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="university_post_graduation">
                                                            @error('university_post_graduation') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="percentage_post_graduation" placeholder="Percentage">
                                                            @error('percentage_post_graduation') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>B.Ed</td>
                                                        <td>
                                                            <select name="" id="" class="form-select" wire:model="stream_bed">
                                                                <option value="">Select</option>
                                                                    <option value="B.Ed">B.Ed</option>
                                                            </select>
                                                            @error('stream_bed') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td>
                                                            <select name="" id="" class="form-select"  wire:model="subject_bed">
                                                                <option value="">Select</option>
                                                                @if( isset($getSubjects))
                                                                @forelse($getSubjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name ?? ''}}</option>
                                                                @empty
                                                                    <option value="">Not Found</option>
                                                                @endforelse
                                                            @endif
                                                            </select>
                                                            @error('subject_bed') <span class="text-danger">{{ $message }}</span> @enderror

                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="university_bed">
                                                            @error('university_bed') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                        <td><input type="text" class="form-control" wire:model="percentage_bed" placeholder="Percentage">
                                                            @error('percentage_bed') <span class="text-danger">{{ $message }}</span> @enderror
                                                        
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Other Education Details</h3>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <textarea name="" id="" class="form-control" rows="4"  wire:model="other_details" placeholder="Other Education Details" ></textarea>
                                            @error('other_details') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                </div>

                                <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Personal Details</h3>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Marital Status</label>
                                            <select name="" class="form-select" id="" wire:model="marital_status">
                                                <option value="">Select</option>
                                                <option value="Married">Married</option>

                                                <option value="Single">Single</option>
                                            </select>
                                            @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" wire:model="address" placeholder="Address" />
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Mobile No</label> 
                                            <input type="text" class="form-control"  wire:model="mobile_no"  placeholder="Mobile No" />
                                            @error('mobile_no') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Phone No</label>
                                            <input type="text" class="form-control"  wire:model="phone_no"  placeholder="Phone No"/>
                                            @error('phone_no') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Landline No</label>
                                            <input type="text" class="form-control"  wire:model="landline_no" placeholder="Landline No" />
                                            @error('landline_no') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                </div>
                                {{-- =================== Add Experience =========================== --}}
                                <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Add Experience</h3>
                                <div class="row g-3">

                                    @foreach ($experiences as $index => $experience)
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="institution_{{ $index }}">Institution Name </label>
                                            <input type="text" class="form-control" wire:model="experiences.{{ $index }}.institution_name" placeholder="Institution Name " />
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <label for="period_from_{{ $index }}">Period From</label>
                                            <input type="date" class="form-control" wire:model="experiences.{{ $index }}.period_from" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <label for="period_to_{{ $index }}">Period To</label>
                                            <input type="date" class="form-control" wire:model="experiences.{{ $index }}.period_to" />
                                        </div>
                                    </div>
                            
                                    @endforeach
                                    <div class="col-lg-2">
                                        <div class="">
                                            <label for="">&nbsp;</label><br>
                                            <button class="btn btn-sm btn-success " type="button" wire:click="addExperience">Add</button>
                                            <button class="btn btn-sm btn-danger " type="button" wire:click="removeExperience({{ $index }})">Remove</button>
                                    
                                        </div>
                                    </div>
                                    {{-- ===================== --}}
                                    {{-- <div class="col-lg-4">
                                        <div class="">
                                            <label for="">Institution Name</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <label for="">Period From</label>
                                            <input type="date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="">
                                            <label for="">Period To</label>
                                            <input type="date" class="form-control" />
                                        </div>
                                    </div> --}}
                                    {{-- =============== --}}
                                    {{-- <div class="col-lg-2">
                                        <div class="">
                                            <label for="">&nbsp;</label><br>
                                            <button class="btn btn-success w-100" type="button" wire:click="addExperience">Add</button>

                                        </div>
                                    </div> --}}
                                    {{-- <div class="table-responsive">
                                        <table class="table table-bordered table-striped text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Institution</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($experiences))
                                                @foreach ($experiences as $index => $experience)
                                                <tr>
                                                    <td>{{ $experience['institution'] }}</td>
                                                    <td>{{ $experience['period_from'] }}</td>
                                                    <td>{{ $experience['period_to'] }}</td>
                                                    <td><a href="#" wire:click="removeExperience({{ $index }})">Remove</a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>

                                <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Experience</h3>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="current_job">Current Job</label>
                                            <input type="text" class="form-control" wire:model="current_job" id="current_job" placeholder="Current Job">
                                            @error('current_job') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="present_salary">Present Salary</label>
                                            <input type="text" class="form-control" wire:model="present_salary" id="present_salary" placeholder="Present Salary">
                                            @error('present_salary') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="expected_salary">Expected Salary</label>
                                            <input type="text" class="form-control" wire:model="expected_salary" id="expected_salary" placeholder="Expected Salary">
                                            @error('expected_salary') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="">
                                            <label for="expected_accommodation">Expected Accommodation</label>
                                            <select name="expected_accommodation" class="form-select" id="expected_accommodation" wire:model="expected_accommodation">
                                                <option value="">Select</option>
                                                <option value="Single Room">Single Room</option>
                                                <option value="Single Bedroom/Double Room">Single Bedroom/Double Room</option>
                                                <option value="Double Room/Triple Room">Double Room/Triple Room</option>
                                                <option value="Not required">Not Required</option>

                                            </select>
                                            @error('expected_accommodation') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="future_plans">Future Plans</label>
                                            <textarea name="future_plans" id="future_plans" rows="4" class="form-control" wire:model="future_plans" placeholder="Future Plans"></textarea>
                                            @error('future_plans') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="associated_with_pinegrove">Any family member or relative who has/had been associated with Pinegrove?</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="associated_with_pinegrove" id="associated_yes" value="Yes" wire:model="associated_with_pinegrove">
                                                <label class="form-check-label" for="associated_yes">Yes</label>

                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="associated_with_pinegrove" id="associated_no" value="No" wire:model="associated_with_pinegrove">
                                                <label class="form-check-label" for="associated_no">No</label>

                                            </div>
                                            @error('associated_with_pinegrove') <span class="text-danger">{{ $message }}</span> @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="photo">Upload Photo</label><br>
                                            <input type="file" name="photo" id="photo" wire:model="photo">
                                            <div class="form-text text-danger">(Uploading a photograph is mandatory. Your application may be rejected if your Photo is not uploaded)</div>
                                            @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="">
                                            <button type="submit" value="Submit" class="immiPressBtn">
                                                <span>Submit</span>
                                            </button>
                                            <div wire:loading wire:target="store">
                                                <img src="{{asset('loading.gif')}}" width="70" height="70" class="m-auto mt-1/4">
                                             </div>

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
                                

                            </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
