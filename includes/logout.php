<?php
/*
* Building Web Applications using PHP
* Pedro Dos Passos
* -----------------------------------------------------------------------------
*/
// Starts new or resume existing session.
session_start();

// Unset all of the session variables.
$_SESSION = array();

// This will destroy the the session data.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Destroys the session.
session_destroy();
// Redirects to the index page.
header('Refresh: 4; ../index.php');
?>
<!--Logout notification page-->
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Logout Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
		<p>You are now logged out. See you soon!</p>
    </body>
</html>
