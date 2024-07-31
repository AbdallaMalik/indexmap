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
			$mdAction = $_POST['mdAction'];
			$mdOFFs   = $_POST['mdOFFs'];
			$mdROWs   = $_POST['mdROWs'];
			$mdOFFss  = ($mdOFFs - 1) * $mdROWs;
			
			//8.928488_14.329137_36.173358_81.038122
			
			// 23.885942 , 45.079162
			
			//lat 16.88917,28.3998,30.97531
			//lng 50.10326,36.57151
			$mdstr     = array("منطقة","منطقه");
			$mdCountry = "Saudi Arabia";
			
			if($mdAction == "Geocode" || $mdAction == "Geocity")
			{
				$tb = " tb_mdtable ";
			    $tv = " * ";
			    $tw = " AND (mdbLAT ='' OR mdbLAT ='0')			
			            ORDER BY mdID ASC 
					    LIMIT $mdOFFss,$mdROWs ";
				$showDATA = $stDBss->CheckDATA($tv,$tb,$tw);
			    
			    if(mysqli_num_rows($showDATA) > 0)
				foreach($showDATA as $mROWs)
				{
					$mdID       = $mROWs['mdID'];
					$mdbArea    = $mROWs['mdbArea'];
					$mdbStreet  = $mROWs['mdbStreet'];
					$mdbuildNo  = $mROWs['mdbuildNo'];
					$mdbziPcode = $mROWs['mdbziPcode'];
					$mdbDstrct  = $mROWs['mdbCity'];
					
					//$mdbDstrct  = str_replace($mdstr,"",$mdbDstrct);
					
					$mdstartAdds = $mdbziPcode.",".$mdbuildNo.",".$mdbStreet.",".$mdbArea.",".$mdCountry;
					if($mdAction == "Geocity")
						$mdstartAdds = $mdbziPcode.",".$mdbuildNo.",".$mdbStreet.",".$mdbArea.",".$mdbDstrct.",".$mdCountry;
					?>
					<input type="text" value="<?php echo $mdID;?>" id="mdstartID">
					<input type="text" value="<?php echo $mdstartAdds;?>" id="mdstartAdds<?php echo $mdID;?>">
					<?php
				}
			    else
			    {
				    $mdResults = 2;
				}
			}
			elseif($mdAction == "Geofix")
			{
				$tb = " tb_business ";
			    $tv = " a_email ";
				//a_latitude , a_longitude, a_ads_update
			    $tw = " AND a_ads_update='9'
				        AND(a_latitude > '16.88917' AND a_latitude < '30.97531')
                        AND(a_longitude > '36.57151' AND a_longitude < '50.10326')						
			            ORDER BY a_id ASC 
					    LIMIT $mdOFFss,$mdROWs ";
				$showDATA = $stDBss->CheckDATA($tv,$tb,$tw);
			    
			    if(mysqli_num_rows($showDATA) > 0)
				foreach($showDATA as $mROWs)
				{
					$mdemail = $mROWs['a_email'];
					
					$tbs = " tb_mdtable ";
			        $tvs = " * ";
			        $tws = " AND mdbMail='$mdemail' ";
				    $showDATAs = $stDBss->CheckDATA($tvs,$tbs,$tws);
			    
			        if(mysqli_num_rows($showDATAs) > 0)
					{
						$mdROWss = mysqli_fetch_assoc($showDATAs);
						$mdID       = $mdROWss['mdID'];
					    $mdbArea    = $mdROWss['mdbArea'];
					    $mdbStreet  = $mdROWss['mdbStreet'];
					    $mdbuildNo  = $mdROWss['mdbuildNo'];
					    $mdbziPcode = $mdROWss['mdbziPcode'];
					    $mdbDstrct  = $mdROWss['mdbCity'];
					
					    //$mdbDstrct  = str_replace($mdstr,"",$mdbDstrct);
					
					    //$mdstartAdds = $mdbziPcode.",".$mdbuildNo.",".$mdbStreet.",".$mdbArea.",".$mdCountry;
					    //if($mdAction == "Geocity")
						$mdstartAdds = $mdbziPcode.",".$mdbuildNo.",".$mdbStreet.",".$mdbArea.",".$mdbDstrct.",".$mdCountry;
					    ?>
					        <input type="text" value="<?php echo $mdID;?>" id="mdstartID">
					        <input type="text" value="<?php echo $mdstartAdds;?>" id="mdstartAdds<?php echo $mdID;?>">
					    <?php
					}
					else
					{
						$mdResults = 3;
					}
				}
			    else
			    {
				    $mdResults = 2;
				}
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
			$tv = " mdbLAT='$mdALAT',mdbLNG='$mdALNG',mdbstatus='1' ";
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
		echo "error one";
		exit();
	}