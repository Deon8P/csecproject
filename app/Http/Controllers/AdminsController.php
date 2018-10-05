<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use App\Employee;

class AdminsController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function createEmployee()
    {
        $managers = Manager::select('user_username')->get();
        return view('admin.crudEmp.createEmployee', compact('managers'));
    }

    public function createManager()
    {
        return view('admin.crudManager.createManager');
    }

    public function updateEmployees()
    {
        $employees = Employee::get();
        $managers = Manager::select('user_username')->get();
        return view('admin.crudEmp.updateEmployees' , compact('employees', 'managers'));
    }

    public function updateManagers()
    {
        $Managers = Manager::get();
        return view('admin.crudManager.updateManagers', compact('managers'));
    }

    public function updateEmployee($username)
    {
        if(request('name'))
        {
            Employee::updateFirstName($username, $name);
        }

        if(request('surname'))
        {
        Employee::updateLastName($username, $surname);
        }

        if(request('managed_by'))
        {
        Employee::updateManagedBy($username, $managerID);
        }

        if(request('leave_balance'))
        {
        Employee::updateLeaveBalance($username, $leave_balance);
        }

        return back();
    }

    public function updateManager($username)
    {
        if(request('name'))
            Manager::updateFirstName($username, $name);

        if(request('surname'))
            Manager::updateLastName($username, $surname);

        return back();
    }

    public function destroyEmployee($username)
    {
        Employee::destroy($username);

        return back();
    }

    public function destroyManager($username)
    {
        Manager::destroy($username);

        return back();
    }

}
