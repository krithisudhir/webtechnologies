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
   <h1 class="w3-xxxlarge w3-text-blue" style="margin-top:100px;margin-left:50px;"><b>Edit Company Details</b></h1>
<p style="margin-left:50px;">Note: All changes will be made with respect to ID only</p>
<div id="contact" style="margin-top:75px">
<div class="w3-container" style="width:750px">
      <?php
	  $cid = $_GET['cid'];
	   $cname = $_GET['cname'];
			$category= $_GET['category'];
			$profile= $_GET['profile'];
			$package= $_GET['package'];
			$cutoff= $_GET['cutoff'];
			$dov= $_GET['dov'];$deadline= $_GET['deadline'];
			
         if(isset($_POST['update'])) {
          /* $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'mysql123';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }*/
			
            //include('1conn.php');
			include('session.php');
            $cid = $_POST['cid'];
            $cname = $_POST['cname'];
			$category= $_POST['category'];
			$profile= $_POST['profile'];
			$package= $_POST['package'];
			$cutoff= $_POST['cutoff'];
			$dov= $_POST['dov'];
			$deadline= $_POST['deadline'];
		
            
            $sql = "UPDATE company ". "SET cname = '$cname',category='$category',profile='$profile',package='$package',cutoff='$cutoff',dateofvisit='$dov',deadline='$deadline'". 
               "WHERE cid = '$cid'" ;
			   
            //mysql_select_db('nu');
            /*$retval = mysql_query( $sql, $db );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";*/
			 if(mysqli_query($db, $sql)) {
    		//echo "<h1 style='color:red'>You Have successfully inserted a record</h1>    ";
			header("Location: companies.php");
     	 }else {
           echo mysqli_error($db); ;
      }
            
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Company ID</td>
                        <td><input name = "cid" onfocus="this.blur()" type = "text" pattern="[a-zA-Z0-9]+"  value="<?php echo $cid ?>"
                           id = "cid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Company Name</td>
                        <td><input name = "cname" type = "text" pattern="[a-zA-Z0-9]+" value="<?php echo $cname ?>"
                           id = "cname"></td>
                     </tr>
					 <tr>
                        <td width = "100">Category</td>
                        <td><input name = "category" type = "text" pattern="[a-zA-Z]+" value="<?php echo $category ?>"
                           id = "category"></td>
                     </tr>
					 <tr>
                        <td width = "100">Profile</td>
                        <td><input name = "profile" type = "text" pattern="[a-zA-Z]+" value="<?php echo $profile ?>"
                          id = "profile"></td>
                     </tr>
					 <tr>
                        <td width = "100">Package</td>
                        <td><input name = "package" type = "text" pattern="[0-9]+" value="<?php echo $package ?>"
                           id = "package"></td>
                     </tr>
					 <tr>
                        <td width = "100">Cutoff</td>
                        <td><input name = "cutoff" type = "text" pattern="[0-9]{1}\.[0-9]{2}" value="<?php echo $cutoff ?>"
                           id = "cutoff"></td>
                     </tr>
					 <tr>
                        <td width = "100">Date Of Visit</td>
                        <td><input name = "dov" type = "text" pattern="[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}" value="<?php echo $dov ?>"
                           id = "dov"></td>
                     </tr>
					 <tr>
                        <td width = "100">Deadline</td>
                        <td><input name = "deadline" type = "text" pattern="[0-9]{4}[\-][0-9]{2}[\-][0-9]{2}" value="<?php echo $deadline ?>"
                           id = "dov"></td>
                     </tr>
					
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
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