<?php

// if(isset($_SESSION["category"]) && $_SESSION["category"] != '') {
// 	$title = strtoupper($_SESSION["category"]) + ' Tester';
// } else {
// 	$title = 'Dev Tester';
// }

// if(isset($_SESSION)) {
// 	var_dump($_SESSION);
// }

// $title = 'php';
//&& Session::get('category') != ''

if(Session::get('category') !== null) {
	$session_category = Session::get('category');
	$title = ucfirst($session_category) . ' Tester'; //Session::get('category'); //strtoupper($session_category) + ' Tester';
} else {
	$title = 'Dev Tester';
}
// $title = 'php';

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			{{-- <a class="navbar-brand" href="#">Project name</a> --}}
			<a href="/" class="navbar-brand">{{ $title }}</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">Home</a></li>
				<li><a href="/about">About</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li><a href="/admin/dashboard">Dashboard</a></li>
					<li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>



<header>
	<a href="/"><h1><?php// echo $title; ?></h1></a>
</header>
