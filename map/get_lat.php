<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  
    $id = $_POST['shareID'];
	//$id = 2263571;
	$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	FROM atword_xl_db 
	where Unique_ID='$id' and LATITUDE !='' and LONGITUDE !=''";
	$mQuery = mysqli_query($con,$myquery);
	$mResult = mysqli_fetch_array($mQuery);
	$lat = $mResult['lat'];
	$lng = $mResult['lng'];
	
	             $mSql = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng,
			             ((acos(cos(('$lat' * pi()/180)) * 
						 cos((LATITUDE * pi()/180)) * 
						 cos((LONGITUDE * pi()/180) - '$lng' * pi()/180) + 
						 sin(('$lat' * pi()/180)) * 
						 sin((LATITUDE * pi()/180))) * 180/pi()) * 60 * 1.1515 * 1.609344)
						 AS distance 
						 FROM atword_xl_db HAVING distance < 10 
						 ORDER BY distance LIMIT 10000 ";
						 
    $query = mysqli_query($con,$mSql);
    $data = array();
    while($x = mysqli_fetch_assoc($query)) {
        $data[]= $x ;
    }

    	echo json_encode($data);
     
    mysqli_close($con);

?>




