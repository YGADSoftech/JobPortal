<?php

use Illuminate\Database\Seeder;

class EducationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edu_pro = new \App\EducationDetail;

        $edu_pro->degree_name = "BSCS";
        $edu_pro->institute_name = "BZU";
        $edu_pro->start_date = Carbon\Carbon::parse("23-07-2013");;
        $edu_pro->completion_date = Carbon\Carbon::parse("23-07-2016");;
        $edu_pro->pencerntage = 75;
        $edu_pro->cgpa = 3.4;
        $edu_pro->applicant_profiles_userid = 3;

        $edu_pro->save();


        $edu_pro = new \App\EducationDetail;

        $edu_pro->degree_name = "MCS";
        $edu_pro->institute_name = "BZU";
        $edu_pro->start_date = Carbon\Carbon::parse("23-07-2016");;
        $edu_pro->completion_date = Carbon\Carbon::parse("23-07-2018");;
        $edu_pro->pencerntage = 75;
        $edu_pro->cgpa = 3.4;
        $edu_pro->applicant_profiles_userid = 3;

        $edu_pro->save();
    }
}
