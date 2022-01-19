<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [ 'id' => 1, 'tag' => 'Health Products','slug' => 'health-products'],
            [ 'id' => 2, 'tag' => 'Bags','slug' => 'bags'],
            [ 'id' => 3, 'tag' => 'Laptops','slug' => 'laptops'],
            [ 'id' => 4, 'tag' => 'Mobiles','slug' => 'mobiles'],
            [ 'id' => 5, 'tag' => 'Cloths','slug' => 'cloths'],
        ]);
    }
}
