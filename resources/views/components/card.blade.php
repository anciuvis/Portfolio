<ul class="list-group col-md-12 col-lg-4 mb-3">
	<li class="list-group-item list-group-item-success">{{ $photo->title }}</li>
	<li class="list-group-item">
		<a href="@if ($single){{'#'}}@else{{ route('photos.show', $photo->id) }}@endif">
			<img src="@if ($single){{'../'}}@endif{{ $photo->img_url }}" class="mx-auto img-responsive w-100 my-1" alt="picture"/>
		</a>
	</li>
	<li class="list-group-item" style="height: 90px;">
		@if ($single) {{ $photo->description }} @else {{ str_limit($photo->description, 90) }} @endif
	</li>
	@component('components/edit', [
		'id' 		=> $photo->id,
		'name'	=> 'Edit',
		'route'		=> 'photos.edit',
		'users'  => ['admin']
	])
	@endcomponent
	@component('components/delete', [
		'id' 		=> $photo->id,
		'name'	=> 'Delete',
		'route'		=> 'photos.destroy',
		'users'  => ['admin']
	])
	@endcomponent
</ul>
