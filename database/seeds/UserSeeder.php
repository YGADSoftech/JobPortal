<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new \App\User;
        $u->user_name = "admin";
        $u->email = "admin@admin.com";
        $u->password = bcrypt("admin123");
        $u->user_type_id = 1;
        $u->is_active = 1;
        $u->profile_img = "admin.png";
        $u->save();


        $u = new \App\User;
        $u->user_name = "employer";
        $u->email = "ali_javed@gmail.com";
        $u->password = bcrypt("alijaved");
        $u->user_type_id = 3;
        $u->is_active = 1;
        $u->profile_img = "employer.png";
        $u->save();



        $u = new \App\User;
        $u->user_name = "applicant";
        $u->email = "bilal_ahmad@gmail.com";
        $u->password = bcrypt("bilalahmad");
        $u->user_type_id = 2;
        $u->is_active = 1;
        $u->profile_img = "applicant.png";
        $u->save();
    }
}
