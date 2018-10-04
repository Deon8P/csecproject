<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Employee;

class Leave extends Model
{
    protected $fillable = [
        'id', 'emp_username', 'leave_type', 'startDate', 'endDate', 'period', 'status'
    ];

    public static function leaveHistory($user_username)
    {
        return Leave::where('emp_username', $user_username)->orderBy('created_at', 'desc')->get();
    }

    public static function returnPending()
    {
        $users = Employee::select('user_username')->where('managed_by', '=', Auth::user()->username)->get()->toArray();

        $applications = DB::table('leaves')
        ->whereIn('emp_username', $users)
        ->where('status', '=', 'pending')
        ->get();

        return $applications;
    }

    public static function updateLeaveStatus($id, $status)
    {
        Leave::where('id', $id)->update(['status' => $status]);
    }

    public static function destroyLeave($username)
    {
        Leave::where('emp_username', $username)->delete();
    }
}
