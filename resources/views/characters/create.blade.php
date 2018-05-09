@extends('layouts.app')

@section('content')
	<h3 class="page-header">
		<span>Create your adventurer<small>(Choose wisely.)</small></span>
		<button form="create-character" type="submit" class="btn btn-success" style="margin-left: 2em">Done!</button>		
	</h3>
	
	<section class="col-8" style="margin-top: 1em">
		
		<form id="create-character" class="form-horizontal" action="{{ route('characters.store') }}" method="POST">
			@csrf
			<input type="hidden" name="game" value="{{ $game }}">

			<div class="form-group row">
				<label class="col-sm-4 control-label">Character's name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" placeholder="Your Character's name">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">HP</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" name="health" placeholder="Health">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 text-right">Sex</label>
				<div class="row col-sm-8">
					<div class="col-sm-4">
						<label class="radio-inline">
							<input type="radio" name="sex" name="sex" value="true"> Masc.
						</label>
					</div>
					<div class="col-sm-4">
						<label class="radio-inline">
							<input type="radio" name="sex" name="sex" value="false"> Fem.
						</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">Race</label>
				<div class="col-sm-6">
					<select name="race" name="race" class="form-control">
						<option value="" disabled selected>-Select race-</option>
						@foreach($races as $race)
							<option value="{{ $race->id }}">{{ $race->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">Class</label>
				<div class="col-sm-6">
					<select name="class" name="class" class="form-control">
						<option value="" disabled selected>-Select class-</option>
						@foreach($classes as $class)
							<option value="{{ $class->id }}">{{ $class->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">CA</label>
				<div class="col-sm-6">
					<select name="armor" name="Character.armor" class="form-control" name="armor">
						<option value="" disabled selected>-Select armor-</option>
						@foreach($armors as $armor)
							<option value="{{ $armor->id }}">{{ $armor->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">PG</label>
				<div class="col-sm-4">
					<input type="number" name="pg" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 control-label">Base Attack</label>
				<div class="col-sm-4">
					<input type="number" name="base_attack" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<h6 class="col-12 lead">Salvations</h6>

				<div class="col-4 form-group row">
					<label class="control-label col-sm-6">Will</label>
					<div class="col-sm-6">
						<input type="text" name="will" class="form-control">
					</div>
				</div>

				<div class="col-4 form-group row">
					<label class="control-label col-sm-6">Strength</label>
					<div class="col-sm-6">
						<input type="text" name="strength" class="form-control">
					</div>
				</div>

				<div class="col-4 form-group row">
					<label class="control-label col-sm-6">Agility</label>
					<div class="col-sm-6">
						<input type="text" name="agility" class="form-control">
					</div>
				</div>
			</div>
		</form>
	</section>
@endsection
