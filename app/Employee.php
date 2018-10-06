<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    protected $fillable = [
       'user_username', 'managed_by', 'name', 'surname', 'leave_balance'
    ];

    public static function updateFirstName($username, $name)
    {
        Employee::where('user_username', $username)->update(['name' => $name]);
    }

    public static function updateLastName($username, $surname)
    {
        Employee::where('user_username', $username)->update(['surname' => $surname]);
    }

    public static function updateManagedBy($username, $managed_by)
    {
        Employee::where('user_username', $username)->update(['managed_by' => $managed_by]);
    }

    public static function updateLeaveBalance($username, $leave_balance)
    {
        Employee::where('user_username', $username)->update(['leave_balance' => $leave_balance]);
    }

    public static function read($username)
    {
        return Employee::where('user_username', $username)->get();
    }

    public static function destroy($username)
    {
        Employee::where('user_username', $username)->delete();
        User::where('username', $username)->delete();
    }
}
