<?php

use Illuminate\Database\Seeder;

class MenuTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus_trans')->insert([
            'name' => 'الرئيسية',
            'tid' => '1',
            'lang' => 'en',
        ]);

        DB::table('menus_trans')->insert([
            'name' => 'major',
            'tid' => '1',
            'lang' => 'ar',
        ]);
    }
}
