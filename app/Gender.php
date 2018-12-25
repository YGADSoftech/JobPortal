<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function adminprofile()
    {
        return $this->hasMany(AdminProfile::class);
    }

    public function employerprofile()
    {
        return $this->hasMany(EmployerProfile::class);
    }

    public function applicantprofile()
    {
        return $this->hasMany(ApplicantProfile::class);
    }
}
