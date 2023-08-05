<div>
    @push('keywords')
    <meta name="keywords" content="{{$seo_keywords ?? ''}}">
    @endpush

    <section class="aboutSection03 position-relative">
        <div class="container">
            <div class="row">
 
                <div class="col-lg-12">
                    <!-- About Content -->
                    <div class="aboutContent02">
                        <h5 class="subTitle">{!!$heading  ?? "" !!}</h5>
               
                        <p>
                            {!! $desc ?? ""!!}
                        </p>
  
                        <a class="immiPressBtn" href="{{$url_link ?? ''}}"><span>Discover More</span></a>
                    </div>
                    <!-- About Content -->
                </div>
            </div>
        </div>
        <div class="bg-corner corner-position"></div>
        <div class="background-text-wrapper">
            <div class="bg-custom-header-text">
                Why Us?
            </div>
        </div>
    </section>



    
</div>