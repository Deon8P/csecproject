<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = [
        'managed_by', 'username', 'name', 'surname', 'email', 'password', 'leave_balance'
    ];

    public static function updateUserName($id, $username)
    {
        Employee::where('id', $id)->update(['username' => $username]);
    }

    public static function updateFirstName($id, $name)
    {
        Employee::where('id', $id)->update(['name' => $name]);
    }
    public static function updateLastName($id, $surname)
    {
        Employee::where('id', $id)->update(['surname' => $surname]);
    }

    public static function updateEmail($id, $email)
    {
        Employee::where('id', $id)->update(['email' => $email]);
    }

    public static function updatePassword($id, $password)
    {
        Employee::where('id', $id)->update(['password' => bcrypt($password)]);
    }

    public static function updateManagedBy($id, $managerID)
    {
        Employee::where('id', $id)->update(['managed_by' => $managerID]);
    }

    public static function updateLeaveBalance($id, $leave_balance)
    {
        Employee::where('id', $id)->update(['leave_balance' => $leave_balance]);
    }
}
