<?php

function login_page() {

	echo "<h3>Log in</h3>

		<form action='./login/login.php' method='post'>
			<input type='text' name='login' placeholder='login'>
			<input type='password' name='passwd' placeholder='password'><br/>
			<button type='submit' name='submit' value='OK'>Login</button>
			<br/><br/>
		</form>

		<h3>Register</h3>

		<form action='./login/create.php' method='post'>
			<input type='text' name='login' placeholder='login'>
			<input type='password' name='passwd' placeholder='password'><br/>
			<button type='submit' name='submit' value='OK'>Register</button>
			<br/><br/>
		</form>

		<h3>Delete account</h3>

		<form action='./login/delete.php' method='post'>
			<input type='text' name='login' placeholder='login'>
			<input type='password' name='passwd' placeholder='password'><br/>
			<button type='submit' name='submit' value='OK'>Delete</button>
			<br/><br/>
		</form>

		<h3>Log out</h3>

		<p><a href='./login/logout.php' >Log out</a></p>
	</body>
	</html>";

}