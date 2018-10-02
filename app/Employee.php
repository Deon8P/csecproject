<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user-username', 'managed_by', 'name', 'surname', 'leave_balance'
    ];

    public static function updateFirstName($username, $name)
    {
        Employee::where('user-username', $username)->update(['name' => $name]);
    }
    public static function updateLastName($username, $surname)
    {
        Employee::where('user-username', $username)->update(['surname' => $surname]);
    }

    public static function updateManagedBy($username, $managed_by)
    {
        Employee::where('user-username', $username)->update(['managed_by' => $managed_by]);
    }

    public static function updateLeaveBalance($username, $leave_balance)
    {
        Employee::where('user-username', $username)->update(['leave_balance' => $leave_balance]);
    }
}
