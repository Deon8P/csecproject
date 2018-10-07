<?php

namespace App\Http\Controllers;

use App\Leave;

class ManagersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $applications = Leave::returnPending();

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('manager.index', compact('applications'));
    }
}
