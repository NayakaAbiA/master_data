<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@gmail.com',
        //     'password' => Hash::make('sup123456'), // Password: password123
        //     'role_id' => 2 // sesuaikan dengan struktur tabel Anda
        // ]);
        // User::create([
        //     'name' => 'Admin Siswa',
        //     'email' => 'adminsiswa@gmail.com',
        //     'password' => Hash::make('sis123456'), // Password: password123
        //     'role_id' => 3 // sesuaikan dengan struktur tabel Anda
        // ]);
        // User::create([
        //     'name' => 'Admin Pegawai',
        //     'email' => 'adminpegawai@gmail.com',
        //     'password' => Hash::make('peg123456'), // Password: password123
        //     'role_id' => 4 // sesuaikan dengan struktur tabel Anda
        // ]);
        // Role::create([
        //     'role' => 'superAdmin',
        // ]);
        // Role::create([
        //     'role' => 'adminSiswa',
        // ]);
        // Role::create([
        //     'role' => 'adminPegawai',
        // ]);
    }
}
