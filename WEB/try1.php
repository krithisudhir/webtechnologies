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
<script type="text/javascript"> function placementpage() {
    window.location="placementpage.php"
}</script>
</head>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->
    <a href="placementpage.php" class="w3-bar-item w3-button w3-hide-small w3-hover-blue">Back to main page</a>
  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
<body>
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Sign up</b></h1>
<p style="margin-left:50px">Stay tuned with the latest information!</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
<form action="enterdetails.php" method="post">
	
 <label class="usn" >Your USN</label><br/>
 <input class="w3-input w3-border" id="usnsignup" name="usnsignup" required="required" type="text" pattern="[A-Za-z0-9]{10}" title= "eg:4JC14CS135" placeholder="eg:4JC14CS135"/>
 <br /> 
 
	 
   <!--<label class="uname" >Phone number</label><br/>
  <input class="w3-input w3-border" id="usernamesignup" name="usernamesignup" required="required" type="text" pattern="[0-9]{10}" title="10-Digit Mobile no." placeholder="10-Digit Mobile no." />
      <br />     
	  

          <label class="youmail" > Your email</label><br/>
   <input class="w3-input w3-border" id="emailsignup" name="emailsignup" required="required" type="email" placeholder="ex:abc@yahoo.com" title="ex:abc@yahoo.com"/> 
     <br />                          
      
 <label > Your Native</label><br/>
 <input class="w3-input w3-border" id="placesignup" name="placesignup" required="required" type="text" patte
<label>Your permanent address </label><br/>
<input class="w3-input w3-border" id="addrsignup" name="addrignup" required="required" type="text" pattern="[0-9]+[A-Za-z0-9]+{25}" titlern="[A-Za-z]*" title="Characters only"/> 
      <br />                           ="Use appropriate text" />
 <br />
 <label> SSC board</label><br/>
                    <select id="sscsignup" name="sscsignup">
					<option value="kseeb">KSEEB</option>
					<option value="cbse">CBSE</option>
					<option value="icse">ICSE</option></select>
					 <br /><br />
            <label> SSC start year</label><br/>
            <input  class="w3-input w3-border" id="ssc1signup" name="ssc1signup" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                               
 <br />
      
<label> SSC end year</label><br/>
<input class="w3-input w3-border" id="ssc2signup" name="ssc2signup" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
 <br />

    <label> SSC%(AGG) </label><br/>
    <input class="w3-input w3-border" id="highsignup" name="highsignup" required="required" type="text" pattern="[0-9]{2}\.[0-9]{2}" placeholder="ex:95.25" title="Format:xx.xx"/> 
     <br />
 
    <label> HSC board </label><br/>
    <select id="hscsignup" name="hscsignup">
					<option value="ncert">NCERT</option>
					<option value="cbsehsc">CBSE</option>
					<option value="dpue">DPUE</option></select>
                                

   <br /><br />
	   	
<label> HSC start year</label><br/>
 <input class="w3-input w3-border" id="hsc1signup" name="hsc1signup" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                                <br />
<label> HSC end year</label><br/>
<input class="w3-input w3-border id="hsc2signup" name="hsc2signup" required="required" type="text" pattern="[0-9]{4}" placeholder="YYYY" title="Year format:YYYY"/> 
                                
 <br />
 <label> HSC%(AGGR)</label><br/>
 <input class="w3-input w3-border" id="collsignup" name="collsignup" required="required" type="text" pattern="[0-9]{2}\.[0-9]{2}" placeholder="ex:95.25" title="Format:xx.xx"/> 
 <br />     
       <label> B.E. start year</label><br/>
	   <input class="w3-input w3-border" id="be1signup" name="bes1ignup" required="required" type="text" pattern="[0-9]{4}"  placeholder="YYYY" title="Year format:YYYY"/> 
   <br />
   <label> B.E. end year</label><br/>
      <input class="w3-input w3-border" id="be2signup" name="be2signup" required="required" type="text" pattern="[0-9]{4}"  placeholder="YYYY" title="Year format:YYYY"/>
                                
		 <br />
		 <label> Your CGPA</label><br/>
                                    <input class="w3-input w3-border" id="gpasignup" name="gpasignup" required="required" type="text" pattern="[0-9]{1}\.[0-9]{2}" placeholder="ex:8.25" title="Format:x.xx"/> 
  
   <br />-->
		
   <label> Enter new password</label><br/>
                                <input class="w3-input w3-border" id="passwordsignup" name="passwordsignup" required="required" type="password"/> 
    <br />
	 <label class="youpasswd">Please confirm your password </label><br/>
    <input class="w3-input w3-border" id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password"/>
                                
                               
<br />
      
	 
	 <input type="submit" class="w3-button w3-block w3-padding-large w3-blue w3-margin-bottom" value="sign up"/>
	     
							<p>Already a member ?
									<a href="placementpage.php#log" class="to_register"> Go and log in </a></p>
									<p><a href="#top">Back to top </a></p>
							
	 
    </form>  
  

 <script type="text/javascript" src="checkr.js">
				
			

			</script>
			</body>

</html>	