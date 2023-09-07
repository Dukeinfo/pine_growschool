<?php

use App\Models\Categories;
use App\Models\ClassMaster;
use App\Models\FaqCategory;
use App\Models\FaqData;
use App\Models\Location;
use App\Models\Menu;
use App\Models\SectionMaster;
use App\Models\SubjectTeach;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function authUserId(){
    return Auth::id();
 }
 function getMenuName($id){
    $menuName = Menu::where('id', $id)->first();
    return $menuName->name;
}
function getGalCategory($id){
        $galleryCategory =  Categories::where('id', $id)->first();
    return $galleryCategory->name;

}

function getSubjectname($id){
    $subject =  SubjectTeach::where('id', $id)->first();
return $subject->name;

}
function getClassName($id){
    $fetchClass =  ClassMaster::where('id', $id)->first();
return $fetchClass->classname;

}
function getFaqName($id){
    $faqname =  FaqCategory::where('id', $id)->first();
return $faqname->name;

}
function getSectionName($id){
    $fetchSection =  SectionMaster::where('id', $id)->first();
return $fetchSection->name;

}



function getThumbnail($value) {
    if (str_starts_with($value, 'http')) {
        return $value;
    }
    return asset('uploads/thumbnail/'.$value);
}
// backgroundimage 
function getsubmenuImage($value) {
    return asset('storage/uploads/submenu/'.$value);
}

function getpageImage($value) {
    return asset('storage/uploads/page/'.$value);
}


function getmultiple_images($value) {
    return asset('storage/uploads/multiple_images/'.$value);
}

function getCoaching($value) {
    return asset('storage/uploads/coaching/'.$value);
}

function getfacility($value) {
    return asset('storage/uploads/facility/'.$value);
}
function getTopperImages($value) {
    return asset('storage/uploads/our_topper/'.$value);
}
function getboardmembers($value) {
    return asset('storage/uploads/boardmembers/'.$value);
}

function getGalleryCategory($value) {
    return asset('storage/uploads/gallery_cat/'.$value);
}

// /uploads/staff
function getOurStaff($value) {
    return asset('storage/uploads/staff/'.$value);
}

function getsliderImages($value) {
    return asset('storage/uploads/slider/'.$value);
}

function gettestimonia($value) {
    return asset('storage/uploads/testimonia/'.$value);
}
function downloaddocument($value) {
    return asset('storage/uploads/document/'.$value);
}

function getUserIp()
{
    return !empty(request()->server('HTTP_CF_CONNECTING_IP')) ? request()->server('HTTP_CF_CONNECTING_IP') : request()->getClientIp();
}


function getGalleryImage($image)
{
    if (str_starts_with($image, 'http')) {
        return $image;
    }

    return   asset('storage/uploads/gallery_cat/'.$image);
}


function getGallerydetail($image)
{
    if (str_starts_with($image, 'http')) {
        return $image;
    }

    return   asset('storage/uploads/gallery/'.$image);
}


function getGroupPhoto($value) {
    return asset('storage/uploads/group_photo/'.$value);
}