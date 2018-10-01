<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function storeEmployeeSession(request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // Attempt user authentication
        if (!auth()->attempt(['username' => $username, 'password' => $password])) {
            redirect('login')->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

    	// If so sign them in
    	//redirect to the dashboard
        return redirect('employee');
    }

    public function storeManagerSession(request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // Attempt user authentication
        if (!auth()->attempt(['username' => $username, 'password' => $password])) {
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
