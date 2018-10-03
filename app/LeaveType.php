<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = [
        'leave_type', 'status'
    ];

    public static function getActiveLeave()
    {
        return LeaveType::where('status', 'active')->get();
    }
}
