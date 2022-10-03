<?php
require('includes/database.php');
if (isset($_POST['udeny']))
{

	$getid=$_GET['userid'];
	echo "$getid";
	global $database; 
    $q="DELETE from users WHERE id=?";

    $qrun=$database->query($q,array($getid));
    if ($qrun)
    {
       echo "<script>alert('Data Deleted!!')</script>";
       header("Location:adminpanel.php"); 
    }
    else
    {
        echo "<script>alert('Problem In Deny Process!!')</script>";
    }
}
?>