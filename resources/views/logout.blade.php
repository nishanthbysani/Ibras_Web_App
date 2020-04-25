<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
$_SESSION['username'] ="";
$_SESSION["loggedin"]=FALSE;
// Destroy the session.
session_destroy();
session_unset ();
 
// Redirect to login page
header("location: Inicio.php");
exit;
