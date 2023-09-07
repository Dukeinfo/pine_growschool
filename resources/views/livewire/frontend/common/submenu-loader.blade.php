<ul class="sub-menu">
    @foreach($getpage as $page)
    @if($page->SubMenu->cms == 'Yes' && $page->SubMenu->status == 'Active' )
        <li><a href="{{ route('detail_page', ['page_id' => $page->id ?? '', 'slug' => $page->SubMenu->slug ?? '']) }}">{{ $page->SubMenu->name ?? '' }}</a></li>
   @else

    @endif

    @endforeach
    @foreach($submenus as $submenu)
    @if($submenu->menu_id != 6 )
         <li><a href="{{ isset($submenu->pname) ? route($submenu->pname) : '#' }}">{{ $submenu->name ?? '' }}</a></li>
    @endif
    @endforeach



</ul>