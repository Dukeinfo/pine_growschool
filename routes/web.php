<?php

use App\Http\Livewire\Backend\AdminDashboard;
use App\Http\Livewire\Backend\Menu\ViewMenu;
use App\Http\Livewire\Backend\Menu\EditMenu;
use App\Http\Livewire\Backend\SubMenu\ViewSubMenu;
use App\Http\Livewire\Backend\Blog\AddBlog;
use App\Http\Livewire\Backend\Blog\ManageBlog;
use App\Http\Livewire\Backend\Gallery\ViewGalleryCategory;
use App\Http\Livewire\Backend\Membership\ViewMembership;
use App\Http\Livewire\Backend\Membership\EditMembership;
use App\Http\Livewire\Backend\Seo\FooterSnippets;
use App\Http\Livewire\Backend\Seo\HeaderSnippets;
use App\Http\Livewire\Backend\Seo\Metadetails;
use App\Http\Livewire\Backend\Slider\ViewHomeSlider;
use App\Http\Livewire\Backend\Slider\EditHomeSlider;
use App\Http\Livewire\Backend\Testimonials\ViewTestimonials;
use App\Http\Livewire\Frontend\Home\Homepage;
use App\Http\Livewire\Backend\Login\AdminLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
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

Route::get('/view/menu', ViewMenu::class)->name('view_menu');
Route::get('/edit/menu/{id}', EditMenu::class)->name('edit_menu');

Route::get('/view/submenu', ViewSubMenu::class)->name('view_subnmenu');

    Route::get('/view/slider', ViewHomeSlider::class)->name('view_home_slider');
    Route::get('/edit/slider/{id}', EditHomeSlider::class)->name('edit_home_slider');
    Route::get('/view/membership', ViewMembership::class)->name('view_membership');
    Route::get('/edit/membership/{id}', EditMembership::class)->name('edit_membership');
    Route::get('/view/testimonials', ViewTestimonials::class)->name('view_testimonials');
    Route::get('/view/Category', ViewGalleryCategory::class)->name('view_category');
    Route::get('/add/blog', AddBlog::class)->name('add_blog');
    Route::get('/manage/blog', ManageBlog::class)->name('manage_blog');
    Route::get('/manage/seo', Metadetails::class)->name('manage_metadata');
    Route::get('/header/snippets', HeaderSnippets::class)->name('manage_snippets');
    Route::get('/footer/snippets', FooterSnippets::class)->name('manage_footer_snippets');
    
});
});

