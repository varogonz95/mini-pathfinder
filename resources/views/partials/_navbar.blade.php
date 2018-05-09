<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light navbar-laravel" ng-controller="NavbarController">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			{{ config('app.name') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				@switch(\Route::current()->getName())
					@case('plots.create')
						<li class="nav-item"><button class="btn btn-outline-primary" ng-click="addPlot()">Add plot</button></li>
						<li class="nav-item"><button class="btn btn-success" ng-click="createPlots({{ $game }})">Done!</button></li>
					@break
				@endswitch
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
			
				<li><a class="nav-link navbar-text" href="{{ route('home') }}">Home</a></li>
				
				<!-- Authentication Links -->
				@guest
				<li>
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				<li>
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@else

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
					 aria-expanded="false" v-pre>
						{{ Auth::user()->name }}
						<span class="caret"></span>
					</a>

					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							Logout
						</a>

						<a class="dropdown-item" href="{{ route('home') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							My Games
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>