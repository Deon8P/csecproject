<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Leave;

class ManagersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::check()) {

            if (User::role() == 2) {
                try {
                    $applications = Leave::returnPending();

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('manager.index', compact('applications'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }

    public function applicationHistory()
    {
        if (Auth::check()) {

            if (User::role() == 2) {
                try {
                    $applications = Leave::managedApplications();

                } catch (ModelNotFoundException $exception) {
                    return back()->withError($exception->getMessage())->withInput();
                }
                return view('manager.applicationHistory', compact('applications'));
            }else{
                return back()->with('status', 'You do not have permission to acess that!');
            }
        }
    }
}
