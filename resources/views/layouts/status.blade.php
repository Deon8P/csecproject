<script>
	window.onload = function() {
		var message = '{{Session::get('status')}}';
		var exist = '{{Session::has('status')}}';
		if(exist){
			alert(message);
		}
    }
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</script>
