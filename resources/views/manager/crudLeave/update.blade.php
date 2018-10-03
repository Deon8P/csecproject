@extends('layouts.master')

<head>

    @section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection

</head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin / Edit Leave Type</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="AdminHomePage.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LoginPage.html">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

<!--Table to edit Leave-->

<table class="table table-hover">
    <thead>
    <tr class="table-dark">
        <th scope="row">Leave Type</th>
        <th scope="row">Status</th>
        <th scope="row">Commit</th>
        <th scope="row">Delete</th>
    </tr>
    </thead>
    <tbody id="ContentBody">
        @include('manager.crudLeave.LeaveTypes')
    </tbody>

</table>

<!-- **************************************************************************************************************** -->
@endsection


@section('scripts')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script language="JavaScript" type="text/javascript">
        function reloadLeaveType() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
               document.getElementById("ContentBody").innerHTML = this.responseText;
              }
            };
            xhttp.open("GET", "/manager/reloadLeaveTypes", true);
            xhttp.send();
          }

        function editLeaveType(type) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                reloadLeaveType();
              }
            };
            xhttp.open("POST", "/updateLeaveType/" + type, true);
            xhttp.send();
          }

          function deleteLeaveType(type) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                reloadLeaveType();
              }
            };
            xhttp.open("POST", "/updateLeaveType/" + type, true);
            xhttp.send();
        }
/*
        $(document).ready(function() {
            $('.edit').on('click', function (e) {
             editLeaveType($(this).data("value"));
            });
        });

        $(document).ready(function() {
            $('.delete').on('click', function (e) {
             deleteLeaveType($(this).data("value"));
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        */
</script>
@endsection
