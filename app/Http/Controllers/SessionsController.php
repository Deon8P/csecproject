<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function storeAdminSession()
    {
        try {
            $this->validate(request(), [
                'username' => 'required|exists:admins,user_username',
                'password' => 'required|min:6',
            ]);

            // Attempt user authentication
            if (!auth()->attempt(request(['username', 'password']), request('remember'))) {
                redirect('login')->withErrors([
                    'message' => 'Please check your credentials and try again',
                ]);
            }

           /* if(Auth::user()->flag != 1){
                Auth::logout();
                return redirect()
                            ->route('login')
                            ->with('status', 'You have not yet confirmed your email yet. ');
            }*/

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        if (Auth::user() == null) {
            Session::swapping(Auth::user());
        }
        // If so sign them in
        //redirect to the dashboard
        return redirect('admin');
    }

    public function storeEmployeeSession()
    {
        try {
            $this->validate(request(), [
                'username' => 'required|exists:employees,user_username',
                'password' => 'required|min:6',
            ]);

            // Attempt user authentication
            if (!auth()->attempt(request(['username', 'password']), request('remember'))) {
                redirect('login')->withErrors([
                    'message' => 'Please check your credentials and try again',
                ]);
            }
/*
            if(Auth::user()->flag != 1){
                Auth::logout();
                return redirect()
                            ->route('login')
                            ->with('status', 'You have not yet confirmed your email yet. ');
            }*/

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        if (Auth::user() == null) {
            Session::swapping(Auth::user());
        }
        // If so sign them in
        //redirect to the dashboard
        return redirect('employee');
    }

    public function storeManagerSession()
    {
        try {
            $this->validate(request(), [
                'username' => 'required|exists:managers,user_username',
                'password' => 'required|min:6',
            ]);

            // Attempt user authentication
            if (!auth()->attempt(request(['username', 'password']), request('remember'))) {
                redirect('login')->withErrors([
                    'message' => 'Please check your credentials and try again',
                ]);
            }
            /*
            if(Auth::user()->flag != 1){
                Auth::logout();
                return redirect()
                            ->route('login')
                            ->with('status', 'You have not yet confirmed your email yet. ');
            }*/

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        if (Auth::user() == null) {
            Session::swapping(Auth::user());
        }
        // If so sign them in
        //redirect to the dashboard
        return redirect('manager');
    }

    public function destroy()
    {if (Auth::check()) {
        $role = User::role();
        if ($role == 1 || $role == 2 || $role == 3) {
            try {
                Auth::logout();

            } catch (ModelNotFoundException $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
            return redirect('/login');
        }else{
            return back()->with('status', 'You do not have permission to acess that!');
        }
    }
    }
}
