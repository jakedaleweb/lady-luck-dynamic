@extends('app')

@section('content')
	<div id="linkContainer">
		<a class="menuSelect" href="/menu/hot">Hot</a>
		<a class="menuSelect" href="/menu/cold">Cold</a>
		<a class="menuSelect" href="/menu/drink">Drinks</a>
	</div>

	<div id="contentContainer" class="cf">
		@foreach($menu as $item)
			<div class="contentItem">
				<h3>{{$item->name}}</h3>
				<img src='{{ asset("/img/$item->img")}}'  alt="image of one of lady luck's food items">
				<p>{{$item->description}}</p>
				@if(Auth::check()) 
					<a href="/edit/menu/{{$item->id}}">edit |</a>
					<a href="/delete/menu/{{$item->id}}">| delete</a>
				@endif
			</div>
		@endforeach
	</div>
@endsection