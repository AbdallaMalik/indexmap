<?php

require_once('../panel/modules/config.php');
  
	$search    = $_POST['search'];
	$myquery   = "SELECT DISTINCT State,Country FROM atword_xl_db where Country='$search' and LATITUDE !='' and LONGITUDE !='' LIMIT 52"; 
	$myqueryb  = "SELECT DISTINCT City,Country FROM atword_xl_db where Country='$search' and LATITUDE !='' and LONGITUDE !='' LIMIT 60"; 
	
    $query  = mysqli_query($con,$myquery);
	$queryb = mysqli_query($con,$myqueryb);
	
	echo "<select class='from-control' id='searchB'>";
	      echo "<option></option>"; 
    while($x = mysqli_fetch_assoc($query)) {
		 echo "<option value=".$x['State'].">".strtoupper($x['State'])."</option>"; 
    }
    echo "<select/>";
      
	echo "<select class='from-control searchD' id='searchD'>";
	     echo "<option></option>"; 
    while($x = mysqli_fetch_assoc($queryb)) {
		 echo "<option value=".$x['City'].">".strtoupper($x['City'])."</option>"; 
    }
    echo "<select/>"; 
	
    mysqli_close($con);

?>




