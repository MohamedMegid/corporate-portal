<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'corporate_portal@innoflame.com',
            'phone' => '95668784',
            'password' => bcrypt('corp@#2016'),
            'confirmed'=>'1',
            'active'=>'1'
        ]);

        DB::table('users_roles')->insert([
            'role_id' => '3',
            'user_id'=>'1'
        ]);
    }
}
