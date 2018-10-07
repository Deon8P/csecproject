@extends('layouts.master')

<head>
	@section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    @endsection
</head>

@section('content')
<div class="container" style="position: absolute; top:0%; left: 0; right: 0; bottom: 0%;">
	<div class="text-center" >

		<h1 style="color: #71b346">Admin Registration</h1>

		<form class="form-sr" method="POST" action="/register/admin" enctype="multipart/form-data" >
            {{ csrf_field() }}

            <div class="form-sr">
                    <label for="username" class="text-muted">Username <label style="color: #71b346;">* Must be at least 2 characters long, start with a letter and be alpha-numeric (only numbers and/or letters), max-length: 21. *</label></label>
                    <input type="text" class="form-control transition-fade" id="username" name="username" placeholder="Username" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$">
                </div>

			<div class="form-sr">
				<label for="name" class="text-muted">Name</label>
				<input type="text" class="form-control transition-fade" id="name" name="name" placeholder="Name" required pattern="[A-Za-z]{2,}">
			</div>

			<div class="form-sr">
				<label for="surname" class="text-muted">Surname</label>
				<input type="text" class="form-control transition-fade" id="surname" name="surname" placeholder="Surname" required pattern="[A-Za-z]{2,}">
			</div>

			<div class="form-sr">
				<label for="email " class="text-muted">Email address</label>
				<input type="email" class="form-control transition-fade" id="email" name="email" placeholder="Email address" required>
			</div>

			<div class="form-sr">
				<label for="password " class="text-muted">Password <label style="color: #71b346;">* Must be longer than 6 characters and contain at least one upper and lower case letter as well as a number. *</label></label>
				<input type="password" class="form-control transition-fade" id="password" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
			</div>

			<div class="form-sr">
				<label for="password_confirmation " class="text-muted">Password confirmation</label>
				<input type="password" class="form-control transition-fade" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required pattern=".{6,}">
            </div>
            </div>

			<div class="form-sr">
				<button type="submit" class="btn btn-secondary btn-lg transition-fade text-light btn-block mt-3"><strong>Register</strong></button>
				<a role="button" class="btn btn-secondary mt-3 btn-outline-secondary float-right" value="Back" href="/login" style="width: 100px; color: #71b346;">Back<a/>
			</div>

			<div style="position: absolute; bottom: 320px; right: 200px;">
		</form>
	</div>
</div>
@endsection
