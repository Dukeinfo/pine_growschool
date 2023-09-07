<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Roll of honour</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Roll of honour</li>
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
                            <h4 class="card-title">Roll of honour</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" wire:model="category">
                                                <option value="">Select</option>
                                            @if(isset($categories))
                                            @foreach($categories as $category)
                                              <option value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        @endif 
                                              
                                        </select>
                                         @error('category') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Category</label>
                                        <select class="form-select" wire:model="subcategory">
                                                <option value="">Select</option>
                                               @if (!is_null($subCategories)) 
                                                @foreach($subCategories as $subcat)
                                                   <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                                              @endforeach
                                               @endif 
                                              
                                        </select>
                                         @error('subcategory') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" class="form-control" id=""  wire:model="studentname" placeholder="Student Name">
                                        @error('studentname') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">House</label>
                                        <select class="form-select" wire:model="house">
                                                <option value="">Select</option>
                                                <option>CHINAR</option>
                                                <option>TEAK</option>
                                                <option>DEODAR</option>
                                                 <option>OAK</option>
                                        </select>
                                         @error('house') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Branch</label>
                                        <select class="form-select" wire:model="branch">
                                                <option value="">Select</option>
                                                <option>SBT</option>
                                              
                                        </select>
                                         @error('branch') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                 <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Year</label>
                                         <select name="year"  wire:model="year" id="year" class="form-control">
                                            <option value="">Select Year</option>
                                          
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}" {{$currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                         @error('year') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                              


                             
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive"> Inactive </option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editRecord" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editRecord">
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
