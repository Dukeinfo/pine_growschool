<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> Create & Manage FAQ </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active"> Manage FAQ</li>
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
                            <h4 class="card-title">Create  FAQ</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form  wire:submit.prevent="createFaq" >


                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label"> Faqs Category</label>

                                        <select wire:model="faq_categories_id" class="form-select">
                                            <option  value="">Select</option>
                                        	
                                            @forelse ($faqCategory as $category )
                                                
                                            <option value="{{$category->id}}">{{$category->name ?? ''}}</option>
                                            @empty
                                                
                                            @endforelse 
                                        
                                        </select>
                                        
                                        @error('faq_categories_id') <span class="error">{{ $message }}</span> @enderror
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
                        
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Question</label>
                                        <input type="text" class="form-control" id="" wire:model="question" placeholder="Category">
                                        @error('question') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                              

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Answer</label>
                                        <textarea type="text" class="form-control" id="" rows="5"  wire:model="answer" placeholder="Category">{{ $answer ?? ''}}</textarea>
                                        @error('answer') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                              
                          

                               <div>
                                <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" >Submit</button>
                               
                            </div>
                            <div wire:loading wire:target="addCategory">
                                <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                             </div>
                            </div>
                        </form>

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
                            <div class="col-md-3 float-end">
                                <div class="form-group">
    
                                    <div class="mb-3">
                                        <label class="form-label">Search</label>
                                        <input type="Search" class="form-control"  wire:model="search" placeholder="Search...">
                                         @error('Search') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                </div>
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
                                      @if(isset($faqDataList) && count($faqDataList)>0 )                      
                                      @foreach ($faqDataList as $record)
                                        <tr>
                                            <td>{{ isset($record->faq_categories_id) ? getFaqName($record->faq_categories_id)  : '' }}</td>
                            
                                            <td>  {!! Str::limit($record->question, 30) ?? '' !!}</td>
                                            <td> {!! Str::limit($record->answer, 30) ?? '' !!}
                                            
                                                
                                            </td>

                                            <td><span class="badge badge-soft-success">{{$record->status ?? '' }}</span></td>
                                            <td>
                                                <button  class="btn btn-sm btn-danger"  wire:click="delete({{ $record->id }})">Delete</button>

                                                <button  class="btn btn-sm btn-primary"  wire:click="editFaq({{ $record->id }})">Edit</button>
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
