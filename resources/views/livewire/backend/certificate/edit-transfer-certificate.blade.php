<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Transfer Certificate</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Transfer Certificate</li>
                            </ol>
                        </div>

                    </div>
          
         
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">


                        
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Transfer Certificate</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        
                        <div class="card-body">
                            
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                              
                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Select Year</label>
                                        <select name="year"  wire:model="year" id="year" class="form-control">
                                            <option value="">Select Year</option>
                                          
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}" {{$currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                         @error('year') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>	
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Class</label>
                                        <select class="form-select" wire:model="classname">
                                                <option value="">Select</option>
                                                @if(isset($getClass))
                                            @foreach($getClass as $class)
                                              <option value="{{$class->id}}"> {{$class->classname}}</option>
                                            @endforeach
                                        @endif
                                             
                                        </select>
                                         @error('classname') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Section</label>
                                        <select class="form-select" wire:model="section">
                                                <option value="">Select</option>
                                              @if(isset($getSection))
                                            @foreach($getSection as $section)
                                              <option value="{{$section->id}}"> {{$section->name}}</option>
                                            @endforeach
                                             @endif
                                            
                                        </select>
                                         @error('section') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Admission no.</label>
                                        <input type="text" class="form-control" id="" wire:model="admno" placeholder="Admission Number">
                                        @error('admno') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                
                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">File</label>
                                        <input type="file" class="form-control" id="" wire:model="editdocument" >
                                        @error('editdocument') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <a href="javascript:void(0)" wire:click="download('{{$document ?? '' }}')"> Download </a>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort_id" placeholder="Order NUmber">
                                         @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive </option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editCertificate" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editCertificate">
                                        <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">

                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            



            
        </div>
        <!-- container-fluid -->
    </div>
</div>
