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
        <a class="active" href="/admin/register/manager">Register New Manager</a>
        <a href="/admin/update/managers">Update Managers</a>
        <a href="/admin/register/employee">Register New Employees</a>
        <a href="/admin/update/employees">Update Employee</a>
        <a href="/logout">Logout</a>
        <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
      </div>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')
<!-- Input For Creating Employee -->
<form class="" method="POST" action="/register/manager" enctype="multipart/form-data" style="position: absolute; top:10%; left:0%; right:0%">
        {{ csrf_field() }}

        <div class="form-group container">
            <h1 style="color: #71b346">Register New Manager</h1>
        </div>

        <div class="form-group container ">
            <label for="name" class="text-muted">Name</label>
            <input type="Text" class="form-control" id="name" name="name" placeholder="Enter manager name" pattern="[A-Za-z]{2,}">
        </div>

        <div class="form-group container ">
            <label for="surname" class="text-muted">Surname</label>
            <input type="Text" class="form-control" id="surname" name="surname" placeholder="Enter manager surname" pattern="[A-Za-z]{2,}">
        </div>

        <div class="form-group container">
            <label for="username" class="text-muted">Manager username <label style="color: #71b346;">* Must be at least 2 characters long, start with a letter and be alpha-numeric (only numbers and/or letters), max-length: 21. *</label></label>
            <input type="Text" class="form-control" id="username" name="username" placeholder="Enter your manager username" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
        </div >

        <div class="form-group container">
                <label for="email" class="text-muted">Manager email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your manager email" required>
            </div >

        <div class="form-group container">
            <label for="password" class="text-muted">Create password <label style="color: #71b346;">* Must be longer than 6 characters and contain at least one upper and lower case letter as well as a number. *</label></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
        </div>

        <div class="form-group container">
            <label for="password_confirmation" class="text-muted">Password confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
        </div>

         <!--Create Button -->
        <div class="form-group container " >
            <button type="submit" class="btn btn-secondary transition-fade text-light btn-block mt-3">Register</button>
            <a role="button" class="btn btn-secondary mt-3 btn-outline-secondary float-right" value="Back" href="/admin" style="width: 100px; color: #71b346;">Cancel<a/>
            </div>
</form>
<!-- **************************************************************************************************************** -->
@endsection
