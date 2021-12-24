<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->delete();

        $info = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'country_id' => 66, 'city_id' => 1, 'password' => Hash::make(123456)],
            ['name' => 'admin1', 'email' => 'admin1@gmail.com', 'country_id' => 66, 'city_id' => 2, 'password' => Hash::make(123456)],
            ['name' => 'admin2', 'email' => 'admin2@gmail.com', 'country_id' => 66, 'city_id' => 3, 'password' => Hash::make(123456)],
        ];

        DB::table('admins')->insert($info);

        //        $admin = new Admin();
//        $admin->name = "admin";
//        $admin->email = "admin@gmail.com";
//        $admin->country_id = 2;
//        $admin->city_id = 5;
//        $admin->password = Hash::make(1234);
//        $admin->save();
    }
}
