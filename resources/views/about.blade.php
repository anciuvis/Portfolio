@extends('layouts.app')

@section('content')

<div class="wrapper">
	<div class="content-wrapper p-3">
		<section class="cubes row m-0">
			<div class="col-xs-12 col-sm-12 col-md-6 p-3" id="gradient">
				test
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 p-3">
				test2
			</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- to generate textured pattern canvas -->
<!-- <script src="{{ asset('js/patternizer.js') }}"></script> -->
<!-- GRADIENT animation -->
<script src="{{ asset('js/gradient.js') }}"></script>
@endsection
