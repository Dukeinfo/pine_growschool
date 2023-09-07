<!-- resources/views/livewire/navigation-menu.blade.php -->

<ul class="sub-menu">
    @foreach($menus as $menu)
       @if ($menu->status === 'Inactive')
        @php
            abort(404);
        @endphp
    @endif
    @if(!empty($menu->link))
             {{-- ====== not show faq here ======== --}}
             @if($menu->name !=  'FAQs' ||  $menu->link !=  'faqs_introduction')
             <li> 
                 <a href="{{ !empty($menu->link) ? route($menu->link) : '#' }}">{{ $menu->name ?? '' }}</a>
             </li>
             @endif
            {{-- ====== not show faq here ======== --}}
            {{-- faq if start  --}}
                @if($menu->name ===  'FAQs' ||  $menu->link ==  'faqs_introduction')
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">FAQs</a>
                        <ul class="sub-menu">
                        @forelse ($getfaqcat as $key => $faqcat )
                   
                        <li><a href="{{route('faqs_introduction', ['id' => $faqcat->id ?? '', 'slug' => strtolower(str_replace(' ', '-',$faqcat->name)) ?? ''])}}">{{$faqcat->name}}</a></li>
                          
                        @empty
                            
                        @endforelse
                        

                        </ul>
                    </li>
                @endif
                {{-- faq if start  --}}

   
        @else

    @endif      

      <li class="menu-item-has-children">
            @if(!isset($menu->link) )
                <a href="javascript:void(0)}">{{ $menu->name ?? '' }}</a>
            @endif
            {{-- submenu  --}}
            @livewire('frontend.common.submenu-loader' , ['menuId' => $menu->id])
 
             
           

    </li>
   
    {{-- <li>
        <a href="{{ route('home.contact_us') }}">Contact us</a>
    </li> --}}
    @endforeach
</ul>
