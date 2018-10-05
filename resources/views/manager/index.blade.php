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
                <a class="nav-link" href="/manager/createLeaveType">Register Leave Type</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manager/updateLeaveType">Update Leave Type</a>
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

<div class="" style="position: absolute; left: 0; right: 0;">
                @if(!$applications->isEmpty())
                @include('manager.applications')
                @else
                <h1 class="text-center">No more applications to proccess.</h1>
                @endif

            </div>


<!-- **************************************************************************************************************** -->
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
