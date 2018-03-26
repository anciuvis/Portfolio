@extends('layouts.app')

@section('content')

		<div class="wrapper">
			<div class="content-wrapper p-3">
				<section class="cubes row m-0">
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube d-flex align-items-center justify-content-center">
						<a href="/">Anya's portfolio</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube d-flex align-items-center justify-content-center">
						About me
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube colorcube d-flex align-items-center justify-content-center">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube d-flex align-items-center justify-content-center">
						Intro
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube photocube d-flex align-items-center justify-content-center">
						My Photos
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube d-flex align-items-center justify-content-center">
						<canvas id="bgCanvas" class="w-100 h-100"></canvas>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube colorcube d-flex align-items-center justify-content-center">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube contactcube d-flex align-items-center justify-content-center">
						Contacts
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 p-0 cube d-flex align-items-center justify-content-center">
						Social networks
					</div>
				</section>
			</div>
		</div>
@endsection
