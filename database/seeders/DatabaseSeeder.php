<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama_lengkap' => 'Dennisse',
                'username' => 'Denn',
                'email' => 'admin@gmail.com',

                'password' => Hash::make('111'),
                'role' => 'admin',
                'no_hp' => '+(62) 8596 3176 010',

            ],

            [
                'nama_lengkap' => 'Yann',
                'username' => 'Yann',
                // 'alamat' => 'Lawang, Malang, Jawa Timur',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'no_hp' => '+(62) 8596 3176 909',

            ],


        ]);
    }
}
