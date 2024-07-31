<?php require_once('../../../reGccllPanel/reGDB/reGcInit.php');

    ini_set('max_execution_time', 8000);
    ini_set('memory_limit','8000M');
    set_time_limit(0); 
	
	$reGresult = 0;
    $reAdirect = "../../";
	$reGdirect = "../../";
	$reGPdirect = "../../../";
    if(isset($_POST['reGaction']))
	{
		$reGaction = $_POST['reGaction'];
	    if($reGaction == "reGlocate")
		{
			$reGmd = $_POST['reGmd'];
			if($reGmd == "reGlocate")
			{
				$reGknd = $_POST['reGknd'];
				if($reGknd == "reGlocate")
				{
					$reGRows  = $_POST['mdUPLOADRows'];
			        $reGPage  = $_POST['mdUPLOADoset'];
			        $reGmode  = trim($_POST['mdUPLOADKeY']);
			
			        $reGstart = ($reGPage - 1) * $reGRows;
			
			        $cGtb = " tb_IndexmaPs ";
					$cGtv = " COUNT(InID) as reGno, 
					          InCountry, InCity, InDistrict, InArea, 
					          InAddress, InComPound ";
					$cGtw = " AND $reGmode !='' 
					          GROUP BY $reGmode 
							  ORDER BY InID DESC
							  LIMIT $reGstart, $reGRows";
							  
			        $reGcPselect = reGcPselect($cGtb,$cGtv,$cGtw);
					if(mysqli_num_rows($reGcPselect) > 0)
					{
						foreach($reGcPselect as $rGcROWs)
						{
							$InCountry  = $rGcROWs['InCountry'];
							$InCity     = $rGcROWs['InCity'];
							$InDistrict = $rGcROWs['InDistrict'];
							$InArea     = $rGcROWs['InArea'];
							$InAddress  = $rGcROWs['InAddress'];
							$InComPound = $rGcROWs['InComPound'];
							
							$reGvalue   = $rGcROWs[$reGmode];
							$reGcmode   = reGcRetLocate($reGmode);
							$reGnestID  = reGcRensLocate($reGmode);
							$reGnestID  = $rGcROWs[$reGnestID];
							
							$cGtb = " tb_reGcLocates ";
					        $cGtv = " reGID ";
					        $cGtw = " AND reGmode     = '$reGcmode'
							          AND reGvalue    = '$reGvalue' 
									  AND reGParent   = '$InCity'
									  AND reGOParent  = '$InCountry'
									  AND reGnestedID = '$reGnestID'
							          LIMIT 1";
							$reGcPselect = reGcPselect($cGtb,$cGtv,$cGtw);
					        if(mysqli_num_rows($reGcPselect) > 0)
							{
								$reGresult = 3;
							}
							else
							{
								$cGtv = " MAX(reGID) AS reGID ";
			                    $cGtb = " tb_reGcLocates ";
			                    $cGtw = " ORDER BY reGID DESC LIMIT 1 ";
			                    $reGcPselect = reGcPselect($cGtb,$cGtv,$cGtw);
								$reGcProws   = mysqli_fetch_assoc($reGcPselect);
								$reGID       = $reGcProws['reGID'] + 1;
								
								$cGtb = " tb_reGcLocates(reGID,reGmode,reGvalue,reGParent,reGOParent,reGnestedID)";
								$cGtv = " VALUES('$reGID','$reGcmode','$reGvalue','$InCity','$InCountry','$reGnestID')";
								$reGcPinsert = reGcPinsert($cGtb,$cGtv);
								if($reGcPinsert)
									$reGresult = 1;
								else
									$reGresult = 2;
							}
						}
					}
					else 
					{
						$reGresult = 4;
					}
					
					$reGresults = $reGresult;
					echo $reGresults;
					exit();
				}
			}
			
		}

	}
	
	function mdSTRclean($mdstr)
	{
		$mdRNwrod = "";
		
	    $mdRNwrod = trim($mdstr);
		
		return $mdRNwrod;	
	}
	
	function mdFINDusername($mdstr)
	{
		$mdwords = "";
			
		$mdstart = 0;
		$mdlast  = strpos($mdstr,"@");
		$mdword  = substr($mdstr,$mdstart,$mdlast);
			
		$mdwords = $mdword.rand(0000,9999);
		
		return $mdwords;
	}
	
    