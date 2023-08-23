<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryHonour;

class Rollofhonour extends Model
{
    use HasFactory;
    use SoftDeletes;

     public function gelHonourCategory()
    {
        return $this->belongsTo(CategoryHonour::class,'category_honour_id');
    }
}
