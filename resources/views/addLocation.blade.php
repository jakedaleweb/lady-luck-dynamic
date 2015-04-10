@extends('app')

@section('content')
	<div id="contentContainer">
		<h1>Add a Location</h1>
		<form method="post" enctype="multipart/form-data">
			<p>
				<label for="name">name</label>
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{\Input::old('name')}}">
			</p>
			<p>
				<label for="description">description</label>
			</p>
			<p>
				<textarea id="description" name="description">{{\Input::old('description')}}</textarea>
			</p>
			<p>
				<label for="lat">lattitude</label>
			</p>
			<p>
				<input type="text" id="lat" name="lat" value="{{\Input::old('lat')}}">
			</p>
			<p>
				<label for="lng">longitude</label>
			</p>
			<p>
				<input type="text" id="lng" name="lng" value="{{\Input::old('lng')}}">
			</p>
			<p>
				<label for="image">Image</label>
			</p>
			<p>	
				<span>For best results use a square image</span>
			</p>
			<p>
				<input type="file" name="image" id="image"></p>
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="add" value="add">
			</p>
		</form>
	</div>
@endsection