<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    public function employer_job()
    {
        return $this->hasMany(Job::class);
    }
}
