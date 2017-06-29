<?php
   include("config.php");
   session_start();
   $error='';
   $ad="pcadmin";
   $adpass="admin123";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  if($mypassword=="" || $myusername=="")
	  {
		  echo "Enter valid Username/Password<br /><a href='placementpage.php#log'>Go back and try again</a>"; 
		  die;
	  }
	  
	  if((strcasecmp($ad,$myusername)==0) && (strcasecmp($adpass,$mypassword)==0)) {
		  $_SESSION['login_user'] = $myusername;
		  header("location:adpag2.php");
	  }
	  else{

      $sql = "SELECT * FROM login where usn = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	
      if($count == 1) {
         //session_register("myusername");

         $_SESSION['login_user'] = $myusername;
         header("location: upcoming.php");
      }else {
         //$error = "Your Login Name or Password is invalid";
      echo "Invalid Username/Password<br /><a href='placementpage.php#log'>Go back and try again</a>";
	  }
   }
   }
   
?>