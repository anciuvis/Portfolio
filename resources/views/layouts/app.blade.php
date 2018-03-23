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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
	<body>

    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/patternizer.js') }}"></script>

		<script type="text/javascript">
		var bgCanvas = document.getElementById('bgCanvas');

		function render() {

				bgCanvas.patternizer({
						stripes : [
								{
										color: '#4ba894',
										rotation: 315,
										opacity: 70,
										mode: 'normal',
										width: 7,
										gap: 9,
										offset: 0
								},
								{
										color: '#4362a7',
										rotation: 45,
										opacity: 90,
										mode: 'normal',
										width: 2,
										gap: 12,
										offset: 0
								},
								{
										color: '#541c7a',
										rotation: 0,
										opacity: 60,
										mode: 'plaid',
										width: 10,
										gap: 10,
										offset: 0
								}
						],
						bg : '#ffffff'
				});

		}

		// resize the canvas to the window size
		function onResize() {

				// number of pixels of extra canvas drawn
				var buffer = 100;

				// var bgCanvas = document.getElementById('bgCanvas');

				// if extra canvas size is less than the buffer amount
				// console.log(bgCanvas);
				if (bgCanvas.width - window.innerWidth < buffer ||
						bgCanvas.height - window.innerHeight < buffer) {

						// resize the canvas to window plus double the buffer
						bgCanvas.width = window.innerWidth + (buffer * 2);
						bgCanvas.height = window.innerHeight + (buffer * 2);

						render();
				}

		}

		function init() {
				onResize();
				// create a listener for resize
				// cowboy's throttle plugin keeps this event from running hog wild
				window.addEventListener('resize', Cowboy.throttle(200, onResize), false);
		}

		init();

		</script>
	</body>
</html>
