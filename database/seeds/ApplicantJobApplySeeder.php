<?php

use Illuminate\Database\Seeder;

class ApplicantJobApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applicant = \App\User::find(3);
        $id = 1;
        $applicant->apply_job()->attach($id,['apply_date'=>date("Y/m/d")]);
        

        $not = new \App\Notification;
        $not->user_id = \App\Job::find($id)->user_id;
        $not->post_job_id = $id;
        $not->notification_type_id = 1;
        $not->expiry_date = Carbon\Carbon::tomorrow();
        $not->is_seen = 0;
        $not->save();

        $id = 6;
        $applicant->apply_job()->attach($id,['apply_date'=>date("Y/m/d")]);
        

        $not = new \App\Notification;
        $not->user_id = \App\Job::find($id)->user_id;
        $not->post_job_id = $id;
        $not->notification_type_id = 1;
        $not->expiry_date = Carbon\Carbon::tomorrow();
        $not->is_seen = 0;
        $not->save();

        $id = 10;
         $applicant->apply_job()->attach($id,['apply_date'=>date("Y/m/d")]);
        

        $not = new \App\Notification;
        $not->user_id = \App\Job::find($id)->user_id;
        $not->post_job_id = $id;
        $not->notification_type_id = 1;
        $not->expiry_date = Carbon\Carbon::tomorrow();
        $not->is_seen = 0;
        $not->save();

    }
}
