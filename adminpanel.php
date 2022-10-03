<?php
include('includes\database.php');
include('includes\vendor.php');
include('includes\users.php');
include('adminconfig.php');
// include('checkAdminLogin.php');
session_start();
ob_start();
if (!isset($_SESSION['email'])) {
    // echo " $_SESSION['email'] ";
    header("Location:loginform.php");
}
else
{
    if ($_SESSION['email'] != Admin_email) {
        header("Location:loginform.php");
        // echo "helooooo";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="webstyle.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://unpkg.com/minigrid@3.1.1/dist/minigrid.min.js"></script>


    <style>
        .page-title {
            margin: 20px;
            text-align: center;
        }

        .cards {
            margin-left: auto;
            margin-right: auto;
            max-width: 80%;
        }

        .card {
            border: 1px solid #c2c2c2;
            height: fit-content;
            width: 50rem;
            border-radius: 10px;
            margin-right: auto;
            margin-left: auto;
            max-height: fit-content;

        }

        @media only screen and (max-width: 1060px) {
            .card {
                width: 50rem;
            }
        }

        .card-body {
            padding-top: 10px;
            padding-bottom: 12px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-detail {
            margin-top: 0px;
            margin-bottom: -3px;
            padding: 0px;
            border: 1px solid black;
        }

        @media only screen and (max-width: 900px) {
            .card {
                width: 40rem;
            }
        }

        .card-body {
            padding-top: 10px;
            padding-bottom: 12px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-detail {
            margin-top: 0px;
            margin-bottom: -3px;
            padding: 0px;
            border: 1px solid black;
        }

        @media only screen and (max-width: 742px) {
            .card {
                width: 20rem;
            }
        }

        .card-body {
            padding-top: 10px;
            padding-bottom: 12px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-detail {
            margin-top: 0px;
            margin-bottom: -3px;
            padding: 0px;
            border: 1px solid black;
        }

        @media only screen and (max-width: 400px) {
            .card {
                width: 15rem;
                height: auto;
            }
        }

        .card-body {
            padding-top: 10px;
            padding-bottom: 12px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-detail {
            margin-top: 0px;
            margin-bottom: -3px;
            padding: 0px;
            border: 1px solid black;
        }

    </style>
    <script>
        (function () {
            var grid;
            function init() {
                grid = new Minigrid({
                    container: '.cards',
                    item: '.card',
                    gutter: 12
                });
                grid.mount();
            }

            // mount
            function update() {
                grid.mount();
            }

            document.addEventListener('DOMContentLoaded', init);
            window.addEventListener('resize', update);
        })();

    </script>
    <title>Requests</title>
</head>

<body>
<?php 
include"navbar.php";
?>
<div style="text-align: center;margin-top: 20px">
<form action="adminpanel.php" method="get">    
<input class="btn btn-outline-primary" style="display: inline;margin-right: 5px;margin-left: 5px;" type="submit" value="Vendor Requests" name="vendor">
<input class="btn btn-outline-primary" style="display: inline;margin-right: 5px;margin-left: 5px;" type="submit" value="User Requests" name="user">
</form>
</div>
<?php
?>
<?php
    if (isset($_GET['vendor']))
    {
    unset($_GET['user']);   
    echo "<h3 class='page-title'>Pending Vendor Requests</h3>";  
    global $database;
    $q="select * from vendor where status='inactive'";
    $stmt=$database->query($q);
    $data=$stmt->fetchAll(); 
    foreach ($data as $row)
     {
        echo "  
        <div class='cards'>
            <div class='card'>
                <div class='card-body'>
                    <a href=''>
                        <h5 class='card-title'>".$row['orgname']."</h5>
                    </a>

                    <p class='card-text'>
                        <b>Type:</b>&nbsp&nbsp".$row['orgtype']." <br>
                        <b>Helpline:</b>&nbsp&nbsp".$row['orgphoneno']."<br>
                        <b>Address:</b>&nbsp&nbsp".$row['orgaddress']." <br>
                        <b>City:</b>&nbsp&nbsp".$row['orgcity']."<br>
                        <b>Created At:</b>&nbsp&nbsp".$row['created_at']."</p>
                    <div style='margin-top: 0px;'>
                        <div style='display: inline-block;'>
                            <form action='acceptvendorprocess.php?orgid={$row['id']}' method='post'>
                                <button class='btn btn-outline-success mr-md-2' type='submit' name='vaccept'>Accept</button>
                            </form>
                        </div>
                        <div style='display: inline-block;'>
                            <form class='form-inline ' style='display: inline;' action='denyvendorprocess.php?orgid={$row['id']}' method='post'>
                                <input class='btn btn-outline-danger' style='display: inline;' type='submit' value='Deny' name='vdeny'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        }  
     }     
?>

<?php 
    if (isset($_GET['user']))
    {
    unset($_GET['vendor']);
    echo "<h3 class='page-title'>Pending User Requests</h3>";
    global $database;
    $q="select * from users where id!=0 and status='inactive'";
    $stmt=$database->query($q);
    $data=$stmt->fetchAll(); 
    foreach ($data as $row)
     {
        $vendor=new vendor();
        $vendor1=$vendor->find_vendor_by_id($row['vendor_id']);
        echo "  
        <div class='cards'>
            <div class='card'>
                <div class='card-body'>
                    <a href=''>
                        <h5 class='card-title'>$vendor1->orgname</h5>
                    </a>

                    <p class='card-text'>
                        <b>User Name:</b>&nbsp&nbsp".$row['firstname']."&nbsp".$row['lastname']."<br>
                        <b>Vendor Id:</b>&nbsp&nbsp".$row['vendor_id']." <br>
                        <b>Phone number:</b>&nbsp&nbsp".$row['phone_no']."<br>
                        <b>User Email:</b>&nbsp&nbsp".$row['email']." <br>
                        <b>Created At:</b>&nbsp&nbsp".$row['created_at']."</p>
                    <div style='margin-top: 0px;'>
                        <div style='display: inline-block;'>
                            <form action='acceptuserprocess.php?userid={$row['id']}' method='post'>
                                <button class='btn btn-outline-success mr-md-2' type='submit' name='uaccept'>Accept</button>
                            </form>
                        </div>
                        <div style='display: inline-block;'>
                            <form class='form-inline ' style='display: inline;' action='denyuserprocess.php?userid={$row['id']}' method='post'>
                                <button class='btn btn-outline-danger' style='display: inline;' type='submit' name='udeny'>Deny</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        }  
      }    
?>


<!--     <script type="text/javascript">
        function confirmmsg()
        {
           var proceed = confirm("Are you Sure about this?");
           if(proceed)
           {
                
           }
           else
           {
           }
        }
    </script> -->
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

