<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Why Us Page</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Why Us Page</li>
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
                            <h4 class="card-title">Why Us Page</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">

                                 <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Page Sections</label>
                                            <select wire:model="category" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Unlocking Excellence">Unlocking Excellence</option>
                                                <option value="Where Excellence Meets Education">Where Excellence Meets Education</option>
                                                <option value="International Exchange Programs">International Exchange Programs</option>
                                                
                                            </select>
                                        @error('category') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>

                            	
                                <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label"> Title</label>
                                        <input type="text" class="form-control" id="" wire:model="title" placeholder="Title">
                                        @error('title') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                  <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" class="form-control" id="" wire:model="sub_title" placeholder="Sub Title">
                                        @error('sub_title') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                               

                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Description</label>
                                      
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

                                                // document.querySelector('[wire:model="image"]').reset();

                                                            });
                                                    });
                                            </script>
                                 @error('desc') <span class="error">{{ $message }}</span> @enderror
                                     
                                    </div>
                                </div>

                                {{-- <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label"> List Item</label>
                                        <input type="text" class="form-control" id="" wire:model="item.0" placeholder="List Item">
                                        @error('item') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                                </div> --}}

                                {{-- @foreach($inputs as $key => $value)
                                 <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label"> List Item</label>
                                        <input type="text" class="form-control" id="" wire:model="item.{{ $value }}" placeholder="List Item">
                                        @error('item') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                                </div>
                              @endforeach --}}
                              @if($category == 'Where Excellence Meets Education' || $category == 'International Exchange Programs')
                              <div class="col-md-3">
                                  <div class="mb-3">
                                      <label class="form-label">Choose Multiple Images </label>
                                      <input type="file" class="form-control" id="" wire:model="edit_multi_images"  multiple>
                                      @error('edit_multi_images.*') <span class="error">{{ $message }}</span> @enderror
                                  </div>
                                  @foreach($getMultiple as $image)
                                  <div style="display:inline-block">
                                      <img src="{{getmultiple_images($image->multi_images)}}" alt="" width="50">

                                      <a href="" wire:click='deletemultiple({{$image->id}})'><i class="fa fa-times fa-fw fa-lg"></i></a>
                                    </div>
                                 @endforeach
                                 
                              </div>


                          @else
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
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
@endif
                                <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label"> Link</label>
                                        <input type="url" class="form-control" id="" wire:model="link" value="https://example.com/" placeholder="http://example.com">
                                        @error('link') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                              
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort_id" placeholder="Sorting Order" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select wire:model="status" class="form-select">
                                        	 <option value="">Select</option>
                                             <option value="Active">Active</option>
                                             <option value="Inactive"> Inactive </option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                        

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="editWhyus">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="editWhyus">
                                <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
        </div>
        <!-- container-fluid <-->	
    </div>
</div>
