<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Guest Book</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Guest Book</li>
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
                            <h4 class="card-title">Add Guest Book</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" id="picDate"  wire:model="picDate" placeholder="Date" onchange='Livewire.emit("selectDate", this.value)' autocomplete="off">

                                        @error('picDate') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                               
                               

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Visitor</label>
                                        <input type="text" class="form-control" id=""  wire:model="visitor" placeholder="Visitor">
                                        @error('visitor') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Comment</label>
                                    
                                 <div wire:ignore>
                                         <textarea id="editor" wire:model="desc" placeholder="Comment" class="form-control xtra-cat"></textarea>
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
                    
                                           @error('desc') <span class="error">{{ $message }}</span> @enderror                          
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
                                    <button wire:loading.attr="disabled" type="submit" wire:click="addGuestBook" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addGuestBook">
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
                            <h4 class="card-title">Manage Guest Book</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Visitor</th>
                                            <th>Comment</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @if(isset($records) && count($records)>0 )                      
                           @foreach ($records as  $record) 
                                        <tr>
                                            <td>{{$record->date ?? '' }}</td>
                                            <td>{{$record->visitor ?? '' }}</td>
                                            
                                            <td>{!!$record->comment ?? '' !!}</td>
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td>
@if($record->status  == "Active")
        <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
         @else
       <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
@endif</td>
                                            <td>
                                                <a href="{{url('/admin/edit/guest-book')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
