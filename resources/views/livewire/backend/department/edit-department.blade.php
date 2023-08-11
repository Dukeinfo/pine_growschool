<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Department</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Department</li>
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
                            <h4 class="card-title">Add Department</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Name</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort" placeholder="Sorting Order" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select wire:model="status" class="form-select">
                                        	 <option value="">Select</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
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
                                            });
 </script>
                                 @error('desc') <span class="error">{{ $message }}</span> @enderror
                                     
                                    </div>
                                </div>

                              

                        

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="editDepartment">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="editDepartment">
                                <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
        </div>
        <!-- container-fluid <-->	</-->
    </div>
</div>
