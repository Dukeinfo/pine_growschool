<div>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Admin Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
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
                            <h4 class="card-title">update Admin Profile</h4>
                        </div>
                        <div class="card-body">
           
                            <form  enctype="multipart/form-data" wire:submit.prevent="updateadminProfile">
                            <!--form starts-->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="" wire:model="name" >
                                        @error('name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="" wire:model="email">
                                        @error('email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Profile</label>
                                        <input type="file" class="form-control" id="" wire:model="profile" >
                                        @error('profile') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                              
                                        
                                        <img src="{{ asset('storage/uploads').'/'.$this->profile_photo_path }}" alt="Image" width="100" height="70"/>
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
                            <h4 class="card-title">Update Admin Password</h4>
                        </div>
                        <div class="card-body">
                        
                            {{-- password  --}}
                            <!--form starts-->
                        <!-- resources/views/livewire/reset-password.blade.php -->

<div>
  <!-- resources/views/livewire/reset-password.blade.php -->

<div>
    <form wire:submit.prevent="resetPassword">
        <input type="hidden" wire:model="token">

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Old Password</label>
                <input type="password" id="old_pass" class="form-control" wire:model="old_pass" placeholder="Old Password" required>
                @error('old_pass') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control" wire:model="password" placeholder="Mew Password" required>
                @error('password') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" wire:model="password_confirmation" required>
                @error('password_confirmation') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary w-md">Reset Password</button>
        </div>
        <div wire:loading wire:target="resetPassword">
            <img src="{{ asset('loading.gif') }}" width="30" height="30" class="m-auto mt-1/4">
        </div>
    </form>
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
