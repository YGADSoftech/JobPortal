<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = \App\Country::where("country_name","=","Pakistan")->first();
        $state = new \App\State();$state->state_name = "Punjab";$country->states()->save($state);
        $state = new \App\State();$state->state_name = "Sindh";$country->states()->save($state);
        $state = new \App\State();$state->state_name = "Sarhad";$country->states()->save($state);
        $state = new \App\State();$state->state_name = "Balochistan";$country->states()->save($state);
    }
}
