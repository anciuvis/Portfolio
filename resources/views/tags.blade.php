@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, tastas lygu slashui -->
@section('content')

	@Auth

	<!-- VIEW FOR ADMINISTRATOR -->

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
							@foreach($tags as $tag)

							@endforeach
					</div>
				</section>
			</div>
		@else
@endsection
