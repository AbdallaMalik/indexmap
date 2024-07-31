<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
	
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction = $_POST['dfAction'];
		
		if($dfAction == "dfLoINFOs")
		{
			$country       = $_POST['country'];
			$dfCities      = $_POST['dfCities'];
			$fDistricts    = $_POST['fDistricts'];
			$dfArea        = $_POST['dfArea'];
			$dfAddress     = $_POST['dfAddress'];
			$dfProName     = $_POST['dfProName'];
			$defGeTzOooOm  = $_POST['defGeTzOooOm'];
			
			$currency      = $_POST['currency'];
	        $distPri       = $_POST['distPri'];
	        
			$defMAP        = $_POST['defMAP'];
			$defSEARCHMAP  = $_POST['defSEARCHMAP'];
			$currencsYmbol = $_POST['currencsYmbol'];
			$maPSHAReD     = $_POST['maPSHAReD'];
			$mYLaT         = $_POST['mYLaT'];
			$mYLnG         = $_POST['mYLnG'];
			
			$astmnPrice    = $_POST['astmnPrice'];
			$astmxPrice    = $_POST['astmxPrice'];
			
			
				
			$defSEARCH    = "";
			$defCountrYes = "";
			$defMETEsYes  = "";
			$MYmAP        = "";
			$MYmAPs       = "";
			$dfLOcSchs    = "";
			$dfTzOooOm    = "";
			
			$intsrSROsaleVLUes = $_POST['intsrSROsaleVLUes'];
			$intsrSResDNeVLUes = $_POST['intsrSResDNeVLUes'];	
			$intsrSBedsVLUes   = $_POST['intsrSBedsVLUes'];	
			$intsrSBthsVLUes   = $_POST['intsrSBthsVLUes'];	
			$intsrSPricesVLUes = $_POST['intsrSPricesVLUes'];	
			$intsrSAreasVLUes  = $_POST['intsrSAreasVLUes'];
			
			if(!empty($intsrSBedsVLUes))
			{
				$intsrSBedsVLUes = $intsrSBedsVLUes.",";
			}
			
			if(!empty($intsrSBthsVLUes))
			{
				$intsrSBthsVLUes = $intsrSBthsVLUes.",";
			}
			
			
			$res  = array();
			$data = array();
			
			$ChckCURRncYs = $stDBexTRas->CheckCURRencYs($currencsYmbol);
			
			$bzSRes  = array(",");
			$bzSROsaleVLUes = str_replace($bzSRes,"",$intsrSROsaleVLUes);
			
			$mdSROsaleVLUes = dfPLUSoPtions($intsrSROsaleVLUes,"InPurPose",$distPri);
	        $mdSResDNeVLUes = dfPLUSoPtions($intsrSResDNeVLUes,"InTYPE",$distPri);
			$mdSBedsVLUes   = dfPLUSoPtions($intsrSBedsVLUes,"InBEDs",$distPri);
			$mdSBthsVLUes   = dfPLUSoPtions($intsrSBthsVLUes,"InPATHs",$distPri);
			$mdSPricesVLUes = dfPLUSoPtions($intsrSPricesVLUes,"InPrice",$distPri);
			$mdSAreasVLUes  = dfPLUSoPtions($intsrSAreasVLUes,"InSizeFT",$distPri);
			
			$mdSROslVLUs    = $mdSROsaleVLUes.$mdSResDNeVLUes.$mdSBedsVLUes.$mdSBthsVLUes.$mdSPricesVLUes.$mdSAreasVLUes;
			
			
			$dfTzOooOm = dfSTzOooOms($defGeTzOooOm);
			$defSEARCH = dfProsearchs($defSEARCHMAP);	
			$dfLOcmMXs = dfLOcminMAXs($distPri,$astmnPrice,$astmxPrice);
			$dfLOcSchs = dfLOcSearchs($country,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
			$sWHRes    = $dfLOcSchs.$defSEARCH.$dfLOcmMXs.$dfTzOooOm.$mdSROslVLUs;
			
			$dftv      = " count(InID) as no, 
			               avg(InPrice) as InPrice,
					       min(InPrice) as mInPrice,
					       max(InPrice) as xInPrice,
					       avg(InPricePFT) as vInPricePFT,
					       min(InPricePFT) as mInPricePFT,
					       max(InPricePFT) as xInPricePFT,
					       avg(InPricePMT) as vInPricePMT,
					       min(InPricePMT) as mInPricePMT,
					       max(InPricePMT) as xInPricePMT,
						   InCountry, InCity, InDistrict, InArea, InAddress, 
						   InProjectName, InTYPE, InLAT, InLNG ";
						   
			$dftb      = " tb_indexmaz ";
			
			$sWtsale   = ",(SELECT AVG(InPrice) as ROIsale, 
                                   InLAT as InLATss,
                                   InLNG as InLNGss								   
						     FROM tb_indexmaz 
							 WHERE InPurPose='Sale' 
							 GROUP BY InLNG,InLAT) as ROIsales ";
			$sWtrent   = ",(SELECT AVG(InPrice) as ROIrent, 
                                   InLAT as InLATss,
                                   InLNG as InLNGss								   
						     FROM tb_indexmaz 
							 WHERE InPurPose='Rent' 
							 GROUP BY InLNG,InLAT) as ROIrents ";
			$sWtded   = ", (SELECT AVG(InPrice) as ROIded, 
                                   InLAT as InLATss,
                                   InLNG as InLNGss								   
						     FROM tb_indexmaz 
							 WHERE InPurPose='DED' 
							 GROUP BY InLNG,InLAT) as ROIdeds ";				 
			
			if($bzSROsaleVLUes == "Sale")
			{
				$sWtsales  = $sWtsale;
				$sWROIsale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) ";
			}
			elseif($bzSROsaleVLUes == "Rent")
			{
				$sWtsales  = $sWtrent;
				$sWROIsale = " AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
			}
			elseif($bzSROsaleVLUes == "DED")
			{
				$sWtsales  = $sWtded;
				$sWROIsale = " AND (InLAT=ROIdeds.InLATss AND InLNG=ROIdeds.InLNGss) ";
			}
			elseif($bzSROsaleVLUes == "ROI")
			{
				$sWtsales  = $sWtsale.$sWtrent;
				$sWROIsale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) 
				               AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
			}
			else
			{
				$sWtsales  = "";
				$sWROIsale = "";
			}
			
			$dftb = $dftb.$sWtsales;
			$stwGRP    = " AND InLAT !='' AND InLNG !='' 
			               LIMIT 1 ";
	        $stwGRPs   = $sWHRes.$sWROIsale.$stwGRP;
	        $ChckDATaG = $stDBss->CheckDATA($dftv,$dftb,$stwGRPs);
			$dfROWS    = mysqli_fetch_assoc($ChckDATaG);
			
			
			$data['avGInPrice']   = $dfROWS['InPrice'];
	        $data['avGInPricePFT']= $dfROWS['vInPricePFT'];
			$data['avGInPricePMT']= $dfROWS['vInPricePMT'];
				
	        $data['mInPrice']     = $dfROWS['mInPrice'];
	        $data['mInPricePFT']  = $dfROWS['mInPricePFT'];
	        $data['mInPricePMT']  = $dfROWS['mInPricePMT'];
				
	        $data['xInPrice']     = $dfROWS['xInPrice'];
			$data['xInPricePFT']  = $dfROWS['xInPricePFT'];
	        $data['xInPricePMT']  = $dfROWS['xInPricePMT'];
			
			$data['InCountry']    = "";	
			$data['InCity']       = "";
			$data['InDistrict']   = "";
			$data['InArea']       = "";
			$data['InAddress']    = "";
			$data['InProName']    = "";
			$data['InTYPE']       = "";
			
			$data['InNO']         = $dfROWS['no'];
			
		    array_push($res,$data);
			echo json_encode($res);	
			exit();
		}
	}


?>