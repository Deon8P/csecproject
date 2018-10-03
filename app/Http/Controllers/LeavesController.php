<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Leave;
use App\LeaveType;
use App\Employee;

class LeavesController extends Controller
{

    public function leaveApplication()
    {
        $leaves = LeaveType::getActiveLeave();

        return view('employee.leave.application', compact('leaves'));
    }

    public function createLeaveType()
    {
        return view('manager.crudLeave.create');
    }

    public function storeLeaveType()
    {
        $this->validate(request(), [
            'leave_type' => 'required|min:3',
            'status' => 'required'
        ]);

        LeaveType::create([
            'leave_type' => request('leave_type'),
            'status' => request('status')
        ]);

        return back();
    }

    public function storeApplication(Request $request)
    {
        $this->validate(request(), [
            'leave_type' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);

        Leave::create([
            'emp_username' => Auth::user()->username,
            'leave_type' => request('leave_type'),
            'startDate' => Carbon::createFromFormat('Y-m-d', request('startDate')),
            'endDate' => Carbon::createFromFormat('Y-m-d', request('endDate')),
            'period' => (abs((strtotime(request('startDate')) - strtotime(request('endDate')))/ 60 / 60 / 24) + 1),
            'status' => 'pending'
        ]);

        return back();
    }

    public function updateLeaveStatus($leave_type)
    {
        Leave::where('leave_type', $leave_type)->update(['status' => 'Inactive']);
    }

    public function updateLeaveCost($leave_type, $leave_cost)
    {
        Leave::where('leave_type', $leave_type)->update(['leave_cost' => $leave_cost]);
    }

    public function updateLeave($id)
    {
        $this->validate(request(), [
            'status' => 'required'
        ]);

        Leave::where('emp_id', $id)->update(['status' => $status]);
    }
}

