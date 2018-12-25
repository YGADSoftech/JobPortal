<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class,'post_job_id');
    }
}
