@extends('layouts.app')

@section('content')

<div class="col-8">
	
	<h4 class="page-header">{{ $plot->name }}</h4>

	<p class="dashed-message" style="margin-top: 2em">
		{{ $plot->description }}
	</p>

	<div class="options justify-content-between" style="display: flex; margin-top: 5em">
		@forelse($plot->options as $option)
			<a href="" class="btn btn-outline-secondary">{{ $option->name }}</a>
		@empty
			<a href="" class="btn btn-outline-secondary">Next</a>
		@endforelse
	</div>

</div>

@endsection