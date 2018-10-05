<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin;
use App\Manager;
use App\Employee;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.create');
    }

    public function storeAdmin()
    {
    	$this->validate(request(), [
            'username' => 'required|unique:users,username',
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|confirmed|min:6'
    	]);

       $user = User::create([
           'username' => request('username'),
           'email' => request('email'),
           'password' => bcrypt(request('password'))
       ]);

    	Admin::create([
            'user_username' => request('username'),
            'name' => request('name'),
            'surname' => request('surname'),
        ]);

        auth()->login($user);

        return redirect('admin');

    }

    public function storeEmployee()
    {
        $this->validate(request(), [
            'username' => 'required|unique:users,username',
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'managed_by' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        if(request('leave_balance') != null)
        {
            $leave_balance = request('leave_balance');
        }
        else
        {
            $leave_balance = 30;
        }
        Employee::create([
            'user_username' => request('username'),
            'managed_by' => request('managed_by'),
            'name' => request('name'),
            'surname' => request('surname'),
            'leave_balance' => $leave_balance
        ]);

        return back();
    }

    public function storeManager()
    {
        $this->validate(request(), [
            'username' => 'required|unique:users,username',
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        Manager::create([
            'user_username' => request('username'),
            'name' => request('name'),
            'surname' => request('surname')
        ]);

        return back();
    }
}
