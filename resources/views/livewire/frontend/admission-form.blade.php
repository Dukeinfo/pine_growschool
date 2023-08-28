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
                    <h5 class="subTitle">Admission Enquiry</h5>
                    <h2 class="secTitle">Contact for Admission</h2>

                    <h3 class="widgetTitle text-dark fs-5 mb-3">Important</h3>
                    <ol style="list-style-type: lower-roman;margin-left: 20px;" class="mb-3">
                        <li>Registration is only permitted for the next academic year. Please do not try and register for other years </li>
                        <li>Please note that it is mandatory to fill a hard copy of the Admission Form, remit the Registration Fee and attach a copy of the Birth Certificate along with two recently clicked coloured photographs of the child, for the registration process to be completed. </li>
                        <li>Please fill the under-mentioned details for sending information to the School Office as a request for registration of your child. </li>
                        <li>The School office shall contact you after receipt of this information.</li>
                    </ol>
                    <p>
                        <a href="javascript:void()">(Please Click Here to Download Admission form)</a>
                    </p>

                    <h3 class="widgetTitle text-dark fs-5 mb-3">Contact for Admission</h3>
                    {{-- <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Student's Name</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Select Gender</label>
                                <select name="" id="" class="form-select">
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Country of Birth</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Class (Admission Sought)</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Class (Studying In)</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Father's Name</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Father's Phone No.</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Mother's Name</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Mother's Phone No.</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Parent's Email ID</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="">Address</label>
                                <textarea name="" id="" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" value="Submit" class="immiPressBtn">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </div> --}}

                    <form action="" wire:submit.prevent="submitForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Student's Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" />
                                @error('name') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Select Gender</label>
                                <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" wire:model="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" wire:model="dateOfBirth" />
                                @error('dateOfBirth') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Country of Birth</label>
                                <input type="text" class="form-control @error('countryOfBirth') is-invalid @enderror" wire:model="countryOfBirth" />
                                @error('countryOfBirth') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" wire:model="nationality" />
                                @error('nationality') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Class (Admission Sought)</label>
                                <input type="text" class="form-control @error('admissionSought') is-invalid @enderror" wire:model="admissionSought" />
                                @error('admissionSought') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Class (Studying In)</label>
                                <input type="text" class="form-control @error('studyingIn') is-invalid @enderror" wire:model="studyingIn" />
                                @error('studyingIn') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Father's Name</label>
                                <input type="text" class="form-control @error('fatherName') is-invalid @enderror" wire:model="fatherName" />
                                @error('fatherName') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Father's Phone No.</label>
                                <input type="text" class="form-control @error('fatherPhone') is-invalid @enderror" wire:model="fatherPhone" />
                                @error('fatherPhone') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Mother's Name</label>
                                <input type="text" class="form-control @error('motherName') is-invalid @enderror" wire:model="motherName" />
                                @error('motherName') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Mother's Phone No.</label>
                                <input type="text" class="form-control @error('motherPhone') is-invalid @enderror" wire:model="motherPhone" />
                                @error('motherPhone') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="">Parent's Email ID</label>
                                <input type="text" class="form-control @error('parentEmail') is-invalid @enderror" wire:model="parentEmail" />
                                @error('parentEmail') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="">Address</label>
                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="4" wire:model="address"></textarea>
                                @error('address') <div class="invalid-feedback text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" wire:loading.attr="disabled"  class="immiPressBtn">
                                    <span>Submit</span>
                                </button>
                            </div>
                            <div wire:loading wire:target="submitForm">
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
    </section>
    <!-- End: Section -->
</div>
