@extends('layouts.app')
@section('content')

	<div class="container">
		<section>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Tag</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
						@foreach($tags as $tag)
						<tr>
							<td>
								{{ $tag->title }}
							</td>
							<td>
								@component('components/edit', [
								'id' 		=> $tag->id,
								'name'	=> 'Edit',
								'route'		=> 'tags.edit',
								'users'  => ['admin']
								])
								@endcomponent
							</td>
							<td>
								@component('components/delete', [
								'id' 		=> $tag->id,
								'name'	=> 'Delete',
								'route'		=> 'tags.destroy',
								'users'  => ['admin']
								])
								@endcomponent
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
		</section>
	</div>
@endsection
