<section class="bg-custom news-ticker">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center">
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 d-lg-block d-md-block d-sm-none d-none">
                <div class="topic-box mt-10 mb-10">Latest News</div>
            </div>
            @php
               $getlatestnews =  App\Models\LatestNews::latest()->orderBy('sort_id')->where('status','Active')->take(5)->get();
            @endphp
            <div class="col-lg-10 col-md-9 col-sm-8 col-12">
                <div class="feeding-text-dark">
                    <marquee behavior="scroll" scrollamount="5" direction="left" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        @if(isset($getlatestnews ))
                        @foreach($getlatestnews   as $latestnews )
                        @php
                            $dateString = $latestnews->created_at;
                            $carbonDate = Carbon\Carbon::parse($dateString);
                            $formattedDate = $carbonDate->format('F j, Y');
                        @endphp
                        <span class="dot"></span>	
                        <span class="text-white"> {{$formattedDate ?? ''}}:</span>
                        <a href="{{$latestnews->link ?? "#"}}" target="_blank" class="text-white me-5">{{$latestnews->title .' -' ?? ''}}
                            {{$latestnews->description ?? ''}}
                        </a>
                        @endforeach
                        @else
                        @endif
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</section>