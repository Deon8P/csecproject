<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
