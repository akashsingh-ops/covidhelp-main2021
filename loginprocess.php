<?php
session_start();
require('includes\database.php');
require('includes\vendor.php');
require('includes\users.php');
session_start();
ob_start();
require('adminconfig.php');
if (isset($_POST['login'])) {
	$email = $_POST['emailuser'];
	$password = $_POST['passuser'];
	// echo "$email";
	// echo "$password";
	if (!empty($email) && !empty($password)) {
		$user = new User;
		$user->email = $email;
		$user->password = $password;

		if ($user->find_user_by_email($email)->status == 'inactive') {
			$_SESSION['msgheading'] = "Error";
			$_SESSION['msg'] = 'User Registration is in process. Your Acoount will be active soon. Thanks for your patience.!!!';
			// header("Location:loginform.php");
		} else {
			$result = $user->verifyLogin($email, $password);
			if ($result) {
				$_SESSION['email'] = $email;
				if ($_SESSION['email'] == Admin_email) {
					header('Location:adminpanel.php');
					// echo $_SESSION['email'];
				} else {
					header('Location:profile.php');
					// echo $_SESSION['email'];
				}
			} else {
				$_SESSION['msgheading'] = "Error";
				$_SESSION['msg'] = "Invalid Username or Password.";
				header("Location:loginform.php");
			}
		}
	} else {
		echo "<h2 style='color: red'>Email and Password are required!!!</h2>";
		// include('index.php');
	}
}
header("Location:loginform.php");
