<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                [
                    'id' => 1,
                    'category' => 'Health & Fitness',
                    'category_slug' => 'health-and-fitness',
                    'icon_class' => 'icon-heart',
                ],
                [
                    'id' => 2,
                    'category' => 'Home & Kitchen',
                    'category_slug' => 'home-and-kitchen',
                    'icon_class' => 'linearicons-dinner',
                ],
                [
                    'id' => 3,
                    'category' => 'Daily Essentials',
                    'category_slug' => 'daily-essentials',
                    'icon_class' => 'linearicons-leaf',
                ],
                [
                    'id' => 4,
                    'category' => 'Electornics & Accessories',
                    'category_slug' => 'electronics-and-accessories',
                    'icon_class' => 'icon-earphones',
                ],
                [
                    'id' => 5,
                    'category' => 'Cloths',
                    'category_slug' => 'cloths',
                    'icon_class' => 'linearicons-pointer-right'
                ],
              ]
        );
    }
}
