<?php
require('includes/users.php');
session_start();
    if(isset($_POST['edit']))
    {
        $user=User::find_user_by_email($_SESSION['email']);
        $status=User::update($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['orgno'],$_POST['orgpass'],$user->id);
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