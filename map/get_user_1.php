<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  

    $country = $_POST['m'];
	$state = $_POST['n'];

	if($country =="USA")
	{
		$myquery = "SELECT COUNT(*) as no 
	    FROM atword_xl_db 
	    where Country='$country' and State='$state' and LATITUDE !='' ORDER BY Unique_ID DESC LIMIT 250000"; 
	}
	else 
	{
		$myquery = "SELECT COUNT(*) as no
	    FROM atword_xl_db 
	    where Country='$country' and LATITUDE !='' ORDER BY Unique_ID DESC"; 
	}
	
    
    $query = mysqli_query($con,$myquery);
	$data  = mysqli_fetch_array($query);
    echo $data['no']." ";
     
    mysqli_close($con);

?>




