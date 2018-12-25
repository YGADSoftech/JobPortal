<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantProfile extends Model
{
    protected $primaryKey = 'user_id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function education()
    {
        return $this->hasMany(EducationDetail::class,"applicant_profiles_userid");
    }

    public function experience()
    {
        return $this->hasMany(ExperienceDetail::class,"applicant_profiles_userid");
    }

    public function skill_set()
    {
        return $this->belongsToMany(SkillSet::class,'applicant_profile_skill_set','applicant_profile_user_id','skill_ser_id')->withPivot(['skill_level','id']);
    }
}
