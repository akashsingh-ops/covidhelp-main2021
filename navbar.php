<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Static Navbar</title>

<link rel="stylesheet" type="text/css" href="webstyle.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
   
</style>

</head> -->
<body onscroll="onscroll()" on>
<header>
        <nav id="nav_top" class="navbar navbar-expand-lg navbar-light  ">
            <a class="navbar-brand" href="index.php">Covid</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <!-- <li class="nav-item ">
                        <a id="hos1" class="nav-link active" href="hospitallist.php">Hospital</a>
                    </li> -->
                    <li class="nav-item active">
                        <a  id="hos2" class="nav-link active" href="search.php" >Availability</a>
                    </li>
                    <li class="nav-item active">
                        <a id="hos3" class="nav-link active" href="coronatrackerlive.php" >Covid-Info</a>
                    </li>
                    <li class="nav-item active">
                        <a id="hos4" class="nav-link active" href="covidwarrior.php" >Covid-Worrior</a>
                    </li>
                </ul>

                <!-- User ID if Logged in -->
                <?php
                if(isset($_SESSION['email']))
                {    
                ?>
                <a class='mr-2' style="margin-right: 0%; margin-left: auto;color:black;" href="#"><b><?php echo $_SESSION['email']; ?></b></a>
						<a href="logout.php"><button id="login" class="btn btn-primary">Logout</button></a>
                <?php
                } 
                else
                {  
                ?>        
                <!-- When not Logged in -->
                <!-- <form id="loginform" class="navForn" action=""> -->
                    <!-- <input  type='hidden' > -->
                    <div id="loginform" style="margin-right: 0%; margin-left: auto;">
                    <a href="loginform.php"><button id="login" class="btn btn-primary">Login</button></a>
                <!-- </form> -->
                <!-- <form class="navForn" action=""> -->
                    <!-- <input type='hidden' > -->
                    <a href="userRegistration.php"><button id="signup" class="btn btn-success">UserSignUp</button></a>
                    <a href="vendorRegistration.php"><button id="signup" class="btn btn-success">VendorSignUp</button></a>
                    </div>
                <!-- </form> -->
                <?php
                }
                ?>

            </div>
            </li>

            </div>
        </nav>

    </header>
<script type="text/javascript">
	// document.addEventListner("DOMContentLoaded",function(){
	// 	window.addEventListner('scroll',function(){
		function onscroll(){
			if (window.scrollY>50) {
				var a=document.getElementById('nav_top').classList.add('fixed-top');
				navbar_height=document.querySelector('.navbar').offsetHeight;
				document.body.Style.padddingTop=navbar_height+'px';
				a.style.backgroundColor="red";
			}
			else{
				document.getElementById('nav_top').classList.remove('fixed-top');
				
			}
		}
	

$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 50) {
	    $(".navbar").css("background" , "honeydew");  
	  }
	  else{
		  $(".black").css("background" , "#333");  	
	  }
  })
})
$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll < 50) {
	    $(".navbar").css("background" , "white");
	  }
	  else{
		  $(".black").css("background" , "#333");  	
	  }
  })
})
</script>
</body>
<!-- </html> -->