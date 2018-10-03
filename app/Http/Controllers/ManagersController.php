<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;

class ManagersController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        $employees = Manager::getMyEmps();
        return view('manager.index', compact('employees'));
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'optional',
            'surname' => 'optional',
        ]);

        if(name)
            Manager::updateFirstName(Auth::user()->username, $name);

        if(surname)
            Manager::updateLastName(Auth::user()->username, $surname);
    }
}
