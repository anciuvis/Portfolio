@extends('layouts.app')
@section('content')
	</div>
	<div class="container w-75">
		<a href="{{ route('tags.index') }}"><button class="btn btn-dark">Back</button></a>
		<h2 class="text-center">Update Tag</h2>
		<form action="{{ route('tags.update', $tag->id) }}" method="POST" class="needs-validation">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label class="px-3" for="title">Title: </label>
				<input name="title" type="text" class="form-control px-3 @if($errors->has('title')) is-invalid @endif" id="title" placeholder="Enter title" value="{{ old('title', $tag->title) }}">
				@if($errors->has('title'))
				<div class="invalid-feedback px-3">
					{{ $errors->first('title') }}
				</div>
				@endif
			</div>
				<button type="submit" class="btn btn-primary">Add Tag</button>
		</form>
	</div>
	<!-- Scripts -->
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
@endsection
