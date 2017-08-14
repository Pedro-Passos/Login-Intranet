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
		// Retreives the username from the cookie.
		echo $session_name;
		// Logout link
		echo $logout;
	}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Public Content</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
		<h1>Intranet</h1>
		<ul>
			<li><a href="results/DTresults.php">Introduction to Database Technology - DT Results</a></li>
			<li><a href="results/P1results.php">Web Programming using PHP - P1 Results</a></li>
			<li><a href="results/PfPresults.php">Problem Solving for Programming – PfP Results</a></li>
		</ul>
		<p>Ut viverra mattis lorem malesuada luctus. Phasellus sollicitudin diam et nulla efficitur laoreet. In felis velit, maximus ac enim eu, tristique consequat quam. Sed et scelerisque diam. Nulla facilisi. Etiam scelerisque ex sit amet tellus iaculis, sed pretium diam lobortis. Fusce lorem libero, tempus id suscipit nec, egestas non augue.</p>
    </body>
</html>
