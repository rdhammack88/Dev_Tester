@extends('layouts.app')

@section('content')
	<main class="wrapper" id="homePage">
		<div class="container">
			<p>Test your knowledge on 8 different Web Development Programming languages.
		        <span>&darr;</span>
		        Click below
		        <span>&darr;</span>
		        to get started. See you inside!
		    </p>

			<br/>
			<p><a href="/quiz-choice" role="button">Get Started</a></p>
			{{-- <p><a href="/admin-login" role="button">Admin</a></p> --}}
		</div>
	</main>
@endsection
