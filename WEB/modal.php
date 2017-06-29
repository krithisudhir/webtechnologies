<!DOCTYPE html>
<?php
   include('config.php');
  
?>

<html>
<head>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
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
</style>
</head>
<body>

<h2>Modal Example</h2>
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


$sql = "SELECT usn,fname,lname from student";
$result = $db->query($sql);
 

if ($result->num_rows > 0) {
	
    // output data of each row
     while($row = $result->fetch_assoc()) { 
	
	$usn=$row["usn"];
        $name= $row["fname"];
		$lname=$row["lname"];
	
    //echo $usn." ". $name." ".$lname;

	echo "<button class='openmodal'>".$name."</button>";
	echo " <div class='modal mymodal'> 
	<div class='modal-content'>
    <span class='close'>&times;</span>
	<p>".$usn." ".$lname." </p></div></div>";
	
  
	
	 
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