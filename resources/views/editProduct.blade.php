@extends('app')

@section('content')
	<div id="contentContainer">
	<h1>Edit</h1>
	<h3>{{$product->name}}</h3>
		<form method="post" action="edit">
			<p>
				<label for="name">name</label>
			</p>
			<p>
				<input type="text" id="name" name="name" value="{{$product->name}}">
			</p>
			<p>
				<label for="description">description</label>
			</p>
			<p>
				<textarea id="description">{{$product->description}}</textarea>
			</p>
			<p>
				<label for="price">price</label>
			</p>
			<p>
				<input type="text" id="price" name="price" value="{{$product->price}}">
			</p>
			@if(isset($product->type))
			<p>
				<label for="type">type</label>
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
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="submit" name="edit" value="edit">
			</p>
		</form>
	</div>
@endsection