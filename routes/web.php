<?php

use App\Http\Livewire\Backend\AdminDashboard;
use App\Http\Livewire\Backend\Blog\AddBlog;
use App\Http\Livewire\Backend\Blog\ManageBlog;
use App\Http\Livewire\Backend\Gallery\ViewGalleryCategory;
use App\Http\Livewire\Backend\Membership\ViewMembership;
use App\Http\Livewire\Backend\Seo\FooterSnippets;
use App\Http\Livewire\Backend\Seo\HeaderSnippets;
use App\Http\Livewire\Backend\Seo\Metadetails;
use App\Http\Livewire\Backend\Slider\ViewHomeSlider;
use App\Http\Livewire\Backend\Testimonials\ViewTestimonials;
use App\Http\Livewire\Frontend\Home\Homepage;
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

Route::group(['middleware' => 'auth'],function(){
    Route::prefix('admin')->group(function(){

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin_dashboard');
    Route::get('/view/slider', ViewHomeSlider::class)->name('view_home_slider');
    Route::get('/view/membership', ViewMembership::class)->name('view_membership');
    Route::get('/view/testimonials', ViewTestimonials::class)->name('view_testimonials');
    Route::get('/view/Category', ViewGalleryCategory::class)->name('view_category');
    Route::get('/add/blog', AddBlog::class)->name('add_blog');
    Route::get('/manage/blog', ManageBlog::class)->name('manage_blog');
    Route::get('/manage/seo', Metadetails::class)->name('manage_metadata');
    Route::get('/header/snippets', HeaderSnippets::class)->name('manage_snippets');
    Route::get('/footer/snippets', FooterSnippets::class)->name('manage_footer_snippets');


       
    
    
});
});

