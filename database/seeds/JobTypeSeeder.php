<?php

use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pt = new \App\JobType();$pt->job_type = "Full Time";$pt->save();
        $pt = new \App\JobType();$pt->job_type = "Part Time";$pt->save();
        $pt = new \App\JobType();$pt->job_type = "Online";$pt->save();
        $pt = new \App\JobType();$pt->job_type = "Offline";$pt->save();
    }
}
