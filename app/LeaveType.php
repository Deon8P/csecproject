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

    public static function getAllLeaveTypes()
    {
        return LeaveType::all();
    }

    public static function updateLeaveStatus($type, $status)
    {
        LeaveType::where('leave_type', $type)->update(['status' => $status]);
    }

    public static function updateLeaveType($type, $leave_type)
    {
        LeaveType::where('leave_type', $type)->update(['leave_type', $leave_type]);
    }

    public function readLeaveType($leave_type)
    {
        return LeaveType::where('leave_type', $leave_type)->get();
    }

    public static function destroyLeaveType($type)
    {
        LeaveType::where('leave_type', $type)->delete();
    }
}
