<?php
	// Starts new or resume existing session.
	include ('../includes/session.php');
	if(!loggedin()) {
		// If user isn't logged in they are notified they need to be a member to have full access to the website.
		echo $not_logged;
	}
	if (loggedin()) {
		// Retreives the username from the cookie.
		echo $session_name;
        // Return to the intranet main index page.
        echo $intranetLink;
		// Logout link
		echo $logout2;
        include ('DTresults.html');
	}
?>
