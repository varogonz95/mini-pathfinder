<form id="start-game" action="{{ route('games.start') }}" method="POST">
	@csrf
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Made by</th>
				<th>Name</th>
				<th>Created at</th>
			</tr>
		</thead>
	
		<tbody>
			@foreach($games as $game)
				<tr>
					<td>
						<input type="radio" name="game" value="{{ $game->id }}">
					</td>
					<td>{{ $game->user->name }}</td>
					<td>{{ $game->title }}</td>
					<td>{{ $game->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</form>