<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lady Luck - {{ $page }}</title>
	<link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="cf">
	<header>
		<div id="display-button">
			<i class="fa fa-bars"></i>
		</div>

		<img src="{{ asset('img/logo.png') }}" alt="Illustrated Lady Luck Logo">
		<div id="mobile-list" class="hidden"> 
			<ul>
				<li><a href="/home">home</a></li>
				<li><a href="/menu">menu</a></li>
				<li><a href="/catering">catering</a></li>
				<li><a href="/merch">merch</a></li>
				<li><a href="/locations">locations</a></li>
				<li><a href="/contact">contact</a></li>
			</ul>
		</div>
		
		<nav>
			<ul>
				<li><a {!! $page == 'home' 			? 'class="active"' : ''!!} href="/home">home</a></li>
				<li><a {!! $page == 'menu' 			? 'class="active"' : ''!!} href="/menu">menu</a></li>
				<li><a {!! $page == 'catering' 		? 'class="active"' : ''!!} href="/catering">catering</a></li>
				<li><a {!! $page == 'merch' 		? 'class="active"' : ''!!} href="/merch">merch</a></li>
				<li><a {!! $page == 'locations' 	? 'class="active"' : ''!!} href="/locations">locations</a></li>
				<li><a {!! $page == 'contact'	 	? 'class="active"' : ''!!} href="/contact">contact</a></li>
			</ul>
		</nav>	
	</header>
	<div id="socialMedia">
	<a href="https://www.facebook.com/LadyLuckCaravanCafe"><i class="fa fa-facebook-square fa-lg"></i></a>
		<a href="https://instagram.com/ladyluckcaravan/"><i class="fa fa-instagram fa-lg"></i></a></div>
	<div id="instafeed" class="cf">
		
	</div>

	@yield('content')

	<footer>
		<a href="https://www.facebook.com/LadyLuckCaravanCafe"><i class="fa fa-facebook-square"></i></a>
		<a href="https://instagram.com/ladyluckcaravan/"><i class="fa fa-instagram"></i></a>
		<p>&copy;Lady Luck/Jake Ovenden {!!date('Y')!!}</p>
		<p>ph. 0278139613</p>
	</footer>

	@yield('scripts')

</body>
</html>
