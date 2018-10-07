@extends('layouts.master')

<head>

        @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
        <a  href="/admin">Home</a>
        <a  href="/admin/register/manager">Register New Manager</a>
        <a class="active" href="/admin/update/managers">Update Managers</a>
        <a href="/admin/register/employee">Register New Employee</a>
        <a  href="/admin/update/employees">Update Employees</a>
        <a href="/logout">Logout</a>
        <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
      </div>
@endsection

@section('content')

<div style="position: absolute; top:15%; left:0%; right:0%">
@if(! $managers->isEmpty())
<table class="table table-hover" style="position: absolute; top:15%; left:0%; right:0%">
    <thead>
    <tr class="">
        <th scope="row">Manager Username</th>
        <th scope="row">Manager Name</th>
        <th scope="row">Manager Surname</th>
        <th scope="row">Commit</th>
        <th scope="row">Delete</th>
    </tr>
    </thead>
    <tbody id="ContentBody">
        @foreach($managers as $manager)
        <tr>
        <form action="/update/manager/{{ $manager->user_username }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <td><label style="color: white" type="text" id="username{{ $manager->user_username }}" name="username">{{ $manager->user_username }}</label></td>
        <td><input class="form-control" type="text" id="name{{ $manager->name }}" name="name" placeholder="{{ $manager->name }}" pattern="[A-Za-z]{2,}"></td>
        <td><input class="form-control" type="text" id="surname{{ $manager->surname }}" name="surname" placeholder="{{ $manager->surname }}" pattern="[A-Za-z]{2,}" ></td>
        <td>
        <button type="submit" id="update{{ $manager->user_username }}" name="update" class="btn edit btn-outline-warning">Edit</button>
        </td>
        <td>
            <a href="/delete/manager/{{ $manager->user_username }}" role="button" id="delete" name="delete{{ $manager->user_username }}" class="btn delete btn-outline-danger">Delete</a>
        </td>

        </form>
        </tr>
        @endforeach

    </tbody>

</table>
</div>
@else
<h1 class="text-center"><a href="/admin/register/manager">Please register some managers first.</a></h1>
@endif
@endsection
