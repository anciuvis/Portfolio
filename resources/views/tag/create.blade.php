@extends('layouts.app')
@section('content')
<div class="d-block mx-2 mb-2 w-100">
	<a href="{{ route('tags.index') }}"><button class="btn btn-dark">Back</button></a>
</div>
	<div class="container w-75">
		<h2 class="text-center">Create Tag</h2>
		<form action="{{ route('tags.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
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
				<button type="submit" class="btn btn-primary">Add Tag</button>
		</form>
	</div>
	<!-- Scripts -->
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
@endsection
