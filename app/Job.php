<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title','description','salary','job_type','location'];
    protected $dates = ['created_at', 'updated_at', 'expire_job'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(CompanyInfo::class,'company_info_id');
    }

    public function jobtype()
    {
        return $this->belongsTo(JobType::class,'job_type_id');
    }
    public function joblocation()
    {
        return $this->belongsTo(JobLocation::class,'job_location_id');
    }

    public function job_post_skill_set()
    {
        return $this->belongsToMany(SkillSet::class,'post_job_skill_set','post_job_id','skill_set_id')->withPivot('id','skill_set_id','skill_level');
    }

    public function applied_user_for_jobs()
    {
        return $this->belongsToMany(User::class,'applyforjob','post_job_id','user_id');
    }

    public function notify()
    {
        return $this->hasMany(Notification::class,'post_job_id');
    }
}
//