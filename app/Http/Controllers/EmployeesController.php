<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Employee;

class EmployeesController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|confirmed|min:6'
        ]);

        Employee::create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return back();
    }
}
