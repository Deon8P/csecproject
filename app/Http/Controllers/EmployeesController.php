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
        try{
        $leaves = Leave::leaveHistory(Auth::user()->username);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('employee.index', compact('leaves'));
    }

    public function destroyLeave($username)
    {
        try{
        Leave::destroyLeave($username);
    } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }
    }

}
