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
            'permission_show' => 1,
            'asal_kota' => "owner",
            'password' => bcrypt('superadmin')
        ]);
        User::create([
            'name' => 'cs',
            'email' => 'cs@gmail.com',
            'roles' => 'cs',
            'gambar' => 'cs.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'disiner',
            'email' => 'disiner@gmail.com',
            'roles' => 'disainer',
            'gambar' => 'disainer.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'layout',
            'email' => 'layout@gmail.com',
            'roles' => 'layout',
            'gambar' => 'layout.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'atexco makassar',
            'email' => 'atexco@gmail.com',
            'roles' => 'atexco',
            'gambar' => 'atexco.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_create' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'mimaki makassar',
            'email' => 'mimaki@gmail.com',
            'roles' => 'mimaki',
            'gambar' => 'mimaki.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'preskain',
            'email' => 'preskain@gmail.com',
            'roles' => 'pres_kain',
            'gambar' => 'preskain.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'lasercut',
            'email' => 'lasercut@gmail.com',
            'roles' => 'laser_cut',
            'gambar' => 'lasercut.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'manualcut',
            'email' => 'manualcut@gmail.com',
            'roles' => 'manual_cut',
            'gambar' => 'manualcut.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'sortir',
            'email' => 'sortir@gmail.com',
            'roles' => 'sortir',
            'gambar' => 'sortir.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'jahitbaju',
            'email' => 'jahitbaju@gmail.com',
            'roles' => 'jahit_baju',
            'gambar' => 'jahitbaju.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'jahitcelana',
            'email' => 'jahitcelana@gmail.com',
            'roles' => 'jahit_celana',
            'gambar' => 'jahitcelana.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'presstag',
            'email' => 'presstag@gmail.com',
            'roles' => 'press_tag',
            'gambar' => 'presstag.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'packing',
            'email' => 'packing@gmail.com',
            'roles' => 'packing',
            'gambar' => 'packing.jpg',
            'permission_edit' => 1,
            'permission_hapus' => 1,
            'permission_hapus' => 1,
            'permission_show' => 1,
            'asal_kota' => "makassar",
            'password' => bcrypt('12345678')
        ]);

        // KeraBaju::create([
        //     'jenis_kera' => 'Kerah Narrow PSM',
        //     'gambar' => 'data-jenis-kera/0R4b65U9sl9AfbxBjqTVhkVCNtjVw776EFUh6O3n.jpg'
        // ]);
        // PolaLengan::create([
        //     'jenis_kera' => 'Kerah Narrow PSM',
        //     'gambar' => 'data-jenis-lengan/DH71I45dnvvJyBenCL1D5r2uIiUtmUvoZDta9vtE.jpg'
        // ]);
        // PolaCeleana::create([
        //     'jenis_kera' => 'Lama',
        //     'gambar' => 'data-jenis-celana/g8oeidt7ABUAtDSX8BYvpb8cC6n9zLWscuF8L0UT.jpg'
        // ]);
    }
}
