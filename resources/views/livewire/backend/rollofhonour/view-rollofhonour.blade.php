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
                                                <option>Active</option>
                                                <option>Inactive</option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="saveRecord" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="saveRecord">
                                        <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">

                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Page</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Student</th>
                                            <th>House</th> 
                                             <th>Branch</th>
                                             <th>Year</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->gelCategory->name ?? '' }}</td>
                                             <td>{{$record->gelSubCategory->name ?? '' }}</td>
                                            <td>
                                             {{$record->student_name ?? '' }}  
                                            </td>
                                            <td>
                                             {{$record->house ?? '' }}  
                                            </td>
                                               <td>
                                             {{$record->branch ?? '' }}  
                                            </td>
                                              <td>
                                             {{$record->year ?? '' }}  
                                            </td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
                                                @if($record->status  == "Active")
                                                        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
                                                        @else
                                                    <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                                @endif</td>
                                            <td>
                                                <a href="{{route('edit_roll_of_honour',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                  @endforeach
                                      @else
                                 <tr>
                                 <td colspan="5"> Record Not Found</td>
                                
                                 </tr>
                                 @endif      
                                    </tbody>
                                </table>
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
