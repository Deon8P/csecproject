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
        <a href="/admin/createLeaveType">Register Leave Type</a>
        <a href="/admin/updateLeaveType">Update Leave Type</a>
        <a  href="/admin/register/manager">Register New Manager</a>
        <a href="/admin/update/managers">Update Managers</a>
        <a href="/admin/register/employee">Register New Employee</a>
        <a class="active" href="/admin/update/employees">Update Employees</a>
        <a href="/logout">Logout</a>
        <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
      </div>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

<!--Table to edit Leave-->
<div >
@if(! $employees->isEmpty())
<input  id="myInput" class="form-control text-center ml-2 mt-5 mb-3" type="text" placeholder="Search for a username..." onkeyup="searchUsername()" style="width: 30%">

<table class="table table-hover" style="position: absolute; top:15%; left:0%; right:0%">
    <thead>
    <tr class="">
        <th scope="row">Employee Username</th>
        <th scope="row">Employee Name</th>
        <th scope="row">Employee Surname</th>
        <th scope="row">Leave Balance</th>
        <th scope="row">Manager</th>
        <th scope="row">Commit</th>
        <th scope="row">Delete</th>
    </tr>
    </thead>
    <tbody id="ContentBody">
        @foreach($employees as $employee)
        <tr>
        <form action="/update/employee/{{ $employee->user_username }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <td><label style="color: white" type="text" id="name{{ $employee->user_username }}" name="username">{{ $employee->user_username }}</label></td>
        <td><input class="form-control" type="text" id="name_{{ $employee->name }}" name="name" placeholder="{{ $employee->name }}" pattern="[A-Za-z ‘-]{2,}""></td>
        <td><input class="form-control" type="text" id="surname_{{ $employee->surname }}" name="surname" placeholder="{{ $employee->surname }}" pattern="[A-Za-z ‘-]{2,}""></td>
        <td><input class="form-control" type="text" id="leave_balance_{{ $employee->leave_balance }}" name="leave_balance" placeholder="{{ $employee->leave_balance }}" onkeyup="handleChange(this);">

        </td>
        <td>
                <select class="custom-select" id="managed_by_{{ $employee->user_username }}" name="managed_by" required>
                    @foreach($managers as $manager)
                    @if($employee->managed_by != $manager->user_username)
                    <option value="{{ $manager->user_username }}" name="managed_by" id="{{ $manager->user_username }}">{{ $manager->user_username }}</option>
                    @else
                    <option selected value="{{ $employee->managed_by }}" name="managed_by" id="{{ $employee->managed_by }}">{{ $employee->managed_by }}</option>
                    @endif
                    @endforeach
                </select>
            </td>
        <td>
        <button type="submit" id="update{{ $employee->user_username }}" name="update" class="btn edit btn-outline-warning">Edit</button>
        </td>
        <td>
            <a href="/delete/employee/{{ $employee->user_username }}" role="button" id="delete{{ $employee->user_username }}" name="delete" class="btn delete btn-outline-danger">Delete</a>
        </td>

        </form>
        </tr>
        @endforeach

    </tbody>

</table>
</div>
@else
<h1 class="text-center"><a href="/admin/register/employee">Please register some employees first.</a></h1>
@endif

@endsection

@section('scripts')
<script>
    function handleChange(input) {
        if(isNaN(input.value)) input.value = "";
        if (input.value < 0) input.value = 0;
        if (input.value > 40) input.value = 40;
    }
</script>
@endsection

@section('scripts')

<script>
        function searchUsername() {
          // Declare variables
          var input, filter, table, tr, td, i;
          input = document.getElementById("myUsername");
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

    <script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
          // Start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          /* Loop through all table rows (except the
          first, which contains table headers): */
          for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("td")[n];
            y = rows[i + 1].getElementsByTagName("td")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                // If so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
          } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }
      </script>
@endsection

