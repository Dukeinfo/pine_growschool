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
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label"> Route Name</label>
                                        <select name="selected_route" wire:model="name"     id="selected_route"   class="form-control">
                                         <option  >Select Route</option>
                                          
                                            @foreach(Route::getRoutes() as $route)
                                            @if (str_starts_with($route->getName(), 'home.') )
                                            @php
                                             $routeName   = ucwords(str_replace('home.','',$route->getName() )  )
                                            @endphp
                                                <option value="{{ $route->getName() }}"    class="form-control">{{ str_replace('_' , ' ',$routeName)}}</option>
                                           @endif
                                                @endforeach
                                        </select>
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
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
                                        <textarea name="seo_description" wire:model="seo_description"   cols="" rows="6" class="form-control" placeholder="Description type here..."></textarea>
                 
                                
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
                                    <button type="submit" class="btn btn-primary w-md" wire:click="editMeta">Submit</button>
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
