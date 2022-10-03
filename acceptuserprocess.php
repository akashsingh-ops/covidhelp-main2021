<?php
require('includes/database.php');
if (isset($_POST['uaccept']))
{

	$getid=$_GET['userid'];
	echo "$getid";
	global $database; 
    $q="UPDATE users SET status='active' WHERE id=?";

    $qrun=$database->query($q,array($getid));
    if ($qrun)
    {
       echo "<script>alert('Data Updated!!')</script>";
       header("Location:adminpanel.php"); 
    }
    else
    {
        echo "<script>alert('Problem In Status Updation!!')</script>";
    }
}
?>