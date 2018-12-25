<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function zipcodes()
    {
        return $this->hasMany(ZipCode::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    public function joblocation()
    {
        return $this->hasMany(JobLocation::class);
    }
}
