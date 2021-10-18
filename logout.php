<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_COOKIE = array();
setcookie("resp", "", time() - 3600);
setcookie("ref", "", time() - 3600);
setcookie("log", "", time() - 3600);


setcookie("addvis", "", time() - 3600);
setcookie("addcli", "", time() - 3600);
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>