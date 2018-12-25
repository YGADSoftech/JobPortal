<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public function users()
    {
        return $this->hasMany(User::class,"user_type_id");
    }
}
