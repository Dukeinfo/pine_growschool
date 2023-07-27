<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Submenu;
class CreatePage extends Model
{
    use HasFactory;
    use SoftDeletes;  //invoking
    protected $guarded = [];

     public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }

     public function SubMenu()
    {
        return $this->belongsTo(Submenu::class,'submenu_id');
    }
}
