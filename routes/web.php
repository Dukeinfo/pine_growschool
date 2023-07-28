<?php

use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\CkImageUploadController;
use App\Http\Livewire\Backend\AdminDashboard;
use App\Http\Livewire\Backend\Menu\ViewMenu;
use App\Http\Livewire\Backend\Menu\EditMenu;
use App\Http\Livewire\Backend\Menu\TrashMenu;
use App\Http\Livewire\Backend\Submenu\ViewSubMenu;
use App\Http\Livewire\Backend\Submenu\EditSubMenu;
use App\Http\Livewire\Backend\Submenu\TrashSubMenu;
use App\Http\Livewire\Backend\Blog\AddBlog;
use App\Http\Livewire\Backend\Blog\ManageBlog;
use App\Http\Livewire\Backend\Blog\EditBlog;
use App\Http\Livewire\Backend\Blog\TrashBlog;
use App\Http\Livewire\Backend\Department\ViewDepartment;
use App\Http\Livewire\Backend\Department\EditDepartment;
use App\Http\Livewire\Backend\Gallery\ViewGalleryCategory;
use App\Http\Livewire\Backend\Gallery\EditGalleryCategory;
use App\Http\Livewire\Backend\Gallery\TrashGalleryCategory;
use App\Http\Livewire\Backend\Gallery\ManageGallery;
use App\Http\Livewire\Backend\Gallery\EditGallery;
use App\Http\Livewire\Backend\Gallery\TrashGallery;
use App\Http\Livewire\Backend\Membership\ViewMembership;
use App\Http\Livewire\Backend\Membership\EditMembership;
use App\Http\Livewire\Backend\Membership\TrashMembership;
use App\Http\Livewire\Backend\Seo\FooterSnippets;
use App\Http\Livewire\Backend\Seo\HeaderSnippets;
use App\Http\Livewire\Backend\Seo\Metadetails;
use App\Http\Livewire\Backend\Slider\ViewHomeSlider;
use App\Http\Livewire\Backend\Slider\EditHomeSlider;
use App\Http\Livewire\Backend\Slider\TrashHomeSlider;
use App\Http\Livewire\Backend\Testimonials\ViewTestimonials;
use App\Http\Livewire\Backend\Testimonials\EditTestimonials;
use App\Http\Livewire\Backend\Testimonials\TrashTestimonials;
use App\Http\Livewire\Backend\Boardmembers\ViewBoardMembers;
use App\Http\Livewire\Frontend\Home\Homepage;
use App\Http\Livewire\Backend\Login\AdminLogin;
use App\Http\Livewire\Backend\Pages\CreatePage;
use App\Http\Livewire\Backend\Pages\EditPage;
use App\Http\Livewire\Backend\Profile\AdminProfile;
use App\Http\Livewire\Backend\Staff\ViewStaff;
use App\Http\Livewire\Backend\Staff\EditStaff;
use App\Http\Livewire\Backend\Principal\Message;
use App\Http\Livewire\Backend\Facilities\ViewFacilities;
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

Route::get('/', Homepage::class)->name('homepage');


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
    Route::get('/view/membership/trash', TrashMembership::class)->name('trash_membership');

    Route::get('/view/testimonials', ViewTestimonials::class)->name('view_testimonials');
    Route::get('/edit/testimonials/{id}', EditTestimonials::class)->name('edit_testimonials');
    Route::get('/view/testimonials/trash', TrashTestimonials::class)->name('trash_testimonials');

    Route::get('/view/category', ViewGalleryCategory::class)->name('view_category');
    Route::get('/edit/category/{id}', EditGalleryCategory::class)->name('edit_category');
    Route::get('/view/category/trash', TrashGalleryCategory::class)->name('trash_category');

    Route::get('/manage/gallery', ManageGallery::class)->name('manage_gallery');
    Route::get('/edit/gallery/{id}', EditGallery::class)->name('edit_gallery');
    Route::get('/manage/gallery/trash', EditGallery::class)->name('trash_gallery'); 

    Route::get('/add/blog', AddBlog::class)->name('add_blog');
    Route::get('/manage/blog', ManageBlog::class)->name('manage_blog');
    Route::get('/edit/blog/{id}', EditBlog::class)->name('edit_blog');
    Route::get('/manage/blog/trash', TrashBlog::class)->name('trash_blog');

    Route::get('/manage/seo', Metadetails::class)->name('manage_metadata');
    Route::get('/header/snippets', HeaderSnippets::class)->name('manage_snippets');
    Route::get('/footer/snippets', FooterSnippets::class)->name('manage_footer_snippets');

    Route::get('/create/page', CreatePage::class)->name('create_page');
    Route::get('/edit/page/{id}', EditPage::class)->name('edit_page');
    

    Route::get('/view/department', ViewDepartment::class)->name('view_department');
    Route::get('/edit/department/{id}', EditDepartment::class)->name('edit_department');

    Route::get('/view/staff', ViewStaff::class)->name('view_staff');
    Route::get('/edit/staff/{id}', EditStaff::class)->name('edit_staff');

     Route::get('/view/boardmembers', ViewBoardMembers::class)->name('view_boardmembers');

     Route::get('/ceate/message', Message::class)->name('create_message');

    Route::get('/view/facilities', ViewFacilities::class)->name('view_facilities');
      
     
    
});
});
