<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Console\Presets\React;
use App\User;

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

    public function storeEmployeeSession()
    {
        $this->validate(request(), [
            'username' => 'required|exists:employees,user_username',
            'password' => 'required|min:6'
        ]);

        // Attempt user authentication
        if (!auth()->attempt(request(['username', 'password']))) {
            redirect('login')->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

    	// If so sign them in
    	//redirect to the dashboard
        return redirect('employee');
    }

    public function storeManagerSession(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required|exists:managers,user_username',
            'password' => 'required|min:6'
        ]);

        // Attempt user authentication
        if (! auth()->attempt(request(['username', 'password']))) {
            redirect('login')->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

    	// If so sign them in
    	//redirect to the dashboard
        return redirect('manager');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
