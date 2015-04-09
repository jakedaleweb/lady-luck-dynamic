@extends('app')

@section('content')
	<div id="contentContainer" class="cf">
		<div id="map-canvas"></div>
		@foreach($stores as $store)
			<div class="contentItem">
				<h3>{{$store->name}}</h3>
				<img src="http://placehold.it/120x120">
				<p>{{$store->description}}</p>
			</div>
		@endforeach
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="js/maps.js"></script>
@endsection