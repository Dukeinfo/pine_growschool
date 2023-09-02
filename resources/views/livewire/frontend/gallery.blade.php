<div>
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    
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
                   
                        <h5 class="subTitle">Showcasing Our Culture</h5>
                        <h2 class="secTitle">Picture Gallery</h2>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium tempore omnis nostrum alias
                            ex ea consequuntur atque earum, iusto perferendis!</p> --}}
              <div class="col-md-12 mb-5" >
                <form  wire:submit.prevent='searchGallery'>
                    
                     <div class="col-md-8">
                            <label>
                                <input type="radio" wire:model="searchField" value="albumTitle" name="search"> Album Title
                           
                            <label>
                                <input type="radio" wire:model="searchField" value="year" name="search"> Year
                            </label>
                            <label>
                                <input type="radio" wire:model="searchField" value="adminNo" name="search"> By Admission No
                            </label>
                            <label>
                                <input type="radio" wire:model="searchField" value="studentName" name="search"> By Student Name
                            </label>
      
                            <div class="col-md-4">
                            @if ($searchField === 'albumTitle')
                                <select wire:model="search"  class="form-control">
                                    <option value="">Select option</option>
                                        @forelse ($getcategorywise as $category)
                                        <option value="{{$category->category_id}}"> {{$category->galCategory->name}}</option>
                                        @empty
                                        <p>No option</p>
                                        @endforelse
                                </select>
                            </div>
                            <div class="col-md-4">

                            @elseif ($searchField === 'year')
                                <select name="year"  wire:model="search"  id="year" class="form-control" >
                                    <option value="" >Select Year</option>
                                    @forelse ($getYearwise as $galCategory)
                                        <option value="{{ $galCategory->year }}" >{{ $galCategory->year }}</option>
                                        @empty
                                        <p>No option</p>
                                        @endforelse
                                </select>
                         

                            @elseif ($searchField === 'adminNo')
                                <input type="search" wire:model="search" placeholder="By Admission No">
                         

                                @elseif ($searchField === 'studentName')
                                <input type="search" wire:model="search" placeholder="By Student Name">
                         

                                @endif
                            <button type="submit"  wire:loading.attr="disabled" class="btn btn-primary">
                                Go
                            </button>

                            <a href="" wire:click="resetinput"> Reset all</a>
                        </div>
                       
                    </div>
                </form>


              </div>
                        <div class="row">
                          @if(isset($galleryimages))
                          @forelse ($galleryimages as $galleryimage)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="blogItem01 biMB">
        
                                        <div class="blogThumb">
                                            <img src="{{ isset($galleryimage->galCategory->image) ? getGalleryImage($galleryimage->galCategory->image) : asset('no_image.jpg') }}" alt="">

                                        </div>
                                        <div class="blogContent p-4">
                                            @php
                                            $photos = App\Models\Gallery::where(['category_id'=> $galleryimage->galCategory->id,'status'=>'Active' ])->get();  
                                            $count = count($photos);    
                                          @endphp
                                            <sapn class="small">
                                                <i class="fa fa-images me-2"></i> Total Photos: {{  $count}}
                                            </sapn>
                                            <h5>
                                                <a href="{{route('gallery_detail',['category_id' => $galleryimage->galCategory->id])}}" class="text-dark">{{$galleryimage->galCategory->name ?? ''}}</a>
                                            </h5>
                                            {{-- <a class="rmBtn" href="">View More --}}
                                            <a class="rmBtn" href="{{route('gallery_detail',['category_id' => $galleryimage->galCategory->id])}}">View More

                                                <svg fill="#E94D4E" width="12" height="10" viewBox="0 0 12 10"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 5.71429V4.28571H9L6 1.42857L6.75 0L12 5L6.75 10L6 8.57143L9 5.71429H0Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                     <p>No Data found</p>
                                @endforelse
                            
                             
                            @endif
                                {{-- pagination section  --}}
                                <div class="col-lg-5 mx-auto mt-5">
                                    <nav class="justify-content-center">
                                   
                                        {!! $galleryimages->links() !!}

                                    </nav>
                                </div>

                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
    
                           


</div>
