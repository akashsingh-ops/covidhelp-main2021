<?php
session_start();
if (isset($_SESSION['email']))
{
	session_unset();
	session_destroy();
	// echo "<h4 align='center'>You have been logged out successfully!!!</h4>";
	// echo "<script>alert('You have been logged out successfully!!!'');</sript>";
	header("Location:loginform.php");
}
?>