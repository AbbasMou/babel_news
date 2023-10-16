<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news_categories')->insert([
            ['name' => 'أخبار', 'click_count' => 0],
            ['name' => 'رياضة', 'click_count' => 0],
            ['name' => 'ثقافة', 'click_count' => 0],
            ['name' => 'اقتصاد', 'click_count' => 0],
            ['name' => 'فيديو وصور', 'click_count' => 0],
            
        ]);
    }
}
