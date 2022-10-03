<?php
session_start();
ob_start();
?>
<?php
// session_start();
include("adminconfig.php");
if (isset($_SESSION['email'])) {
    header("Location:profile.php");
    if ($_SESSION['email'] == Admin_email) {
        header("Location:adminpanel.php");
    } else {
        header("Location:profile.php");
    }
}
?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="webstyle.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Static Navbar</title>
    <!-- <link rel="stylesheet" type="text/css" href="webstyle.css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
    <title>User Registration</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>



    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <section class="get-in-touch">
        <h1 class="title" style="font-size: 4vw;">User Registration Form</h1>

        <form id="form1" class="contact-form row" action="userRegistrationProcess.php" method="post">
            <div class="form-field col-lg-6">
                <input id="fname" class="input-text js-input" type="text" name="fname">
                <label class="label" for="fname">First Name <span id="fnamelabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-6">
                <input id="lname" class="input-text js-input" type="text" name="lname">
                <label class="label" for="lname">Last Name <span id="lnamelabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-12">
                <!-- <input id="vtype" class="input-text js-input" type="text" required> -->
                <label class="label" for="vtype">Vendor Name <span id="vnamelabel" style="color:red;font-size:12px"></span></label>
                <input id="vname" class="input-text js-input" list="types" name="types" id="types" autocomplete="off">
                <datalist id="types">
                    <?php
                    require('includes/database.php');
                    $q = "select * from vendor where id!=0";
                    $result = $database->query($q);
                    $rows = $result->fetchAll();
                    foreach ($rows as $row) {
                        if ($row['status'] == 'active') {
                            echo "<option value='{$row['orgname']}'>";
                        }
                    }
                    ?>

                </datalist>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="email" class="input-text js-input" type="text" name="orgemail">
                <label class="label" for="email">E-mail<span id="emaillabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="phone" class="input-text js-input" type="text" name="orgno">
                <label class="label" for="phone">Phone Number<span id="phonelabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="pass" class="input-text js-input" type="password" name="orgpass">
                <label class="label" for="pass">Password <span id="passlabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-6 ">
                <input id="cpass" class="input-text js-input" type="password" name="orgcpass">
                <label class="label" for="cpass">Confirm Password <span id="cpasslabel" style="color:red;font-size:12px"></span></label>
            </div>
            <div class="form-field col-lg-12">
                <input class="submit-btn" type="submit" value="Register" name='submit'>
            </div>
        </form>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="msgmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $_SESSION['msgheading'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $_SESSION['msg'] ?></p>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <?php
    if (isset($_SESSION['msgheading'])) {
    ?>
        <script>
            $('#msgmodal').modal();
        </script>
    <?php
        unset($_SESSION['msgheading']);
        unset($_SESSION['msg']);
    }
    ?>
    <script>
        document.getElementById("form1").addEventListener("submit", function(event) {
            let fname = document.getElementById("fname").value;
            let fnamelabel = document.getElementById("fnamelabel");

            let lname = document.getElementById("lname").value;
            let lnamelabel = document.getElementById("lnamelabel");

            let vname = document.getElementById("vname").value;
            let vnamelabel = document.getElementById("vnamelabel");

            let email = document.getElementById("email").value;
            let emaillabel = document.getElementById("emaillabel");

            let phone = document.getElementById("phone").value;
            let phonelabel = document.getElementById("phonelabel");

            let pass = document.getElementById("pass").value;
            let cpass = document.getElementById("cpass").value;

            let passlabel = document.getElementById("passlabel");
            let cpasslabel = document.getElementById("cpasslabel");
            // for fname
            let stopDefault = false;

            if (fname === "" || fname == null) {

                fnamelabel.innerText = " Required*";
                stopDefault = true;
            } else {
                fnamelabel.innerText = "";
            }


            // for lname
            if (lname == "" || lname == null) {
                lnamelabel.innerText = " Required*";
                stopDefault = true;
            } else {
                lnamelabel.innerText = "";
            }

            // for vender name
            if (vname == "" || vname == null) {
                vnamelabel.innerText = " Required*";
                stopDefault = true;
            } else {
                vnamelabel.innerText = "";
            }

            // for email

            if (email === '' || email === null) {
                emaillabel.innerText = " Required*";
                stopDefault = true;


            } else {
                emaillabel.innerText = "";
                if (!email.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)) {
                    emaillabel.innerText = " Please provide valid E-mail.";
                    stopDefault = true;
                } else {
                    emaillabel.innerText = "";

                }


            }

            if (phone === "" || phone == null) {
                phonelabel.innerText = " Required*";
                stopDefault = true;


            } else {


                if (!phone.match(/^\d{10}$/)) {
                    phonelabel.innerText = " Please provide valid no.";
                    stopDefault = true;

                } else {
                    phonelabel.innerText = "";
                }

            }


            console.log("pass");
            if (pass == "" || pass == null) {
                passlabel.innerText = " Required*";
                stopDefault = true;
            } else {
                passlabel.innerText = "";
                if (pass.length < 4) {
                    passlabel.innerText = " Password length must be atleat 4 character";
                    stopDefault = true;
                } else {
                    passlabel.innerText = "";

                }

            }
            if (cpass == "" || cpass == null) {

                cpasslabel.innerText = " Required*";
                stopDefault = true;

            } else {
                cpasslabel.innerText = "";

                if (pass.length < 4 || cpass.length < 4) {
                    passlabel.innerText = " Password length must be atleat 4 character";
                    cpasslabel.innerText = " Password length must be atleat 4 character";
                    stopDefault = true;
                } else if (pass !== null && cpass !== null && pass !== cpass) {

                    cpasslabel.innerText = " Password did not match ";
                    stopDefault = true;
                } else {
                    passlabel.innerText = "";
                    cpasslabel.innerText = "";
                }
            }
            if (stopDefault) {
                event.preventDefault();
            }



        });
    </script>
</body>

</html>