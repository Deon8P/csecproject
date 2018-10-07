<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Employee;
use App\Leave;
use App\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::check()) {

            if (User::role() == 1) {

                try {
                    $adminCount = Admin::count();
                    $managerCount = Manager::count();
                    $employeeCount = Employee::count();

                    $leaveCount = Leave::count();
                    $leavePending = Leave::where('status', 'pending')->count();
                    $leaveApproved = Leave::where('status', 'approved')->count();
                    $leaveRejected = Leave::where('status', 'rejected')->count();

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('admin.index', compact('adminCount', 'managerCount', 'employeeCount', 'leaveCount', 'leavePending', 'leaveApproved', 'leaveRejected'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function createEmployee()
    {

        if (Auth::check()) {

            if (User::role() == 1) {

                try
                {

                    $managers = Manager::select('user_username')->get();

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return view('admin.crudEmp.createEmployee', compact('managers'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function createManager()
    {if (Auth::check()) {

        if (User::role() == 1) {
            return view('admin.crudManager.createManager');
        }}
    }

    public function updateEmployees()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try
                {
                    $employees = Employee::get();
                    $managers = Manager::select('user_username')->get();
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('admin.crudEmp.updateEmployees', compact('employees', 'managers'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function updateManagers()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    $managers = Manager::get();
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('admin.crudManager.updateManagers', compact('managers'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function updateEmployee($username)
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    if (request('name')) {
                        Employee::updateFirstName($username, request('name'));
                    }

                    if (request('surname')) {
                        Employee::updateLastName($username, request('surname'));
                    }

                    if (request('managed_by')) {
                        Employee::updateManagedBy($username, request('managed_by'));
                    }

                    if (request('leave_balance')) {
                        Employee::updateLeaveBalance($username, request('leave_balance'));
                    }
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'Employee has been updated.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function updateManager($username)
    {
        if (Auth::check()) {

            if (User::role() == 1) {

                try {
                    if (request('name')) {
                        Manager::updateFirstName($username, request('name'));
                    }

                    if (request('surname')) {
                        Manager::updateLastName($username, request('surname'));
                    }

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'Manager has been updated.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function destroyEmployee($username)
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    Employee::destroy($username);
                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return back()->with('status', 'Employee has been deleted.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function destroyManager($username)
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {

                    if($username == request('new_manager'))
                    {
                        return back()->with('status', 'You cannot swap the manager with it self.');
                    }
                    Employee::updateManagedBy($username, request('new_manager'));

                    User::destroy($username);

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return back()->with('status', 'Manager has been deleted.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

}
