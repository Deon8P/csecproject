<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use App\Leave;

class ManagersController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        $employees = Manager::getMyEmps();
        $applications = Leave::returnPending();
        return view('manager.index', compact('applications'));
    }

    public function update()
    {
        if(name)
            Manager::updateFirstName(Auth::user()->username, $name);

        if(surname)
            Manager::updateLastName(Auth::user()->username, $surname);
    }
}
