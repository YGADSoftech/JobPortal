<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(UserType::class,'user_type_id','id');
    }
    public function employer_profile()
    {
        return $this->hasOne(EmployerProfile::class);
    }
    public function applicant_profile()
    {
        return $this->hasOne(ApplicantProfile::class);
    }

    public function employer_job()
    {
        return $this->hasMany(Job::class);
    }

    public function admin_profile()
    {
        return $this->hasOne(AdminProfile::class);
    }


    public function isAdmin()
    {
        return $this->user_type_id == 1;
    }


    public function isApplicant()
    {
        return $this->user_type_id == 2;
    }


    public function isEmployer()
    {
        return $this->user_type_id == 3;
    }


    public function apply_job()
    {
        return $this->belongsToMany(Job::class,'applyforjob','user_id','post_job_id');
    }


    public function notify()
    {
        return $this->hasMany(Notification::class,'user_id');
    }



    public function user_1_conversation()
    {
        return $this->hasMany(Conversation::class,'user_1');
    }

    public function user_2_conversation()
    {
        return $this->hasMany(Conversation::class,'user_2');
    }
}
