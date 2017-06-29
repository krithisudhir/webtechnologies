<?php
  
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
       $cid = $_POST['cid'];
        $cname =$_POST['cname'];
		$category=$_POST['cat'];
		
		$profile=$_POST['profile'];
		$package=$_POST['pkg'];
		$dov=$_POST['dov'];$deadline=$_POST['deadline'];
        $cutoff= $_POST['cut']; 
	
 $sql = "INSERT INTO company values ('$cid','$cname','$category','$profile','$package','$cutoff','$dov','$deadline')";
   	 
   	 if(mysqli_query($db, $sql)) {
    		//echo "<br /><br /><br /><h1 style='color:red'>You Have successfully inserted the company's information!</h1>   ";
			header("Location: companies.php");
     	 }else {
           echo mysqli_error($db); ;
      }
   }
	 

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

</style>
<script type="text/javascript" src="check.js"></script>

</head>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="adminpage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to admin page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
<body>
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Enter details</b></h1>
<p style="margin-left:50px">Insert Details About Upcoming Comapny:</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
<form action="" method="post">
	
 <label class="usn" >Comapany ID:</label><br/>
 <input class="w3-input w3-border" id="cid" name="cid" required="required" type="text" pattern="[0-9]+"  placeholder="Comapany ID"/>
 <br />
 <label class="uname" >Comapny Name:</label><br/>
  <input class="w3-input w3-border" id="cname" name="cname" required="required" type="text"  placeholder="Name of the Company" />
      <br />   
	  <label>Job Profile:</label><br/>
  <input class="w3-input w3-border" id="profile" name="profile" required="required" type="text"  placeholder="Job Profile" />
      <br />   
	    <label>Date of Campus Visit:</label><br/>
  <input class="w3-input w3-border" id="dov" name="dov" required="required" type="text" placeholder="YYYY-MM-DD" />
      <br />   
	   <label> Category:</label><br/>
                    <select id="cat" name="cat">
					<option value="Mass">Mass</option>
					<option value="Core">Core</option>
					<option value="Dream">Dream</option>
					<option value="Open Dream">Open Dream</option>
					</select>
					 <br /><br />
	 
   <label>Package:</label><br/>
  <input class="w3-input w3-border" id="pkg" name="pkg" required="required" type="text" placeholder="Package" />
      <br />     
	  

   <label>Cutoff Marks:</label><br/>
   <input class="w3-input w3-border" id="cut" name="cut" required="required" placeholder="Cutoff CGPA" /> 
     <br />     
<label>Submission Deadline:</label><br/>
  <input class="w3-input w3-border" id="dedline" name="deadline" required="required" type="text" placeholder="Deadline" />
      <br />     	 
      

	 
	 <input type="submit" class="w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value="OK"/>
	     
						
									<!--<a href="adminpage.php#log" class="to_register"> Go back </a></p>-->
									<p><a href="#top">Back to top </a></p>
							
	 
    </form>  
  

 <script type="text/javascript" src="checkr.js">
				
			

			</script>
			</body>

</html>	