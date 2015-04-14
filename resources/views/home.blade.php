@extends('app')

@section('content')
<div id="blurbContainer" class="cf">
	<div class="blurb">
		<h2>Menu</h2>
		<p>All our food is prepared fresh and on site daily, you can check out our ever-growing range <br/><a href="menu.html">right now</a></p>
	</div>

	<div class="blurb">
		<h2>Catering</h2>
		<p>We are happy to cater to events or even do a weekly order, if you want our famous food weekly<br/><a href="catering.html">go here</a></p>
	</div>

	<div class="blurb">
		<h2>Contact</h2>
		<p>We are friendly and happy to answer any questions, if you want to flick us an e-mail or a phone call<br/><a href="contact.html">this is the place</a></p>
	</div>
</div>

	
@endsection

@section('scripts')
	<script src="js/instafeed.min.js"></script>
	<script>
	     //normally it would be a bad idea to put my token in here but it has only basic authorization
     	var userFeed = new Instafeed({
	        get: 'user',
	        userId: 1083152042,
	        accessToken: '1083152042.cf0499d.4094af40ed074edab9a9bb4447f1f004',
	        sortBy: 'most-recent',
	     	limit: 4,
	     	resolution: 'low_resolution'
	     });
	     userFeed.run();
	 </script>
@endsection