<?php

use Illuminate\Database\Seeder;

class MainInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maininfo')->insert([
            'logo' => 'Pacha.jpg',
            'favicon' => 'Pacha.jpg'
        ]);
		DB::table('maininfo_trans')->insert([
            'title' => 'شعلة الابداع',
            'keywords' => 'اختبار',
            'description' => 'اختبار',
			'lang' => 'ar',
			'tid' => '1'
        ]);
        DB::table('maininfo_trans')->insert([
            'name' => 'INNOFLAME',
            'keywords' => 'test',
            'description' => 'test',
			'lang' => 'en',
			'tid' => '1'
        ]);
    }
}
