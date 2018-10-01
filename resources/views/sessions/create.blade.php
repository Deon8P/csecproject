@extends('layouts.master')

<head>

    @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    @endsection

</head>

<!-- **************************************************************************************************************** -->

@section('content')
<div class="container">
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
<form class="form-sr" action="/manager/storeManagerSession" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}


        <div class="form-sr">
            <h5 for="username" style="color: #71b346">Enter Username</h5>
            <input type="Text" class="form-control" id="username" name="password" placeholder="Username" required>
        </div>

        <div class="form-sr">
            <h5 for="password" style="color: #71b346">Enter Password</h5>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>

        <!--Sign In Button -->
        <div class="form-sr mt-3">
            <button class="btn btn-lg btn-block btn-secondary" type="submit">Sign In</button>
        </div>

        <a href="/register" style="color: #71b346">Register</a>
</form>
</div>
</div>
@endsection
