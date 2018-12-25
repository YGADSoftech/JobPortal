<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class,'state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function joblocation()
    {
        return $this->hasMany(JobLocation::class);
    }
}
