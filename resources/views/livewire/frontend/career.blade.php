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
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="widgetTitle text-dark fs-5 mb-3">Required Details</h3>
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Application Date</label>
                                        <input type="date" class="form-control" wire:model="applicationDate"/>
                                        @error('applicationDate') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Date of Birth</label>
                                        <input type="date" class="form-control" wire:model="dateOfBirth" />
                                        @error('dateOfBirth') <span class="text-danger">{{ $message }}</span> @enderror

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
                                        <input type="text" class="form-control" wire:model="post_name" />
                                        @error('post_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Can Teach</label>
                                        <select name="" id="" class="form-select"  wire:model="can_teach" >
                                                <option value="">Select</option>
                                                <option value="English">English</option>
                                                <option value="English Conversation">English Conversation</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Mathematics">Mathematics</option>
                                                <option value="Social Science">Social Science</option>
                                                <option value="G. Sc.">G. Sc.</option>
                                                <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                <option value="Computers">Computers</option>
                                                <option value="G.K./Typing">G.K./Typing</option>
                                                <option value="Art/Music">Art/Music</option>
                                                <option value="Internal Assessment">Internal Assessment</option>
                                                <option value="English Core">English Core</option>
                                                <option value="Business Studies ">Business Studies </option>
                                                <option value="Computer science">Computer science</option>
                                                <option value="Economics">Economics</option>
                                                <option value="Accountancy">Accountancy</option>
                                                <option value="Phy. Edu.">Phy. Edu.</option>
                                                <option value="Environmental Sc.">Environmental Sc.</option>
                                                <option value="Info. Practices">Info. Practices</option>
                                                <option value="Physics">Physics</option>
                                                <option value="Chemistry">Chemistry</option>
                                                <option value="Biology Pr.">Biology Pr.</option>
                                                <option value="Internal Assesment">Internal Assesment</option>
                                                <option value="Art">Art</option>
                                                <option value="Music">Music</option>
                                                <option value="Physics Pr.">Physics Pr.</option>
                                                <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                <option value="Maths Pr">Maths Pr</option>
                                                <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                <option value="Biology">Biology</option>
                                                <option value="Accountancy">Accountancy</option>
                                                <option value="Social Science Pr">Social Science Pr</option>
                                                <option value="Painting">Painting</option>
                                                <option value="Painting Pr">Painting Pr</option>
                                                <option value="Music Pr.">Music Pr.</option>
                                                <option value="Economics Pr.">Economics Pr.</option>
                                                <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                <option value="GST">GST</option>
                                                <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                <option value="Value Education">Value Education</option>
                                                <option value="Pol Science">Pol Science</option>
                                                <option value="Psychology">Psychology</option>
                                                <option value="Sociology">Sociology</option>
                                        </select>
                                        @error('can_teach') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Upto Class</label>
                                        <select name="" id="" class="form-select" wire:model="upto_class" >
                                            <option value="">Select</option>
                                                <option value="">Select</option>
                                                <option value="VII">VII</option>
                                                <option value="VIII">VIII</option>
                                                <option value="VI">VI</option>
                                                <option value="IX">IX</option>
                                                <option value="XI">XI</option>
                                                <option value="X">X</option>
                                                <option value="XII">XII</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                           
                                        </select>
                                        @error('upto_class') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                            </div>

               

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
                                                        <select name="" id="" class="form-select"  wire:model="qualification_10_stream" >
                                                            <option value="">Select</option>
                                                            <option value="10th">10th</option>

                                                        </select>
                                                        @error('qualification_10_stream') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_10_subject">
                                                            <option value="">Select</option> 
                                                                <option value="English">English</option>
                                                                <option value="English Conversation">English Conversation</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Mathematics">Mathematics</option>
                                                                <option value="Social Science">Social Science</option>
                                                                <option value="G. Sc.">G. Sc.</option>
                                                                <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                                <option value="Computers">Computers</option>
                                                                <option value="G.K./Typing">G.K./Typing</option>
                                                                <option value="Art/Music">Art/Music</option>
                                                                <option value="Internal Assessment">Internal Assessment</option>
                                                                <option value="English Core">English Core</option>
                                                                <option value="Business Studies ">Business Studies </option>
                                                                <option value="Computer science">Computer science</option>
                                                                <option value="Economics">Economics</option>
                                                                <option value="Accountancy">Accountancy</option>
                                                                <option value="Phy. Edu.">Phy. Edu.</option>
                                                                <option value="Environmental Sc.">Environmental Sc.</option>
                                                                <option value="Info. Practices">Info. Practices</option>
                                                                <option value="Physics">Physics</option>
                                                                <option value="Chemistry">Chemistry</option>
                                                                <option value="Biology Pr.">Biology Pr.</option>
                                                                <option value="Internal Assesment">Internal Assesment</option>
                                                                <option value="Art">Art</option>
                                                                <option value="Music">Music</option>
                                                                <option value="Physics Pr.">Physics Pr.</option>
                                                                <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                                <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                                <option value="Maths Pr">Maths Pr</option>
                                                                <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                                <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                                <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                                <option value="Biology">Biology</option>
                                                                <option value="Accountancy">Accountancy</option>
                                                                <option value="Social Science Pr">Social Science Pr</option>
                                                                <option value="Painting">Painting</option>
                                                                <option value="Painting Pr">Painting Pr</option>
                                                                <option value="Music Pr.">Music Pr.</option>
                                                                <option value="Economics Pr.">Economics Pr.</option>
                                                                <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                                <option value="GST">GST</option>
                                                                <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                                <option value="Value Education">Value Education</option>
                                                                <option value="Pol Science">Pol Science</option>
                                                                <option value="Psychology">Psychology</option>
                                                                <option value="Sociology">Sociology</option>
                                                        </select>
                                                        @error('qualification_10_subject') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_10_university">
                                                        @error('qualification_10_university') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_10_percentage" >
                                                        @error('qualification_10_percentage') <span class="text-danger">{{ $message }}</span> @enderror
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12th</td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_12_stream">
                                                                <option value="Select Stream">Select Stream</option>
                                                                <option value="Non Medical">Non Medical</option>
                                                                <option value=" Medical">Medical</option>
                                                                <option value="Arts">Arts</option>
                                                                <option value="Commerce">Commerce</option>
                                                                <option value="Vocational">Vocational</option>
                                                        </select>
                                                        @error('qualification_12_stream') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_12_subject">
                                                            <option value="">Select</option>
                                                            <option value="English">English</option>
                                                            <option value="English Conversation">English Conversation</option>
                                                            <option value="Hindi">Hindi</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="G. Sc.">G. Sc.</option>
                                                            <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                            <option value="Computers">Computers</option>
                                                            <option value="G.K./Typing">G.K./Typing</option>
                                                            <option value="Art/Music">Art/Music</option>
                                                            <option value="Internal Assessment">Internal Assessment</option>
                                                            <option value="English Core">English Core</option>
                                                            <option value="Business Studies ">Business Studies </option>
                                                            <option value="Computer science">Computer science</option>
                                                            <option value="Economics">Economics</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Phy. Edu.">Phy. Edu.</option>
                                                            <option value="Environmental Sc.">Environmental Sc.</option>
                                                            <option value="Info. Practices">Info. Practices</option>
                                                            <option value="Physics">Physics</option>
                                                            <option value="Chemistry">Chemistry</option>
                                                            <option value="Biology Pr.">Biology Pr.</option>
                                                            <option value="Internal Assesment">Internal Assesment</option>
                                                            <option value="Art">Art</option>
                                                            <option value="Music">Music</option>
                                                            <option value="Physics Pr.">Physics Pr.</option>
                                                            <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                            <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                            <option value="Maths Pr">Maths Pr</option>
                                                            <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                            <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                            <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                            <option value="Biology">Biology</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Social Science Pr">Social Science Pr</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Painting Pr">Painting Pr</option>
                                                            <option value="Music Pr.">Music Pr.</option>
                                                            <option value="Economics Pr.">Economics Pr.</option>
                                                            <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                            <option value="GST">GST</option>
                                                            <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                            <option value="Value Education">Value Education</option>
                                                            <option value="Pol Science">Pol Science</option>
                                                            <option value="Psychology">Psychology</option>
                                                            <option value="Sociology">Sociology</option>
                                                        </select>
                                                        @error('qualification_12_subject') <span class="text-danger">{{ $message }}</span> @enderror

                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_12_university"></td>
                                                    <td><input type="text" class="form-control"  wire:model="qualification_12_percentage"></td>
                                                </tr>
                                                <tr>
                                                    <td>Graduation</td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_graduation_stream">
                                                                <option value="Select">Select</option>
                                                                <option value="B.A">B.A</option>
                                                                <option value="B.Com">B.Com</option>
                                                                <option value="B.Sc[NM]">B.Sc[NM]</option>
                                                                <option value="B.Sc[MED]">B.Sc[MED]</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_graduation_subject">
                                                            <option value="">Select</option>
                                                            <option value="English">English</option>
                                                            <option value="English Conversation">English Conversation</option>
                                                            <option value="Hindi">Hindi</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="G. Sc.">G. Sc.</option>
                                                            <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                            <option value="Computers">Computers</option>
                                                            <option value="G.K./Typing">G.K./Typing</option>
                                                            <option value="Art/Music">Art/Music</option>
                                                            <option value="Internal Assessment">Internal Assessment</option>
                                                            <option value="English Core">English Core</option>
                                                            <option value="Business Studies ">Business Studies </option>
                                                            <option value="Computer science">Computer science</option>
                                                            <option value="Economics">Economics</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Phy. Edu.">Phy. Edu.</option>
                                                            <option value="Environmental Sc.">Environmental Sc.</option>
                                                            <option value="Info. Practices">Info. Practices</option>
                                                            <option value="Physics">Physics</option>
                                                            <option value="Chemistry">Chemistry</option>
                                                            <option value="Biology Pr.">Biology Pr.</option>
                                                            <option value="Internal Assesment">Internal Assesment</option>
                                                            <option value="Art">Art</option>
                                                            <option value="Music">Music</option>
                                                            <option value="Physics Pr.">Physics Pr.</option>
                                                            <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                            <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                            <option value="Maths Pr">Maths Pr</option>
                                                            <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                            <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                            <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                            <option value="Biology">Biology</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Social Science Pr">Social Science Pr</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Painting Pr">Painting Pr</option>
                                                            <option value="Music Pr.">Music Pr.</option>
                                                            <option value="Economics Pr.">Economics Pr.</option>
                                                            <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                            <option value="GST">GST</option>
                                                            <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                            <option value="Value Education">Value Education</option>
                                                            <option value="Pol Science">Pol Science</option>
                                                            <option value="Psychology">Psychology</option>
                                                            <option value="Sociology">Sociology</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_graduation_university"></td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_graduation_percentage"></td>
                                                </tr>
                                                <tr>
                                                    <td>Post Graduation</td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_post_graduation_stream">
                                                            <option value="">Select</option>
                                                                <option value="M.A">M.A</option>
                                                                <option value="M.Sc">M.Sc</option>
                                                                <option value="M.Tec">M.Tec</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_post_graduation_subject">
                                                            <option value="">Select</option>
                                                            <option value="English">English</option>
                                                            <option value="English Conversation">English Conversation</option>
                                                            <option value="Hindi">Hindi</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="G. Sc.">G. Sc.</option>
                                                            <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                            <option value="Computers">Computers</option>
                                                            <option value="G.K./Typing">G.K./Typing</option>
                                                            <option value="Art/Music">Art/Music</option>
                                                            <option value="Internal Assessment">Internal Assessment</option>
                                                            <option value="English Core">English Core</option>
                                                            <option value="Business Studies ">Business Studies </option>
                                                            <option value="Computer science">Computer science</option>
                                                            <option value="Economics">Economics</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Phy. Edu.">Phy. Edu.</option>
                                                            <option value="Environmental Sc.">Environmental Sc.</option>
                                                            <option value="Info. Practices">Info. Practices</option>
                                                            <option value="Physics">Physics</option>
                                                            <option value="Chemistry">Chemistry</option>
                                                            <option value="Biology Pr.">Biology Pr.</option>
                                                            <option value="Internal Assesment">Internal Assesment</option>
                                                            <option value="Art">Art</option>
                                                            <option value="Music">Music</option>
                                                            <option value="Physics Pr.">Physics Pr.</option>
                                                            <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                            <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                            <option value="Maths Pr">Maths Pr</option>
                                                            <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                            <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                            <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                            <option value="Biology">Biology</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Social Science Pr">Social Science Pr</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Painting Pr">Painting Pr</option>
                                                            <option value="Music Pr.">Music Pr.</option>
                                                            <option value="Economics Pr.">Economics Pr.</option>
                                                            <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                            <option value="GST">GST</option>
                                                            <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                            <option value="Value Education">Value Education</option>
                                                            <option value="Pol Science">Pol Science</option>
                                                            <option value="Psychology">Psychology</option>
                                                            <option value="Sociology">Sociology</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_post_graduation_university"></td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_post_graduation_percentage"></td>
                                                </tr>
                                                <tr>
                                                    <td>B.Ed</td>
                                                    <td>
                                                        <select name="" id="" class="form-select" wire:model="qualification_bed_stream">
                                                            <option value="">Select</option>
                                                                <option value="B.Ed">B.Ed</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="" id="" class="form-select"  wire:model="qualification_bed_subject">
                                                            <option value="">Select</option>
                                                            <option value="English">English</option>
                                                            <option value="English Conversation">English Conversation</option>
                                                            <option value="Hindi">Hindi</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                            <option value="Social Science">Social Science</option>
                                                            <option value="G. Sc.">G. Sc.</option>
                                                            <option value="Punjabi/sanskrit">Punjabi/sanskrit</option>
                                                            <option value="Computers">Computers</option>
                                                            <option value="G.K./Typing">G.K./Typing</option>
                                                            <option value="Art/Music">Art/Music</option>
                                                            <option value="Internal Assessment">Internal Assessment</option>
                                                            <option value="English Core">English Core</option>
                                                            <option value="Business Studies ">Business Studies </option>
                                                            <option value="Computer science">Computer science</option>
                                                            <option value="Economics">Economics</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Phy. Edu.">Phy. Edu.</option>
                                                            <option value="Environmental Sc.">Environmental Sc.</option>
                                                            <option value="Info. Practices">Info. Practices</option>
                                                            <option value="Physics">Physics</option>
                                                            <option value="Chemistry">Chemistry</option>
                                                            <option value="Biology Pr.">Biology Pr.</option>
                                                            <option value="Internal Assesment">Internal Assesment</option>
                                                            <option value="Art">Art</option>
                                                            <option value="Music">Music</option>
                                                            <option value="Physics Pr.">Physics Pr.</option>
                                                            <option value="Chemistry Pr.">Chemistry Pr.</option>
                                                            <option value="Info. Practices Pr.">Info. Practices Pr.</option>
                                                            <option value="Maths Pr">Maths Pr</option>
                                                            <option value="Phy. Edu. Pr">Phy. Edu. Pr</option>
                                                            <option value="G. Sc. Pr">G. Sc. Pr</option>
                                                            <option value="Accountancy Pr.">Accountancy Pr.</option>
                                                            <option value="Biology">Biology</option>
                                                            <option value="Accountancy">Accountancy</option>
                                                            <option value="Social Science Pr">Social Science Pr</option>
                                                            <option value="Painting">Painting</option>
                                                            <option value="Painting Pr">Painting Pr</option>
                                                            <option value="Music Pr.">Music Pr.</option>
                                                            <option value="Economics Pr.">Economics Pr.</option>
                                                            <option value="Business Studies Pr.">Business Studies Pr.</option>
                                                            <option value="GST">GST</option>
                                                            <option value="Punjabi/Sanskrit">Punjabi/Sanskrit</option>
                                                            <option value="Value Education">Value Education</option>
                                                            <option value="Pol Science">Pol Science</option>
                                                            <option value="Psychology">Psychology</option>
                                                            <option value="Sociology">Sociology</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_bed_university"></td>
                                                    <td><input type="text" class="form-control" wire:model="qualification_bed_percentage"></td>
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
                                        <textarea name="" id="" class="form-control" rows="4"  wire:modelr="other_education_details" ></textarea>
                                    </div>
                                </div>
                            </div>

                            <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Personal Details</h3>
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Marital Status</label>
                                        <select name="" class="form-select" id="" wire:modelr="marital_status">
                                            <option value="">Married</option>
                                            <option value="">Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" wire:modelr="address" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Mobile No</label> 
                                        <input type="text" class="form-control"  wire:modelr="mobile_no"  />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Phone No</label>
                                        <input type="text" class="form-control"  wire:modelr="phone_no" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Landline No</label>
                                        <input type="text" class="form-control"  wire:modelr="landline_no" />
                                    </div>
                                </div>
                            </div>
{{-- =================== Add Experience =========================== --}}
                            <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Add Experience</h3>
                            <div class="row g-3">

                                @foreach ($experiences as $index => $experience)
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="institution_{{ $index }}">Institution Name</label>
                                        <input type="text" class="form-control" wire:model="experiences.{{ $index }}.institution" />
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
                                        <button class="btn btn-success w-100" type="button" wire:click="addExperience">Add</button>
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
                                <div class="col-lg-2">
                                    <div class="">
                                        <label for="">&nbsp;</label><br>
                                        <button class="btn btn-success w-100" type="button" wire:click="addExperience">Add</button>

                                    </div>
                                </div>
                                <div class="table-responsive">
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
                                </div>
                            </div>

                            <h3 class="widgetTitle text-dark fs-5 mb-3 mt-4">Experience</h3>
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Current Job</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Present Salary</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Expected Salary</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <label for="">Expected Accomodation</label>
                                        <select name="" class="form-select" id="">
                                            <option value="">Single Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">
                                        <label for="">Future Plans</label>
                                        <textarea name="" id="" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">
                                        <label for="">Any family member or relative who has/had been associated with Pinegrove? </label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">
                                        <label for="">Upload Photo</label><br>
                                        <input type="file" name="" id="">
                                        <div class="form-text text-danger">(Uploading a photograph is mandatory. Your application may be rejected if your Photo is not uploaded)</div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">
                                        <button type="submit" value="Submit" class="immiPressBtn">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
