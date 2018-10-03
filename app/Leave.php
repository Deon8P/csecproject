<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Leave extends Model
{
    protected $fillable = [
        'emp_username', 'leave_type', 'startDate', 'endDate', 'period', 'status'
    ];

    public static function readLeave(Leave $username)
    {
        return Leave::where('emp_username', $username)->get();
    }

    public static function destroyLeave(Leave $username)
    {
        Leave::where('emp_username', $username)->delete();
    }
}
