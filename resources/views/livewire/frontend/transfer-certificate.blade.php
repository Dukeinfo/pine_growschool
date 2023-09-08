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
                    <h5 class="subTitle">Transfer Certificate</h5>
                   <!--  <h2 class="secTitle">Our Location</h2> -->
  <h2>Enter Admission Number</h2>
 
  <form>
   <div class="mb-3 mt-3">
    <label for="text" class="form-label">Admission Number:</label>
    <input type="search" class="form-control" id="admno" placeholder="Enter Admission Number" wire:model="search">
    @error('search') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  <div class="mb-3 mt-3">

   <button type="button" class="btn btn-primary" wire:click="searchresult">Submit</button>
  </div>
  </form> 


       @if (isset($records)  )
       <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Admission Number</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($records as $record)
                                <tr>
                                    <td>{{ $record->admission_no  ?? '' }}</td>
                                     <td>{{ $record->name  ?? '' }}</td>
                                    <td>{{ $record->Class->classname  ?? '' }}</td>
                                    <td>{{ $record->Section->name  ?? '' }}</td>
                                    
                                     <td><a href="javascript:void(0)" wire:click="download('{{$record->id}}')" download=""> Download </a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">

                                        <p>Record not Found </p>
                                    </td>
                                    </tr>     
                                @endforelse
            
                             
                               
                            </tbody>
                        </table>
                    </div>
   @endif    
	
                    </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
