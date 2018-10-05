@extends('layouts.master')

<head>

    @section('style')

    @endsection

</head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Manager/Create Employee</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="AdminHomePage.html">Home <span class="sr-only">(current)</span></a>
            </li>
        <li class="nav-item">
                <a class="nav-link" href="LoginPage.html">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')
<!-- Input For Creating Employee -->
<form class="form-sr" method="POST" action="/register/employee" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group container">
            <h1>Create New Employee</h1>
        </div>

        <div class="form-group container ">
            <label for="name">Name</label>
            <input type="Text" class="form-control" id="name" name="name" placeholder="Enter employee name" required>
        </div>

        <div class="form-group container ">
            <label for="surname">Surname</label>
            <input type="Text" class="form-control" id="surname" name="surname" placeholder="Enter employee surname" required>
        </div>

        <div class="form-group container">
            <label for="username">Employee username</label>
            <input type="Text" class="form-control" id="username" name="username" placeholder="Enter your employee username" required>
        </div >

        <div class="form-group container">
                <label for="email">Employee email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your employee email" required>
            </div >

            <div class="form-group container">
                <select class="custom-select" id="manager{{ $employee->username }}" name="manager{{ $employee->user_username }}" required>
                    @foreach($managers as $manager)
                    <option value="{{ $manager->user_username }}" name="{{ $manager->user_username }}" id="{{ $manager->user_username }}">{{ $manager->user_username }}</option>
                    @endforeach
                </select>
            </div>
            
        <div class="form-group container">
            <label for="leave_balance">Leave balance</label>
            <input type="number" min="15" max="40" class="form-control" id="leave_balance" name="leave_balance" placeholder="Leave Balance (Default 30 days)" required>
        </div>
        
        <div class="form-group container">
            <label for="password">Create password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group container">
            <label for="password_confirmation">Password confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required>
        </div>


         <!--Create Button -->
        <div class="form-group container ">
            <button type="submit" class="btn btn-secondary transition-fade text-light btn-block mt-3">Register</button>
			<input type="button" class="btn btn-secondary mt-3 btn-outline-secondary" value="Back" onclick="window.location.href='../../manager'" style="width: 100px"/>
		</div>
</form>
<!-- **************************************************************************************************************** -->
@endsection
