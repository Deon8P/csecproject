<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use App\Manager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.create');
    }

    public function storeAdmin()
    {
        try {
            $this->validate(request(), [
                'username' => 'required|unique:users,username',
                'name' => 'required|min:2',
                'surname' => 'required|min:2',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::create([
                'username' => request('username'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'role' => 1,
            ]);

            Admin::create([
                'user_username' => request('username'),
                'name' => request('name'),
                'surname' => request('surname'),
            ]);

            //For instant login after registration
            //auth()->login($user);

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('login')->with('status', 'You have been sent an email verification.');

    }

    public function storeManager()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    $this->validate(request(), [
                        'username' => 'required|unique:users,username',
                        'name' => 'required|min:2',
                        'surname' => 'required|min:2',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|confirmed|min:6',
                    ]);

                    User::create([
                        'username' => request('username'),
                        'email' => request('email'),
                        'password' => bcrypt(request('password')),
                        'role' => 2,
                    ]);

                    Manager::create([
                        'user_username' => request('username'),
                        'name' => request('name'),
                        'surname' => request('surname'),
                    ]);

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'The manager has been registered and sent an email verification.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function storeEmployee()
    {
        if (Auth::check()) {

            if (User::role() == 1) {
                try {
                    $this->validate(request(), [
                        'username' => 'required|unique:users,username',
                        'name' => 'required|min:2',
                        'surname' => 'required|min:2',
                        'email' => 'required|email|unique:users,email',
                        'managed_by' => 'required',
                        'password' => 'required|confirmed|min:6',
                    ]);

                    User::create([
                        'username' => request('username'),
                        'email' => request('email'),
                        'password' => bcrypt(request('password')),
                        'role' => 3,
                    ]);

                    if (request('leave_balance') != null) {
                        $leave_balance = request('leave_balance');
                    } else {
                        $leave_balance = 30;
                    }
                    Employee::create([
                        'user_username' => request('username'),
                        'managed_by' => request('managed_by'),
                        'name' => request('name'),
                        'surname' => request('surname'),
                        'leave_balance' => $leave_balance,
                    ]);

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }

                return back()->with('status', 'The employee has been registered and sent an email verification.');
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

}
