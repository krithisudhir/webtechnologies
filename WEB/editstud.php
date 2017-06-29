<?php
include('session.php');
?>
<html><head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="w3-theme-black.css">

<style>
body,h1 {font-family: "Poppins", sans-serif;color:white;background-color:#F8F8F8 ;}
body {font-size:16px;color:black;}
label,input,select,button,p{margin-left:35px;}
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
   
   <body>
   <h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Edit Student Details</b></h1>
<p style="margin-left:50px;">Note: All changes will be made with respect to USN only</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
      <?php
	  $usn = $_GET['usn']; 
	   $sql1= "select * from student where usn='$usn'";
	   $result1 = $db->query($sql1);
	  

if ($result1->num_rows > 0) {
	
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
		$usn=$row1["usn"];
        $name= $row1["fname"];$lname=$row1["lname"];$dob= $row1["dob"];$branch= $row1["branch"];
		$cgpa= $row1["cgpa"];$puc= $row1["puc"];$ssc= $row1["sslc"];$email= $row1["email"];
		$ph= $row1["phone"];$backs=$row1['backs'];$sscend=$row1['sscend'];
		$sscstart= $row1["sscstart"];$hscboard=$row1['hscboard'];$sscboard=$row1['sscboard'];
		$hscstart= $row1["hscstart"];$bestart=$row1['bestart'];$beend=$row1['beend'];$hscend= $row1["hscend"];$address= $row1["address"];
	}
}

			
	if(isset($_POST['update'])) {
          $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'mysql123';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
			
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
            //mysql_select_db('nu');
            /*$retval = mysql_query( $sql, $db );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";*/
			 if(mysqli_query($db, $sql)) {
    		//echo "<h1 style='color:red'>You Have successfully inserted a record</h1>    ";
			header("Location: adpag2.php");
     	 }else {
           echo mysqli_error($db); ;
      }
            
         }else {
            ?>
               <form action = "editstudent.php" method="post">
                  <table width = "400" border =" 0" cellspacing = "4" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">USN:</td>
                        <td><input name = "usn" onfocus="this.blur()" type = "text" pattern="[a-zA-Z0-9]{10}" title="Invalid USN" value="<?php echo $usn ?>"
                           id = "usn"></td>
                     </tr>
                  
                     <tr>
                        <td width = "200">Name:</td>
                        <td><input name = "name" required="required" type = "text" pattern="[a-zA-Z]*" title="Invalid name" value="<?php echo $name ?>"
                           id = "name"></td>
                     </tr>
					  <tr>
                        <td width = "200">Last Name:</td>
                        <td><input name = "lname" required="required" type = "text" pattern="[a-zA-Z]*" title="Invalid name" value="<?php echo $lname ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">DOB:</td>
                        <td><input name = "dob" required="required" type = "text" pattern="[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}"  title="Enter valid date" value="<?php echo $dob ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">Branch:</td>
                        <td><input name = "branch" required="required"  type = "text" value="<?php echo $branch ?>"
                          id = "name"></td>
                     </tr>
					 
					
					 <tr>
                        <td width = "200">Email ID:</td>
                        <td><input name = "email" required="required" type = "text" placeholder="ex:abc@yahoo.com" pattern="^[a-zA-Z\._\-]+[0-9]*[a-zA-Z\._\-]+[0-9]*[@][a-zA-Z]+\.[a-zA-Z\.]{2,5}$" title="Enter valid email id" value="<?php echo $email ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">Phone no.:</td>
                        <td><input name = "ph" required="required" pattern="[0-9]{10}" title="10-Digit Mobile no." type = "text" value="<?php echo $ph ?>"
                           id = "name"></td>
                     </tr>
					 
				
                  
                     <tr>
                        <td width = "200">Address:</td>
                        <td><input name = "address" required="required" type = "text" value="<?php echo $address ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">SSC Board:</td>
                        <td><input name = "sscboard" required="required" type = "text" pattern="[a-zA-Z]+" value="<?php echo $sscboard ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">SSC Start Year:</td>
                        <td><input name = "sscstart" required="required"  type = "text" pattern="[0-9]{4}" value="<?php echo $sscstart ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">SSC End Year:</td>
                        <td><input name = "sscend" required="required" type = "text" pattern="[0-9]{4}" value="<?php echo $sscend ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">SSC Score %:</td>
                        <td><input name = "ssc" required="required" pattern="[0-9]{2}\.[0-9]+" title="ex:95.25" type = "text" value="<?php echo $ssc ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">HSC Board:</td>
                        <td><input name = "hscboard" required="required" pattern="[a-zA-Z]+" type = "text" value="<?php echo $hscboard ?>"
                          id = "name"></td>
                     </tr>
					  <tr>
                        <td width = "200">Hsc Start Year:</td>
                        <td><input name = "hscstart" required="required" type = "text" pattern="[0-9]{4}" value="<?php echo $hscstart ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">HSC End Year:</td>
                        <td><input name = "hscend" required="required" type = "text" value="<?php echo $hscend ?>"
                           id = "name"></td>
                     </tr>
					  <tr>
                        <td width = "200">HSC Score %:</td>
                        <td><input name = "puc" required="required" type = "text" value="<?php echo $puc ?>"
                           id = "name"></td>
                     </tr>
					 <tr>
                        <td width = "200">B.E Start Year:</td>
                        <td><input name = "bestart" required="required" type = "text" pattern="[0-9]{4}" value="<?php echo $bestart ?>"
                           id = "name"></td>
                     </tr>
                  
					 <tr>
                        <td width = "200">B.E End Year:</td>
                        <td><input name = "beend" required="required" type = "text" pattern="[0-9]{4}" value="<?php echo $beend ?>"
                           id = "name"></td>
                     </tr>
					
                   <tr>
                        <td width = "200">Backs:</td>
                        <td><input name = "backs" required="required" pattern="[0-9]" type = "text" title="Enter valid number" value="<?php echo $backs ?>"
                           id = "name"></td>
                     </tr>
					 	<tr>
                        <td width = "200">CGPA:</td>
                        <td><input name = "cgpa" required="required" pattern="[0-9]{1}\.[0-9]+" title="Format:x.xx" type = "text" value="<?php echo $cgpa ?>"
                           id = "name"></td>
                     </tr>
					 
					   
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" class="w3-button w3-block w3-blue w3-margin-bottom"
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      </td>
                     </tr>
                  
                  </table>
               </form> 
   </body>
</html>