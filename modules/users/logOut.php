<?php session_start();
   if(isset($_SESSION["validUser"]) && !empty($_SESSION["validUser"]))
   {
	   unset($_SESSION['validUser']);
   }
?>
  <script>
    window.location="../../aboutUs/index.php";
  </script>