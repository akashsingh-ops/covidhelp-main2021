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
require('includes/resources.php');
require ('includes/vendor.php');
if (isset($_SESSION['email'])) {
    $user = User::find_user_by_email($_SESSION['email']);
    $resources = Resources::find_resources_by_vendor_id($user->vendor_id);
    $vendor =Vendor::find_vendor_by_id($user->vendor_id);
}
else
{
    header('Location:index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        .page-title {
            margin: 20px;
            text-align: center;
        }

        .cupdate {
            width: 30px;
            height: 30px;
            border-radius: 15px;
            background-color: red;
            border: none;

        }

        .qty .count {
            margin-top: 3px;
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
        }

        .plus {
            margin-top: 3px;
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
        }

        .minus {
            margin-top: 3px;
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }

        .qty {
            width: 200px;
        }



        .minus:hover {
            background-color: #717fe0 !important;
        }

        .plus:hover {
            background-color: #717fe0 !important;
        }

        /*Prevent text selection*/
        span {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .count {
            border: 0;
            width: 2%;
        }

        nput::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input:disabled {
            background-color: white;
        }

        .tdr-margin {
            margin-top: 7px;
            /* border: 1px solid black; */
        }
    </style>

    <title>profile</title>
</head>

<body>
<?php 
include"navbar.php";
?>
    <center><div style="margin-top: 20px;"><a class="btn btn-outline-primary" href="addItem.php" role="button">Add Item</a><a class="btn btn-outline-primary" href="editProfile.php" role="button"  style="margin-left: 20px;">Edit Profile</a></div></center>
    <h3 class="page-title"><?php echo $vendor->orgname ?></h3>
    <div class="table-responsive-md">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Available</th>
                    <th scope="col">Total</th>
                    <th scope="col">One Unit Size</th>
                    <th scope="col">Measuring Unit</th>
                    <th scope="col">Update Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($resources)) {
                    $i=0;
                    foreach ($resources as $res) {
                ?>

                        <tr>
                            <th scope="row">
                                <div class="tdr-margin"><?php echo ++$i; ?></div>
                            </th>
                            <td>
                                <a href="">
                                    <div class="tdr-margin"><?php echo $res->resource_name ?></div>
                                </a>
                            </td>
                            <td>
                                <form action="availableUpdation.php" method="post">
                                    <div class="qty mt-6">
                                        <span class="minus bg-dark" onclick="ini(<?php echo $i ?>)">-</span>
                                        <input type="number" id="count<?php echo $i ?>" class="count" name="qty" value=<?php echo $res->available; ?>>
                                        <span class="plus bg-dark" onclick="ini(<?php echo $i ?>)">+</span>
                                        <input type="hidden" name="resource_id" value=<?php echo $res->resource_id ?>>
                                        <input type="submit" class="btn btn-outline-success " style="width: 77.5px;margin-left: 10px;" name="submit">
                                    </div>
                                </form>
                            </td>
                            <td class="tdr-margin">
                                <div class="tdr-margin"><?php echo $res->total ?></div>
                            </td>
                            <td class="tdr-margin">
                                <div class="tdr-margin"><?php echo $res->one_unit_size ?></div>
                            </td>
                            <td class="tdr-margin">
                                <div class="tdr-margin"><?php echo $res->measuring_unit ?></div>
                            </td>
                            <?php 
                            $rid=$res->resource_id;
                            $rname=$res->resource_name;
                            $ravilable=$res->available;
                            $rous=$res->one_unit_size;
                            $rtotal=$res->total;
                            $rmu=$res->measuring_unit; 
                            echo "
                            <td><a class='btn btn-outline-primary' href='updateItem.php?resid=$rid&resname=$rname&resavailable=$ravilable&resous=$rous&restotal=$rtotal&resmu=$rmu' role='button'>Update</a></td>
                            ";
                            ?>
                        </tr>

                <?php
                    }
                }
                else
                {
                    ?>
                            
                            <tr>
                                <td colspan=7>You have not added any item yet click on add item to add an item.</td>
                            </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    
    <script>
        var n;

        function ini(params) {
            n = params
        }

        $(document).ready(function() {
            $('#count' + n).prop('disabled', true);
            $(document).on('click', '.plus', function() {
                $('#count' + n).val(parseInt($('#count' + n).val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('#count' + n).val(parseInt($('#count' + n).val()) - 1);
                if ($('#count' + n).val() < 0) {
                    $('#count' + n).val(0);
                }
            });
        });
    </script>

</body>

</html>