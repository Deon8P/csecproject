@extends('layouts.master')

<head>

        @section('style')
        <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
    <a href="/manager">Home</a>
    <a class="active" href="/manager/application/history">Application History</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
@endsection

@section('content')
        @if(! $applications->isEmpty())
        <div class="text-center" style="position: absolute; top:10%; left: 0; right: 0;">
        <h1 class="text-center mt-3" style="color: #71b346">Application History</h1>

        <input  id="myUsername" class="form-control text-center ml-3 mt-2 mb-3" type="text" placeholder="Search for a username..." onkeyup="searchUsername()" style="width: 30%">

        <table class="table table-hover" id="myTable">
            <thead>

            <tr class="">
                <th onclick="sortTable(0)" style="cursor: pointer">Employee Username</th>
                <th onclick="sortTable(1)" style="cursor: pointer">Created</th>
                <th onclick="sortTable(2)" style="cursor: pointer">Leave Type</th>
                <th onclick="sortTable(3)" style="cursor: pointer">Start Date</th>
                <th onclick="sortTable(4)" style="cursor: pointer">End Date</th>
                <th onclick="sortTable(5)" style="cursor: pointer">Period</th>
                <th onclick="sortTable(6)" style="cursor: pointer">Status</th>
            </tr>
            <tbody>
        @foreach ($applications as $application)
        <tr>
        <td>{{ $application->emp_username }}</td>
        <td>{{ $application->created_at }}</td>
        <td>{{ $application->leave_type }}</td>
        <td>{{ $application->startDate }}</td>
        <td>{{ $application->endDate }}</td>
        <td>{{ $application->period }}</td>
        <td>{{ $application->status }}</td>
        @endforeach
    </tbody>
</div>
</table>
        @else
        <h1 class="text-center" style="color: #c5c5c5">The application history is currently empty, <br><a href="/manager">perhaps approve or reject some applications first.</a></h1>
        @endif

<!-- ******************************************************************************************************************-->

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
