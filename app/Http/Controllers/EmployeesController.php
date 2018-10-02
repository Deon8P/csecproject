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

    public function update(Employee $id)
    {
        $this->validate(request(), [
            'name' => 'optional',
            'managed_by' => 'optional',
            'surname' => 'optional',
            'leave_balance' => 'optional'
        ]);

        if(name)
            Employee::updateFirstName($id, $name);

        if(surname)
           Employee::updateLastName($id, $surname);

        if(managed_by)
           Employee::updateManagedBy($id, $managerID);

        if(leave_balance)
           Employee::updateLeaveBalance($id, $leave_balance);
    }

    public function read(Employee $username)
    {
        return Employee::where('user-username', $username)->get();
    }

    public function destroy(Employee $username)
    {
        Employee::where('user-username', $username)->delete();
    }
}
