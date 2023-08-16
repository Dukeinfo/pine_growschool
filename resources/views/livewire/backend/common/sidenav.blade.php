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
				 <a href="{{route('home.homepage')}}" target="_blank" class="waves-effect"> 
		
					<i class='bx bx-globe'></i>
					<span>Website</span>
				</a>
				
			</li>


            <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Master</span>
				</a>
					
			  <ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('view_menu')}}">Menu</a></li>
						<li><a href="{{route('view_subnmenu')}}">Sub Menu</a>
							<li><a href="{{route('view_class')}}">Class</a></li>
						<li><a href="{{route('view_section')}}">Section</a></li>
					</ul>
			
			</li>

			<li>
				<a href="{{route('create_page')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Create Page</span>
				</a>
			</li>
			<li>
				<a href="{{route('view_home_slider')}}" class="waves-effect">
					<i class="bx bx-image"></i>
					<span>Home Slider</span>
				</a>
			</li>
		    <li>
				<a href="{{route('whyus_page')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Home Sections</span>
				</a>
			</li>
		
		
			<li>
				<a href="{{route('view_department')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Department</span>
				</a>
			</li>
			<li>
				<a href="{{route('view_staff')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Our Staff</span>
				</a>
			</li>


			    <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Principal</span>
				</a>
					
			  <ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('create_message')}}">Message</a></li>
						<li><a href="{{route('view_boardmembers')}}">Board Memebers</a>
					   
					</ul>
			
			</li>
			
			

			<li>
				<a href="{{route('view_facilities')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Facilities</span>
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
				<a href="{{route('view_news')}}" class="waves-effect">
					<i class='bx bx-chat'></i>
					<span>Latest News</span>
				</a>
			</li>

			<li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Memories</span>
				</a>
				
				
					<ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('view_guest_book')}}">Guest Book</a></li>
						<li><a href="{{route('view_grapevine')}}">Grapevine</a></li>
						
					</ul>
					
				
			</li>




            <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Gallery</span>
				</a>
				
				
					<ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('view_category')}}">Category</a></li>
						<li><a href="{{route('manage_gallery')}}">Manage Gallery</a></li>
						<li><a href="{{route('view_our_topper')}}">Our Toppers</a></li>
						<li><a href="{{route('view_knowledge_home')}}">Knowledge Home</a></li>
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