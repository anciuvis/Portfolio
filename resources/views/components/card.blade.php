<div class="col-md-12 col-lg-4 mb-3">
	<ul class="list-group ">
		<li class="list-group-item list-group-item-dark">{{ $photo->title }}</li>
		<li class="list-group-item">

				<img style="max-height: 170px;" src="@if ($single){{'../'}}@endif{{ $photo->img_url }}" class="mx-auto img-fluid my-1 d-block" alt="picture" />

		</li>
		<li class="list-group-item" style="height: 90px;">
			@if ($single) {{ $photo->description }} @else {{ str_limit($photo->description, 90) }} @endif
		</li>
		<li class="list-group-item">
			@foreach($photo->tags as $tag)
				@if ($loop->first)
				<a href="{{ route('tags.show', $tag->id)}}">
					<span class="bagde badge-pill badge-secondary">{{ $tag->title }}</span>
				</a>
				@else
				, <a href="{{ route('tags.show', $tag->id)}}">
					<span class="bagde badge-pill badge-secondary">{{ $tag->title }}</span>
				</a>
				@endif
			@endforeach
		</li>
	</ul>
	<div class="d-flex">
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
	</div>
</div>
