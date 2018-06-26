@extends('layouts.app')

@section('content')
    <main id="adminLogin">
    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    		<fieldset>
    			<legend>Log In</legend>
    			<div class="input-group">
    				<label for="email">Email:</label>
    				<input type="text" name="admin_email" placeholder="email">
    				<p class="hidden text-error"><small><?php //echo $email_error; ?></small></p>
    			</div>

    			<div class="input-group">
    				<label for="password">Password:</label>
    				<input type="password" name="admin_password" placeholder="password">
    				<p class="hidden text-error"><small><?php //echo $passwordError; ?></small></p>
    			</div>
    			<p>
    				<button type="submit" name="admin_login" class="btn">Login</button>
    			</p>
    		</fieldset>
    	</form>

    	<p>Don't have an account? <span><a href="/admin-register">Signup!</a></span></p>
    </main>
@endsection
