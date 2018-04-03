@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center text-center my-3">
			<div class="col-md-12">
				<h1>Sorry! Page not found! :( {{ $exception->getMessage() }}</h1>
			</div>
			<div class="col-md-12">
				<a href="{{ route('home') }}" class="btn btn-dark btn-lg">Go back to homepage</a>
			</div>
		</div>
	</div>
@endsection
