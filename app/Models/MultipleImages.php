<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultipleImages extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking
    
    protected $guarded = [];

    public function whyus()
    {
        return $this->belongsTo(Whyus::class);
    }
}
