@extends('layouts.master')

<head>

        @section('style')
        <link href="/css/reg-login.css" rel="stylesheet">
        @endsection

    </head>

@section('nav')
<div class="topnav">
    <a href="/employee">Home</a>
    <a class="active" href="/leave/apply">Apply Here</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
  </div>
@endsection

@section('content')

@if(! $leaves->isEmpty())
<form class="form-sr" action="/leave/apply" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="container" style="position: absolute;top: 20%; left: 0; right: 0;">
        <div class="container text-center">
        <div class="form-group container">
        <h1 style="color: #71b346" >Apply for Leave</h1>
        </div>

        <!--Drop DownList -->
        <div class="form-group container">
            <label class="text-muted">Please Select Leave Type</label>
            <select class="custom-select" name="leave_type" required>
                @foreach($leaves as $leave)
                <option value="{{ $leave->leave_type }}" name="{{ $leave->leave_type }}" id="{{ $leave->leave_type }}" >{{ $leave->leave_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group container">

        <div class="input-daterange" id="datepicker">
            <label class="text-muted">Start date for leave</label>

            <input type="text" class="input-sm form-control" name="startDate" id="startDate" style="text-align: center" min="" required/>
          <br>
            <label style="color: #71b346">to</label>
          <br>
            <label class="mt-4 text-muted">End date for leave</label>

            <input type="text" class="input-sm form-control" name="endDate" id="endDate" style="text-align: center" max="" required/>

        </div>
    </div>
        <div class="form-group container mt-5 ">
            <button class="btn btn-outline-success float-left" style="width: 30%;" type="submit">Apply</button>
            <a href="/employee" class="btn btn-outline-danger float-right" role="button">Cancel</a>
        </div>
        </div>
    </div>
</form>
@else
<h1 class="text-center" style="color: #c5c5c5">There are currently no types of leave to apply for, <br><a href="/leave/apply">please refer to your manager.</a></h1>
@endif

<!-- **************************************************************************************************************** -->
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<script>
        $('#datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            }
            if(mm<10){
                mm='0'+mm
            }

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("startDate").setAttribute("min", today);

</script>

@endsection
