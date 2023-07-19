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
                            <div class="row">
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
                            </div>
                            
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
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sort Order#</label>
                                        <input type="text" class="form-control" id="" wire:model="sort">
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
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3" >
                                        <label class="form-label">Message</label>
                                        <textarea wire:model="desc" class="form-control" name="" id="" cols="" rows="6"></textarea>
                                    </div>
                                </div>
                                <div wire:loading.remove>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="addSlider">
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
                                        <tr>
                                            <td>Yuvraj Singh</td>
                                            <td>
                                                <img src="{{asset('admin_assets')}}/images/no-img.jpg" alt="" class="rounded-circle border" width="60">
                                            </td>
                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum sit nobis iure?
                                            </td>
                                            <td>1</td>
                                            <td><span class="badge badge-soft-success">Active</span></td>
                                            <td>
                                                <a href="#" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="#" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mahendra Dhoni</td>
                                            <td>
                                                <img src="{{asset('admin_assets')}}/images/no-img.jpg" alt="" class="rounded-circle border" width="60">
                                            </td>
                                            <td>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut provident excepturi praesentium.
                                            </td>
                                            <td>2</td>
                                            <td><span class="badge badge-soft-danger">Inactive</span></td>
                                            <td>
                                                <a href="#" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="#" class="text-danger me-2" title="Delete"><i class="fa fa-times fa-fw fa-lg"></i></a>
                                            </td>
                                        </tr>
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
