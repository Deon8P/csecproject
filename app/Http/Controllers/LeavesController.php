<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Leave;

class LeavesController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'emp_id' => 'required',
            'leave_type' => 'required',
            'period' => 'required|email|unique:managers,email',
            'status' => 'required|confirmed|min:6'
        ]);

        Leave::create([
            'emp_id' => request('emp_id'),
            'leave_type' => request('leave_type'),
            'period' => request('period'),
            'status' => bcrypt(request('status'))
        ]);

        return back();
    }
}
