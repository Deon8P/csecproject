<?php

namespace App\Http\Controllers;

use App\User;
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
        if (Auth::check()) {

            if (User::role() == 3) {
                try {
                    $leaves = LeaveType::getActiveLeave();
                    $leave_balance = Employee::getLeaveBalance(Auth::user()->username);
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return view('employee.leave.application', compact('leaves', 'leave_balance'));
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function createLeaveType()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                return view('admin.crudLeave.create');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function updateLeaveTypeForm()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    $leaveTypes = LeaveType::getAllLeaveTypes();
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return view('admin.crudLeave.update', compact('leaveTypes'));
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function storeLeaveType()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
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

                return back()->with('status', 'The new leave type has been created.');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function storeApplication(Request $request)
    {
        if (Auth::check()) {

            if (User::role() == 3) {
                try {
                    $this->validate(request(), [
                        'leave_type' => 'required',
                        'startDate' => 'required|date',
                        'endDate' => 'required|date',
                    ]);

                    $period = (abs((strtotime(request('startDate')) - strtotime(request('endDate'))) / 60 / 60 / 24) + 1);

                    $balance = Employee::where('user_username', Auth::user()->username)->pluck('leave_balance')->first();

                    if ($balance < $period) {
                        return back()->with('status', 'You do not have that many days to take leave.');
                    }

                    Leave::create([
                        'emp_username' => Auth::user()->username,
                        'leave_type' => request('leave_type'),
                        'startDate' => Carbon::createFromFormat('Y-m-d', request('startDate')),
                        'endDate' => Carbon::createFromFormat('Y-m-d', request('endDate')),
                        'period' => $period,
                        'status' => 'pending',
                    ]);
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'The application has been created.');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function updateLeaveType($type)
    {
        if (Auth::check()) {

            if (User::role() == 1) {
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

                return back()->with('status', 'The leave type has been updated.');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function updateLeaveStatus($id, $username)
    {
        if (Auth::check()) {

            if (User::role() == 2) {
                try {
                    $this->validate(request(), [
                        'status' => 'required',
                    ]);

                    if (request('status') == 'approved') {

                        $balance = Employee::where('user_username', $username)->pluck('leave_balance')->first();

                        $cost = Leave::where('id', $id)->pluck('period')->first();

                        if ($cost < $balance){
                            Employee::where('user_username', $username)->decrement('leave_balance', $cost);
                        }else{
                            return back()->with('status', 'The cost of that application is to large!');
                        }

                    }
                    Leave::updateLeaveStatus($id, request('status'));

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return back()->with('status', 'The status of the application has been set.');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function destroyLeave($id)
    {
        if (Auth::check()) {

            if (User::role() == 3) {

                try {
                    if (Leave::getLeaveStatus($id) == 'approved') {
                        Employee::where('user_username', Auth::user()->username)->increment('leave_balance', Leave::where('id', $id)->pluck('period')->first());
                    }

                    Leave::destroyLeave($id);

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'Your application was canceled and the cost refunded');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function destroyLeaveType($type)
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    LeaveType::destroyLeaveType($type);

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return back()->with('status', 'The leave type has been removed.');
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }

    public function reloadLeaveTypes()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    $leaveTypes = LeaveType::getAllLeaveTypes();

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('admin.crudLeave.LeaveTypes', compact('leaveTypes'));
            }else{
                return back()->with('status', 'You do not have permission to access that!');
            }
        }
    }
}
