<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $info = [
            ['name_en' => 'Cairo', 'name_ar' => 'القاهره', 'country_id' => 66],
            ['name_en' => 'Alex', 'name_ar' => 'الاسكندريه', 'country_id' => 66],
            ['name_en' => 'Damietta', 'name_ar' => 'دمياط', 'country_id' => 66],
        ];

        DB::table('cities')->insert($info);
    }
}
