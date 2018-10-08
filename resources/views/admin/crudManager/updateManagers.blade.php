@extends('layouts.master')

<head>

        @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
        <a  href="/admin">Home</a>
        <a href="/admin/createLeaveType">Register Leave Type</a>
        <a href="/admin/updateLeaveType">Update Leave Type</a>
        <a  href="/admin/register/manager">Register New Manager</a>
        <a class="active" href="/admin/update/managers">Update Managers</a>
        <a href="/admin/register/employee">Register New Employee</a>
        <a  href="/admin/update/employees">Update Employees</a>
        <a href="/logout">Logout</a>
        <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
      </div>
@endsection

@section('content')

<div >
@if(! $managers->isEmpty())

<table class="table table-hover" id="myTable" style="position: absolute; top:15%; left:0%; right:0%">
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
        <td><input class="form-control" type="text" id="name{{ $manager->name }}" name="name" placeholder="{{ $manager->name }}" pattern="[A-Za-z ‘-]{2,}"></td>
        <td><input class="form-control" type="text" id="surname{{ $manager->surname }}" name="surname" placeholder="{{ $manager->surname }}" pattern="[A-Za-z ‘-]{2,}" ></td>
        <td>
        <button type="submit" id="update{{ $manager->user_username }}" name="update" class="btn edit btn-outline-warning">Edit</button>
    </form>
    </td>
        <td>
            <button data-toggle="modal" data-target="#swapManager{{ $manager->user_username }}" type="button" id="swapManagerButton{{ $manager->user_username }}" name="delete{{ $manager->user_username }}" class="btn delete btn-outline-danger">Delete</button>

            <div class="modal fade" id="swapManager{{ $manager->user_username }}" name="swapManager{{ $manager->user_username }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $manager->user_username }}" aria-hidden="true">
            <div class="modal-dialog " role="dialog" >
                <div class="modal-content" style="background: #1e2129">

                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel{{ $manager->user_username }}" style="color: #71b346;">Swap Managers</h5>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/delete/manager/{{ $manager->user_username }}" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        {{ csrf_field() }}

                        <label class="" style="color: #71b346;">Hand employees over from {{ $manager->user_username }} to..</label>
                        <select class="custom-select" id="new_manager_{{ $manager->user_username }}" name="new_manager" required>
                                @foreach($managers as $manager)
                                <option value="{{ $manager->user_username }}" name="{{ $manager->user_username }}" id="{{ $manager->user_username }}">{{ $manager->user_username }}</option>
                                @endforeach
                        </select>

                    </div>

                            <!-- Footer for uplaod button and close button-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success transition-fade" style="color: black; ">Swap</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
        </td>
        @endforeach

    </tbody>

</table>

@else
<h1 class="text-center" ><a href="/admin/register/manager">Please register some managers first.</a></h1>
@endif
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
