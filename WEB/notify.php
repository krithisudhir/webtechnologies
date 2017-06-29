
<?php
   include('session.php');
  
?>
<html><head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="w3-theme-black.css">

<style>
body,h1 {font-family: "Poppins", sans-serif;color:white;background-color:#F8F8F8 ;}
body {font-size:16px;color:black;}
label,input,select,button,p{margin-left:35px;}

</style>
</head>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="adpag2.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to main page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
<body>
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:60px;">Notify All</h1>
<p style="margin-left:50px"></p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
<form action="mailer/mail10.php" method="post">
	
 <label style="margin-left: 50px" > Subject</label><br/>
 <input style="margin-left: 50px" class="w3-input w3-border" id="sub" name="sub" required="required" type="text" title= "Please enter subject" placeholder="Subject"/>
 <br />
 <br/>
 <textarea style="margin-left: 50px" rows="10" cols="50" color="grey" name='content'></textarea>
<input type="submit" class="w3-button  w3-blue w3-margin-bottom" value="Send"/>
</form>

</div>



<script>


// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>


