<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
                [
                    'id' => 1,
                    'category_id' => 1,
                    'subcategory' => 'Mens',
                    'slug' => 'mens'
                ],
                [
                    'id' => 2,
                    'category_id' => 1,
                    'subcategory' => 'Pets',
                    'slug' => 'pets'
                ],
                [
                    'id' => 3,
                    'category_id' => 2,
                    'subcategory' => 'Home Appliance',
                    'slug' => 'home-appliance'
                ],
                [
                    'id' => 4,
                    'category_id' => 4,
                    'subcategory' => 'Smart Phones',
                    'slug' => 'smart-phones'
                ],
                [
                    'id' => 5,
                    'category_id' => 5,
                    'subcategory' => 'Womens',
                    'slug' => 'womens'
                ],
            ]
        );
    }
}
