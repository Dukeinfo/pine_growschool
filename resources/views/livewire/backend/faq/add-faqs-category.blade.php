<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> Faqs Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active"> Faqs Category</li>
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
                            <h4 class="card-title">Add Faqs Category</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Faqs Category</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="Category">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
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
                                             <option value="Inactive">Inactive </option>
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
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Keywords</label>
                                        <input type="text" class="form-control"  wire:model="seo_keywords" placeholder="Seo Keywords">
                                        @error('seo_keywords') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                             
                                    <div class="col-md-12">
                                            <div class="mb-3" wire:ignore>
                                                <label class="form-label"> Seo Description</label>
                                                <textarea wire:model="seo_description" rows="5" cols="5" placeholder="Seo Description here..." class="form-control xtra-cat"></textarea>
                                                @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                                            </div>              
                                    </div>
                    
                        

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="addCategory">Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addCategory">
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
                            <h4 class="card-title">Manage Faqs Category</h4>
                            <p class="card-title-desc mb-0">Manage the content by clicking on action accrodingly.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sorting Order#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if(isset($records) && count($records)>0 )                      
                                         @foreach ($records as  $record)	
                                        <tr>
                                            <td>{{$record->name ?? '' }}</td>
                                        
                                            <td>{{$record->sort_id ?? '' }}</td>
                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>

                                                <a href="{{route('edit_faqs_category',['id' => $record->id])}}" class="text-success me-2" title="Edit"><i class="fa fa-edit fa-fw"></i></a>
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
        <!-- container-fluid -->
    </div>
</div>
