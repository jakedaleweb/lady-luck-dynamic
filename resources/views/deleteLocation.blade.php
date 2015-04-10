@extends('app')

@section('content')
		<h2>Are you sure you want to delete {{$location->name}}?</h2>
		<a href="/delete/location/{{$location->id}}?deleteProduct=true">Yes</a>
		<a href="/home">No</a>
@endsection