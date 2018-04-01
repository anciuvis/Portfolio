@extends('layouts.app') <!-- cia lygu layouts/app - kelias iki failo is esmes, taskas lygu slashui -->
@section('content')
	<body>
		<div class="container w-75">
			<div class="mb-3">
				<a href="{{ route('photos') }}"><button class="btn btn-warning">Back</button></a>
			</div>
			<h2 class="text-center">Update Dish form</h2>
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
					<input name="img_url" type="file" class="form-control px-3 @if($errors->has('img_url')) is-invalid @endif" id="img_url" placeholder="Enter image source" value="{{ old('image_url', $dish->image_url) }}">
					<div class="col-md-5 mt-2">
						<img src="{{ $dish->image_url }}" alt="photo">
					</div>
					@if($errors->has('image_url'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('image_url') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="price">Price: </label>
					<input name="price" type="number" step="0.01" class="form-control px-3 @if($errors->has('price')) is-invalid @endif" id="price" placeholder="Price"  value="{{ old('price', $dish->price) }}">
					@if($errors->has('price'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('price') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label class="px-3" for="description">Description</label>
					<textarea name="description" class="form-control @if($errors->has('description')) is-invalid @endif" id="description" rows="3" placeholder="Description">{{ old('description', $dish->description) }}</textarea>
					@if($errors->has('description'))
					<div class="invalid-feedback px-3">
						{{ $errors->first('description') }}
					</div>
					@endif
				</div>
				<button type="submit" class="btn btn-primary">Update Dish information</button>
			</form>
			<div class="col-md-5 mt-2 mb-2">
				<img src="{{ $dish->image_url }}" width="350" alt="photo">
			</div>
			<a href="{{ route('dishes.download', $dish->id) }}" class="btn btn-success">Download</a>
		</div>
	</body>
@endsection
