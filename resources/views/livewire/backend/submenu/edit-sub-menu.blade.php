<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sub Menu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Sub Menu</li>
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
                            <h4 class="card-title">Add Sub Menu</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            
                            
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Select menu  <span class="text-danger">*</span></label>
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


                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Submenu  Name  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  wire:model="name" placeholder="Submenu  Name">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#  <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Number"  wire:model="sort_id">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                     
                         
                            </div>
                            {{-- =================== --}}
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Create Through CMS  <span class="text-danger">*</span></label>
                                        <select wire:model="cms" class="form-select"   >
                                            <option value=""> Select menu</option>
                                                <option value="Yes"> Yes</option>
                                                <option value="No"> No</option>

                                            </select>
                                        @error('cms') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>

                           
                         

                            
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label"> Page Name</label>
                                        <select name="selected_route" wire:model="pname"   @if($cms == "Yes") disabled     @endif  id="selected_route"   class="form-control">
                                            <option  value="">Select page (NULL)</option>

                                          
                                            @foreach(Route::getRoutes() as $route)
                                            @if (str_starts_with($route->getName(), 'home.') )
                                            @php
                                             $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                            @endphp
                                                <option value="{{ $route->getName() }}"    class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>
                                           @endif
                                                @endforeach
                                        </select>
                                        @error('pname') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Upload image  <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control"  @if($cms == "No") disabled  @endif  wire:model="editimage">

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
                                
                             

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> URL Name</label>
                                        <input type="text" class="form-control" {{$cms == "No" ? 'disabled' : ''}}   wire:model="url_link" 
                                        placeholder="URL Name" >
                                        @error('url_link') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Display Name</label>
                                        <input type="text" class="form-control"  {{$cms == "No" ? 'disabled' : ''}}   wire:model="display_name" placeholder="Display Name">
                                        @error('display_name') <span class="error">{{ $message }}</span> @enderror
                                   
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
                                        <label class="form-label"> Seo Description</label>
                                       <textarea  wire:model="seo_description" placeholder="Seo Description here..." class="form-control xtra-cat"></textarea>  @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                   
                                        
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Seo Keywords</label>
                                        <input type="text" class="form-control"  wire:model="seo_keywords" placeholder="Seo Keywords">
                                        @error('seo_keywords') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                            <select wire:model="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        @error('status') <span class="error">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                                <div>
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="editsubMenu">Submit</button>
                                   
                                </div>
                                <div wire:loading wire:target="editsubMenu">
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
