<!DOCTYPE html>
<html lang="en">
<head>
  <title>Experience Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- link for FontFamily
 -->

 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<style type="text/css">


.col-md-6{
        border: solid 1.5px #20B2AA;
      
        width: auto;
        background-color: rgba(0,255,170,.1);
        height: fit-content;
        border-radius: 5px;
        margin-right: 10px;
        margin-left: 10px;

      }
      .Profile{
        font-size: 22px;

        text-decoration: bold;
        width: Fit-content;
      }
      .hosInfo{
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
<body id="body" >
  
	<?php include"navbar.php";?>

<div class="container-fluid">
  <h2 class="text-center text-success"><center><u>Hospital Profile</u></center></h2><br>
    
  <div class="container" data-aos="fade-up-right" data-aos-duration="500">
    <div class="card1" data-aos="fade-up-right" data-aos-duration="500">
      
        <div class="row no-gutters" style="background-color: rgba(0,255,80,.1); padding-left: 20px;">
           
            <div class="col-sm-9" >
                <div class="card-block " >
                    
                 
                 <p class="Profile">Hospital Name:<span class="hosInfo"> Newlife hospital.</span></p>
                  <p class="Profile">Hospital Type:<span class="hosInfo"> Covid</span></p>
                   <p class="Profile">Address:<span class="hosInfo">  100 Feet Road, Tedi Bagiya Rd, Opposite Nari Nikaten, Kalindi Vihar, Agra, Uttar Pradesh 282004</span></p>
                    <p class="Profile">Helpline No:<span class="hosInfo"> 090275 08732</span></p>
                   
                </div>
            </div>
            <div class="col-sm-3" style="padding-left: 20px;">
              <img  src="ImageFolder\DoctorPro.jpg" class="img-fluid" alt="">

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
 <div class="container my-3" data-aos="fade-up-right" data-aos-duration="1000">
      <div class="row text-center">
        <div class="col-md-6  col-lg-2 text-success">
          <h5><u>Normal Bed </u></h5><br>
          <p  class="text-danger" id="confirmed"> <strong>55</strong></p><br>
        </div>
        <div class="col-md-6  col-lg-2 text-success">
          <h5><u>ICU </u></h5><br>
          <p class="text-danger" id="active"> <strong>15</strong></p><br>
        </div>
        <div class="col-md-6  col-lg-2 text-success">
          <h5><u>Ventilator </u></h5><br>
          <p  class="text-danger"id="recovered"><strong>16</strong></p><br>
        </div>
        <div class="col-md-6  col-lg-2 text-success">
          <h5><u>Oxygen </u> </h5><br>
          <p class="text-danger" id="deaths"><strong>88</strong></p><br>
        </div>
      </div>
    </div>
<br><br>

<hr>

	<?php include"footer.php";?>
</body>
</html>
