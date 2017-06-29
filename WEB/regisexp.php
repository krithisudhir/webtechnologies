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
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
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
    <a href="" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i> All student details</a>
    <a href="companies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Upcoming Companies</a>
	 <a href="visitedcompanies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Visited Compannies</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Placements</a>
	    <a href="registrations.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Registrations</a>

	<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Statistics</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>List Of All Registrations received</b></h1>
<p style="margin-left:50px"></p>
<label style="margin-left:15px">Select Company:</label><br/>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!--<select name="sorter" style="margin-left:15px">
					<option value="gpa">CGPA</option>
					<option value="name">Name</option>
					<option value="usn">USN</option></select>-->
					
					
	<?php $sqls="SELECT cname FROM company";$res=$db->query($sqls);
if($res->num_rows >0){
echo '<select name="select" id="select">';
 echo '<option></option>';
for($i=0;$i<$res->num_rows;$i++){
	$rows=$res->fetch_assoc();
	     
      echo '<option value="'.$rows['cname'].'">'.$rows['cname'].'</option>';
  }echo '</select>';
}
?>

<input type='submit' name= "submit"  class="w3-blue" value='ok' onsubmit='fn()'/></form>


 
<?php


$sql2 = "SELECT cid,cname,category,profile,package from company where cid in(select cid from application)";

$result2 = $db->query($sql2);	
$sql="select fname,lname,usn,branch from student where usn in(select usn from application)";
$result = $db->query($sql);

$sql1 = "SELECT applnid,status,dateofupdation FROM applndetails where applnid in(select applnid from application)";
$result1 = $db->query($sql1);

for($i=0;$i<($result2->num_rows);$i++)
{
	$row2 = $result2->fetch_assoc();
	$row = $result->fetch_assoc();
	$row1 = $result1->fetch_assoc();
	$cid= $row2['cid'];
	$cname= $row2['cname'];
	$category= $row2['category'];
	$profile= $row2['profile'];
	$package= $row2['package'];  
	 $appid= $row1['applnid'];
		$usn = $row['usn'];
	   $fname = $row['fname'];
	   $lname = $row['lname'];
	    $branch = $row['branch'];
		$lu= $row1["dateofupdation"];$status= $row1["status"];
		





























if(isset($_POST['submit'])){
$val = $_POST['select'];	
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
$sql="select fname,lname from student where usn in (select usn from application where cid in (select cid from company where cname='$val' ))";
$result = $db->query($sql);
echo " <h1>".$val."</h1>";
for($i=0;$i<($result->num_rows);$i++)
{
	$row = $result->fetch_assoc(); $fname = $row['fname'];
	   $lname = $row['lname'];
	   //echo $fname.$lname;
	   echo" <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
	 
	 
            
            <p>".$i." ".$fname." ".$lname."</p><button id='myBtn'>View details</button>


<button id='myBtn'>Open Modal</button>

<!-- The Modal -->
<div id='myModal' class='modal'>

  <!-- Modal content -->
  <div class='modal-content'>
    <span class='close'>&times;</span>
 <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><table class='w3-table w3-striped w3-white'> <tr>
            <td></td>
            <td>Comapny name:</td>
            <td>".$cname."</td>
          </tr>
		   <tr>
            <td></td>
            <td>Company ID:</td>
            <td>".$cid."</td>
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
            <td>Name:</td>
            <td>".$fname."</td>
          </tr>
		 
		  <tr>
            <td></td>
            <td>Last Name:</td>
            <td>".$lname."</td>
          </tr>
		  <tr>
            <td></td>
            <td>USN:</td>
            <td>".$usn."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Branch:</td>
            <td>".$branch."</td>
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

echo "<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById('myBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = 'block';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>";
            
       
		

	
/*$sql2 = "SELECT cid,cname,category,profile,package from company where cid in(select cid from application)";

$result2 = $db->query($sql2);	
$sql="select fname,lname,usn,branch from student where usn in(select usn from application)";
$result = $db->query($sql);

$sql1 = "SELECT applnid,status,dateofupdation FROM applndetails where applnid in(select applnid from application)";
$result1 = $db->query($sql1);

for($i=0;$i<($result2->num_rows);$i++)
{
	$row2 = $result2->fetch_assoc();
	$row = $result->fetch_assoc();
	$row1 = $result1->fetch_assoc();
	$cid= $row2['cid'];
	$cname= $row2['cname'];
	$category= $row2['category'];
	$profile= $row2['profile'];
	$package= $row2['package'];  
	 $appid= $row1['applnid'];
		$usn = $row['usn'];
	   $fname = $row['fname'];
	   $lname = $row['lname'];
	    $branch = $row['branch'];
		$lu= $row1["dateofupdation"];$status= $row1["status"];
		
		echo" <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'><table class='w3-table w3-striped w3-white'> <tr>
            <td></td>
            <td>Comapny name:</td>
            <td>".$cname."</td>
          </tr>
		   <tr>
            <td></td>
            <td>Company ID:</td>
            <td>".$cid."</td>
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
            <td>Name:</td>
            <td>".$fname."</td>
          </tr>
		 
		  <tr>
            <td></td>
            <td>Last Name:</td>
            <td>".$lname."</td>
          </tr>
		  <tr>
            <td></td>
            <td>USN:</td>
            <td>".$usn."</td>
          </tr>
		  <tr>
            <td></td>
            <td>Branch:</td>
            <td>".$branch."</td>
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
		
		//echo ' <a href="editstatus.php?cname='. $row['cname']  .'&category='. $row['category'].'&profile='. $row['profile'] .'&package='. $row['package'] .'&appid='. $row['applnid'] . '&fname='. $row['fname'] .'&lname='.$row['lname'].'&usn='.$row['usn'].'&branch='.$row['branch'].'&status='.$row['status'].'&lu='.$row['dateofupdation'].'">Update status</a>';
		  
		
		echo '<td> <a href="editstatus.php?cname='. $cname  .'&cid='.$cid.'&category='. $category.'&profile='. $profile .'&package='. $package .'&appid='. $appid . '&fname='. $fname .'&lname='.$lname.'&usn='.$usn.'&branch='.$branch.'&status='.$status.'&lu='.$lu.'">Update status</a></td><br />';
		
		//echo $cname.$category. $profile. $package. $appid. $status. $lu." <br />";
	
}*/

}


	
?>
</html>
