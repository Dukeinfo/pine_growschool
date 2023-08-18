<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage All  Static Pages Content</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Add Pages Content</li>
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
                            <h4 class="card-title">Add Content</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="menu">
                                                <option value="">Select</option>
                                            @if(isset($getMenus))
                                            @foreach($getMenus as $menu)
                                              <option value="{{$menu->id}}"> {{$menu->name}}</option>
                                            @endforeach
                                        @endif 
                                              
                                        </select>
                                         @error('menu') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Menu <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="submenu">
                                                <option value="">Select</option>
                                               @if (!is_null($subMenus)) 
                                                @foreach($subMenus as $submenu)
                                                   <option value="{{ $submenu->id }}">{{ $submenu->name }}</option>
                                              @endforeach
                                               @endif 
                                              
                                        </select>
                                         @error('submenu') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}

                                
                               <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label"> Route Name</label>
                                        <select name="selected_route" wire:model="name"     id="selected_route"   class="form-control">
                                         <option  >Select Route</option>
                                          
                                            @foreach(Route::getRoutes() as $route)
                                            @if (str_starts_with($route->getName(), 'home.') )
                                            @php
                                             $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                            @endphp
                                                <option value="{{ $route->getName() }}"    class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>
                                           @endif
                                                @endforeach
                                        </select>
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Heading <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id=""  wire:model="heading" placeholder="Heading">
                                        @error('heading') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                 <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Heading <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" id=""  wire:model="sub_heading" placeholder="Heading">
                                        @error('sub_heading') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                      
                          
                                 <div wire:ignore>
                                         <textarea id="editor" wire:model="desc" placeholder="Description of Event" class="form-control xtra-cat"></textarea>
                                 </div>
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
                                                    @this.set('desc', CKEDITOR.instances.editor.getData());
                                                });


                                                Livewire.on('formSubmitted', function () {
                                                                CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                                                    });
                                            });
                                        </script>


                                                                           
                                    </div>
                                </div>

                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="" wire:model="editimage" >
                                        @if(isset($editimage))  
<img  src="{{$editimage->temporaryUrl()}}" width="200" alt="---"  width="100" height="70">  
@else                                        
@php   
$thumb = !empty($thumbnail) ?  getThumbnail($thumbnail)  : url('admin_assets/images/no-img.jpg');
@endphp                                      
<img src="{{$thumb}}" alt="" class="border" width="100" height="70">
@endif
                                        @error('editimage') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Redirect or Target Link </label>
                                    <input type="text" class="form-control" id="" wire:model="link"  placeholder="Link">
                                    @error('link') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order# <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control"  wire:model="sort" placeholder="Order NUmber">
                                         @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" wire:model="status">
                                                <option value="">Select</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                        </select>
                                         @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div >
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editContent" class="btn btn-primary w-md">Save</button>
                                </div>
                                 <div wire:loading wire:target="editContent">
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
