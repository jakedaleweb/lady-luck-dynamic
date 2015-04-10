@extends('app')

@section('content')
		<h2>Are you sure you want to delete {{$product->name}}?</h2>
		@if(isset($product->type))
			<a href="/delete/menu/{{$product->id}}?deleteProduct=true">Yes</a>
		@else
			<a href="/delete/merch/{{$product->id}}?deleteProduct=true">Yes</a>
		@endif
		
		<a href="/home">No</a>
@endsection