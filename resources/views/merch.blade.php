@extends('app')

@section('content')
<div id="contentContainer" class="cf">
	@foreach($items as $item)
		<div class="contentItem">
			<h3><a href="merch/{{$item->id}}">{{$item->name}}</a></h3>
			<a href="merchItem.html"><img src="http://placehold.it/120x120"></a>
			<p>{{$item->description}}</p>
			@if(Auth::check()) 
				<a href="/edit/merch/{{$item->id}}">edit |</a>
				<a href="/delete/merch/{{$item->id}}">| delete</a>
			@endif
		</div>
	@endforeach
</div>

	
@endsection