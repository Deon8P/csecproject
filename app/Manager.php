<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    protected $fillable = [
        'username', 'name', 'surname', 'email', 'password',
    ];

    public static function updateUserName($id, $username)
    {
        Manager::where('id', $id)->update(['username' => $username]);
    }

    public static function updateFirstName($id, $name)
    {
        Manager::where('id', $id)->update(['name' => $name]);
    }

    public static function updateLastName($id, $surname)
    {
        Manager::where('id', $id)->update(['surname' => $surname]);
    }

    public static function updateEmail($id, $email)
    {
        Manager::where('id', $id)->update(['email' => $email]);
    }

    public static function updatePassword($id, $password)
    {
        Manager::where('id', $id)->update(['password' => bcrypt($password)]);
    }
}
