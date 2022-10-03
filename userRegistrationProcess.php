<?php
session_start();
include('includes/database.php');
include('includes/users.php');
include('includes/vendor.php');
if(isset($_POST['submit']))
{
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $vendorname=$_POST['types'];
    $email=$_POST['orgemail'];
    $phone_no=$_POST['orgno'];
    $password=$_POST['orgpass'];

    $user=new User();
    $user->firstname=$firstname;
    $user->lastname=$lastname;
    $user->vendor_id=$user->find_vendor_id($vendorname);
    $user->email=$email;
    $user->phone_no=$phone_no;
    $user->password=$password;

    $vendor = new Vendor();
    $res =  $vendor->find_vendor_by_id($user->vendor_id);
    // echo "<pre>";
    // echo print_r($res);

    // echo $res->status;
    if ($res->status == 'inactive') {
        $_SESSION['msgheading']="Error";
       $_SESSION['msg']="Vendor Registration is in process. please try after sometime.";
    }
    else if($user->check_email_already_exists())
    {
       $_SESSION['msgheading']="Error";
       $_SESSION['msg']="email is already registered.";
    }
    else if($user->check_phoneno_already_exists())
    {
       $_SESSION['msgheading']="Error";
       $_SESSION['msg']="phone number is already registered.";
    }
    else if($user->vendor_id==null)
    {
       $_SESSION['msgheading']="Error";
       $_SESSION['msg']="this vendor is not registered with us.";
    }
    else
    {
        $result= $user->create();
        if($result)
        {   echo $res->status;
            $_SESSION['msgheading']="Success";
            $_SESSION['msg']="user registered successfully we will accept your request as soon as possible.";
        }
        else
        {
             $_SESSION['msgheading']="Error";
             $_SESSION['msg']="Problem in Registration.";
        }
    }
}
header('Location:userRegistration.php');
// echo $_SESSION['msg'];
?>