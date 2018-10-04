@extends('layouts.master')

<head>

        @section('style')
        @endsection

    </head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin / Create Leave Type</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/manager">Home</a>
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

<!-- Input For Creating Leave Type -->
<form action="/createLeaveType" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}

        <div class="form-group container">
            <legend>Create New Leave Type</legend>
        </div>

        <div class="form-group container ">
            <label for="leave_type">Leave Type</label>
            <input type="text" class="form-control" id="leave_type" name="leave_type" placeholder="Enter leave type name here." required>
        </div>

        <div class="form-group container">
            <label for="status">Status</label>
            <select class="custom-select" id="status" name="status" required>
                <option value="active" name="active" id="active" selected >Active</option>
                <option value="suspended" name="suspended" id="suspended">Suspended</option>
            </select>
        </div>

        <!--Create Button -->
        <div class="form-group container mt-5">
            <button type="submit" class="btn btn-outline-success" >Create</button>
            <button class="form-inline btn btn-outline-danger float-right" onclick="window.location = '/manager'">Cancel</button>
        </div>

    </form>

<!-- **************************************************************************************************************** -->

@endsection
