@extends('layouts.master')

<head>
    @section('style')
    <link href="/css/reg-login.css" rel="stylesheet">
    @endsection
</head>

@section('content')
<div class="container">
	<div class="text-center" >

		<h1 style="color: #71b346">Register</h1>

		<form class="form-sr" method="POST" action="/register/manager" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="pr-4" style="overflow-y: scroll; height: 470px">

            <div class="form-sr">
                    <label for="username" class="text-muted">Username</label>
                    <input type="text" class="form-control transition-fade" id="username" name="username" placeholder="Username" required>
                </div>

			<div class="form-sr">
				<label for="name" class="text-muted">Name</label>
				<input type="text" class="form-control transition-fade" id="name" name="name" placeholder="Name" required>
			</div>

			<div class="form-sr">
				<label for="surname" class="text-muted">Surname</label>
				<input type="text" class="form-control transition-fade" id="surname" name="surname" placeholder="Surname" required>
			</div>

			<div class="form-sr">
				<label for="email " class="text-muted">Email address</label>
				<input type="email" class="form-control transition-fade" id="email" name="email" placeholder="Email address" required>
			</div>

			<div class="form-sr">
				<label for="password " class="text-muted">Password</label>
				<input type="password" class="form-control transition-fade" id="password" name="password" placeholder="Password" required>
			</div>

			<div class="form-sr">
				<label for="password_confirmation " class="text-muted">Password confirmation</label>
				<input type="password" class="form-control transition-fade" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required>
            </div>
            </div>

			<div class="form-sr">
				<button type="submit" class="btn btn-secondary btn-lg transition-fade text-light btn-block mt-3"><strong>Register</strong></button>
				<input type="button" class="btn btn-secondary mt-3 btn-outline-secondary" value="Back" onclick="window.location.href='../../login'" style="width: 100px"/>
			</div>

			<div style="position: absolute; bottom: 320px; right: 200px;">
			</div>
		</form>
	</div>
</div>
@endsection
