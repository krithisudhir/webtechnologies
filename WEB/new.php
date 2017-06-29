<?php

function renderForm($usn, $name, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>New Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>
<strong>USN: *</strong> <input type="text" name="usn" value="<?php echo $usn; ?>" /><br/>
<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $name; ?>" /><br/>



<p>* required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}









// connect to the database

include('1conn.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$firstname = $_POST['firstname'];
$usn = $_POST['usn'];



// check to make sure both fields are entered

if ($firstname == ''|| $usn=='')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($usn,$firstname, $error);

}

else

{

// save the data to the database
$sql="INSERT into details values('$usn','$firstname')";

   	 if(mysqli_query($db, $sql)) {
    		echo "<h1 style='color:red'>You Have successfully inserted a record</h1>    ";
     	 }else {
           echo mysqli_error($db); ;
      }



// once saved, redirect back to the view page

header("Location: 2view.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','');

}

?>