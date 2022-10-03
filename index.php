<?php
session_start();
include('includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Experience Page</title>
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



  <script src="https://unpkg.com/minigrid@3.1.1/dist/minigrid.min.js"></script>


  <style>
    .fas {
      color: seagreen;
    }

    .col-sm-2 {

      border: solid 1.5px #20B2AA;
      margin-left: 25px;
      width: auto;
      height: fit-content;
      border-radius: 15px;
      background-color: rgba(135, 206, 250, .2);

      padding-left: 10px;
      padding-right: 10px;

      margin-bottom: 30px;


    }

    .value {
      margin-left: 15px;
    }

    h5 {
      color: seagreen;
    }

    @media only screen and (max-width: 991px) {}
  </style>
</head>

<body id="body">
  <?php include "navbar.php"; ?>
  <?php include "backtoup.php"; ?>
  <h3 class="  text-center my-4 text-success">United We stand Divided We Fall</h3>
  <hr style="padding: 0px;">

  <?php
  include_once "includes/resources.php";

  $beds = Resources::find_resource_by_name("Normal Beds");
  $oxygen = Resources::find_resource_by_name("Oxygen");
  $icu = Resources::find_resource_by_name("ICU");
  $ventilator = Resources::find_resource_by_name("Ventilator");




  ?>

  <div class="container" data-aos="fade-up-right" data-aos-duration="1000"style="letter-spacing: 1px;font-weight: bold;">
    <div class="row" style="align-items: center;text-align: center;justify-content: center;">
    <div class="card bg-light" style="width: 250px;margin:0 5px;">
      <div class="card-body text-center">
        <h4 class="card-title"><a href="search.php?selected%5B%5D=Normal+Beds">Normal Beds</a></h4>
        <p class="card-text">Total:&nbsp<?php echo $beds[0] ?></p>
        <p class="card-text">Available:&nbsp<?php echo $beds[1] ?></p>
      </div>
    </div>
    <div class="card bg-light" style="width: 250px;margin:0 5px;">
      <div class="card-body text-center">
        <h4 class="card-title"><a href="search.php?selected%5B%5D=ICU">ICU</a></h4>
        <p class="card-text">Total:&nbsp<?php echo $icu[0] ?></p>
        <p class="card-text">Available:&nbsp<?php echo $icu[1] ?></p>
      </div>
    </div>
    <div class="card bg-light" style="width: 250px;margin:0 5px;">
      <div class="card-body text-center">
        <h4 class="card-title"><a href="search.php?selected%5B%5D=Ventilator">Ventilator</a></h4>
        <p class="card-text">Total:&nbsp<?php echo $ventilator[0] ?></p>
        <p class="card-text">Available:&nbsp<?php echo $ventilator[1] ?></p>
      </div>
    </div>
    <div class="card bg-light" style="width: 250px;margin:0 5px;">
      <div class="card-body text-center">
        <h4 class="card-title"><a href="search.php?selected%5B%5D=Oxygen">Oxygen</a></h4>
        <p class="card-text">Total:&nbsp<?php echo $oxygen[0] ?></p>
        <p class="card-text">Available:&nbsp<?php echo $oxygen[1] ?></p>
      </div>
    </div>

    <div class="card bg-light" style="width: 250px;margin:10px 5px;">
      <div class="card-body text-center">
        <h4 class="card-title">Total cases</h4>
        <p class="card-text" id="confirmed" style="color: red;letter-spacing: 1px;font-weight: bold;font-size: 18px;"></p>
      </div>
    </div>

    <div class="card bg-light" style="width: 250px;margin:10px 5px;">
      <div class="card-body text-center">
        <h4 class="card-title">Active Cases</h4>
        <p class="card-text" id="active" style="color: orange;letter-spacing: 1px;font-weight: bold;font-size: 18px;"></p>
      </div>
    </div>

    <div class="card bg-light" style="width: 250px;margin:10px 5px;">
      <div class="card-body text-center">
        <h4 class="card-title">Recovered Cases</h4>
        <p class="card-text" id="recovered" style="color: green;letter-spacing: 1px;font-weight: bold;font-size: 18px;"></p>
      </div>
    </div>

  </div>
</div>
  <!--  <div class="sidebar wrapper col-sm-12 col-md-3" >
    <center style="margin-top: 20px;"><u ><strong > Important link</strong></u></center><center>   
    	<div container style="margin-left: 20px; margin-right: 30px; padding-bottom: 30px; margin-top: 30px;">
    		
<marquee  behavior="scroll"   onmouseover="this.stop();" onmouseout="this.start();"><span class="marquee">Click here  Register for Vaccination</span></marquee>




  </div></div> -->
  <hr>
  <div class="container" data-aos="fade-up-right" data-aos-duration="500">
    <div class="row">

      <div class="col-sm-5">
        <h2 class="guidline" align="center" style="font-size: 3.5vw;"><strong><u>Covid-19 Symptoms</u></strong></h2>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h6 style="margin-top: 10px; width: auto;" class="text-muted">Most common Symptoms:</h6>
              <ul>
                <li style="list-style: none;"><i class="fas fa-hand-point-right"></i>Fever</li>
                <li><i class="fas fa-hand-point-right"></i>Dry Cough</li>
                <li><i class="fas fa-hand-point-right"></i>Tiredness</li>
              </ul>
            </div>
            <div class="col-sm-12 col-md-12">
              <h6 class="text-muted">Less common symptoms:</h6>
              <ul>
                <li><i class="fas fa-hand-point-right"></i>Aches and Pains</li>
                <li><i class="fas fa-hand-point-right"></i>Sore throat</li>
                <li><i class="fas fa-hand-point-right"></i>Diarrhoea</li>
                <li><i class="fas fa-hand-point-right"></i>Headache</li>
                <li><i class="fas fa-hand-point-right"></i>A Rash on Skin</li>
              </ul>

            </div>
            <div class="col-sm-12 col-md-12" data-aos="fade-up-right" data-aos-duration="600">
              <h6 class="text-muted"> Serious symptoms:</h6>
              <ul>
                <li><i class="fas fa-hand-point-right"></i>Difficulty in breathing .</li>
                <li><i class="fas fa-hand-point-right"></i>Chest Pain or Pressure.</li>
                <li><i class="fas fa-hand-point-right"></i>Loss of Speech or movement.</li>
              </ul>

            </div>
          </div>

        </div>
        <div class="container">
          <div class="row">


            <button id="readmore" class="btn-change8" onclick="readmore()">Read More</button>
          </div>
        </div>
      </div>

      <hr>
      <div class="col-sm col-md-5">
        <img class="container-fluid" id="symptomsimg" style="height: 400px; max-width: 400px;margin-left: auto;margin-right: auto; margin-top: 25px;" src="ImageFolder\symptom.gif" alt="This will display an animated GIF" />

      </div>
    </div>
  </div>

  <div id="moreSys" class="container" data-aos="fade-up-right" data-aos-duration="600">
    <div class="row">

      <div class="col-sm-12">

        <div class="container">

          <div class="row" id="more" style="background-color: rgba(0,255,0,.1);padding: 20px;">
            <h4 class="guidline"><strong><u>When to seek emergency medical attention</u></strong></h4>
            <p class="text-muted">Look for emergency warning signs for COVID-19. If someone is showing any of these signs, seek emergency medical care immediately:
            </p><br>

            <ul>
              <li><i class="fas fa-hand-point-right"></i>Trouble breathing</li>
              <li><i class="fas fa-hand-point-right"></i>Persistent pain or pressure in the chest</li>
              <li><i class="fas fa-hand-point-right"></i>Loss of Speech or movement.</li>
              <li><i class="fas fa-hand-point-right"></i>Inability to wake or stay awake</li>
              <li><i class="fas fa-hand-point-right"></i>Pale, gray, or blue-colored skin, lips, or nail beds, </li>
              <li><i class="fas fa-hand-point-right"></i>Loss of Speech or movement.</li>
            </ul>
            <p>*This list is not all possible symptoms. Please call your medical provider for any other symptoms that are severe or concerning to you.
            </p>

            <p><strong>Call 911 or call ahead to your local emergency facility:,</strong> Notify the operator that you are seeking care for someone who has or may have <strong>COVID-19.</strong>
            </p>


          </div>

        </div>
        <div class="container">
          <div class="row">


            <button class="btn-change8" onclick="readless()">Read Less</button>
          </div>
        </div>
      </div>



    </div>
  </div>

  <hr>

  <div style="margin-top: 40px;" class="container" data-aos="fade-up-right" data-aos-duration="700">
    <h2 class="guidline" align="center" style="font-size: 3.5vw;"><strong><u>Covid-19 Home Precaution</u></strong></h2>
    <div class="row">
      <div class="col-sm-7" style="margin-top: 20px; margin-left: 0px;">
        <i style="margin-bottom: 20px;">Esay way to understand</i>
        <div class="embed-responsive embed-responsive-16by9">
          <video class="embed-responsive-item" src="ImageFolder\Precuationvideo.mp4" width="300px;" height="auto" controls=""></video>
        </div>
      </div>

      <div style="" class="col-sm-5">

        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <h6 class="text-muted">Important Precaution</h6>
              <ul>
                <li style="list-style: none;"><i class="fas fa-hand-point-right"></i>The person should wear a mask.</li>

                <li><i class="fas fa-hand-point-right"></i>Avoid close contact with people who are sick.</li>
                <li><i class="fas fa-hand-point-right"></i>Get vaccinated as soon as you are eligible.</li>
                <li><i class="fas fa-hand-point-right"></i>Maintain at least six feet of distance .</li>
                <li><i class="fas fa-hand-point-right"></i>Socialize outdoors.</li>
                <li><i class="fas fa-hand-point-right"></i>Avoid large gatherings.</li>


              </ul>

            </div>
            <div class="col-sm-12 col-md-12">
              <h6 style="margin-top: 10px;" class="text-muted">
                <p>It’s especially important to wash:</p>
              </h6>
              <ul>

                <li><i class="fas fa-hand-point-right"></i>Before eating or preparing food</li>
                <li><i class="fas fa-hand-point-right"></i>Before touching your face</li>
                <li><i class="fas fa-hand-point-right"></i>After using the restroom</li>
                <li><i class="fas fa-hand-point-right"></i>After caring for someone who’s sick</li>
                <li><i class="fas fa-hand-point-right"></i>After touching animals or pets</li>
              </ul>
              <div class="container">
                <div class="row">


                  <button class="btn-change8" id="readprebtn" style="margin-left: 10px;" onclick="readpre()">Read More</button>
                </div>
              </div>
            </div>


          </div>


        </div>

      </div>
      <div id="morepre" class="container" data-aos="fade-up-right" data-aos-duration="500">
        <div class="row">

          <div class="col-sm-12">

            <div class="container">

              <div class="row" id="more" style="background-color: rgba(0,255,0,.1);padding: 20px;">
                <h4 class="guidline"><strong><u>
                      <tr data-aos="fade-up-right" data-aos-duration="500">
                        <td class="text-info text-center">
                          <h2>
                            <center>Don’t panic and start preparing:</center>
                          </h2>
                        </td>
                      </tr>
                    </u></strong></h4>
                <p class="text-muted">Look for emergency warning signs for COVID-19. If someone is showing any of these signs, seek emergency medical care immediately:
                </p><br>
                <h4 class=" text-success "><u>How to manage at the time Covid</u></h4>
                <p>It’s very easy to start panicking when we watch the news or read articles about the spread of COVID-19, and the rising number of infected patients; also, the media can sensationalize an issue and make a bad situation seem more fatal than it is. In times like this, it’s imperative that you get your facts straight, be aware, and be prepared. Look at the possible outbreak, like you would a hurricane, if it hits then you will be prepared and if it doesn’t then great! </p><br>
                <h4 class=" text-success "><u>What if a loved one is infected by COVID-19?</u></h4>
                <p>Before you jump to conclusions and start panicking, you need to call your health care provider immediately. Once it’s confirmed that you’re infected with the disease, you will have to contact your local health board and find out the best hospital for evaluation and treatment. Patients who have a history of respiratory illness should seek emergency medical care, some of the intense symptoms are rapid heartbeat, decrease in blood pressure, very high or very low body temperatures, trouble breathing, and severe dehydration. You should inform your ER so that they can prepare for your arrival.</p>


              </div>

            </div>
            <div class="container">
              <div class="row">


                <button class="btn-change8" onclick="readleaspre()">Read Less</button>
              </div>
            </div>
          </div>



        </div>
      </div>
      <hr>

    </div>
  </div>
  <hr>
  <div class="container" data-aos="fade-up-right" data-aos-duration="500">
    <div class="row">

      <div class="col-sm-5">
        <h3 class="guidline" align="center" style="font-size: 3.5vw;"><strong><u>Fight with COVID-19</u></strong></h3>
        <div class="container-fluid">
          <div class="row" style="margin-bottom: 0px;padding-bottom: 0px;">
            <div class="col-12 col-md-12">
              <p class="FightPra">"Keep calm and carry on." "The only thing we have to fear is fear itself." "Don't worry, be happy."<br><br>
                If patient is successful in breaking self-isolation stage, half of the battle is won. Rest half of the battle can be won with the positive approach.<br><br>
                COVID 19 has created not only social distancing but also panic in the society. Words like ‘Pandemic’ or ‘Epidemic’ when widely spread it become the matter of serious threat to the mankind. </p>

            </div>


          </div>

        </div>

      </div>
      <hr>
      <div class="col-sm col-md-5">
        <img style="height: 400px; max-width: 350px;  margin-left: auto; margin-right: auto; " src="ImageFolder\warrior.gif" alt="This will display an animated GIF" />

      </div>
    </div>
  </div>

  <hr>
  <script type="text/javascript">
    function readmore() {
      document.getElementById("moreSys").style.display = "block";
      document.getElementById("readmore").style.display = "none";
      readmore
    }

    function readless() {
      document.getElementById("moreSys").style.display = "none";
    }

    function readpre() {
      document.getElementById("morepre").style.display = "block";
      document.getElementById("readprebtn").style.display = "none";
      readmore
    }

    function readleaspre() {
      document.getElementById("morepre").style.display = "none";
    }
  </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <script type="text/javascript">
      $(document).ready(function () {
  // Get JSON data from url
  $.getJSON("https://api.covid19india.org/data.json", function (data) {
    var states = [];
    var confirmed = [];
    var recovered = [];
    var deaths = [];

    var total_active;
    var total_confirmed;
    var total_recovered;
    var total_deaths;

    // Take the first element in statewise array and add the objects values into the above variables
    total_active = data.statewise[0].active;
    total_confirmed = data.statewise[0].confirmed;
    total_recovered = data.statewise[0].recovered;
    total_deaths = data.statewise[0].deaths;

    // The each loop select a single statewise array element
    // Take the data in that array and add it to variables
    $.each(data.statewise, function (id, obj) {
      states.push(obj.state);
      confirmed.push(obj.confirmed);
      recovered.push(obj.recovered);
      deaths.push(obj.deaths);
    });

    // Remove the first element in the states, confirmed, recovered, and deaths as that is the total value
    states.shift();
    confirmed.shift();
    recovered.shift();
    deaths.shift();

    // console.log(confirmed);
    $("#confirmed").append(total_confirmed);
    $("#active").append(total_active);
    $("#recovered").append(total_recovered);
    $("#deaths").append(total_deaths);

    // Chart initialization
    // var myChart = document.getElementById("myChart").getContext("2d");
    // var chart = new Chart(myChart, {
    //   type: "line",
    //   data: {
    //     labels: states,
    //     datasets: [
    //       {
    //         label: "Confirmed Cases",
    //         data: confirmed,
    //         backgroundColor: "#f1c40f",
    //         minBarLength: 100,
    //       },
    //       {
    //         label: "Recovered",
    //         data: recovered,
    //         backgroundColor: "#2ecc71",
    //         minBarLength: 100,
    //       },
    //       {
    //         label: "Deceased",
    //         data: deaths,
    //         backgroundColor: "#e74c3c",
    //         minBarLength: 100,
    //       },
    //     ],
    //   },
    //   option: {},
    // });
  });
});
    </script>

  <script src="script.js" type="text/javascript"></script>
  <?php include "footer.php"; ?>
</body>

</html>