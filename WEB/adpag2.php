
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
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
th,td {white-space:nowrap;}
.scrollit {
    overflow:scroll;
   
}
</style></head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-black w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <span class="w3-bar-item  w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
   <!-- <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>-->
    <div class="w3-col s8 w3-bar">
      <span> <h4>Welcome Admin! <h4>
	 
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
	<a href="notify.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Notify</a>
	 <a href="visitedcompanies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Visited Companies</a>
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
<h1 class="w3-xxxlarge" style="margin-top:100px;margin-left:50px;color:dodgerblue;">List Of All CS Students</h1>
<h5 style="margin-left:15px">Search by USN</h5>
<div class="button_box2">
<form class="form-wrapper-2 cf" action="first.php" method="POST">
<input style="margin-left:15px" type="text" placeholder="Search here..." required name="usn">
<button type="submit">Search</button>
</form>
</div>
<h5 style="margin-left:15px">Search by Name</h5>
<div class="button_box2">
<form class="form-wrapper-2 cf" action="second.php" method="POST">
<input style="margin-left:15px" type="text" placeholder="Search here..." required name="name">
<button type="submit">Search</button>
</form>
</div>
<p style="margin-left:50px"></p>
 <label style="margin-left:15px">View by:</label><br/>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <select name="sorter" style="margin-left:15px">
	<option value="usn">USN</option>
	<option value="name">Name</option>
	<option value="gpa">CGPA</option></select>
	
	
	<input type='submit' name= "submit"  class="w3-blue" value='ok'/></form>
<?php
	$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$sqls = "SELECT count(*) from student";
	
	$results = $db->query($sqls);
	$row = $results->fetch_assoc();
	 $no = $row['count(*)'];
	echo "<h4 style='margin-left:16px'>Number Of Students:".$no."</h4>";
	?>


<?php
if(isset($_POST['submit'])){
$val = $_POST['sorter'];	
if(strcmp($val,"usn")==0){	
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped' id='details'>
	<tr ><th>USN</th><th>First Name</th><th>Last Name</th><th>CGPA</th><th>DOB</th><th>Branch</th><th>Email</th><th>Phone</th><th>Address</th></tr>";

$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by usn";
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
    
	echo "
	

		<tr style='outline:thin solid;background-color:white'>
            
        <td style='color:dodgerblue'><b>".$usn."</b></td>
        
        <td>".$name."</td>
        <td>".$lname."</td>
		<td>".$cgpa."</td>
		<td>".$dob."</td>
		<td>".$branch."</td>
		<td>".$email."</td>
		<td>".$ph."</td>
        <td>".$address."</td>";
		  echo "<td><a href='editstud.php?usn=".$usn."'>Edit/View</a></td></tr>";
		
 

 

}
echo " </table>
      </div>
    </div>
  </div>";
} else {
    echo "0 results";
}
	$conn->close();

}
else if(strcmp($val,"name")==0){
	
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped' id='details'>
	<tr ><th>First Name</th><th>Last Name</th><th>USN</th><th>CGPA</th><th>DOB</th><th>Branch</th><th>Email</th><th>Phone</th><th>Address</th></tr>";

$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by fname";
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
    
	echo "
	

		<tr style='outline:thin solid;background-color:white'>
		
        <td style='color:dodgerblue'><b>".$name."</b></td>
        <td style='color:dodgerblue'><b>".$lname."</b></td>
          
        <td>".$usn."</td>
        
       
		<td>".$cgpa."</td>
		<td>".$dob."</td>
		<td>".$branch."</td>
		<td>".$email."</td>
		<td>".$ph."</td>
        <td>".$address."</td>";
		  echo "<td><a href='editstud.php?usn=".$usn."'>Edit/View</a></td></tr>";

}
echo " </table>
      </div>
    </div>
  </div>";
 

} else {
    echo "0 results";
}
	$conn->close();
	
	
}
else {
	
	$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped  id='details'>
	<tr ><th>CGPA</th><th>USN</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Branch</th><th>Email</th><th>Phone</th><th>Address</th></tr>";

$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by cgpa";
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
    
	echo "
	

		<tr style='outline:thin solid;background-color:white'>
          <td style='color:dodgerblue'><b>".$cgpa."</b></td> 
        <td >".$usn."</td>
         <td>".$name."</td>
        <td>".$lname."</td>  
		
		<td>".$dob."</td>
		<td>".$branch."</td>
		<td>".$email."</td>
		<td>".$ph."</td>
        <td>".$address."</td>";
		  echo "<td><a href='editstud.php?usn=".$usn."'>Edit/View</a></td></tr>";
		
      
/*echo "<td><a href='editstud.php?usn=".$usn."&ssscend=".$sscend."&backs=".$backs."&sscstart=".$sscstart."&sscboard=".$sscboard."&hscboard=".$hscboard."&hscend=".$hscend."
&hscstart=".$hscstart."&bestart=".$bestart."&beend=".$beend."&address=".$address."&lname=".$lname."&name=".$name."&dob=".$dob."&branch=".$branch."&cgpa=".$cgpa."
&puc=".$puc."&ssc=".$ssc."&email=".$email."&ph=".$ph."'>Edit/more</a></td></tr>";*/

/*<td><a href="editstud.php?usn=' . $row['usn']  .'&sscend='. $row['sscend'].'&backs='. $row['backs'] .'&sscstart='. $row['sscstart'] .'&sscboard='. 
//$row['sscboard'] . '&hscboard='. $row['hscboard'] .'&hscend='. $row['hscend'] .'&hscstart='. $row['hscstart'] .'&bestart='. $row['bestart'] 
.'&beend='. $row['beend'] .'&address='. $row['address'] .'&lname='. $row['lname'] .'&name='. $row['fname'] .'&dob='. $row['dob']
 .'&branch='. $row['branch'] .'&cgpa='. $row['cgpa'] .'&puc='. $row['puc'] .'&ssc='. $row['sslc'] .'&email='. $row['email'] .
 '&ph='. $row['phone'] .'">Edit/View more </a></td></tr>';*/
}
echo " </table>
      </div>
    </div>
  </div>";
 

} else {
    echo "0 results";
}
	$conn->close();
}
	
}
else
{
	
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "pc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped' id='details'>
	<tr ><th>USN</th><th>First Name</th><th>Last Name</th><th>CGPA</th><th>DOB</th><th>Branch</th><th>Email</th><th>Phone</th><th>Address</th></tr>";

$sql = "SELECT usn,fname,dob,branch,cgpa,puc,sslc,email,phone,lname,backs,sscstart,sscend,hscstart,hscend,bestart,beend,hscboard,sscboard,address from student order by usn";
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
    
	echo "
	

		<tr style='outline:thin solid;background-color:white'>
            
        <td style='color:dodgerblue'><b>".$usn."</b></td>
        
        <td>".$name."</td>
        <td>".$lname."</td>
		<td>".$cgpa."</td>
		<td>".$dob."</td>
		<td>".$branch."</td>
		<td>".$email."</td>
		<td>".$ph."</td>
        <td>".$address."</td>";
		  echo "<td><a href='editstud.php?usn=".$usn."'>Edit/View</a></td></tr>";
		
 

 

}
echo " </table>
      </div>
    </div>
  </div>";
} else {
    echo "0 results";
}
	$conn->close();

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


