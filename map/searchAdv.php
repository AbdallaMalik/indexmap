<?php
ini_set('max_execution_time', 6000);
ini_set('memory_limit','3000M');
set_time_limit(0);
require_once('../panel/modules/config.php');
  

	$txt = $_POST['searchTxt'];
	$A   = $_POST['searchA'];
	$B   = $_POST['searchB'];
	$D   = $_POST['searchD'];
	if($txt !="" && $A !="" && $B !="" && $D !="")
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country ='$A' and State='$B' and City='$D' and Agency_Name like '%$txt%' and LATITUDE !='' and LONGITUDE !=''"; 
	}
	else if($txt !="" && $A !="" && $B !="" && $D =="")
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country ='$A' and State='$B' and Agency_Name like '%$txt%' and LATITUDE !='' and LONGITUDE !=''"; 
	}
	else if($txt !="" && $A !="" && $B =="" && $D !="")
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country ='$A' and City='$D' and Agency_Name like '%$txt%' and LATITUDE !='' and LONGITUDE !=''"; 
	}
	else if($txt !="" && $A !="" && $B =="" && $D =="")
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Country ='$A' and Agency_Name like '%$txt%' and LATITUDE !='' and LONGITUDE !=''"; 
	}
	else 
	{
		$myquery = "SELECT Unique_ID, Agency_Name as name,Short_description as email,First_Name ,Last_Name,Country,image, Website as website, City as city,Phone_Number, LATITUDE as lat, LONGITUDE as lng 
	    FROM atword_xl_db 
	    where Agency_Name like '%$txt%' and LATITUDE !='' and LONGITUDE !='' limit 50000"; 
	}
	
  
    $query = mysqli_query($con,$myquery);
    $data = array();
    while($x = mysqli_fetch_assoc($query)) {
        $data[]= $x ;
    }
    echo json_encode($data);
     
    mysqli_close($con);

?>




