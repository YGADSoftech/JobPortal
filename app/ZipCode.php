<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{

    public function joblocation()
    {
        return $this->hasMany(JobLocation::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}
