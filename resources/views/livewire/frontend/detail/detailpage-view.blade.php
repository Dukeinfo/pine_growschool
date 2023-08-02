<div  >

    <section class="aboutSection02 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="aboutContent02">
                        <h5 class="subTitle">{!!$heading  ?? "" !!}</h5>
                  
                        <p>  {!! $desc ?? ""!!} </p>
             
                        <a class="immiPressBtn" href="javascript:void();"><span>Discover More</span></a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div id="pineCarousel" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#pineCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('assets/images/f2.jpg')}}" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('assets/images/f3.jpg')}}" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('assets/images/f1.jpg')}}" class="d-block w-100 img-thumbnail" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#pineCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#pineCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-corner corner-position"></div>
    </section>
    
</div>