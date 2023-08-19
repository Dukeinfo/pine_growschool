<?php

use App\Models\Location;
use App\Models\Menu;
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
function getThumbnail($value) {
    return asset('uploads/thumbnail/'.$value);
}
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


