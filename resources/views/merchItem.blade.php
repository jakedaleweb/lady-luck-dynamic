@extends('app')

@section('content')
	<div class="cf">
		<div class="indivItem">
			<h3>{{$item->name}}</h3>
			<img src="http://placehold.it/120x120">
			<p>{{$item->description}}<br/>Available for purchase in store.</p>
			<h4>${{number_format($item->price, 2)}}</h4>
		</div>
	</div>
@endsection