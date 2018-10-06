<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{

    protected $fillable = [
        'user_username', 'role_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
