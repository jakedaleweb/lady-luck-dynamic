@extends('app')

@section('content')
	<div id="contentContainer">
	<h1>Edit</h1>
	<h3>{{$product->name}}</h3>
		<form method="post" enctype="multipart/form-data">
			<p>
				<label for="name">name</label>
				{!!$errors->first('name', '<span>:message</span>')!!}	
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{$product->name}}">
			</p>
			<p>
				<label for="description">description</label>
				{!!$errors->first('description', '<span>:message</span>')!!}	
			</p>
			<p>
				<textarea id="description" name="description">{{$product->description}}</textarea>
			</p>
			<p>
				<label for="price">price</label>
				{!!$errors->first('price', '<span>:message</span>')!!}	
			</p>
			<p>
				<input type="text" id="price" name="price" value="{{$product->price}}">
			</p>
			@if(isset($product->type))
				<p>
					<label for="type">type</label>
					{!!$errors->first('type', '<span>:message</span>')!!}	
				</p>
				<p>
					<select name="type" id="type">
						<option {!! $product->type == 'hot' ? 'selected="selected"' : '' !!} value="hot">Hot</option>	
						<option {!! $product->type == 'cold' ? 'selected="selected"' : '' !!} value="cold">Cold</option>	
						<option {!! $product->type == 'drink' ? 'selected="selected"' : '' !!} value="drink">Drink</option>		
					</select>
				</p>
			@endif
			<p>
				<label for="image">Image</label>
			</p>
			<img src='{{asset("/img/$product->img")}}'>
			<input type="hidden" name="oldimg" value="{{$product->img}}"/>
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