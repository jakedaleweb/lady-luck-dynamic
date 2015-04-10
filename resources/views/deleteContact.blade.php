@extends('app')

@section('content')
		<h2>Are you sure you want to delete {{$contact->description}}?</h2>
		<a href="/delete/contact/{{$contact->id}}?deleteProduct=true">Yes</a>
		<a href="/home">No</a>
@endsection