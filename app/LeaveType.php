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

    public static function updateLeaveStatus($leave_type, $status)
    {
        LeaveType::where('leave_type', $leave_type)->update(['status' => $status]);
    }

    public function readLeaveType(LeaveType $leave_type)
    {
        return LeaveType::where('leave_type', $leave_type)->get();
    }

    public static function destroyLeaveType(LeaveType $leave_type)
    {
        LeaveType::where('leave_type', $leave_type)->delete();
    }
}
