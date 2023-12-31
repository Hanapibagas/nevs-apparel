<?php

namespace Database\Seeders;

use App\Models\KeraBaju;
use App\Models\PolaCeleana;
use App\Models\PolaLengan;
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
            'name' => 'heru',
            'email' => 'heru@gmail.com',
            'roles' => 'cs',
            'gambar' => 'cs.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'fauzi',
            'email' => 'fauzi@gmail.com',
            'roles' => 'disainer',
            'gambar' => 'disainer.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'hafid',
            'email' => 'hafid@gmail.com',
            'roles' => 'layout',
            'gambar' => 'layout.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'ridwan',
            'email' => 'ridwan@gmail.com',
            'roles' => 'atexco',
            'gambar' => 'atexco.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'malik',
            'email' => 'malik@gmail.com',
            'roles' => 'mimaki',
            'gambar' => 'atexco.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'password' => bcrypt('12345678')
        ]);

        KeraBaju::create([
            'jenis_kera' => 'Kerah Narrow PSM',
            'gambar' => 'data-jenis-kera/0R4b65U9sl9AfbxBjqTVhkVCNtjVw776EFUh6O3n.jpg'
        ]);
        PolaLengan::create([
            'jenis_kera' => 'Kerah Narrow PSM',
            'gambar' => 'data-jenis-lengan/DH71I45dnvvJyBenCL1D5r2uIiUtmUvoZDta9vtE.jpg'
        ]);
        PolaCeleana::create([
            'jenis_kera' => 'Lama',
            'gambar' => 'data-jenis-celana/g8oeidt7ABUAtDSX8BYvpb8cC6n9zLWscuF8L0UT.jpg'
        ]);
    }
}
