@extends('layouts.master')

<head>

    @section('style')

    @endsection

</head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="ManagerHomePage.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LoginPage.html">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manager/register/employee">Register Employee</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="/manager/register/employee">Update Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manager/createLeaveType">Register Leave Type</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="/manager/updateLeaveType">Update Leave Type</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button type="button" class="btn btn-outline-success">Search</button>
        </form>
    </div>
</nav>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

<!-- Table with Sliders -->


<main class="container pt-10">
    <div class="card mb-10">
        <div class="card-header">Fearures</div>
        <div class="card-block p-10">
            <table class="table table-hovertable-sm m-10">
                <thead class="">
                <tr>
                    <th>#</th>
                    <th>Employee Username</th>
                    <th>Employee Name</th>
                    <th>Employee Surname</th>
                    <th>Leave Balance</th>

                </tr>
                </thead>
                <tbody>
                @if($employees != null)
                @foreach ($employees as $employee)
                    <tr>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                            </label>
                        </td>
                        <td>{{ $employee->user_username }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->surname }}</td>
                        <td>{{ $employee->leave_balance }}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer p-0">

            <tr>
                <th></th>
                <th colspan="4">
                    <button type="button" class="btn btn-outline-info">Approve</button>&nbsp &nbsp
                    <button type="button" class="btn btn-outline-success">Approve All</button>&nbsp &nbsp
                    <button type="button" class="btn btn-outline-danger float-right ">Disapprove All</button>
                    <button type="button" class="btn btn-outline-warning float-right">Disapprove</button>
                </th>
            </tr>


        </div>
    </div>
</main>

<!-- **************************************************************************************************************** -->
@endsection
