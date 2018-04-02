@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, taskas lygu slashui -->
@section('content')
	<body>
		<div class="container w-75">
			<div class="mb-3">
				<a href="{{ route('photos.index') }}"><button class="btn btn-warning">Back</button></a>
			</div>
			<h2 class="text-center">Update Photo form</h2>
			<form action="{{ route('photos.update', $photo->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label class="px-3" for="title">Title: </label>
					<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title', $photo->title) }}">
					@if($errors->has('title'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('title') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="img_url">Image: </label>
					<input name="img_url" type="file" class="form-control px-3 @if($errors->has('img_url')) is-invalid @endif" id="img_url" placeholder="Enter image source" value="{{ old('img_url', $photo->img_url) }}">
					@if($errors->has('img_url'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('img_url') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="description">Description</label>
					<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="3" placeholder="Description">{{ old('description', $photo->description) }}</textarea>
					@if($errors->has('description'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('description') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3">Tags</label>
						@foreach($tags as $tag)
						<div class="form-check">
							<input name="tags[]" value="{{ $tag->id }}" type="checkbox" class="form-check-input" id="{{ $tag->id }}">
							<label class="form-check-label" for="{{ $tag->id }}">{{ $tag->title }}</label>
						</div>
						@endforeach
				</div>
				<button type="submit" class="btn btn-primary">Update info</button>
			</form>
			<div class="col-md-5 mt-2 mb-2">
				<img src="{{ $photo->img_url }}" width="350" alt="photo">
			</div>
		</div>
	</body>
@endsection
