<section class="popupSidebarSsec">
    <div class="popupSidebarOverlay"></div>
    <div class="widgetArea">
        <a href="javascript:void(0);" class="widgetCloser"><i class="fa-solid fa-xmark"></i></a>
          @php
            $contactInfo = App\Models\ContactInfo::orderBy('sort_id','asc')->where('status','Active')->first();     
                           
          @endphp
        <div class="aboutWidgetArea">
            <div class="wdLogo">
                <a href="javascript:void()">
                    @if ($contactInfo->logo)
                        <img src="{{ asset('storage/' . $contactInfo->logo) }}"  alt="Pinegrove">
                    @endif
                    </a>
            </div>
            <p>
                {{$contactInfo->disclaimer ?? ''}}
            </p>
            <h3>Contact info</h3>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-phone-call"></i></div>
                <h3 class="ibTitle">Call Us</h3>
                <p><a href="tel:09805004115">{{$contactInfo->phone ?? ''}}</a></p>
            </div>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-email"></i></div>
                <h3 class="ibTitle">Email us</h3>
                <p><a href="mailto:subathu@pinegroveschool.com">{{$contactInfo->email ?? ''}}</a></p>
            </div>
            <div class="iconBox01">
                <div class="ibBox"><i class="flaticon-placeholder"></i></div>
                <h3 class="ibTitle">Address</h3>
                <p><a href="https://goo.gl/maps/PZ8BLmk3CbRwXGAt9" target="_blank">{{$contactInfo->address ?? ''}}</a>
                </p>
            </div>
            <div class="socialItem">
                <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
            </div>
                <iframe
                    src="{{$contactInfo->map ?? ''}}"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>