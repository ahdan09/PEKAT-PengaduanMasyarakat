<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nik' => '1234567890123456',
                'nama' => 'Ahdan',
                'email' => 'Ahdan@example.com',
                'role' => 'admin',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '9876543210123456',
                'nama' => 'Petugas',
                'email' => 'petugas@example.com',
                'role' => 'petugas',
                'password' => Hash::make('12345'),
            ],
            [
                'nik' => '1234567890123457',
                'nama' => 'Agus',
                'email' => 'user@example.com',
                'role' => 'user',
                'password' => Hash::make('12345'),
            ],
        ]);
    }
}