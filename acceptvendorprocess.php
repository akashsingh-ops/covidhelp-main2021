<?php
require('includes/database.php');
if (isset($_POST['vaccept']))
{

	$getid=$_GET['orgid'];
	echo "$getid";
	global $database; 
    $q="UPDATE vendor SET status='active' WHERE id=?";

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