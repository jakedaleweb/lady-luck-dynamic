@extends('app')

@section('content')
	<div id="linkContainer">
		<a class="menuSelect"href="/menu/hot">Hot</a>
		<a class="menuSelect"href="/menu/cold">Cold</a>
		<a class="menuSelect"href="/menu/drinks">Drinks</a>
	</div>

	<div id="contentContainer" class="cf">
		@foreach($menu as $item)
			<div class="contentItem">
				<h3>{{$item->name}}</h3>
				<img src='{{ asset("/img/$item->img")}}'  alt="image of one of lady luck's food items">
				<p>{{$item->description}}</p>
			</div>
		@endforeach
	</div>
@endsection

@section('scripts')
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/burger.js"></script>
@endsection