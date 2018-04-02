@if (Route::has('login'))
	@auth
		<div class="d-block w-100 px-2 mb-2" style="background-color: rgb(218, 218, 218);">
			<a class="btn btn-dark" href="{{ url('/home') }}">Home</a>
			<a class="btn btn-dark" href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
	@endauth
@endif
