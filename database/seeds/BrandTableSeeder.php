<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'id' => 1,
                'name' => 'AccChandon Wine',
                'slug' => 'accchandon-wine',
            ],
            [
                'id' => 2,
                'name' => 'HiDesign',
                'slug' => 'hidesign',
            ],
            [
                'id' => 3,
                'name' => 'Allen Solly',
                'slug' => 'allen-solly',
            ],
            [
                'id' => 4,
                'name' => 'East India Company',
                'slug' => 'east-india-company',
            ],
            [
                'id' => 5,
                'name' => 'Allen Cooper India',
                'slug' => 'allen-cooper-india',
            ],
        ]);
    }
}
