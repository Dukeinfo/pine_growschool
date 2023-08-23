<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Manage Contact info</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Contact us </li>
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
                            <h4 class="card-title">Manage Contact info</h4>
                        </div>

                        
                        <div class="card-body">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                         
                          
                    
                        <form wire:submit.prevent="store" enctype="multipart/form-data">

                            <!--form starts-->
                            <div class="row g-3">
                           
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="" wire:model="email" placeholder="Email">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">phone</label>
                                        <input type="text" class="form-control" id="" wire:model="phone"  placeholder="phone" onkeypress="return event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57">
                                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" id="" wire:model="address"  placeholder="Address">
                                        @error('address') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">logo</label>
                                        <input type="file" class="form-control" id="" wire:model="logo" >
                                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">footer logo</label>
                                        <input type="file" class="form-control" id="" wire:model="footer_logo" >
                                        @error('footer_logo') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Desclaimer</label>
                                        <textarea  rows="5" cols="5" class="form-control" id="" wire:model="disclaimer" placeholder="Footer Desclaimer" ></textarea>
                                        @error('disclaimer') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Map ifrmae</label>
                                        <textarea  rows="5" cols="5" class="form-control" id="" wire:model="map" placeholder="Map Frmae"></textarea>
                                        @error('map') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                      

                                <div>
                                    <button type="submit" wire:loading.attr="disabled"  class="btn btn-primary w-md">Update Profile</button>
                                </div>
                                <div wire:loading wire:target="updateadminProfile">
                                     <img src="{{asset('loading.gif')}}" width="30" height="30" class="m-auto mt-1/4">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
          
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom py-3">
                            <h4 class="card-title">Update Contact </h4>
                        </div>
                        <div class="card-body">
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Logo</th>
                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->address }}</td>
                                            <td>
                                                @if ($contact->logo)
                                                    <img src="{{ asset('storage/' . $contact->logo) }}" alt="Logo" width="50">
                                                @endif
                                            </td>
                               
                                            <td>
                                                <button wire:click="edit({{ $contact->id }})" class="btn btn-sm btn-primary">Edit</button>
                                                <button wire:click="delete({{ $contact->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            
        </div>
        <!-- container-fluid -->
    </div>
   
</div>
