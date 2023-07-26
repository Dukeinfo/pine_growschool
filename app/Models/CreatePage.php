<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CreatePage extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking
    protected $guarded = [];
}
