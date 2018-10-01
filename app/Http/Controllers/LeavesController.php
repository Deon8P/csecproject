<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Employee;

class LeavesController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'emp_id' => 'required',
            'leave_type' => 'required',
            'period' => 'required',
            'status' => 'required'
        ]);

        Leave::create([
            'emp_id' => request('emp_id'),
            'leave_type' => request('leave_type'),
            'period' => request('period'),
            'status' => request('status')
        ]);

        return back();
    }

    public function storeLeaveType()
    {
        $this->validate(request(), [
            'leave_type' => 'required',
            'leave_cost' => 'required'
        ]);

        Leave::create([
            'leave_type' => request('leave_type'),
            'leave_cost' => request('leave_cost')
        ]);

        return back();
    }

    public function updateLeaveStatus($leave_type)
    {
        Leave::where('leave_type', $leave_type)->update(['status' => 'Inactive']);
    }

    public function updateLeaveCost($leave_type, $leave_cost)
    {
        Leave::where('leave_type', $leave_type)->update(['leave_cost' => $leave_cost]);
    }

    public function update(Employee $id)
    {
        $this->validate(request(), [
            'status' => 'required'
        ]);

        Leave::where('emp_id', $id)->update(['status' => $status]);
    }

    public function read(Employee $id)
    {
        return Leave::where('emp_id', $id)->get();
    }

    public function destroy(Employee $id)
    {
        Leave::where('emp_id', $id)->delete();
    }

}

