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
                                        <label class="form-label">Select menu</label>
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
                                        <label class="form-label"> Name</label>
                                        <input type="text" class="form-control"  wire:model="name" placeholder="">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control"   wire:model="sort_id">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                     
                         
                            </div>
                            {{-- =================== --}}
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Create Through CMS</label>
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
                                        <input type="text" class="form-control"  wire:model="pname" placeholder="">
                                        @error('pname') <span class="error">{{ $message }}</span> @enderror
                                   
                                    </div>
                                </div>
                              
                                <!-- <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Upload image </label>
                                        <input type="file" class="form-control"   wire:model="sort_id">
                                        @error('sort_id') <span class="error">{{ $message }}</span> @enderror
                                    
                                    </div>
                                </div>
                                 -->
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
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md" wire:click="editsubMenu">Save</button>
                                   
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
