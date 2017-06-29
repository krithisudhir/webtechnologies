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
    <a href="" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> All student details</a>
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
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>List Of All CS Students</b></h1>
<p style="margin-left:50px"></p>
 <label style="margin-left:15px">View by:</label><br/>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <select name="sorter" style="margin-left:15px">
	<option>
	</option>
					<option value="gpa">CGPA</option>
					<option value="name">Name</option>
					<option value="usn">USN</option></select>
					<input type='submit' name= "submit"  class="w3-blue" value='ok'/></form>



<?php

/*echo "<div class='w3-main' style='margin-left:300px;margin-top:43px;'>
 <label> Sort</label><br/><form action="">
    <select id='sorter'>
					<option value='gpa'>By CGPA</option>
					<option value='name'>By Name</option>
					<option value='usn'>By USN</option></select><input type='submit' value='ok'/></form>";*/
if(isset($_POST['submit'])){
$val = $_POST['sorter'];	
if($val=="gpa"){	
/*$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
   

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by cgpa";
$result = $db->query($sql);

if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) { $usn=$row["usn"];
        $name= $row["fname"];$lname=$row["lname"];$dob= $row["dob"];$branch= $row["branch"];
		$cgpa= $row["cgpa"];$puc= $row["puc"];$ssc= $row["sslc"];$email= $row["email"];
		$ph= $row["phone"];$backs=$row['backs'];$sscend=$row['sscend'];
		$sscstart= $row["sscstart"];$hscboard=$row['hscboard'];$sscboard=$row['sscboard'];
		$hscstart= $row["hscstart"];$bestart=$row['bestart'];$beend=$row['beend'];$hscend= $row["hscend"];$address= $row["address"];
	
    
	echo "
	
<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
       <br />
        <table class='w3-table w3-striped w3-white' id='details'> 
		<tr>
            <td></td>
            <td>CGPA:</td>
            <td style='color:blue'>".$cgpa."</td>
          </tr>
		<tr>
            <td></td>
            <td>USN:</td>
            <td>".$usn."</td>
          </tr>
          <tr>
            <td></td>
            <td>Name:</td>
            <td>".$name."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Last Name:</td>
            <td>".$lname."</td>
          </tr>
          <tr>
            <td></td>
            <td>Date of birth:</td><td>".$dob."</td>
          </tr>
          <tr>
            <td></td>
            <td>Branch:</td>
            <td>".$branch."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>Secondary Education:</td>
            <td>".$puc."%</td>
          </tr>
          <tr>
            <td></td>
            <td>10th</td>
            <td>".$ssc."</td>
          </tr>
          <tr>
            <td></td>
            <td>Email ID:</td>
            <td>".$email."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Phone no.</td>
            <td>".$ph."</td>
          </tr>
		  
		  
		  
		  
		  <tr>
            <td></td>
            <td>SSC Board:</td>
            <td style='color:blue'>".$sscboard."</td>
          </tr>
		<tr>
            <td></td>
            <td>SSC Start Year:</td>
            <td>".$sscstart."</td>
          </tr>
          <tr>
            <td></td>
            <td>SSC End Year:</td>
            <td>".$sscend."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC start year:</td>
            <td>".$hscstart."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC end year:</td>
            <td>".$hscend."</td>
          </tr>
          <tr>
            <td></td>
            <td>HSC board:</td>
            <td>".$hscboard."</td>
          </tr>
          <tr>
            <td></td>
            <td>B.E start year:</td>
            <td>".$bestart."</td>
          </tr>
		  <tr>
            <td></td>
            <td>B.E end year:</td>
            <td>".$beend."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Backs:</td>
            <td>".$backs."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Address:</td>
            <td>".$address."</td>
          </tr>
		  
		  
		
        </table><hr>
      </div>
    </div>
  </div>";
 
//echo '<td><a href="editstud.php?usn=' . $row['usn'] . '&name='. $row['fname'] .'&dob='. $row['dob'] .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .'&ph='. $row['phone'] .'">Edit</a></td><br />';
echo '<td><a href="editstud.php?usn=' . $row['usn'] .'&sscend='. $row['sscend'].'&backs='. $row['backs'] .'&sscstart='. $row['sscstart'] .'&sscboard='. $row['sscboard'] . '&hscboard='. $row['hscboard'] .'&hscend='. $row['hscend'] .'&hscstart='. $row['hscstart'] .'&bestart='. $row['bestart'] .'&beend='. $row['beend'] .'&address='. $row['address'] .'&lname='. $row['lname'] .'&name='. $row['fname'] .'&dob='. $row['dob'] .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .'&ph='. $row['phone'] .'">Edit</a></td><br />';
echo '<td><a href="delstud.php?usn=' . $row['usn'] . '">Delete</a></td>';

}

} else { //<tr><td></td><td><button onclick='enab()'>Edit</button></td><td></td></tr>
    echo "0 results";
}
	$conn->close();*/
}
else if($val=="usn"){
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


$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by usn";
$result = $db->query($sql);

if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {$usn=$row["usn"];
        $name= $row["fname"];$lname=$row["lname"];$dob= $row["dob"];$branch= $row["branch"];
		$cgpa= $row["cgpa"];$puc= $row["puc"];$ssc= $row["sslc"];$email= $row["email"];
		$ph= $row["phone"];$backs=$row['backs'];$sscend=$row['sscend'];
		$sscstart= $row["sscstart"];$hscboard=$row['hscboard'];$sscboard=$row['sscboard'];
		$hscstart= $row["hscstart"];$bestart=$row['bestart'];$beend=$row['beend'];$hscend= $row["hscend"];$address= $row["address"];
    
	echo "
	
<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
       <br />
        <table class='w3-table w3-striped w3-white' id='details'> 
		
		<tr>
            <td></td>
            <td>USN:</td>
            <td style='color:blue'>".$usn."</td>
          </tr>
          <tr>
            <td></td>
            <td>Name:</td>
            <td>".$name."</td>
          </tr>
          
		   <tr>
            <td></td>
            <td>Last Name:</td>
            <td>".$lname."</td>
          </tr>
          <tr>
            <td></td>
            <td>Date of birth:</td><td>".$dob."</td>
          </tr>
          <tr>
            <td></td>
            <td>Branch:</td>
            <td>".$branch."</td>
          </tr>
          <tr>
            <td></td>
            <td>CGPA:</td>
            <td>".$cgpa."</td>
          </tr>
          <tr>
            <td></td>
            <td>Secondary Education:</td>
            <td>".$puc."%</td>
          </tr>
          <tr>
            <td></td>
            <td>10th</td>
            <td>".$ssc."</td>
          </tr>
          <tr>
            <td></td>
            <td>Email ID:</td>
            <td>".$email."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Phone no.</td>
            <td>".$ph."</td>
          </tr>
		  
		   <tr>
            <td></td>
            <td>SSC Board:</td>
            <td style='color:blue'>".$sscboard."</td>
          </tr>
		<tr>
            <td></td>
            <td>SSC Start Year:</td>
            <td>".$sscstart."</td>
          </tr>
          <tr>
            <td></td>
            <td>SSC End Year:</td>
            <td>".$sscend."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC start year:</td>
            <td>".$hscstart."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC end year:</td>
            <td>".$hscend."</td>
          </tr>
          <tr>
            <td></td>
            <td>HSC board:</td>
            <td>".$hscboard."</td>
          </tr>
          <tr>
            <td></td>
            <td>B.E start year:</td>
            <td>".$bestart."</td>
          </tr>
		  <tr>
            <td></td>
            <td>B.E end year:</td>
            <td>".$beend."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Backs:</td>
            <td>".$backs."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Address:</td>
            <td>".$address."</td>
          </tr>
		  
		
        </table><hr>
      </div>
    </div>
  </div>";
 
echo '<td><a href="editstud.php?usn=' . $row['usn']  .'&sscend='. $row['sscend'].'&backs='. $row['backs'] .'&sscstart='. $row['sscstart'] .'&sscboard='. $row['sscboard'] . '&hscboard='. $row['hscboard'] .'&hscend='. $row['hscend'] .'&hscstart='. $row['hscstart'] .'&bestart='. $row['bestart'] .'&beend='. $row['beend'] .'&address='. $row['address'] .'&lname='. $row['lname'] .'&name='. $row['fname'] .'&dob='. $row['dob'] .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .'&ph='. $row['phone'] .'">Edit</a></td><br />';

echo '<td><a href="delstud.php?usn=' . $row['usn'] . '">Delete</a></td>';

}

} else { //<tr><td></td><td><button onclick='enab()'>Edit</button></td><td></td></tr>
    echo "0 results";
}
	$conn->close();
	
	
	
}
	
	else {
		
		
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


$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by fname";
$result = $db->query($sql);

if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) { $usn=$row["usn"];
        $name= $row["fname"];$lname=$row["lname"];$dob= $row["dob"];$branch= $row["branch"];
		$cgpa= $row["cgpa"];$puc= $row["puc"];$ssc= $row["sslc"];$email= $row["email"];
		$ph= $row["phone"];$backs=$row['backs'];$sscend=$row['sscend'];
		$sscstart= $row["sscstart"];$hscboard=$row['hscboard'];$sscboard=$row['sscboard'];
		$hscstart= $row["hscstart"];$bestart=$row['bestart'];$beend=$row['beend'];$hscend= $row["hscend"];$address= $row["address"];
	
    
	echo "
	
<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
       <br />
        <table class='w3-table w3-striped w3-white' id='details'> 
		 <tr>
            <td></td>
            <td>Name:</td>
            <td style='color:blue'>".$name."</td>
          </tr>
		<tr>
		        <td></td>
            <td>Last Name:</td>
            <td>".$lname."</td>
          </tr>
            <td></td>
            <td>USN:</td>
            <td>".$usn."</td>
          </tr>
         
          <tr>
            <td></td>
            <td>Date of birth:</td><td>".$dob."</td>
          </tr>
          <tr>
            <td></td>
            <td>Branch:</td>
            <td>".$branch."</td>
          </tr>
          <tr>
            <td></td>
            <td>CGPA:</td>
            <td>".$cgpa."</td>
          </tr>
          <tr>
            <td></td>
            <td>Secondary Education:</td>
            <td>".$puc."%</td>
          </tr>
          <tr>
            <td></td>
            <td>10th</td>
            <td>".$ssc."</td>
          </tr>
          <tr>
            <td></td>
            <td>Email ID:</td>
            <td>".$email."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Phone no.</td>
            <td>".$ph."</td>
          </tr>
		  
		  
		   <tr>
            <td></td>
            <td>SSC Board:</td>
            <td style='color:blue'>".$sscboard."</td>
          </tr>
		<tr>
            <td></td>
            <td>SSC Start Year:</td>
            <td>".$sscstart."</td>
          </tr>
          <tr>
            <td></td>
            <td>SSC End Year:</td>
            <td>".$sscend."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC start year:</td>
            <td>".$hscstart."</td>
          </tr>
          
          <tr>
            <td></td>
            <td>HSC end year:</td>
            <td>".$hscend."%</td>
          </tr>
          <tr>
            <td></td>
            <td>HSC board:</td>
            <td>".$hscboard."</td>
          </tr>
          <tr>
            <td></td>
            <td>B.E start year:</td>
            <td>".$bestart."</td>
          </tr>
		  <tr>
            <td></td>
            <td>B.E end year:</td>
            <td>".$beend."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Backs:</td>
            <td>".$backs."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Address:</td>
            <td>".$address."</td>
          </tr>
		  
		
        </table><hr>
      </div>
    </div>
  </div>";
 
//echo '<td><a href="editstud.php?usn=' . $row['usn'] . '&name='. $row['fname'] .'&dob='. $row['dob'] .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .'&ph='. $row['phone'] .'">Edit</a></td><br />';
echo '<td><a href="editstud.php?usn=' . $row['usn'] .'&backs='. $row['backs'] .'&sscend='. $row['sscend'].'&sscstart='. $row['sscstart'] .'&sscboard='. $row['sscboard'] . '&hscboard='. $row['hscboard'] .'&hscend='. $row['hscend'] .'&hscstart='. $row['hscstart'] .'&bestart='. $row['bestart'] .'&beend='. $row['beend'] .'&address='. $row['address'] .'&lname='. $row['lname'] .'&name='. $row['fname'] .'&dob='. $row['dob'] .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .'&ph='. $row['phone'] .'">Edit</a></td><br />';
echo '<td><a href="delstud.php?usn=' . $row['usn'] . '">Delete</a></td>';

}

} else { //<tr><td></td><td><button onclick='enab()'>Edit</button></td><td></td></tr>
    echo "0 results";
}
	$conn->close();
	
	
	
		
		
		
		
	}
	}
	
?>
<!--<p><a href="new.php">Add a new record</a></p>-->
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


