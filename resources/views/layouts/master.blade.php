<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="/images/fs_fav_48.gif">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" >
    @stack('head')
</head>
<body>
	<header>
		@if(Session::get('message-danger') != null)
			<div class="text-center alert-danger">{{ Session::get('message-danger') }}</div>
		@endif
		@if(Session::get('message-success') != null)
			<div class="text-center alert-success">{{ Session::get('message-success') }}</div>
		@endif
		@if(Session::get('message-warning') != null)
			<div class="text-center alert-warning">{{ Session::get('message-warning') }}</div>
		@endif
		<nav class="nav navbar">
	        <div class="navbar-header">
	            <a class="navbar-brand" href="/"><img src="/images/fs_350x75.gif"></a>
	        </div>
	        <ul class="nav nav-pills nav-justified">
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
		<hr>
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
