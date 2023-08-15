<!-- resources/views/livewire/navigation-menu.blade.php -->

<ul class="sub-menu">
    @foreach($menus as $menu)
    @if(!empty($menu->link))
    <li>
        <a href="{{ !empty($menu->link) ? route($menu->link) : '#' }}">{{ $menu->name ?? '' }}</a>
    </li>
    @else
    @endif      

    <li class="menu-item-has-children">
       
        {{-- @php
        $getSubmenus = App\Models\Submenu::where('cms', 'No')->where('menu_id', $menu->id)->orderBy('sort_id', 'asc')->where('status', 'Active')->get();
        $getpage = App\Models\CreatePage::where('menu_id', $menu->id)->with(['SubMenu'])->orderBy('sort_id', 'asc')->where('status', 'Active')->get();
        @endphp --}}
    @if(!isset($menu->link))
        <a href="javascript:void(0)}">{{ $menu->name ?? '' }}</a>
    @endif

        {{-- <livewire:frontend.common.submenu-loader :menuId="$menu->id" /> --}}
                @livewire('frontend.common.submenu-loader' , ['menuId' => $menu->id])



        {{-- <ul class="sub-menu">
            @foreach($getpage as $page)
                @if($page->SubMenu->cms == 'Yes')
                    <li><a href="{{ route('detail_page', ['page_id' => $page->id ?? '', 'slug' => $page->SubMenu->slug ?? '']) }}">{{ $page->SubMenu->display_name ?? '' }}</a></li>
                @endif
            @endforeach
            @foreach($getSubmenus as $submenu)
                 <li><a href="{{ isset($submenu->pname) ? route($submenu->pname) : '#' }}">{{ $submenu->name ?? '' }}</a></li>
            @endforeach
        </ul> --}}
    </li>
   
    {{-- <li>
        <a href="{{ route('home.contact_us') }}">Contact us</a>
    </li> --}}
    @endforeach
</ul>
