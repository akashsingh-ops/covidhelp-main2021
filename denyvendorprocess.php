<?php
require('includes/database.php');
if (isset($_POST['vdeny']))
{

	$getid=$_GET['orgid'];
	echo "$getid";
	global $database; 
    $q="DELETE from vendor WHERE id=?";

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