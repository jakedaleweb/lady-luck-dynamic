@extends('app')

@section('content')
		<h2>Are you sure you want to delete {{$product->name}}?</h2>
		<a href="/delete/menu/{{$product->id}}?deleteProduct=true">Yes</a>
		<a href="/home">No</a>
@endsection