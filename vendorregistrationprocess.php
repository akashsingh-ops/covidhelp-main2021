<?php
session_start();
ob_start();
// include('includes\dbconfig.php');
include('includes\database.php');
include('includes\vendor.php');
// echo "Haaay";
?>
<?php
if (isset($_POST['btn']))
{
$orgname=$_POST['orgname'];
$orgtype=$_POST['orgtype'];
$orgemail=$_POST['orgemail'];
$orgphoneno=$_POST['orgno'];
$orgaddress=$_POST['orgadd'];
$orgcity=$_POST['orgcity'];
// $orgpassword=$_POST['orgpass'];
// $orgcpassword=$_POST['orgcpass'];
// $hash_password=password_hash($orgpassword,PASSWORD_DEFAULT);
// echo "Haaay";

   if (!empty($orgname) && !empty($orgtype) && !empty($orgemail) && !empty($orgphoneno) && !empty($orgaddress) && !empty($orgcity))
   {
    $vendor=new Vendor();
    $vendor->orgname=$orgname;
    $vendor->orgtype=$orgtype;
    $vendor->orgemail=$orgemail;
    $vendor->orgphoneno=$orgphoneno;
    $vendor->orgaddress=$orgaddress;
    $vendor->orgcity=$orgcity; 
    // $vendor->orgpassword=$hash_password; 
    $alreadyExists = $vendor->check_email_already_exists();
    if ($alreadyExists) {
      $_SESSION['msgheading']="Error";
      $_SESSION['msg']="Email already exists.";
      // echo $_SESSION['msg'];
      header('Location:vendorRegistration.php');
    } 
    
    $result=$vendor->create();
    // $vendor=Vendor::create();
    print_r($result);
     if($result)
     {
	      
      // echo "User Registered Successfully!!";
      $_SESSION['msgheading']="Success";
      $_SESSION['msg']="Vendor registered successfully we will accept your request as soon as possible.It will get reflected on website very soon.";
        // include('register_msg.html');
        header('Location:vendorRegistration.php');
     }
     else
     {
      $_SESSION['msgheading']="Error";
      $_SESSION['msg']="Problem in Registration.";
      header('Location:vendorRegistration.php');
     }
   }
   else
   {
    $_SESSION['msgheading']="Error";
    $_SESSION['msg']="Please fill all the fields of form.";
    header('Location:vendorRegistration.php');
   }
}
else
{
	header('Location:vendorRegistration.php');
}
?>
