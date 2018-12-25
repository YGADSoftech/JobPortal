<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = \App\State::where("state_name","=","Punjab")->first();
        $city = new \App\City();$city->city_name = "Lahore";$state->cities()->save($city);
        $state = \App\State::where("state_name","=","Sindh")->first();
        $city = new \App\City();$city->city_name = "Karachi";$state->cities()->save($city);
    }
}
