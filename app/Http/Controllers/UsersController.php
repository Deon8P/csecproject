<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update($username)
    {
        try {
            if (request('username')) {
                User::updateUserName($username);
            }

            if (request('email')) {
                User::updateEmail($username, $email);
            }

            if (request('password')) {
                User::updatePassword($username, bcrypt($password));
            }

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back();
    }

    public function read($username)
    {
        return User::where('username', $username)->get();
    }

    public function checkRole()
    {
        try {
            if (Auth::check()) {
                $role_id = Auth::user()->role;
            } else {
                $role_id = null;
            }

            if ($role_id == 3) {
                return redirect('/employee');
            } else if ($role_id == 2) {
                return redirect('/manager');
            } else if ($role_id == 1) {
                return redirect('/admin');
            } else {
                return redirect('/login');
            }

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }
}
