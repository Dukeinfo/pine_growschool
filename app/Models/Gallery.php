<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function galCategory()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

}
