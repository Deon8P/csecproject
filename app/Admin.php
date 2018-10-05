<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_username', 'name', 'surname'
    ];

    public static function updateFirstName($username, $name)
    {
        Admin::where('user_username', $username)->update(['name' => $name]);
    }
    public static function updateLastName($username, $surname)
    {
        Admin::where('user_username', $username)->update(['surname' => $surname]);
    }

}
