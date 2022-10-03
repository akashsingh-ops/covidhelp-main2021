<?php
session_start();
include_once("includes/database.php");
$selectedItems;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['selected'])) {
        $selectedItems = $_GET['selected'];
    }
    else {
        header("location:search.php?selected%5B%5D=ICU&selected%5B%5D=Normal+Beds&selected%5B%5D=Oxygen&selected%5B%5D=Ventilator");
    }
    // print_r($selectedItems);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="webstyle.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>



    <style>
        .filter {
            /* border: 1px solid black; */
            height: fit-content;
            width: fit-content;
            display: inline-block;
            margin-bottom: 10px;
            width: 130px;
            height: 30px;
            font-size: 14px;
            font-weight: bold;
            /*vertical-align: middle;*/
        }
        .filter span{
            margin-left: 3px;
            padding: 2px;
            vertical-align: middle;
        }
        .filter input{
            vertical-align: middle;
        }
    </style>
    <title>Search page</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid" style="text-align: center; margin-top: 20px;">
        <form action="search.php" style="padding:10px 0;margin-left: auto;margin-right: auto;">
            <?php
            global $database;
            $q = "SELECT * FROM checklist";
            $stmt = $database->query($q);
            $data = $stmt->fetchAll();
            foreach ($data as $row) {
                echo " <div class='filter'><input type='checkbox' name='selected[]' id=' class='filter-checkbox' style='width: 18px;height: 18px;' value='" . $row['checkbox'] . "' ><span>" . $row['checkbox'] . "</span>
                    </div>";
            }
            ?>
            <input type="submit" style="display: block;margin-left: auto;margin-right: auto;" value="Search" class="btn btn-success">
        </form>
    </div>
    <!-- <h3 class="page-title">Hospital List</h3> -->
    <?php
    // if (isset($_GET['selected'])) {

    // }
    ?>
    <div class="table-responsive-md" style="margin: 20px 0;">
        <table class="table table-hover table-bordered" style="text-align: center;letter-spacing: 1px;">
            <?php
            include_once "includes/checkList.php";
            $arr = array("Oxygen", "Ventilator", "ICU");
            // echo "<pre>";
            // print_r(CheckList::searchItems($arr));
            $searchList = CheckList::searchItems($selectedItems);


            ?>
            <thead style="font-size: 17px;">
                <tr>
                    <th scope="col">Sno.</th>
                    <th scope="col">Hospital Name</th>
                    <?php
                    // echo "<pre>";


                    foreach ($selectedItems as $thead) {
                        echo '<th scope="col">' . $thead . '</th>';
                    }

                    // print_r($heading);



                    ?>
                    <th scope="col">Helpline</th>

                </tr>
            </thead>
            <tbody style="font-size: 14px;font-weight: bold;">
                <?php
                // echo "<pre>";
                // print_r($searchList);
                $counter = 0;
                foreach ($searchList as $row) {
                    // print_r($row);

                ?>
                    <tr>
                        <th scope="row"><?php echo ++$counter;?></th>
                        <td><a href="hospitalprofile.php?hospital=<?php echo $row['vendor_id']; ?>"><?php echo $row['orgname']; ?></a></td>
                        <?php
                        for ($i = 2; $i < count($row) / 2 - 1; $i += 2) {
                            // echo " " . $row[$i] . " " . $row[$i + 1];


                        ?>
                            <td><?php echo "<span style='color:red;margin-right:4px;'>".(!empty($row[$i]) ? $row[$i] :'')."</span>"."<span style='font-size:17px;'>".(!empty($row[$i]) ?'/' :'--')."</span>"."<span style='color:green;margin-left:4px;'>".(!empty($row[$i + 1]) ? $row[$i + 1] :'')."</span>" ?></td>

                        <?php

                        }

                        ?>
                        <td ><?php echo $row[$i] ?></td>
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
 <?php include "footer.php"; ?>
</body>

</html>