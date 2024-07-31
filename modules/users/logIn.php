<?php session_start();
      $resPath ="../../";
      require($resPath."modules/HotelFunctions.php");
	  $db = new Hotel_Functions(); 

		$userPhone = $_POST['userPhone'];
		$userPass  = $_POST['userPass'];
		$userCode = $_POST['userCode'];
		
		
		
		$uPass = md5($userPass);

		$wUsers = $db->webUserLogIn($userPhone,$uPass);
		$rows = mysqli_fetch_array($wUsers);
			if($rows)
			{
				$Phone  = $userCode.$userPhone;
			    $number = $rows['userCountry'].$rows['userPhone'];
			
			    if($Phone == $number)
		        {
				    $res  = 1;
				    $_SESSION['validUser'] = $rows;
		        }
                else
			        $res = 2;				
		    }
		   else
			   $res = 2;
		
		
		
	
  echo $res;	
		
?>