<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Whyus extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function multipleImages()
    {
        return $this->hasMany(MultipleImages::class);
    }
}
