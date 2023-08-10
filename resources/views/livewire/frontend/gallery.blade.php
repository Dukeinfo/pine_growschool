<div>
    @include('livewire.frontend.common.sidebar')
    <!-- END: Popup Sidebar Widget -->
    @include('livewire.frontend.common.news_ticker')
    
        <!-- BEGIN: Hero Banner Start -->
        <section class="pageBanner" style="background-image: url(assets/images/bg/school-bg.jpg);">
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
                        <h5 class="subTitle">Showcasing Our Culture</h5>
                        <h2 class="secTitle">Picture Gallery</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium tempore omnis nostrum alias
                            ex ea consequuntur atque earum, iusto perferendis!</p>
    
                        <div class="row">
                    @if(isset($categoires))                      
                        @foreach ($categoires as  $category) 

                          @php
                            $photos = App\Models\Gallery::where(['category_id'=> $category->id,'status'=>'Active' ])->get();  
                            $count=count($photos);    
                          @endphp
        
                            <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                    <img src="{{ asset('storage/uploads/gallery_cat').'/'.$category->image }}" alt="">

                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos:{{$count ?? '' }}
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">{{ $category->name ?? '' }}</a>
                                        </h5>
                                     
                                     <a class="rmBtn" href="{{route('home.gallery_detail',[ 'category_id' => $category->id])}}">View More
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
                    @endforeach
                        @endif    


                            <!-- <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                        <img src="assets/images/gallery/img2.jpg" alt="">
                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos: 10
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">House Show 2023</a>
                                        </h5>
                                        <a class="rmBtn" href="">View More
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                        <img src="assets/images/gallery/img3.jpg" alt="">
                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos: 10
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">Convocation Ceremony</a>
                                        </h5>
                                        <a class="rmBtn" href="">View More
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                        <img src="assets/images/gallery/img4.jpg" alt="">
                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos: 10
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">Basketball Competition</a>
                                        </h5>
                                        <a class="rmBtn" href="">View More
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                        <img src="assets/images/gallery/img5.jpg" alt="">
                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos: 10
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">Cultural Bridges</a>
                                        </h5>
                                        <a class="rmBtn" href="">View More
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="blogItem01 biMB">
    
                                    <div class="blogThumb">
                                        <img src="assets/images/gallery/img6.jpg" alt="">
                                    </div>
                                    <div class="blogContent p-4">
                                        <sapn class="small">
                                            <i class="fa fa-images me-2"></i> Total Photos: 10
                                        </sapn>
                                        <h5>
                                            <a href="" class="text-dark">Inter House Competition</a>
                                        </h5>
                                        <a class="rmBtn" href="">View More
                                            <svg fill="#E94D4E" width="12" height="10" viewBox="0 0 12 10"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0 5.71429V4.28571H9L6 1.42857L6.75 0L12 5L6.75 10L6 8.57143L9 5.71429H0Z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
 <div class="pagination">
              {!! $categoires->links() !!}
 </div>
                         <!-- <div class="col-lg-5 mx-auto mt-5">
                                <nav class="justify-content-center">
                                 <ul class="pagination">
                                        
                                         <li class="page-item disabled">
                                            <a class="page-link">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li> 
                                    </ul> 
                                </nav>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Section -->
    
                           
 
    <style>
.pagination svg {
    width: 20px;
}
.pagination nav {
    display: flex;
}
.pagination nav > div + div {
    display: flex;
    align-items: center;
    flex-grow: 1;
    justify-content: flex-end;
}
.pagination nav > div + div > div + div {
    margin-left: 20px;
}
.pagination nav > div + div p.text-sm {
    margin: 0;
}
</style>
</div>
