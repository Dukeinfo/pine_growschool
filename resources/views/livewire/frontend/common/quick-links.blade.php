{{-- <aside class="widget">
    <h3 class="widgetTitle">Quick Links</h3>
    <ul>
        <li><a href="javascript:void()">Admission Process</a></li>
        <li><a href="javascript:void()">Fees</a></li>
        <li><a href="javascript:void()">Clothing</a></li>
        <li><a href="javascript:void()">Withdrawl</a></li>
        <li><a href="javascript:void()" class="active">Contact for Admission</a></li>
        <li><a href="javascript:void()">Transfer Certificate</a></li>
    </ul>
</aside> --}}


<aside class="widget">
    <h3 class="widgetTitle">Quick Links</h3>
    <ul>
        {{-- @foreach ($quicksubmenus  as $quicksubmenu) --}}
                {{-- <li>
                    <a>
                        {{ $quicksubmenu->Menu->name }}
                    </a>
                </li>
        @endforeach --}}
@php
$currentRouteName = \Route::currentRouteName();
@endphp
        @foreach(Route::getRoutes() as $route)
        @if (str_starts_with($route->getName(), 'home.'))
            @php
                $routeName = ucwords(str_replace('home.', '', $route->getName()));
            @endphp
                
                <li>
                    <a href="{{ route($route->getName()) }}"   class="{{ $currentRouteName === $route->getName() ? 'active' : '' }}">{{  Str::title(str_replace('_', ' ', $routeName)) }}</a>

                </li>

                @endif
            @endforeach
    </ul>
</aside>


