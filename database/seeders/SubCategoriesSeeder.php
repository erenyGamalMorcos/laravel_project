<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sub_categories')->delete();
        $sub_categories = [
            ['sub_category_name_en' => 'sub_Category 1 en', 'sub_category_name_ar' => 'sub_Category 1 ar', 'category_id' => 1],
            ['sub_category_name_en' => 'sub_Category 11 en', 'sub_category_name_ar' => 'sub_Category 11 ar', 'category_id' => 1],
            ['sub_category_name_en' => 'sub_Category 2 en', 'sub_category_name_ar' => 'sub_Category 2 ar', 'category_id' => 2],
            ['sub_category_name_en' => 'sub_Category 3 en', 'sub_category_name_ar' => 'sub_Category 3 ar', 'category_id' => 3],
        ];

        DB::table('sub_categories')->insert($sub_categories);
    }
}
