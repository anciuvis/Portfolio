@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')

	@Auth

		@component('components/create', [
			'name'	=> 'Add Photo',
			'route'		=> 'photos.create',
			'users'  => ['admin']
		])
		@endcomponent

		@component('components/create', [
			'name'	=> 'Create Tag',
			'route'		=> 'tags.create',
			'users'  => ['admin']
		])
		@endcomponent

		</div>
			<div class="container">
				<section>
					<div class="row justify-content-center ml-0">

							@foreach($photos as $photo)
								@component('components/card', [
								'photo'		=> $photo,
								'single' 	=> FALSE,
								])
								@endcomponent
							@endforeach

					</div>
				</section>
			</div>
		@else
		<div class="container w-75">
			<div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel" >
			  <div class="carousel-inner">

					@foreach($photos as $photo)
				    <div class="carousel-item @if ($loop->first) active @endif captiongradient" style="height: 500px; width:775px;">
				      <img class="d-block h-100 mx-auto" src="{{ $photo->img_url }}" alt="{{ $photo->title }}">
							<div class="carousel-caption d-none d-md-flex flex-column justify-content-center captiongradient">
								<h5 class="mb-0">{{ $photo->title }}</h5>
								<p class="mb-0">{{ $photo->description }}</p>
							</div>
				    </div>
					@endforeach

			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function carouselNormalization() {
				var items = $('#carouselExampleControls .carousel-item'), //grab all slides
					heights = [], //create empty array to store height values
					tallest; //create variable to make note of the tallest slide

				if (items.length) {
					function normalizeHeights() {
							items.each(function() { //add heights to array
									heights.push($(this).height());
							});
							tallest = Math.max.apply(null, heights); //cache largest value
							items.each(function() {
									$(this).css('min-height',tallest + 'px');
							});
					};
				normalizeHeights();

				$(window).on('resize orientationchange', function () {
						tallest = 0, heights.length = 0; //reset vars
						items.each(function() {
								$(this).css('min-height','0'); //reset min-height
						});
						normalizeHeights(); //run it again
				});
				}
			}
		</script>
	@endif

@endsection
