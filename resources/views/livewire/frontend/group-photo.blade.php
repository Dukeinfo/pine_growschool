<div>
   
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    <!-- END: Header Section -->

    <!-- BEGIN: Hero Banner Start -->
    @include('livewire.frontend.common.herobanner')

    <!-- END: Hero Banner End -->

    <!-- BEGIN: Section -->
    <section class="serviceSection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar lft">
                        @livewire('frontend.common.quick-links')

                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="subTitle">Group Photos (Faculty Year)</h5>
                   <!--  <h2 class="secTitle">Our Location</h2> -->
  <h2>Academic Year</h2>
 
  <form>
   <select class="form-select" wire:model='year' >
   	 <option value="">Select</option>
   	@if (count($years) >0 )
      @foreach($years as $year)
     <option>{{$year->year}}</option>
     @endforeach
       @endif 
   </select>
    @error('year') <span class="error">{{ $message }}</span> @enderror
   <br>
   <button type="button" class="btn btn-primary" wire:click="search">Submit</button>

  </form> 
  
	@if(isset($image) && !empty($image) )
	<br>
	  <img class="img-fluid" src="{{ getGroupPhoto($image->image)}}" >

	 @endif 
                    </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
