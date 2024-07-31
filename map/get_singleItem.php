<?php
require_once('../panel/modules/config.php');
  
	$A = $_POST['A'];
	$id = $_POST['id'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

		$myquery = "SELECT Unique_ID, Agency_Name as name,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country='$A' and Unique_ID='$id' and LATITUDE !='' ORDER BY Unique_ID DESC LIMIT 200000"; 
		
    $query = mysqli_query($con,$myquery);
    $data = array();
    while($x = mysqli_fetch_assoc($query)) {
        $data[]= $x ;
    }
    	echo json_encode($data);
     
    mysqli_close($con);

?>




