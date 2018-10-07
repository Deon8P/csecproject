<?php

namespace App\Http\Controllers;

use App\Leave;
use App\User;
use App\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::check()) {

            if (User::role() == 3) {
                try {
                    $leaves = Leave::leaveHistory(Auth::user()->username);
                    $leave_balance = Employee::getLeaveBalance(Auth::user()->username);
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return view('employee.index', compact('leaves', 'leave_balance'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function destroyLeave($username)
    {
        if (Auth::check()) {

            if (User::role() == 3) {
                try {
                    Leave::destroyLeave($username);
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

}
