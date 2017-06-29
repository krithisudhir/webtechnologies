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
    <a href="adpag2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> All student details</a>
		
    <a href="" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  Upcoming Companies</a>
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
<h1 class="w3-xxxlarge " style="margin-top:100px;margin-left:50px;color:dodgerblue;">Upcoming Companies</h1>
<p style="margin-left:50px"></p>
<label style="margin-left:15px">View by:</label><br/>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <select name="sorter" style="margin-left:15px">
	<option value="name">Name</option>
	<option value="package">Package</option>
	
	<option value="date">Date</option></select>
	
	
	<input type='submit' name= "submit"  class="w3-blue" value='ok'/></form>
 <?php
 if(isset($_POST['submit'])){
$val = $_POST['sorter'];	
if(strcmp($val,"name")==0){
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
$sqls = "SELECT count(*) from company";
	
	$results = $db->query($sqls);
	$row = $results->fetch_assoc();
	 $no = $row['count(*)'];
	echo "<h4 style='margin-left:16px'>Number Of Companies:".$no."</h4>";
	
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped'>
		<tr><th>Company Name</th><th>Company ID</th><th>Date Of Visit</th><th>Category</th><th>Job Profile</th><th>Cut-Off</th><th>Package</th><th>Deadline</th></tr>";

$sql = "SELECT cid,cname,category,profile,deadline,package,cutoff,dateofvisit FROM company where dateofvisit>curdate() and deadline>curdate() order by cname";
$result = $db->query($sql);
echo "<p><a href='insertcompany.php' style='margin-left:22px'>Add a new company</a></p>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		  $id= $row['cid'];$cname= $row['cname'];$category=$row['category']; $profile=$row['profile']; $package= $row["package"];
		$cutoff=$row['cutoff']; $dov=$row['dateofvisit'];$deadline=$row['deadline'];
	//echo "<div class='w3-row-padding' style='margin:0 16px'><h5> List of upcoming companies:</h5></div>";
    // output data of each row

      //w3-striped
		
	echo "
		 <tr style='outline:thin solid;background-color:white'>

           
            <td style='color:dodgerblue'><b>".$cname."</b></td>
         
            <td>".$id."</td>
        
         
            <td style='color:green'><b>".$dov."</b></td>
          
           
            <td>".$category."</td>
          
            <td>".$profile."</td>
         
            <td>".$cutoff."</td>
         
            <td>".$package."</td>
			
          <td style='color:red'><b>".$deadline."</b></td>";
     
      
  echo '<td><a style="margin-left:20px" href="editcompany.php?cid=' . $row['cid'] . '&cname='. $row['cname'] .'&deadline='. $row['deadline'].'&category='. $row['category'] .'&profile='. $row['profile'] .'&package='. $row['package'] .'&cutoff='. $row['cutoff'] .'&dov='. $row['dateofvisit'] .'">Edit</a></td></tr>';
	
  }
  echo "
	</table>
     </div>
    </div>
  </div>";
}

  else {
    echo "0 results";
}
$conn->close();
}
else if(strcmp($val,"date")==0){
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
$sqls = "SELECT count(*) from company";
	
	$results = $db->query($sqls);
	$row = $results->fetch_assoc();
	 $no = $row['count(*)'];
	echo "<h4 style='margin-left:16px'>Number Of Companies:".$no."</h4>";
	
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped'>
		<tr><th>Company Name</th><th>Company ID</th><th>Date Of Visit</th><th>Category</th><th>Job Profile</th><th>Cut-Off</th><th>Package</th><th>Deadline</th></tr>";

$sql = "SELECT cid,cname,category,profile,deadline,package,cutoff,dateofvisit FROM company where dateofvisit>curdate() and deadline>curdate() order by dateofvisit";
$result = $db->query($sql);
echo "<p><a href='insertcompany.php' style='margin-left:22px'>Add a new company</a></p>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		  $id= $row['cid'];$cname= $row['cname'];$category=$row['category']; $profile=$row['profile']; $package= $row["package"];
		$cutoff=$row['cutoff']; $dov=$row['dateofvisit'];$deadline=$row['deadline'];
	//echo "<div class='w3-row-padding' style='margin:0 16px'><h5> List of upcoming companies:</h5></div>";
    // output data of each row

      //w3-striped
		
	echo "
		 <tr style='outline:thin solid;background-color:white'>

           
            <td><b>".$cname."</b></td>
         
            <td>".$id."</td>
        
         
            <td style='color:green'><b>".$dov."</b></td>
          
           
            <td>".$category."</td>
          
            <td>".$profile."</td>
         
            <td>".$cutoff."</td>
         
            <td>".$package."</td>
			
          <td style='color:red'><b>".$deadline."</b></td>";
     
      
  echo '<td><a style="margin-left:20px" href="editcompany.php?cid=' . $row['cid'] . '&cname='. $row['cname'] .'&deadline='. $row['deadline'].'&category='. $row['category'] .'&profile='. $row['profile'] .'&package='. $row['package'] .'&cutoff='. $row['cutoff'] .'&dov='. $row['dateofvisit'] .'">Edit</a></td></tr>';
	
  }
  echo "
	</table>
     </div>
    </div>
  </div>";
}

  else {
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
$sqls = "SELECT count(*) from company";
	
	$results = $db->query($sqls);
	$row = $results->fetch_assoc();
	 $no = $row['count(*)'];
	echo "<h4 style='margin-left:16px'>Number Of Companies:".$no."</h4>";
	
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped'>
		<tr><th>Package</th><th>Company Name</th><th>Company ID</th><th>Date Of Visit</th><th>Category</th><th>Job Profile</th><th>Cut-Off</th><th>Deadline</th></tr>";

$sql = "SELECT cid,cname,category,profile,deadline,package,cutoff,dateofvisit FROM company where dateofvisit>curdate() and deadline>curdate() order by package";
$result = $db->query($sql);
echo "<p><a href='insertcompany.php' style='margin-left:22px'>Add a new company</a></p>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		  $id= $row['cid'];$cname= $row['cname'];$category=$row['category']; $profile=$row['profile']; $package= $row["package"];
		$cutoff=$row['cutoff']; $dov=$row['dateofvisit'];$deadline=$row['deadline'];
	//echo "<div class='w3-row-padding' style='margin:0 16px'><h5> List of upcoming companies:</h5></div>";
    // output data of each row

      //w3-striped
		
	echo "
		 <tr style='outline:thin solid;background-color:white'>

            <td style='color:dodgerblue'><b>".$package."</b></td>
            <td><b>".$cname."</b></td>
         
            <td>".$id."</td>
        
         
            <td style='color:green'><b>".$dov."</b></td>
          
           
            <td>".$category."</td>
          
            <td>".$profile."</td>
         
            <td>".$cutoff."</td>
         
           
			
          <td style='color:red'><b>".$deadline."</b></td>";
     
      
  echo '<td><a style="margin-left:20px" href="editcompany.php?cid=' . $row['cid'] . '&cname='. $row['cname'] .'&deadline='. $row['deadline'].'&category='. $row['category'] .'&profile='. $row['profile'] .'&package='. $row['package'] .'&cutoff='. $row['cutoff'] .'&dov='. $row['dateofvisit'] .'">Edit</a></td></tr>';
	
  }
  echo "
	</table>
     </div>
    </div>
  </div>";
}

  else {
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqls = "SELECT count(*) from company";
	
	$results = $db->query($sqls);
	$row = $results->fetch_assoc();
	 $no = $row['count(*)'];
	echo "<h4 style='margin-left:16px'>Number Of Companies:".$no."</h4>";
	
echo "<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
        
        <table class='w3-table w3-striped'>
		<tr><th>Company Name</th><th>Company ID</th><th>Date Of Visit</th><th>Category</th><th>Job Profile</th><th>Cut-Off</th><th>Package</th><th>Deadline</th></tr>";

$sql = "SELECT cid,cname,category,profile,deadline,package,cutoff,dateofvisit FROM company where dateofvisit>curdate() and deadline>curdate() order by cname";
$result = $db->query($sql);
echo "<p><a href='insertcompany.php' style='margin-left:22px'>Add a new company</a></p>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		  $id= $row['cid'];$cname= $row['cname'];$category=$row['category']; $profile=$row['profile']; $package= $row["package"];
		$cutoff=$row['cutoff']; $dov=$row['dateofvisit'];$deadline=$row['deadline'];
	//echo "<div class='w3-row-padding' style='margin:0 16px'><h5> List of upcoming companies:</h5></div>";
    // output data of each row

      //w3-striped
		
	echo "
		 <tr style='outline:thin solid;background-color:white'>

           
            <td style='color:dodgerblue'><b>".$cname."<b></td>
         
            <td>".$id."</td>
        
         
            <td style='color:green'><b>".$dov."</b></td>
          
           
            <td>".$category."</td>
          
            <td>".$profile."</td>
         
            <td>".$cutoff."</td>
         
            <td>".$package."</td>
			
          <td style='color:red'><b>".$deadline."</b></td>";
     
      
  echo '<td><a style="margin-left:20px" href="editcompany.php?cid=' . $row['cid'] . '&cname='. $row['cname'] .'&deadline='. $row['deadline'].'&category='. $row['category'] .'&profile='. $row['profile'] .'&package='. $row['package'] .'&cutoff='. $row['cutoff'] .'&dov='. $row['dateofvisit'] .'">Edit</a></td></tr>';
	
  }
  echo "
	</table>
     </div>
    </div>
  </div>";
}

  else {
    echo "0 results";
}
$conn->close();
 }
?>	

</div>

<!--echo '<td><a href="delstud.php?usn=' . $row['usn'] . '">Delete</a></td>';-->

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