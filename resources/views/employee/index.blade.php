@extends('layouts.master')

<head>

        @section('style')
        <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
    <a class="active" href="/employee">Home</a>
    <a href="/leave/apply">Apply Here</a>
    <a href="/logout">Logout</a>
  </div>
@endsection

@section('content')
        @if(! $leaves->isEmpty())
        <div class="text-center" style="position: absolute; top:10%; left: 0; right: 0;">
        <h1 class="text-center mt-3" style="color: #71b346">Application History</h1>
        <input class="form-control mr-sm-2 ml-3 mb-3 mt-5" style="text-align: center; width: 20%" type="date">
        <table class="table table-hover">
            <thead>

            <tr class="">
                <th scope="row">Created</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Period</th>
                <th>Status</th>
                <th>Cancel Application</th>
            </tr>
            <tbody>
        @foreach ($leaves as $leave)
        <tr>
        <td>{{ $leave->created_at }}</td>
        <td>{{ $leave->leave_type }}</td>
        <td>{{ $leave->startDate }}</td>
        <td>{{ $leave->endDate }}</td>
        <td>{{ $leave->period }}</td>
        <td>{{ $leave->status }}</td>
        <td>
                <a href="/delete/application/{{ $leave->id }}" role="button" id="delete"  name="delete" class="btn delete btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</div>
</table>
        @else
        <h1 class="text-center" style="color: #c5c5c5">You currently have no pending leave applications, <br><a href="/leave/apply">perhaps apply for leave first.</a></h1>
        @endif

<!-- ******************************************************************************************************************-->

@endsection
