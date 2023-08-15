<ul class="sub-menu">
    @foreach($getpage as $page)
    @if($page->SubMenu->cms == 'Yes')
        <li><a href="{{ route('detail_page', ['page_id' => $page->id ?? '', 'slug' => $page->SubMenu->slug ?? '']) }}">{{ $page->SubMenu->display_name ?? '' }}</a></li>
    @endif
    @endforeach
    @foreach($submenus as $submenu)
         <li><a href="{{ isset($submenu->pname) ? route($submenu->pname) : '#' }}">{{ $submenu->name ?? '' }}</a></li>
    @endforeach


</ul>