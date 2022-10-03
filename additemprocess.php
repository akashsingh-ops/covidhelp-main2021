<?php
session_start();
require('includes/resources.php');
require('includes/users.php');
if(isset($_POST['add']))
{
    $user = User::find_user_by_email($_SESSION['email']);
    $status=Resources::save_resource($_POST['fname'],$_POST['oneunitsize'],$_POST['measuringunit'],$_POST['total'],$_POST['available'],$user->vendor_id);
    if($status)
    {
        echo "added";
    }
    else
    {
        echo "problem";
    }
}
header('Location:profile.php');
?>