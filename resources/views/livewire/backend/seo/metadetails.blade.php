<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Meta Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Meta Details</li>
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
                            <h4 class="card-title">Add Meta Details</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                               
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Choose Page</label>
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
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Title</label>
                                        <input type="text" class="form-control"  wire:model="seo_title" placeholder="Seo Title">
                                        @error('seo_title') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3" wire:ignore>
                                        <label for="" class="form-label">Description</label>
                                        <textarea name="seo_description" wire:model="seo_description" id="editor" cols="" rows="6" class="form-control" placeholder="Description type here..."></textarea>
                                        <script>
                                    document.addEventListener('livewire:load', function () {
                                        CKEDITOR.replace('editor');
                                
                                        CKEDITOR.instances.editor.on('change', function () {
                                            @this.set('seo_description', CKEDITOR.instances.editor.getData());
                                    
                                      
                                        });
                                         Livewire.on('formSubmitted', function () {
                                         CKEDITOR.instances.editor.setData(''); // Reset CKEditor content
                                       
                                                  
                                          });
                                    });
                                </script>
                                
                                        @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Keywords</label>
                                        <input type="text" class="form-control"  wire:model="seo_keywords" placeholder="Seo Keywords">
                                        @error('seo_keywords') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md" wire:click="addMeta">Submit</button>
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
                            <h4 class="card-title">Manage Meta Details</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Keywords</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      @if(isset($records) && count($records)>0 )                      
                       @foreach ($records as  $record)                     
                                
                                        <tr>
                                            <td>{{$record->Menu->name ?? '' }}</td>
                                            
                                            <td>
                                                {{$record->title ?? '' }}
                                            </td>
                                            <td>{!!$record->description  ?? ''!!}</td>
                                             <td>{{$record->keywords  ?? ''}}</td>
                                            <td>
                                                @if($record->status  == "Active")
                                                    <span class="badge badge-soft-success">{{$record->status  ?? ''}}</span></td>
                                                @else
                                                    <span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                                @endif
                                                <td>
                                                <a href="{{url('/admin/edit/seo')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="javascript:void(0)" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg" wire:click="delete({{ $record->id }})"></i></a>
                                            </td>
                                        </tr>
                                   @endforeach
                                      @else
                                 <tr>
                                 <td colspan="6"> Record Not Found</td>
                                
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
