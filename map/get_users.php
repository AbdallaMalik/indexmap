<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  

	$country = $_POST['country'];
	$state = $_POST['state'];
	if($country =="USA")
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country='$country' and State='$state' and LATITUDE !='' and LONGITUDE !='' ORDER BY Unique_ID DESC LIMIT 250000"; 
	}
	else 
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country='$country' and LATITUDE !='' and LONGITUDE !='' ORDER BY Unique_ID DESC"; 
	}
	
  
    $query = mysqli_query($con,$myquery);
    $data = array();
    while($x = mysqli_fetch_assoc($query)) {
        $data[]= $x ;
    }
    	echo json_encode($data);
     
    mysqli_close($con);

?>




