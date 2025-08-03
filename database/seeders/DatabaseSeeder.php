<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert users
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Operator User',
                'email' => 'operator@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. Insert roles
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'staff'],
            ['id' => 3, 'name' => 'operator'],
        ]);

        // 3. Assign roles to users
        DB::table('user_roles')->insert([
            ['id' => 1, 'user_id' => 1, 'role_id' => 1],
            ['id' => 2, 'user_id' => 2, 'role_id' => 2],
            ['id' => 3, 'user_id' => 3, 'role_id' => 3],
        ]);

        // 4. Insert menus
        DB::table('menus')->insert([
            ['id' => 1, 'title' => 'Dashboard', 'route' => '/dashboard', 'icon' => 'fas fa-tachometer-alt', 'parent_id' => null, 'order_num' => 1],
            ['id' => 2, 'title' => 'Users', 'route' => '/users', 'icon' => 'fas fa-users', 'parent_id' => null, 'order_num' => 2],
            ['id' => 3, 'title' => 'Settings', 'route' => '/settings', 'icon' => 'fas fa-cogs', 'parent_id' => null, 'order_num' => 3],
            ['id' => 4, 'title' => 'Submenu A', 'route' => '/settings/a', 'icon' => 'fas fa-wrench', 'parent_id' => 3, 'order_num' => 1],
            ['id' => 5, 'title' => 'Submenu B', 'route' => '/settings/b', 'icon' => 'fas fa-tools', 'parent_id' => 3, 'order_num' => 2],
        ]);

        // 5. Assign menu access by role
        DB::table('role_menu_access')->insert([
            ['role_id' => 1, 'menu_id' => 1],
            ['role_id' => 1, 'menu_id' => 2],
            ['role_id' => 1, 'menu_id' => 3],
            ['role_id' => 1, 'menu_id' => 4],
            ['role_id' => 1, 'menu_id' => 5],
            ['role_id' => 2, 'menu_id' => 1],
            ['role_id' => 2, 'menu_id' => 3],
            ['role_id' => 3, 'menu_id' => 1],
        ]);

        // 6. Assign menu access directly to specific users (overrides role)
        DB::table('user_menu_access')->insert([
            ['user_id' => 1, 'menu_id' => 1],
            ['user_id' => 1, 'menu_id' => 2],
            ['user_id' => 2, 'menu_id' => 1],
            ['user_id' => 2, 'menu_id' => 3],
            ['user_id' => 3, 'menu_id' => 1],
        ]);
    }
}
