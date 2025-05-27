<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'nama' => 'Christian',
                'email' => 'Christian@maranatha.ac.id',
                'password' => Hash::make('password123'),
                'id_role' => 1,
            ],
            [
                'nama' => 'Marchell',
                'email' => 'Marchell@maranatha.ac.id',
                'password' => Hash::make('password123'),
                'id_role' => 2,
            ],
            [
                'nama' => 'Raymond',
                'email' => 'Raymond@maranatha.ac.id',
                'password' => Hash::make('password123'),
                'id_role' => 3,
            ],
            [
                'nama' => 'Anthony',
                'email' => 'Anthony@maranatha.ac.id',
                'password' => Hash::make('password123'),
                'id_role' => 4,
            ],
        ]);
    }
}
