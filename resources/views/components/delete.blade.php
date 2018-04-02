@if(Auth::check() && in_array(Auth::user()->role, $users))
<form class="d-inline-block" action="{{ route($route, $id) }}" method="POST">
	@csrf
	@method('DELETE')
	<input type="hidden" name="id" value="{{ $id }}">
	<button class="btn btn-outline-danger w-50">{{ $name }}</button>
</form>
@endif
