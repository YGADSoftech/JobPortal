<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
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

    public function company_info()
    {
        return $this->hasMany(CompanyInfo::class,"employer_profiles_id");
    }
}
