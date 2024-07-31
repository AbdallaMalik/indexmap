<?php require_once('../../mdDB/astinit.php');

	ini_set('max_execution_time', 8000);
    ini_set('memory_limit','8000M');
    set_time_limit(0); 

	$mdPATH = "../";
	$smPATH = "../../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	
	
    if(isset($_GET["mdAction"]))
	{
		$mdAction = $_GET["mdAction"];
		
		$mdResults = "";
		$mdResult  = 0;
		$mdmass    = "unknown error";
		if($mdAction == "mdRestore")
		{
			$mdUPLOADRows = $_POST['mdUPLOADRows'];
			$mdUPLOADoset = $_POST['mdUPLOADoset'];
			$mdUPLOADKeY  = trim($_POST['mdUPLOADKeY']);
			
			$mdOFset      = ($mdUPLOADoset - 1) * $mdUPLOADRows;
			
			$mdPDKeY      = trim($mdUPLOADKeY);
			
			if($mdPDKeY == "InCountry")
			{
				$mdUPLOADKeY = "InCountry";
				$mdPDKeY     = "InCountry";
			}
			elseif($mdPDKeY == "InCity")
			{
				$mdUPLOADKeY = "InCity";
				$mdPDKeY     = "InCity";
			}
			elseif($mdPDKeY == "InDistrict")
			{
				$mdUPLOADKeY = "InDistrict";
				$mdPDKeY     = "InDistrict";
			}
			elseif($mdPDKeY == "InArea")
			{
				$mdUPLOADKeY = "InArea";
				$mdPDKeY     = "InArea";
			}
			elseif($mdPDKeY == "InAddress")
			{
				$mdUPLOADKeY = "InAddress";
				$mdPDKeY     = "InAddress";
			}
			elseif($mdPDKeY == "InPtName")
			{
				$mdUPLOADKeY = "InProjectName";
				$mdPDKeY     = "InPtName";
			}
			elseif($mdPDKeY == "InComPound")
			{
				$mdUPLOADKeY = "InComPound";
				$mdPDKeY     = "InComPound";
			}
				
			
			
			$tvs = " COUNT(InID) as InPOs, InPID, InPurPose, InCountry, InCity, InDistrict, InArea, InAddress, InProjectName, InComPound ";
			$tbs = " tb_IndexmaPs ";
			$tws = " AND InCountry !='' 
			         AND $mdUPLOADKeY !=''
                     GROUP BY $mdUPLOADKeY,InPurPose,InPID			
					 ORDER BY InPOs DESC 
					 LIMIT $mdOFset,$mdUPLOADRows ";
			
            			
			$CheckDATAs = $stDBss->CheckDATA($tvs,$tbs,$tws);
			if(mysqli_num_rows($CheckDATAs) > 0)
			foreach($CheckDATAs as $mdROWs)
			{
				$InPOs       = $mdROWs['InPOs'];
				$mdKeY       = $mdROWs[$mdUPLOADKeY];
				$InCountry   = $mdROWs['InCountry'];
				$InCity      = $mdROWs['InCity'];
				$InDistrict  = $mdROWs['InDistrict'];
				$InArea      = $mdROWs['InArea'];
				$InAddress   = $mdROWs['InAddress'];
				$InPName     = $mdROWs['InProjectName'];
				$InComPound  = $mdROWs['InComPound'];
				$InPID       = $mdROWs['InPID'];
				$InPurPose   = $mdROWs['InPurPose'];
				
				$mInOPARent  = $InCountry;
				$mInPARent   = $InCity;
				
				if($mdUPLOADKeY == "InCountry")
                    $mInPARent  = 0;
					
                if($mInPARent == "")
					$mInPARent = 0;
				
				$mdLmt = " LIMIT 1 ";
				
				$tvsd = " mID ";
			    $tbsd = " tb_IndexmaPs_meta ";
			    $twsd = " AND mInKeY = '$mdPDKeY'
                          AND mInValue = '$mdKeY'
						  AND mInTotal = '$InPOs'
						  AND mInPARent = '$mInPARent' 
						  AND mInOPARent = '$mInOPARent' 
						  AND mInPID = '$InPID' 
						  AND mInTYPe='$InPurPose'";
						  
				$mdWHr = $twsd.$mdLmt;				
			    $CheckDATAss = $stDBss->CheckDATA($tvsd,$tbsd,$mdWHr);
			    if(mysqli_num_rows($CheckDATAss) > 0)
				{
					$mdResult = 3;
					$mdmass    = "exist item";
				}
				else
				{
					
					$tvsdd = " mID ";
			        $tbsdd = " tb_IndexmaPs_meta ";
			        $twsdd = " AND mInKeY = '$mdPDKeY'
                               AND mInValue = '$mdKeY'
						       AND mInPARent = '$mInPARent' 
						       AND mInOPARent = '$mInOPARent' 
						       AND mInPID = '$InPID' 
							   AND mInTYPe='$InPurPose'";
					
					$mdWHr = $twsdd.$mdLmt;
			        $CheckDATAss = $stDBss->CheckDATA($tvsdd,$tbsdd,$mdWHr);
			        if(mysqli_num_rows($CheckDATAss) > 0)
				    {
						$tb = " tb_IndexmaPs_meta ";
						$tv = " mInTotal='$InPOs' ";
						$tw = " AND mInKeY = '$mdPDKeY'
                                AND mInValue = '$mdKeY'
						        AND mInPARent = '$mInPARent' 
						        AND mInOPARent = '$mInOPARent' 
						        AND mInPID = '$InPID' 
							    AND mInTYPe='$InPurPose'";
								
						$mdUPDate = $stDBss->UPDateDATA($tb,$tv,$tw);
						if($mdUPDate)
					    {
						    $mdResult = 2;
							$mdmass    = "UPdate item";
						}
					}
					else
					{
						$mdResult = 0;
						$mdmass    = "error";
						
						
						$tbss = " tb_IndexmaPs_meta(mInPID,mInKeY,mInTYPe,mInValue,mInTotal,mInPARent,mInOPARent) 
							      VALUES('$InPID','$mdPDKeY','$InPurPose','$mdKeY','$InPOs','$mInPARent','$mInOPARent')";
					
					    $mdDATA = $stDBss->CreateDATA($tbss);
					    if($mdDATA)
					    {
						    $mdResult = 1;
							$mdmass    = "Add item";
						}
						
					}
				}
				
				
			}
			else
			{
				$mdResult = 4;
				$mdmass    = "no more data";
			}
			
			
			$mdResults = $mdResult."|".$mdmass;
			echo $mdResults;
			exit();
		}
		else
		{
			echo "error";
			exit();
		}
	}
	else
	{
		echo "error";
		exit();
	}

?>