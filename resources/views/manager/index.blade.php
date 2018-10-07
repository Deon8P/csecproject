@extends('layouts.master')

<head>

    @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    @endsection

</head>

@section('nav')
<div class="topnav">
    <a class="active" href="/manager">Home</a>
    <a href="/manager/createLeaveType">Register Leave Type</a>
    <a href="/manager/updateLeaveType">Update Leave Type</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
@endsection

@section('content')

                @if(!$applications->isEmpty())
                <div class="" style="position: absolute; top:10%; left: 0; right: 0;">
                @include('manager.applications')
                </div>
                @else
                <h1 class="text-center" style="color: #c5c5c5;">There are no applications to process, <br><a href="/manager/createLeaveType">perhaps add a new leave type?</a></h1>
                @endif

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
