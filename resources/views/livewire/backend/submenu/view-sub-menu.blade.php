<div>
 <!-- Add this line to include the CSRF token -->

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sub Menu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Sub Menu</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form wire:submit.prevent="addsubMenu">
                @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Add Sub Menu</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                           
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Select menu  <span class="text-danger">*</span></label>
                                        <select class="form-select"   wire:model="menu_id">
                                            <option value=""> Select menu</option>
                                        @if(isset($getMenus))
                                            @foreach($getMenus as $menu)
                                              <option value="{{$menu->id}}"> {{$menu->name}}</option>
                                            @endforeach
                                        @endif    
                                            </select>
                                        @error('menu_id') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Submenu  Name  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  wire:model="name" placeholder="Submenu  Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#  <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Number"  wire:model="sort_id">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                     
                         
                            </div>
                     
                            {{-- =================== --}}
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Create Through CMS  <span class="text-danger">*</span></label>
                                        <select wire:model="cms" class="form-select"   >
                                            <option value=""> Select menu</option>
                                                <option value="Yes"> Yes</option>
                                                <option value="No"> No</option>

                                            </select>
                                        @error('cms') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>

                           
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label"> Page Name</label>
                                        <input type="text" class="form-control"  wire:model="pname" placeholder="Page Name" {{$cms == "Yes" ? 'disabled' : ''}} >
                                        @error('pname') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                          
                            <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Upload image  <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control"   wire:model="image">
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> URL Name</label>
                                        <input type="text" class="form-control" {{$cms == "No" ? 'disabled' : ''}}   wire:model="url_link" 
                                        placeholder="URL Name">
                                        @error('url_link') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Display Name</label>
                                        <input type="text" class="form-control"  {{$cms == "No" ? 'disabled' : ''}}   wire:model="display_name" placeholder="Display Name">
                                        @error('display_name') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Title</label>
                                        <input type="text" class="form-control"  wire:model="seo_title" placeholder="Seo Title">
                                        @error('seo_title') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                           
                             
                                    <div class="col-md-12">
                                            <div class="mb-3" wire:ignore>
                                                <label class="form-label"> Seo Description</label>
                                                <textarea id="editor" wire:model="seo_description" placeholder="Seo Description here..." class="form-control xtra-cat"></textarea>
                                                @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        
                                    
                    
                     
                                   
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Keywords</label>
                                        <input type="text" class="form-control"  wire:model="seo_keywords" placeholder="Seo Keywords">
                                        @error('seo_keywords') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                            <select wire:model="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div>
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" >Submit</button>
                                   
                                </div>
                                <div wire:loading wire:target="addsubMenu">
                                    <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- end row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Manage Menus</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Menu</th>
                                            <th>Image</th>
                                            <th>Sub Menu</th>
                                            <th>CMS</th>
                                            <th>Page Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                 @if(isset($records) && count($records)>0 )                      
               @foreach ($records as  $record)
                 
                                        <tr><td>
                                            {{$record->sort_id ?? '' }} 
                                        </td>
                                            <td> {{$record->Menu->name ?? '' }}</td>
                                            <td>  
                                                <img src="{{ getThumbnail($record->thumbnail) }}" alt="Image" width="100" height="70"/>
                                            
                                            </td>
                                            <td>{{$record->name ?? '' }}</td>
                                          
                                            <td>{{$record->cms ?? '' }}</td>
                                            <td>{{$record->pname ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}<</span></td>
                                            <td>
                                                <a href="{{url('/admin/edit/submenu')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                 @endforeach
                                      @else
                                 <tr>
                                 <td colspan="7"> Record Not Found</td>
                                
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


            <script>
                document.addEventListener('livewire:load', function () {
                    // Get the CSRF token from the meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
                    CKEDITOR.replace('editor', {
                        // filebrowserUploadUrl: '{{ route("image.upload") }}', // Set the image upload endpoint URL
                        filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form', // Use form-based file upload (default is XMLHttpRequest)
                        filebrowserBrowseUrl: '/ckfinder/ckfinder.html', // Set the CKFinder browse server URL
                        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images', // Set the CKFinder image browse server URL
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Pass the CSRF token with the request headers
                        },
                        
                    });
        
                    CKEDITOR.instances.editor.on('change', function () {
                        @this.set('seo_description', CKEDITOR.instances.editor.getData());
                    });
                        Livewire.on('formSubmitted', function () {
                            CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                            // document.querySelector('[wire:model="image"]').reset();
           
                 });
                    
                });
            </script>
      
        </div>
        <!-- container-fluid -->
    </div>
</div>
