@if (Route::has('login'))
	@auth
		<div class="d-block w-100 px-3 mb-2" style="background-color: rgb(218, 218, 218);">
			<a class="btn btn-dark" href="{{ url('/home') }}">Home</a>
			<a class="btn btn-dark" href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>

			@component('components/create', [
				'name'	=> 'Add Photo',
				'route'		=> 'photos.create',
				'users'  => ['admin']
			])
			@endcomponent

			@component('components/create', [
				'name'	=> 'Create Tag',
				'route'		=> 'tags.create',
				'users'  => ['admin']
			])
			@endcomponent

			<a href="{{ route('photos.index') }}" class="btn btn-outline-secondary" name="photolist">Photo List</a>
			<a href="{{ route('tags.index') }}" class="btn btn-outline-secondary" name="taglist">Tag List</a>
		</div>
	@endauth
@endif
