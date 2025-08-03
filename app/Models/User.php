<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Menu;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship: user has many roles (many-to-many)
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    /**
     * Relationship: user has direct access to menus (many-to-many)
     */
    public function accessibleMenus()
    {
        return $this->belongsToMany(Menu::class, 'user_menu_access');
    }

    /**
     * Get all menus accessible by user (role + individual)
     */
    public function allMenus()
    {
        $roleMenuIds = Menu::whereHas('roles', function ($query) {
            $query->whereIn('roles.id', $this->roles->pluck('id'));
        })->pluck('id')->toArray();

        $userMenuIds = $this->accessibleMenus()->pluck('menus.id')->toArray();

        return Menu::with('children')
            ->whereIn('id', array_unique(array_merge($roleMenuIds, $userMenuIds)))
            ->get();
    }
}
