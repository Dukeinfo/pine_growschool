<section class="topbar01">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="topBarWrapper">
                    <!-- Info Text -->
                    <div class="infoText"><i class="flaticon-placeholder"></i><a href="#">Kuthar Road, Subathu HP, India</a></div>
                    <!-- Info Text -->
                    <!-- Info Text -->
                    <div class="infoText infoText02"><i class="flaticon-telephone"></i>+91 980 5004 114</div>
                    <!-- Info Text -->
                    <!-- Social Item -->
                    <div class="topBarSocial">
                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-twitter"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                        <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    <!-- Social Item -->
                    <!-- Link Text -->
                    <a href="https://www.youtube.com/watch?v=ZBFL7ltIRtQ" target="_blank" class="linkText">Campus Virtual Tour</a>
                    <!-- Link Text -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: Topbar Section -->

<!-- BEGIN: Header Section -->
<header class="header01 isSticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header01Inner">
                    <!-- Logo -->
                    <div class="logo01">
                        <a href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Pinegrove" /></a>
                    </div>
                    <!-- Logo -->
                    <!-- Nav Menu -->

                    <a href="javascript:void(0)" class="menuBtn"><i class="fa-solid fa-bars"></i></a>
                   @php
                 $getmenus = App\Models\Menu::orderBy('sort_id','asc')->where('status','Active')->get();	 
                 

                   @endphp
                    <nav class="mainMenu">
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0);">Home</a>
                            </li>
                            @if(isset($getmenus) )

                            @foreach($getmenus as $menu)
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">{{$menu->name ?? ''}}</a>
                                @php
                                    $getSubmenus = App\Models\Submenu::where('menu_id',$menu->id )->orderBy('sort_id','asc')->where('status','Active')->get();	    
                                @endphp
                                <ul class="sub-menu">
                                @foreach($getSubmenus as $submenu)
                                    <li><a href="javascript:void();">{{$submenu->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            @endforeach
                            @endif
                            {{-- <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Facilities</a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:void();">Introduction</a></li>
                                    <li><a href="javascript:void();">Academic Facilities</a></li>
                                    <li><a href="javascript:void();">Games & Sports</a></li>
                                    <li><a href="javascript:void();">Activities</a></li>
                                    <li><a href="javascript:void();">Boarding</a></li>
                                    <li><a href="javascript:void();">New Developments</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Admission & Fees</a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:void();">Admission Process</a></li>
                                    <li><a href="javascript:void();">Fees</a></li>
                                    <li><a href="javascript:void();">Clothing</a></li>
                                    <li><a href="javascript:void();">Withdrawl</a></li>
                                    <li><a href="javascript:void();">Contact for Admission</a></li>
                                    <li><a href="javascript:void();">Transfer Certificate</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Memories</a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:void();">Our Founder</a></li>
                                    <li><a href="javascript:void();">Alumni</a></li>
                                    <li><a href="javascript:void();">Guest Book</a></li>
                                    <li><a href="javascript:void();">Grapevine</a></li>
                                    <li><a href="javascript:void();">Roll of Hounour</a></li>
                                    <li><a href="javascript:void();">Picture Gallery</a></li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">FAQs</a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:void();">Introduction</a></li>
                                    <li><a href="javascript:void();">Admission & Fees</a></li>
                                    <li><a href="javascript:void();">Academics</a></li>
                                    <li><a href="javascript:void();">Facilities & Activities</a></li>
                                    <li><a href="javascript:void();">Boarding</a></li>
                                    <li><a href="javascript:void();">Descipline</a></li>
                                    <li><a href="javascript:void();">Others</a></li>
                                </ul>
                            </li> --}}

                            <li>
                                <a href="javascript:void(0);">Calendar</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Nav Menu -->
                    <!-- Popup Btn -->
                    <a class="popupBtn" href="javascript:void(0);">
                        <svg fill="#E94D4E" width="24" height="16" viewBox="0 0 24 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 15.5V13H23.25V15.5H0.75ZM0.75 9.25V6.75H23.25V9.25H0.75ZM0.75 3V0.5H23.25V3H0.75Z" />
                        </svg>
                    </a>
                    <!-- Popup Btn -->
                </div>
            </div>
        </div>
    </div>
</header>