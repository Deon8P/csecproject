@extends('layouts.master')

<head>

        @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<!-- NavBar -->
<div class="topnav">
        <a  href="/admin">Home</a>
        <a  href="/admin/register/manager">Register New Manager</a>
        <a href="/admin/update/managers">Update Managers</a>
        <a href="/admin/register/employee">Register New Employee</a>
        <a class="active" href="/admin/update/employees">Update Employees</a>
        <a href="/logout">Logout</a>
      </div>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

<!--Table to edit Leave-->
<div style="position: absolute; top:15%; left:0%; right:0%">
@if(! $employees->isEmpty())
<table class="table" style="position: absolute; top:15%; left:0%; right:0%">
    <thead>
    <tr class="">
        <th scope="row">Employee Username</th>
        <th scope="row">Employee Name</th>
        <th scope="row">Employee Surname</th>
        <th scope="row">Leave Balance</th>
        <th scope="row">Manager</th>
        <th scope="row">Commit</th>
        <th scope="row">Delete</th>
    </tr>
    </thead>
    <tbody id="ContentBody">
        @foreach($employees as $employee)
        <tr>
        <form action="/update/employee/{{ $employee->user_username }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <td><label style="color: white" type="text" id="name{{ $employee->user_username }}" name="username">{{ $employee->user_username }}</label></td>
        <td><input type="text" id="name_{{ $employee->name }}" name="name" placeholder="{{ $employee->name }}" ></td>
        <td><input type="text" id="surname_{{ $employee->surname }}" name="surname" placeholder="{{ $employee->surname }}" ></td>
        <td><input type="text" id="leave_balance_{{ $employee->leave_balance }}" name="leave_balance" placeholder="{{ $employee->leave_balance }}" ></td>
        <td>
                <select class="custom-select" id="managed_by_{{ $employee->user_username }}" name="managed_by" required>
                    @foreach($managers as $manager)
                    @if($employee->managed_by != $manager->user_username)
                    <option value="{{ $manager->user_username }}" name="managed_by" id="{{ $manager->user_username }}">{{ $manager->user_username }}</option>
                    @else
                    <option selected value="{{ $employee->managed_by }}" name="managed_by" id="{{ $employee->managed_by }}">{{ $employee->managed_by }}</option>
                    @endif
                    @endforeach
                </select>
            </td>
        <td>
        <button type="submit" id="update{{ $employee->user_username }}" name="update" class="btn edit btn-outline-warning">Edit</button>
        </td>
        <td>
            <a href="/delete/employee/{{ $employee->user_username }}" role="button" id="delete{{ $employee->user_username }}" name="delete" class="btn delete btn-outline-danger">Delete</a>
        </td>

        </form>
        </tr>
        @endforeach

    </tbody>

</table>
</div>
@else
<h1 class="text-center"><a href="/admin/register/employee">Please register some employees first.</a></h1>
@endif

@endsection
