<?php

use App\Models\Location;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function authUserId(){
    return Auth::id();
 }

function getThumbnail($value) {
    return asset('uploads/thumbnail/'.$value);
}
function getsubmenuImage($value) {
    return asset('storage/uploads/submenu/'.$value);
}



function getTopperImages($value) {
    return asset('storage/uploads/our_topper/'.$value);
}
function getboardmembers($value) {
    return asset('storage/uploads/boardmembers/'.$value);
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
