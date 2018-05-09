@extends('layouts.app')

@section('content')
<div id="create-game" class="content-middle col-md-4">
	<form action="{{ route('games.store') }}" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<label>Adventure Title</label>
			<input type="text" name="title" class="form-control" placeholder="Give it some epic name!">
		</div>

		<div class="form-group">
			<label>Some description</label>
			<textarea type="description" name="description" class="form-control" placeholder="Add some background to your adventure ;)" rows="5" style="resize: none"></textarea>
		</div>

		<div class="text-right">
			<button class="btn btn-primary">Next &rarr;</button>
		</div>
	</form>
</div>
@endsection