<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ut = new \App\UserType;$ut->role_name	= "Admin";$ut->save();
        $ut = new \App\UserType;$ut->role_name	= "Applicant";$ut->save();
        $ut = new \App\UserType;$ut->role_name	= "Employer";$ut->save();
    }
}
