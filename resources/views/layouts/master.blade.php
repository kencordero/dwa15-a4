<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon-shopping-cart.ico">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" >
    @stack('head')
</head>
<body>
	<header>
		@if(Session::get('message') != null)
			<div class="message">{{ Session::get('message') }}</div>
		@endif
		<nav class="nav navbar">
	        <div class="navbar-header">
	            <a class="navbar-brand" href="/"><img src="/images/brand.jpg"></a>
	        </div>
	        <ul class="nav nav-pills navbar-inverse nav-justified">
				<li><a href="/products">Products</a>
				@if (Auth::check())
		            <li><a href="/wishlist">Wishlist</a>
	            	<li><a href="/cart">Cart</a>
	            	<li><a href="/orders">Orders</a>
					<li>
						<form method="post" action="/logout">
							{{ csrf_field() }}
							<button>Log out</button>
						</form>
					</li>
				@else
					<li><a href="/login">Log in</a>
					<li><a href="/register">Register</a>
				@endif
	        </ul>
	    </nav>
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
	<script src="/js/app.js"></script>
    @stack('body')
</body>
</html>
