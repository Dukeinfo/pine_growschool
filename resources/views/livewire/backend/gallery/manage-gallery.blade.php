<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Gallery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Manage Gallery</li>
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
                            <h4 class="card-title">Add Gallery</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select"   wire:model="category_id">
                                            <option value=""> Select menu</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                              <option value="{{$category->id}}"> {{$category->name}}</option>
                                            @endforeach
                                        @endif    
                                            </select>
                                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Title name</label>
                                        <input type="text" class="form-control"  wire:model="title" placeholder="Image Title">
                                         @error('title') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
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
                                        <label class="form-label">Student name</label>
                                        <input type="text" class="form-control"  wire:model="s_name" placeholder="Student name">
                                         @error('s_name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Gallery Image</label>
                                        <input type="file" class="form-control" wire:model="image">
                                         @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div>
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addGallery" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addGallery">
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
                            <h4 class="card-title">Manage Gallery</h4>
                           
                            <div class="col-md-3 float-end">
                            <div class="form-group">

                                <div class="mb-3">
                                    <label class="form-label">Search</label>
                                    <input type="Search" class="form-control"  wire:model="search" placeholder="Search...">
                                     @error('Search') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Gallery Image</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($records) && count($records)>0 )                      
                                    @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->Category->name ?? '' }}</td>
                                            <td>
                                               @php
                                                $thumb = !empty($record->image) ? asset('uploads/thumbnail/'.basename($record->thumbnail)) : url('admin_assets/images/no-img.jpg');
                                                @endphp                                      
                                                <img src="{{$thumb}}" alt="" class="border" width="100" height="70">
                                            </td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
                                            @if($record->status  == "Active")
                                                    <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
                                                    @else
                                                <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                            @endif</td>
                                            <td>
                                                <a href="{{url('/admin/edit/gallery')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
