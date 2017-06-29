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
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 10; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 100;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
button{
	background-color: Transparent;
    background-repeat:no-repeat;

    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;

		
	}
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
    <a href="adpag2.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i> All student details</a>
	
    <a href="companies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Upcoming Companies</a>
	<a href="notify.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Notify</a>
	 <a href="visitedcompanies.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Visited Compannies</a>
    <a href="placements.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Placements</a>
	    <a href="reg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Registrations</a>

	<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Statistics</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h1 class="w3-xxxlarge" style="margin-top:100px;margin-left:50px;color:dodgerblue;">List Of All Placed Students</h1>
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
echo " <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUSN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCompany &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPackage &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCategory&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date</b>";
/*echo " 
<div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>
	  <table class='w3-table w3-striped w3-white'>
<tr>
	      
       <th style='position: absolute;left:450px'>USN</th><th style=' position: absolute;left:600px'>Company Name</th>
	   <th style='position: absolute;left:700px'>Package</th><th style='position: absolute;left:800px'>Category</th>
	   <th style='position: absolute;left:900px'>Date</th></tr>";*/

$sql1="select fname,lname,usn from student where usn in(select usn from application where applnid in( select applnid from applndetails where status='placed'))";
$result1 = $db->query($sql1);


for($i=0;$i<$result1->num_rows;$i++){
	
    // output data of each row
   $row1 = $result1->fetch_assoc(); 
   $usn=$row1["usn"];
   $fname=$row1["fname"];
   $lname=$row1["lname"];
	

$sql2="select cname,dateofvisit,package,category,cid from company where cid in(select cid from application where usn='$usn' and applnid in(select applnid from applndetails where status='placed'))";
$result2 = $db->query($sql2);
for($j=0;$j<$result2->num_rows;$j++)
{

	
    // output data of each row
  $row2 = $result2->fetch_assoc(); 
  $cname=$row2["cname"];$package=$row2["package"];$category=$row2["category"];$cid=$row2["cid"];$dateofvisit=$row2["dateofvisit"];



$sql3="select dateofupdation from applndetails where applnid in(select applnid from application where usn='$usn' and cid='$cid')";
$result3 = $db->query($sql3);


	
    // output data of each row
    $row3 = $result3->fetch_assoc(); $date=$row3["dateofupdation"];
	//-----------------------------------------------------------------
	$sqlstud="select * from student where usn='$usn'";
$studdetails=$db->query($sqlstud);
$rowst=$studdetails->fetch_assoc();
$name= $rowst["fname"];$lname=$rowst["lname"];$dob= $rowst["dob"];$branch= $rowst["branch"];$gender=$rowst["gender"];
		$cgpa= $rowst["cgpa"];$puc= $rowst["puc"];$ssc= $rowst["sslc"];$email= $rowst["email"];
		$ph= $rowst["phone"];$backs=$rowst['backs'];$sscend=$rowst['sscend'];
		$sscstart= $rowst["sscstart"];$hscboard=$rowst['hscboard'];$sscboard=$rowst['sscboard'];
		$hscstart= $rowst["hscstart"];$bestart=$rowst['bestart'];$beend=$rowst['beend'];$hscend= $rowst["hscend"];$address= $rowst["address"];
	
	   //echo $fname.$lname;
	   echo" <div class='w3-panel'>
    <div class='w3-row-padding' style='margin:0 -16px'>
     
      <div class='w3-twothird'>";
	  echo "<table class='w3-table w3-striped w3-white'>
<tr>
	  <td><button class='openmodal'>
	  <b style='color:dodgerblue'>".$fname." ".$lname."</b></button></td>";
	echo " <div class='modal mymodal'> 
	<div class='modal-content'>
    <span class='close'>&times;</span>
	<h1>Student details:</h1><br />
		<p>
		<b>
            CGPA:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$cgpa."<br />
			<b>USN:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
         
            ".$usn."<br/>
          
           <b> Name:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$name."<br/>
         
           <b> Last Name:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$lname."<br/>
         
           <b> Date of birth:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$dob."<br/>
          
         
          <b>  Branch:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$branch."<br/>
         
           <b> Secondary Education:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           ".$puc."%<br/>
		   <b> SSC Score:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$ssc."<br/>
          
           <b> Email ID:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$email."<br/>
          
           <b> Phone no.:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$ph."<br/>
      <b> SSC Board:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      ".$sscboard."<br/>
 <b> SSC Start Year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$sscstart."<br/>
        
       <b> SSC End Year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$sscend."<br/>
         
          <b> HSC start year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$hscstart."<br/>
         
           <b> HSC end year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$hscend."<br/>
          
          <b> HSC board:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    ".$hscboard."<br/>
         
         <b>  B.E start year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$bestart."<br/>
        
          <b> B.E end year:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$beend."<br/>
         
           <b> Backs:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$backs."<br/>
         
          <b>  Address:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            ".$address."<br/>
       
          
           
	</p> 
	
	
	
	
	</div></div>";
	 
            
          echo '<td style=" position: absolute;left:450px">'.$usn.'</td><td style=" position: absolute;left:600px">'.$cname.'</td><td style=" position: absolute;left:700px">'.$package.'</td><td style=" position: absolute;left:800px">'.$category.'</td><td style=" position: absolute;left:900px">'.$date.'</td></tr></table>'; 

		 echo"  
		 
      </div>
    </div>
  </div>";
  $sqll="insert into gender values(extract (year from '$date'),'$gender')";
  
  
 /*if(mysqli_query($db, $sqll)) {
    		//echo "<br /><br /><br /><h1 style='color:red'>You Have successfully inserted the company's information!</h1>   ";
			//header("Location: companies.php");
     	 }else {
           echo mysqli_error($db); ;
      }
 $sqll2="insert into compa values(extract (year from '$dateofvisit'),'$category')";
 if(mysqli_query($db, $sqll2)) {
    		
     	 }else {
           echo mysqli_error($db); ;
      }
	  $sqll3="insert into plac values('$status')";
 if(mysqli_query($db, $sqll3)) {
    		
     	 }else {
           echo mysqli_error($db); ;
      }*/
	 
	  
	  
	  

   echo "<script>

var modals = document.getElementsByClassName('modal');


var btns = document.getElementsByClassName('openmodal');


var spans = document.getElementsByClassName('close');

for(let i=0;i<btns.length;i++){
   btns[i].onclick = function() {
      modals[i].style.display = 'block';
   }
}
for(let i=0;i<spans.length;i++){
    spans[i].onclick = function() {
       modals[i].style.display = 'none';
    }
 }
</script>";
}
}



	?>	

</body>
</html>

