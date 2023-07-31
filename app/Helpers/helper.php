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

