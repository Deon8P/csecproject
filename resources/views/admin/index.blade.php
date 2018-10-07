@extends('layouts.master')

<head>

    @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    @endsection

</head>

@section('nav')
<!-- NavBar -->
<div class="topnav">
    <a class="active" href="/admin">Home</a>
    <a href="/admin/register/manager">Register New Manager</a>
    <a href="/admin/update/managers">Update Managers</a>
    <a href="/admin/register/employee">Register New Employees</a>
    <a href="/admin/update/employees">Update Employee</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')
<h1 class="text-center pt-3" style="color: #71b346">System Statistics</h1>
<hr class="text-center" color="#71b346" >

<h1 class="" style="color: #71b346">Admin Count: <label class="text-muted">{{ $adminCount }}</label></h1>
<br>
<h1 class="" style="color: #71b346">Manager Count: <label class="text-muted">{{ $managerCount }}</label></h1>
<br>
<h1 class="" style="color: #71b346">Employee Count: <label class="text-muted">{{ $employeeCount }}</label></h1>

<br>
<br>

<h1 class="" style="color: #71b346">Leave Applications Count: <label class="text-muted">{{ $leaveCount }}</label></h1>
<br>
<h1 class="" style="color: #71b346">Leave Applications Pending: <label class="text-muted">{{ $leavePending }}</label></h1>
<br>
<h1 class="" style="color: #71b346">Leave Applications Approved: <label class="text-muted">{{ $leaveApproved }}</label></h1>
<br>
<h1 class="" style="color: #71b346">Leave Applications Rejected: <label class="text-muted">{{ $leaveRejected }}</label></h1>

@endsection

@section('scripts')
<script>
    function searchFunction() {
      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>
@endsection
