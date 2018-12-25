<?php

use Illuminate\Database\Seeder;

class EmployerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emp_pro = new \App\EmployerProfile;

        $emp_pro->user_id = 2;
        $emp_pro->first_name = 'Ali';
        $emp_pro->last_name = 'Javed';
        $emp_pro->contact_number = '123456789';
        $emp_pro->is_notification_active = 0;
        $emp_pro->dob = Carbon\Carbon::parse("23-07-1996");
        $emp_pro->profile_completed = 1;
        $emp_pro->gender_id = 1;

        $emp_pro->save();
    }
}
