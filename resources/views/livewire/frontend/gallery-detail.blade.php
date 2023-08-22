<div>
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    
        <!-- BEGIN: Hero Banner Start -->
 
        <!-- END: Hero Banner End -->
    
      <!-- BEGIN: Hero Banner Start -->
      <section class="pageBanner" style="background-image: url({{asset('assets/images/bg/school-bg.jpg')}});">

        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="bannerTitle">Picture Gallery</h2>
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a>
                        <span>/</span>
                        <a href="javascript:void()">Memories</a>
                        <span>/</span>
                        Picture Gallery
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Hero Banner End -->

    <!-- BEGIN: Section -->
    <section class="serviceSection02">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar lft">
                        <aside class="widget">
                            <h3 class="widgetTitle">Quick Links</h3>
                            <ul>
                                <li><a href="javascript:void()">Our Founder</a></li>
                                <li><a href="javascript:void()">Alumni</a></li>
                                <li><a href="javascript:void()">Guest Book</a></li>
                                <li><a href="javascript:void()">Grapevine</a></li>
                                <li><a href="javascript:void()">Roll of Hounour</a></li>
                                <li><a href="javascript:void()" class="active">Picture Gallery</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h5 class="subTitle">Picture Gallery</h5>
                    <h2 class="secTitle">{{$category}}</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A ducimus similique error asperiores fugit provident iure beatae odit cumque, doloribus vero fugiat ex, rerum quidem maxime iste maiores consectetur? Aliquid voluptatum sunt illum eius!</p>

                    <div class="row photos g-4">
                        @if(isset($records) && count($records)>0 )                      
                        @foreach ($records as  $record) 

                         <div class="col-sm-6 col-md-4 col-lg-4 item">
                             <a href="{{ getGallerydetail($record->image) }}" data-lightbox="photos">
                                 <img class="img-fluid" src="{{ getGallerydetail($record->image)}}">
                                </a>
                                @php
                                $catName =    getGalCategory($record->category_id);
                                $caption =   $record->year  .'_'.$record->title
                                @endphp


                                <p>{!!Str::limit($caption, 30)  ?? ''!!} </p>

                               
                            </div>
                       @endforeach
                           @endif

   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Section -->
</div>
