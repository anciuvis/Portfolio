@if(Auth::check() && in_array(Auth::user()->role, $users))
<a href="{{ route($route) }}" class="btn btn-outline-secondary" name="create">{{ $name }}</a>
@endif
