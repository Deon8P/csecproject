<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Employee;
use App\User;

class EmployeesController extends Controller
{

    public function __construct()
	{
 		$this->middleware('auth');
    }

    public function index()
    {
        return view('employee.index');
    }

    public function update(Employee $username)
    {
        $this->validate(request(), [
            'name' => 'optional',
            'managed_by' => 'optional',
            'surname' => 'optional',
            'leave_balance' => 'optional'
        ]);

        if(name)
            Employee::updateFirstName($username, $name);

        if(surname)
           Employee::updateLastName($username, $surname);

        if(managed_by)
           Employee::updateManagedBy($username, $managerID);

        if(leave_balance)
           Employee::updateLeaveBalance($username, $leave_balance);
    }
}
