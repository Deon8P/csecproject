<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Employee;
use App\User;
use App\Leave;

class EmployeesController extends Controller
{

    public function __construct()
	{
 		$this->middleware('auth');
    }

    public function index()
    {
        $leaves = Leave::leaveHistory(Auth::user()->username);
        return view('employee.index', compact('leaves'));
    }
}
