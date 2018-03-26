<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Anna portfolio') }}</title>

    <!-- Styles -->
		<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
	<body>

    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
		<!-- to generate textured pattern canvas -->
		<script src="{{ asset('js/patternizer.js') }}"></script>
	</body>
</html>
