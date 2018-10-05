<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.crudEmp.createEmployee');
    }

    public function createManager()
    {
        return view('admin.crudManager.createManager');
    }

    public function updateEmployees()
    {
        return view('admin.crudEmp.updateEmployees');
    }

    public function updateManagers()
    {
        return view('admin.crudManager.updateManagers');
    }

    public function updateEmployee($username)
    {
        if(name)
            Employee::updateFirstName($username, $name);

        if(surname)
           Employee::updateLastName($username, $surname);

        if(managed_by)
           Employee::updateManagedBy($username, $managerID);

        if(leave_balance)
           Employee::updateLeaveBalance($username, $leave_balance);
    }

    public function updateManager($username)
    {
        if(name)
            Manager::updateFirstName($username, $name);

        if(surname)
            Manager::updateLastName($username, $surname);
    }

}
