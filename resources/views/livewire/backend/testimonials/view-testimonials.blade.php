<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Testimonials</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Testimonials</li>
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
                            <h4 class="card-title">Add Testimonial</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                        <!--     <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>
                                        Aww yeah, you successfully updated the record. check it out!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        Oops! Something went wrong. check it out!
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div> -->
                            
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Name of Student or Alumni</label>
                                        <input type="text" class="form-control" id=""  wire:model="name" placeholder="">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Profile Photo</label>
                                        <input type="file" wire:model="image" id="" class="form-control">
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sort Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort_id">
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
                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Message</label>
                                       <!--  <textarea wire:model="desc" class="form-control" name="" id="" cols="" rows="6"></textarea> -->

                                        <div wire:ignore>
        <trix-editor
            class="formatted-content"
            x-data
            x-on:trix-change="$dispatch('input', event.target.value)"
            x-ref="trix"
            wire:model.defer="desc"
            wire:key="uniqueKey"
        ></trix-editor>
    </div>  
    @error('desc') <span class="error">{{ $message }}</span> @enderror                                     
                                    </div>
                                </div>
                                <div wire:loading.remove>
                                    <button type="submit" wire:click="viewTestimonials" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="viewTestimonials">
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
                            <h4 class="card-title">Manage Testimonials</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Message</th>
                                            <th>Sort#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
      @if(isset($records) && count($records)>0 )                      
                       @foreach ($records as  $record)                     
                                
                                        <tr>
                                            <td>{{$record->name ?? '' }}</td>
                                            <td>
                                                 @if(isset($record->photo))
                                                    <img src="{{ asset('storage/uploads').'/'.$record->photo }}" alt="Image" width="100" height="70"/>
                                                    @else
                                                    <!-- default image -->
                                                <img src="{{asset('admin_assets/images/no-img.jpg')}}" alt="" class="border" width="100" height="70">
                                                @endif
                                            </td>
                                            <td>
                                                {!! $record->description  ?? '' !!}
                                            </td>
                                            <td>{{$record->sort_id  ?? ''}}</td>
                                            <td><span class="badge badge-soft-danger">{{$record->status  ?? ''}}</span></td>
                                            <td>
                                                <a href="{{url('/admin/edit/testimonials')}}/{{$record->id }}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
