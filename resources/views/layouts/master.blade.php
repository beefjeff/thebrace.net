<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>{{env('APP_NAME')}}</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
	<div id="app">
		<flash message="{{ session('flash') }}"></flash>
		@include('partials.nav')
		<div class="content">
			@yield('content')
		</div>
		@include('partials.footer')
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
