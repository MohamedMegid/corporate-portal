<?php

use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socialmedia')->insert([
            'facebook' => 'facebook.com',
            'twitter' => 'twitter.com',
            'gplus' => 'google.com',
            'linkedin' => 'linkedin.com',
        ]);

    }
}
