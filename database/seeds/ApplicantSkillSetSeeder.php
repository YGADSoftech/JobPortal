<?php

use Illuminate\Database\Seeder;

class ApplicantSkillSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = \App\User::find(3);

        $u->applicant_profile->skill_set()->attach(1,['skill_level'=>4]);
        $u->applicant_profile->skill_set()->attach(2,['skill_level'=>5]);
        $u->applicant_profile->skill_set()->attach(3,['skill_level'=>2]);
        $u->applicant_profile->skill_set()->attach(4,['skill_level'=>1]);

    }
}
