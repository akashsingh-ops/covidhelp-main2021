<?php
session_start();
// require('includes/resources.php');
// require('includes/users.php');
require('includes/database.php');
if(isset($_POST['update']))
{
    $resource_id=$_POST['resid'];  
    $resource_name=$_POST['iname'];
    $one_unit_size=$_POST['oneunit'];
    $measuring_unit=$_POST['munit'];  
    $total=$_POST['titem'];
    $available=$_POST['aitem'];
    global $database; 
    $q="UPDATE resources SET resource_name=?, one_unit_size=?, measuring_unit=?, total=?, available=? WHERE resource_id=?";

    $qrun=$database->query($q,array($resource_name,$one_unit_size,$measuring_unit,$total,$available,$resource_id));
    if ($qrun)
    {
       echo "<script>alert('Data Updated!!')</script>"; 
    }
    else
    {
        echo "<script>alert('Problem In Data Updation!!')</script>";
    }
}
header('Location:profile.php');
?>