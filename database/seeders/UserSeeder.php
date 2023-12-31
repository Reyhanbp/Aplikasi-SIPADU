<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin',
            'user_group_id' => '1',
            'jenis_kelamin' => 'Perempuan',
            'profil' => '',
        ]);
        User::create([
            'name' => 'Administrator',
            'email' => 'reyhan@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'warga',
            'user_group_id' => '1',
            'jenis_kelamin' => 'Perempuan',
            'profil' => '',
        ]);
    }
}
