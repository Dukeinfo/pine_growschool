<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Knowledge  Home</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Knowledge Home</li>
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
                            <h4 class="card-title">Knowledge  Home</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">


                            	<div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="text" class="form-control" id="" wire:model="logo" placeholder="flaticon-open-book">
                                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                                <div class="col-md-e">
                                    <div class="mb-3">
                                        <label class="form-label"> Title</label>
                                        <input type="text" class="form-control" id="" wire:model="title" placeholder="Title">
                                        @error('title') <span class="error">{{ $message }}</span> @enderror
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
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                        

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addKnowledgeHome">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addKnowledgeHome">
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
                            <h4 class="card-title">Manage Knowledge  Home</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th> Logo</th>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Link</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)	
                                        <tr>
                                            <td>  
                                            {{$record->logo ?? '' }}             
                                            </td>
                                            <td>{{$record->title ?? '' }}</td>
                                           <td>{!!$record->description ?? '' !!}</td>
                                        
                                             <td>{{$record->link ?? '' }}</td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>
                                                <a href="{{url('/admin/edit/knowledge-home')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete" wire:click="delete({{ $record->id }})"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                      @else
                                 <tr>
                                 <td colspan="4"> Record Not Found</td>
                                
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
        <!-- container-fluid <-->	</-->
    </div>
</div>
