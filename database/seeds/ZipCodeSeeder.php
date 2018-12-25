<?php

use Illuminate\Database\Seeder;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = \App\City::where("city_name","=","Lahore")->first();
        $zip = new \App\ZipCode();$zip->zip_code = "58400";$city->zipcodes()->save($zip);
        $city = \App\City::where("city_name","=","Karachi")->first();
        $zip = new \App\ZipCode();$zip->zip_code = "23400";$city->zipcodes()->save($zip);
    }
}
