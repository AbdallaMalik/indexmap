<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  
	    $search  = $_POST['search'];
		$page_no = $_POST['page_no'];
		
		$total_records_per_page = 50000 ;
        $offset = ($page_no -1) * $total_records_per_page;

		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Agency_Name LIKE '%$search%' and LATITUDE !='' and LONGITUDE !='' ORDER BY Unique_ID ASC LIMIT $offset,$total_records_per_page"; 
		
    $query = mysqli_query($con,$myquery);
    $data = array();
    while($x = mysqli_fetch_assoc($query)) {
        $data[]= $x ;
    }
    	echo json_encode($data);
     
    mysqli_close($con);

?>




