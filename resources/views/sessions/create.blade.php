@extends('layouts.master')

<head>

    @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @endsection

</head>

<!-- **************************************************************************************************************** -->

@section('content')
<div  class="container">
<!-- Image -->
<div class="text-center form-group container mt-2 mb-5">
        <div class="form-group container">
            <h3 style="color: #71b346"><strong>Welcome To</strong></h3>
        </div>
<img src="images/Logo.png" style="width:300px;height:300px;">

</div>
<!-- **************************************************************************************************************** -->

<div class="container text-center mt-5">
<!-- Input For Login -->

    <ul class=" nav nav-pills mb-3 container form-sr" id="pills-tab" role="tablist">

            <li class="nav-item">
              <a class="nav-link btn-outline-success active" id="pills-admin-tab" data-toggle="pill" href="#pills-admin" role="tab" aria-controls="pills-admin" aria-selected="false">Admin</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn-secondary btn-outline-success" id="pills-manager-tab" data-toggle="pill" href="#pills-manager" role="tab" aria-controls="pills-manager" aria-selected="true">Manager</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn-secondary btn-outline-success" id="pills-employee-tab" data-toggle="pill" href="#pills-employee" role="tab" aria-controls="pills-employee" aria-selected="false">Employee</a>
            </li>
          </ul>

        </ul>

            @include('layouts.errors')

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab">@include('sessions.adminForm')</div>
            <div class="tab-pane fade show" id="pills-manager" role="tabpanel" aria-labelledby="pills-manager-tab">@include('sessions.managerForm')</div>
            <div class="tab-pane fade" id="pills-employee" role="tabpanel" aria-labelledby="pills-employee-tab">@include('sessions.empForm')</div>
          </div>
</div>
</div>
@endsection

@section('footer')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
