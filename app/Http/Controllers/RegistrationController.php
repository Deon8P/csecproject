<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.create');
    }

    public function store()
    {
    	$this->validate(request(), [
            'username' => 'required|unique:managers,username',
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
    		'email' => 'required|email|unique:managers,email',
    		'password' => 'required|confirmed|min:6'
    	]);

    	$manager = Manager::create([
            'username' => request('username'),
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($manager);

    	return redirect('manager');
    }
}
