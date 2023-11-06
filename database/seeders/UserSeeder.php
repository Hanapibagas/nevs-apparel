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
    }
}
