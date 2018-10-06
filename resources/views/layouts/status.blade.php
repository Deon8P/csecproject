<script>
	window.onload = function() {
		var message = '{{Session::get('status')}}';
		var exist = '{{Session::has('status')}}';
		if(exist){
			alert(message);
		}
	}
</script>
