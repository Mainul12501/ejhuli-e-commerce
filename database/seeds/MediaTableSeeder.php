<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Media::insert([
            ['file' => 'other_image1.png', 'type' => 'other_image1'],
            ['file' => 'other_image2.png', 'type' => 'other_image2'],
            ['file' => 'other_image3.png', 'type' => 'other_image3'],
            ['file' => 'other_image4.png', 'type' => 'other_image4'],
            ['file' => 'other_image5.png', 'type' => 'other_image5'],
        ]);
    }
}
