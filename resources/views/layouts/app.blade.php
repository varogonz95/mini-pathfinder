<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	
	<!-- Styles -->
	<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
	<!-- Scripts -->
	<script src="{{ asset('js/angularjs.min.js') }}"></script>
	@stack('scripts-top')
	
	<title>{{ config('app.name') }}</title>
</head>

<body ng-app="App" style="overflow-y: hidden">

	@include('partials._navbar')

	<main class="py-4 full-height-navbar">
		<div class="container">
			<div class="row justify-content-center">
				@yield('content')
			</div>
		</div>
	</main>
	
	<script src="{{ asset('js/default.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>