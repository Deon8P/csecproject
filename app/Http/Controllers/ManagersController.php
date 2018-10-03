<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagersController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        return view('manager.index');
    }

    public function update(Manager $username)
    {
        $this->validate(request(), [
            'name' => 'optional',
            'surname' => 'optional',
        ]);

        if(name)
            Manager::updateFirstName($id, $name);

        if(surname)
            Manager::updateLastName($id, $surname);
    }

    public function read(Manager $username)
    {
        return Manager::where('user-username', $username)->get();
    }

    public function destroy(Manager $username)
    {
        Manager::where('user-username', $username)->delete();
    }
}
