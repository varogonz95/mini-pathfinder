@extends('layouts.app') 

@section('content')
	<div class="col-md-6">
	<div class="card">
		<div class="card-header">Create game</div>
	
		<div class="card-body">
			You can either play a game or make a new one.
			Give challange to your friends and have <strong>FUN</strong>!
		</div>
	
		<div class="card-footer">
			<div class="text-right">
				<a class="btn btn-sm btn-primary" href="{{ route('games.create') }}">Make game</a>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">Start new game</div>
	
			<div class="card-body">
				@include('games.index')
			</div>
	
			<div class="card-footer">
				<div class="text-right">
					<button form="start-game" type="submit" class="btn btn-sm btn-primary">Start</button>
				</div>
			</div>
		</div>
	</div>
	{{-- IF USER HAS STARTED A GAME ALREADY, THEN SHOW A "CONTINUE GAME" CARD @if
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">Start new game</div>
	
			<div class="card-body"></div>
		</div>
	</div>
	@endif --}}
@endsection