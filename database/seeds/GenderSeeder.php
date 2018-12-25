<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new \App\Gender();$gender->gender_type = "Male";$gender->save();
        $gender = new \App\Gender();$gender->gender_type = "Female";$gender->save();
    }
}
