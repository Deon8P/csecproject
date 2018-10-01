@extends('layouts.master')

@section('content')
<div class="container">
	<div class="text-center">

		<h1 style="color: #cc6600;">Register</h1>

		<form class="form-sr" method="POST" action="/register" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-sr">
				<label for="name" class="text-muted">name</label>
				<input type="text" class="form-control transition-fade" id="name" name="name" placeholder="name" required>
			</div>

			<div class="form-sr">
				<label for="surname" class="text-muted">surname</label>
				<input type="text" class="form-control transition-fade" id="surname" name="surname" placeholder="surname" required>
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

			<div class="form-sr">
				<button type="submit" class="btn btn-primary btn-lg transition-fade text-light btn-block mt-3" style="background-color: #cc6600;"><strong>Register</strong></button>
				<input type="button" class="btn btn-secondary mt-3 btn-outline-secondary" value="Back" onclick="window.location.href='../../login'" style="width: 100px"/>
			</div>

			<div style="position: absolute; bottom: 320px; right: 200px;">
			</div>
		</form>
	</div>
</div>
@endsection
