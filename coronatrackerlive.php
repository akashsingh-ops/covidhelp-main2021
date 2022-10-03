<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
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

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/996973c893.js"
      crossorigin="anonymous"
    ></script>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- My Stylesheet -->

    <!-- My jQuery -->
    <script src="main.js"></script>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <title>Covid-19 Tracker India</title>
    <style type="text/css">
      .col-3{
        border: solid 1.5px #20B2AA;
        margin-left: 0px;
        width: auto;
      }
    </style>
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
    var myChart = document.getElementById("myChart").getContext("2d");
    var chart = new Chart(myChart, {
      type: "line",
      data: {
        labels: states,
        datasets: [
          {
            label: "Confirmed Cases",
            data: confirmed,
            backgroundColor: "#f1c40f",
            minBarLength: 100,
          },
          {
            label: "Recovered",
            data: recovered,
            backgroundColor: "#2ecc71",
            minBarLength: 100,
          },
          {
            label: "Deceased",
            data: deaths,
            backgroundColor: "#e74c3c",
            minBarLength: 100,
          },
        ],
      },
      option: {},
    });
  });
});
    </script>
    <style type="text/css">
        

    </style>
  </head>
  <body>
    <?php include"navbar.php";?>
    <?php include"backtoup.php";?>
    <div class="container-fluid bg-light p-5 text-center my-3">
      <h1 class="text-success">Covid-19 Tracker India</h1>
      <h5 class="text-muted">
        Track of all the COVID-19 cases around the
        world.
      </h5>
    </div>

    <div class="container my-5" data-aos="fade-up-right" data-aos-duration="1000">
      <div class="row text-center">
        <div class="col-3 text-warning">
          <h5>Confirmed</h5>
          <p id="confirmed"></p>
        </div>
        <div class="col-3 text-info">
          <h5>Active</h5>
          <p id="active"></p>
        </div>
        <div class="col-3 text-success">
          <h5>Recovered</h5>
          <p id="recovered"></p>
        </div>
        <div class="col-3 text-danger">
          <h5>Deceased</h5>
          <p id="deaths"></p>
        </div>
      </div>
    </div>

    <div class="container bg-light p-3 my-5 text-center">
      <h5 class="text-info">"Prevention is the Cure."</h5>
      <p class="text-muted">Stay Indoors Stay Safe.</p>
    </div>

    <canvas id="myChart"></canvas>

 
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

   <hr>

<div class="container-fluid">
  <h2 class="text-center text-success"><center>Don’t panic and start preparing:</center></h2><br>
    
  <div class="container" data-aos="fade-up-right" data-aos-duration="500">
    <div class="card1" data-aos="fade-up-right" data-aos-duration="500">
      
        <div class="row no-gutters">
            <div class="col">
                <img style="width: 80%;height: 80%;" src="ImageFolder/proneposition.png" class="img-fluid" alt="">

            </div>
            <div class="col">
                <div class="card-block px-2">
                    <h5 class="text-info">COVID-19 Proning for Self care </h5>
                    <p class="card-text">The Union health ministry has advised lying on the stomach, or the prone position, to people suffering from covid-19 and in home isolation, Pronning is the process of turning a patient with precise, safe motions, from their back onto their abdomen (stomach), so that the person is lying face down.</p><br>
                    <p>Proning is required only when the patient feels difficulty in breathing and the SpO2 decreases below 94 (less than 94). Regular monitoring of SpO2, along with other signs like temperature, blood pressure and blood sugar, is important during home isolation.
</p>
                   
                </div>
            </div>
        </div>
     
    </div>
    <br>
    <div class="card1" data-aos="fade-up-right" data-aos-duration="500">
        <div class="row no-gutters">
            <div class="col">
                <img src="ImageFolder/exerciseCovid.jpg" class="img-fluid" alt="">
            </div>
            <div class="col">
                <div class="card-block px-2">
                    <h4 class="text-info">Yoga boosts immune system fight against COVID-19</h4>
                    <p class="card-text">“Coronavirus is said to damage the respiratory system, Pranayamam, the breathing exercise, improves functioning of lungs and helps pumping of oxygen-rich blood to all cells of the body. Plenty of online content is available to learn yoga,” says Mr. Kaleswara Rao.</p>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
<br><br>
   <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> -->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

<?php include"footer.php";?>
  </body>
</html>