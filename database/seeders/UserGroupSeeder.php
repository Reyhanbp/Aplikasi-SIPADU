<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_groups')->delete();
        UserGroup::create(['id' => 1, 'name' => 'Admin']);
        UserGroup::create(['id' => 2, 'name' => 'Warga']);

    }
}
