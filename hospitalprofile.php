<?php
session_start();
if (!isset($_GET["hospital"])) {
  header("location:search.php?selected%5B%5D=ICU&selected%5B%5D=Normal+Beds&selected%5B%5D=Oxygen&selected%5B%5D=Ventilator");
} else {
  include_once "includes/vendor.php";
  $vendor = Vendor::find_vendor_by_id($_GET["hospital"]);

  if (empty($vendor)) {
    header("location:search.php?selected%5B%5D=ICU&selected%5B%5D=Normal+Beds&selected%5B%5D=Oxygen&selected%5B%5D=Ventilator");
  }
}
require('includes/resources.php');
$resources = Resources::find_resources_by_vendor_id($_GET["hospital"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Experience Page</title>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <link rel="stylesheet" type="text/css" href="websytle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- link for FontFamily
 -->

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
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <style type="text/css">
    .col-md-6 {
      border: solid 1.5px #20B2AA;

      width: auto;
      background-color: rgba(0, 255, 170, .8);
      height: fit-content;
      border-radius: 5px;
      margin-right: 10px;
      margin-left: 10px;

    }

    .Profile {
      font-size: 18px;

      text-decoration: bold;
      width: Fit-content;
      margin-left: 20px;
      margin-top: 25px;
    }

    .hosInfo {
      font-size: 16px;
      text-decoration: none;
      padding-left: 10px;

    }
  </style>
  <script src="https://unpkg.com/minigrid@3.1.1/dist/minigrid.min.js"></script>


  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&family=Nunito&display=swap');
  </style>
</head>

<body id="body">

  <?php include "navbar.php"; ?>

  <div class="container-fluid">
    <h2 class="text-center text-success" style="margin-top: 20px;">
      <center><u>Profile</u></center>
    </h2><br>

    <div class="container" data-aos="fade-up-right" data-aos-duration="500" style="margin-top: 5px;">
      <div class="card1" data-aos="fade-up-right" data-aos-duration="500">

        <div class="row no-gutters" style="background-color: rgba(0,255,80,.1); padding: 10px;">

          <div class="col-sm-9">
            <div class="card-block">
              <p class="Profile">Name:<span class="hosInfo"> <?php echo $vendor->orgname; ?></span></p>
              <p class="Profile">Type:<span class="hosInfo"> <?php echo $vendor->orgtype; ?></span></p>
              <p class="Profile">Address:<span class="hosInfo"><?php echo $vendor->orgaddress; ?></span></p>
              <p class="Profile">Helpline No:<span class="hosInfo"> <?php echo $vendor->orgphoneno; ?></span></p>

            </div>
          </div>
          <div class="col-sm-3" style="padding-left: 20px;">
            <img width="200px" src="ImageFolder\doctor.gif" class="img-fluid" alt="">

          </div>
        </div>

      </div>
      <br><br>

    </div>
  </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <div class="container" data-aos="fade-up-right" data-aos-duration="500" style="letter-spacing: 1px;font-weight: bold;margin-top: 1px;">
    <div class="row" style="align-items: center;text-align: center;justify-content: center;">
      <div class="card bg-light" style="width: 250px;margin:5px 5px;">
        <div class="card-body text-center">
          <h4 class="card-title" style="border: 1px solid #dddddd;padding-bottom: 5px;border-radius: 2px;">Normal Beds</h4>
          <p class="card-text" style="color: green;font-size: 14px">
            <?php
            foreach ($resources as $resource) {
              if ($resource->resource_name == "Normal Beds") {
                echo $resource->available;
              }
            }
            ?></p>
        </div>
      </div>
      <div class="card bg-light" style="width: 250px;margin:5px 5px;">
        <div class="card-body text-center">
          <h4 class="card-title" style="border: 1px solid #dddddd;padding-bottom: 5px;border-radius: 2px;">ICU</h4>
          <p class="card-text" style="color: green;font-size: 14px">
            <?php
            foreach ($resources as $resource) {
              if ($resource->resource_name == "ICU") {
                echo $resource->available;
              }
            }
            ?>
          </p>
        </div>
      </div>
      <div class="card bg-light" style="width: 250px;margin:5px 5px;">
        <div class="card-body text-center">
          <h4 class="card-title" style="border: 1px solid #dddddd;padding-bottom: 5px;border-radius: 2px;">Ventilator</h4>
          <p class="card-text" style="color: green;font-size: 14px">
            <?php
            foreach ($resources as $resource) {
              if ($resource->resource_name == "Ventilator") {
                echo $resource->available;
              }
            }
            ?>
          </p>
        </div>
      </div>
      <div class="card bg-light" style="width: 250px;margin:5px 5px;">
        <div class="card-body text-center">
          <h4 class="card-title" style="border: 1px solid #dddddd;padding-bottom: 5px;border-radius: 2px;">Oxygen</h4>
          <p class="card-text" style="color: green;font-size: 14px">
          <?php
            foreach ($resources as $resource) {
              if ($resource->resource_name == "Oxygen") {
                echo $resource->available;
              }
            }
            ?>
        </p>
        </div>
      </div>
    </div>
  </div>
  <br><br>



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

        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($resources)) {
          $i = 0;
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
                <?php echo $res->available; ?>
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
              $rid = $res->resource_id;
              $rname = $res->resource_name;
              $ravilable = $res->available;
              $rous = $res->one_unit_size;
              $rtotal = $res->total;
              $rmu = $res->measuring_unit;

              ?>
            </tr>

          <?php
          }
        } else {
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
  <hr>
  <?php include "footer.php"; ?>
</body>

</html>