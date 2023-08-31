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
                                        <label class="form-label"> File</label>
                                        <input type="file" class="form-control" wire:model="document">
                                         @error('document') <span class="error">{{ $message }}</span> @enderror
                                    </div>
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
                                                <option>Active</option>
                                                <option>Inactive</option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addCertificate" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addCertificate">
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
                            <h4 class="card-title">Manage Our Toppers</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Admission Number</th>
                                            <th>File</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->year ?? '' }}</td>
                                            <td>{{$record->name ?? '' }}</td>
                                            <td>{{$record->Class->classname ?? '' }}</td>
                                            <td>{{$record->Section->name ?? '' }}</td>
                                             <td>{{$record->admission_no ?? '' }}</td>
                                             

                                             
                                            <td><a href="javascript:void(0)" wire:click="download('{{$record->id}}')" download=""> Download </a></td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
@if($record->status  == "Active")
        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
         @else
       <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
@endif</td>
                                            <td>
                                                <a href="{{route('edit_transfer_certificate',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
