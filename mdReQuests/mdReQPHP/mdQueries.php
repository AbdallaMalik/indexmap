<?php

    function mdlimitations( $request, $columns )
	{
		$limit = '';

		$request['length'] = $request['mdDTLimits'];
		if ( isset($request['start']) && $request['length'] != -1 ) {
			$limit = "LIMIT ".intval($request['start']).", ".intval($request['length']);
		}

		return $limit;
	}
	
	
	function mdCOUNTeRsrchLst($fmKNd,$dfCountries,$dfCities)
	{
		global $stDBss;
		$results = "";
		$dfVars  = array("|","/");
		
		$tb = " tb_IndexmaPs_meta ";
		$tv = " COUNT(mID) as fsNTOTals, mInKeY, mInValue ";
		
		$dfCONTRiess = "";
		$dfCITiess   = "";
		$dfDistricts = "";
		$dfAREAS     = "";
		$dfADDess    = "";
		$dfPROnmes   = "";
		
		$dfGSeArchs  = "";
		
		$dfCONTRiess  = " AND mInValue = 'UAE' ";
		$mInOPARent   = " AND mInOPARent ='UAE' ";
		if($dfCountries != "ALL" && $dfCountries != "")
		{
			$dfCONTRiess  = " AND mInValue = '$dfCountries' ";
			$mInOPARent   = " AND mInOPARent ='$dfCountries' ";
			if($dfCountries == "WorldWide")
			{
				$dfCONTRiess  = " AND mInValue != '' ";
				$mInOPARent = " AND mInOPARent !='' ";
			}
		}
		
		
		if($dfCities != "ALL" && $dfCities != "")
		{
			$dfCITiess  = " AND mInKeY = 'InCity' AND mInValue = '$dfCities' ";
		}
		
		$dfGSeArchs  = "";	
       	$aGmPholder  = "Countries";	
		
		if($fmKNd == "srSCNTRYs")
		{	
       	    $aGmPholder  = "Countries";
			$dfGSeArchs  = " AND mInKeY = 'InCountry' ";
		}
		elseif($fmKNd == "srSCNTRY")
		{	
       	    $aGmPholder  = "Cities";
			$mInValueddd = " AND mInKeY = 'InCity' ";
			$dfGSeArchs  = $mInOPARent.$mInValueddd;
		}
		
		$dfGRPsBYes = " GROUP BY mInValue
		                ORDER BY mInValue ASC 
						LIMIT 50 ";
				
		$fmWRe   = $dfGSeArchs.$dfGRPsBYes;
		$aLoadMs = $stDBss->CheckDATA($tv,$tb,$fmWRe);
		
		if($fmKNd != "srSCNTRYs")
		{
			$results .= '<option value="">'.$aGmPholder.'</option>';
		}
		
		$results .= '<option value="ALL">ALL</option>';
		
		if($dfCountries != "" && $dfCountries != "ALL")
		if(mysqli_num_rows($aLoadMs) > 0)
		foreach($aLoadMs as $fbROWs)
		{
			$dfGRPs   = $fbROWs['mInValue'];
			$results .= '<option value="'.$dfGRPs.'">'.$dfGRPs.'</option>';
		}
		
		return $results;
	}
	
    function mdsearchLst($fmKNd,$dfCountries,$dfCities)
	{
		global $stDBss;
		$results = "";
		$dfVars  = array("|","/");
		
		$tb = " tb_IndexmaPs ";
		$tv = " COUNT(InID) as fsNTOTals, InCountry, InCity ";
		
		$dfCONTRiess = "";
		$dfCITiess   = "";
		$dfDistricts = "";
		$dfAREAS     = "";
		$dfADDess    = "";
		$dfPROnmes   = "";
		
		$dfGSeArchs  = "";
		
		$dfCONTRiess  = " AND InCountry = 'UAE' ";
		if($dfCountries != "ALL" && $dfCountries != "")
		{
			$dfCONTRiess  = " AND InCountry = '$dfCountries' ";
			if($dfCountries == "WorldWide")
			{
				$dfCONTRiess  = " AND InCountry != '' ";
			}
		}
		
		
		if($dfCities != "ALL" && $dfCities != "")
		{
			$dfCITiess  = " AND InCity = '$dfCities' ";
		}
		
		$dfGSeArchs  = "";
		$dfGROUPs    = "InCountry";	
       	$aGmPholder  = "Countries";	
		
		if($fmKNd == "srSCNTRYs")
		{
			$dfGROUPs    = "InCountry";	
       	    $aGmPholder  = "Countries";
			$dfGSeArchs  = " AND InCountry != '' ";
		}
		elseif($fmKNd == "srSCNTRY")
		{
			$dfGROUPs    = "InCity";	
       	    $aGmPholder  = "Cities";
			$dfGSeArchs  = $dfCONTRiess;
		}
		
		$mdLAtLn    = " AND InLNG !='' AND InLAT !='' 
		                AND InLAT !='0' AND InLNG !='0' ";
		$dfGRPsBYes = " GROUP BY $dfGROUPs
		                ORDER BY $dfGROUPs ASC 
						LIMIT 50 ";
				
		$fmWRe   = $dfGSeArchs.$mdLAtLn.$dfGRPsBYes;
		$aLoadMs = $stDBss->CheckDATA($tv,$tb,$fmWRe);
		
		if($fmKNd != "srSCNTRYs")
		{
			$results .= '<option value="">'.$aGmPholder.'</option>';
		}
		
		$results .= '<option value="ALL">ALL</option>';
		
		if($dfCountries != "" && $dfCountries != "ALL")
		if(mysqli_num_rows($aLoadMs) > 0)
		foreach($aLoadMs as $fbROWs)
		{
			$dfGRPs   = $fbROWs[$dfGROUPs];
			$results .= '<option value="'.$dfGRPs.'">'.$dfGRPs.'</option>';
		}
		
		return $results;
	}
	
	function mdMAPsSizes($fmKNd,$fm,$fmID,$fmLst)
	{
		$results = "";
		if($fmKNd == "srASIZe")
		{
			$results = '<li class="astFLex">
			                <a href="javascript:void(0)" fm="'.$fm.'" fmID="'.$fmID.'" fmLst="'.$fmLst.'" 
							    fmVALUe="mt" fmKeYs="meter" fmKNd="'.$fmKNd.'" onclick="mdMAPksearchclick(this)" class="astFLex">
							    <span>meter</span>
							</a>
			            </li>
						<li class="astFLex">
			                <a href="javascript:void(0)" fm="'.$fm.'" fmID="'.$fmID.'" fmLst="'.$fmLst.'" 
							    fmVALUe="ft" fmKeYs="feet" fmKNd="'.$fmKNd.'" onclick="mdMAPksearchclick(this)" class="astFLex">
							    <span>feet</span>
							</a>
			            </li>';
		}
		elseif($fmKNd == "srSCRNCY")
		{
			global $stDBexTRas;
			
			$tv = " * ";
			$tb = " tb_indexskeys ";
			$tw = " AND indexTYPE='Last' ";
			$CheckDATA = $stDBexTRas->CheckDATA($tv,$tb,$tw);
			while($stROWS = mysqli_fetch_assoc($CheckDATA))
			{
				$indexKey   = $stROWS['indexKey'];
				$indexValue = $stROWS['indexValue'];
				$results .='<li class="astFLex">
			                    <a href="javascript:void(0)" fm="'.$fm.'" fmID="'.$fmID.'" fmLst="'.$fmLst.'" 
							        fmVALUe="'.$indexValue.'" fmKeYs="'.$indexKey.'" fmKNd="'.$fmKNd.'" onclick="mdMAPksearchclick(this)" class="astFLex">
							        <span>'.$indexKey.'</span>
							    </a>
			                </li>';
			}
		}
		
		return $results;
	}
	
	function dfLOADPlcsLIST()
	{
		global $stDBss;
		$results = "";
		
		$tb = " tb_IndexmaPs ";
		$tv  = " COUNT(*) as no,InCountry ";
		$stw = " GROUP BY InCountry  
				 ORDER BY InCountry DESC ";
		$CheckDATA = $stDBss->CheckDATA($tv,$tb,$stw);
		
		$results .= '<option value=""></option><option value="WorldWide">World</option>';
		foreach($CheckDATA as $rowsREaLs)
		{
			$slCountry = strtoupper($rowsREaLs['InCountry']);
			$results .= '<option value="'.$slCountry.'">'.$slCountry.'</option>';
		}
		
		return $results;
	}
    
	function mdSTRNGclean($mdstr)
	{
		$mdReStr = "";
		
		    $mdReStr   = trim($mdstr);
			$mdReStr   = htmlspecialchars($mdReStr);
			
		return $mdReStr;
	}
	
	function dfLOcSearchs($dfCountries,$dfCities)
	{
		
		$dfCONTRiess = "";
		$dfCITiess   = "";
		
		$dfGSeArchs  = "";
		
		
		$dfCountries = mdSTRNGclean($dfCountries);
		$dfCities    = mdSTRNGclean($dfCities);
		
		$dfCONTRiess  = " AND InCountry = 'UAE' ";
		if($dfCountries != "ALL" && $dfCountries != "")
		{
			$dfCONTRiess  = " AND InCountry = '$dfCountries' ";
			if($dfCountries == "WorldWide")
			{
				$dfCONTRiess  = " AND InCountry != '' ";
			}
		}
		
		if($dfCities != "ALL" && $dfCities != "")
		{
			$dfCITiess  = " AND InCity = '$dfCities' ";
		}
		
		
		
		$dfGSeArchs  = $dfCONTRiess.$dfCITiess;

		return $dfGSeArchs;
	}

	function dfProsearchs($defSEARCHMAP)
	{
		$dfProsearch = "";
		
		$defSEARCHMAP = mdSTRNGclean($defSEARCHMAP);
		if(!empty($defSEARCHMAP))
		{
			$dfProsearch = " AND(InDistrict LIKE '%$defSEARCHMAP%' OR 
							     InArea LIKE '%$defSEARCHMAP%' OR
							     InComPound LIKE '%$defSEARCHMAP%' OR
							     InAddress LIKE '%$defSEARCHMAP%' OR 
							     InProjectName LIKE '%$defSEARCHMAP%') ";
		}
		
		
		return $dfProsearch;
	}

	function mdSTRNGcleASRns($mdstr)
	{
		$mdReStr = "";
		
		    $mdStrS    = array(" ");
		    $mdReStr   = trim($mdstr);
			$mdReStr   = htmlspecialchars($mdReStr);
			$mdReStr   = ucwords($mdReStr);
			$mdReStr   = str_replace($mdStrS,"_",$mdReStr);
			
		return $mdReStr;
	}
	
	function mdSeARchNBOx($whereResult,$fmVALUe,$bzSROsales,$dfGROUPs,$fmKNd,$fm,$fmID,$fmLst)
	{
		global $stDBss;
		$mdResults = "";
		$mdReQust  = "";
		$mdReGroP  = "";
		$dfGRPLabel = "";
		
		$fmVALUe = mdSTRNGclean($fmVALUe);
		$mInValue = "mInValue";
		
		
		$mdReQust = " AND(mInKeY='InDistrict' OR 
		                   mInKeY='InArea' OR 
                           mInKeY='InAddress' OR						   
						   mInKeY='InComPound') 
		              AND mInValue LIKE '%$fmVALUe%' ";

		$tb = " tb_IndexmaPs_meta ";
		$tv = " mInTotal as mdPno, mInKeY, mInValue ";
				
		$dfGRPsBYes = " LIMIT 10 ";
		
        if($bzSROsales == "ROI")
		{
			$tv = " SUM(mInTotal) as mdPno, mInKeY, mInValue ";
		    $dfGRPsBYes = " GROUP BY mInKeY LIMIT 10 ";
		}			
				
		$whrResult  = $whereResult.$mdReQust;
     		
		$fmWRe     = $whrResult.$dfGRPsBYes;
		$aLoadMs   = $stDBss->CheckDATA($tv,$tb,$fmWRe); 

		if($fmVALUe != "")
		    $mdResults = mdSeARchINBOx($aLoadMs,$mInValue,$fmVALUe,$fm,$fmID,$fmLst,$fmKNd);
        
		return $mdResults;		 
	}
	
	function mdSeARchINBOx($aLoadMs,$mInValue,$fmVALUe,$fm,$fmID,$fmLst,$fmKNd)
	{
		$results = "";
		$dfGRPs     = "";
		$dfGRPName  = "";
		$mdPno      = "";
        $dfGRPLabel = "";	
		
		if(mysqli_num_rows($aLoadMs) > 0)
		foreach($aLoadMs as $fbROWs)
		{
			$dfGRPs    = $fbROWs[$mInValue];
			$mIDnKeY   = $fbROWs['mInKeY'];
			$mdPno     = $fbROWs['mdPno'];
			$dfGRPs    = $dfGRPs;
            $dfGRPName = $dfGRPs;

			if($mIDnKeY == "InComPound")
		    {
			    $dfGRPLabel = "Building";
			}
			elseif($mIDnKeY == "InAddress")
		    {
			    $dfGRPLabel = "Address";
			}
			elseif($mIDnKeY == "InPtName")
		    {
			    $dfGRPLabel = "P.Name";
			}
            elseif($mIDnKeY == "InArea")
		    {
			    $dfGRPLabel = "Area";
			}
            elseif($mIDnKeY == "InDistrict")
		    {
			    $dfGRPLabel = "District";
			}	
		
			if($dfGRPs != "")
			{
				$results .= '<li class="astFLex mdFNDkndPRLNk">
			                    <a href="javascript:void(0)" fm="'.$fm.'" fmID="'.$fmID.'" fmLst="'.$fmLst.'" 
							        fmVALUe="'.$dfGRPs.'" fmKNd="'.$fmKNd.'" onclick="mdMAPksearchclick(this)" class="astFLex mdFNDkndLNk">
							        <span>'.$dfGRPName.'</span>
									<b class="mdFNDknd">('.$mdPno.')</b>
									<i class="mdFNDknd">'.$dfGRPLabel.'</i>
							    </a>
			                </li>';
				
			}
			
		}

		return $results;
	}
	
	function dfSTzOooOms($defGeTzOooOm)
	{
		$dfTzOooOm = "";
		if($defGeTzOooOm != 12 && $defGeTzOooOm != "")
		{
			if(strpos($defGeTzOooOm,"_") != false)
			{
				$astLNGsss = explode("_",$defGeTzOooOm);
					
		        $astLATs   = $astLNGsss[0];
		        $astLNGs   = $astLNGsss[1];
			    
		        $astLATses = $astLNGsss[2];
		        $astLNGses = $astLNGsss[3];
			
		        $dfTzOooOm  = " AND (InLNG BETWEEN $astLNGs AND $astLNGses ) 
				                AND (InLAT BETWEEN $astLATs AND $astLATses ) ";
			}
		}
								
		return $dfTzOooOm;					
	}
 
	function astDTBLeOFIndxes($sWHRes,$dftb,$distPri,$GRouPedVs,$mdLMTs)
	{
		global $stDBss;
		$InVALUess    = "";
		$InVALUssLeNs = "";
		$mdffset      = 0;
		
		$dftv     = " count($GRouPedVs) as InPNO, $GRouPedVs ";
		$mdWHre   = " AND InLAT !='' AND InLNG !='' 
		              AND InLAT !='0' AND InLNG !='0' ";
        $stwGRPa  = " GROUP BY $GRouPedVs LIMIT $mdLMTs ";
		
		if($GRouPedVs == "mInSize" || $GRouPedVs == "xInSize")
		{
			$GRouPdVss = "InSizeFT";
			
			if($GRouPedVs == "mInSize")
			{
				$dftv     = " count($GRouPdVss) as InPNO, 
			                  min($GRouPdVss) as $GRouPedVs ";
			}
			elseif($GRouPedVs == "xInSize")
			{
				$dftv     = " count($GRouPdVss) as InPNO, 
			                  max($GRouPdVss) as $GRouPedVs ";
			}
			
			$stwGRPa  = " LIMIT $mdLMTs ";
		}
		elseif($GRouPedVs == "mInPrice")
		{
			$GRouPdVss = "InPrice";
			$dftv     = " MIN($GRouPdVss) as mInPrice ";
			
			$stwGRPa  = " LIMIT $mdLMTs ";
		}
		elseif($GRouPedVs == "xInPrice")
		{
			$GRouPdVss = "InPrice";
			$dftv     = " MAX($GRouPdVss) as xInPrice ";

			$stwGRPa  = " LIMIT $mdLMTs ";
		}
		
		$mdCounter = 0;
	    $stwGRPsa    = $mdWHre.$sWHRes.$stwGRPa;
	    $ChckDATaGa  = $stDBss->CheckDATA($dftv,$dftb,$stwGRPsa);
		foreach($ChckDATaGa as $dfROWSa)
		{
			$mdCounter++;
			
			$InVALUe = $dfROWSa[$GRouPedVs];
			if($GRouPedVs == "mInSize" || $GRouPedVs == "xInSize")
			    if($distPri == "mt")
					$InVALUe = $InVALUe / 10.7641; 
					
			$InVALUess .= $InVALUe.",";
			
		}
		
	    $InVALUessLeNs = strlen($InVALUess);
		$InVALUssLNs   = strpos($InVALUess,",",$InVALUessLeNs - 1);
		$InVALUssLeNs  = substr($InVALUess,$mdffset,$InVALUssLNs);

		return $InVALUssLeNs;
	}
     
	function bzROIsalesss($InLAT,$InLNG,$GRouPdVss,$InTYPE,$sWHRROIss)
	{
		global $stDBss;
		$InVALUess    = "";
		$InVALUssLeNs = "";
		$mdffset      = 0;
		$InVALUe      = 0;
		$bzROIWHress  = "";
				
		if($GRouPdVss == "sRent")
		{
			$GRouPedVs = "countRent";
			$GRouPdVss = "Rent";
			$dftv     = " COUNT(InID) as $GRouPedVs ";
		}
        elseif($GRouPdVss == "sSale")
		{
			$GRouPedVs = "countSale";
			$GRouPdVss = "Sale";
			$dftv     = " COUNT(InID) as $GRouPedVs ";
		}
		elseif($GRouPdVss == "Rent")
		{
			$GRouPedVs = "ROIrent";
			$GRouPdVss = "Rent";
			$dftv     = " AVG(InPricePMT) as $GRouPedVs ";
		}
		else
		{
			$GRouPedVs = "ROIsale";
            $GRouPdVss = "Sale";
            $dftv     = " AVG(InPricePMT) as $GRouPedVs ";			
		}
			
		$dftb     = " tb_IndexmaPs ";	
		
		$mdWHre   = " AND InLAT='$InLAT' 
		              AND InLNG='$InLNG' 
                      AND InTYPE='$InTYPE'					  
					  AND InPurPose='$GRouPdVss' ";
		
        $mdGROUPs = " GROUP BY InLNG,InLAT
		              LIMIT 1 ";		
        
	    $stwGRPsa    = $mdWHre.$sWHRROIss.$mdGROUPs;
	    $ChckDATaGa  = $stDBss->CheckDATA($dftv,$dftb,$stwGRPsa);
		$dfROWSa     = mysqli_fetch_assoc($ChckDATaGa);
		foreach($ChckDATaGa as $dfROWSa)
		{
			$InVALUe  = $dfROWSa[$GRouPedVs];
		}

		return $InVALUe;
	}
    
    function bzROIsaless($InLAT,$InLNG,$GRouPdVss,$ChckCURRncYs,$currencsYmbol,$InTYPE,$sWHRROIss)
	{
		global $stDBss;
		$InVALUess    = "";
		$InVALUssLeNs = "";
		$mdffset      = 0;
		$InVALUe      = "";
		$bzROIWHress  = "";
		
		
		$dftb     = " tb_IndexmaPs ";
		
		$GRouPedVs = "countTYPe";
		$dftv     = " COUNT(InID) as $GRouPedVs, AVG(InPrice) as avGSales ,InPurPose, InTYPE ";

        $mdGROUPs = " GROUP BY InTYPE,InPurPose 
		              LIMIT 2 ";	
		
		$mdWHre   = " AND InLAT='$InLAT' 
		              AND InLNG='$InLNG' 
					  AND InTYPE='$InTYPE' ";

		$countSales = "";
		$InPurPoses = "";
		$avGSaless  = "";	
		$InVALUes   = "";
		$InVALUess  = "";
	    $stwGRPsa    = $mdWHre.$sWHRROIss.$mdGROUPs;
	    $ChckDATaGa  = $stDBss->CheckDATA($dftv,$dftb,$stwGRPsa);
		foreach($ChckDATaGa as $dfROWSa)
		{
			$InPurPose = $dfROWSa['InPurPose'];
			$countSale = $dfROWSa[$GRouPedVs];
			$avGSales  = $dfROWSa['avGSales'];
			$mdINTYPe  = $dfROWSa['InTYPE'];
				
			$avGSalss  = $avGSales * $ChckCURRncYs;
			$avGSalss  = number_format($avGSalss,0);
				
			$countSales   = "<span class='astFLex'>".
				                "<i class='astFLex ROIcctitle'>".
				                        $InPurPose.
								"</i>".
								"<b>".$countSale."</b>".
							    "<i class='astFLex ROIcctitle'>".$mdINTYPe."</i>".
							"</span>";
							
			$countSls     = "<span class='astFLex'><i class='astFLex ROIcctitle'>AVG</i><b>".$avGSalss."</b><i class='astFLex ROIcctitle'>".$currencsYmbol."</i></span>";
			
				
            $InVALUess  = $countSales.$countSls;				
			$InVALUes  .= $InVALUess;
			$InVALUe    = $InVALUes;
			
		}
		
		$InVALUe = '<div class="ROIcountsales ROIcountsalesss">'.$InVALUe.'</div>';
		
		return $InVALUe;
	}
	
	function bzROIsales($InLAT,$InLNG,$GRouPdVss,$ChckCURRncYs,$currencsYmbol,$InTYPE,$bzROIWHre,$sWHRes)
	{
		global $stDBss;
		$InVALUess    = "";
		$InVALUssLeNs = "";
		$mdffset      = 0;
		$InVALUe      = "";
		$bzROIWHress  = "";
		
		$bzROIWHres = " AND(InPID='0' AND InTYPE='$InTYPE')";
		if($bzROIWHre == "ded")
		{
			$bzROIWHres = " AND(InPID='1' AND InTYPE='$InTYPE') ";
		}
		
		if($GRouPdVss == "countSale")
		{
			$GRouPedVs = "countSale";
			$mdGROUPs  = " GROUP BY InPurPose ";
			$mdWHres  = " AND (InPurPose='Sale' OR InPurPose='Rent') ";
			
			if($GRouPdVss == "countSale")
			{
				$GRouPedVs = "countSale";
			}
			
			$dftv  = " COUNT(InID) as $GRouPedVs, AVG(InPrice) as avGSales ,InPurPose ";
		}
		elseif($GRouPdVss == "countTYPe")
		{
			$GRouPedVs = "countTYPe";
			$mdGROUPs = " GROUP BY InTYPE,InPurPose ";
			$mdWHres  = " AND (InPurPose='Sale' OR InPurPose='Rent') ";
			if($GRouPdVss == "countTYPe")
			{
				$GRouPedVs = "countTYPe";
			}
			
			$dftv  = " COUNT(InID) as $GRouPedVs, AVG(InPrice) as avGSales ,InPurPose, InTYPE ";
		}
		else
		{
			$mdGROUPs = " GROUP BY InPurPose ";
			$mdWHres  = " AND InPurPose='$GRouPdVss' ";
			
			if($GRouPdVss == "Sale")
		    {
				$GRouPedVs = "ROIsale";
			}
			elseif($GRouPdVss == "Rent")
			{
				$GRouPedVs = "ROIrent";
			}
			
			$dftv     = " AVG(InPricePFT) as $GRouPedVs ";
		}
		
		$dftb     = " tb_IndexmaPs ";
		
		$mdWHre   = " AND InLAT ='$InLAT' AND InLNG ='$InLNG' ";
					  
        $stwGRPa  = "";//" GROUP BY $InLNG,$InLAT LIMIT 1 ";

		$countSales = "";
		$InPurPoses = "";
		$avGSaless  = "";	
		$InVALUes   = "";
	    $stwGRPsa    = $mdWHre.$sWHRes.$bzROIWHres.$mdWHres.$mdGROUPs;
	    $ChckDATaGa  = $stDBss->CheckDATA($dftv,$dftb,$stwGRPsa);
		foreach($ChckDATaGa as $dfROWSa)
		{
			
			if($GRouPdVss == "countSale")
			{
				$InPurPose = $dfROWSa['InPurPose'];
				$countSale = $dfROWSa[$GRouPedVs];
				$avGSales  = $dfROWSa['avGSales'];
				
				$avGSalss  = $avGSales * $ChckCURRncYs;
				$avGSalss  = number_format($avGSalss,0);
				
				$countSales = "<span class='astFLex ROIcttitle'>".$InPurPose.": <b>".$countSale."</b></span>".
							  "<span class='astFLex'><i class='astFLex ROIcctitle'>AVG</i><b>".$avGSalss."</b><i class='astFLex ROIcctitle'>".$currencsYmbol."</i></span>";
				//$countSales
				$InVALUes  .= '<div class="ROIcountsales">'.$countSales.'</div>';
				$InVALUe    = $InVALUes;
			}
			elseif($GRouPdVss == "countTYPe")
			{
				$InPurPose = $dfROWSa['InPurPose'];
				$countSale = $dfROWSa[$GRouPedVs];
				$avGSales  = $dfROWSa['avGSales'];
				$mdINTYPe  = $dfROWSa['InTYPE'];
				
				$avGSalss  = $avGSales * $ChckCURRncYs;
				$avGSalss  = number_format($avGSalss,0);
				
				$countSales   = "<span class='astFLex'>".
				                    "<i class='astFLex ROIcctitle'>".
				                        $InPurPose.
									"</i>".
									"<b>".$countSale."</b>".
							        "<i class='astFLex ROIcctitle'>".$mdINTYPe."</i>".
								"</span>";
							   
				$InVALUes  .= $countSales;
				$InVALUe    = $InVALUes;
			}
			else
			{
				$InVALUes  = $dfROWSa[$GRouPedVs];
			    $InVALUe   = $InVALUes;
			}
			
			
		}
		
		if($GRouPdVss == "countTYPe")
		{
			$InVALUe = '<div class="ROIcountsales ROIcountsalesss">'.$InVALUe.'</div>';
		}

		return $InVALUe;
	}
    
	function bzROIMDNxsales($bzKND,$bzTYPes,$GRouPdVss,$bzSROsaleVLUes)
	{
		$bzSROsaleVLUs    = "";
		$bzmSROsaleVLUsss = "";
		$bzmSROsaleVLUss  = "";
		$bzmSROsaleVLUs   = "";
		$bzdSROsaleVLUs   = "";
		
		$bzmFSROsaleVLUs  = "";
		$bzdFSROsaleVLUs  = "";
		
		$bzsVALUe    = "";
		$bzrVALUe    = "";
		$bzROVALUe   = "";
		$bzReTVALUe  = "";
		$bzKNDteste  = "";
		$bzQKNDtests = "";
		$bzQKNDtestd = "";
		if(strpos($bzSROsaleVLUes,"|") != false)
		{
			$bzSROsaleVLUs  = explode("|",$bzSROsaleVLUes);
			$bzmSROsaleVLUs = $bzSROsaleVLUs[0];
			$bzdSROsaleVLUs = $bzSROsaleVLUs[1];
			
			if($bzKND == 0 || $bzKND == 1)
			{
				if($bzTYPes == 1)
			    {
				    $bzmSROsaleVLUss = $bzdSROsaleVLUs;
				}
			    else
			    {
				    $bzmSROsaleVLUss = $bzmSROsaleVLUs;
				}
				
				if(strpos($bzmSROsaleVLUss,",") != false)
			    {
				    $bzmSROsaleVLUsss = explode(",",$bzmSROsaleVLUss);
				    foreach($bzmSROsaleVLUsss as $bzVALUe)
				    {
					    if(!empty($bzVALUe))
					    {
						    $bzKNDteste = 1;
						    if($bzVALUe == "Sale")
						    {
							    $bzsVALUe = $bzVALUe;
							}
						    elseif($bzVALUe == "Rent")
						    {
							    $bzrVALUe = $bzVALUe;
							}
						    elseif($bzVALUe == "ROI")
						    {
							    $bzROVALUe = $bzVALUe;
							} 
						}
				    
					}
				     
					if($bzKND == 0)
					{
						if($bzsVALUe != "" && $bzrVALUe != "" && $bzROVALUe != "")
					    {
						    $bzReTVALUe = $bzROVALUe;
						}
					    elseif($bzsVALUe != "" && $bzrVALUe != "" && $bzROVALUe == "")
					    {
						    $bzReTVALUe = "both";
						}
					    elseif($bzsVALUe != "" && $bzrVALUe == "")
					    {
						    $bzReTVALUe = $bzsVALUe;
						}
					    elseif($bzsVALUe == "" && $bzrVALUe != "")
					    {
						    $bzReTVALUe = $bzrVALUe;
						}
					    elseif($bzsVALUe == "" && $bzrVALUe == "" && $bzROVALUe != "")
					    {
						    $bzReTVALUe = $bzROVALUe;
						} 
						
					}
					elseif($bzKND == 1)
					{
						$bzQKNDtests = "";
						if($bzKNDteste != "")
						{
							if($bzTYPes == 0)
				            {
					            $bzQKNDtests = " AND InPID='0' ";
							}
					    
				            if($bzTYPes == 1)
				            {
					            $bzQKNDtests = " AND InPID='1' ";
							}
						}
						
						$bzReTVALUe = $bzQKNDtests;
					}
				}
			}
			elseif($bzKND == 2)
			{
				$bzQKNDtests = bzROIMDNxsales(1,0,$GRouPdVss,$bzSROsaleVLUes);
				$bzQKNDtestd = bzROIMDNxsales(1,1,$GRouPdVss,$bzSROsaleVLUes);
					
				$bzsKNDtest  = bzROIMDNxsales(0,0,$GRouPdVss,$bzSROsaleVLUes);
				$bzdKNDtest  = bzROIMDNxsales(0,1,$GRouPdVss,$bzSROsaleVLUes);
					
				$bzReTVALUe = bzROIMDNxsaless($bzsKNDtest,$bzdKNDtest,$bzQKNDtests,$bzQKNDtestd,$GRouPdVss);
			}
		}
		
		return $bzReTVALUe;
	}
	
	function bzROIMDNxsaless($bzsKNDtest,$bzdKNDtest,$bzQKNDtests,$bzQKNDtestd,$GRouPdVss)
	{
		global $stDBss;
		$InVALUess    = "";
		
		$sWtblRsales  = "";
		$sWROIcosale  = "";
		$sWROIcosalde = "";
		$sWtblRsls    = "";
		
		$sWtsale   = ",(SELECT COUNT(InID) as ROIsale, 
                            InLAT as InLATss,
                            InLNG as InLNGss								   
						FROM tb_IndexmaPs 
						WHERE InPurPose='Sale' 
						GROUP BY InLNG,InLAT) as ROIsales ";
							 
		$sWtrent   = ",(SELECT COUNT(InID) as ROIrent, 
                            InLAT as InLATss,
                            InLNG as InLNGss								   
						FROM tb_IndexmaPs 
						WHERE InPurPose='Rent' 
						GROUP BY InLNG,InLAT) as ROIrents ";
		
		
		if($bzsKNDtest == "Sale")
		{
			$sWtblRsales = $sWtsale;
			$sWROIcosale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) ";
		}
		elseif($bzsKNDtest == "Rent")
		{
			$sWtblRsales = $sWtrent;
			$sWROIcosale = " AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
		}
		elseif($bzsKNDtest == "ROI" || $bzsKNDtest == "both")
		{
			$sWtblRsales = $sWtsale.$sWtrent;
			$sWROIcosale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) 
				             AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
		}
		
		if($bzdKNDtest == "Sale")
		{
			$sWtblRsls = $sWtsale;
			$sWROIcosalde = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) ";
		}
		elseif($bzdKNDtest == "Rent")
		{
			$sWtblRsls = $sWtrent;
			$sWROIcosalde = " AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
		}
		elseif($bzdKNDtest == "ROI" || $bzdKNDtest == "both")
		{
			$sWtblRsls  = $sWtsale.$sWtrent;
			$sWROIcosalde = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) 
				              AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) ";
		}
		
		$bzQKNDtestss = $bzQKNDtests.$sWROIcosale;
		$bzQKNDtestds = $bzQKNDtestd.$sWROIcosalde;
		
		$sWROIcosalee = $bzQKNDtestss.$bzQKNDtestds;
		$sWtblRsaless = $sWtblRsales.$sWtblRsls;
		
		if($GRouPdVss == "tbl")
		{
			$InVALUess = $sWtblRsaless;
		}
		else
		{
			$InVALUess = $sWROIcosalee;
		}
		
		return $InVALUess;
	}

	
	function bzROINxsales($GRouPdVss,$bzSROsaleVLUes,$bzROIWHre,$sWHRROIes)
	{
		global $stDBss;
		$InVALUess    = "";
		
		$sWtblRsales = "";
		$sWROIcosale = "";
		
		$bzROIWHress = "InPID='0'";
		if($bzROIWHre == "ded")
		{
			$bzROIWHress = "InPID='1'";
		}
		
		$bzROIWHres = $bzROIWHress.$sWHRROIes;
		
		$sWtsale   = ",(SELECT COUNT(InID) as ROIsale, 
                            InLAT as InLATss,
                            InLNG as InLNGss								   
						FROM tb_IndexmaPs 
						WHERE InPurPose='Sale' AND $bzROIWHres 
						GROUP BY InLNG,InLAT) as ROIsales ";
							 
		$sWtrent   = ",(SELECT COUNT(InID) as ROIrent, 
                            InLAT as InLATss,
                            InLNG as InLNGss								   
						FROM tb_IndexmaPs 
						WHERE InPurPose='Rent' AND $bzROIWHres 
						GROUP BY InLNG,InLAT) as ROIrents ";

						
		if($bzSROsaleVLUes == "Sale")
		{
			$sWtblRsales = $sWtsale;
			$sWROIcosale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) 
			                 AND InPurPose='Sale' AND $bzROIWHres ";
		}
		elseif($bzSROsaleVLUes == "Rent")
		{
			$sWtblRsales = $sWtrent;
			$sWROIcosale = " AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) 
			                 AND InPurPose='Rent' AND $bzROIWHres ";
		}
		elseif($bzSROsaleVLUes == "ROI")
		{
			$sWtblRsales = $sWtsale.$sWtrent;
			$sWROIcosale = " AND (InLAT=ROIsales.InLATss AND InLNG=ROIsales.InLNGss) 
				             AND (InLAT=ROIrents.InLATss AND InLNG=ROIrents.InLNGss) 
							 AND $bzROIWHres ";
		}
		
		if($GRouPdVss == "tbl")
		{
			$InVALUess = $sWtblRsales;
		}
		else
		{
			$InVALUess = $sWROIcosale;
		}
		
		return $InVALUess;
	}

	function bzROIMDNxsls($bzKND,$bzSROsaleVLUes)
	{
		$mdResults  = "";
		$mdReTVALUe = "";
		$mdReTQWRYe = "";
		$mdRTQWRYes = "";
		$mdRTQWTYPe = "";
		
		$bzSROslVLUes = trim($bzSROsaleVLUes);
		if(strpos($bzSROslVLUes,"|") != false)
		{
			$atsrSROslVLUes = explode("|",$bzSROslVLUes);
			$mSROsaleVLUes  = $atsrSROslVLUes[0];
			$dSROsaleVLUes  = $atsrSROslVLUes[1];
			
			$mSROsaleVLUes = str_replace(",","",$mSROsaleVLUes);
			if(!empty($mSROsaleVLUes))
			{
				$mdReTVALUe = $mSROsaleVLUes;
				$mdReTQWRYe = "InPID='0'";
				$mdRTQWTYPe = "market";
			}
			elseif(!empty($dSROsaleVLUes))
			{
				$mdReTVALUe = $dSROsaleVLUes;
				$mdReTQWRYe = "InPID='1'";
				$mdRTQWTYPe = "ded";
			}
			
			if(!empty($mdReTVALUe))
			{
				if($mdReTVALUe == "ROI")
				{
					$mdRTQWRYe = " AND(InPurPose ='Rent' OR InPurPose ='Sale')";
				}
				else
				{
					$mdRTQWRYe = " AND InPurPose='$mdReTVALUe'";
				}
				
				$mdRTQWRYes = " AND(".$mdReTQWRYe.$mdRTQWRYe.") ";
			}
		}
		
		if($bzKND == 0)
		{
			$mdResults = $mdReTVALUe;
		}
		elseif($bzKND == 1)
		{
			$mdResults = $mdRTQWRYes;
		}
		elseif($bzKND == 2)
		{
			$mdResults = $mdRTQWTYPe;
		}
		
		return $mdResults;
	}	
	
	function mdTBLeRetPRIces($d)
	{
		global $mdMAPscncYVLUe, $mdMAPscurrencY;
		
		$mdVALUe  = "";
		$mdVALUes = "";
		
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			$mdVALUe = $d * $mdMAPscncYVLUe;
		}
		
		$mdVALUes = number_format($mdVALUe,0);
		
		$mdVALUes = '<div class="mdTBPRchnes"><b>'.$mdVALUes.' '.'</b><i class="mdTBPRchanages">'.$mdMAPscurrencY.'</i></div>';
		return $mdVALUes;
	}
	
	function mdTBLeRetMTPRIces($d)
	{
		global $mdMAPscncYVLUe, $mdMAPscurrencY;
		
		$mdVALUe  = "";
		$mdVALUes = "";
		
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			$mdVALUe = $d * $mdMAPscncYVLUe;
			
			$mdVALUe = $mdVALUe * 10.7641;
		}
		
		$mdVALUes = number_format($mdVALUe,0);
		
		$mdVALUes = '<div class="mdTBPRchnes"><b>'.$mdVALUes.' '.'</b><i class="mdTBPRchanages">'.$mdMAPscurrencY.'</i></div>';
		return $mdVALUes;
	}
	
	function mdTBLeRetInLNks($d)
	{
		
		global $mdsearcPAsnone,$smCONNECT;
		/*
		$mdLink   = "";
		$mdQuery  = " SELECT mInLink 
		              FROM tb_IndexmaPs_meta 
					  WHERE mInID='$d' LIMIT 1 ";
			
		$mdReQust = mysqli_query($smCONNECT,$mdQuery);	
		if(mysqli_num_rows($mdReQust) > 0)
		{
			$mdRwos   = mysqli_fetch_assoc($mdReQust);
		    $mdLink   = $mdRwos['mInLink'];
		}
        */
		$mdVALUes = '<a href="javascript:void(0)" class="mdOPeNLnKs '.$mdsearcPAsnone.'" onclick="mdOPeNLnKs(this)" mdLnk="'.$d.'">Source</a>';
		
		return $mdVALUes;
	}
	
	function mdTBLeRetInOPtions($d)
	{
		global $mdsearcPAsnone;
		
		$mdVALUes = '<div class="astFLex mdOPeNOPtions '.$mdsearcPAsnone.' mdReMOVeROW'.$d.'">
		                <a href="javascript:void(0)" class="astFLex btn" dfKNd="mdhtml" mdKNd="InPro" fm="edt" mdID="'.$d.'" onclick="mdOPeNOPtions(this)">
						    <i class="fa fa-edit"></i>
						</a>
						<a href="javascript:void(0)" class="astFLex btn" dfKNd="mdcontrol" mdKNd="InPro" fm="dlt" mdID="'.$d.'" onclick="mdOPeNOPtions(this)">
						    <i class="fa fa-trash"></i>
						</a>
						<a href="javascript:void(0)" class="astFLex btn mdNOcursor" dfKNd="mdcontrol" mdKNd="InPro" fm="share" mdID="'.$d.'" onclick="mdOPeNOPtions(this)">
						    <i class="fa fa-share"></i>
						</a>
					</div>';
					
		return $mdVALUes;
	}
	
	function mdMAPRetPRIces($d,$mdMAPscncYVLUe)
	{
		$mdVALUe  = "";
		$mdVALUes = "";
		
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			$mdVALUe = $d * $mdMAPscncYVLUe;
		}
		
		$mdVALUes = number_format($mdVALUe,0);
		return $mdVALUes;
	}
	
	function mdGeNRetPRIces($d,$mdMAPscncYVLUe,$mdKNd,$fmKeY)
	{
		$mdVALUe  = "";
		$mdVALUes = "";
		
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			$mdVALUe = $d * $mdMAPscncYVLUe;
			if($mdKNd == "mt")
			{
				$mdVALUe = $mdVALUe * 10.7641;
			}
				
			$mdVALUes = $mdVALUe;
			if($fmKeY == 1)
			{
				$mdVALUes = number_format($mdVALUe,0);
			}    
		}

		return $mdVALUes;
	}
	
	function mdReTMAPPRIces($mdKeY,$mdSize,$d,$mdMAPscncYVLUe)
	{
		$mdVPrice     = "";
		$mdVALUes     = "";
		$mdVPricePFT  = "";
		$mdVPricePFTs = "";
        $mdVPricePMT  = "";
		$mdVPricePMTs = "";
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			$mdVPrice     = $d * $mdMAPscncYVLUe;
			$mdVPricePFT  = $mdVPrice / $mdSize;
			$mdVPricePMT  = $mdVPricePFT * 10.7641;
			
			$mdVPricePFTs = number_format($mdVPricePFT,0);
			$mdVPricePMTs = number_format($mdVPricePMT,0);
			
			$mdVALUes = $mdVPrice."|".$mdVPricePFTs."|".$mdVPricePMTs."|".$mdVPricePFT."|".$mdVPricePMT;  
		}
		
		return $mdVALUes;
	}
	
	function mdSReQPRICeDs($mdKeY,$mdKNd,$mdSIZeVALUe,$mdSYMBVALUe,$mdMPrcVALUe,$mdXPrcVALUe)
	{
		global $stDBexTRas;
		
		$mdResults   = "";
		$mdMoALUe    = "";
		$mdXoALUe    = "";
		$mdMvALUe    = "";
		$mdXvALUe    = "";
		$mdDvALUes   = "";
		
		$mdNUMBVALUe = $stDBexTRas->CheckCURRencYs($mdSYMBVALUe);
		
		if($mdKeY == "mnMx")
		{
			$mdMvALUe = $mdMPrcVALUe;
			$mdXvALUe = $mdXPrcVALUe;
		}
		elseif($mdKeY == "mdPrice" || $mdKeY == "mdArea")
		{
			if(strpos($mdMPrcVALUe,",") != false)
			{
				$mdDvALUes = explode(",",$mdMPrcVALUe);
				$mdMvALUe  = $mdDvALUes[0];
			    $mdXvALUe  = $mdDvALUes[1];
			}
		}
		
		$mdPVALUe = "";
		if($mdKNd == "mdPrices")
		{
			$mdPVALUe = "InPrice";
			if($mdKeY == "mnMx")
			{
				$mdPVALUe = "InPricePFT";
				if($mdSIZeVALUe == "mt")
				{
					if($mdMvALUe != "" && $mdMvALUe != 0)
					{
						$mdMvALUe = $mdMvALUe / 10.7641;
					}
					
					if($mdXvALUe != "" && $mdXvALUe != 0)
					{
						$mdXvALUe = $mdXvALUe / 10.7641;
					}	
				}
			}
			
			if($mdMvALUe != "" && $mdMvALUe != 0)
			{
				$mdMvALUe = $mdMvALUe / $mdNUMBVALUe;
			}
			
			if($mdXvALUe != "" && $mdXvALUe != 0)
			{
				$mdXvALUe = $mdXvALUe / $mdNUMBVALUe;
			}
		}
		elseif($mdKNd == "mdAreas")
		{
			$mdPVALUe = "InSizeFT";
			if($mdSIZeVALUe == "mt")
			{
				if($mdMvALUe != "" && $mdMvALUe != 0)
				    $mdMvALUe = $mdMvALUe * 10.7641;
				
				if($mdXvALUe != "" && $mdXvALUe != 0)
				    $mdXvALUe = $mdXvALUe * 10.7641;
			}
		}
		
		$mdResults = mdSReQPRCDs($mdPVALUe,$mdMvALUe,$mdXvALUe);
		
		return $mdResults;
	}
	
	function mdSReQPRCDs($mdPVALUe,$mdMvALUe,$mdXvALUe)
	{
		$mdResults = "";
		if($mdMvALUe != "" && $mdXvALUe != "")
		{
			//$mdMvALUe = round($mdMvALUe);
			//$mdXvALUe = round($mdXvALUe);
			$mdResults = " AND($mdPVALUe BETWEEN $mdMvALUe AND $mdXvALUe)";
		}
		elseif($mdMvALUe != "")
		{
			//$mdMvALUe = round($mdMvALUe);
			$mdResults = " AND $mdPVALUe > $mdMvALUe";
		}
		elseif($mdXvALUe != "")
		{
			//$mdXvALUe = round($mdXvALUe);
			$mdResults = " AND $mdPVALUe < $mdXvALUe";
		}
		
		return $mdResults;
	}
	
	function mdGLBSearchFULLs($mdSResDNeVLUes,$dfsrSRes)
	{
		
		$mdReTVLUes     = "";
		$mdSResDNeVLUs  = "";
		$srSResDNeVLUes =  array();
		
		$mdSResDNeVLUes = trim($mdSResDNeVLUes);
		if(strpos($mdSResDNeVLUes,",") != false)	
		{
		    $srSResDNeVLUes    = explode(",",$mdSResDNeVLUes);
		    $fbsrchCNT         = count($srSResDNeVLUes);
			
		    $fbsrchCNT   = $fbsrchCNT - 1;
		    $fbsrchCNTer = 0;
		
		    foreach($srSResDNeVLUes as $srSRes)
			{
				$fbsrchCNTer++;
				
				if($srSRes != "")
				{
					if($fbsrchCNTer == $fbsrchCNT)
					{
						if($dfsrSRes == "InBEDs" || $dfsrSRes == "InPATHs")
						{
							$mdSResDNeVLUs .= " $dfsrSRes = '$srSRes' ";
						}
						else
						{
							$mdSResDNeVLUs .= " $dfsrSRes LIKE '%$srSRes%' ";
						}
					}
					else
					{
						if($dfsrSRes == "InBEDs" || $dfsrSRes == "InPATHs")
						{
							$mdSResDNeVLUs .= " $dfsrSRes = '$srSRes' OR";
						}
						else
						{
							$mdSResDNeVLUs .= " $dfsrSRes LIKE '%$srSRes%' OR";
						}
					}
				}
			}
			
			if($mdSResDNeVLUs != "")
			{
				$mdReTVLUes = " AND(".$mdSResDNeVLUs.")";
			}
		}
		
		return $mdReTVLUes;
	}
	
	function mdGLBSchFULLs($mdBeDs,$mdPAtHs,$mdTYPes,$mdKNd)
	{
		$mdResults = "";
		$mdTYPess  = "";
		
		$mdBeDss   = mdGLBSearchFULLs($mdBeDs,"InBEDs");
		$mdPAtHss  = mdGLBSearchFULLs($mdPAtHs,"InPATHs");
		
		if($mdKNd == "find")
		    $mdTYPess  = mdGLBSearchFULLs($mdTYPes,"InTYPE");
		
		$mdResults = $mdTYPess.$mdPAtHss.$mdBeDss;
		
		return $mdResults;
	}
	
	function mdGLBSZOoMs($mYLATLNGs,$mYmdROIPID,$mYROIstus,$mdKNd)
	{
		$mdResults  = "";
		$mYLATLNGss = "";
		$mdZOoms    = "";
		$mdINPuRPose = "";
		
		$mdZOoms   = " AND InPID='$mYmdROIPID'";
		if(strpos($mYLATLNGs,"_"))
		{
			$mYLATLNGss = explode("_",$mYLATLNGs);
			
			if($mdKNd == "marker")
			{
				$mYLNG = $mYLATLNGss[0];
			    $mYLAT = $mYLATLNGss[1];
                $mdZOoms = " AND InPID='$mYmdROIPID' AND (InLNG='$mYLNG' AND InLAT='$mYLAT')";					
			}
			elseif($mdKNd == "map")
			{
				$mdZOoms   = " AND InPID='$mYmdROIPID'";
				if($mYLATLNGs != 12 && $mYLATLNGs != "")
				{
					$astLATs   = $mYLATLNGss[0];
		            $astLNGs   = $mYLATLNGss[1];
			    
		            $astLATses = $mYLATLNGss[2];
		            $astLNGses = $mYLATLNGss[3];
			
			        
		            $mdZOoms  = " AND (InLNG BETWEEN $astLNGs AND $astLNGses ) 
				                  AND (InLAT BETWEEN $astLATs AND $astLATses )
								  AND InPID='$mYmdROIPID'";
				}
				
			}
		}
		
		if(!empty($mYROIstus))
		{
			$mdINPuRPose = " AND InPurPose = '$mYROIstus'";
		    if($mYROIstus == "ROI")
		    {
			    $mdINPuRPose = " AND(InPurPose = 'Sale' OR InPurPose = 'Rent')";
			}
		}
		
		$mdResults = $mdZOoms.$mdINPuRPose;
		return $mdResults;
	}
	
	function mdMAPRetPRIMDces($d,$mdMAPscncYVLUe,$mdsize,$tYPe)
	{
		$mdVALUe   = "";
		$mdVALUes  = "";
		$mdVALUss  = "";
		$mdVALUess = "";
		
		if($mdMAPscncYVLUe != "" && $d != "")
		{
			if($tYPe == "mt")
		    {
			    $mdVALUes = $d / $mdsize; 
			    $mdVALUss = $mdVALUes * 10.7641;
			}
			elseif($tYPe == "ft")
		    {
			    $mdVALUss = $d / $mdsize; 
			}
			
			$mdVALUe = $mdVALUss * $mdMAPscncYVLUe;
		}
		
		$mdVALUess = number_format($mdVALUe,0);
		return $mdVALUess;
	}
	
	/////////////////////
	function mdPROPertYKNd($fm)
	{
		$mdResults = "";
		if($fm == 1)
		{
			$mdLabel = "ded";
			$mdResults = '<option value="'.$fm.'">'.$mdLabel.'</option>
		                  <option value="0">market</option>';
			
		}
		else{
			$mdLabel = "market";
		    $mdResults = '<option value="'.$fm.'">'.$mdLabel.'</option>
					      <option value="1">ded</option>';
		}
			
		return $mdResults;	
	}
	
	function mdPROPertYPURPose($fm)
	{
		$mdResults = "";
		if($fm == "Sale" || $fm == "SALE")
		{
			$mdResults = '<option value="'.$fm.'">'.$fm.'</option>
		                  <option value="Rent">Rent</option>';
			
		}
		else{
		    $mdResults = '<option value="'.$fm.'">'.$fm.'</option>
					      <option value="Sale">Sale</option>';
		}
			
		return $mdResults;
		
	}
	
	function mdPROPertYTYPe($fm)
	{
		$mdResults = '<option value="'.$fm.'">'.$fm.'</option>
					  <option value="Apartment">Apartment</option>
					  <option value="Townhouse">Townhouse</option>
					  <option value="Villa Compound">Villa Compound</option>
					  <option value="Residential Plot">Residential Plot</option>
					  <option value="Residential Building">Residential Building</option>
					  <option value="Villa">Villa</option>
					  <option value="Penthouse">Penthouse</option>
					  <option value="Hotel Apartment">Hotel Apartment</option>
					  <option value="Office">Office</option>
					  <option value="Warehouse">Warehouse</option>
					  <option value="Commercial Villa">Commercial Villa</option>
					  <option value="Commercial Plot">Commercial Plot</option>
					  <option value="Commercial Building">Commercial Building</option>
					  <option value="Industrial Land">Industrial Land</option>
					  <option value="Staff Accommodation">Staff Accommodation</option>
					  <option value="Shop">Shop</option>
					  <option value="Mixed Used Land">Mixed Used Land</option>
					  <option value="Retail">Retail</option>
					  <option value="Other Commercial">Other Commercial</option>';
			
		return $mdResults;
		
	}
	
	function mdPROcountries($fm,$UTvclass)
	{
		global $stDBss;
		$mdResults = "";
		$tb = " tb_country ";
		$tv = " * ";
		$tw = "";
		
		$mdDATA = $stDBss->CheckDATA($tv,$tb,$tw);
		foreach($mdDATA as $mdROWs)
		{
			$mdName = $mdROWs['name'];
			
			$mdResults .= '<option value="'.$mdName.'">'.$mdName.'</option>';
		}
			
		return $mdResults;
		
	}
	
	function mdPROUserTass($UTtask,$UTkeY,$UTv,$UTvm,$UTvclass)
	{
		global $stDBss;
		$mdResults = "";
		$UTvalue = "";
		$tb = " tbUserTas ";
		$tv = " * ";
		$tw = " AND UTtask='$UTtask' 
		        AND UTkeY='$UTkeY' ";
		
		$mdDATA = $stDBss->CheckDATA($tv,$tb,$tw);
		foreach($mdDATA as $mdROWs)
		{
			if($UTv == 0)
			    $UTvalue = $mdROWs['UTvalue'];
			elseif($UTv == 1)
			    $UTvalue = $mdROWs['UTname'];
			elseif($UTv == 2)
			    $UTvalue = $mdROWs['UTtotal'];	
			
			$mdResults .= '<option value="'.$UTvalue.'">'.$UTvalue.'</option>';
		}
		
		return $mdResults;
		
	}
	
	function mdPROcurrencYies($md,$mdscurrencYs,$mdKNd)
	{
		global $stDBexTRas;
		$mdResults = "";
		$mdResult  = "";
		
		$mdVar     = array(",");
		
		$md = trim($md);
		$mdscurrencY   = $stDBexTRas->CheckCURRencYs($mdscurrencYs);
		
		if($md != "" && $mdscurrencY != "")
		{
			if($mdKNd == 2)
			{
				$md        = str_replace($mdVar,"",$md);
				$md        = floatval($md);
				$mdResult  = $md / $mdscurrencY;
				$mdResult  = round($mdResult);
				$mdResults = floatval($mdResult);
			}
			else
			{
				$mdResult = $md * $mdscurrencY;
			    
			
			    if($mdKNd == 0)
				    $mdResults = floatval(round($mdResult,0));
			    elseif($mdKNd == 1)
				    $mdResults = number_format($mdResult,0);
			}
			
		}
		
		return $mdResults;
	}
	
	function mdUserTstRess($mdKNd)
	{
		global $stDBCONST;
		
		$mdResults = "";
		
		$mdUser   = $stDBCONST->getmdVUsion("mdUser");
		
		if($mdUser != "false")
		{
			?>
			<ul class="astFLex mdUsROPTPionLst">
				
			</ul>
			<?php
		}
		else
		{
			?>
			<ul class="astFLex mdUsROPTPionLst">
				<li>
					<a href="javascript:void(0)" class="mdUsROPactive btn astFLex mdUsROPTLnk mdUsROPTHLnk mdUsROPTHsiGnLnk"
						md="accessTAB" mdAction="mdReG" onclick="mdUseRAction(event,this)">
						<i class="fa fa-user"></i>
						<span>sign In</span>
					</a>
				</li>
			    <li>
				<a href="javascript:void(0)" class="btn astFLex mdUsROPTLnk mdUsROPTHLnk" 
								    md="createTAB" mdAction="mdReG" onclick="mdUseRAction(event,this)">
							        <i class="fa fa-user"></i>
								    <span>sign up</span>
				</a>
				</li>
				<li class="astDnone">
					<a href="javascript:void(0)" class="btn astFLex mdUsROPTLnk mdUsROPTHLnk astDnone mdUsROPTHactiveLnk" 
						md="activateTAB" mdAction="mdReG" onclick="mdUseRAction(event,this)">
						<i class="fa fa-user"></i>
						<span>activate</span>
					</a>
				</li>
			</ul>
			<?php
		}
		
		return $mdResults;
	}
	
	function fnAtransalteTVtoSPEEch($id)
	{
		$res = "";
		
		$res ='<div class="fnAtransalteTVtoSPEEch fnAtransalteTVtoSPEEch'.$id.'" id="'.$id.'">
		        <div class="speechTVset">
				    <a href="javascript:void(0)" class="btn" onclick="speechTVset()">
					    <i class="fa fa-gear"></i>
					</a>
				</div>
				
                <div class="speechVOIceSELEct">
				    <p class="">Select Voice</p>
                    <select id="speechVoices" class="form-select bg-secondary"></select>
				</div>	
                <div class="speechVOIceRATe">
                    <div>
                        <p class="">Volume</p> 
						<span id="speechVolumeLabel" class="">1</span>
                        <input type="range" min="0" max="1" value="1" step="0.1" id="speechVolume" />
                    </div>
                    <div class="">
                        <p class="">Rate</p>
						<span id="speechRateLabel" class="">1</span>
                        <input type="range" min="0.1" max="10" value="1" id="speechRate" step="0.1" />
                        
                    </div>
                    <div>
                        <p class="">Pitch</p>  <span id="speechPitchLabel" class="">1</span>
                        <input type="range" min="0" max="2" value="1" step="0.1" id="speechPitch" />
                    </div>
                </div>
	            <div class="speechVOIceBTns">
                    <button id="speechSTart" fm="'.$id.'" onclick="speechTVsTARatNOw(this)" class="speechTVsTARatNOw'.$id.' speechTVsTARatNOw btn fa fa-play"></button>
                    <button id="speechPause" fm="'.$id.'" onclick="speechTVsTARatNOw(this)" class="speechTVsTARatNOw'.$id.' speechTVsTARatNOw btn fa fa-pause"></button>
                    <button id="speechrREsume" fm="'.$id.'" onclick="speechTVsTARatNOw(this)" class="speechTVsTARatNOw'.$id.' speechTVsTARatNOw btn fa fa-replay"></button>
                    <button id="speechcancel" fm="'.$id.'" onclick="speechTVsTARatNOw(this)" class="speechTVsTARatNOw'.$id.' speechTVsTARatNOw btn fa fa-close"></button>
                </div>
            </div>';
		
		return $res;
		
	}
	
?>
    