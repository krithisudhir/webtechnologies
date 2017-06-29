<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;background-color:#F8F8F8 ;}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="placementpage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to main page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
 
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="w3-quarter">
      <img src="abb.gif" alt="Sandwich" style="width:100%">
      <h3>ABB</h3>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="accent.png" alt="Steak" style="width:100%">
      <h3><br /><br />ACCENTURE</h3>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="aig.png" alt="Cherries" style="width:100%">
      <h3>AIG</h3>
      <p></p>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="akamai-logo.jpg" alt="Pasta and Wine" style="width:100%">
      <h3>AKAMAI</h3>
      <p></p>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="avaya.gif" alt="Popsicle" style="width:100%">
      <h3>AVAYA</h3>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="bosch.png" alt="Salmon" style="width:100%">
      <h3>BOSCH</h3>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="del.png" alt="Sandwich" style="width:100%">
      <h3>DELOITTE</h3>
      <p></p>
    </div>
    <div class="w3-quarter">
      <img src="hua.png" alt="Croissant" style="width:100%">
      <h3>HUAWEI</h3>
      <p></p>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="recruiters2.php" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="recruiters2.php" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  
  <hr id="about">
</div>

<script>
// Script to open and close sidebar
function placementpage() {
    window.location="placementpage.php"
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
