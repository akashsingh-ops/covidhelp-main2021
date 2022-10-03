<?php
require('includes/resources.php');
if(isset($_POST['submit']))
{
    $status=Resources::update_resource_available_item($_POST['qty'],$_POST['resource_id']);
    if($status)
    {
        echo "updated successfully";
    }
    else
    {
        echo "problem in updation";
    }
}
header('Location:profile.php');
?>