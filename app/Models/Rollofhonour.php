<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryHonour;
use App\Models\SubCategoryHonour;
class Rollofhonour extends Model
{
    use HasFactory;
    use SoftDeletes;

     public function gelCategory()
    {
        return $this->belongsTo(CategoryHonour::class,'category_honour_id');
    }

     public function gelSubCategory()
    {
        return $this->belongsTo(SubCategoryHonour::class,'sub_category');
    }
}
