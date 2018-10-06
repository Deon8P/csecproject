<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

    protected $fillable = [
        'user_username', 'role_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
