<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Staff</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Staff</li>
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
                            <h4 class="card-title">Add Staff</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                    
                             @if (session()->has('success'))
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 <i class="mdi mdi-check-all me-2"></i>
                                 {{ session('success') }}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                             @endif

                             @if (session()->has('error'))
                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <i class="mdi mdi-check-all me-2"></i>
                                 {{ session('error') }}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                             @endif
                    
                    
                            <form wire:submit.prevent="import" enctype="multipart/form-data">
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">Choose Excel File (xlsx or xls)</label>
                                        <input type="file" wire:model="file" id="file" class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-primary " style="margin-top: 25px;">Import</button>

                                <a class="btn btn-success"  style="margin-top: 25px;"  wire:click="export_staff()">Export Staff</a>
                                
                                <a class="btn btn-warning"  style="margin-top: 25px;"  wire:click="sampleexport()">Sample Staff</a>
                            
                            </div>
                               </div>
                           
                        
                            </form>

                            <!--success or error alert-->
                            <!--form starts-->
                            <hr>
                            <div class="row g-3 ">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" wire:model="department_id" disabled>
                                                <option value="">Select</option>
                                                @if(isset($departments))
                                            @foreach($departments as $department)
                                              <option value="{{$department->id}}"> {{$department->name}}</option>
                                            @endforeach
                                        @endif 
                                        </select>
                                         @error('department_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" wire:model="name" placeholder="Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Designation</label>
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="" wire:model="designation" placeholder="Designation">
                                        @error('designation') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" wire:model="image">
                                         @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                {{-- description --}}
                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">description</label>
                                            <div wire:ignore>
                                                <textarea id="editor" wire:model="description" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                                            </div>
                                            <script>
                                                    document.addEventListener('livewire:load', function () {
                                                        // Get the CSRF token from the meta tag
                                                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                                        CKEDITOR.replace('editor', {
                                                            // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                                                            // filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                                                            // filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                                                            // filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                                                            // filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                                                            // headers: {
                                                            //     'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                                                            // },
                                                            
                                                        });
                                            
                                                        CKEDITOR.instances.editor.on('change', function () {
                                                            @this.set('description', CKEDITOR.instances.editor.getData());
                                                        });
                                                        Livewire.on('formSubmitted', function () {
                                                        CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                                                        // document.querySelector('[wire:model="image"]').reset();

                                                                    });
                                                            });
                                            </script>
                                             @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control @error('sort') is-invalid @enderror"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror" wire:model="status">
                                                <option value="">Select</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addStaff" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addStaff">
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
                            <h4 class="card-title">Manage Staff</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Image</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->Department->name ?? '' }}</td>
                                            <td>{{$record->name ?? '' }}</td>
                                            <td>{{$record->designation ?? '' }}</td>
                                            <td>
                                               @php
                                              
                                    $thumb = !empty($record->image) ?  getThumbnail($record->thumbnail)  : url('admin_assets/images/no-img.jpg');
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
                                                <a href="{{url('/admin/edit/staff')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
