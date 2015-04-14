@extends('app')

@section('content')
	<div id="blurbContainer" class="cf">
		<div class="blurb">
			<img src="img/phone.png" alt="hand holding phone">
			<h2>Phone</h2>
			<ul id="phone">
				@foreach($phone as $number)
					<li>{{$number->description}}</li>
					@if(Auth::check()) 
						<a href="/edit/contact/{{$number->id}}">edit |</a>
						<a href="/delete/contact/{{$number->id}}">| delete</a>
					@endif
				@endforeach
			</ul>
		</div>

		<div class="blurb">
			<img src="img/post.png" alt="person writing at desk">
			<h2>Post</h2>
			<ul>
				@foreach($post as $address)
					<li>{{$address->description}}</li>
					@if(Auth::check()) 
						<a href="/edit/contact/{{$address->id}}">edit |</a>
						<a href="/delete/contact/{{$address->id}}">| delete</a>
					@endif
				@endforeach
			</ul>
		</div>

		<div class="blurb">
			<img src="img/email.png" alt="laptop computer">
			<h2>Email</h2>
			<ul>
				@foreach($email as $emailAddress)
					<li>{{$emailAddress->description}}</li>
					@if(Auth::check()) 
						<a href="/edit/contact/{{$emailAddress->id}}">edit |</a>
						<a href="/delete/contact/{{$emailAddress->id}}">| delete</a>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
@endsection