<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassMaster;
use App\Models\SectionMaster;
class OurTopper extends Model
{
    use HasFactory;
    use SoftDeletes;  

      public function Class()
    {
        return $this->belongsTo(ClassMaster::class,'class');
    }

      public function Section()
    {
        return $this->belongsTo(SectionMaster::class,'section');
    }
}
