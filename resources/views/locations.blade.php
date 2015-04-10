@extends('app')

@section('content')
	<div id="contentContainer" class="cf">
		<div id="map-canvas"></div>
		@foreach($stores as $store)
			<div class="contentItem">
				<h3>{{$store->name}}</h3>
				<img src='{{ asset("/img/$store->img")}}' alt="lady luck location">
				<p>{{$store->description}}</p>
				@if(Auth::check()) 
					<a href="/edit/location/{{$store->id}}">edit |</a>
					<a href="/delete/location/{{$store->id}}">| delete</a>
				@endif
			</div>
		@endforeach
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="js/maps.js"></script>
@endsection