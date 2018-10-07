@extends('layouts.master')

<head>

        @section('style')
        <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
    <a href="/manager">Home</a>
    <a href="/manager/createLeaveType">Register Leave Type</a>
    <a class="active" href="/manager/updateLeaveType">Update Leave Type</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
@endsection

@section('content')

        @include('manager.crudLeave.LeaveTypes')

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
