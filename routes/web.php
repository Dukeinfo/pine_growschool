<?php


use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\CkImageUploadController;

use App\Http\Livewire\Frontend\Home\Homepage;
use App\Http\Livewire\Frontend\Detail\DetailpageView;

use App\Http\Livewire\Backend\AdminDashboard;
use App\Http\Livewire\Backend\Menu\ViewMenu;
use App\Http\Livewire\Backend\Menu\EditMenu;
use App\Http\Livewire\Backend\Menu\TrashMenu;
use App\Http\Livewire\Backend\Submenu\ViewSubMenu;
use App\Http\Livewire\Backend\Submenu\EditSubMenu;
use App\Http\Livewire\Backend\Submenu\TrashSubMenu;
use App\Http\Livewire\Backend\Master\ViewClass;
use App\Http\Livewire\Backend\Master\EditClass;
use App\Http\Livewire\Backend\Master\TrashClass;
use App\Http\Livewire\Backend\Master\ViewSection;
use App\Http\Livewire\Backend\Master\EditSection;
use App\Http\Livewire\Backend\Master\TrashSection;
use App\Http\Livewire\Backend\Blog\AddBlog;
use App\Http\Livewire\Backend\Blog\ManageBlog;
use App\Http\Livewire\Backend\Blog\EditBlog;
use App\Http\Livewire\Backend\Blog\TrashBlog;
use App\Http\Livewire\Backend\Department\ViewDepartment;
use App\Http\Livewire\Backend\Department\EditDepartment;
use App\Http\Livewire\Backend\Department\TrashDepartment;
use App\Http\Livewire\Backend\News\ViewLatestNews;
use App\Http\Livewire\Backend\News\EditLatestNews;
use App\Http\Livewire\Backend\News\TrashLatestNews;
use App\Http\Livewire\Backend\Gallery\ViewGalleryCategory;
use App\Http\Livewire\Backend\Gallery\EditGalleryCategory;
use App\Http\Livewire\Backend\Gallery\TrashGalleryCategory;
use App\Http\Livewire\Backend\Gallery\ManageGallery;
use App\Http\Livewire\Backend\Gallery\EditGallery;
use App\Http\Livewire\Backend\Gallery\TrashGallery;
use App\Http\Livewire\Backend\Gallery\ViewOurTopper;
use App\Http\Livewire\Backend\Gallery\EditOurTopper;
use App\Http\Livewire\Backend\Gallery\TrashOurTopper;
use App\Http\Livewire\Backend\Gallery\ViewKnowledgeHome;
use App\Http\Livewire\Backend\Gallery\EditKnowledgeHome;
use App\Http\Livewire\Backend\Membership\ViewMembership;
use App\Http\Livewire\Backend\Membership\EditMemberShip;
use App\Http\Livewire\Backend\Membership\TrashMemberShip;
use App\Http\Livewire\Backend\Seo\FooterSnippets;
use App\Http\Livewire\Backend\Seo\HeaderSnippets;
use App\Http\Livewire\Backend\Seo\EditHeaderSnippets;
use App\Http\Livewire\Backend\Seo\Metadetails;
use App\Http\Livewire\Backend\Seo\EditMetadetails;
use App\Http\Livewire\Backend\Slider\ViewHomeSlider;
use App\Http\Livewire\Backend\Slider\EditHomeSlider;
use App\Http\Livewire\Backend\Slider\TrashHomeSlider;
use App\Http\Livewire\Backend\Testimonials\ViewTestimonials;
use App\Http\Livewire\Backend\Testimonials\EditTestimonials;
use App\Http\Livewire\Backend\Testimonials\TrashTestimonials;
use App\Http\Livewire\Backend\Boardmembers\ViewBoardMembers;
use App\Http\Livewire\Backend\Boardmembers\EditBoardMembers;
use App\Http\Livewire\Backend\Contact\ContactFormEntries;
use App\Http\Livewire\Backend\Contact\ViewContactFormEntry;
use App\Http\Livewire\Backend\Login\AdminLogin;
use App\Http\Livewire\Backend\Pages\CreatePage;
use App\Http\Livewire\Backend\Pages\EditPage;
use App\Http\Livewire\Backend\Profile\AdminProfile;
use App\Http\Livewire\Backend\Staff\ViewStaff;
use App\Http\Livewire\Backend\Staff\EditStaff;
use App\Http\Livewire\Backend\Staff\TrashStaff;
use App\Http\Livewire\Backend\Principal\Message;
use App\Http\Livewire\Backend\Principal\EditMessage;
use App\Http\Livewire\Backend\Facilities\ViewFacilities;
use App\Http\Livewire\Backend\Facilities\EditFacilities;
use App\Http\Livewire\Backend\Facilities\TrashFacilities;
use App\Http\Livewire\Backend\Footer\ContactusView;
use App\Http\Livewire\Backend\Footer\SocialAppsManager;
use App\Http\Livewire\Backend\Memories\ViewGuestBook;
use App\Http\Livewire\Backend\Memories\EditGuestBook;
use App\Http\Livewire\Backend\Memories\ViewGrapevine;
use App\Http\Livewire\Backend\Memories\EditGrapevine;
use App\Http\Livewire\Frontend\AboutUs;
use App\Http\Livewire\Frontend\AdmissionProcess;
use App\Http\Livewire\Frontend\ContactUs;
use App\Http\Livewire\Frontend\Facilities;
use App\Http\Livewire\Frontend\FaqsIntroduction;
use App\Http\Livewire\Frontend\Gallery;
use App\Http\Livewire\Frontend\GalleryDetail;
use App\Http\Livewire\Frontend\Location;
use App\Http\Livewire\Frontend\OurFounder;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
// https://ckeditor.com/ckeditor-4/download/?null-addons=
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// ============================= frontend route start  ======================
Route::get('/phpinfo', function (){
    dd(phpinfo());
});
Route::get('/', Homepage::class)->name('homepage');
Route::get('detail/page/{page_id}/{slug}', DetailpageView::class)->name('detail_page');

Route::get('/about-us', AboutUs::class)->name('home.about_us');
Route::get('/admission-process', AdmissionProcess::class)->name('home.admission_process');
Route::get('/contact-us', ContactUs::class)->name('home.contact_us');
Route::get('/facilities', Facilities::class)->name('home.facilities');
Route::get('/faqs', FaqsIntroduction::class)->name('home.faqs_introduction');
Route::get('/gallery', Gallery::class)->name('home.gallery');
Route::get('/gallery-detail/{category_id}/', GalleryDetail::class)->name('home.gallery_detail');
Route::get('/location', Location::class)->name('home.location');
Route::get('/our-founder', OurFounder::class)->name('home.our_founder');






// ============================= frontend route end ======================
// admin routings

include("web.admin.php");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('admin_dashboard');
    })->name('dashboard');

});

/**********
Admin Login 
***********/
Route::group(['middleware' => ['guest']], function () {
Route::get('admin/login', AdminLogin::class)->name('admin_login');
});

/**********
Auth Routes 
***********/
Route::group(['middleware' => 'auth'],function(){
    Route::prefix('admin')->group(function(){

    Route::get('/dashboard', AdminDashboard::class)->name('admin_dashboard');
    Route::get('/profile', AdminProfile::class)->name('admin_profile');
    Route::post('/admin-logout', [AdminLogoutController::class,'adminlogout'])->name('adminlogout');

Route::get('/view/menu', ViewMenu::class)->name('view_menu');
Route::get('/edit/menu/{id}', EditMenu::class)->name('edit_menu');
Route::get('/view/menu/trash', TrashMenu::class)->name('trash_menu');

Route::get('/view/submenu', ViewSubMenu::class)->name('view_subnmenu');
Route::get('/edit/submenu/{id}', EditSubMenu::class)->name('edit_sub_menu');
Route::get('/view/submenu/trash', TrashSubMenu::class)->name('trash_subnmenu');

Route::get('/view/class', ViewClass::class)->name('view_class');
Route::get('/edit/class/{id}', EditClass::class)->name('edit_class');
Route::get('/view/class/trash', TrashClass::class)->name('trash_class');
Route::get('/view/section', ViewSection::class)->name('view_section');
Route::get('/edit/section/{id}', EditSection::class)->name('edit_section');
Route::get('/view/section/trash', TrashSection::class)->name('trash_section');

// Route::post('ckeditor/upload', [CkImageUploadController::class, 'upload'])->name('image.upload');
// Route::get('/ckeditor-image-upload', function () {
//     return view('ckeditor_file_upload');
// })->name('form.upload');

Route::post('ckeditor/image_upload', [CkImageUploadController::class, 'upload'])->name('image.upload');
    Route::get('/view/slider', ViewHomeSlider::class)->name('view_home_slider');
    Route::get('/edit/slider/{id}', EditHomeSlider::class)->name('edit_home_slider');
    Route::get('/view/slider/trash', TrashHomeSlider::class)->name('trash_home_slider');

    Route::get('/view/membership', ViewMembership::class)->name('view_membership');
    Route::get('/edit/membership/{id}', EditMemberShip::class)->name('edit_membership');
    Route::get('/view/membership/trash', TrashMemberShip::class)->name('trash_membership');

    Route::get('/view/testimonials', ViewTestimonials::class)->name('view_testimonials');
    Route::get('/edit/testimonials/{id}', EditTestimonials::class)->name('edit_testimonials');
    Route::get('/view/testimonials/trash', TrashTestimonials::class)->name('trash_testimonials');

    Route::get('/view/category', ViewGalleryCategory::class)->name('view_category');
    Route::get('/edit/category/{id}', EditGalleryCategory::class)->name('edit_category');
    Route::get('/view/category/trash', TrashGalleryCategory::class)->name('trash_category');


    Route::get('/view/latestnews', ViewLatestNews::class)->name('view_news');
    Route::get('/edit/latestnews/{id}', EditLatestNews::class)->name('edit_news');
    Route::get('/view/latestnews/trash', TrashLatestNews::class)->name('trash_news');

    Route::get('/manage/gallery', ManageGallery::class)->name('manage_gallery');
    Route::get('/edit/gallery/{id}', EditGallery::class)->name('edit_gallery');
    Route::get('/manage/gallery/trash', EditGallery::class)->name('trash_gallery'); 

   Route::get('/view/our-topper', ViewOurTopper::class)->name('view_our_topper');
    Route::get('/edit/our-topper/{id}', EditOurTopper::class)->name('edit_our_topper');
   Route::get('/view/our-topper/trash', TrashOurTopper::class)->name('trash_our_topper');

    Route::get('/view/knowledge-home', ViewKnowledgeHome::class)->name('view_knowledge_home');
     Route::get('/edit/knowledge-home/{id}', EditKnowledgeHome::class)->name('edit_knowledge_home');


    Route::get('/add/blog', AddBlog::class)->name('add_blog');
    Route::get('/manage/blog', ManageBlog::class)->name('manage_blog');
    Route::get('/edit/blog/{id}', EditBlog::class)->name('edit_blog');
    Route::get('/manage/blog/trash', TrashBlog::class)->name('trash_blog');

    


    Route::get('/manage/seo', Metadetails::class)->name('manage_metadata');
    Route::get('/edit/seo/{id}', EditMetadetails::class)->name('edit_metadata');


    Route::get('/header/snippets', HeaderSnippets::class)->name('manage_snippets');
     Route::get('/edit/header/snippets/{id}', EditHeaderSnippets::class)->name('edit_snippets');
    Route::get('/footer/snippets', FooterSnippets::class)->name('manage_footer_snippets');

    Route::get('/create/page', CreatePage::class)->name('create_page');
    Route::get('/edit/page/{id}', EditPage::class)->name('edit_page');
    

    Route::get('/view/department', ViewDepartment::class)->name('view_department');
    Route::get('/edit/department/{id}', EditDepartment::class)->name('edit_department');
    Route::get('/view/department/trash', TrashDepartment::class)->name('trash_department'); 

    Route::get('/view/staff', ViewStaff::class)->name('view_staff');
    Route::get('/edit/staff/{id}', EditStaff::class)->name('edit_staff');
    Route::get('/view/staff/trash', TrashStaff::class)->name('trash_staff');

     Route::get('/view/boardmembers', ViewBoardMembers::class)->name('view_boardmembers');
     Route::get('/edit/boardmembers/{id}', EditBoardMembers::class)->name('edit_boardmembers');

    Route::get('/ceate/message', Message::class)->name('create_message');
    Route::get('/edit/message/{id}', EditMessage::class)->name('edit_message');


    Route::get('/view/facilities', ViewFacilities::class)->name('view_facilities');
    Route::get('/edit/facilities/{id}', EditFacilities::class)->name('edit_facilities');
    Route::get('/view/facilities/trash', TrashFacilities::class)->name('trash_facilities');


    Route::get('/view/guest-book', ViewGuestBook::class)->name('view_guest_book');
    Route::get('/edit/guest-book/{id}', EditGuestBook::class)->name('edit_guest_book');

    Route::get('/view/grapevine', ViewGrapevine::class)->name('view_grapevine');
    Route::get('/edit/grapevine/{id}', EditGrapevine::class)->name('edit_grapevine');
    Route::get('/contact-view', ContactusView::class)->name('contact_view');
    Route::get('/social-view', SocialAppsManager::class)->name('social_view');
    
    
    Route::get('/contact-entries', ContactFormEntries::class)->name('contact_entries');

    Route::get('/contact-entry/{id}', ViewContactFormEntry::class)->name('contact_view_entry');
     
    
});
});
