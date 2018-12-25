<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public function job_post()
    {
        return $this->hasMany(Job::class,'job_type_id');
    }
}
