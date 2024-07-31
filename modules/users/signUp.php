<?php session_start();
      $resPath ="../../";
      require($resPath."modules/HotelFunctions.php");
	  $db = new Hotel_Functions(); 
	  
	    $userFName = $_POST['userFName'];
		$userLName = $_POST['userLName'];
		$userPhone = $_POST['userPhone'];
		$userEmail = $_POST['userEmail'];
		$userPass  = $_POST['userPass'];
		$userCountry = $_POST['userCountry'];
		$userCity    = $_POST['userCity'];
		$jDate     = date('yyyy-mm-dd H:i:s');
		
		$userName = $userFName." ".$userLName;

		$uPass = md5($userPass);

		$wUsers = $db->webUser($userPhone);
		
		if(!$wUsers)
		{
			$newWebUser = $db->newWebUser($userName,$userPhone,$userEmail,$uPass,$userCountry,$userCity);
			if($newWebUser)
			{
				$res  = 1;
				$webUserLast = $db->webUserLast($userPhone);
				$_SESSION['validUser'] = $webUserLast;
			}	
			else 
				$res = 2;
		}
		else
			$res = 3;
		
	
  echo $res;	
		
?>