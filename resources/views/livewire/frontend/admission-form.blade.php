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
                    <div class="row">
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
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
