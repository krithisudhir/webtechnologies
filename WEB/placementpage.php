<?php
// Start the session
session_start();
?>
<html>
<title>Placement Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="placementspage.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidenav a,.w3-sidenav h4 {padding: 12px;}
.w3-bar a {
    padding-top: 12px;
    padding-bottom: 12px;
}
</style>
<body style="background-color:#F8F8F8   ;">

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">About</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Contact</a>
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>

<!-- Sidenav -->
<nav class="w3-sidenav w3-collapse w3-theme-blue w3-animate-left" style="z-index:3;width:250px;margin-top:51px;background-color:WhiteSmoke;" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-blue w3-hide-large" title="close menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 style="background-color:dodgerblue;color:white;"><b>Quick Links</b></h4>
   <a href="#log" class="w3-hover-blue">Login</a>
  <a href="insertdetails1.php" class="w3-hover-blue">Student Registration form</a>
  <a href="recruiters.php" class="w3-hover-blue">Our Recruiters</a>
  <a href="temp.html" class="w3-hover-blue">Statistics</a>
  <a href="index1.html" class="w3-hover-blue">Placement and Training</a>
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidenav is visible -->
<div class="w3-main" style="margin-left:250px">

  <div id="top" class="w3-row w3-padding-64"  >
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-black">Sri Jayachamarajendra College Of Engineering</h1>
      <p >Sri Jayachamarajendra College of Engineering was started in the year 1963, which was inaugurated by Dr.T.M.A.Pai, who was the then Chairman of the Academy of Education, Manipal. Initially it was under the auspices of the JSS Mahavidyapeetha, with the divine inspiration of His Holiness Jagadguru Lingaikya Dr.Sri Sri Shivarathri Rajendra Mahaswamigalavaru of Suttur Matt.The college has been identified as one of the Centres of the Network scheme envisaged by the Government of India, thus enabling active interactions with institutions such as the Indian Institute of Science, Bangalore. The college maintains a host of Computer Systems throughout the campus and operates 24X7 basis. Internet facility is also provided.
</p>
    </div>
    <div class="w3-third w3-container">
      <p class="w3-center"><img src="SJCE_New_Logo.jpg" width="300" length="200"/></p>
    </div>
  </div>

  <div class="w3-row">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-black">Placement and Training</h1>
      <p>With the blessing of His Holiness Jagadguru Sri Shivarathri Deshikendra Mahaswamiji , SJCE has become the most sought after destinations amongst the students. SJCE is one of the dream destinations and attracts highly meritorious students from various parts of Karnataka and also abroad. This is mainly attributed to many factors; one of them being in SJCE’s efforts to get the students placed in various organizations through campus placements organized by the Placement and Training Cell. SJCE has been in the forefront of activities bringing both corporate and companies close to the campus and encouraging then to establish facilities to cater to the needs of both faculty and students..</p>
    </div>
    <div class="w3-third w3-container">
      <p class="w3-center"><img src="interview.jpg" width="300" length="200"/></p>
    </div>
  </div>

  <div class="w3-row w3-padding-64" id="log" >
    <div class="w3-twothird w3-container" >
      <h1 class="w3-text-black">Login</h1>
      <p>
	  <div class="login-page">
  
<div class="form" id="inner">
    
<form class="register-form">
     
 <input type="text" placeholder="Name"/>
      
<input type="password" placeholder="Password"/>
      
<input type="text" placeholder="email address"/>
      
<button>create</button>
      
<p class="message">Already registered? 
<a href="#">Sign In</a></p>
    
</form>
    
<form class="login-form" action="check.php" method="post">
      
<input type="text" placeholder="USN" name="username"/>
      
<input type="password" placeholder="Password" name="password"/>
      
<input type="submit" value="login"/>
      
<p class="message">Not registered? <a href="insertdetails1.php" style="color:dodgerblue">Create an account</a></p>
    
</form>
</div>
    

  <a href="#top" class="w3-hover-black">Move to top</a>

<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
<script src="js/index.js">
</script>-->

</p>
   <!-- </div>
    <div class="w3-third w3-container">
      <p class="w3-border w3-padding-small w3-padding-32 w3-center"><img src="succ.jpg" width="300" length="250"/></p>
    </div>
  </div>-->

  

<!-- END MAIN -->

 </div>
 </div>
 

<script>
// Get the Sidenav
var mySidenav = document.getElementById("mySidenav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>