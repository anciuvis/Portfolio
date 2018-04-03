@extends('layouts.app')

@section('content')


	<div class="wrapper">
		<div class="content-wrapper p-3" id="gradient">
			<div class="d-flex flex-row justify-content-between">
				<a href="{{ route('home') }}" class="btn btn-outline-dark p-3 my-2">&#8920; Back</a>
				<h1 class="my-auto mx-auto">Contacts</h1>
			</div>
			<div class="row contacts">
				<div class="col-xs-12 col-lg-6 p-3 cornered" style="height:auto">
					<p>My contacts</p>
					<p>
						Sausio 13-osios gatvė 2, Vilnius 04343, Lietuva </br>
						Tel.: +370 647 39 0 59</p>
						<a href="mailto:nonofthem@gmail.com?subject=Portfolio%20question">nonofthem@gmail.com</a></p>
						<p>If you have a question, please let me know!</p>
				</div>
				<div class="col-xs-12 col-lg-6 p-2">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9223.571172805861!2d25.21236778748504!3d54.69391418298592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTTCsDQxJzM4LjEiTiAyNcKwMTMnMTYuMSJF!5e0!3m2!1sen!2slt!4v1522772147553" class="w-100" frameborder="0" style="border:0; max-width:450px; height:400px" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- GRADIENT animation -->
	<script src="{{ asset('js/gradient.js') }}"></script>

@endsection
