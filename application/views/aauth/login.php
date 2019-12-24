<form class="login-form" method="post">
	<input type="text" name="username" placeholder="Username" value="admin@example.com">
	<input type="password" name="password" placeholder="Password" value="admin@example.com">
	<label><input type="checkbox" name="remember" value="1" checked="checked">Remember me</label>
	<input type="submit" role="button" value="Log In">
</form>
<?php echo $this->aauth->print_errors(); ?>