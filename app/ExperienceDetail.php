<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    function city()
    {
        return $this->belongsTo(City::class,'job_location_city');
    }
    function country()
    {
        return $this->belongsTo(Country::class,'job_location_country');
    }

    function state()
    {
        return $this->belongsTo(State::class,'job_location_state');
    }
    function appli_profile()
    {
        return $this->belongsTo(ApplicantProfile::class,'applicant_profiles_userid','user_id');
    }
}
