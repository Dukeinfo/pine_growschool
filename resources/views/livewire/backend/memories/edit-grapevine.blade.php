<div>
    
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Grapevine</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item">Portfolio</li>
                                <li class="breadcrumb-item active">Grapevine</li>
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
                            <h4 class="card-title">Add Grapevine</h4>
                            <p class="card-title-desc mb-0">Fill out the particulars in order to add or update.</p>
                        </div>
                        <div class="card-body">
                            <!--success or error alert-->
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" id="grapDate"  wire:model="grapDate" placeholder="Date" onchange='Livewire.emit("selectDate", this.value)' autocomplete="off">

                                        @error('grapDate') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                               

                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Select Year</label>
                                        <select name="year"  wire:model="year" id="year" class="form-control">
                                            <option value="">Select Year</option>
                                          
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}" {{$currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                         @error('year') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                               

                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Issue Number</label>
                                        <input type="text" class="form-control" id=""  wire:model="issuenumber" placeholder="Issue Number">
                                        @error('issuenumber') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                             
                                 <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">File</label>
                                        <input type="file" class="form-control" id="" wire:model="editdocument" >
                                        @error('editdocument') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <a href="javascript:void(0)" wire:click="download('{{$document ?? '' }}')"> Download </a>

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
                                    <button wire:loading.attr="disabled" type="submit" wire:click="editGrapevine" class="btn btn-primary w-md">Submit</button>
                                </div>
                                 <div wire:loading wire:target="editGrapevine">
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
