<?php
   include('session.php');
?>
			
<html><head>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
function enab(){
var dom=document.getElementsByName("det");
for(var i=0;i<9;i++) {dom[i].setAttribute("onfocus",focus);}
}
</script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style></head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-black w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <span class="w3-right">SJCE PLACEMENT PORTAL</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   <!-- <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>-->
    <div class="w3-col s8 w3-bar">
      <span> <h1>Welcome Admin! <h1>
	 
	  </span>
     
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="adpag2.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> All student details</a>
    <a href="companies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Upcoming Companies</a>
	 <a href="visitedcompanies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Visited Compannies</a>
    <a href="placements.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Placements</a>
	    <a href="reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Registrations</a>

	<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Statistics</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>List Of All Placed Students</b></h1>
<p style="margin-left:50px"></p>
<?php

$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><table class='w3-table w3-striped'><tr><th>First Name</th><th>Last Name</th><th>USN</th><th>Company</th><th>Package</th><th>Category</th><th>Date</th></tr>";
$sql1="select fname,lname,usn from student where usn in(select usn from application where applnid in( select applnid from applndetails where status='placed'))";
$result1 = $db->query($sql1);


for($i=0;$i<$result1->num_rows;$i++){
	
    // output data of each row
   $row1 = $result1->fetch_assoc(); 
   $usn=$row1["usn"];
   $fname=$row1["fname"];
   $lname=$row1["lname"];
	

$sql2="select cname,package,category,cid from company where cid in(select cid from application where usn='$usn' and applnid in(select applnid from applndetails where status='placed'))";
$result2 = $db->query($sql2);
for($j=0;$j<$result2->num_rows;$j++)
{

	
    // output data of each row
  $row2 = $result2->fetch_assoc(); 
  $cname=$row2["cname"];$package=$row2["package"];$category=$row2["category"];$cid=$row2["cid"];



$sql3="select dateofupdation from applndetails where applnid in(select applnid from application where usn='$usn' and cid='$cid')";
$result3 = $db->query($sql3);


	
    // output data of each row
    $row3 = $result3->fetch_assoc(); $date=$row3["dateofupdation"];
echo" <tr style='outline:thin solid;background-color:white'>
           
           
            <td>".$fname."</td>
         
            
           
            <td>".$lname."</td>
         
		 
           
            <td>".$usn."</td>
         
            <td style='color:dodgerblue'><b>".$cname."</b></td>
          
            <td>".$package."</td>
         
            <td>".$category."</td>
          
            <td>".$date."</td>
          </tr>
		  <hr >";
         
}
}
echo "</table></div>
    </div>
  </div>"; 

	?>	
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

