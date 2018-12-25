<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    function appli_profile()
    {
        return $this->belongsTo(ApplicantProfile::class,'applicant_profiles_userid','user_id');
    }
}
