<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(WebsiteInfosSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubCategoriesSeeder::class);
        $this->call(SubSubCategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        // \App\Models\User::factory(10)->create();

    }
}
