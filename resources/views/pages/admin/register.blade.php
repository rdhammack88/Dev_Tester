@extends('layouts.app')

@section('content')
    <main id="adminSignup">
    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    		<fieldset>
    			<legend>Sign up</legend>
    			<div class="input-group">
    				<label for="email">Email:</label>
    				<input type="text" name="email" placeholder="email">
    				<p class="hidden text-error"><small><?php //echo $email_error; ?></small></p>
    			</div>
    			<div class="input-group">
    				<label for="password">Password:</label>
    				<input type="password" name="password" placeholder="password">
    				<p class="hidden text-error"><small><?php //echo $passwordError; ?></small></p>
    			</div>
    			<p>
    				<button type="submit" name="signup" class="btn">Signup</button>
    			</p>
    		</fieldset>
    	</form>

    	<p>Have an account? &nbsp;<span><a href="/admin-login"> Login!</a></span></p>
    </main>
@endsection
