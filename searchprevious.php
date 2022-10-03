<?php
include('includes\database.php');
include('includes\vendor.php');
include('includes\users.php');
// include('checkAdminLogin.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://unpkg.com/minigrid@3.1.1/dist/minigrid.min.js"></script>


    <style>
        /*.filter {
            height: fit-content;
            width: fit-content;
            display: inline-block;
            margin-right: 20px;

        }

        input.filter-checkbox {
            width: 20px;
            height: 20px;
        }*/

        .card {
            border: 1px solid #c2c2c2;
            /* height: fit-content; */
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
            /* margin-right: auto;
            margin-left: auto; */
            /* padding-bottom: 10px; */

        }
    </style>
    <title>Search page</title>
</head>

<body>
<?php 
include"navbar.php";
?>

    <div class="container-fluid" style="margin-top: 20px;">
        <form action="search.php" class="form-inline" method="get">
            <input type="text" name="searchitem" list="resources" class="form-control search-bar" autocomplete="off" style="width: 80%;">
                <datalist id="resources">
                    <option value="Oxygen"></option>
                    <option value="Normal Beds"></option>
                    <option value="Ventilator"></option>
                    <option value="ICU"></option>
                </datalist>
            <input type="submit" value="Search" class="btn btn-outline-success" name="search">
        </form>
    </div>

<div class="container-fluid" style="margin-top: 50px;">
<?php 

if (isset($_GET['search']))
{
    $itemname=$_GET['searchitem'];
    if (!empty($itemname))
    {
    global $database;
     $q="SELECT * FROM vendor RIGHT JOIN resources ON vendor.id=resources.vendor_id where resource_name='$itemname'";
     $stmt=$database->query($q);
     $data=$stmt->fetchAll(); 
    foreach ($data as $row)
     {
        echo "
        <div class='card'>
            <div class='card-body'>
                <a href=''>
                    <h5 class='card-title'>".$row['orgname']."</h5>
                </a>
                <p class='card-text'>
                    <b>Organization Type:</b>&nbsp&nbsp".$row['orgtype']."<br>
                    <b>Item Name:</b>&nbsp&nbsp".$row['resource_name']."<br>
                    <b>Total Item:</b>&nbsp&nbsp".$row['total']."<br>
                    <b>Availability:</b>&nbsp&nbsp".$row['available']."<br>
                    <b>Helpline:</b>&nbsp&nbsp".$row['orgphoneno']."<br>
                    <b>Address:</b>&nbsp&nbsp".$row['orgaddress']."<br>
                    <b>City:</b>&nbsp&nbsp".$row['orgcity']."
                </p>
            </div>
        </div>
        ";
    }
    }
    else
    {
    global $database;
     $q="SELECT * FROM vendor RIGHT JOIN resources ON vendor.id=resources.vendor_id";
     $stmt=$database->query($q);
     $data=$stmt->fetchAll(); 
    foreach ($data as $row)
     {
        echo "
        <div class='card'>
            <div class='card-body'>
                <a href=''>
                    <h5 class='card-title'>".$row['orgname']."</h5>
                </a>
                <p class='card-text'>
                    <b>Organization Type:</b>&nbsp&nbsp".$row['orgtype']."<br>
                    <b>Item Name:</b>&nbsp&nbsp".$row['resource_name']."<br>
                    <b>Total Item:</b>&nbsp&nbsp".$row['total']."<br>
                    <b>Availability:</b>&nbsp&nbsp".$row['available']."<br>
                    <b>Helpline:</b>&nbsp&nbsp".$row['orgphoneno']."<br>
                    <b>Address:</b>&nbsp&nbsp".$row['orgaddress']."<br>
                    <b>City:</b>&nbsp&nbsp".$row['orgcity']."
                </p>
            </div>
        </div>
        ";
    }
    }

}
?>
    </div>


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