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
  </div>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

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
