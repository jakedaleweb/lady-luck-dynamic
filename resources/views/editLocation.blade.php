@extends('app')

@section('content')
	<div id="contentContainer">
	<h1>Edit</h1>
	<h3>{{$location->name}}</h3>
		<form method="post" enctype="multipart/form-data">
			<p>
				<label for="name">name</label>
				{!!$errors->first('name', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{$location->name}}">
			</p>
			<p>
				<label for="description">description</label>
				{!!$errors->first('description', '<span>:message</span>')!!}
			</p>
			<p>
				<textarea id="description" name="description">{{$location->description}}</textarea>
			</p>
			<p>
				<label for="lat">lattitude</label>
				{!!$errors->first('lat', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="text" id="lat" name="lat" value="{{$location->lat}}">
			</p>
			<p>
				<label for="lng">longitude</label>
				{!!$errors->first('lng', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="text" id="lng" name="lng" value="{{$location->lng}}">
			</p>
			<p>
				<label for="image">Image</label>
			</p>
			<img src='{{asset("/img/$location->img")}}'>
			<h6>For best results use a square image</h6>
			<p>
				<input type="file" name="image" id="image">
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="edit" value="edit">
			</p>
		</form>
	</div>
@endsection