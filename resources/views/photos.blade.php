@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')
	<body>
		<div class="container">
			@component('components/create', [
				'name'	=> 'Create Photo',
				'route'		=> 'photos.create',
				'users'  => ['admin']
			])
			@endcomponent
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
	</body>
@endsection
