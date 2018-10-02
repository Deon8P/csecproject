<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'user-username', 'name', 'surname', 'email', 'password',
    ];

    public static function updateFirstName($username, $name)
    {
        Manager::where('user-username', $username)->update(['name' => $name]);
    }

    public static function updateLastName($username, $surname)
    {
        Manager::where('user-username', $username)->update(['surname' => $surname]);
    }
}
