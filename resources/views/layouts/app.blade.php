<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<style>
		a {
			color: inherit;
		}
		a:hover {
			text-decoration: none;
		}
		#rates {
			max-width: 700px;
		}
	</style>

	@yield('headers')

</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				
				<a href="{{ url('/') }}" class="a">
					<div class="d-flex flex-wrap h5 my-2">
						<div>Exchange Rates App&nbsp;</div>
						<div>by Michał Sacharczuk</div>
					</div>
				</a>

			</div>
		</nav>

		<main class="py-4">
			@yield('content')
		</main>
	</div>
</body>
</html>
