<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'The Web Developer',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'url' => 'https://media.makeameme.org/created/working-as-a-zpw5m7.jpg',
            'link' => '',
            'created_by' => '1',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'The React Developer',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'url' => 'https://testbytes.technoallianceindia.com/wp-content/uploads/2019/06/Untitled-8-1.png',
            'link' => '',
            'created_by' => '2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'title' => 'The Java Developer',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'url' => 'https://i.chzbgr.com/original/17384453/hFCFAC9ED/a-list-of-memes-about-programming-and-coding',
            'link' => '',
            'created_by' => '3',
            'created_at' => Carbon::now(),
        ]);
    }
}
