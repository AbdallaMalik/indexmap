<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  



    $myquery = "SELECT  COUNT(*) as no  
	FROM atword_xl_db 
	where Country='UAE' and LATITUDE !='' ORDER BY Unique_ID DESC";	
    $query = mysqli_query($con,$myquery);
	$data  = mysqli_fetch_array($query);
    echo $data['no']." ";
     
    mysqli_close($con);

?>




