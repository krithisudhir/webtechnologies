<?php
   include('session.php');
  
?>


<html>
<title>Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
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
      <span> <h1>Welcome <?php echo $login_session; ?>!</h1><br />
	  <!--<h2> Hello, <?php echo $name;?></h2>-->
	  </span>
      <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>-->
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> My details</a>
    <a href="upcoming.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Upcoming Events</a>
		<!--<a href="samp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> Sample Questions</a>-->
    <a href="applnstatus.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Status</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h1 class="w3-xxxlarge" style="margin-left:50px;color:dodgerblue;">My Profile:</h1>
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

$sql = "SELECT * FROM student where fname='$login_session'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $usn=$row["usn"];
        $name= $row["fname"];$lname=$row["lname"];$dob= $row["dob"];$branch= $row["branch"];
		$cgpa= $row["cgpa"];$puc= $row["puc"];$ssc= $row["sslc"];$email= $row["email"];
		$ph= $row["phone"];$backs=$row['backs'];$sscend=$row['sscend'];
		$sscstart= $row["sscstart"];$hscboard=$row['hscboard'];$sscboard=$row['sscboard'];
		$hscstart= $row["hscstart"];$bestart=$row['bestart'];$beend=$row['beend'];$hscend= $row["hscend"];$address= $row["address"];
		$usn=$row["usn"];
    
    }
	echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped w3-white'>
		 <tr>
            <td></td>
            <td><b>USN:</b></td>
            <td>".$usn."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Name:</b></td>
            <td>".$name."</td>
          </tr>
         
		  <tr>
            <td></td>
            <td><b>Last Name:</b></td>
            <td>".$lname."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Date of birth:</b></td>
            <td>".$dob."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Branch:</b></td>
            <td>".$branch."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>CGPA:</b></td>
            <td>".$cgpa."</td>
          </tr>
		 
		  <tr>
            <td></td>
            <td><b>SSC Score:</b></td>
            <td>".$ssc."</td>
          </tr>
		   <tr>
            <td></td>
            <td><b>SSC Board:</b></td>
            <td>".$sscboard."</td>
          </tr>
		            <tr>
            <td></td>
            <td><b>SSC Start Year:</b></td>
            <td>".$sscstart."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>SSC End Year:</b></td>
            <td>".$sscend."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Secondary Education:</b></td>
            <td>".$puc."%</td>
          </tr>
            <tr>
            <td></td>
            <td><b>HSC Board:</b></td>
            <td>".$hscboard."</td>
          </tr>

		  <tr>
            <td></td>
            <td><b>HSC Start Year:</b></td>
            <td>".$hscstart."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>HSC End Year:</b></td>
            <td>".$hscend."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Email ID:</b></td>
            <td>".$email."</td>
          </tr>
		  <tr>
            <td></td>
            <td><b>Phone no.</b></td>
            <td>".$ph."</td>
          </tr>
		   <tr>
            <td></td>
			
			
            <td><b>Address:</b></td>
            <td>".$address."</td>
          </tr>
         
		 
        
          <tr>
            <td></td>
            <td><b>B.E Start Year:</b></td>
            <td>".$bestart."</td>
          </tr>
          <tr>
            <td></td>
            <td><b>B.E End Year:</b></td>
            <td>".$beend."</td>
          </tr>
		   <tr>
            <td></td>
            <td><b>Backs:</b></td>
            <td>".$backs."</td>
          </tr>
		 
        </table>
      </div>
    </div>
  </div>";
} else {
    echo "0 results";
}
	$conn->close();
	
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

</body>
</html>
