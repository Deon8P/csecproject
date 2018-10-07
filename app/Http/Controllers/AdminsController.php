<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Manager;
use App\Employee;
use App\Leave;

class AdminsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        try{
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
    }

    public function createEmployee()
    {
        try{
        $managers = Manager::select('user_username')->get();
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
        return view('admin.crudEmp.createEmployee', compact('managers'));
    }

    public function createManager()
    {
        return view('admin.crudManager.createManager');
    }

    public function updateEmployees()
    {
        try{
        $employees = Employee::get();
        $managers = Manager::select('user_username')->get();
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
        return view('admin.crudEmp.updateEmployees' , compact('employees', 'managers'));
    }

    public function updateManagers()
    {
        try{
        $managers = Manager::get();
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
        return view('admin.crudManager.updateManagers', compact('managers'));
    }

    public function updateEmployee($username)
    {
        try{
        if(request('name'))
        {
            Employee::updateFirstName($username, request('name'));
        }

        if(request('surname'))
        {
        Employee::updateLastName($username, request('surname'));
        }

        if(request('managed_by'))
        {
        Employee::updateManagedBy($username, request('managed_by'));
        }

        if(request('leave_balance'))
        {
        Employee::updateLeaveBalance($username, request('leave_balance'));
        }
    } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }

    public function updateManager($username)
    {

        try{
        if(request('name'))
            Manager::updateFirstName($username, request('name'));

        if(request('surname'))
            Manager::updateLastName($username, request('surname'));
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }


    public function destroyEmployee($username)
    {
        try{
        Employee::destroy($username);
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
        return back();
    }

    public function destroyManager($username)
    {
        try{
        Manager::destroy($username);
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
        return back();
    }

}
