<div>

    <div class="row">

       <section class="col-md-6 my-5 offset-md-3">
        <div class="flashMsg">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
      <div class="card shadow p-5">
        <form wire:submit.prevent="checkLogin">
          <h3 class="text-center text-uppercase mb-4">Login</h3>
          <hr>
          <div class="form-group">
            <label>Email</label>
            <input type="text" wire:model="email" placeholder="Email" class="form-control">
            @error('email') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" wire:model="password" placeholder="Password" class="form-control">
            @error('password') <span class="error">{{ $message }}</span> @enderror
          </div>
 
          <button class="btn btn-block btn-secondary rounded-pill mt-3" type="submit" >Login</button>

          <!-- <p class="mt-3 text-white">Don't have an Account ? <a href="#" class="text-white"> Create Here</a></p> -->

        </form>
      </div>
    </section>
        </div>
</div>
