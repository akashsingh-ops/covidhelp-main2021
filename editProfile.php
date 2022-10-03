<?php
session_start();
require ('adminconfig.php');
if (!isset($_SESSION['email'])) {
    echo $_SESSION['email'] ;
    header("Location:loginform.php");
}
else
{
    if ($_SESSION['email'] == Admin_email) {
        header("Location:adminpanel.php");
    }
}
?>

<?php

require('includes/users.php');
if(isset($_SESSION['email']))
{
    $user=User::find_user_by_email($_SESSION['email']);
}
else
{
    header('Location:index.php');
}
?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .get-in-touch {
            max-width: 70%;
            /* margin: 50px auto; */
            margin-top: 50px;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;

        }

        .get-in-touch .title {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 3.2em;
            line-height: 48px;
            padding-bottom: 48px;
            color: #5543ca;
            background: #5543ca;
            background: -moz-linear-gradient(left, #f4524d 0%, #5543ca 100%) !important;
            background: -webkit-linear-gradient(left, #f4524d 0%, #5543ca 100%) !important;
            background: linear-gradient(to right, #f4524d 0%, #5543ca 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .contact-form .form-field {
            position: relative;
            margin: 32px 0;
        }

        .contact-form .input-text {
            display: block;
            width: 100%;
            height: 36px;
            border-width: 0 0 2px 0;
            border-color: #5543ca;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
        }

        .contact-form .input-text:focus {
            outline: none;
        }

        .contact-form .input-text:focus+.label,
        .contact-form .input-text.not-empty+.label {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px);
        }

        .contact-form .label {
            position: absolute;
            left: 20px;
            bottom: 20px;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
            color: #5543ca;
            cursor: text;
            transition: -webkit-transform .2s ease-in-out;
            transition: transform .2s ease-in-out;
            transition: transform .2s ease-in-out,
                -webkit-transform .2s ease-in-out;
        }

        .contact-form .submit-btn {
            display: inline-block;
            background-color: #000;
            background-image: linear-gradient(125deg, #a72879, #064497);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            width: 200px;
            cursor: pointer;
        }
    </style>

<script>

    document.getElementById("form").addEventListener("submit", function (event) {
                if(! validation()){
                  document.getElementById("passlabel").innerText = "Wrong Password";
                  document.getElementById("cpasslabel").innerText = "Wrong Password";
                  event.preventDefault();
                } 
            });
    
    
            function validation() {
                let pass = document.getElementById("pass").value;
                let cpass = document.getElementById("cpass").value;
                if (pass === cpass) {
                    return true;
                }
                else {
                    return false;
                }
                
            }
    
        </script>
    <title>Update Profile</title>
</head>

<body>
    <header>
<?php 
include"navbar.php";
?>

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <section class="get-in-touch">
        <h1 class="title" style="font-size: 4vw;">Update User Details</h1>
        <form id="form" class="contact-form row" action="editProfileProcess.php" method="post" >
            <div class="form-field col-lg-6">
                <input id="fname" class="input-text js-input" type="text" required name="fname" value=<?php echo $user->firstname ?>>
                <label class="label" for="fname">First Name</label>
            </div>
            <div class="form-field col-lg-6">
                <input id="lname" class="input-text js-input" type="text" required name="lname" value=<?php echo $user->lastname ?>>
                <label class="label" for="lname">Last Name</label>
            </div>
            <!-- <div class="form-field col-lg-12"> -->
                <!-- <input id="vtype" class="input-text js-input" type="text" required> -->
                <!-- <label class="label" for="vtype">Vendor Name</label>
                <input id="vname" class="input-text js-input" list="types" name="types" id="types" required
                    name="">
                <datalist id="types">
                    <option value="Pushpanjali">
                    <option value="Synergy">
                    <option value="Rainbow">
                    <option value="NGO">
                </datalist>
            </div> -->
            <div class="form-field col-lg-6 ">
                <input id="email" class="input-text js-input" type="email" required name="email" readonly value=<?php echo $user->email ?>>
                <label class="label" for="email">E-mail</label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="phone" class="input-text js-input" type="tel" pattern="^\d{3}\d{3}\d{4}$" required
                    name="orgno" value=<?php echo $user->phone_no ?>>
                <label class="label" for="phone">Phone Number</label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="pass" class="input-text js-input" type="password" required name="orgpass">
                <label class="label" for="pass">New Password <span id="passlabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="cpass" class="input-text js-input" type="password" required name="orgcpass">
              <label  class="label" for="cpass">Confirm Password <span id="cpasslabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-12">
                <input class="submit-btn" type="submit" value="Edit" name="edit">
            </div>
        </form>
    </section>


  


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

</body>

</html>