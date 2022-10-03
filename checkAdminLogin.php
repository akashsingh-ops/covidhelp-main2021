<?php
session_start();
require('adminconfig.php');
if(isset($_SESSION['email']))
{
    if($_SESSION['email'] === Admin_email)
    {
        header('Location:adminpanel.php');
    }
}
else
{
    header('Location:../index.php');
}
?>