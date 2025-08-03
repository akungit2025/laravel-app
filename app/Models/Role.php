<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Menu;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'role_menu_access');
    }
}
