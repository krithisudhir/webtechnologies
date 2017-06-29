<?php


include('session.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['usn']))

{

// get id value

$id = $_GET['usn'];


$sql="DELETE FROM student WHERE usn='$id'";

   	 if(mysqli_query($db, $sql)) {
    		echo "<h1 style='color:red'>You Have successfully deleted a record</h1>    ";
     	 }else {
           echo mysqli_error($db); ;
      }
// delete the entry

//$result = mysql_query("DELETE FROM details WHERE usn='$id'")

//or die(mysql_error());



// redirect back to the view page

header("Location: adminpage.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: adminpage.php");

}



?>