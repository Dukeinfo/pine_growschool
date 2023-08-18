<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Submenu;
class PageContent extends Model
{
    use HasFactory;
    use SoftDeletes; 

    public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }

    
}
