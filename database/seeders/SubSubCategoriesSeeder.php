<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sub_sub_categories')->delete();
        $sub_sub_categories = [
            ['sub_sub_category_name_en' => 'sub_sub_Category 1 en', 'sub_sub_category_name_ar' => 'sub_sub_Category 1 ar', 'sub_category_id' => 1],
            ['sub_sub_category_name_en' => 'sub_sub_Category 11 en', 'sub_sub_category_name_ar' => 'sub_sub_Category 11 ar', 'sub_category_id' => 2],
            ['sub_sub_category_name_en' => 'sub_sub_Category 2 en', 'sub_sub_category_name_ar' => 'sub_sub_Category 2 ar', 'sub_category_id' => 3],
            ['sub_sub_category_name_en' => 'sub_sub_Category 3 en', 'sub_sub_category_name_ar' => 'sub_sub_Category 3 ar', 'sub_category_id' => 4],
        ];

        DB::table('sub_sub_categories')->insert($sub_sub_categories);
    }
}
