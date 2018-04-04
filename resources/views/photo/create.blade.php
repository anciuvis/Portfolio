@extends('layouts.app')
@section('content')
<div class="d-block mx-3 mb-2 w-100">
	<a href="{{ route('photos.index') }}"><button class="btn btn-dark">Back</button></a>
</div>
	<div class="container w-75">
		<h2 class="text-center">Create Photo form</h2>
		<form action="{{ route('photos.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="px-3" for="title">Title: </label>
				<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title') }}">
				@if($errors->has('title'))
				<div class="invalid-feedback px-3">
					{{ $errors->first('title') }}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label class="px-3" for="img_url">Image: </label>
				<input name="img_url" type="file" class="form-control px-3 @if($errors->has('img_url')) is-invalid @endif" id="img_url" placeholder="Enter image source" value="{{ old('img_url') }}">
				@if($errors->has('img_url'))
				<div class="invalid-feedback px-3">
					{{ $errors->first('img_url') }}
				</div>
				@endif
			</div>
			<div class="form-group">
				<label class="px-3" for="description">Description</label>
				<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
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
			<button type="submit" class="btn btn-primary">Create Photo</button>
		</form>
	</div>
	<!-- Scripts -->
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="{{ asset('js/tagsinput.js') }}"></script>
@endsection
