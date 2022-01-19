<?php

use App\Models\Story;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stories')->truncate();
        Story::insert([
            ['id' => 1, 'title' => 'Story image 1', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img1.jpg'],
            ['id' => 2, 'title' => 'Story image 2', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img2.jpg'],
            ['id' => 3, 'title' => 'Story image 3', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img3.jpg'],
            ['id' => 4, 'title' => 'Story image 4', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img4.jpg'],
            ['id' => 5, 'title' => 'Story image 5', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img5.jpg'],
            ['id' => 6, 'title' => 'Story image 6', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img6.jpg'],
            ['id' => 7, 'title' => 'Story image 7', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img7.jpg'],
            ['id' => 8, 'title' => 'Story image 8', 'link' => 'http://ejhuli.com/', 'image' => 'insta_img8.jpg'],
        ]);
    }
}
