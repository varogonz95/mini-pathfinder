@extends('layouts.app')

@push('scripts-top')
	<script src="{{ asset('app/app.js') }}"></script>
@endpush

@section('content')
<section id="create-plots" class="col-md-12" ng-controller="PlotsController">

	@include('characters.add-enemy')

	<div class="row no-gutters">
		<div class="row col-8">
			<div class="col-6" ng-repeat="plot in plots" style="margin-bottom: 2em">
				<div class="form-group">
					<div class="justify-content-between">
						<label>Plot #@{{ $index + 1 }}</label>
						<button class="close" title="remove this plot" ng-hide="$index === 0" ng-click="removePlot($index)">&times;</button>
					</div>
					<input type="text" name="title" class="form-control" placeholder="What's the plot?" ng-model="plot.name" required>
				</div>
			
				<div class="form-group">
					<label>Some description</label>
					<textarea type="description" name="description" class="form-control" placeholder="Be creative!" rows="5" style="resize: none"
					 ng-model="plot.description"></textarea>
				</div>
			
				<div class="col-sm-12" style="display: flex; justify-content: space-between; margin-bottom: .5em">
					<div class="checkbox">
						<label><input type="checkbox" ng-model="plot.isDialog" ng-change="plotTypeChanged(plot)"> Conversation </label>
					</div>
					<button class="btn btn-sm btn-outline-primary" ng-click="addOption(plot)" ng-show="plot.isDialog">Add option</button>
				</div>
			
				<div class="form-group" ng-if="!plot.isDialog">
					<label>Next plot...</label>
					<select class="form-control" ng-model="plot.next" ng-options="plotOpt as plotOpt.name for plotOpt in plots">
						<option value="" selected disabled>-Choose a plot-</option>
					</select>
				</div>
			
				<div class="row" ng-if="plot.isDialog">
					<div class="col-6" ng-repeat="option in plot.options">
						<div class="form-group">
							<label>Option #@{{ $index + 1 }} label </label>
							<button class="close" title="Remove option" ng-click="removeOption(plot, $index)" ng-hide="$index === 0">&times;</button>
							<input type="text" class="form-control" ng-model="option.name">
						</div>
			
						<div class="form-group">
							<label>Action</label>
							<select class="form-control" ng-model="option.type">
								<option value="" selected disabled>-Choose an action-</option>
								<option value="next">To plot...</option>
								<option value="fight">Enemy fight</option>
							</select>
						</div>
			
						<div class="form-group" ng-if="option.type === 'next'">
							<label>Plot...</label>
							<select class="form-control" ng-model="option.next" ng-options="plotOpt as plotOpt.name for plotOpt in plots">
								<option value="" selected disabled>-Choose a plot-</option>
							</select>
						</div>
	
						<div ng-if="option.type === 'fight'">
							<div class="form-group">
								<label>Fight against...</label>
								<select class="form-control" ng-model="option.enemy" ng-options="enemy as enemy.name for enemy in enemies">
									<option value="" selected disabled>-Choose an enemy-</option>
								</select>
							</div>
	
							<div class="form-group">
								<label>If wins...</label>
								<select class="form-control" ng-model="option.wins" ng-options="plotOpt as plotOpt.name for plotOpt in plots">
									<option value="" selected disabled>-Go-to if wins...-</option>
								</select>
							</div>
	
							<div class="form-group">
								<label>If loses...</label>
								<select class="form-control" ng-model="option.loses" ng-options="plotOpt as plotOpt.name for plotOpt in plots">
									<option value="" selected disabled>-Go-to if loses...-</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-4">
			<div class="col-12">
				<h3 class="lead">
					<div class="justify-content-between" style="display: flex;">
						<span>Enemies</span>
						<button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#add-enemy">Add enemy</button>
					</div>
				</h3>
				<p class="dashed-message text-center" ng-hide="enemies.length > 0">
					No enemies added, yet. <br>
					C'mon, put some challange!
				</p>
				<ul class="list-group" ng-show="enemies.length > 0">
					<li class="list-group-item justify-content-between" style="display: flex" ng-repeat="enemy in enemies">
						<span>
							@{{ enemy.name }}
							<small>@{{ enemy.race.name + ',' + enemy.class.name }}</small>
						</span>
						<div class="text-right">
							<button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#add-enemy" ng-click="showEnemy($index)">info</button>
							<button class="btn btn-sm btn-outline-danger" ng-click="removeEnemy($index)">remove</button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection