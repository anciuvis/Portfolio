@extends('layouts.app')

@section('content')

<div class="wrapper">
	<div class="content-wrapper p-0">
		<section class="row m-0 h-100 w-100 about">
			<div class="col-xs-12 col-md-4 pl-0 pl-md-3 pb-0 pb-md-3 pr-0 about-photo" >
				<div class=" h-100 p-0 p-md-3 pl-3 d-flex flex-column align-items-start " id="gradient">
					<div class="d-flex flex-column flex-lg-row justify-content-between">
						<span class="py-3 px-1 mt-3">ABOUT ME</span>
						<img src="myphoto.jpg" class="w-50 h-50 float-right float-md-none img-fluid" alt="my photo">
					</div>
					<div class="">
						<a href="{{ route('home') }}" class="btn btn-outline-dark p-3 p-md-2 m-2"><<</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 pr-3 pb-3 about-intro mb-auto">
				<div class="cover-letter p-1">
					<br />
					My name is Anna Yasyreva and I am starting my career as a web developer. My journey started with Bachelor in Economics at Vilnius ISM University. During next 5 years following finishing my degree I gained knowledge and experience in various analytical positions, such as: <br />
					<br />
					Project Analyst for local electronics manufacturer Teltonika,<br />
					Accounting Specialist for international financial center of Paroc,<br />
					Business and Financial Analyst for Aeroturbines branch of Aviation holding based in Lithuania Avia Solutions Group - FL Technics,<br />
					Analyst for Insurance market leader Lietuvos Draudimas<br />
					<br />
					I find new digital technologies very appealing, as well as I have great interest in programming itself. The scope of web technologies I have worked with covers:<br />
					<br />
					HTML and CSS,<br />
					Javascript including jQuery,<br />
					PHP plain,<br />
					Laravel framework,<br />
					MySQL (using phpMyAdmin and Sequel Pro softwares),<br />
					WordPress,<br />
					Python with Django (basics)<br />
				</div>
			</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- to generate textured pattern canvas -->
<!-- <script src="{{ asset('js/patternizer.js') }}"></script> -->
<!-- GRADIENT animation -->
<script src="{{ asset('js/gradient.js') }}"></script>
@endsection
