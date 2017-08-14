<?php
	// Starts new or resume existing session
	session_start();
	// Function checks if the user is logged in by cheking the session.
	function loggedin() {
		if (isset($_SESSION['username'])) {
			$loggedin = TRUE;
			return $loggedin;
		}
	}
	// If the user is logged in this will display the name of the current user.
	if (loggedin()) {
		$session_name = '<p>Hi, '. $_SESSION['username'].'.'.'</p>';
	}
    // Message for users who are not logged in.
	$not_logged =  '<p>Hey there! To access the intranet you need to login.</p>'.'<br />';
    // Link for users to logout with.
	$logout = '<p><a href="includes/logout.php">Logout</a></p>';
    // Link for users to logout with while viewing the results page
	$logout2 = '<p><a href="../includes/logout.php">Logout</a></p>';
    // Link to the intranet page for staff.
    $intranetLink = '<p><a href="../intranet.php">Intranet Index</a></p>';
    // Notification for users who are not logged in.
	$have_reg = '<p>Hi you are not logged in! Login to access our website.</p>';
?>