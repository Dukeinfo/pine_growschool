<div data-simplebar class="h-100">
	<!--- Sidemenu -->
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title">General</li>

			<li>
				<a href="{{route('admin_dashboard')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{route('view_home_slider')}}" class="waves-effect">
					<i class="bx bx-image"></i>
					<span>Home Slider</span>
				</a>
			</li>
			<li>
				<a href="{{route('view_membership')}}" class="waves-effect">
					<i class='bx bx-user'></i>
					<span>Memberships</span>
				</a>
			</li>
			<li>
				<a href="{{route('view_testimonials')}}" class="waves-effect">
					<i class='bx bx-chat'></i>
					<span>Testimonials</span>
				</a>
			</li>
            <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Gallery</span>
				</a>
				
				
					<ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('view_category')}}">Category</a></li>
						<li><a href="#">Manage Gallery</a></li>
					</ul>
					{{-- <!-- <li><a href="{{url('admin/portfolio')}}">Portfolio</a></li> --> --}}
				
			</li>

			<li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-file'></i>
					<span>Blog</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="{{route('add_blog')}}">Add Blog</a></li>
					<li><a href="{{route('manage_blog')}}">Manage Blog</a></li>
				</ul>
			</li>
			
			<li class="menu-title">Search Engine Optimization</li>
			<li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-line-chart'></i>
					<span>SEO Markups</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="{{route('manage_metadata')}}">Meta Details</a></li>
					<li><a href="{{route('manage_snippets')}}">Header Snippets</a></li>
					<li><a href="{{route('manage_footer_snippets')}}">Footer Snippets</a></li>
				</ul>
			</li>
			

		</ul>
	</div>
	<!-- Sidebar -->
</div>