<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $primaryKey = "user_id";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
