@if (count($errors))
<div class="container text-center">
	<div class="text-center alert alert-danger container">
		<ul class="container text-center">
			@foreach ($errors -> all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif
