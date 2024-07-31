<?php 
   require_once('../panel/modules/config.php');
   
    $ID  = $_POST['id'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
   
    $home = mysqli_query($con,"update atword_xl_db set LATITUDE='$lat',LONGITUDE='$lng'  where Unique_ID ='$ID'");
    if($home)
		$res = 1;
	else 
		$res = 2;
	
	
	echo $res ;

?>