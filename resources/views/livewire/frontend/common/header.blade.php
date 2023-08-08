
    <!-- BEGIN: Topbar Section -->
    <section class="topbar01">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topBarWrapper">
                        <div class="infoText infoText02">
                            <i class="flaticon-location"></i>
                            <a href="javascript:void()">Virtual Tour</a>
                        </div>
                        <div class="infoText infoText02">
                            <i class="flaticon-user"></i>
                            <a href="https://eck12student.jupsoft.com/sisStudentLoginNew.aspx?id=D2xDGFUPjys="
                                target="_blank">Parent Login</a>
                        </div>
                        <ul class="social-network">
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-1.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-2.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-3.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-4.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-5.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-6.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-7.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-8.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-10.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void()" target="_blank">
                                    <img src="{{asset('assets/images/partners/p-11.png')}}" alt="">
                                </a>
                            </li>
                        </ul>
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
                            <a href="{{route('homepage')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Pinegrove" /></a>
                        </div>
                        <!-- Logo -->
                        <!-- Nav Menu -->
                        <a href="javascript:void(0)" class="menuBtn"><i class="fa-solid fa-bars"></i></a>
                        <nav class="mainMenu">
                            @php
                            $getmenus = App\Models\Menu::orderBy('sort_id','asc')->where('status','Active')->take(6)->get();	 
                             @endphp
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('homepage')}}">Home</a>
                                </li>
                                @if(isset($getmenus) )
                                @foreach($getmenus as $menu)
                                <li class="menu-item-has-children">
                            
                                    <a href="javascript:void(0)}">{{$menu->name ?? ''}}</a>
                                    
                                    @php
                                        $getpage =   App\Models\CreatePage::where('menu_id',$menu->id )->with(['SubMenu'])->orderBy('sort_id','asc')->where('status','Active')->get()    
                                   @endphp
                                    <ul class="sub-menu">
                                        @php
                                            $fallbackRouteName = 'fallback.route.name'; // Replace with the actual fallback route name
                                        @endphp
                                        <li><a href="{{isset($menu->link) ? route($menu->link) : '#' }}">{{$menu->name ?? ''}}</a></li>
                                   
                                             @foreach($getpage as $page)
                                             @if(isset($page))
                                                 {{-- @php $encryptedId = encrypt($page->id); @endphp --}}
                                                <li><a href="{{route('detail_page',['page_id' => $page->id, 'slug' => $page->slug])}}">{{$page->SubMenu->display_name}}</a></li>
                                             @endif
                                            @endforeach

                                    
                                    </ul>
                                </li>
                                @endforeach
                                @endif


                                <li>
                                    <a href="javascript:void(0);">Calendar</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Nav Menu -->
                        <!-- Popup Btn -->
                        <a class="popupBtn" href="javascript:void(0);">
                            <svg fill="#E94D4E" width="24" height="16" viewBox="0 0 24 16"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.75 15.5V13H23.25V15.5H0.75ZM0.75 9.25V6.75H23.25V9.25H0.75ZM0.75 3V0.5H23.25V3H0.75Z" />
                            </svg>
                        </a>
                        <!-- Popup Btn -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- BEGIN: Popup Sidebar Widget -->
  