<?php

use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nt = new \App\NotificationType();$nt->notification_name = "Job Posted";$nt->save();
        $nt = new \App\NotificationType();$nt->notification_name = "Applicant Apply";$nt->save();
    }
}
