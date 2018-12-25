<?php

use Illuminate\Database\Seeder;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $j_l = new \App\JobLocation;
        $j_l->address = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
        $j_l->country_id = 1;
        $j_l->state_id = 1;
        $j_l->city_id = 1;
        $j_l->zip_id = 1;

        $j_l->save();



        $j_l = new \App\JobLocation;
        $j_l->address = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ';
        $j_l->country_id = 1;
        $j_l->state_id = 2;
        $j_l->city_id = 2;
        $j_l->zip_id = 2;

        $j_l->save();
    }
}
