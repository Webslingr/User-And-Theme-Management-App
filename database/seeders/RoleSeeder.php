<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User Administrator',
            'description' => 'Hello I am a user administrator',
            'created_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'Hello I am a moderator',
            'created_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'Theme Manager',
            'description' => 'Hello I am a theme manager',
            'created_at' => Carbon::now(),
        ]);
    }
}
