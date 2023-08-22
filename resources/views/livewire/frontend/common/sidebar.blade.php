<section class="popupSidebarSsec">
    <div class="popupSidebarOverlay"></div>
    <div class="widgetArea">
        <a href="javascript:void(0);" class="widgetCloser"><i class="fa-solid fa-xmark"></i></a>
          
          @php
            $contactInfo = App\Models\ContactInfo::orderBy('id','desc')->where('status','Active')->first();     
            $SocialApps = App\Models\SocialApp::orderBy('sort_id','asc')->where('status','Active')->get();     
                           
          @endphp
        <div class="aboutWidgetArea">
            <div class="wdLogo">
                <a href="javascript:void()">
                    @if (isset($contactInfo->logo))
                        <img src="{{ asset('storage/' . $contactInfo->logo) }}"  alt="Pinegrove">
                        @else
                        <img src="{{ asset('assets/images/logo.png') }}"  alt="Pinegrove">

                        
                    @endif
                    </a>
            </div>
            <p>
                {{$contactInfo->disclaimer ?? 'disclaimer Not Found'}}
            </p>
            <h3>Contact info</h3>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                <h3 class="ibTitle">Call Us</h3>
                <p><a href="tel:09805004115">{{$contactInfo->phone ?? '+91 980 5004 115'}}</a></p>
            </div>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-email"></i></div>
                <h3 class="ibTitle">Email us</h3>
                <p><a href="mailto:subathu@pinegroveschool.com">{{$contactInfo->email ?? '
                    Email us
                    subathu@pinegroveschool.com'}}</a></p>
            </div>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-placeholder"></i></div>
                <h3 class="ibTitle">Address</h3>
                <p><a href="https://goo.gl/maps/PZ8BLmk3CbRwXGAt9" target="_blank">{{$contactInfo->address ?? 'Kuthar Road, Subathu 173 206 District Solan HP, India'}}</a>
                </p>
            </div>
            <div class="socialItem">


                   @forelse($SocialApps as  $SocialApp)

                    <a href="{{$SocialApp->link ?? ''}}"><i class="{{$SocialApp->icon ?? ''}}"></i></a>
                    @empty
                    <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                    <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                 @endforelse
            </div>
                <iframe
                    src="{{$contactInfo->map ?? ''}}"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>