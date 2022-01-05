<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->delete();
        $categories = [
            ['category_name_en' => 'Category 1 en', 'category_name_ar' => 'Category 1 ar'],
            ['category_name_en' => 'Category 2 en', 'category_name_ar' => 'Category 2 ar'],
            ['category_name_en' => 'Category 3 en', 'category_name_ar' => 'Category 3 ar'],
            ];

        DB::table('categories')->insert($categories);
    }
}
