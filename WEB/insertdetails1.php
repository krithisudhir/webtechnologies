<?php
  
   include("config.php");
   //$usn = $_POST['usn'];
   //$pwd = $_POST['pwd'];
   //$error='';
   //$f=0;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       $fname = $_POST['fnamesignup'];
        $lname =$_POST['lnamesignup'];
		$gender=$_POST['gsignup'];
		//$branch=$_POST['branchsignup'];
		$cgpa=$_POST['gpasignup'];
		$puc=$_POST['collsignup'];
		$ssc=$_POST['highsignup'];
        $pwd= $_POST['pass2']; 
        $usn = $_POST['usnsignup'];
        $dob=$_POST['dobsignup'];
       $email=$_POST['emailsignup'];
	   $ph=$_POST['phsignup'];
	   
	   $sscstart=$_POST['sscstart'];
		$sscend=$_POST['sscend'];
	   $hscstart=$_POST['hscstart'];
	   $hscend=$_POST['hscend'];
	   $bestart=$_POST['bestart'];
	   $beend=$_POST['beend'];
	   $backs=$_POST['backs'];
	   $address=$_POST['address'];
	   $sscboard=$_POST['sscboard'];
	   $hscboard=$_POST['hscboard'];
	 
	$sql1 = "INSERT INTO login values ('$usn','$pwd')";
 $sql2 = "INSERT INTO student values ('$fname','$lname','$gender','$dob','CSE','$usn','$cgpa','$puc','$ssc','$email','$ph','$pwd','$sscboard','$address','$hscboard','$backs','$sscstart','$sscend','$hscstart','$hscend','$bestart','$beend')";
   	 /*if(mysqli_query($db, $sql1)) {
    		echo "<br /><br /><br /><h1 style='color:red'>You Have successfully created a login!</h1><p> Fill in your details to complete the registration process</p>    ";
     	 }else {
           echo mysqli_error($db); ;
      }
        $sql2 = "INSERT INTO student values ('$fname','$lname','$gender','$dob','CSE','$usn','$cgpa','$puc','$ssc','$email','$ph','$pwd')";*/

   	 if(mysqli_query($db, $sql1)&& mysqli_query($db, $sql2)) {
    		echo "<br /><br /><br /><h1 style='color:red'>You Have successfully created an account!</h1>   ";
     	 }else {
           echo mysqli_error($db); ;
      }
   }
	   //}else
	 //  { 
  // $error ="*email invalid";
   //}
//}

?>
<html><head>
<title></title>
<script type="text/javascript" >
<!--

function CheckPasswordStrength(password) {
        var password_strength = document.getElementById("password_strength");
 
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }
 
        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.
 
        var passed = 0;
 
        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }
 
        //Validate for length of Password.
        if (passed > 2 && password.length > 8) {
            passed++;
			
			
			
			
			
        }
 
        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color = "red";
                break;
            case 2:
                strength = "Good";
                color = "darkorange";
                break;
            case 3:
            case 4:
                strength = "Strong";
                color = "green";
                break;
            case 5:
                strength = "Very Strong";
                color = "darkgreen";
                break;
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    }

 function CheckPasswordlength(password) {
if (password.length < 8) 
        document.getElementById("password_strength").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsplength less than 8";
		return false;
            }
			function Checkfname(fname) {
if (fname.length < 5) 
        document.getElementById("fnamee").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsplength less than 5";
		return false;
            }

			
//-->
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="w3-theme-black.css">

<style>
body,h1 {font-family: "Poppins", sans-serif;color:white;background-color:#F8F8F8 ;}
body {font-size:16px;color:black;}
label,input,select,button,p{margin-left:35px;}
#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:250px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}

</style>
<script>
function lengthcheck(password) {
if (password.length < 6)
{	
        document.getElementById("password_strength").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsplength less than 6";return false;
	document.getElementById("txtPassword").focus();
		
            }
			else{
				document.getElementById("password_strength").innerHTML = "";
			}
 }
function checkconf(conf)
{
	var pwd=document.getElementById("txtPassword").value;
	if(pwd!=conf)
	{
		document.getElementById("confrm").innerHTML = "*passwords dont match";
		return false;
		document.getElementById("ok").disabled=true;
	}
	else{
		document.getElementById("confrm").innerHTML = "";
	}
} 
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>

</head>
<!--<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>
    <a href="placementpage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to main page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>-->

<body>

<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-button w3-hide-large w3-padding-0 w3-black w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <span class="w3-bar-item  w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
</div>
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Enter details</b></h1>
<p style="margin-left:50px">Please enter all details correctly.</p>
<p style="margin-left:50px;color:red;">**Note: USN once entered incorrectly will not be changed.</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
<form action="" method="post">
	
 <label class="usn" >Your USN</label><br/>
 <input class="w3-input w3-border" id="usnsignup" name="usnsignup" required="required" type="text" pattern="[a-zA-Z0-9]{10}" title="Enter 10 digit USN" placeholder="eg:4JC14CS135"/>
 <br />
 <label class="uname" >First Name</label><br/>
  <input class="w3-input w3-border" id="fnamesignup" name="fnamesignup" required="required" type="text" pattern="[a-zA-Z]+" title="Enter valid name" placeholder="Name" />
      <br />   
	  <label>Last name</label><br/>
  <input class="w3-input w3-border" id="lnamesignup" name="lnamesignup" required="required" type="text" pattern="[a-zA-Z]+"  title="Enter valid name" placeholder="Initial/Last name" />
      <br />   
	    <label>DOB</label><br/>
  <input class="w3-input w3-border" id="dobsignup" name="dobsignup" required="required" type="text" pattern="[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}"  title="Enter valid date" placeholder="YYYY-MM-DD" />
      <br />   
	   <label> Gender</label><br/>
                    <select id="gsignup" name="gsignup">
					<option value="M">Male</option>
					<option value="F">Female</option>
					</select>
					 <br /><br />
					  <label> Branch</label><br/>
                    <select id="branchsignup" name="branchsignup">
					<option value="CSE">CSE</option>
					
					</select>
					 <br /><br />
	 
	 
   <label>Phone number</label><br/>
  <input class="w3-input w3-border" id="phsignup" name="phsignup" required="required" type="text" pattern="[0-9]{10}" title="10-Digit Mobile no." title="Enter 10-Digit mobile number" placeholder="10-Digit Mobile no." />
      <br />     
	  

   <label> Your email</label><br/>
   <input class="w3-input w3-border" id="emailsignup" name="emailsignup" required="required" type="email" placeholder="ex:abc@yahoo.com" pattern="^[a-zA-Z\._\-]+[0-9]*[a-zA-Z\._\-]+[0-9]*[@][a-zA-Z]+\.[a-zA-Z\.]{2,5}$" title="Enter valid email id"/> 
     <br />                          
      
 <!--<label > Your Native</label><br/>
 <input class="w3-input w3-border" id="placesignup" name="placesignup" required="required" type="text" pattern="[A-Za-z]*" title="Characters only"/> 
      <br />  -->                         
<label>Your permanent address </label><br/>
<input class="w3-input w3-border" id="address" name="address" required="required" type="text" />
 <br />
 <label> SSC board</label><br/>
                    <select id="sscboard" name="sscboard">
					<option value="kseeb">KSEEB</option>
					<option value="cbse">CBSE</option>
					<option value="icse">ICSE</option></select>
					 <br /><br />
            <label> SSC start year</label><br/>
            <input  class="w3-input w3-border" id="sscstart" name="sscstart" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                               
 <br />
      
      
<label> SSC end year</label><br/>
<input class="w3-input w3-border" id="sscend" name="sscend" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
 <br />

    <label> SSC%(AGG) </label><br/>
    <input class="w3-input w3-border" id="highsignup" name="highsignup" required="required" type="text" pattern="[0-9]{2}\.[0-9]{2}" title="Format:xx.xx" placeholder="ex:95.25" title="Format:xx.xx"/> 
     <br />
 
    <label> HSC board </label><br/>
    <select id="hscboard" name="hscboard">
					<option value="ncert">NCERT</option>
					<option value="cbsehsc">CBSE</option>
					<option value="dpue">DPUE</option></select>
                                

   <br /><br />
	   	
<label> HSC start year</label><br/>
 <input class="w3-input w3-border" id="hscstart" name="hscstart" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                                <br />
<label> HSC end year</label><br/>
<input class="w3-input w3-border" id="hscend" name="hscend" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                                
 <br />
 <label> HSC%(AGGR)</label><br/>
 <input class="w3-input w3-border" id="collsignup" name="collsignup" required="required" type="text" pattern="[0-9]{2}\.[0-9]{2}" title="Format:xx.xx" placeholder="ex:95.25" title="Format:xx.xx"/> 
 <br />     
      <label> B.E. start year</label><br/>
	   <input class="w3-input w3-border" id="bestart" name="bestart" required="required" type="text" pattern="[0-9]{4}"  placeholder="YYYY" title="Year format:YYYY"/> 
   <br />
   <label> B.E. end year</label><br/>
      <input class="w3-input w3-border" id="beend" name="beend" required="required" type="text" pattern="[0-9]{4}"  placeholder="YYYY" title="Year format:YYYY"/>
                                
		 <br />
		 <label> Your CGPA</label><br/>
                                    <input class="w3-input w3-border" id="gpasignup" name="gpasignup" required="required" type="text" pattern="[0-9]{1}\.[0-9]{2}" placeholder="ex:8.25" title="Format:x.xx"/> 
  
   <br />
   <br />
		 <label> Number of backs</label><br/>
                                    <input class="w3-input w3-border" id="backs" name="backs" required="required" type="text" pattern="[0-9]{1}" title="Enter valid number" placeholder="0 if none" title="Enter valid number"/> 
  
   <br />
		
   <!--<label> Enter new password</label><br/>
                                <input class="w3-input w3-border" id="passwordsignup" name="passwordsignup" required="required" type="password"  pattern="[a-zA-Z0-9]{6,}" placeholder="6 digit password" title="Password must contain letters and digits only"/> 
    <br />-->
	<label for="pass">Password</label><input type="password" name="mypassword" placeholder="minimum 6 characters" id="txtPassword"  onfocusout="lengthcheck(this.value)" class="w3-input w3-border" onkeyup="passwordStrength(this.value)" required="required"/><br />
			<label id="password_strength" ></label><br />
			
			
			<label for="pass2">Confirm Password</label><input type="password" name="pass2" id="pass2" class="w3-input w3-border" required="required" onfocusout="checkconf(this.value)"/><br />
		    <label id="confrm" ></label><br />
			
			<!--<label for="passwordStrength">Password strength</label>-->
			<div id="passwordDescription" ><p style="margin-left:40px">Password not entered</p></div>
			<div id="passwordStrength" class="strength0" style="margin-left:40px"></div>
                                
                               
<br />
      
	 
	 <input type="submit" class="w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" id="ok" value="sign up"/>
	     
							<p>Already a member ?
									<a href="placementpage.php#log" class="to_register"> Go and log in </a></p>
									<p><a href="#top">Back to top </a></p>
							
	 
    </form>  
  

				
			

		
			</body>

</html>	