<?php

use Illuminate\Database\Seeder;

class ApplicantProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app_pro = new \App\ApplicantProfile;

        $app_pro->user_id = 3;
        $app_pro->first_name = 'Bilal';
        $app_pro->last_name = 'Ahmad';
        $app_pro->contact_number = '123456789';
        $app_pro->is_notification_active = 0;
        $app_pro->dob = Carbon\Carbon::parse("23-07-1996");
        $app_pro->profile_completed = 1;
        $app_pro->gender_id = 1;

        $app_pro->save();
    }
}
