<?xml version = "1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
 <title> Placement acheivements </title>
 <link rel="stylesheet"  href="stylebar.css">
 <style>
 div.one {
    border: 1px solid black;
    background-color: rgb(96, 96, 96);
    padding-top: 10px;
    padding-right: 5px;
    padding-bottom: 10px;
    padding-left: 6px;
}
</style>
</head>
<body>

<h1 style="position: relative; left:70px;"> SJCE PLACEMENTS YEAR WISE</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "placement";

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
echo"<div class=\"one\">";
echo"<dl>
<dt> ".$year."</dt>
<dd><div  class='bar' style='background-color:blue; padding-top:20px; width: ".$perc. "% '>".$perc."%</div></dd>
</dl></body>";
echo"</div>";
}
}
else {
    echo "0 results";
}
 $conn->close();

?>
</html>