@extends('app')

@section('content')
	<div id="contentContainer">
	<h1>Edit</h1>
	<h3>{{$location->name}}</h3>
		<form method="post">
			<p>
				<label for="name">name</label>
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{$location->name}}">
			</p>
			<p>
				<label for="description">description</label>
			</p>
			<p>
				<textarea id="description" name="description">{{$location->description}}</textarea>
			</p>
			<p>
				<label for="lat">lattitude</label>
			</p>
			<p>
				<input type="text" id="lat" name="lat" value="{{$location->lat}}">
			</p>
			<p>
				<label for="lng">longitude</label>
			</p>
			<p>
				<input type="text" id="lng" name="lng" value="{{$location->lng}}">
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="edit" value="edit">
			</p>
		</form>
	</div>
@endsection