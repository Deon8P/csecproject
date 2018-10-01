<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Employee;

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

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required|unique:employees,username',
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|confirmed|min:6'
        ]);

        Employee::create([
            'username' => request('username'),
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'leave_balance' => request('leave_balance')
        ]);

        return back();
    }

    public function update(Employee $id)
    {
        $this->validate(request(), [
            'username' => 'optional',
            'name' => 'optional',
            'managed_by' => 'optional',
            'surname' => 'optional',
            'email' => 'optional',
            'password' => 'optional',
            'leave_balance' => 'optional'
        ]);

        if(username)
            Employee::updateUserName($id, $username);

        if(name)
            Employee::updateFirstName($id, $name);

        if(surname)
           Employee::updateLastName($id, $surname);

        if(email)
           Employee::updateEmail($id, $email);

        if(password)
           Employee::updatePassword($id, $password);

        if(managed_by)
           Employee::updateManagedBy($id, $managerID);

        if(leave_balance)
           Employee::updateLeaveBalance($id, $leave_balance);
    }

    public function read(Employee $id)
    {
        return Employee::where('id', $id)->get();
    }

    public function destroy(Employee $id)
    {
        Employee::where('id', $id)->delete();
    }
}
