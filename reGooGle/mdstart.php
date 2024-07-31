<?php require_once('../mdDB/astinit.php');
    
	$smPATH = "../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	
	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();
	$stWEBFICON   = $stDBCONST->getstWEBFICON();
	$stWEBLOGO    = $stDBCONST->getstWEBLOGO();
	$stDTWEBLOGO  = $stDBCONST->getstWEBLOGO();
	$stDTWEBFICON = $stDBCONST->getstWEBFICON();
	$stWEBTITLE   = $stDBCONST->getstWEBTITLE();
	$stWEBZOOM    = $stDBCONST->getstWEBZOOM();
	
	$stWEBLAYER   = $stDBCONST->getstWEBLAYER();
	
	if(isset($_POST['dfAction']))
	{
		$mdResults = 0;
		$dfAction = $_POST['dfAction'];
		if($dfAction == "start")
		{
			$mdOFFs  = $_POST['mdOFFs'];
			$mdROWs  = $_POST['mdROWs'];
			$mdOFFss = ($mdOFFs - 1) * $mdROWs;
			
			$tb = " tb_mdtable ";
			$tv = " * ";
			$tw = " AND (mdbLAT ='' OR mdbLAT ='0')			
			        ORDER BY mdID ASC 
					LIMIT $mdOFFss,$mdROWs ";
			
			$showDATA = $stDBss->CheckDATA($tv,$tb,$tw);
			
			if(mysqli_num_rows($showDATA) > 0)
			{
				foreach($showDATA as $mROWs)
				{
					$mdID       = $mROWs['mdID'];
					$mdbArea    = $mROWs['mdbArea'];
					$mdbStreet  = $mROWs['mdbStreet'];
					$mdbuildNo  = $mROWs['mdbuildNo'];
					$mdbziPcode = $mROWs['mdbziPcode'];
					
					$mdstartAdds = $mdbziPcode.",".$mdbuildNo.",".$mdbStreet.",".$mdbArea.",saudi arabia";
					?>
					<input type="text" value="<?php echo $mdID;?>" id="mdstartID">
					<input type="text" value="<?php echo $mdstartAdds;?>" id="mdstartAdds<?php echo $mdID;?>">
					<?php
				}
			}
			else
			{
				$mdResults = 2;
			}
			
			echo $mdResults;
			exit();
		}
	
	    if($dfAction == "Geocode")
		{
			$mdALAT    = $_POST['mdALAT'];
			$mdALNG    = $_POST['mdALNG'];
			$mdstartID = $_POST['mdstartID'];
			
			$tb = " tb_mdtable ";
			$tv = " mdbLAT='$mdALAT',mdbLNG='$mdALNG' ";
			$tw = " AND mdID='$mdstartID' ";
			$startDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
			
			if($startDATA)
			{
				$mdResults = 1;
			}
			
			echo $mdResults;
			exit();
		}
	}
	else
	{
		echo "error";
		exit();
	}