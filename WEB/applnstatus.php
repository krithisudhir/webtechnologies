<?php
   include('session.php');
?>
<html>
<title>Upcoming Comapnies</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
th,td{white-space:nowrap;}
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
      <span>
	  <h1>Welcome <?php echo $login_session; ?>!</h1><br />
	 
</span>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="profilestyled.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> My details</a>
    <a href="upcoming.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Upcoming Events</a>
	<!--<a href="samp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> Sample Questions</a>-->
	 <a href="" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  Status</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><h1 class='w3-xxxlarge ' style='margin-left:50px;color:dodgerblue;'>Your Application Status</h1><p style='margin-left:50px;'></p></div></div></div>
 
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

$sql1="select usn from student where fname= '$login_session' ";
$result1 = $db->query($sql1);
if ($result1->num_rows > 0) {
    
    while($row = $result1->fetch_assoc()) {
		
	$usn= $row['usn'];  	}
}	
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>";



/*$sql2 = "SELECT cid,cname,category,profile,package from company where cid in(select cid from application,applndetails where usn='$usn' and application.applnid=applndetails.applnid)";

$result2 = $db->query($sql2);	
$sql = "SELECT applnid,status,dateofupdation FROM applndetails where applnid in(select applnid from application where usn='$usn')";
$result = $db->query($sql);

for($i=0;$i<($result2->num_rows);$i++)
{
	$row2 = $result2->fetch_assoc();
	$row = $result->fetch_assoc();
	$cid= $row2['cid'];
	$cname= $row2['cname'];
	$category= $row2['category'];
	$profile= $row2['profile'];
	$package= $row2['package'];  
	 $appid= $row['applnid'];
		$status= $row["status"];
		$lu= $row["dateofupdation"];
		
		echo" <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><table class='w3-table w3-striped w3-white'> <tr>
            <td></td>
            <td>Comapny name:</td>
            <td>".$cname."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Category:</td>
            <td>".$category."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Profile:</td>
            <td>".$profile."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Package:</td>
            <td>".$package."</td>
          </tr>
		             <tr>
            <td></td>
            <td>Application ID:</td>
            <td>".$appid."</td>
          </tr>
		  
		  <tr>
            <td></td>
            <td>Status:</td>
            <td style='color:blue'><b>".$status."</b></td>
          </tr>
          <tr>
            <td></td>
            <td>Last Updated:</td>
            <td>".$lu."</td>
          </tr>         

		  </table>
		  <hr />
      </div>
    </div>
  </div>";
		
		
		
		
		//echo $cname.$category. $profile. $package. $appid. $status. $lu." <br />";
	
}*/

/*if ($result2->num_rows>0) {
   
    while($row2 = $result2->fetch_assoc() ) {
       
	$cid= $row2['cid'];
	$cname= $row2['cname'];
	$category= $row2['category'];
	$profile= $row2['profile'];  	
	
		$package= $row2['package'];  
		echo" <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><table class='w3-table w3-striped w3-white'> <tr>
            <td></td>
            <td>Comapny name:</td>
            <td>".$cname."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Category:</td>
            <td>".$category."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Profile:</td>
            <td>".$profile."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Package:</td>
            <td>".$package."</td>
          </tr>
		  </table>";
         
	}	
	
} else echo "no results";

if ($result->num_rows>0) {
	
		while($row=$result->fetch_assoc()){
		
	
		 $appid= $row['applnid'];
		$status= $row["status"];
		$lu= $row["dateofupdation"];
    
	echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped w3-white'>
          <tr>
            <td></td>
            <td>Application ID:</td>
            <td>".$appid."</td>
          </tr>
		  
		  <tr>
            <td></td>
            <td>Status:</td>
            <td>".$status."</td>
          </tr>
          <tr>
            <td></td>
            <td>Last Updated:</td>
            <td>".$lu."</td>
          </tr>
         
        </table>
		<hr />
      </div>
    </div>
  </div>";
}
	 

}
else {
    echo "0 results";
}
	$conn->close();*/
	
$sql1="select applnid from  application where usn='$usn'";
$result1 = $db->query($sql1);
echo "<table class='w3-table'><tr><th>Application ID</td><th>Company Name</th><th>Category</th><th>Profile</th><th>Package</th><th>Status</th><th>Date</th></tr>";
for($i=0;$i<($result1->num_rows);$i++)
{
	$row1=$result1->fetch_assoc();
	$appid=$row1["applnid"];//fetch applnid one by 1
	
	
	$sql2="select status,dateofupdation from applndetails where applnid='$appid'"; //fetch status for each applnid
	$result2=$db->query($sql2);
	$row2=$result2->fetch_assoc();
	
	$status=$row2["status"];$date=$row2["dateofupdation"];
	
	
	$sql3="select cname,category,package,profile from company where cid in(select cid from application where applnid='$appid')";//for each appln id fetch company details
	$result3=$db->query($sql3);
	$row3=$result3->fetch_assoc();
	$cname=$row3["cname"];$category=$row3["category"];$package=$row3["package"];$profile=$row3["profile"];
	
	echo "

         <tr style='outline:thin solid;background-color:white'> <td>".$appid."</td>
		   <td>".$cname."</td>

            <td>".$category."</td>
        
            <td>".$profile."</td>
          <td>".$package."</td>
            <td style='color:blue'><b>".$status."</b></td>
         
            <td>".$date."</td>
        
           
          </tr>
		 ";
         

	
	
	
}
echo " </table></div>
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

</body>
</html>

