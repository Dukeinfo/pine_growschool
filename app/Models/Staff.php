<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
