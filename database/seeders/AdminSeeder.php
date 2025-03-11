<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admin')->insert([
            [
                'username' => 'Hannan',
                'email' => 'hannan@gmail.com',
                'password' => Hash::make('Hannan1234'),
            ],
            [
                'username' => 'Luthfi',
                'email' => 'luthfi@gmail.com',
                'password' => Hash::make('luthfi1234'),
            ],
            [
                'username' => 'Rhehan',
                'email' => 'rhehan@gmail.com',
                'password' => Hash::make('rhehan1234'),
            ],
        ]);
        DB::table('user')->insert([
            [
                'username' => 'Hannan',
                'no_induk' => '1234567890',
                'tanggal_lahir' => '1999-01-01',
                'kelas' => '12',
                'status' => 'aktif',
            ]
        ]);
    }
}
