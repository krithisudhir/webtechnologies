<html>
<head>
 <title> Placement acheivements of 2016 </title>
 <link rel="stylesheet"  href="stylebar.css">
</head>
<body>
<h1 style="position: relative; left:50px;"> SJCE PLACEMENTS </h1>

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
else {}
//printf("connected succesfully\n");

$sql = "SELECT year,percentage FROM achieve";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) {
	$year=$row['year'];$perc=$row['percentage'];
echo"<dl>
<dt> ".$year."</dt>
<dd><div  class='bar' style='background-color:blue;width: ".$perc. "% '>".$perc."%</div></dd>
</dl></body>";
}
}
else {
    echo "0 results";
}
 $conn->close();



?>
</html>