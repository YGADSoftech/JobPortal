<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    public function skill()
    {
        return $this->belongsToMany(ApplicantProfile::class,'applicant_profile_skill_set','skill_ser_id','applicant_profile_user_id');
    }

    public function post_job_skill_set()
    {
        return $this->belongsToMany(Job::class,'post_job_skill_set','skill_set_id','post_job_id');
    }
}
