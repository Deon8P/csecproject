@extends('layouts.master')

<head>

        @section('style')
        @endsection

    </head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Employees</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/employee">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/leave/apply">Apply Here</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')
<!-- Table for Display -->
<input class="form-control mr-sm-2" type="date" width="100%" style="position: auto; left: 0; right: 0;">
<h1 class="text-center mt-3">Application History</h1>
<table class="table table-hover" style="position: absolute; left: 0; right: 0;">
    <thead>

    <tr class="table-dark">
        <th scope="row">Created</th>
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Period</th>
        <th>Status</th>
    </tr>
    <tbody>
        @if($leaves != null)
        @foreach ($leaves as $leave)
        <tr>
        <td>{{ $leave->created_at }}</td>
        <td>{{ $leave->leave_type }}</td>
        <td>{{ $leave->startDate }}</td>
        <td>{{ $leave->endDate }}</td>
        <td>{{ $leave->period }}</td>
        <td>{{ $leave->status }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<!-- ******************************************************************************************************************-->

@endsection
