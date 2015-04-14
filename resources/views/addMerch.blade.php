@extends('app')

@section('content')
	<div id="contentContainer">
		<h1>Add a merch item</h1>
		<form method="post" enctype="multipart/form-data">
			<p>
				<label for="name">name</label>
				{!!$errors->first('name', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{\Input::old('name')}}">
			</p>
			<p>
				<label for="description">description</label>
				{!!$errors->first('description', '<span>:message</span>')!!}
			</p>
			<p>
				<textarea id="description" name="description">{{\Input::old('description')}}</textarea>
			</p>
			<p>
				<label for="price">price</label>
				{!!$errors->first('price', '<span>:message</span>')!!}
			</p>
			<p>
				<input type="text" id="price" name="price" value="{{\Input::old('price')}}">
			</p>
			<p>
				<label for="image">Image</label>
			</p>
			<h6>For best results use a square image</h6>
			<p>
				<input type="file" name="image" id="image">
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			</p>
			<p>
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="add" value="add">
			</p>
		</form>
	</div>
@endsection