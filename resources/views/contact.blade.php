@extends('app')

@section('content')
	<div id="blurbContainer"class="cf">
		<div class="blurb">
			<img src="img/phone.png">
			<h2>Phone</h2>
			<ul id="phone">
				@foreach($phone as $number)
					<li>{{$number->description}}</li>
				@endforeach
			</ul>
		</div>

		<div class="blurb">
			<img src="img/post.png">
			<h2>Post</h2>
			<ul>
				@foreach($post as $address)
					<li>{{$address->description}}</li>
				@endforeach
			</ul>
		</div>

		<div class="blurb">
			<img src="img/email.png">
			<h2>Email</h2>
			<ul>
				@foreach($email as $emailAddress)
					<li>{{$emailAddress->description}}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection