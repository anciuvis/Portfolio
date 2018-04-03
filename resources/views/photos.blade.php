@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')

	@Auth

	<!-- VIEW FOR ADMINISTRATOR -->

		</div>
			<div class="container">
				<section>
					<div class="row justify-content-center ml-0">
							@foreach($photos as $photo)
								@component('components/card', [
								'photo'		=> $photo,
								'photos_tags' => $photos_tags,
								'single' 	=> FALSE,
								])
								@endcomponent
							@endforeach
					</div>
				</section>
			</div>

	@else

		<!-- VIEW FOR THE GUESTS -->

		<div class="container w-100 d-flex justify-content-center flex-column">
			<div class="d-flex flex-row justify-content-between">
				<a href="{{ route('home') }}" class="btn btn-outline-dark p-3 my-2">&#8920; Back</a>
				<h1 class="my-auto ml-auto">Photos</h1>
			</div>
			<div id="carouselExampleControls" class="carousel slide w-100 mt-3 mt-md-0 mx-auto" data-ride="carousel" data-pause="hover">
			  <div class="carousel-inner mx-auto">
					@foreach($photos as $photo)
				    <div class="carousel-item @if ($loop->first) active @endif captiongradient my-auto">
				      <img class="d-block mx-auto my-auto" src="{{ $photo->img_url }}" alt="{{ $photo->title }}">
							<div class="carousel-caption d-flex flex-column justify-content-center captiongradient mx-auto">
								<h5 class="mb-2">{{ $photo->title }}</h5>
								<p class="mb-2">{{ $photo->description }}</p>
								<h6 class="mb-2 tags">
									@foreach($photos_tags[$photo->id] as $tag)
										@if ($loop->first)
											<span class="bagde badge-pill badge-secondary">#{{ $tag[0]->title }}</span>
										@else
											, <span class="bagde badge-pill badge-secondary">#{{ $tag[0]->title }}</span>
										@endif
								@endforeach
							</h6>
							</div>
				    </div>
					@endforeach
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
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
