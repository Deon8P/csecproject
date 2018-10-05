@extends('layouts.master')

<head>

        @section('style')
        @endsection

    </head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin / Edit Leave Type</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/manager">Home <span class="sr-only">(current)</span></a>
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

<!--Table to edit Leave-->
<div class="card" >
<table class="table table-hover" style="border: 1; width:100%">
    <thead>
    <tr class="table-dark">
        <th scope="row">Employee Username</th>
        <th scope="row">Employee Name</th>
        <th scope="row">Employee Surname</th>
        <th scope="row">Manager</th>
        <th scope="row">Commit</th>
        <th scope="row">Delete</th>
    </tr>
    </thead>
    <tbody id="ContentBody">
        @if($employees != null)
        @foreach($employees as $employee)
        <tr>
        <form action="/update/employee/{{ $employee->user_username }}" method="POST" enctype="multipart/form-data">
    
            {{ csrf_field() }}
        <td><label id="name{{ $employee->username }}" name="leave_type"></td>
        <td><input type="text" id="name{{ $employee->name }}" name="name{{ $employee->name }}" placeholder="{{ $employee->name }}" ></td>
        <td><input type="text" id="surname{{ $employee->surname }}" name="surname{{ $employee->surname }}" placeholder="{{ $employee->surname }}" ></td>
            <td>
                <select class="custom-select" id="manager{{ $employee->username }}" name="manager{{ $employee->user_username }}" required>
                    @foreach($managers as $manager)
                    <option value="{{ $manager->user_username }}" name="{{ $manager->user_username }}" id="{{ $manager->user_username }}">{{ $manager->user_username }}</option>
                    @endforeach
                </select>
            </td>
        <td>
        <button type="submit" id="update{{ $employee->user_username }}" name="update{{ $employee->user_username }}" class="btn edit btn-outline-warning">Edit</button>
        </td>
        <td>
            <a href="/deleteEmployee/{{ $employee->user_username }}" role="button" id="delete{{ $employee->user_username }}" data-value="{{ $employee->user_username }}" name="delete{{ $employee->user_username }}" class="btn delete btn-outline-danger">Delete</button>
        </td>
    
        </form>
        </tr>
        @endforeach
        @endif
    
    </tbody>

</table>
</div>

<!-- **************************************************************************************************************** -->
@endsection