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
        $applications = Leave::returnPending();
        return view('manager.index', compact('applications'));
    }
}
