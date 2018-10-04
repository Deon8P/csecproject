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

    public function updateLeaveTypeForm()
    {
        $leaveTypes = LeaveType::getAllLeaveTypes();
        return view('manager.crudLeave.update', compact('leaveTypes'));
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
            'period' => (abs((strtotime(request('startDate')) - strtotime(request('endDate'))) / 60 / 60 / 24) + 1),
            'status' => 'pending'
        ]);

        return back();
    }

    public function updateLeaveType($type)
    {
        if(request('leave_type') != null)
            LeaveType::updateLeaveType($type, request('leave_type'));

        if(request('status') != null)
            LeaveType::updateLeaveStatus($type, request('status'));

        return back();
    }

    public function updateLeaveStatus($id)
    {
        $this->validate(request(), [
            'status' => 'required'
        ]);

            Leave::updateLeaveStatus($id, request('status'));
            return back();
    }

    public function destroyLeaveType($type)
    {
        LeaveType::destroyLeaveType($type);
        return back();
    }

    public function reloadLeaveTypes()
    {
        $leaveTypes = LeaveType::getAllLeaveTypes();
        return view('manager.crudLeave.LeaveTypes' ,compact('leaveTypes'));
    }
}

