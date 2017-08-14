<?php
/*
* Building Web Applications using PHP
* Pedro Dos Passos
* -----------------------------------------------------------------------------
*/
	// Starts new or resume existing session.
	include ('includes/session.php');
	if(!loggedin()) {
		// If user isn't logged in they are notified they need to be a member to have full access to the website.
		echo $not_logged;
	}
	if (loggedin()) {
		// Retreives the username from the session.
		echo $session_name;
		// Logout link.
		echo $logout;
	}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>DCS Home Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
		<h1>Welcome to the DCS Home Page</h1>
		<ul>
			<li><a href="admin.php">Admin Login</a></li>
			<li><a href="staff.php">Staff Login</a></li>
		</ul>
        <p>Fusce sit amet erat ac ante placerat viverra. Nulla vestibulum auctor congue. Vestibulum nec vehicula nisi. Suspendisse potenti. Vivamus vestibulum leo faucibus, vulputate mauris quis, euismod eros. Pellentesque elit ipsum, bibendum et convallis vitae, scelerisque eget est. Duis gravida, leo eget faucibus tempor, turpis justo ullamcorper lectus, sed tincidunt magna diam id est.</p>
    </body>
</html>
