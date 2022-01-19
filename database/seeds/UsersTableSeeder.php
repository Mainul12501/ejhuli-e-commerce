<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => '7905266028',
                'password' => bcrypt('12345678'),
                'user_type' => 1,
                'status' => 1,
            ],
        ]);
        DB::table('admins')->insert([
            [
                'user_id' => 1,
                'name' => 'Ankit',
                'email' => 'cs.ankitprajapati@gmail.com',
            ],
        ]);
    }
}
