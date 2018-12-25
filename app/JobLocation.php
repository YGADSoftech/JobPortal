<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    public function job_post()
    {
        return $this->hasMany(Job::class, 'job_location_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function zip()
    {
        return $this->belongsTo(ZipCode::class,'zip_id');
    }
}
