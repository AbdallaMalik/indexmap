<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";

	set_time_limit(0);
	ini_set('max_execution_time', 20000);
    //ini_set('memory_limit','8000M');
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$mdGDate    = date("Y-m-d");
	//tb_IndexmaPs_meta
	//$mdTBconnct = $stDBss->mdTBconnect("root","bsV@1234Vsb","cclub_agents_club");
	$mdTBconnct = $stDBss->mdTBconnect("cllubb_bright","bright@91mD#5","cllubb_agents_club");
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		if($dfAction == "default" || $dfAction == "indexDetails" || $dfAction == "dfLoINFOs")
		{
			$currency      = $_POST['currency'];
	        $dfCountries   = trim($_POST['dfCountries']);
	        $distPri       = $_POST['distPri'];
	        
			$defMAP        = $_POST['defMAP'];
			$defSEARCHMAP  = $_POST['defSEARCHMAP'];
			$currencsYmbol = $_POST['currencsYmbol'];
			$maPSHAReD     = $_POST['maPSHAReD'];
			$mYLaT         = $_POST['mYLaT'];
			$mYLnG         = $_POST['mYLnG'];
			
			$astmnPrice    = trim($_POST['astmnPrice']);
			$astmxPrice    = trim($_POST['astmxPrice']);
			
			$dfCities     = $_POST['dfCities'];
			$fDistricts   = $_POST['fDistricts'];
			$dfArea       = $_POST['dfArea'];
			$dfAddress    = $_POST['dfAddress'];
			$dfProName    = $_POST['dfProName'];
			$defGeTzOooOm = $_POST['defGeTzOooOm'];	
			
			$intsrSROsaleVLUes = $_POST['intsrSROsaleVLUes'];
			$intsrSResDNeVLUes = $_POST['intsrSResDNeVLUes'];	
			$intsrSBedsVLUes   = $_POST['intsrSBedsVLUes'];	
			$intsrSBthsVLUes   = $_POST['intsrSBthsVLUes'];	
			$intsrSPricesVLUes = $_POST['intsrSPricesVLUes'];	
			$intsrSAreasVLUes  = $_POST['intsrSAreasVLUes'];
			
			if(!empty($intsrSBedsVLUes))
			{
				$intsrSBedsVLUes = trim($intsrSBedsVLUes.",");
			}
			
			if(!empty($intsrSBthsVLUes))
			{
				$intsrSBthsVLUes = trim($intsrSBthsVLUes.",");
			}
			
			if(!empty($intsrSResDNeVLUes))
			{
				$intsrSResDNeVLUes = trim($intsrSResDNeVLUes.",");
			}
			
			$ChckCURRncYs = $stDBexTRas->CheckCURRencYs($currencsYmbol);
			
			$bzSRes           = array(",");
			
			$bzSROsaleVLUss = bzROIMDNxsls(0,$intsrSROsaleVLUes);
			$bzROIMDNxWHre  = bzROIMDNxsls(1,$intsrSROsaleVLUes);
			$bzROIWHre      = bzROIMDNxsls(2,$intsrSROsaleVLUes);

			$bzPAReROIWHre  = " AND InPID='0' ";
			$mdROIPID       = 0;
			if($bzROIWHre == "ded")
			{
				$bzPAReROIWHre  = " AND InPID='1' ";
				$mdROIPID       = 1;
			}
			
			$mdSEARchVALUes = dfProsearchs($defSEARCHMAP);
			$mdSReQMFPRCDs  = mdSReQPRICeDs("mnMx","mdPrices",$distPri,$currencsYmbol,$astmnPrice,$astmxPrice);
			$mdSReQPRICeDs  = mdSReQPRICeDs("mdPrice","mdPrices",$distPri,$currencsYmbol,$intsrSPricesVLUes,"");
			$mdSReQAReADs   = mdSReQPRICeDs("mdArea","mdAreas",$distPri,$currencsYmbol,$intsrSAreasVLUes,"");
			$mdGLBSchFULLs  = mdGLBSchFULLs($intsrSBedsVLUes,$intsrSBthsVLUes,$intsrSResDNeVLUes,"find");
			
			$mdGLBSZOoMs    = mdGLBSZOoMs($defGeTzOooOm,$mdROIPID,$bzSROsaleVLUss,"map");
			$dfLOcSchs      = dfLOcSearchs($dfCountries,$dfCities);
			
			$mdVPRICeDs     = $mdSReQMFPRCDs.$mdSReQPRICeDs.$mdSReQAReADs;
			$sWHRes         = $mdGLBSZOoMs.$dfLOcSchs.$mdVPRICeDs.$mdGLBSchFULLs.$mdSEARchVALUes;
			
			$sWHROIes = "";
			if($bzSROsaleVLUss == "ROI")
			{
				$mdGLBSchFULLss = mdGLBSchFULLs($intsrSBedsVLUes,$intsrSBthsVLUes,$intsrSResDNeVLUes,"");
				$sWHROIes       = $bzPAReROIWHre.$dfLOcSchs.$mdVPRICeDs.$mdGLBSchFULLss.$mdSEARchVALUes;
			
				$sORDeR = " GROUP BY InLNG,InLAT,InTYPE
			                ORDER BY InLNG,InLAT DESC 
			                LIMIT 3000 ";
			}
			else
			{
				$sORDeR = " GROUP BY InLNG,InLAT
			                ORDER BY InID DESC 
			                LIMIT 2000 ";
			}
			
			$bzROINxsals = "";
			$bzROINxtrms = "";
			
			$countROIsls = 0;
			if($dfAction == "default")
			{
				$data = array();
	            $res  = array();
				
				$dftvs     = " count(InID) as InPNO, 
				               AVG(InPricePFT) as vInPricePFT,							   
				               InID, InLAT, InLNG, InTYPE, InPurPose, InSizeFT ";
						   
			    $dftb      = " tb_IndexmaPs ";
			    $stwGRP    = " AND (InLAT !='' AND InLNG !='') 
				               AND (InLAT !='0' AND InLNG !='0') ";
				
				$dfROItbs    = $dftb.$bzROINxsals;
				
				$ROIcoounter = 0;			   
				$stwGRPs   = $sWHRes.$bzROINxtrms.$stwGRP.$sORDeR;
	            $ChckDATaG = $stDBss->CheckDATA($dftvs,$dfROItbs,$stwGRPs);
				if(mysqli_num_rows($ChckDATaG) > 0)
	            foreach($ChckDATaG as $rows)
	            { 
				    $ROIcoounter++;
					$InID           = $rows['InID'];
					$InLAT          = $rows['InLAT'];
					$InLNG          = $rows['InLNG'];
					$InPNO          = $rows['InPNO'];
					$vInPrice       = "";//$rows['vInPrice'];
					$vInPricePFT    = $rows['vInPricePFT'];
					$InTYPE         = $rows['InTYPE'];
					$InPurPose      = $rows['InPurPose'];
					$mdSize         = $rows['InSizeFT'];
					
					
					$mdReTMAPPRIcs  = "";
					$mdVPrice       = "";
				    $mdVPricePFT    = "";
					$mdVPricePMT    = "";
					
					$ROIsales       = "";
					$ROIsale        = ""; 
                    $ROIrent        = "";	
                    $avROIsales     = "";
					$ROIsaless      = "";
					$ROIcountTYPe   = "";
					$ROIrents       = "";
					$mdVPricPFTs    = "";
					$mdVPricPMTs    = "";
					
					$mdVPrice    = "";//mdMAPRetPRIces($vInPrice,$ChckCURRncYs);
					
					$mdVPricePFT = mdGeNRetPRIces($vInPricePFT,$ChckCURRncYs,"",1);
				    $mdVPricePMT = mdGeNRetPRIces($vInPricePFT,$ChckCURRncYs,"mt",1);
					
				    $mdVPricPFTs = mdGeNRetPRIces($vInPricePFT,$ChckCURRncYs,"","");
				    $mdVPricPMTs = mdGeNRetPRIces($vInPricePFT,$ChckCURRncYs,"mt","");

					$data['InID']          = $InID;
					$data['InLAT']         = $InLAT;
				    $data['InLNG']         = $InLNG;
					$data['InTYPE']        = $InTYPE;
				    $data['InPurPose']     = $InPurPose;
					$data['InPNO']         = $InPNO;
				    $data['mdVPrice']      = $mdVPrice;
					$data['mdVPricePFT']   = $mdVPricePFT;
					$data['mdVPricePMT']   = $mdVPricePMT;
					$data['mdVPricePFTs']  = $mdVPricPFTs;
					$data['mdVPricePMTs']  = $mdVPricPMTs;
					$data['ROIcoounter']   = $ROIcoounter;
					$data['ROIstus']       = $bzSROsaleVLUss;
					$data['mdROIPID']      = $mdROIPID;
					 
                    
					if($bzSROsaleVLUss == "ROI")
					{
						$ROIsale = bzROIsalesss($InLAT,$InLNG,"Sale",$InTYPE,$sWHROIes);
						$ROIrent = bzROIsalesss($InLAT,$InLNG,"Rent",$InTYPE,$sWHROIes);
						
						if($ROIsale != 0 && $ROIrent != 0)
						{
							//if($ROIrent > 14)
							    //$ROIrent    = $ROIrent - 13.5;
							
							$avROIsales = $ROIrent / $ROIsale;
							$ROIsaless  = $avROIsales * 100;
							$ROIsales   = round($ROIsaless,2);
								
							$countROIsale = bzROIsalesss($InLAT,$InLNG,"sSale",$InTYPE,$sWHROIes);
						    $countROIrent = bzROIsalesss($InLAT,$InLNG,"sRent",$InTYPE,$sWHROIes);
							
							$InPNO        = $countROIsale + $countROIrent;
							$ROIcountTYPe = "";//bzROIsaless($InLAT,$InLNG,"countTYPe",$ChckCURRncYs,$currencsYmbol,$InTYPE,$sWHROIes);
						
						    $data['ROIcountsales']  = $ROIcountTYPe;
							
					        $data['ROIsales']       = $ROIsales;
							$data['GNo']            = $InPNO;
							
							array_push($res,$data);
						}
					}
					else
					{
						$data['ROIcountsales']  = "";
					    $data['ROIsales']       = $ROIsales;
						$data['GNo']            = $InPNO;
					
						array_push($res,$data);
					}
					
				}
			    else
				{
					$res = "";
				}
			    echo json_encode($res);
			    exit();
			}
			
			if($dfAction == "dfLoINFOs")
			{
				$data = array();
	            $res  = array();
			
				$dftv      = " count(InID) as no,
					           avg(InPricePFT) as vInPricePFT,
					           min(InPricePFT) as mInPricePFT,
					           max(InPricePFT) as xInPricePFT ";
						   
				$dftb      = " tb_IndexmaPs ";
			    $stwGRP    = " AND InLAT !='' AND InLNG !='' 
			                   AND InLAT !='0' AND InLNG !='0'
							   LIMIT 1 ";

				$dfROItbs    = $dftb.$bzROINxsals;
				
				$ROIcoounter = 0;			   
				$stwGRPs   = $sWHRes.$bzROINxtrms.$stwGRP;
	            $ChckDATaG = $stDBss->CheckDATA($dftv,$dfROItbs,$stwGRPs);	
                $dfROWS    = mysqli_fetch_assoc($ChckDATaG);
			
			
			    $mdVPricePFT = mdGeNRetPRIces($dfROWS['vInPricePFT'],$ChckCURRncYs,"",1);
				$mdVPricePMT = mdGeNRetPRIces($dfROWS['vInPricePFT'],$ChckCURRncYs,"mt",1);
				
                $mdMPricePFT = mdGeNRetPRIces($dfROWS['mInPricePFT'],$ChckCURRncYs,"",1);
				$mdMPricePMT = mdGeNRetPRIces($dfROWS['mInPricePFT'],$ChckCURRncYs,"mt",1);
				
                $mdXPricePFT = mdGeNRetPRIces($dfROWS['xInPricePFT'],$ChckCURRncYs,"",1);
				$mdXPricePMT = mdGeNRetPRIces($dfROWS['xInPricePFT'],$ChckCURRncYs,"mt",1);
			
			    $data['avGInPrice']   = "";
	            $data['avGInPricePFT']= $mdVPricePFT;
			    $data['avGInPricePMT']= $mdVPricePMT;
				
	            $data['mInPrice']     = "";
	            $data['mInPricePFT']  = $mdMPricePFT;
	            $data['mInPricePMT']  = $mdMPricePMT;
				
	            $data['xInPrice']     = "";
			    $data['xInPricePFT']  = $mdXPricePFT;
	            $data['xInPricePMT']  = $mdXPricePMT;
			
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
			
			if($dfAction == "indexDetails")
			{
				$data = array();
	            $res  = array();
				
			    $dftb      = " tb_IndexmaPs ";

				$InCountry            = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InCountry",1);
			    $data['InCountry']    = $InCountry;	
			    $InCity               = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InCity",4);
			    $data['InCity']       = $InCity;
			    $InDistrict           = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InDistrict",6);
			    $data['InDistrict']   = $InDistrict;
			    $InArea               = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InArea",8);
			    $data['InArea']       = $InArea;
			    $InAddress            = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InAddress",10);
			    $data['InAddress']    = $InAddress;
				$InComPound           = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InComPound",12);
			    $data['InComPound']    = $InComPound;
			    $InAddress            = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InProjectName",12);
			    $data['InProName']    = $InAddress;
				
			    $InPurPose            = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InPurPose",2);
			    $data['InPurPose']    = $InPurPose;
				$InTYPE               = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InTYPE",20);
			    $data['InTYPE']       = $InTYPE;
				$InPATHs              = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InPATHs",6);
			    $data['InPATHs']      = $InPATHs;
				$InBEDs               = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"InBEDs",6);
			    $data['InBEDs']       = $InBEDs;
				
				$xInSize              = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"xInSize",1);
			    $data['xInSize']      = $xInSize;
				
				$mInSize              = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"mInSize",1);
			    $data['mInSize']      = $mInSize;
				
				$xInPrice             = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"xInPrice",1);
			    $data['xInPrice']     = mdMAPRetPRIces($xInPrice,$ChckCURRncYs);
				
				$mInPrice             = astDTBLeOFIndxes($sWHRes,$dftb,$distPri,"mInPrice",1);
			    $data['mInPrice']     = mdMAPRetPRIces($mInPrice,$ChckCURRncYs);
				
				
				array_push($res,$data);
				echo json_encode($res);
			    exit();
			}
						   
		}
		
        if($dfAction == "mdSHOWTBLe")
		{			
            $mdTBLe    = "tb_IndexmaPs";
            $mdPRKeY   = "InID";
			$mdMAPscncYVLUe  = $_POST['mdMAPscurrencYVLUe'];
			$mdMAPscurrencY  = $_POST['mdMAPscurrencY'];
			$mdUNLOCkVALUes  = $_POST['mdUNLOCkVALUes'];
			$mdsearcPAsnone  = $_POST['mdsearchLstPAsnone'];
			$mdsearcOPsnone  = $_POST['mdsearchLstOPsnone'];
			
			$mdcolumns = array(
			                array( 'db' => 'InID',  'dt' => 0,
							               'formatter' => function( $d, $row ) {
                                                return mdTBLeRetInOPtions($d);
											}),
                            array( 'db' => 'InID', 'dt' => 1,),
                            array( 'db' => 'InCountry',  'dt' => 2,),
							array( 'db' => 'InCity',  'dt' => 3,),
							array( 'db' => 'InDistrict',  'dt' => 4,),
							array( 'db' => 'InArea',  'dt' => 5,),
							array( 'db' => 'InAddress',  'dt' => 6,),
							array( 'db' => 'InComPound',  'dt' => 7,),
							array( 'db' => 'InProjectName',  'dt' => 8,),
							array( 'db' => 'InPurPose',  'dt' => 9,),
							array( 'db' => 'InTYPE',  'dt' => 10,),
							array( 'db' => 'InPrice',  'dt' => 11,
							                'formatter' => function( $d, $row ) {
                                                return mdTBLeRetPRIces($d);
											}),
							array( 'db' => 'InPricePMT',  'dt' => 12,
							                'formatter' => function( $d, $row ) {
                                                return mdTBLeRetPRIces($d);
											}),
							array( 'db' => 'InPricePFT',  'dt' => 13,
							                'formatter' => function( $d, $row ) {
                                                return mdTBLeRetPRIces($d);
											}),
							array( 'db' => 'InSize',  'dt' => 14,),
							array( 'db' => 'InSizeFT',  'dt' => 15,),
							array( 'db' => 'InBEDs',  'dt' => 16,),
							array( 'db' => 'InPATHs',  'dt' => 17,),
							array( 'db' => 'InLink',  'dt' => 18,
							               'formatter' => function( $d, $row ) {
                                                return mdTBLeRetInLNks($d);
											})
	                    );
			
			
			$mdMAPscountries = $_POST['mdMAPscountries'];
			$mdMAPscities    = $_POST['mdMAPscities'];
		    $mdMAPsdistrict  = $_POST['mdMAPsdistrict'];
			$mdMAPsareas     = $_POST['mdMAPsareas'];
			$mdMAPsaddress   = $_POST['mdMAPsaddress'];
			$mdMAPsbuilds    = $_POST['mdMAPsbuilds'];
			$mdMAPsPname     = $_POST['mdMAPsPname'];
			$mdMAPssearchBOx = $_POST['mdMAPssearchBOx'];
			
			$mdMAPsSize      = $_POST['mdMAPsSize'];
			$mdMAPsSizeVLUe  = $_POST['mdMAPsSizeVLUe'];
			
			$mdfGeTzOooOm    = $_POST['mdfGeTzOooOm'];
			
			$mdSROsaleVLUes  = $_POST['mdSROsaleVLUes'];
			$mdSResDNeVLUes  = $_POST['mdSResDNeVLUes'];
			$mdSBedsVLUes    = $_POST['mdSBedsVLUes'];
			$mdSBthsVLUes    = $_POST['mdSBthsVLUes'];
			$mdSPricesVLUes  = $_POST['mdSPricesVLUes'];
			$mdSAreasVLUes   = $_POST['mdSAreasVLUes'];
			
			$mdastmnPrice    = $_POST['mdastmnPrice'];
			$mdastmxPrice    = $_POST['mdastmxPrice'];
			
			if(!empty($mdSBedsVLUes))
			{
				$mdSBedsVLUes = $mdSBedsVLUes.",";
			}
			
			if(!empty($mdSBthsVLUes))
			{
				$mdSBthsVLUes = $mdSBthsVLUes.",";
			}
			
			if(!empty($mdSResDNeVLUes))
			{
				$mdSResDNeVLUes = trim($mdSResDNeVLUes.",");
			}
			
			$bzSRes  = array(",");

			$bzSROsaleVLUss = bzROIMDNxsls(0,$mdSROsaleVLUes);
			$bzROIMDNxWHre  = bzROIMDNxsls(1,$mdSROsaleVLUes);
			$bzROIWHre      = bzROIMDNxsls(2,$mdSROsaleVLUes);
			
			$mdROIPID = 0;
			if($bzROIWHre == "ded")
			    $mdROIPID = 1;
			
			$mdWHRstrt = " InCountry !='' AND InLAT !='' AND InLNG !='' ";
			if($mdUNLOCkVALUes == "mdSimPle")
			{
				$mdWHRstrt = " InCountry !='' AND InLAT ='' AND InLNG ='' ";
				if($bzROIWHre == "ded")
					$mdROIPID = 4;
			}
			
			$mdSEARchVALUes = dfProsearchs($mdMAPssearchBOx);
			$mdSReQMFPRCDs  = mdSReQPRICeDs("mnMx","mdPrices",$mdMAPsSizeVLUe,$mdMAPscurrencY,$mdastmnPrice,$mdastmxPrice);
			$mdSReQPRICeDs  = mdSReQPRICeDs("mdPrice","mdPrices",$mdMAPsSizeVLUe,$mdMAPscurrencY,$mdSPricesVLUes,"");
			$mdSReQAReADs   = mdSReQPRICeDs("mdArea","mdAreas",$mdMAPsSizeVLUe,$mdMAPscurrencY,$mdSAreasVLUes,"");
			$mdGLBSchFULLs  = mdGLBSchFULLs($mdSBedsVLUes,$mdSBthsVLUes,$mdSResDNeVLUes,"find");
			
			$mdGLBSZOoMs    = mdGLBSZOoMs($mdfGeTzOooOm,$mdROIPID,$bzSROsaleVLUss,"map");
			$dfLOcSchs      = dfLOcSearchs($mdMAPscountries,$mdMAPscities);
			
			$mdVPRICeDs = $mdSReQMFPRCDs.$mdSReQPRICeDs.$mdSReQAReADs;
			$sWHRes     = $mdGLBSZOoMs.$dfLOcSchs.$mdVPRICeDs.$mdGLBSchFULLs.$mdSEARchVALUes;
			
			
			
			$whereResult = $mdWHRstrt.$sWHRes;
			
			require_once('ssp.class.php');
			echo json_encode(SSP::mdsimPle ( $_POST, $mdTBconnct, $mdTBLe, $mdPRKeY, $mdcolumns, $whereResult ));
			exit();
		}			
	
	    if($dfAction == "mdsearch")
		{
			$fm    = $_POST['fm'];
			$fmID  = $_POST['fmID'];
			$fmLst = $_POST['fmLst'];
			$fmKNd = $_POST['fmKNd'];
			
			$mdMAPscountries = $_POST['mdMAPscountries'];
			$mdMAPscities    = $_POST['mdMAPscities'];
		    $mdMAPsdistrict  = $_POST['mdMAPsdistrict'];
			$mdMAPsareas     = $_POST['mdMAPsareas'];
			$mdMAPsaddress   = $_POST['mdMAPsaddress'];
			$mdMAPsbuilds    = $_POST['mdMAPsbuilds'];
			$mdMAPsPname     = $_POST['mdMAPsPname'];
			$mdMAPsSize      = $_POST['mdMAPsSize'];
			$mdMAPscurrencY  = $_POST['mdMAPscurrencY'];
			$mdMAPssearchBOx = $_POST['mdMAPssearchBOx'];
			
			$mdMAPsSizeVLUe  = $_POST['mdMAPsSizeVLUe'];
			
			$mdSROsaleVLUes  = $_POST['mdSROsaleVLUes'];
			$mdSResDNeVLUes  = $_POST['mdSResDNeVLUes'];
			$mdSBedsVLUes    = $_POST['mdSBedsVLUes'];
			$mdSBthsVLUes    = $_POST['mdSBthsVLUes'];
			$mdSPricesVLUes  = $_POST['mdSPricesVLUes'];
			$mdSAreasVLUes   = $_POST['mdSAreasVLUes'];
			
			$mdastmnPrice    = $_POST['mdastmnPrice'];
			$mdastmxPrice    = $_POST['mdastmxPrice'];
			
			if(!empty($mdSBedsVLUes))
			{
				$mdSBedsVLUes = $mdSBedsVLUes.",";
			}
			
			if(!empty($mdSBthsVLUes))
			{
				$mdSBthsVLUes = $mdSBthsVLUes.",";
			}
			
			if(!empty($mdSResDNeVLUes))
			{
				$mdSResDNeVLUes = trim($mdSResDNeVLUes.",");
			}
			
			$bzSRes  = array(",");

			$bzSROsaleVLUss = bzROIMDNxsls(0,$mdSROsaleVLUes);
			$bzROIMDNxWHre  = bzROIMDNxsls(1,$mdSROsaleVLUes);
			$bzROIWHre      = bzROIMDNxsls(2,$mdSROsaleVLUes);
			
			$mdROIPID = 0;
			if($bzROIWHre == "ded")
			{
				$mdROIPID = 1;
			}
			
			$mdscountries   = "";
			if($mdMAPscountries != "" && $mdMAPscountries != "ALL")
				$mdscountries = " AND mInOPARent='$mdMAPscountries'";
			
			$mdscities   = "";
			
			/*
			if($mdMAPscities != "" && $mdMAPscities != "ALL")
				$mdscities = " AND mInPARent='$mdMAPscities'";
			*/
			
			$bzSROsales = ucwords(trim($bzSROsaleVLUss));
			
			$mdSROsale   = " AND mInTYPe='$bzSROsales' ";
			if($bzSROsaleVLUss == "ROI")
				$mdSROsale = " AND(mInTYPe='Sale' OR mInTYPe='Rent')";
			
			$whereRsult    = " AND mInPID = '$mdROIPID' ";
				
            $whereResult = $whereRsult.$mdSROsale.$mdscountries.$mdscities;				
			
			$mdSeARchINBOx = mdSeARchNBOx($whereResult,$mdMAPssearchBOx,$bzSROsales,"",$fmKNd,$fm,$fmID,$fmLst);
			echo $mdSeARchINBOx;	
			exit();
		}
	
	    if($dfAction == "mdsearchLst")
		{
			$fmKNd    = $_POST['fmKNd'];
			$srSCNTRY = "null";
			
			$mdMAPscountries = $_POST['mdMAPscountries'];
			$mdMAPscities    = $_POST['mdMAPscities'];
			
			if($fmKNd == "srSCNTRY")
			    $srSCNTRY  = mdCOUNTeRsrchLst("srSCNTRY",$mdMAPscountries,$mdMAPscities);
			
			$mdResults = $srSCNTRY."|"."";
			
			echo $mdResults;
			exit();
		}
	
	    if($dfAction == "mdSHOWmarker")
		{
			$mYLATLNG   = $_POST['mYLATLNG'];
			$mYTYPe     = $_POST['mYTYPe'];
			$mYROIstus  = $_POST['mYROIstus'];
			$mYmdROIPID = $_POST['mYmdROIPID'];
			$mYmdGNo    = $_POST['mYmdGNo'];
			$mYmdInID   = $_POST['mYmdInID'];
			
			$mdSEARchVALUe  = $_POST['mdSEARchVALUe'];
			$mdSIZeVALUe    = $_POST['mdSIZeVALUe'];
			$mdSYMBVALUe    = $_POST['mdSYMBVALUe'];
			$mdMPrcVALUe    = $_POST['mdMPrcVALUe'];
			$mdXPrcVALUe    = $_POST['mdXPrcVALUe'];
			$mdSResDNeVLUes = $_POST['mdSResDNeVLUes'];
			$mdSBedsVLUes   = $_POST['mdSBedsVLUes'];
			$mdSBthsVLUes   = $_POST['mdSBthsVLUes'];
			$mdSPricesVLUes = $_POST['mdSPricesVLUes'];
			$SAreasVLUes    = $_POST['SAreasVLUes'];

			$mdMAPscncYVLUe =  $stDBexTRas->CheckCURRencYs($mdSYMBVALUe);
			
			if(!empty($mdSBedsVLUes))
				$mdSBedsVLUes = $mdSBedsVLUes.",";
			
			if(!empty($mdSBthsVLUes))
				$mdSBthsVLUes = $mdSBthsVLUes.",";
			
			if(!empty($mdSResDNeVLUes))
				$mdSResVLUes = $mdSResDNeVLUes.",";
			
			$mdGROUP    = " GROUP BY InLNG,InLAT ";	
			if($mYROIstus == "ROI")
			{
				$mdGROUP    = " GROUP BY InLNG,InLAT,InTYPE ";	
				if(!empty($mYTYPe))
				    $mdSResVLUes = $mYTYPe.",";
			}
			
			$mdSEARchVALUes = dfProsearchs($mdSEARchVALUe);
			$mdSReQMFPRCDs  = mdSReQPRICeDs("mnMx","mdPrices",$mdSIZeVALUe,$mdSYMBVALUe,$mdMPrcVALUe,$mdXPrcVALUe);
			$mdSReQPRICeDs  = mdSReQPRICeDs("mdPrice","mdPrices",$mdSIZeVALUe,$mdSYMBVALUe,$mdSPricesVLUes,"");
			$mdSReQAReADs   = mdSReQPRICeDs("mdArea","mdAreas",$mdSIZeVALUe,$mdSYMBVALUe,$SAreasVLUes,"");
			$mdGLBSchFULLs  = mdGLBSchFULLs($mdSBedsVLUes,$mdSBthsVLUes,$mdSResVLUes,"find");
			$mdGLBSZOoMs    = mdGLBSZOoMs($mYLATLNG,$mYmdROIPID,$mYROIstus,"marker");
			
			$mdVPRICeDs = $mdSReQMFPRCDs.$mdSReQPRICeDs.$mdSReQAReADs;
			$mdVWHre    = $mdGLBSZOoMs.$mdVPRICeDs.$mdGLBSchFULLs.$mdSEARchVALUes;
			
			$mdtPOPUP   = "EMPTY";
			$mdLIMIT    = "LIMIT 1";
				
			$mdGROUPs   = $mdGROUP.$mdLIMIT;
	
	        $mdTBLe     = " tb_IndexmaPs ";			
			$mdVALUes   = " COUNT(InID) as mdPNO, 
			                AVG(InPrice) as mdVPrice,
					        MIN(InPrice) as mdMPrice,
					        MAX(InPrice) as mdXPrice,
							AVG(InPricePFT) as mdVPriceFT,
					        MIN(InPricePFT) as mdMPriceFT,
					        MAX(InPricePFT) as mdXPriceFT,
							InCountry, InCity, InDistrict, InArea, InAddress, InProjectName, InComPound,
						    InID, InPID, InLAT, InLNG, InTYPE, InPurPose ";
							
			$mdWHRes    = $mdVWHre.$mdGROUPs;
	        $mdMARKer   = $stDBss->CheckDATA($mdVALUes,$mdTBLe,$mdWHRes);
			if(mysqli_num_rows($mdMARKer) > 0)
			{
				$mdROWs = mysqli_fetch_assoc($mdMARKer);
				
				$mdMPrice   = $mdROWs['mdMPrice'];
				$mdMPriceFT = $mdROWs['mdMPriceFT'];
				
				$mdXPrice   = $mdROWs['mdXPrice'];
				$mdXPriceFT = $mdROWs['mdXPriceFT'];
				
				$mdVPrice   = $mdROWs['mdVPrice'];
				$mdVPricPFT = $mdROWs['mdVPriceFT'];
				
				$mdCountry  = $mdROWs['InCountry'];
				$mdInCity   = $mdROWs['InCity'];
				$mdDistrict = $mdROWs['InDistrict'];
				$mdInArea   = $mdROWs['InArea'];
				$mdAddress  = $mdROWs['InAddress'];
				$mdInPName  = $mdROWs['InProjectName'];
				$mdComPound = $mdROWs['InComPound'];
				
				$mdInLAT    = $mdROWs['InLAT'];
				$mdInLNG    = $mdROWs['InLNG'];
				$mdInID     = $mYLATLNG;
				
				$mdVPrices   = mdMAPRetPRIces($mdVPrice,$mdMAPscncYVLUe);
				$mdVPricPFTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"",1);
				$mdVPricPMTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"mt",1);
				
				$mdMPriceFTs = mdMAPRetPRIces($mdMPriceFT,$mdMAPscncYVLUe);
				$mdMPricPMTs = mdGeNRetPRIces($mdMPriceFT,$mdMAPscncYVLUe,"mt",1);
				
				$mdXPriceFTs = mdMAPRetPRIces($mdXPriceFT,$mdMAPscncYVLUe);
				$mdXPricPMTs = mdGeNRetPRIces($mdXPriceFT,$mdMAPscncYVLUe,"mt",1);
				
				$mdVPrcPMTs = $mdVPricPMTs;
				$mdMPrcPMTs = $mdMPricPMTs;
				$mdXPrcPMTs = $mdXPricPMTs;
				
				$mdInSZess = "mt^2";
				if($mdSIZeVALUe == "ft")
				{
					$mdVPrcPMTs = $mdVPricPFTs;
				    $mdMPrcPMTs = $mdMPriceFTs;
				    $mdXPrcPMTs = $mdXPriceFTs;
					
					$mdInSZess = "ft^2";
				}
				
				$mdtPOPUP = '<div class="indexMAPlinks">
		                        <div class="">
							        <button class="indexMAPlink astwitter btn" InID="'.$mYmdInID.'" InLAT="'.$mdInLAT.'" 
							                InLNG="'.$mdInLNG.'" InPtName="'.$mdInPName.'"
											InCountry="'.$mdCountry.'" InAddress="'.$mdAddress.'" 
											astNOs="'.$mYmdGNo.'" fm="edt" onclick="asHMAOPRtion(this)">
										
										<i class="fa fa-edit"></i>
							        </button>
							        <div class="astFLex astMARKerSHAReee astMARKerSHAReee'.$mYmdInID.'">
			                            <button class="indexMAPlink aswhats btn" fm="wt" onclick="asHMAPlink(this)" lat="'.$mdInLAT.'" lng="'.$mdInLNG.'" id="'.$mYmdInID.'">
								            <span class="fa fa-whatsapp"></span>
							            </button>
							            <button class="indexMAPlink asface btn" fm="fb" onclick="asHMAPlink(this)" lat="'.$mdInLAT.'" lng="'.$mdInLNG.'" id="'.$mYmdInID.'">
								            <span class="fa fa-facebook"></span>
							            </button>
							            <button class="indexMAPlink astwitter btn" fm="tw" onclick="asHMAPlink(this)" lat="'.$mdInLAT.'" lng="'.$mdInLNG.'" id="'.$mYmdInID.'">
								            <span class="fa fa-twitter"></span>
							            </button>
							            <button class="indexMAPlink astwitter btn" fm="tl" onclick="asHMAPlink(this)" lat="'.$mdInLAT.'" lng="'.$mdInLNG.'" id="'.$mYmdInID.'">
								            <span class="fa fa-telegram"></span>
							            </button>
							        </div>
						            <button class="indexMAPlink astwitter btn" InID="'.$mYmdInID.'" InLAT="'.$mdInLAT.'" 
							            InLNG="'.$mdInLNG.'" InPtName="'.$mdInPName.'"
										InCountry="'.$mdCountry.'" InAddress="'.$mdAddress.'" 
										astNOs="'.$mYmdGNo.'" fm="dlt" onclick="asHMAOPRtion(this)">
										<i class="fa fa-trash"></i>
							        </button>
						        </div>
						    </div>';
							
								
					$mdPRIcBODLds  = ' <b class="astPRIcBODLdes">'.$mdSYMBVALUe.'</b>';
		            $mdPRIcBODLdes = ' <b class="astPRIcBODLdes">'.'<span>'.$mdInSZess.'</span></b>';
		            $vPRIces       = $mdPRIcBODLds.'<span class="">'.$mdVPrcPMTs.'</span>'.$mdPRIcBODLdes;
                    $mPRIces       = $mdPRIcBODLds.'<span class="">'.$mdMPrcPMTs.'</span>'.$mdPRIcBODLdes;
		            $xPRIces       = $mdPRIcBODLds.'<span class="">'.$mdXPrcPMTs.'</span>'.$mdPRIcBODLdes;

					$mdmXnPrices = '<div class="astFLex astPRIcesPen">
		                                <div class="astFLex astNUBERsLINks">
					                        <div class="astFLex astPOINTITLes">Min Price: </div>
						                    <div class="astFLex astNUBERsLINk astmPRIces astmPRIces'.$mYmdInID.'">'.$mPRIces.'</div>
					                    </div>
					                    
										<div class="astFLex astNUBERsLINks gray">
					                        <div class="astFLex astPOINTITLes">Max Price: </div>
						                    <div class="astFLex astNUBERsLINk astxPRIces astxPRIces'.$mYmdInID.'">'.$xPRIces.'</div>
					                    </div>
					                    
										<div class="astFLex astNUBERsLINks">
					                        <div class="astFLex astPOINTITLes">Avg Price: </div>
						                    <div class="astFLex astNUBERsLINk astvPRIces astvPRIces'.$mYmdInID.'">'.$vPRIces.'</div>
					                    </div>
				                    </div>';
				
                    $mdArea  = '<div class="astFLex astheadsLINks gray-layer">
			                        <div class="astFLex astNUBERsLINks">
			                            <div class="astFLex astPOINTITLes">Country   :</div>
						                <div class="astFLex astNUBERsLINk">'.$mdCountry.'</div>
					                </div>
				                </div>
								
				                <div class="astFLex astheadsLINks">	
					                <div class="astFLex astNUBERsLINks">
			                            <div class="astFLex astPOINTITLes">City   :</div>
						                <div class="astFLex astNUBERsLINk">'.$mdInCity.'</div>
					                </div>
				                </div>
								
				                <div class="astFLex astheadsLINks gray-layer">		
                                    <div class="astFLex astNUBERsLINks">
			                            <div class="astFLex astPOINTITLes">Area   :</div>
						                <div class="astFLex astNUBERsLINk">'.$mdInArea.'</div>
					                </div>
				                </div>
								
				                <div class="astFLex astheadsLINks">	
					                <div class="astFLex astNUBERsLINks">
			                            <div class="astFLex astPOINTITLes">Address   :</div>
						                <div class="astFLex astNUBERsLINk">'.$mdAddress.'</div>
					                </div>
				                </div>
								
				                <div class="astFLex astNUBERsLINks gray-layer">
					                <div class="astFLex astPOINTITLes">P.Name: </div>
					                <div class="astFLex astNUBERsLINk">'.$mdInPName.'</div>
				                </div>
								
				                <div class="astFLex astNUBERsLINks">
					                <div class="astFLex astPOINTITLes">Building: </div>
					                <div class="astFLex astNUBERsLINk">'.$mdComPound.'</div>
				                </div>';

                        $mdGRNos = '<div class="astFLex astNUBERsLINks astNUBERsclicks gray-layer">
			                            <div class="astFLex astPOINTITLes">T.Index  : </div>
							            <div class="astFLex astNUBERsLINk">
							                <span class="astFLex">'.$mYmdGNo.'</span>
								            <a href="javascript:void(0)" class="astFLex btn" fm="sn" 
											    InID="'.$mYmdInID.'" 
												mYLATLNG="'.$mYLATLNG.'"
								                mYROIstus="'.$mYROIstus.'" 
												InTYPe="'.$mYTYPe.'" 
												mYmdROIPID="'.$mYmdROIPID.'" 
												GNo="'.$mYmdGNo.'"
												onclick="astMOReIMAPs(this)">
								                    
											    <i class="fa fa-plus"></i>
												
									            <span >more</span>
								            </a>
							            </div>
						            </div>';
									
						$mdInPoRPose = '<div class="astFLex astheadsLINks astheadPURPose">		
                                            <div class="astFLex astNUBERsLINks">
			                                    <div class="astFLex astPOINTITLes">For :</div>
						                        <div class="astFLex astNUBERsLINk">'.$mYROIstus.'</div>
					                        </div>
					                        <div class="astFLex astNUBERsLINks">
			                                    <div class="astFLex astPOINTITLes">Type :</div>
						                        <div class="astFLex astNUBERsLINk">'.$mYTYPe.'</div>
					                        </div>
				                        </div>';				
 
                        
						$mdMARKer  = '<div class="leaf-body-data-layer" style="background:#fff"><div>'.$mdArea.$mdGRNos.$mdInPoRPose.$mdmXnPrices.'</div></div>';
					
					    $mdMARKers = $mdMARKer.$mdtPOPUP;
			
			}				
				
			$mdResults = $mdMARKers;
			echo $mdResults;
			exit();
		}
		
	    if($dfAction == "defURLOGo")
		{
			$defURLOGo    = $_POST['defURLOGo'];
			$stDTWEBLOGO  = $_POST['stDTWEBLOGO'];
			$stDTWEBFICON = $_POST['stDTWEBFICON'];
			$country      = trim($_POST['country']);
			
			$defICON = $stDTWEBFICON;
			$defLOGO = $stDTWEBLOGO;
				
			$country = str_replace(" ","_",$country)	;
			$defURLOGo = $defURLOGo.$country.".png";
			if(@getimagesize($defURLOGo))
			{
				$defICON = $defURLOGo;
				$defLOGO = $defURLOGo;
			}
			
			echo $defLOGO."|".$defICON;
			exit();
		}
	
	    if($dfAction == "asHMAOPRtions")
		{
			$res = "";
			$fm        = $_POST['fm'];
		    $InLAT     = $_POST['InLAT'];
		    $InLNG     = $_POST['InLNG'];
			$InLATO    = $_POST['InLATO'];
		    $InLNGO    = $_POST['InLNGO'];
            $InCountry = $_POST['InCountry'];
	        $InAddress = $_POST['InAddress'];
			$InID      = $_POST['InID'];
			
			if($fm == "edt")
			{
				
				$tb  = " tb_IndexmaPs ";
				$tv = " InLAT='$InLAT',
				        InLNG='$InLNG' ";
			    $tw = " AND InLAT='$InLATO'
				        AND InLNG='$InLNGO' ";			
				$UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
				if($UPDateDATA)
				{
					$tb = " tb_index_parent ";
				    $tv = " InPLAT='$InLAT',
				            InPLNG='$InLNG' ";
			        $tw = " AND nPLAT='$InLATO'
				            AND InPLNG='$InLNGO' ";			
				    $UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
					
					$res = 1;
				}
				else
				{
					$res = 2;
				}
				
				echo $res;
				exit();
			}
			if($fm == "dlt")
			{
				$tb = " tb_IndexmaPs ";
				$tw = " AND InLAT='$InLAT'
				        AND InLNG='$InLNG' ";
				
				$DELEteDATA = $stDBss->DELEteDATA($tb,$tw);
				if($DELEteDATA)
				{
					$res = 1;
				}
				else
				{
					$res = 2;
				}
				
				echo $res;
				exit();
			}
		}
		
		if($dfAction == "asHMASOPRtion")
		{
			$res     = "";
			$fm      = $_POST['fm'];
			$fmID    = $_POST['fmID'];
			$InPID   = $_POST['InPID'];
			$astGnos = $_POST['astGnos'];
			
			if($fm == "snRmve")
			{
				if($astGnos !="" && $astGnos !=0)
				{
					$astGnos = $astGnos - 1;
				}
				$tb = " tb_IndexmaPs ";
				$tw = " AND InID='$fmID' ";
				
				$DELEteDATA = $stDBss->DELEteDATA($tb,$tw);
				if($DELEteDATA)
				{
					$tb  = " tb_index_parent ";
				    $tv = " InPNO='$astGnos' ";
			        $tw = " AND InPID='$InPID' ";			
				    $UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
					$res = 1;
				}
				else
				{
					$res = 2;
				}
				
				echo $res;
				exit();
			}
		}
		
		if($dfAction == "astMLOADers")
		{
			$mdResults = "";
			$fm         = $_POST['fm'];
		    $mYLATLNG   = $_POST['mYLATLNG'];
			$mYTYPe     = $_POST['mYTYPe'];
			$mYROIstus  = $_POST['mYROIstus'];
			$mYmdROIPID = $_POST['mYmdROIPID'];
			$mYmdGNo    = $_POST['mYmdGNo'];
			$mYmdInID   = $_POST['mYmdInID'];
			
			$mdSEARchVALUe  = $_POST['mdSEARchVALUe'];
			$mdSIZeVALUe    = $_POST['mdSIZeVALUe'];
			$mdSYMBVALUe    = $_POST['mdSYMBVALUe'];
			$mdMPrcVALUe    = $_POST['mdMPrcVALUe'];
			$mdXPrcVALUe    = $_POST['mdXPrcVALUe'];
			$mdSResDNeVLUes = $_POST['mdSResDNeVLUes'];
			$mdSBedsVLUes   = $_POST['mdSBedsVLUes'];
			$mdSBthsVLUes   = $_POST['mdSBthsVLUes'];
			$mdSPricesVLUes = $_POST['mdSPricesVLUes'];
			$SAreasVLUes    = $_POST['SAreasVLUes'];

			$mdMAPscncYVLUe =  $stDBexTRas->CheckCURRencYs($mdSYMBVALUe);
			
			if(!empty($mdSBedsVLUes))
				$mdSBedsVLUes = $mdSBedsVLUes.",";
			
			if(!empty($mdSBthsVLUes))
				$mdSBthsVLUes = $mdSBthsVLUes.",";
			
			if(!empty($mdSResDNeVLUes))
				$mdSResVLUes = $mdSResDNeVLUes.",";
			
			$mdGROUP    = " GROUP BY InLNG,InLAT ";	
			if($mYROIstus == "ROI")
			{
				$mdGROUP    = " GROUP BY InLNG,InLAT,InTYPE ";	
				if(!empty($mYTYPe))
				    $mdSResVLUes = $mYTYPe.",";
			}
			
			$mdSEARchVALUes = dfProsearchs($mdSEARchVALUe);
			$mdSReQMFPRCDs  = mdSReQPRICeDs("mnMx","mdPrices",$mdSIZeVALUe,$mdSYMBVALUe,$mdMPrcVALUe,$mdXPrcVALUe);
			$mdSReQPRICeDs  = mdSReQPRICeDs("mdPrice","mdPrices",$mdSIZeVALUe,$mdSYMBVALUe,$mdSPricesVLUes,"");
			$mdSReQAReADs   = mdSReQPRICeDs("mdArea","mdAreas",$mdSIZeVALUe,$mdSYMBVALUe,$SAreasVLUes,"");
			$mdGLBSchFULLs  = mdGLBSchFULLs($mdSBedsVLUes,$mdSBthsVLUes,$mdSResVLUes,"find");
			$mdGLBSZOoMs    = mdGLBSZOoMs($mYLATLNG,$mYmdROIPID,$mYROIstus,"marker");
			
			$mdVPRICeDs = $mdSReQMFPRCDs.$mdSReQPRICeDs.$mdSReQAReADs;
			$mdVWHre    = $mdGLBSZOoMs.$mdVPRICeDs.$mdGLBSchFULLs.$mdSEARchVALUes;
			
			$mdtPOPUP   = "EMPTY";
			$mdLIMIT    = "LIMIT 1";
			$mdGROUPs   = $mdGROUP.$mdLIMIT;
	
	        $mdTBLe     = " tb_IndexmaPs ";			
			$mdVALUes   = " COUNT(InID) as mdPNO, 
							AVG(InPricePFT) as mdVPriceFT,
					        MIN(InPricePFT) as mdMPriceFT,
					        MAX(InPricePFT) as mdXPriceFT,
							InCountry, InCity, InDistrict, InArea, InAddress, InProjectName, InComPound,
						    InID, InPID, InLAT, InLNG ";
							
			$mdWHRes    = $mdVWHre.$mdGROUPs;
	        $mdMARKer   = $stDBss->CheckDATA($mdVALUes,$mdTBLe,$mdWHRes);
			if(mysqli_num_rows($mdMARKer) > 0)
			while($astROWss = mysqli_fetch_assoc($mdMARKer))
			{
				$InLAT       = $astROWss['InLAT'];
				$InLNG       = $astROWss['InLNG'];
				
				$InPPLAT     = $astROWss['InLAT'];
				$InPIDs      = $astROWss['InPID'];
	            $mdPNO       = $astROWss['mdPNO'];
				$InCountry   = $astROWss['InCountry'].".";
				$InCity      = $astROWss['InCity'].".";
				$InDistrict  = $astROWss['InDistrict'].".";
				$InArea      = $astROWss['InArea'].".";
				$InAddress   = $astROWss['InAddress'].".";
				$InPtName    = $astROWss['InProjectName'].".";
				$InComPound  = $astROWss['InComPound'].".";

				$mdMPriceFT  = $astROWss['mdMPriceFT'];
				$mdXPriceFT  = $astROWss['mdXPriceFT'];
				$mdVPricPFT  = $astROWss['mdVPriceFT'];
			
				$mdVPricPFTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"",1);
				$mdVPricPMTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"mt",1);
				
				$mdMPriceFTs = mdMAPRetPRIces($mdMPriceFT,$mdMAPscncYVLUe);
				$mdMPricPMTs = mdGeNRetPRIces($mdMPriceFT,$mdMAPscncYVLUe,"mt",1);
				
				$mdXPriceFTs = mdMAPRetPRIces($mdXPriceFT,$mdMAPscncYVLUe);
				$mdXPricPMTs = mdGeNRetPRIces($mdXPriceFT,$mdMAPscncYVLUe,"mt",1);
				
				$astVPrice = $mdVPricPMTs;
				$astMPrice = $mdMPricPMTs;
				$astXPrice = $mdXPricPMTs;
				
				$mdInSZess = "mt^2";
				$InSIZes   = "Meter";
				$asMPRIcem = "";
				if($mdSIZeVALUe == "ft")
				{
					$astVPrice = $mdVPricPFTs;
				    $astMPrice = $mdMPriceFTs;
				    $astXPrice = $mdXPriceFTs;
					
					$mdInSZess = "ft^2";
					$InSIZes   = "Feet";
				}
			   
			    ?>
				<div class="astMLOADTable">
				    <div class="astMLOADetails astMLOADHEAD">
					    <div class="astMLOADHEADer astFLex">
						    <h3>Index Summery</h3>
						</div>
					    <table class="table">
						    <tbody>
							    <tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Project Name
										</div>
									</th>
									<td>
									    <div>
										    <?php echo $InPtName;?>
										</div>
									</td>
								</tr>
							    <tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Country
										</div>
									</th>
									<td class="astDRent">
									    <div>
										    <?php echo $InCountry;?>
										</div>
									</td>
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    City
										</div>
									</th>
									<td >
									    <div>
										    <?php echo $InCity;?>
										</div>
									</td>
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    District
										</div>
									</th>
									<td class="astDRent">
									    <div>
										    <?php echo $InDistrict;?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Area
										</div>
									</th>
									<td>
									    <div>
										    <?php echo $InArea;?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Address
										</div>
									</th>
									<td class="astDRent">
									    <div>
										    <?php echo $InAddress;?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    building
										</div>
									</th>
									<td class="astDRent">
									    <div>
										    <?php echo $InComPound;?>
										</div>
									</td>
									
								</tr>
								
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    CRNCY/Sze
										</div>
									</th>
									<td>
									    <div>
										    <?php echo $mdSYMBVALUe." / ".$mdInSZess;?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Total Index 
										</div>
									</th>
									<td class="astDRent">
									    <div>
										    <?php echo $mdPNO;?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Min Price 
										</div>
									</th>
									<td>
									    <div class="astSIDemPRIce">
										    <?php echo $astMPrice.'<b class="astPRIcBODLdes"> '.$mdSYMBVALUe.' / <span>'.$mdInSZess.'</span></b>';?>
										</div>
									</td>
									
								</tr>
								<tr class="astFLex">
								    <th class="astDRents">
									    <div class="astSIDexPRIce">
										    Max Price 
										</div>
									</th>
									<td class="astDRent">
									    <div class="astSIDevPRIce">
										    <?php echo $astXPrice.' <b class="astPRIcBODLdes">'.$mdSYMBVALUe.' / <span>'.$mdInSZess.'</span></b>';?>
										</div>
									</td>
									
								</tr>
							    <tr class="astFLex">
								    <th class="astDRents">
									    <div>
										    Avg Price 
										</div>
									</th>
									<td>
									    <div>
										    <?php echo $astVPrice.' <b class="astPRIcBODLdes">'.$mdSYMBVALUe.' / <span>'.$mdInSZess.'</span></b>';?>
										</div>
									</td>
									
								</tr>
							</tbody>
						</table>
					</div>
					<div class="astMLOADetails">
					  <div class="astMLOADHEADer astFLex">
						  <h3>Index Details</h3>
					  </div>		  
				      
					    
				        <?php
					    $mdGROUP    = " GROUP BY InTYPE,InPurPose ";	
			            $mdLIMIT    = "LIMIT $mdPNO";
				
			            $mdGROUPs   = $mdGROUP.$mdLIMIT;
	
	                    $mdTBLe     = " tb_IndexmaPs ";			
			            $mdVALUes   = " COUNT(InID) as mdPNO,
						                AVG(InPricePFT) as mdVPriceFT,
										MIN(InPricePFT) as mdMPriceFT,
										MAX(InPricePFT) as mdXPriceFT,
										InTYPE, InPurPose ";
							
			            $mdWHRes      = $mdVWHre.$mdGROUPs;
		                $CheckQUERYss = $stDBss->CheckDATA($mdVALUes,$mdTBLe,$mdWHRes);
				        foreach($CheckQUERYss as $astROWss)
				        {
							$InTYPE    = $astROWss['InTYPE'];
							$InPurPose = $astROWss['InPurPose'];
							$mdPNOs    = $astROWss['mdPNO'];
							
				            $mdVPricPFT  = $astROWss['mdVPriceFT'];
							$mdMPricPFT  = $astROWss['mdMPriceFT'];
							$mdXPricPFT  = $astROWss['mdXPriceFT'];
			
				            $mdVPricPFTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"",1);
				            $mdVPricPMTs = mdGeNRetPRIces($mdVPricPFT,$mdMAPscncYVLUe,"mt",1);
							
							$mdMPricPFTs = mdGeNRetPRIces($mdMPricPFT,$mdMAPscncYVLUe,"",1);
				            $mdMPricPMTs = mdGeNRetPRIces($mdMPricPFT,$mdMAPscncYVLUe,"mt",1);
							
							$mdXPricPFTs = mdGeNRetPRIces($mdXPricPFT,$mdMAPscncYVLUe,"",1);
				            $mdXPricPMTs = mdGeNRetPRIces($mdXPricPFT,$mdMAPscncYVLUe,"mt",1);
				
							$avGMTROWs = $mdVPricPMTs;
							$avGFTROWs = $mdVPricPFTs;
							
							$amGMTROWs = $mdMPricPMTs;
							$amGFTROWs = $mdMPricPFTs;
							
							$axGMTROWs = $mdXPricPMTs;
							$axGFTROWs = $mdXPricPFTs;
							
							$tbss     = " tb_IndexmaPs ";
				            $tvss     = " * ";
				            
							if(!empty($InTYPE))
								$mdSResVLUes = $InTYPE.",";
							
							$mdGLBSZOoMss   = mdGLBSZOoMs($mYLATLNG,$mYmdROIPID,$InPurPose,"marker");
			
							$mdGLBSchFULLs  = mdGLBSchFULLs($mdSBedsVLUes,$mdSBthsVLUes,$mdSResVLUes,"find");
			                $mdSWHre        = $mdGLBSZOoMss.$mdVPRICeDs.$mdGLBSchFULLs.$mdSEARchVALUes;
				
				            $mdGROUP    = " ORDER BY InPricePMT DESC ";	
			                $mdLIMIT    = "LIMIT $mdPNOs";
				
			                $mdGROUPs   = $mdGROUP.$mdLIMIT;
							
				            $tWrss  = $mdSWHre.$mdGROUPs;
		                    $CheckQUERYsss = $stDBss->CheckDATA($tvss,$tbss,$tWrss);
							?>
							<table class="mdROWHtable astMLOADTble table table-hover">
							    <tbody>
						            <tr class="mdROWtitles astFLex">
								        <td class="mdROWsale astFLex">
										    <div class="astFLex">
											    <span><?php echo $InPurPose;?></span>
											</div> 
										</td>
								        <td class="mdROWkind astFLex">
										    <div class="astFLex">
											    <span><?php echo $InTYPE;?></span>
												<b><?php echo $mdPNOs;?></b>
											</div> 
										</td>
								        <td class="mdROWsale astFLex">
										    <div class="astFLex"><?php echo "<i>avg</i><span>".$avGMTROWs."</span><i>mt</i>";?></div>
											<div class="astFLex"><?php echo "<i>avg</i><span>".$avGFTROWs."</span><i>ft</i>";?></div>
										</td>
							        </tr>
						        </tbody>
							</table>
							
							<table class="astMLOADTble table table-hover">
							<thead>
						    <tr class="">
								<th><div>*</div> </th> 
								<th> <div>building</div> </th>
								<th class="mdTBROWdt"><div class="astFLex"><span>Size </span><i>ft^2</i></div> </th>
								<th class="mdTBROWdt"><div class="astFLex"><span>Size </span><i>mt^2</i></div></th>
								<th class="mdTBROWdt"><div class="astFLex"><span>Price </span><i>ft^2</i></div></th>
								<th class="mdTBROWdt"><div class="astFLex"><span>Price </span><i>mt^2</i></div></th>
							</tr>
						    </thead>
						    <tbody>
							<?php
							$astNOs = 0;
							foreach($CheckQUERYsss as $astROWs)
							{
							    $InComPound    = $astROWs['InComPound'];
					            $InSizeFT      = $astROWs['InSizeFT'];
					            $InSize        = $astROWs['InSize'];
					            $InPrice       = $astROWs['InPrice'];
					            $InPricePFT    = $astROWs['InPricePFT'];
					            $InPricePMT    = $astROWs['InPricePMT'];
					            $InLAT         = $astROWs['InLAT'];
					            $InLNG	       = $astROWs['InLNG'];
					            $InLink	       = $astROWs['InLink'];
							    $InID	       = $astROWs['InID'];
							    $InPID	       = $astROWs['InPID'];
						    
						        $mPColor = " ";
							    $xPColor = "";
								
								$InPrice    = mdMAPRetPRIces($InPrice,$mdMAPscncYVLUe);
				                $InPricePMT = mdGeNRetPRIces($InPricePFT,$mdMAPscncYVLUe,"mt",1);
							    $InPricePFT = mdGeNRetPRIces($InPricePFT,$mdMAPscncYVLUe,"",1);
								
							    if($InPricePFT == $amGFTROWs || $InPricePMT == $amGMTROWs)
							    {
								    $mPColor = " background-color:#ffc107;color:#fff; ";
								}
							
							    if($InPricePFT == $axGFTROWs || $InPricePMT == $axGMTROWs)
							    {
								    $xPColor = " background-color:#dc3545;color:#fff; ";
								}
							
							    $InSize    = round($InSize,1);
							    $InSizeFT  = round($InSizeFT,1);
							
					            $astNOs++;
								
								?>
								<tr class="astMOReROWss astMOReROWss<?php echo $InID;?>">
							    
								<td>
								    <div>
									    <a href="javascript:void(0)"
                                            class="btn astFLex"	
											fm="snRmve"
											id="<?php echo $InID;?>"
											InPID="<?php echo $InPID;?>"
											astGnos="<?php echo $astNOs;?>"
											
										    onclick="asHMASOPRtion(this)">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</td>
								
								<td >
								    <div>
									    <?php echo $InComPound;?>
									</div>
								</td>
								<td >
								    <div>
									    <?php echo $InSizeFT;?>
									</div>
								</td>
								<td >
								    <div>
									    <?php echo $InSize;?>
									</div>
								</td>
								<td style="<?php echo $mPColor." ".$xPColor;?>">
								    <div>
									    <?php echo $InPricePFT;?>
									</div>
								</td>
								<td style="<?php echo $mPColor." ".$xPColor;?>">
								    <div>
									    <?php echo $InPricePMT;?>
									</div>
								</td>
							    
								</tr>
								<?php
							}
							?>
							</tbody>
							</table>
							<?php
						}
						?>
					  
					</div> 
				</div>	
				<?php
				
			}
			exit();
		}
	
	    if($dfAction == "mdTBLeAction")
		{
			$dfKNd = $_POST['dfKNd'];
			$fm    = $_POST['fm'];
			$mdID  = $_POST['mdID'];
			
			if($dfKNd == "mdhtml")
			{
				$mdMAPscurrencY = $_POST['mdMAPscurrencY'];
				$mdMAPsSizeVLUe = $_POST['mdMAPsSizeVLUe'];
				
				if($fm == "edt")
				{
					$tb = " tb_IndexmaPs ";
					$tv = " * ";
					$tw = " AND InID='$mdID' ";
					
					$mdDATA = $stDBss->CheckDATA($tv,$tb,$tw);
					if(mysqli_num_rows($mdDATA) > 0)
					{
						$mdROWs = mysqli_fetch_assoc($mdDATA);
						
						$InPurPose    = $mdROWs['InPurPose'];
						$InTYPE       = $mdROWs['InTYPE'];
						$InPID        = $mdROWs['InPID'];
						
						$InCountry    = $mdROWs['InCountry'];
						$InCity       = $mdROWs['InCity'];
						$InDistrict   = $mdROWs['InDistrict'];
						$InArea       = $mdROWs['InArea'];
						$InAddress    = $mdROWs['InAddress'];
						$InComPound   = $mdROWs['InComPound'];
						$InProjctName = $mdROWs['InProjectName'];
						
						$InSize       = $mdROWs['InSize'];
						$InSizeFT     = $mdROWs['InSizeFT'];
						$InPrice      = $mdROWs['InPrice'];
						$InPricePFT   = $mdROWs['InPricePFT'];
						$InPricePMT   = $mdROWs['InPricePMT'];
						
						$InBEDs       = $mdROWs['InBEDs'];
						$InPATHs      = $mdROWs['InPATHs'];
						$InLink       = $mdROWs['InLink'];
						$InUnit       = $mdROWs['InUnit'];
						$InDateROsale = $mdROWs['InDateROsale'];
						
						$InLAT        = $mdROWs['InLAT'];
						$InLNG        = $mdROWs['InLNG'];
						$InOwnerId    = $mdROWs['InOwnerId'];
						
						$mdPROPerYKNd = mdPROPertYKNd($InPID);
						$mdPROPURPose = mdPROPertYPURPose($InPurPose);
						$mdPROPerTYPe = mdPROPertYTYPe($InTYPE);
						$mdPROcountrs = mdPROcountries($InCountry,"mdInCountry");
						
						$mdInPrice    = mdPROcurrencYies($InPrice,$mdMAPscurrencY,1);
						$mdInPricePFT = mdPROcurrencYies($InPricePFT,$mdMAPscurrencY,1);
						$mdInPricePMT = mdPROcurrencYies($InPricePMT,$mdMAPscurrencY,1);
						
					  ?>
					  <form class="astFLex mdActcontainer mdPROFORmtoAction" id="mdPROFORmtoAction">
					    <input type="hidden" value="<?php echo $mdMAPscurrencY;?>" id="mdFORMscurrencY" name="mdFORMscurrencY">
						<input type="hidden" value="<?php echo $mdMAPsSizeVLUe;?>" id="mdFORMsSizeVLUe" name="mdFORMsSizeVLUe">
						
						<input type="hidden" value="" class="mdFORMsthsID" id="mdFORMsthsID" name="mdID">
						<input type="hidden" value="" class="mdFORMsthsFM" id="mdFORMsthsFM" name="fm">
						<input type="hidden" value="" class="mdFORMsmdKNd" id="mdFORMsmdKNd" name="mdKNd">
						<input type="hidden" value="" class="mdFORMsmdAction" id="mdFORMsmdAction" name="mdAction">
						<input type="hidden" value="" class="mdFORMsdfAction" id="mdFORMsdfAction" name="dfAction">
						<input type="hidden" value="" class="mdFORMsdfKNd" id="mdFORMsdfKNd" name="dfKNd">

					    <div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Kind</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInPID" name="mdInPID">
									<?php echo $mdPROPerYKNd;?>
								</select>	
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">PurPose</label>
								<select class="mdAVLeINPut mdVLeNOtNull mdInPurPose" name="mdInPurPose">
									<?php echo $mdPROPURPose;?>
								</select>		
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">TYPe</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInTYPe" name="mdInTYPe">
									<?php echo $mdPROPerTYPe;?>
								</select>
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Country</label>
								<select class="mdAVLeINPut mdVLeNOtNull mdInCountry" name="mdInCountry">
									<?php echo $mdPROcountrs;?>
								</select>	
						    </div>
							<script>
							let mdseTInCountry = "<?php echo $InCountry?>";
							if(mdseTInCountry != "")
                                $(".mdInCountry").val(mdseTInCountry);
                            </script>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">City</label>
							    <input type="text" placeholder="City" 
								    value="<?php echo $InCity;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInCity" name="mdInCity">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">District</label>
							    <input type="text" placeholder="District" 
								    value="<?php echo $InDistrict;?>" 
									class="mdAVLeINPut mdInDistrict" name="mdInDistrict">
						    </div>
							
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Area</label>
							    <input type="text" placeholder="Area" 
								    value="<?php echo $InArea;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInArea" name="mdInArea">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Address</label>
							    <input type="text" placeholder="Address" 
								    value="<?php echo $InAddress;?>" 
									class="mdAVLeINPut mdInAddress" name="mdInAddress">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Building</label>
							    <input type="text" placeholder="Building" 
								    value="<?php echo $InComPound;?>" 
									class="mdAVLeINPut mdInComPound" name="mdInComPound">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Project Name</label>
							    <input type="text" placeholder="Project Name" 
								    value="<?php echo $InProjctName;?>" 
									class="mdAVLeINPut mdInPName" name="mdInPName">
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Size / mt</label>
							    <input type="text" placeholder="Size / mt" 
								    value="<?php echo $InSize;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInSize"
									fm="mdSize" onkeyup="mdONkeYINPTFOrm(event,this)"
									mdNumKNd="mdSize" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInSize">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Size / FT</label>
							    <input type="text" placeholder="Size / ft" 
								    value="<?php echo $InSizeFT;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInSizeFT" name="mdInSizeFT" readOnly>
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price <i class="mdscurrencY"> <?php echo $mdMAPscurrencY ?></i></label>
							    <input type="text" placeholder="Price / <?php echo $mdMAPscurrencY ?>" 
								    value="<?php echo $mdInPrice;?>"
									class="mdAVLeINPut mdVLeNOtNull mdInPrice"
									fm="mdPrice" onkeyup="mdONkeYINPTFOrm(event,this)" 
									mdNumKNd="mdPrice" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInPrice">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price/ ft</label>
							    <input type="text" placeholder="Price/ ft" 
								    value="<?php echo $mdInPricePFT;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInPricePFT" name="mdInPricePFT" readOnly>
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price / mt</label>
							    <input type="text" placeholder="Price / mt" 
								    value="<?php echo $mdInPricePMT;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInPricePMT" name="mdInPricePMT" readOnly>
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">BEDs</label>
							    <input type="number" placeholder="BEDs" 
								    value="<?php echo $InBEDs;?>" 
									class="mdAVLeINPut mdInBEDs" name="mdInBEDs">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">BATHs</label>
							    <input type="number" placeholder="BATHs" 
								    value="<?php echo $InPATHs;?>" 
									class="mdAVLeINPut mdInPATHs" name="mdInPATHs">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Link</label>
							    <input type="text" placeholder="Link" 
								    value="<?php echo $InLink;?>" 
									class="mdAVLeINPut mdInLink" name="mdInLink">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Unit</label>
							    <input type="text" placeholder="InUnit" 
								    value="<?php echo $InUnit;?>" 
									class="mdAVLeINPut mdInUnit" name="mdInUnit">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Date Of sale</label>
							    <input type="text" placeholder="Date Of sale" 
								    value="<?php echo $InDateROsale;?>" 
									class="mdAVLeINPut mdInDateROsale" name="mdInDateROsale">
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">LAT</label>
							    <input type="text" placeholder="LAT" 
								    value="<?php echo $InLAT;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInLAT"
									mdNumKNd="mdLAT" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInLAT">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">LNG</label>
							    <input type="text" placeholder="LNG" 
								    value="<?php echo $InLNG;?>" 
									class="mdAVLeINPut mdVLeNOtNull mdInLNG"
									mdNumKNd="mdLNG" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInLNG">
						    </div>
						</div>
					  
					  </form>
					  <?php
					}
					exit();
				}
			
			    if($fm == "add")
				{
					$mdPROPerYKNd = mdPROPertYKNd(0);
					$mdPROPURPose = mdPROPertYPURPose("Sale");
					$mdPROPerTYPe = mdPROPertYTYPe("Apartment");
                    $mdPROcountrs = mdPROcountries("UAE","mdInCountry");
					?>
					<form class="astFLex mdActcontainer mdPROFORmtoAction" id="mdPROFORmtoAction">
					    <input type="hidden" value="<?php echo $mdMAPscurrencY;?>" id="mdFORMscurrencY" name="mdFORMscurrencY">
						<input type="hidden" value="<?php echo $mdMAPsSizeVLUe;?>" id="mdFORMsSizeVLUe" name="mdFORMsSizeVLUe">
						
						<input type="hidden" value="" class="mdFORMsthsID" id="mdFORMsthsID" name="mdID">
						<input type="hidden" value="" class="mdFORMsthsFM" id="mdFORMsthsFM" name="fm">
						<input type="hidden" value="" class="mdFORMsmdKNd" id="mdFORMsmdKNd" name="mdKNd">
						<input type="hidden" value="" class="mdFORMsmdAction" id="mdFORMsmdAction" name="mdAction">
						<input type="hidden" value="" class="mdFORMsdfAction" id="mdFORMsdfAction" name="dfAction">
						<input type="hidden" value="" class="mdFORMsdfKNd" id="mdFORMsdfKNd" name="dfKNd">

						<div class="astFLex mdAVLesection">
						    
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Title</label>
							    <input type="text" placeholder="Title" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInName mdVALUeReset" name="mdInName">
						    </div>
							
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">status</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInstatus" name="mdInstatus">
									<option value="available">available</option>
						            <option value="offer">new</option>
						            <option value="new">hold</option>
						            <option value="offer">booked</option>
						            <option value="offer">sold</option>
						            <option value="hidden">hidden</option>
								</select>	
						    </div>
							
							<div class="astFLex mdAVLecontainer mdAVLecontnr2">
						        <div class="astFLex mdAVLecontainer2">
								    <label class="mdAVLeLABeL">Project Name</label>
									<input type="text" placeholder="Project Name" 
								        value="" 
									    class="mdAVLeINPut mdInPName mdVALUeReset" name="mdInPName"
										mdAction="mdPRohtml" md="mdPROsearch" 
										onchange="mdPROJecTCHsrch(this)" 
										onkeyup="mdPROJecTsearch(event,this)">
									<input type="hidden" value="" class ="mdInPROID" name="mdInPROID">
									<ul class="astFLex mdclear mdMAPsearchLst mdPROJecTsrch astDnone"></ul>
								</div>	
							    <div class="astFLex mdAVLecontainer3">
								    <a href="javascript:void(0)" class="astFLex mdGlnk btn"
									    mdAction="mdPRohtml" md="mdnew" mdID="" onclick="mdPROJecTAction(this)">
									    <i class="fa fa-plus"></i>
									</a>
								</div>
						    </div>
						</div>
						
					    <div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Kind</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInPID" name="mdInPID">
									<?php echo $mdPROPerYKNd;?>
								</select>	
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">PurPose</label>
								<select class="mdAVLeINPut mdVLeNOtNull mdInPurPose" name="mdInPurPose">
									<?php echo $mdPROPURPose;?>
								</select>		
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Rent Type</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInRKind" name="mdInRKind">
									<option value=""></option>
						            <option value="yearly">yearly</option>
						            <option value="monthly">monthly</option>
						            <option value="weekly">weekly</option>
								</select>	
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">TYPe</label>
							    <select class="mdAVLeINPut mdVLeNOtNull mdInTYPe" name="mdInTYPe">
									<?php echo $mdPROPerTYPe;?>
								</select>
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Country</label>
								<select class="mdAVLeINPut mdVLeNOtNull mdInCountry" name="mdInCountry">
									<?php echo $mdPROcountrs;?>
								</select>	
						    </div>
							<script>
                            $(".mdInCountry").val("UAE");
                            </script>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">City</label>
							    <input type="text" placeholder="City" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInCity mdVALUeReset" name="mdInCity">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">District</label>
							    <input type="text" placeholder="District" 
								    value="" 
									class="mdAVLeINPut mdInDistrict mdVALUeReset" name="mdInDistrict">
						    </div>
							
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Area</label>
							    <input type="text" placeholder="Area" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInArea mdVALUeReset" name="mdInArea">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Address</label>
							    <input type="text" placeholder="Address" 
								    value="" 
									class="mdAVLeINPut mdInAddress mdVALUeReset" name="mdInAddress">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Building</label>
							    <input type="text" placeholder="Building" 
								    value="" 
									class="mdAVLeINPut mdInComPound mdVALUeReset" name="mdInComPound">
						    </div>
							
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Size / mt</label>
							    <input type="text" placeholder="Size / mt" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInSize mdVALUeReset"
									fm="mdSize" onkeyup="mdONkeYINPTFOrm(event,this)"
									mdNumKNd="mdSize" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInSize">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Size / FT</label>
							    <input type="text" placeholder="Size / ft" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInSizeFT mdVALUeReset" name="mdInSizeFT" readOnly>
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price <i class="mdscurrencY"> <?php echo $mdMAPscurrencY ?></i></label>
							    <input type="text" placeholder="Price / <?php echo $mdMAPscurrencY ?>" 
								    value=""
									class="mdAVLeINPut mdVLeNOtNull mdInPrice mdVALUeReset"
									fm="mdPrice" onkeyup="mdONkeYINPTFOrm(event,this)" 
									mdNumKNd="mdPrice" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="12" name="mdInPrice">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price/ ft</label>
							    <input type="text" placeholder="Price/ ft" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInPricePFT mdVALUeReset" name="mdInPricePFT" readOnly>
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Price / mt</label>
							    <input type="text" placeholder="Price / mt" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInPricePMT mdVALUeReset" name="mdInPricePMT" readOnly>
						    </div>
						</div>
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">BEDs</label>
							    <input type="number" placeholder="BEDs" 
								    value="" 
									class="mdAVLeINPut mdInBEDs mdVALUeReset" name="mdInBEDs">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">BATHs</label>
							    <input type="number" placeholder="BATHs" 
								    value="" 
									class="mdAVLeINPut mdInPATHs mdVALUeReset" name="mdInPATHs">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Link</label>
							    <input type="text" placeholder="Link" 
								    value="" 
									class="mdAVLeINPut mdInLink mdVALUeReset" name="mdInLink">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Unit</label>
							    <input type="text" placeholder="InUnit" 
								    value="" 
									class="mdAVLeINPut mdInUnit mdVALUeReset" name="mdInUnit">
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Date Of sale</label>
							    <input type="date" placeholder="Date Of sale" 
								    value="" 
									class="mdAVLeINPut mdInDateROsale mdVALUeReset" name="mdInDateROsale">
						    </div>
							
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">Date Of build</label>
							    <input type="date" placeholder="Date Of build" 
								    value="<?php echo $mdGDate;?>" 
									class="mdAVLeINPut mdInDateOBuild mdVALUeReset" name="mdInDateOBuild">
						    </div>
						</div>
						
						<textarea class="this_PHUPloadedIms d-none" name="this_PHUPloadedIms"></textarea>
						<textarea class="this_PHUPloadedIfm d-none" name="this_PHUPloadedIfm"></textarea>
						<input type="hidden" class="this_PHUPloadedImd">
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">UPload Photos</label>
								<label class="astFLex mdAVLeINPFORut" for="mdUPloadZone">
							        <input type="file" placeholder="LAT" 
								        class="astDnone mdUPloadZone mdVALUeReset" id="mdUPloadZone"
									    mdAction="mdUPload" md="dzone" onchange="mdIsPRPhoto(event,this)"
									    name="mdUPloadZone" multiple>
										
									<i class="fa fa-image"></i>
									<i class="fa fa-check"></i>
									<div class="mdUPloadPRoGress">
									</div>
								</label>		
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">UPload Featured Image</label>
								<label class="astFLex mdAVLeINPFORut" for="mdUPloadFeatured">
							        <input type="file" placeholder="LAT" 
								        class="astDnone mdUPloadFeatured mdVALUeReset" id="mdUPloadFeatured"
									    mdAction="mdUPload" md="dFeatured" onchange="mdIsPRPhoto(event,this)"
									    name="mdUPloadFeatured">
										
									<i class="fa fa-image"></i>
									<i class="fa fa-check"></i>
									<div class="mdUPloadPRoGress">
									</div>
								</label>		
						    </div>
						</div>	
						
						<div class="astFLex mdAVLesection">
						    <div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">LAT</label>
							    <input type="text" placeholder="LAT" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInLAT mdVALUeReset"
									mdNumKNd="mdLAT" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="20" name="mdInLAT" readOnly>
						    </div>
							<div class="astFLex mdAVLecontainer">
						        <label class="mdAVLeLABeL">LNG</label>
							    <input type="text" placeholder="LNG" 
								    value="" 
									class="mdAVLeINPut mdVLeNOtNull mdInLNG mdVALUeReset"
									mdNumKNd="mdLNG" onkeypress="return mdIsPRIceVALUe(event,this)"
									maxlength="20" name="mdInLNG" readOnly>
						    </div>
						
						    <div class="mdCroPmaPs">
							    <div class="mdCroPmaPscontrol astFLex"> 
								    <a href="javascript:void(0)" class="astFLex btn start"
									    id="mdCroPmaPsInite">
										<i class="fa fa-lock"></i>
									</a>
								</div>
							    <div class="mdCroPmaPslab" id="mdCroPmaPs"></div>
							</div>
						</div>
					  
					</form>
					<?php
					exit();
				}
			}
		}
		
		if($dfAction == "mdCROPeDzone")
		{
			$dfKNd = $_POST['dfKNd'];
			
			if($dfKNd == "mdCROPe")
			{
				$mdResult    = 0;
                $thisCount   = 0;
			    $thisFileURL = "";
			    
				if(isset($_POST['image']))
			    {
				    $thisFiles   = $_POST['image'];
				    $thisCount   = count($thisFiles);
				    $thisFileURL = "";
				    
					foreach($thisFiles as $thisFile)
				    {
					    $thisURL     = rand();
					
					    if($thisFile != "")
					    {
						    $image_array_1 = explode(";", $thisFile);
	                        $image_array_2 = explode(",", $image_array_1[1]);
	                        $data = base64_decode($image_array_2[1]);
	                        
							$newFile     = time();
				            $target_dir  = '../../../uploads/'.$thisURL. '.png';
	                        $imgName     = 'uploads/'.$thisURL. '.png';
					
					        if(file_put_contents($target_dir, $data))
	                        {
					            $mdResult = 1;
								$thisFileURL .= $imgName.",";
							}
						}
					}
				}
         
			    echo $mdResult."|".$thisCount."|".$thisFileURL;
				exit();
			}
		}
	
	}
	
	
	