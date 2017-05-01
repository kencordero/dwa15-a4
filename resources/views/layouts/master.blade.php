<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta charset='utf-8'>
	<link rel="shortcut icon" type="'image/x-icon" href="/favicon-shopping-cart.ico">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" >
    @stack('head')
</head>
<body>
	<header>
		@if(Session::get('message') != null)
			<div class='message'>{{ Session::get('message') }}</div>
		@endif
		@yield('header')
	</header>

	<div class="container">
		@yield('content')
	</div>

	<div class="navbar-fixed-bottom">
	<hr>
	<footer class="text-center">
		&copy; {{ date('Y') }} Kenneth Cordero
	</footer>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @stack('body')
</body>
</html>
