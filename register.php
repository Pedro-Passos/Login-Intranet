<?php
/*
* Building Web Applications using PHP
* Pedro Dos Passos
* -----------------------------------------------------------------------------
*/
	include ('includes/session.php'); // Starts new or resume existing session.

	$dir = 'users'; // Users directory.
	$file = 'users/users.php'; // Users text file for login information.
	$error_count = 0; // Error counter.
	$clean = array(); // Array to store clean inputs.
	$error_msg = array();
    echo 'Please use the logout link when you are finished registering staff to return to the homepage.';
    //echo $logout;

	if ((isset($_POST['submit'])) AND (loggedin())) { // Checks form was submitted and admin is currently logged in.
        if ((!empty($_POST['title'])) AND (ctype_alpha($_POST['title'])) AND (strlen($_POST['title']) > 1)) { // First name along with validation.
			$trimmed = trim($_POST['title']);
			$html = htmlentities($trimmed);
			$clean['title'] = $html;
		}else{
			$error_count++;
			$error_msg[] = "A title is required and should only contain two or more letters.";
		}
		if ((!empty($_POST['firstname'])) AND (ctype_alpha($_POST['firstname'])) AND (strlen($_POST['firstname']) > 1)) { // First name along with validation.
			$trimmed = trim($_POST['firstname']);
			$html = htmlentities($trimmed);
			$clean['firstname'] = $html;
		}else{
			$error_count++;
			$error_msg[] = "Your first name is required and should only contain two or more letters.";
		}
		if ((!empty($_POST['lastname'])) AND (ctype_alpha($_POST['lastname'])) AND (strlen($_POST['lastname']) > 1)){ // Last name along with validation.
			$trimmed = trim($_POST['lastname']);
			$html = htmlentities($trimmed);
			$clean['lastname'] = $html;
		}else{
			$error_count++;
			$error_msg[] = "Your first name is required and should only contain two or more letters.";
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Email along with validation.
			$html = htmlentities($_POST['email']);
			$clean['email'] = $html;
		}else{
			$error_count++;
			$error_msg[] = 'A valid email is required.';
		}
		if ((!empty($_POST['username'])) AND (ctype_alnum($_POST['username'])) AND (strlen($_POST['username']) > 1)){ // Username along with validation.
			$trimmed = trim($_POST['username']);
			$html = htmlentities($trimmed);
			$clean['username'] = $html;
		}else{
			$error_count++;
			$error_msg[] = "A username is required and should contain only letters and numbers.";
		}
		if ((!empty($_POST['password1'])) AND (strlen($_POST['password1']) > 5)) { // Password along with validation.
			$trimmed = trim($_POST['password1']);
			$html = htmlentities($trimmed);
			$clean['password1'] = $html;
		}else{
			$error_count++;
			$error_msg[] = 'You need to set a password with atleast 6 characters.';
		}
		if ($_POST['password1'] == $_POST['password2']) { // Matching the passwords.
		}else{
			$error_count++;
			$error_msg[] = 'Your passwords do not match.';
		}

		if (isset($_POST['submit']) AND $error_count === 0) { // If there weren't any problems with the validation and form submitted.

			if (is_writable($file)) { // Checks the file is writable.
				// Data to be written is assigned to a variable.
				$data = $clean['title'] . "\t" . $clean['username'] . "\t" . $clean['password1'] . "\t" . $clean['email'] . "\t" . $clean['firstname'] . "\t" . $clean['lastname'] . PHP_EOL;
				// Data being written to file.
				file_put_contents($file, $data, FILE_APPEND);
				// Notifies user of success and redirects them to the login page
				echo '<p>User now registered!</p>'. '<br />';
				echo '<p>We will now return you to the staff registration page.</p>'. '<br />';
				header('Refresh: 4; register.php');
				exit();
			}else{ // If there is a problem the users will receive a notification.
				echo '<p>The user could not be registered due to an error on our system please mail support@support.com.</p>';
			}
		}else{
			foreach ($error_msg as $error) { // Lists all the errors when form is submitted
				echo "<p>$error</p>";
			}
				echo '<p>Please fill in the fields correctly.</p>';
		}
	}else if (loggedin()) { // If user is logged in they are notified.
		echo '<p>You are logged in as '.$_SESSION['username'].'.'.'</p>';
		echo $logout;// Logout link.
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Register Page</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
		<h1>Staff account registration</h1>
		<form action="register.php" method="post">
			<fieldset>
			<legend>Staff details</legend>

                <p><label for="title">Title:</label><br />
				<input type="text" name="title" id="title"
				<?php if (isset($_POST['title'])=== true) {echo 'value="', strip_tags($_POST['title']),'"'; }?>/></p>

				<p><label for="firstname">First Name:</label><br />
				<input type="text" name="firstname" id="firstname"
				<?php if (isset($_POST['firstname'])=== true) {echo 'value="', strip_tags($_POST['firstname']),'"'; }?>/></p>

				<p><label for="lastname">Last Name:</label><br />
				<input type="text" name="lastname" id="lastname"
				<?php if (isset($_POST['lastname'])=== true) {echo 'value="', strip_tags($_POST['lastname']),'"'; }?>/></p>

				<p><label for="email">Email:</label><br />
				<input type="text" name="email" id="email"
				<?php if (isset($_POST['email'])=== true) {echo 'value="', strip_tags($_POST['email']),'"'; }?>/></p>

				<p><label for="username">Username:</label><br />
				<input type="text" name="username"  id="username"
				<?php if (isset($_POST['username'])=== true) {echo 'value="', strip_tags($_POST['username']),'"'; }?>/></p>

				<p><label for="password1">Password:</label><br />
				<input type="password" name="password1" id="password1" /></p>

				<p><label for="password2">Confirm Password:</label><br />
				<input type="password" name="password2" id="password2"/></p>

				<input type="submit" name="submit" id="submit" value="Register"/>

			</fieldset>
        </form>
	</body>
</html>
