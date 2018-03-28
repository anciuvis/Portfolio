@extends('layouts.app')

@section('content')

		<div class="wrapper">
			<div class="content-wrapper p-3">
				<section class="cubes row m-0">
					<div class="col-xs-12 col-sm-6 col-md-4 cube homecube d-flex align-items-center justify-content-center p-3">
						<a href="/">The portfolio</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube d-flex align-items-center justify-content-center p-3">
						<a href="/" class="hvr-back-pulse">
							ABOUT ME
							<div class="">
								<i class="fas fa-user-circle fa-2x hvr-back-pulse"></i>
							</div>
						</a>
					</div>
					<div class="col-sm-6 col-md-4 p-0 cube colorcube d-none d-sm-block">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 cube introcube d-flex align-items-center text-left p-3">
						Hello! <br />
						I am Anna Yasyreva and this is my portfolio website
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube photocube d-flex align-items-center justify-content-center p-3">
						<a href="/">
							<div class="">
								<i class="fas fa-camera-retro fa-2x hvr-buzz-out"></i>
							</div>
							My Photos
						</a>
					</div>
					<div class="col-sm-6 col-md-4 p-0 cube d-none d-sm-block">
						<canvas id="bgCanvas" class="w-100 h-100"></canvas>
					</div>
					<div class="col-md-4 p-0 cube colorcube d-none d-md-block">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube contactcube d-flex align-items-center justify-content-around p-3">
						<a href="/">
							<div class="">
								<i class="fas fa-paper-plane fa-2x hvr-bob"></i>
							</div>
							Contacts
						</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube socialcube d-flex flex-column justify-content-around p-3">
						<div>Social networks</div>
						<div class="d-flex justify-content-between flex-row">
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
@endsection
