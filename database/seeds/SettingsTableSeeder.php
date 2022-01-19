<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'id' => 1,
                'setting_name' => 'delivery_charge',
                'setting_value' => 50,
            ],
            [
                'id' => 2,
                'setting_name' => 'offer_text',
                'setting_value' => 'Free Ground Shipping Over $250',
            ],
            [
                'id' => 3,
                'setting_name' => 'cash_on_delivery',
                'setting_value' => 'Yes', // Yes=> Enabled, No => Disabled
            ],
            [
                'id' => 4,
                'setting_name' => 'website_logo',
                'setting_value' => null,
            ],
            [
                'id' => 5,
                'offer_text' => 'popup',
                'setting_value' => '{"title":"Subscribe2 Newsletter And Get 25% Discount!2","link":"http:\/\/localhost\/projects\/shopzen-v2\/","popup_image":"1619259382-popup_img3.jpg","description":"Subscribe to the newsletter to receive updates about new products."}',
            ],
            [
                'id' => 6,
                'offer_text' => 'seo',
                'setting_value' => '{"meta_description":"Ejhuli is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fasion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.","meta_keywords":"ecommerce, electronics store, Fasion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store"}',
            ],
        ]);
    }
}
