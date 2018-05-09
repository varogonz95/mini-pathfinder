var app = angular.module('App', [])

app.controller('PlotsController', ($scope, PlotService, EnemyService, ClassService, RaceService, ArmorService) => {
	$scope.plots = PlotService.get()
	$scope.enemies = EnemyService.get()

	$scope.enemy = {}

	ClassService.fetch().then(response => $scope.classes = response.data)
	RaceService.fetch().then(response => $scope.races = response.data)
	ArmorService.fetch().then(response => $scope.armors = response.data)

	$scope.plotTypeChanged = (plot) => {
		if (plot.isDialog) plot.options.push({})
		else plot.options.splice(0, 1)
		console.log(plot);
	}

	$scope.addOption = (plot) => {
		plot.options.push({})
	}

	$scope.removeOption = (plot, index) => {
		plot.options.splice(index, 1)
	}

	$scope.removePlot = (index) => {
		$scope.plots.splice(index, 1)
		console.log(PlotService.get());
	}

	$scope.saveEnemy = () => {
		if ($scope.enemy.isUpdate) $scope.enemies[$scope.enemy.$index] = angular.copy($scope.enemy)
		else EnemyService.push(angular.copy($scope.enemy))
		$scope.enemy = {}
	}

	$scope.showEnemy = (index) => {
		$scope.enemy = $scope.enemies[index]
		$scope.enemy.$index = index
		$scope.enemy.isUpdate = true
	}

	$scope.removeEnemy = (index) => {
		$scope.enemies.splice(index, 1)
	}

	PlotService.push()
	$('#add-enemy').on('hidden.bs.modal', e => $scope.enemy = {})
})

app.controller('NavbarController', ($scope, PlotService) => {

	$scope.plots = PlotService.get()

	$scope.addPlot = () => {
		PlotService.push()
	}

	$scope.createPlots = (game) => {
		PlotService.submit(game)
	}
})

app.service('PlotService', function($http, $location, EnemyService)  {
	var plots = []

	this.get = () => plots

	this.fetch = () => {}

	this.submit = (game) => {
		$http.post(
			`${$location.protocol()}://${$location.host()}:${$location.port()}/games/${game}/plots`,
			{
				plots: plots,
				game_id: game,
				enemies: EnemyService.get(),
			}
		)
		.then(response => {
			if (response.data.status) window.location.replace('/home')
		})
	}

	this.push = () => {
		plots.push({
			name: null,
			description: '',
			next: null,
			isDialog: false,
			options: [],
			$hash: '[plot_object]#' + (plots.length + 1)
		})
	}
})

app.service('EnemyService', function($http, $location, ClassService, RaceService, ArmorService)  {
	var enemies = []

	this.get = () => enemies

	this.fetch = (game) => {
		// return $http.get(`${$location.protocol()}://${$location.host()}:${$location.port()}/games/`)
	}

	this.push = (enemy) => {
		enemy.$hash = '[plot_object]#' + (enemies.length + 1)
		enemies.push(enemy)
	}
})

app.service('ClassService', function ($http, $location) {

	var classs = []

	this.get = () => classes

	this.fetch = () => {
		return $http.get(`${$location.protocol()}://${$location.host()}:${$location.port()}/classes`)
	}

	this.set = (data) => { classes = data }
})

app.service('RaceService', function ($http, $location) {

	var races = []

	this.get = () => races

	this.fetch = () => {
		return $http.get(`${$location.protocol()}://${$location.host()}:${$location.port()}/races`)
	}

	this.set = (data) => { races = data }
})

app.service('ArmorService', function ($http, $location) {

	var armors = []

	this.get = () => armors

	this.fetch = () => {
		return $http.get(`${$location.protocol()}://${$location.host()}:${$location.port()}/armors`)
	}

	this.set = (data) => { armors = data }
})
