<?php

include('session.php');


         
            //include('1conn.php');
			
		 $usn = $_POST['usn'];
	   $name = $_POST['name'];
	   $lname = $_POST['lname'];
			$dob= $_POST['dob'];
			$branch= $_POST['branch'];
			$ssc= $_POST['ssc'];
			$puc= $_POST['puc'];
			$email= $_POST['email'];
			$ph= $_POST['ph'];
			$cgpa=$_POST['cgpa'];
			 $sscstart = $_POST['sscstart'];
	   $sscend = $_POST['sscend'];
			$bestart= $_POST['bestart'];
			$beend= $_POST['beend'];
			$address= $_POST['address'];
			$hscstart= $_POST['hscstart'];
			$hscend= $_POST['hscend'];
			$backs= $_POST['backs'];
			$hscboard= $_POST['hscboard'];
			$sscboard= $_POST['sscboard'];
           
            
            $sql = "UPDATE student SET fname = '$name',dob='$dob',branch='$branch',cgpa='$cgpa',sslc='$ssc',puc='$puc',email='$email',phone='$ph', lname = '$lname',sscstart='$sscstart',sscend='$sscend',sscboard='$sscboard',hscboard='$hscboard',hscend='$hscend',hscstart='$hscstart',backs='$backs',address='$address',beend='$beend',bestart='$bestart'". 
               "WHERE usn = '$usn'" ;
           
			 if(mysqli_query($db, $sql)) {
			header("Location: adpag2.php");
     	 }
else {
           echo mysqli_error($db); ;
      }

	  ?>