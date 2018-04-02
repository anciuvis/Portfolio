@extends('layouts.app')

@section('content')
@Auth
	</div>
@endif
		<div class="wrapper">
			<div class="content-wrapper p-3">
				<section class="cubes row m-0">
					<div class="col-xs-12 col-sm-6 col-md-4 cube homecube d-flex align-items-center justify-content-center p-3">
						<a href="/">The portfolio</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube aboutcube d-flex align-items-center justify-content-center p-3">
						<a href="{{ route('about') }}" class="">
							<i class="fas fa-user-circle fa-2x p-3 scale hvr-back-pulse p-3"></i>
							<br />
							ABOUT ME
						</a>
					</div>
					<div class="col-sm-6 col-md-4 p-0 cube colorcube d-none d-sm-block">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube introcube d-flex align-items-center text-left p-3">
						Hello! <br />
						I am Anna Yasyreva and this is my portfolio website
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube photocube d-flex align-items-center justify-content-center p-3">
						<a href="{{ route('photos.index') }}" class="d-flex flex-column justify-content-between">
							<i class="fas fa-camera-retro fa-2x hvr-buzz-out p-3"></i>
							<br />
								My Photos
						</a>
					</div>
					<div class="col-sm-6 col-md-4 p-0 cube d-none d-sm-block">
						<canvas id="bgCanvas" class="w-100 h-100"></canvas>
					</div>
					<div class="col-md-4 p-0 cube colorcube d-none d-md-block">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube contactcube d-flex flex-column justify-content-around p-3">
						<a href="{{ route('contact') }}" class="d-flex flex-column justify-content-between">
							<i class="fas fa-paper-plane fa-2x hvr-bob p-3"></i>
							<br />
							Contacts
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube socialcube d-flex flex-column justify-content-around p-3">
						Social networks
						<div class="d-flex justify-content-between flex-row pb-3">
							<a href="https://www.facebook.com/anchiukas">
								<i class="fab fa-facebook-square fa-2x hvr-wobble-horizontal"></i>
							</a>
							<a href="https://github.com/anciuvis">
								<i class="fab fa-github-alt fa-2x hvr-wobble-horizontal"></i>
							</a>
							<a href="https://www.instagram.com/anchiuvis/?hl=en">
								<i class="fab fa-instagram fa-2x hvr-wobble-horizontal"></i>
							</a>
							<a href="https://www.linkedin.com/in/anna-yasyreva-a988648/">
								<i class="fab fa-linkedin fa-2x hvr-wobble-horizontal"></i>
							</a>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
		<!-- to generate textured pattern canvas -->
		<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
		<script src="{{ asset('js/patternizer.js') }}"></script>
@endsection
