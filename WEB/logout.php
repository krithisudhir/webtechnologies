<?php
   session_start();
   
  session_destroy();
  header("location:placementpage.php");
?>
