<div id="add-enemy" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title">Add enemy</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<div class="modal-body">
				<form class="form-horizontal">
					
					<div class="form-group row">
						<label class="col-sm-4 control-label">Enemy's name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" ng-model="enemy.name" placeholder="Your enemy's name">
						</div>
					</div>
							
					<div class="form-group row">
						<label class="col-sm-4 control-label">HP</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" ng-model="enemy.health" placeholder="Health">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 text-right">Sex</label>
						<div class="row col-sm-8">
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="sex" ng-model="enemy.sex" value="true"> Masc.
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="sex" ng-model="enemy.sex" value="false"> Fem.
								</label>
							</div>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 control-label">Race</label>
						<div class="col-sm-6">
							<select name="race" ng-model="enemy.race" class="form-control" ng-options="race as race.name for race in races">
								<option value="" disabled selected>-Select race-</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 control-label">Class</label>
						<div class="col-sm-6">
							<select name="class" ng-model="enemy.class" class="form-control" ng-options="class as class.name for class in classes">
								<option value="" disabled selected>-Select class-</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 control-label">CA</label>
						<div class="col-sm-6">
							<select name="armor" ng-model="enemy.armor" class="form-control" ng-options="armor as armor.name for armor in armors">
								<option value="" disabled selected>-Select armor-</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-6 row">
							<label class="col-sm-6 control-label">PG</label>
							<div class="col-sm-6">
								<input type="number" ng-model="enemy.pg" class="form-control">
							</div>
						</div>
						<div class="col-6 row">
							<label class="col-sm-6 control-label">Base Attack</label>
							<div class="col-sm-6">
								<input type="number" ng-model="enemy.base_attack" class="form-control">
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<h6 class="col-12 lead">Salvations</h6>

						<div class="col-4 form-group row">
							<label class="control-label col-sm-6">Will</label>
							<div class="col-sm-6">
								<input type="text" class="form-control">
							</div>
						</div>

						<div class="col-4 form-group row">
							<label class="control-label col-sm-6">Strength</label>
							<div class="col-sm-6">
								<input type="text" class="form-control">
							</div>
						</div>						

						<div class="col-4 form-group row">
							<label class="control-label col-sm-6">Agility</label>
							<div class="col-sm-6">
								<input type="text" class="form-control">
							</div>
						</div>						
					</div> -->

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn" ng-class="{ 'btn-success': enemy.isUpdate, 'btn-primary': !enemy.isUpdate }" data-dismiss="modal" ng-click="saveEnemy()">@{{ enemy.isUpdate ? 'Save' : 'Add' }}</button>
			</div>
		</div>
	</div>
</div>