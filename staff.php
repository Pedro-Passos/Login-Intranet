<?php
	include ('includes/session.php'); // Starts new or resume existing session.
	
	$file = 'users/users.php'; // Creating variable with path user data file.
	$loggedin = FALSE; // Logged in variable set to false.
	
	if ((isset($_POST['submit'])) AND (!loggedin())) { // Checks if login was submitted and user is not currently logged in.
		$open_file = fopen($file, 'r'); // Opens file.

		while( $line = fgetcsv($open_file, 1024, "\t") ) { // While loop for checking submitted username and password.
			if ( ($line[1] == $_POST['username']) AND ($line[2] == trim($_POST['password'])) ) {
				$loggedin = TRUE;

				// Session setup.
				if(!isset($_SESSION)) {
					session_start();
				}
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['loggedin'] = $loggedin;
				
				// Notifies user they were loggedin and will be redirected.
				echo '<p>You are now logged in!</p>'.'<br />';
				echo '<p>We will redirect you to the Intranet page.</p>';
				header('Refresh: 5; intranet.php');
				exit();
			}
		}
		fclose($open_file); // Close file.
	}else  if (loggedin()) { // If the user is already loggedin they are notified.
		echo '<p>You are already logged in  please logout if you wish to use another account or this is not your account.</p>';
	}
	
	if (loggedin()) { // Notifies user that they are already logged in.
		echo '<p>You are currently logged in as, '. $_SESSION['username'].'.'.'</p>';
		echo $logout;// Logout link.
	} else if (isset($_POST['submit'])){ // If login fails user is notified they're details don't match.
		echo '<p>The username and password you entered do not match.</p>';
		echo $have_reg; //If login fails user is notified to register themselves incase they forgot to.
	} else {
		echo $have_reg; //If login fails user is notified to register themselves incase they forgot to.
	}

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
		<h1>Login Page</h1>
		<ul>
			<li><a href="index.php">Home</a></li>
		</ul>
		<form action="staff.php" method="post">
            <fieldset>
				<legend>Login</legend>
				
				<p><label for="username">Username:</label><br />
				<input type="text" name="username" id="username"
				<?php if (isset($_POST['username'])=== true) {echo 'value="', strip_tags($_POST['username']),'"'; }?>/></p>
				
				<p><label for="password">Password:</label><br />
				<input type="password" name="password" id="password" /></p>

				<input type="submit" name="submit" value="Login" />
            </fieldset>
        </form>
    </body>
</html>