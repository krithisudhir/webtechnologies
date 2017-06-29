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
.scrollit {
    overflow:scroll;
   
}
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  Upcoming Events</a>
	<!--<a href="samp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> Sample Questions</a>-->
	 <a href="applnstatus.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Status</a>
	 
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
 

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


$sql1="select cgpa,usn from student where fname= '$login_session' ";
$result1 = $db->query($sql1);
if ($result1->num_rows > 0) {
    
    while($row = $result1->fetch_assoc()) {
		$mygpa= $row['cgpa'];
$usn= $row['usn'];  		
		
		echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><h1 class='w3-xxxlarge' style='margin-left:50px;color:dodgerblue;'>Upcoming Companies:</h1><p style='margin-left:50px;'>My CGPA :". $mygpa."</p></div></div></div>";
	}
} else echo "0 results";

//---------check---//
$sqla="select applnid from  application where usn='$usn'";
$resulta = $db->query($sqla); // all applications by student

for($i=0;$i<($resulta->num_rows);$i++)
{
	$rowa=$resulta->fetch_assoc();
	$appid=$rowa["applnid"];//fetch applnid one by 1
	
	
	$sql2="select status,dateofupdation from applndetails where applnid='$appid' and status='placed'"; //fetch status for each applnid
	$result2=$db->query($sql2);
	$row2=$result2->fetch_assoc();
	global $count;
	if($result2->num_rows>0){$count+=1;}
	
	
}

//echo $count;

//-------------------//
if(isset($count)) {
if($count>=2){
	
	echo "<h4 style='color:green'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYou have already been placed!</h4>";
	
}
}

else {
$sqla="select applnid from application order by applnid desc limit 1 ";
$resulta = $db->query($sqla);
if ($resulta->num_rows > 0) {
    
    while($row = $resulta->fetch_assoc()) {
		
$appid= $row['applnid'];  		
	//echo $appid;	
	}
} else echo "0 results";

$sql = "SELECT company.cid,cname,company.category,profile,package,cutoff,dateofvisit,deadline from company where company.cid not in ( select cid from application where usn='$usn') and (company.cutoff<='$mygpa') and dateofvisit>curdate() and deadline>curdate() order by dateofvisit";
$result = $db->query($sql);


if ($result->num_rows > 0) {
	echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped' id='details'>
          <tr><th>Company Name</th><th>Company ID</th><th>Date Of Visit</th><th>Category</th><th>Job Profile</th><th>Cut-Off</th><th>Package</th><th>Deadline</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		  $id= $row['cid'];$cname= $row['cname'];$category=$row['category']; $profile=$row['profile']; $package= $row["package"];
		$cutoff=$row['cutoff']; $dateofvisit=$row['dateofvisit'];$deadline=$row['deadline'];
	//echo "<div class='w3-row-padding' style='margin:0 16px'><h5> List of upcoming companies:</h5></div>";
    // output data of each row

      //w3-striped
		
	
    echo"       <tr style='outline:thin solid;background-color:white'>
            
            <td>".$id."</td>
         
            <td>".$cname."</td>
         
			
            <td style='color:green;'><b>".$dateofvisit."</b></td>
          
            <td>".$category."</td>
        
            <td>".$profile."</td>
         
            <td>".$cutoff."</td>
       
            <td>".$package."</td>
        
			
            <td style='color:red'><b>".$deadline."</b></td>
         
       

		<td><a href='appln.php?appid=".$appid . "&usn=" . $usn . "&cid=". $row['cid'] ."&category=". $row['category']."'>APPLY NOW</a></td> </tr>
		";
	
    }
	echo " </table>
      </div>
    </div>
  </div>";
} else {
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>No recent updates</b>";
}
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
