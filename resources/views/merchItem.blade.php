@extends('app')

@section('content')
	<div class="cf">
		<div class="indivItem">
			<h3>{{$item->name}}</h3>
			<img src="http://placehold.it/120x120">
			<p>{{$item->description}}</p>
			<h4>${{number_format($item->price, 2)}}</h4>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/burger.js"></script>
@endsection