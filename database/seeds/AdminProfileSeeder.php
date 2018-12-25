<?php

use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm_pro = new \App\AdminProfile;

        $adm_pro->user_id = 1;
        $adm_pro->first_name = 'Admin';
        $adm_pro->last_name = 'Admin';
        $adm_pro->contact_number = '123456789';
        $adm_pro->is_notification_active = 0;
        $adm_pro->dob = Carbon\Carbon::parse("23-07-1996");
        $adm_pro->profile_completed = 1;
        $adm_pro->gender_id = 1;

        $adm_pro->save();
    }
}
