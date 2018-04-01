@extends('layouts.app')
@section('content')
	<div class="container w-75">
		<div class="mb-3">
			<a href="/"><button class="btn btn-warning">Back</button></a>
		</div>
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
				@if($errors->has('image_url'))
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
			<button type="submit" class="btn btn-primary">Create Photo</button>
		</form>
	</div>
@endsection
