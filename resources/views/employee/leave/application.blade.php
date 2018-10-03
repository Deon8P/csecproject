@extends('layouts.master')

<head>

    @section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
     @endsection

</head>

@section('nav')
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Application Form</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="EmployeeHomePage.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="LoginPage.html">Logout</a>
            </li>
        </ul>

        <!-- Cancel button -->
        <form class="form-inline my-2 my-lg-0">
            <a href="EmployeeHomePage.html" class="btn btn-outline-danger" role="button">Cancel</a>

        </form>
    </div>
</nav>
<!-- **************************************************************************************************************** -->
@endsection

@section('content')

<!-- Input For Application form -->
<form class="form-sr" action="/leave/apply" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="container">
        <div class="container text-center">
        <div class="form-group container">
        <legend>Apply for Leave</legend>
        </div>

        <!--Drop DownList -->
        <div class="form-group container">
            <label>Please Select Leave Type</label>
        </div >

        <div class="form-group container">
            <select class="custom-select" name="leave_type" required>
                @foreach($leaves as $leave)
                <option value="{{ $leave->leave_type }}" name="{{ $leave->leave_type }}" id="{{ $leave->leave_type }}" selected >{{ $leave->leave_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group container">
            
        <div class="input-daterange" id="datepicker">
            <label>Start date for leave</label>
            
            <input type="text" class="input-sm form-control" name="startDate" id="startDate" required/>
          <br>
            <label>to</label>
          <br>
            <label class="mt-4">End date for leave</label> 
            
            <input type="text" class="input-sm form-control" name="endDate" id="endDate" required/>
                    
        </div>
    </div>        
        <div class="form-group container ">
            <button class="btn" type="submit">Apply</button>
        </div>
        </div>
    </div>
</form>

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
</script>
@endsection