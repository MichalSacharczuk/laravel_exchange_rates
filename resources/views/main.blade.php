@extends('layouts.app')

@section('headers')
	<script>
		
		// window.addEventListener('load', function () {
			
		// 	$.get('http://api.nbp.pl/api/exchangerates/rates/c/usd/2019-08-27/2019-08-30', function (response) {
				
		// 		var data = response.rates[0].no;
		// 		$('#response').html(data);
		// 	})
		// })

	</script>
@endsection


@section('content')

<div class="container">
	<!-- <div id="response"></div> -->

	@if ( session('no_input') )
	<div class="alert alert-danger">{{ session('no_input') }}</div>
	@endif

	<form class="form-inline" action="{{ url('/get_exchange_rates') }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="m-3">
			<input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ date('Y-m-d') }}">
			
			@if ($errors->has('date'))
			<span class="invalid-feedback">
				<strong>{{ $errors->first('date') }}</strong>
			</span>
			@endif
		</div>
		
		<button class="btn btn-primary m-3">Szukaj</button>

	</form>
</div>

@endsection
