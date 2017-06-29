<!DOCTYPE html>
<html>
<body>

<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="w3-theme-black.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif;background-color:}
th,td{white-space:nowrap;}

</style>
</head>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="adpag2.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to admin page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
<body class="w3-light-grey">

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
$usn=$_POST['usn'];
$sql = "SELECT * FROM student where usn='$usn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "
	<div class='scrollit' style='margin:20px'>
	<div class='w3-row-padding' style='margin:0 -16px'>
    <div class='w3-twothird'>
    <table class='w3-table w3-striped' id='details' style='margin-top:100px'>
	<tr ><th>USN</th><th>First Name</th><th>Last Name</th><th>CGPA</th><th>DOB</th><th>Branch</th><th>Email</th><th>Phone</th><th>Address</th></tr>";


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
     echo "<br /><br /><br /><h2>No results were found</h2><br />";
}
	$conn->close();
 
?> 

</body>
</html>




