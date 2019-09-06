@extends('layouts.app')

@section('headers')
	<script>
		
		window.addEventListener('load', function () {
			
			if ( $('#rates').length > 0 ) {

				$('.rate-diff').each(function () {
					
					var $span = $('span', this);
					var number = Number( $span.text() );
					// console.log(number);

					if ( number > 0 ) {
						$(this).addClass('text-success');
						$span.prepend('+');
					}
					else if ( number < 0 ) {
						$(this).addClass('text-danger');
					}
				})
			}
		})

	</script>
@endsection


@section('content')

<div class="container">
	<!-- <div id="response"></div> -->

	@if ( session('error_message') )
	<div class="alert alert-danger">{{ session('error_message') }}</div>
	@endif

	<form class="form-inline" action="{{ url('/get_exchange_rates') }}" method="POST">
		
		{{ csrf_field() }}
		
		<div class="mr-2 my-3">
			<input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ !empty($last_date) ? $last_date : date('Y-m-d') }}">
			
			@if ($errors->has('date'))
			<span class="invalid-feedback">
				<strong>{{ $errors->first('date') }}</strong>
			</span>
			@endif
		</div>
		
		<button class="btn btn-primary my-3">Szukaj</button>

	</form>

	{{-- @if ( !empty($rates) ) --}}
	@if ( session('rates') )
	<div id="rates" class="my-5 mx-auto">
		
		<table class="table table-striped">
			<tr>
				<th>Data</th>
				<th>Kurs kupna</th>
				<th>Kurs sprzedaży</th>
			</tr>
			@foreach (session('rates') as $key => $rate)
			<tr>
				<td>
					{{ $rate->effectiveDate }} 
				</td>
				<td>
					{{ $rate->bid }}
					@if ( !$loop->last )
					<small class="rate-diff">
						(<span>{{ round($rate->bid - session('rates')[$key + 1]->bid, 4) }}</span>)
					</small>
					@endif
				</td>
				<td>
					{{ $rate->ask }}
					@if ( !$loop->last )
					<small class="rate-diff">
						(<span>{{ round($rate->ask - session('rates')[$key + 1]->ask, 4) }}</span>)
					</small>
					@endif
				</td>
			</tr>
			@endforeach
		</table>

	</div>
	@endif

</div>

@endsection
