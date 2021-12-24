<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WebsiteInfosSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_infos')->delete();

        $info = [
            ['option' => 'website_name_en', 'value' => 'test1', 'type' => 'string'],
            ['option' => 'website_name_ar', 'value' => 'test2', 'type' => 'string'],
            ['option' => 'website_email', 'value' => 'x@y.z', 'type' => 'string'],
            ['option' => 'website_phone', 'value' => '01221913604', 'type' => 'integer'],
            ['option' => 'website_address', 'value' => 'El naam', 'type' => 'string'],
            ['option' => 'website_description_en', 'value' => 'This website for Learning laravel', 'type' => 'text'],
            ['option' => 'website_description_ar', 'value' => 'This website for Learning laravel ar', 'type' => 'text'],
            ['option' => 'website_brief_en', 'value' => 'En Brief', 'type' => 'string'],
            ['option' => 'website_brief_ar', 'value' => 'En Brief', 'type' => 'string'],
            ['option' => 'website_logo', 'value' => 'https://source.unsplash.com/random', 'type' => 'image'],
            ];

        DB::table('website_infos')->insert($info);
    }
}
