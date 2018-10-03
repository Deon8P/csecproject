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
                <a class="nav-link" href="EmployeeHomePage.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/leave/apply">Apply Here</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LoginPage.html">Logout</a>
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
<!-- Table for Display -->

<table class="table table-hover">
    <thead>

    <tr class="table-dark">
        <th scope="row">Employee Number</th>
        <th>Employee ID</th>
        <th>Employee Name</th>
        <th>Employee Last Name</th>
        <th>Leave Balance</th>
        <th>Previous Leave Application</th>
        <th>Approved/Disaproved</th>
    </tr>
    <td>123456789</td>
    <td>EP001</td>
    <td>Koos</td>
    <td>Potgieter</td>
    <td>10</td>
    <td>Sick</td>
    <td>Approved</td>
    </tbody>
</table>

<!-- ******************************************************************************************************************-->

@endsection
