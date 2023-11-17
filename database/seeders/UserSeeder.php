<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'roles' => 'super_admin',
            'gambar' => 'admin.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('superadmin')
        ]);
        User::create([
            'name' => 'Hanapi bagas',
            'email' => 'hanafi@gmail.com',
            'roles' => 'cs',
            'gambar' => 'cs.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Hanapi bagas 1',
            'email' => 'hanafi1@gmail.com',
            'roles' => 'disainer',
            'gambar' => 'disainer.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Hanapi bagas 2',
            'email' => 'hanafi2@gmail.com',
            'roles' => 'layout',
            'gambar' => 'layout.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
    }
}
