@extends('layouts.master')

<head>

        @section('style')
        <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
    <a href="/admin">Home</a>
    <a class="active" href="/admin/createLeaveType">Register Leave Type</a>
    <a href="/admin/updateLeaveType">Update Leave Type</a>
    <a href="/admin/register/manager">Register New Manager</a>
    <a href="/admin/update/managers">Update Managers</a>
    <a href="/admin/register/employee">Register New Employees</a>
    <a href="/admin/update/employees">Update Employee</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
@endsection

@section('content')

<!-- Input For Creating Leave Type -->
<form action="/createLeaveType" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}

        <div class="form-group container">
            <h1 style="color: #71b346">Create New Leave Type</h1>
        </div>

        <div class="form-group container ">
            <label class="text-muted" for="leave_type">Leave Type</label>
            <input type="text" class="form-control" id="leave_type" name="leave_type" placeholder="Enter leave type name here." required>
        </div>

        <div class="form-group container mb-5 pb-3">
            <label class="text-muted " for="status">Status</label>
            <select class="custom-select" id="status" name="status" required>
                <option value="active" name="active" id="active" selected >Active</option>
                <option value="suspended" name="suspended" id="suspended">Suspended</option>
            </select>
        </div>

        <!--Create Button -->
        <div class="form-group container mt-5">
            <button type="submit" class="form-inline btn btn-outline-success" style="width:30%" >Create</button>
            <a role="button" href="/manager" class="form-inline btn btn-outline-danger float-right" >Cancel</a>
        </div>

    </form>

<!-- **************************************************************************************************************** -->

@endsection
