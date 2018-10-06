<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Manager extends Model
{
    protected $fillable = [
        'user_username', 'name', 'surname', 'email', 'password',
    ];

    public static function managedEmployees()
    {
        return Employee::select('user_username')->where('managed_by', Auth::user()->username)->get();
    }

    public static function updateFirstName($username, $name)
    {
        Manager::where('user_username', $username)->update(['name' => $name]);
    }

    public static function updateLastName($username, $surname)
    {
        Manager::where('user_username', $username)->update(['surname' => $surname]);
    }

    public static function getMyEmps()
    {
        return Employee::where('managed_by', Auth::user()->username)->get();
    }

    public static function read($username)
    {
        return Manager::where('user_username', $username)->get();
    }

    public static function destroy($username)
    {
        Manager::where('user_username', $username)->delete();
        Manager::where('username', $username)->delete();
    }
}
