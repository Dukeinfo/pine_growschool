<?php


use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\CkImageUploadController;

use App\Http\Livewire\Frontend\Home\Homepage;
use App\Http\Livewire\Frontend\Detail\DetailpageView;

use App\Http\Livewire\Backend\AdminDashboard;
use App\Http\Livewire\Backend\Admissions\AdmissionsInquery;
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
use App\Http\Livewire\Backend\Master\AddFaqsCategory;
use App\Http\Livewire\Backend\Master\EditFaqsCategory;
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
use App\Http\Livewire\Backend\Gallery\TrashKnowledgeHome;
use App\Http\Livewire\Backend\Gallery\AddGroupPhoto;
use App\Http\Livewire\Backend\Gallery\EditGroupPhoto;
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
use App\Http\Livewire\Backend\Whyus\WhyusPage;
use App\Http\Livewire\Backend\Whyus\EditWhyusPage;
use App\Http\Livewire\Backend\Whyus\TrashWhyusPage;
use App\Http\Livewire\Backend\Testimonials\ViewTestimonials;
use App\Http\Livewire\Backend\Testimonials\EditTestimonials;
use App\Http\Livewire\Backend\Testimonials\TrashTestimonials;
use App\Http\Livewire\Backend\Boardmembers\ViewBoardMembers;
use App\Http\Livewire\Backend\Boardmembers\EditBoardMembers;
use App\Http\Livewire\Backend\Boardmembers\TrashBoardMembers;
use App\Http\Livewire\Backend\Contact\ContactFormEntries;
use App\Http\Livewire\Backend\Contact\ViewContactFormEntry;
use App\Http\Livewire\Backend\Contact\TrashContactFormEntries;
use App\Http\Livewire\Backend\Login\AdminLogin;
use App\Http\Livewire\Backend\Pages\AddPageContent;
use App\Http\Livewire\Backend\Pages\EditPageContent;
use App\Http\Livewire\Backend\Pages\TrashPageContent;
use App\Http\Livewire\Backend\Pages\CreatePage;
use App\Http\Livewire\Backend\Pages\EditPage;
use App\Http\Livewire\Backend\Pages\TrashPage;
use App\Http\Livewire\Backend\Profile\AdminProfile;
use App\Http\Livewire\Backend\Staff\ViewStaff;
use App\Http\Livewire\Backend\Staff\EditStaff;
use App\Http\Livewire\Backend\Staff\TrashStaff;
use App\Http\Livewire\Backend\Principal\Message;
use App\Http\Livewire\Backend\Principal\EditMessage;
use App\Http\Livewire\Backend\Principal\TrashMessage;
use App\Http\Livewire\Backend\Facilities\ViewFacilities;
use App\Http\Livewire\Backend\Facilities\EditFacilities;
use App\Http\Livewire\Backend\Facilities\TrashFacilities;
use App\Http\Livewire\Backend\Footer\ContactusView;
use App\Http\Livewire\Backend\Footer\TrashContactus;
use App\Http\Livewire\Backend\Footer\SocialAppsManager;
use App\Http\Livewire\Backend\Footer\TrashSocialAppsManager;
use App\Http\Livewire\Backend\Memories\ViewGuestBook;
use App\Http\Livewire\Backend\Memories\EditGuestBook;
use App\Http\Livewire\Backend\Memories\TrashGuestBook;
use App\Http\Livewire\Backend\Memories\ViewGrapevine;
use App\Http\Livewire\Backend\Memories\EditGrapevine;
use App\Http\Livewire\Backend\Memories\TrashGrapevine;
use App\Http\Livewire\Backend\Coachings\ViewCoachings;
use App\Http\Livewire\Backend\Coachings\EditCoachings;
use App\Http\Livewire\Backend\Coachings\TrashCoachings;

use App\Http\Livewire\Backend\Rollofhonour\AddCategory;
use App\Http\Livewire\Backend\Rollofhonour\EditCategory;
use App\Http\Livewire\Backend\Rollofhonour\SubCategory;
use App\Http\Livewire\Backend\Rollofhonour\EditSubCategory;
use App\Http\Livewire\Backend\Rollofhonour\ViewRollofhonour;
use App\Http\Livewire\Backend\Rollofhonour\EditRollofhonour;
use App\Http\Livewire\Backend\Calendar\SchoolCalendar;
use App\Http\Livewire\Backend\Calendar\EditSchoolCalendar;
use App\Http\Livewire\Backend\Calendar\ImportSchoolEvent;
use App\Http\Livewire\Backend\Document\AddDocument;
use App\Http\Livewire\Backend\Document\EditDocument;
use App\Http\Livewire\Backend\Certificate\AddTransferCertificate;
use App\Http\Livewire\Backend\Certificate\EditTransferCertificate;
use App\Http\Livewire\Backend\Faq\CreateFaq;
use App\Http\Livewire\Backend\Mandatory\MandatoryPublicDisclosure;
use App\Http\Livewire\Backend\Mandatory\ViewMandatoryPublicDisclosure;
use App\Http\Livewire\Backend\VirtualTour\ViewVirtualTour;
use App\Http\Livewire\Backend\VirtualTour\EditVirtualTour;

use App\Http\Livewire\Frontend\AboutUs;
use App\Http\Livewire\Frontend\AdmissionForm;
use App\Http\Livewire\Frontend\AdmissionProcess;
use App\Http\Livewire\Frontend\Career;
use App\Http\Livewire\Frontend\ContactUs;
use App\Http\Livewire\Frontend\DownloadResources;
use App\Http\Livewire\Frontend\Facilities;
use App\Http\Livewire\Frontend\FaqsIntroduction;
use App\Http\Livewire\Frontend\Gallery;
use App\Http\Livewire\Frontend\GalleryDetail;
use App\Http\Livewire\Frontend\Location;
use App\Http\Livewire\Frontend\OurFaculties;
use App\Http\Livewire\Frontend\OurFounder;
use App\Http\Livewire\Frontend\GroupPhoto;
use App\Http\Livewire\Frontend\Event;
use App\Http\Livewire\Frontend\TransferCertificate;
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
Route::get('detail/page/{page_id}/{slug}', DetailpageView::class)->name('detail_page');
Route::group(['middleware' => ['check-menu-route-status']], function () {
Route::get('/', Homepage::class)->name('home.homepage');

Route::get('/about-us', AboutUs::class)->name('home.about_us');
Route::get('/admission-process', AdmissionProcess::class)->name('home.admission_process');
Route::get('/contact-us', ContactUs::class)->name('home.contact_us');
Route::get('/facilities', Facilities::class)->name('home.facilities');
Route::get('/faqs/{id}/{slug}', FaqsIntroduction::class)->name('faqs_introduction');
Route::get('/gallery', Gallery::class)->name('home.gallery');
Route::get('/location', Location::class)->name('home.location');
Route::get('/our-founder', OurFounder::class)->name('home.our_founder');
Route::get('/gallery-detail/{category_id}/', GalleryDetail::class)->name('gallery_detail');
// new pages 
Route::get('/admission-form', AdmissionForm::class)->name('home.admission_form');
Route::get('/career', Career::class)->name('home.career');
Route::get('/download-resources', DownloadResources::class)->name('home.download_resources');
Route::get('/our-faculties', OurFaculties::class)->name('home.our_faculties');
Route::get('/group-photo', GroupPhoto::class)->name('home.group_photo');
Route::get('/school-event', Event::class)->name('home.school_event');
Route::get('/transfer-certificate', TransferCertificate::class)->name('home.transfer_certificate');
});



// ================ frontend route end ===============
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

Route::post('ckeditor/image_upload', [CkImageUploadController::class, 'upload'])->name('image.upload');
Route::get('/git-status', [CkImageUploadController::class, 'showGitStatus'])->name('git.status');
    Route::get('/view/slider', ViewHomeSlider::class)->name('view_home_slider');
    Route::get('/edit/slider/{id}', EditHomeSlider::class)->name('edit_home_slider');
    Route::get('/view/slider/trash', TrashHomeSlider::class)->name('trash_home_slider');

    Route::get('/whyus/page', WhyusPage::class)->name('whyus_page');
    Route::get('/whyus/page/{id}', EditWhyusPage::class)->name('edit_whyus_page');
    Route::get('/whyus/page/trash', TrashWhyusPage::class)->name('trash_whyus_page');

    Route::get('/view/membership', ViewMembership::class)->name('view_membership');
    Route::get('/edit/membership/{id}', EditMemberShip::class)->name('edit_membership');
    Route::get('/view/membership/trash', TrashMemberShip::class)->name('trash_membership');

    Route::get('/view/testimonials', ViewTestimonials::class)->name('view_testimonials');
    Route::get('/edit/testimonials/{id}', EditTestimonials::class)->name('edit_testimonials');
    Route::get('/view/testimonials/trash', TrashTestimonials::class)->name('trash_testimonials');

    Route::get('/view/coachings', ViewCoachings::class)->name('view_coachings');
    Route::get('/edit/coachings/{id}', EditCoachings::class)->name('edit_coachings');
    Route::get('/view/coachings/trash', TrashCoachings::class)->name('trash_coachings');

    Route::get('/view/category', ViewGalleryCategory::class)->name('view_category');
    Route::get('/edit/category/{id}', EditGalleryCategory::class)->name('edit_category');
    Route::get('/view/category/trash', TrashGalleryCategory::class)->name('trash_category');


    Route::get('/view/latestnews', ViewLatestNews::class)->name('view_news');
    Route::get('/edit/latestnews/{id}', EditLatestNews::class)->name('edit_news');
    Route::get('/view/latestnews/trash', TrashLatestNews::class)->name('trash_news');

    Route::get('/manage/gallery', ManageGallery::class)->name('manage_gallery');
    Route::get('/edit/gallery/{id}', EditGallery::class)->name('edit_gallery');
    Route::get('/manage/gallery/trash', EditGallery::class)->name('trash_gallery'); 

     Route::get('/group-photos', AddGroupPhoto::class)->name('group_phptos');
      Route::get('/group-photos/{id}', EditGroupPhoto::class)->name('edit_group_phptos');

   Route::get('/view/our-topper', ViewOurTopper::class)->name('view_our_topper');
    Route::get('/edit/our-topper/{id}', EditOurTopper::class)->name('edit_our_topper');
   Route::get('/view/our-topper/trash', TrashOurTopper::class)->name('trash_our_topper');

    Route::get('/view/knowledge-home', ViewKnowledgeHome::class)->name('view_knowledge_home');
     Route::get('/edit/knowledge-home/{id}', EditKnowledgeHome::class)->name('edit_knowledge_home');
     Route::get('/view/knowledge-home/trash', TrashKnowledgeHome::class)->name('trash_knowledge_home');

    Route::get('/add/blog', AddBlog::class)->name('add_blog');
    Route::get('/manage/blog', ManageBlog::class)->name('manage_blog');
    Route::get('/edit/blog/{id}', EditBlog::class)->name('edit_blog');
    Route::get('/manage/blog/trash', TrashBlog::class)->name('trash_blog');

    
    Route::get('/manage/seo', Metadetails::class)->name('manage_metadata');
    Route::get('/edit/seo/{id}', EditMetadetails::class)->name('edit_metadata');


    Route::get('/header/snippets', HeaderSnippets::class)->name('manage_snippets');
     Route::get('/edit/header/snippets/{id}', EditHeaderSnippets::class)->name('edit_snippets');
    Route::get('/footer/snippets', FooterSnippets::class)->name('manage_footer_snippets');

    Route::get('/page/content', AddPageContent::class)->name('page_content');
     Route::get('/page/content/edit/{id}', EditPageContent::class)->name('edit_content');
     Route::get('/page/content/trash', TrashPageContent::class)->name('trash_content');

    Route::get('/create/page', CreatePage::class)->name('create_page');
    Route::get('/edit/page/{id}', EditPage::class)->name('edit_page');
    Route::get('/create/page/trash', TrashPage::class)->name('trash_page');

    Route::get('/view/department', ViewDepartment::class)->name('view_department');
    Route::get('/edit/department/{id}', EditDepartment::class)->name('edit_department');
    Route::get('/view/department/trash', TrashDepartment::class)->name('trash_department'); 

    Route::get('/view/staff', ViewStaff::class)->name('view_staff');
    Route::get('/edit/staff/{id}', EditStaff::class)->name('edit_staff');
    Route::get('/view/staff/trash', TrashStaff::class)->name('trash_staff');

     Route::get('/view/boardmembers', ViewBoardMembers::class)->name('view_boardmembers');
     Route::get('/edit/boardmembers/{id}', EditBoardMembers::class)->name('edit_boardmembers');
     Route::get('/view/boardmembers/trash', TrashBoardMembers::class)->name('trash_boardmembers');

    Route::get('/ceate/message', Message::class)->name('create_message');
    Route::get('/edit/message/{id}', EditMessage::class)->name('edit_message');
    Route::get('/ceate/message/trash', TrashMessage::class)->name('trash_message');

    Route::get('/view/facilities', ViewFacilities::class)->name('view_facilities');
    Route::get('/edit/facilities/{id}', EditFacilities::class)->name('edit_facilities');
    Route::get('/view/facilities/trash', TrashFacilities::class)->name('trash_facilities');


    Route::get('/view/guest-book', ViewGuestBook::class)->name('view_guest_book');
    Route::get('/edit/guest-book/{id}', EditGuestBook::class)->name('edit_guest_book');
    Route::get('/view/guest-book/trash', TrashGuestBook::class)->name('tarsh_guest_book');

    Route::get('/view/grapevine', ViewGrapevine::class)->name('view_grapevine');
    Route::get('/edit/grapevine/{id}', EditGrapevine::class)->name('edit_grapevine');
     Route::get('/view/grapevine/trash', TrashGrapevine::class)->name('trash_grapevine');

    Route::get('/contact-view', ContactusView::class)->name('contact_view');
    Route::get('/contact-view/trash', TrashContactus::class)->name('trash_contact');

    Route::get('/social-view', SocialAppsManager::class)->name('social_view');
      Route::get('/social-view/trash', TrashSocialAppsManager::class)->name('trash_social_view');
    
    Route::get('/contact-entries', ContactFormEntries::class)->name('contact_entries');
    Route::get('/contact-entry/{id}', ViewContactFormEntry::class)->name('contact_view_entry');
    Route::get('/contact-entries/trash', TrashContactFormEntries::class)->name('trash_contact_entries');


    Route::get('/add-category', AddCategory::class)->name('add_category');
    Route::get('/edit-category/{id}', EditCategory::class)->name('edit_category');

  

     Route::get('/add-sub-category', SubCategory::class)->name('add_sub_category');
    Route::get('/edit-sub-category/{id}', EditSubCategory::class)->name('edit_sub_category');

    Route::get('/roll-of-honour', ViewRollofhonour::class)->name('roll_of_honour');
    Route::get('/roll-of-honour/{id}', EditRollofhonour::class)->name('edit_roll_of_honour');

    Route::get('/admission-inquery', AdmissionsInquery::class)->name('admission_inquery');

    Route::get('/school-calendar', SchoolCalendar::class)->name('school_calendar');
 Route::get('/edit-school-calendar/{id}', EditSchoolCalendar::class)->name('edit_school_calendar');
   Route::get('/import-school-calendar', ImportSchoolEvent::class)->name('import_school_calendar');

   Route::get('/faqs-category', AddFaqsCategory::class)->name('faqs_category');
 Route::get('/edit-faqs-category/{id}', EditFaqsCategory::class)->name('edit_faqs_category');

 //  CreateFaq
 Route::get('/create-faq', CreateFaq::class)->name('admin_create_faq');

Route::get('/add-document', AddDocument::class)->name('add_document');
Route::get('/edit-document/{id}', EditDocument::class)->name('edit_document');

Route::get('/transfer-certificate', AddTransferCertificate::class)->name('transfer_certificate');
Route::get('/edit-transfer-certificate/{id}', EditTransferCertificate::class)->name('edit_transfer_certificate'); 
Route::get('/mandatory-form', MandatoryPublicDisclosure::class)->name('mandatory_form');
Route::get('/view-mandatory-form', ViewMandatoryPublicDisclosure::class)->name('view_mandatory_form');

Route::get('/virtual-tour', ViewVirtualTour::class)->name('virtual_tour');
Route::get('/edit-virtual-tour/{id}', EditVirtualTour::class)->name('edit_virtual_tour');


         
});
});
