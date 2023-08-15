<!-- resources/views/livewire/navigation-menu.blade.php -->

<ul class="sub-menu">
    <li>
        <a href="{{ route('homepage') }}">Home</a>
    </li>
    @foreach($menus as $menu)
    <li class="menu-item-has-children">
        {{-- @php
        $getSubmenus = App\Models\Submenu::where('cms', 'No')->where('menu_id', $menu->id)->orderBy('sort_id', 'asc')->where('status', 'Active')->get();
        $getpage = App\Models\CreatePage::where('menu_id', $menu->id)->with(['SubMenu'])->orderBy('sort_id', 'asc')->where('status', 'Active')->get();
        @endphp --}}
        <a href="javascript:void(0)}">{{ $menu->name ?? '' }}</a>
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
    @endforeach
    <li>
        <a href="{{ route('home.contact_us') }}">Contact us</a>
    </li>
</ul>
