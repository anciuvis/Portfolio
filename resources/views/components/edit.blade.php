@if(Auth::check() && in_array(Auth::user()->role, $users))
<a href="{{ route($route, $id) }}" class="btn btn-outline-warning w-50" name="edit">{{ $name }}</a>
@endif
