<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Slider</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Slider</li>
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
                            <h4 class="card-title">Add Slider</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            
                            <form>
                            {{-- <!--form starts--> --}}
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Name</label>
                                        <input type="text" class="form-control" id="" wire:model="name" placeholder="">
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Slider Image</label>
                                        <input type="file" class="form-control" id="" wire:model="editimage" placeholder="">
                                
                                     @if(isset($editimage))  
                                         <img  src="{{$editimage->temporaryUrl()}}" width="200" alt="---"  width="100" height="70">  
                                     @else
                                     <img src="{{ asset('storage/uploads').'/'.$image }}" alt="Image"  width="100" height="70"/>

                                    @endif
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sorting Order#</label>
                                        <input type="number" class="form-control" id="" wire:model="sort">
                                        @error('sort') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" id="" wire:model="heading" placeholder="">
                                        @error('heading') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Heading</label>
                                        <input type="text" class="form-control" id="" wire:model="subheading" placeholder="">
                                        @error('subheading') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-2" >
                                    <div class="mb-3" wire:loading.remove>
                                        <label class="form-label">&nbsp;</label><br>
                                        <button type="button" wire:click="editSlider" class="btn btn-primary w-md" >Save</button>
                                    </div>
                                     <div wire:loading wire:target="editSlider">
                                        <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">

                                    </div>
                                </div>


                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
        </div>
        <!-- container-fluid -->
    </div>
</div>
