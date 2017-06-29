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
</head>
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-opennav w3-right w3-hide-large w3-hover-white w3-large w3-theme-black" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
   <!-- <a href="#" class="w3-bar-item w3-button w3-theme-black">Logo</a>-->

  
	 <span class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-black">SJCE PLACEMENT PORTAL</span>
  </div>
</div>
<?php
  
  
     $usn = $_GET['usn'];
	 $cid=$_GET['cid'];
	 $appid=$_GET['appid'];
	 $appid+=1;
$category= $_GET['category'];
   
    if(isset($_POST['insapp'])) {
		 include('session.php');
     
     
        $usn =$_POST['usn'];
		$cid=$_POST['cid'];
		
		$appid=$_POST['appid'];
		$category=$_POST['category'];
		
	 

 $sql2 = "INSERT INTO application values ('$appid','$usn','$cid','$category')";
    $sql3 = "INSERT INTO applndetails values ('$appid','PENDING',curdate())";	

   	 if(mysqli_query($db, $sql2) && mysqli_query($db,$sql3)) {
    		//echo "<br /><br /><br /><h1 style='color:red'>You Have successfully registered!</h1>   ";
			header("Location: applnstatus.php");
     	 }else {
           echo mysqli_error($db); ;
      }
   }
   else {}
	

?>

<body>
<h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Apply</b></h1>
<p>We will use the following information to obtain your details:</p>
<p>(Note down the application ID for futher reference)</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
<form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Your USN:</td>
                        <td><input name = "usn" onfocus="this.blur()" type = "text" value="<?php echo $usn ?>"
                           id = "usn"><br /></td>
                     </tr>
             
                     <tr>
                        <td>Application ID:</td>
                        <td><input name = "appid" onfocus="this.blur()" type = "text" value="<?php echo $appid ?>"
                           id = "appid"></td>
                     </tr>
					 <tr>
                        <td width = "100">Company ID</td>
                        <td><input name = "cid" onfocus="this.blur()" type = "text" value="<?php echo $cid ?>"
                           id = "cid"></td>
                     </tr>
					 <tr>
                        <td width = "100">Category</td>
                        <td><input name = "category" onfocus="this.blur()" type = "text" value="<?php echo $category ?>"
                          id = "category"></td>
                     </tr>
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "insapp" class="w3-button w3-block w3-blue w3-margin-bottom" type = "submit" 
                              id = "insapp" value = "Register me!">
							   
							  <!--<button id="bak" onclick="upcoming()">Go Back</button>-->
							  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="upcoming.php">go back</a>
                        </td>
                     </tr>
                  
                  </table>
               </form>
  <script type="text/javascript">
  function upcoming(){
	 window.history.back();
  }</script>
      
   </body>
</html>