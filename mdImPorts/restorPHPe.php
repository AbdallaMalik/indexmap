<?php require_once('../mdDB/astinit.php');

	$mdPATH = "";
	$smPATH = "../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();

	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();
	$stWEBFICON   = $stDBCONST->getstWEBFICON();
	$stWEBLOGO    = $stDBCONST->getstWEBLOGO();
	$stWEBTITLE   = $stDBCONST->getstWEBTITLE();
	
	$smCONNECT    = $stDBss->getsmCONNECT();
	
	
    if(isset($_POST["mdAction"]))
	{
		$mdAction = $_POST["mdAction"];
		
		$mdResults = "";
		$mdResult  = "";
		if($mdAction == "mdTRANSIndx")
		{
			$mdUPLOADRows = $_POST['mdUPLOADRows'];
			$mdUPLOADoset = $_POST['mdUPLOADoset'];
			
			$mdOffset = ($mdUPLOADoset - 1) * $mdUPLOADRows;
			
			$tv = " * ";
			$tb = " tb_indexmaz_backUP3 ";
			$tw = " AND InPID != '0'
			        AND InCountry != 'UAE'
			        ORDER BY InID ASC 
					LIMIT $mdOffset, $mdUPLOADRows ";
			
			$CheckDATA = $stDBss->CheckDATA($tv,$tb,$tw);
			if(mysqli_num_rows($CheckDATA) > 0)
			foreach($CheckDATA as $mdROWs)
			{
				
				$InPurPose  = "Sale";
				$InDistrict = "";
				$InComPound = "";
				$InUPD      = 0;
				
				$InIDFs     = $mdROWs['InID'];
				$InName     = trim($mdROWs['InName']);
				$InCountry  = trim($mdROWs['InCountry']);
				$InCity     = trim($mdROWs['InCity']);
				$InArea     = trim($mdROWs['InArea']);
				$InAddress  = trim($mdROWs['InAddress']);
				$InSize     = $mdROWs['InSize'];
				$InSizeFT   = $mdROWs['InSizeFT'];
				$InPrice    = $mdROWs['InPrice'];
				$InPricePFT = $mdROWs['InPricePFT'];
				$InPricePMT = $mdROWs['InPricePMT'];
				$InLAT      = $mdROWs['InLAT'];
				$InLNG      = $mdROWs['InLNG'];
				$InProName  = trim($mdROWs['InProjectName']);
				$InPATHs    = $mdROWs['InPATHs'];
				$InBEDs     = $mdROWs['InBEDs'];
				$InTYPE     = trim($mdROWs['InTYPE']);
				$InLink     = trim($mdROWs['InLink']);
				$InFileID   = $mdROWs['InFileID'];
				$InCNCYName = $mdROWs['InCNCYName'];
				
				$mdResults = 2;
				
				$InPricePFT = round($InPricePFT,0);
				$InPricePMT = round($InPricePMT,0);
				$InPrice    = round($InPrice,0);
				$InSize     = round($InSize,0);
				$InSizeFT   = round($InSizeFT,0);
								
				$tva = " InID ";
				$tba = " tb_indexmaz ";
				$twa = " AND InName = '$InName' AND InPurPose = '$InPurPose' 
						 AND InTYPE = '$InTYPE' AND InCountry = '$InCountry'
						 AND InCity = '$InCity' AND InDistrict = '$InDistrict' 
						 AND InArea = '$InArea' AND InAddress = '$InAddress'
						 AND InComPound= '$InComPound' AND InSize = '$InSize'
						 AND InSizeFT = '$InSizeFT' AND InPrice = '$InPrice' 
						 AND InPricePFT = '$InPricePFT' AND InPricePMT = '$InPricePMT'
						 AND InLAT = '$InLAT' AND InLNG = '$InLNG' 
						 AND InProjectName = '$InProName' AND InBEDs = '$InBEDs'
						 AND InPATHs = '$InPATHs' AND InLink = '$InLink' AND InUPD = '$InUPD' ";
								
				$CheckDATAa = $stDBss->CheckDATA($tva,$tba,$twa);
				if(mysqli_num_rows($CheckDATAa) > 0)
				{
					$mdResults = 1;
				}
				else
				{
					$tvss = " max(InID) as InID ";
				    $tbss = " tb_indexmaz ";
				    $twss = " LIMIT 1 ";
								
				    $CheckDATAss = $stDBss->CheckDATA($tvss,$tbss,$twss);
				    $CheckROWS   = mysqli_fetch_assoc($CheckDATAss);
				    $InID = $CheckROWS['InID'];
				    $InID = $InID + 1;
				
					$tbs = " tb_indexmaz(InID,InName,InPurPose,InCountry,InCity,InDistrict,InArea,InAddress,
									     InComPound,InSize,InSizeFT,InPrice,InPricePFT,InPricePMT,InCNCYName,	
									     InLAT,InLNG,InProjectName,InPATHs,InBEDs,InTYPE,InLink,InFileID,InUPD) 
						     VALUES('$InID','$InName','$InPurPose','$InCountry','$InCity','$InDistrict','$InArea','$InAddress',
								    '$InComPound','$InSize','$InSizeFT','$InPrice','$InPricePFT','$InPricePMT','$InCNCYName',	
								    '$InLAT','$InLNG','$InProName','$InPATHs','$InBEDs','$InTYPE','$InLink','$InFileID','$InUPD') ";
								
				    $CreateDATA = $stDBss->CreateDATA($tbs);
				    if($CreateDATA)
				    {
					    $mdResults  = 1;
						
						$tble = " tb_indexmaz_backUP3 ";
						$tvle = " InPID = '0' ";
						$twle = " AND InID = '$InIDFs' ";
						$UPDateDATA = $stDBss->UPDateDATA($tble,$tvle,$twle);
					}
					
				}
				
			} 
			else
			{
				$mdResults = 3;
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

?>