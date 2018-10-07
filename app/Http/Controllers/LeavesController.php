<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Leave;
use App\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeavesController extends Controller
{

    public function leaveApplication()
    {
        try {
            $leaves = LeaveType::getActiveLeave();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('employee.leave.application', compact('leaves'));
    }

    public function createLeaveType()
    {
        return view('manager.crudLeave.create');
    }

    public function updateLeaveTypeForm()
    {
        try {
            $leaveTypes = LeaveType::getAllLeaveTypes();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('manager.crudLeave.update', compact('leaveTypes'));
    }

    public function storeLeaveType()
    {
        try {
            $this->validate(request(), [
                'leave_type' => 'required|min:3',
                'status' => 'required',
            ]);

            LeaveType::create([
                'leave_type' => request('leave_type'),
                'status' => request('status'),
            ]);

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }

    public function storeApplication(Request $request)
    {
        try {
            $this->validate(request(), [
                'leave_type' => 'required',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);

            $leave_balance = Employee::where('id', Auth::user()->id)->pluck('leave_balance')->first();
            if ($leave_balance < request('period')) {
                return back()->with('status', 'You do not have that many days to take leave');
            }

            Leave::create([
                'emp_username' => Auth::user()->username,
                'leave_type' => request('leave_type'),
                'startDate' => Carbon::createFromFormat('Y-m-d', request('startDate')),
                'endDate' => Carbon::createFromFormat('Y-m-d', request('endDate')),
                'period' => (abs((strtotime(request('startDate')) - strtotime(request('endDate'))) / 60 / 60 / 24) + 1),
                'status' => 'pending',
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }

    public function updateLeaveType($type)
    {
        try {
            if (request('leave_type') != null) {
                LeaveType::updateLeaveType($type, request('leave_type'));
            }

            if (request('status') != null) {
                LeaveType::updateLeaveStatus($type, request('status'));
            }

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }

    public function updateLeaveStatus($id, $username)
    {
        try {
            $this->validate(request(), [
                'status' => 'required',
            ]);

            Leave::updateLeaveStatus($id, request('status'));
            if (request('status') == 'approved') {
                Employee::where('user_username', $username)->decrement('leave_balance', Leave::where('id', $id)->pluck('period')->first());
            }

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back();
    }

    public function destroyLeave($id)
    {
        try {
            if (Leave::getLeaveStatus($id) == 'approved') {
                Employee::where('user_username', Auth::user()->username)->increment('leave_balance', Leave::where('id', $id)->pluck('period')->first());
            }

            Leave::destroyLeave($id);

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back()->with('status', 'Your application was canceld and the cost refunded');
    }

    public function destroyLeaveType($type)
    {
        try {
            LeaveType::destroyLeaveType($type);

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return back();
    }

    public function reloadLeaveTypes()
    {
        try {
            $leaveTypes = LeaveType::getAllLeaveTypes();

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('manager.crudLeave.LeaveTypes', compact('leaveTypes'));
    }
}
