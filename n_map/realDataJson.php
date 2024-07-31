<?php
    require_once('../mdDB/stDBss.php');
    $stDBss = new stDBss(); 
    $stDBexTRas = new stDBexTRas(); 	

    $smPATH = "../";
    require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_GET['stFMs']))
	{
		$stFMs = $_GET['stFMs'];
		
		if($stFMs == "default")
		{
			$currency      = $_POST['currency'];
	        $country       = $_POST['country'];
	        $distPri       = $_POST['distPri'];
	        
			$defMAP        = $_POST['defMAP'];
			$defSEARCHMAP  = $_POST['defSEARCHMAP'];
			$currencsYmbol = $_POST['currencsYmbol'];
			$maPSHAReD     = $_POST['maPSHAReD'];
			$mYLaT         = $_POST['mYLaT'];
			$mYLnG         = $_POST['mYLnG'];
			
			$astmnPrice    = $_POST['astmnPrice'];
			$astmxPrice    = $_POST['astmxPrice'];
			
			$dfCities     = $_POST['dfCities'];
			$fDistricts   = $_POST['fDistricts'];
			$dfArea       = $_POST['dfArea'];
			$dfAddress    = $_POST['dfAddress'];
			$dfProName    = $_POST['dfProName'];
				
			$defSEARCH    = "";
			$defCountrYes = "";
			$defMETEsYes  = "";
			$MYmAP        = "";
			$MYmAPs       = "";
			
			
			$ChckCURRncYs = $stDBexTRas->CheckCURRencYs($currencsYmbol);
			
            if($defMAP == "defaultMAP" || $defMAP == "SHareDMAP")
			{
				if($defSEARCHMAP != "")
				{
					$defSEARCH = " AND (tb_indexmaz.InCity LIKE '%$defSEARCHMAP%' OR 
					                    InPsearch LIKE '%$defSEARCHMAP%' )";
				}
			}
			
			$data = array();
	        $res  = array();
	
	       
	        $dfLOcmMXs = dfLOcminMAXs($distPri,$astmnPrice,$astmxPrice);
	        $dfLOcSchs = dfLOcSearchs($country,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
			$sWHRes    = $dfLOcSchs.$defSEARCH.$dfLOcmMXs;
			$sWHRe     = "";
            $sNULL     = " GROUP BY tb_index_parent.InPID 
			               ORDER BY tb_index_parent.InPID DESC LIMIT 20000 ";
			
			$stwGRP    = " AND tb_index_parent.InPID=tb_indexmaz.InPID ";
	        $stwGRPs   = $stwGRP.$sWHRe.$sWHRes.$sNULL;
	        $ChckDATaG = $stDBss->ChckDATaG($stwGRPs);
	        while($rows  = mysqli_fetch_assoc($ChckDATaG))
	        {
	            
	            $data['GLat']       = $rows['InPLAT'];
				$data['InLAT']      = $rows['InPLAT'];
				$data['InLNG']      = $rows['InPLNG'];
				$data['InPtName']   = $rows['InPName'];
				$data['InCountry']  = $rows['InPCountry'];
				$data['InAddress']  = $rows['InPAddress'];
				$data['InKEY']      = $rows['InPKEY'];
				$data['InID']       = $rows['InPID'];
				$data['InPID']      = $rows['InPID'];
				
				
		        $data['GNo']        = $rows['InPNO'];
				
				$InPLAT      = $rows['InPLAT'];
				$InPLNG      = $rows['InPLNG'];
				$InPtName    = $rows['InPName'];
				$InPCountry  = $rows['InPCountry'];
				$InPAddress  = $rows['InPAddress'];
				$InPKEY      = $rows['InPKEY'];
				$InPID       = $rows['InPID'];
				
				
				///////
	            
				$data['mInID']        = "";
				$data['xInID']        = "";
				
				////////
				$InPRONme  = "";
				
		        $tbs = " tb_indexmaz ";
				
				$tvs = " avg(InPrice) as InPrice,
					     min(InPrice) as mInPrice,
					     max(InPrice) as xInPrice,
					     avg(InPricePFT) as vInPricePFT,
					     min(InPricePFT) as mInPricePFT,
					     max(InPricePFT) as xInPricePFT,
					     avg(InPricePMT) as vInPricePMT,
					     min(InPricePMT) as mInPricePMT,
					     max(InPricePMT) as xInPricePMT,
						 InPrice as rInPrice, 
						 InPricePFT as rInPriceft, 
						 InPricePMT as rInPricemt,
						 InCity as InCity, 
						 InArea as InArea ";
						 
	            $tws = " AND InPID ='$InPID' ";
						 
		        $astLMT = " GROUP BY InPID 
				            ORDER BY InID DESC
				            LIMIT 1 ";
				$tWrs   = $tws.$dfLOcmMXs.$astLMT;
		        $CheckQUERY = $stDBss->CheckDATA($tvs,$tbs,$tWrs);
    
                while($x = mysqli_fetch_assoc($CheckQUERY))
	            {
					$data['avGInPrice']   = $x['InPrice'];
	                $data['avGInPricePFT']= $x['vInPricePFT'];
				    $data['avGInPricePMT']= $x['vInPricePMT'];
	                $data['mInPrice']     = $x['mInPrice'];
	                $data['mInPricePFT']  = $x['mInPricePFT'];
	                $data['mInPricePMT']  = $x['mInPricePMT'];
	                $data['xInPrice']     = $x['xInPrice'];
				    $data['xInPricePFT']  = $x['xInPricePFT'];
	                $data['xInPricePMT']  = $x['xInPricePMT'];
					 
					$data['InPrice']      = $x['rInPrice'];
			        $data['InPricePFT']   = $x['rInPriceft'];
			        $data['InPricePMT']   = $x['rInPricemt'];
		            $data['InCity']       = $x['InCity'];
				    $data['InArea']       = $x['InArea'];
					
		            array_push($res,$data);
				}
       
			}
		    echo json_encode($res);
			exit();
		}

		if($stFMs == "defURLOGo")
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
	
	    if($stFMs == "asHMAOPRtions")
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
				
				$tb  = " tb_indexmaz ";
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
				$tb = " tb_indexmaz ";
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
	
	    if($stFMs == "asHMASOPRtion")
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
				$tb = " tb_indexmaz ";
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
		
	    if($stFMs == "astMLOADers")
		{
			$res = "";
			$fm         = $_POST['fm'];
		    $InLAT      = $_POST['InLAT'];
		    $InLNG      = $_POST['InLNG'];
            $InCountry  = $_POST['InCountry'];
	        $InCity     = $_POST['InCity'];
			$InID       = $_POST['InID'];
			$InUSD      = $_POST['InUSD'];
			$InSIZessss = $_POST['InSIZes'];
			$InAddress = $_POST['InAddress'];
			$astGno    = $_POST['astGno'];
			$InPtName  = $_POST['InPtName'];
			
			
			$astMPrics = $_POST['astMPrice'];
			$astXPrics = $_POST['astXPrice'];
			
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
			
			$mdSROsaleVLUes = "";//dfPLUSoPtions($intsrSROsaleVLUes,"InPurPose",$InSIZessss,$InUSD);
	        $mdSResDNeVLUes = dfPLUSoPtions($intsrSResDNeVLUes,"InTYPE",$InSIZessss,$InUSD);
			$mdSBedsVLUes   = dfPLUSoPtions($intsrSBedsVLUes,"InBEDs",$InSIZessss,$InUSD);
			$mdSBthsVLUes   = dfPLUSoPtions($intsrSBthsVLUes,"InPATHs",$InSIZessss,$InUSD);
			$mdSPricesVLUes = dfPLUSoPtions($intsrSPricesVLUes,"InPrice",$InSIZessss,$InUSD);
			$mdSAreasVLUes  = dfPLUSoPtions($intsrSAreasVLUes,"InSizeFT",$InSIZessss,$InUSD);
			
			$mdSROslVLUs    = $mdSROsaleVLUes.$mdSResDNeVLUes.$mdSBedsVLUes.$mdSBthsVLUes.$mdSPricesVLUes.$mdSAreasVLUes;
			
			
			$InCYNme   = $stDBexTRas->CheckCURRencYs($InUSD);
		
			$defMETEsYes = "";

			$tBM       = " tb_indexmaz ";
			$tVM       = " count(*) as InPNO,InLAT,InLNG,InPID,
			               InCountry,InCity, InDistrict, InArea, 
						   InAddress, InProjectName, InComPound,
 			               min(InPricePFT) as mPRFT,
				           min(InPricePMT) as mPRMT, 
						   max(InPricePFT) as xPRFT,
				           max(InPricePMT) as xPRMT, 
						   avg(InPricePFT) as vPRFT,
				           avg(InPricePMT) as vPRMT ";
			//InLNG,InLAT
			$sWHRe     = " AND InLNG ='$InLNG' 
			               AND InLAT ='$InLAT' ";
            $sNULL     = " LIMIT 1 ";
						   
	        $stwGRPs   = $sWHRe.$mdSROslVLUs.$sNULL;
	        $ChckDATaG = $stDBss->CheckDATA($tVM,$tBM,$stwGRPs);
			while($astROWss = mysqli_fetch_assoc($ChckDATaG))
			{
				
				$InPPLAT     = $astROWss['InLAT'];
				$InPIDs      = $astROWss['InPID'];
	            $astGnos     = $astROWss['InPNO'];
				$InCountry   = $astROWss['InCountry'].".";
				$InCity      = $astROWss['InCity'].".";
				$InDistrict  = $astROWss['InDistrict'].".";
				$InArea      = $astROWss['InArea'].".";
				$InAddress   = $astROWss['InAddress'].".";
				$InPtName    = $astROWss['InProjectName'].".";
				$InComPound  = $astROWss['InComPound'].".";

				$vPRMT   = $astROWss['vPRMT'];
				$mPRMT   = $astROWss['mPRMT'];
				$xPRMT   = $astROWss['xPRMT'];
				$vPRFT   = $astROWss['vPRFT'];
				$mPRFT   = $astROWss['mPRFT'];
				$xPRFT   = $astROWss['xPRFT'];

				$astVPrice = number_format(round(($vPRMT * $InCYNme),2),0);
			    $astMPrice = number_format(round(($mPRMT * $InCYNme),2),0);
			    $astXPrice = number_format(round(($xPRMT * $InCYNme),2),0);	
				
				$InSIZes = "Meter";
				$InSIZess = "mt^2";
				$asMPRIcem= "";
				
				if($InSIZessss == "ft")
				{
					$astVPrice = number_format(round(($vPRFT * $InCYNme),2),0);
			        $astMPrice = number_format(round(($mPRFT * $InCYNme),2),0);
			        $astXPrice = number_format(round(($xPRFT * $InCYNme),2),0);
                    
					$InSIZes = "Feet";
				    $InSIZess = "ft^2";
				    $asMPRIcem= "";					
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
										    <?php echo $InUSD." / ".$InSIZess;?>
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
										    <?php echo $astGnos;?>
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
										    <?php echo $astMPrice.'<b class="astPRIcBODLdes"> '.$InUSD.' / <span>'.$InSIZess.'</span></b>';?>
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
										    <?php echo $astXPrice.' <b class="astPRIcBODLdes">'.$InUSD.' / <span>'.$InSIZess.'</span></b>';?>
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
										    <?php echo $astVPrice.' <b class="astPRIcBODLdes">'.$InUSD.' / <span>'.$InSIZess.'</span></b>';?>
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
<style>	
table.mdROWHtable.astMLOADTble,
table.astMLOADTble{
	margin:0px !important;
	padding:0px !important;
	gap:0px !important;
}	
table.astMLOADTble{
	font-size:14px;
}
table.astMLOADTble div{
	font-size:14px;
}	
table.astMLOADTble div.astFLex{
	height:100%;
	padding:0px;
	margin:0px;
}	
.mdROWHtable tr.mdROWtitles{
	position: relative;
    gap: 5px;
	border-bottom:1px solid #666 !important;
}
.mdROWHtable tr.mdROWtitles> td,
.mdROWHtable tr.mdROWtitles> td> div{
	flex:1;
	justify-content:center;
	align-items:center;
	gap:5px;
	height:40px;
	padding:0px;
	margin:0px;
}
.mdROWHtable tr.mdROWtitles> td.mdROWsale> div{
	background-color:#666 !important;
	color:#fff !important;
	gap:5px;
}
.mdROWHtable tr.mdROWtitles> td.mdROWsale:last-child{
	flex:calc(100% / 3);
}
.mdROWHtable tr.mdROWtitles> td.mdROWkind{
	background-color:#000 !important;
	color:#fff !important;
}
.mdROWHtable tr.mdROWtitles> td> div> b,
.mdROWHtable tr.mdROWtitles> td> div> span,
.mdROWHtable tr.mdROWtitles> td> div> i,
table.astMLOADTble div.astFLex,
table.astMLOADTble div.astFLex> span,
table.astMLOADTble div.astFLex> i{
	padding:0px;
	margin:0px;
	display:flex;
	justify-content:center;
	align-items:center;
}
table.astMLOADTble div.astFLex{
	justify-content:start;
	gap:5px;
}
.mdROWHtable tr.mdROWtitles> td> div> b{
	background-color:#fff;
	color:#000;
	border-radius:50%;
	height:15px;
	width:auto;
	min-width:25px;
	font-size:12px;
	align-self:end;
	margin-bottom:5px;
}
.mdROWHtable tr.mdROWtitles> td> div> span,
table.astMLOADTble div.astFLex> span{
	height:100%;
	font-size:14px;
}
.mdROWHtable tr.mdROWtitles> td> div> i,
table.astMLOADTble div.astFLex> i{
	font-size:10px;
	align-self:end;
	height:auto;
}
table.astMLOADTble th.mdTBROWdt{
	padding:0px;
	margin:0px;
	height:40px;
}
.astMLOADetails table.astMLOADTble{
	border-bottom:3px solid #666;
}
.astMLOADetails table.astMLOADTble thead th{
	border-bottom:0px;
	border-top:0px;
	background-color:#ddd;
}
</style>		  
				      
					    
				        <?php
						$tbss     = " tb_indexmaz ";
				        $tvss     = " COUNT(InID) as countROWs,
						              AVG(InPricePMT) as avGMTROWs, 
									  AVG(InPricePFT) as avGFTROWs,
									  min(InPricePMT) as nPMT , 
									  max(InPricePMT) as xPMT,
									  min(InPricePFT) as nPFT , 
									  max(InPricePFT) as xPFT,
						              InTYPE,InPurPose ";
				
				        $twONes   = " AND InLNG ='$InLNG' 
			                          AND InLAT ='$InLAT' ";
							  
                        $tORDerss = " GROUP BY InTYPE,InPurPose
				                      ORDER BY InPurPose DESC 
				                      limit $astGnos ";				
				
				        $tWrss  = $twONes.$mdSROslVLUs."".$tORDerss;
		                $CheckQUERYss = $stDBss->CheckDATA($tvss,$tbss,$tWrss);
				
						
				        foreach($CheckQUERYss as $astROWss)
				        {
							$InTYPE    = $astROWss['InTYPE'];
							$InPurPose = $astROWss['InPurPose'];
							$countROWs = $astROWss['countROWs'];
							$avGMTROWs = $astROWss['avGMTROWs'];
							$avGFTROWs = $astROWss['avGFTROWs'];
							
							$amGMTROWs = $astROWss['nPMT'];
							$axGMTROWs = $astROWss['xPMT'];
							$amGFTROWs = $astROWss['nPFT'];
							$axGFTROWs = $astROWss['xPFT'];
							
							$avGMTROWs = $avGMTROWs * $InCYNme;
							$avGFTROWs = $avGFTROWs * $InCYNme;
							
							$avGMTROWs = number_format($avGMTROWs,0);
							$avGFTROWs = number_format($avGFTROWs,0);
							
							$tbss     = " tb_indexmaz ";
				            $tvss     = " * ";
				
				            $twONes   = " AND InLNG ='$InLNG' 
			                              AND InLAT ='$InLAT' 
										  AND InPurPose='$InPurPose' 
										  AND InTYPE='$InTYPE' ";
							  
                            $tORDerss = " ORDER BY InPricePMT DESC 
				                          limit $astGnos ";				
				
				            $tWrss  = $twONes.$mdSROslVLUs."".$tORDerss;
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
												<b><?php echo $countROWs;?></b>
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
								
							    if($InPricePFT == $amGFTROWs || $InPricePMT == $amGMTROWs)
							    {
								    $mPColor = " background-color:#ffc107;color:#fff; ";
								}
							
							    if($InPricePFT == $axGFTROWs || $InPricePMT == $axGMTROWs)
							    {
								    $xPColor = " background-color:#dc3545;color:#fff; ";
								}
							
							    $InPrice    = $InPrice * $InCYNme;
							    $InPricePFT = $InPricePFT * $InCYNme;
							    $InPricePMT = $InPricePMT * $InCYNme;
						    
							    $InPrice    = number_format(round($InPrice,2),0);
							    $InPricePFT = number_format(round($InPricePFT,2),0);
							    $InPricePMT = number_format(round($InPricePMT,2),0);
							
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
											astGnos="<?php echo $astGnos;?>"
											
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
	
	
	
	    if($stFMs == "astMOReIMAPsTAs")
		{
			$fm = $_POST['fm'];
			
			if($fm == "OpenSDe")
			{
				$tOaction = $_POST['tOaction'];
				if($tOaction == "stFIRST")
				{
					?>
			        <div class="defSDLinkPARentss">
                        <div class="defSDLinkPARents astFlex">
	                        <div class="defSDLinkson defSDLinks defSDLinktss astFlex">
			                    <div class="defSDLinksonHdr astFlex col-lg-12">
				                    <h3>Countries</h3>
				                </div>
								<div class="defSDLinksonBODY astFlex col-lg-12">
				                    <?php $stDBss->defSDLnks();?>
				                </div>
		                        
		                    </div>
							
							<div class="defSDLinkson defSDLinks astFlex">
			                    <div class="defSDLinksonHdr astFlex col-lg-12">
				                    <h3>HeatMap</h3>
				                </div>
								<div class="defHEATGraPhCanvas" id="HEAtMaPLOaD"></div>
								<div class="defHEATGraPhCanvasPROG"></div>
			                </div>
							
		                    <div class="defSDLinkson defGraphCanvas">
			                    <div class="defSDLinksonHdr astFlex col-lg-12">
				                    <h3>Column bar</h3>
			                    </div>
								<div class="" id="defGraphCanvas"></div>
			                    
			                </div>
							
							<div class="defSDLinkson defSDLinkst astFlex" id="defSDLinkstssss">
			    
			                </div>
							
		                    <div class="defSDLinkson defSDLinks astFlex">
			                    <div class="defSDLinksonHdr astFlex col-lg-12">
				                    <h3>Top Prices</h3>
				                </div>
								<div class="defTOPGraPhCanvas"></div>
			                </div>

							
							
							
							
		                    
                        </div>
						
	                </div>  
			        <?php
					require_once($smPATH.'n_map/hEAtmaP.php');	
					exit();
				}
			}
			if($fm == "loadGraPH")
			{
				$data = array();
				$tOaction = $_POST['tOaction'];
				if($tOaction == "stFIRST")
				{
					$astInCountrYes  = $_POST['astInCountrYes'];
			        $astInCountrYefs = $_POST['astInCountrYefs'];
					
					$astInYes = " AND InCountry !='' ";
					$astInGes = " GROUP BY InCountry ";
					if($astInCountrYes == "InCountry")
					{
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InCountry !='' AND InCountry='$astInCountrYefs' ";
							$astInGes = " GROUP BY InCity ";
						}
						
					}
					elseif($astInCountrYes == "InCity")
					{
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InCity !='' AND InCity='$astInCountrYefs' ";
							$astInGes = " GROUP BY InArea ";
						}
						
					}
					$tb = " tb_indexmaz ";
	                $tv = " count(*) as marks ,InCountry,InCity,InArea ";
	                
					$astDRents = " ORDER BY marks 
			                       DESC LIMIT 20 ";
	
	                $astWHRs = $astInYes.$astInGes.$astDRents;
					
	                $CheckDATA = $stDBss->CheckDATA($tv,$tb,$astWHRs);
                    foreach($CheckDATA as $row)
			        {
	                    $data[] = $row;
					}
			
                    echo json_encode($data);
			        exit();
				}
				
				if($tOaction == "stTOPRIces")
				{
					$astInCountrYes  = $_POST['astInCountrYes'];
			        $astInCountrYefs = $_POST['astInCountrYefs'];
					
					$astInYes = " AND InCountry !='' ";
					$astInGes = " GROUP BY InCountry ";
					if($astInCountrYes == "InCountry")
					{
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InCountry !='' AND InCountry='$astInCountrYefs' ";
							$astInGes = " GROUP BY InCity ";
						}
						
					}
					elseif($astInCountrYes == "InCity")
					{
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InCity !='' AND InCity='$astInCountrYefs' ";
							$astInGes = " GROUP BY InArea ";
						}
						
					}
					$tb = " tb_indexmaz ";
	                $tv = " ROUND(avg(InPricePMT)) as marks ,InCountry,InCity,InArea ";
	                
					$astDRents = " ORDER BY marks 
			                       DESC LIMIT 20 ";
	
	                $astWHRs = $astInYes.$astInGes.$astDRents;
					
	                $CheckDATA = $stDBss->CheckDATA($tv,$tb,$astWHRs);
                    foreach($CheckDATA as $row)
			        {
	                    $data[] = $row;
					}
			
                    echo json_encode($data);
			        exit();
				}
			
			
			    if($tOaction == "defSDLinkst")
				{
					$astInCountrYes  = $_POST['astInCountrYes'];
			        $astInCountrYefs = $_POST['astInCountrYefs'];
			
			        $astInCountrYes  = trim($astInCountrYes);
			        if($tOaction != "")
			        {
						$astInYes = " AND InCity !='' ";
					    $astInGes = " GROUP BY InCity ";
					    if($astInCountrYes == "InCountry")
					    {
						    if($astInCountrYefs !="")
						    {
						 	    $astInYes = " AND InCountry='$astInCountrYefs' ";
							    $astInGes = " GROUP BY InCity ";
							}
						}
					    elseif($astInCountrYes == "InCity")
					    {
						    if($astInCountrYefs !="")
						    {
							    $astInYes = " AND InCity='$astInCountrYefs' ";
							    $astInGes = " GROUP BY InArea ";
							}
						}
						
				        $tb = " tb_indexmaz ";
	                    $tv = " count(*) as marks ,InCountry,InCity,InArea ";
	                
					    $astDRents = " ORDER BY marks 
			                           DESC LIMIT 10 ";
	
	                    $astWHRs = $astInYes.$astInGes.$astDRents;
	                    $CheckDATA = $stDBss->CheckDATA($tv,$tb,$astWHRs);
			            ?>
			            <div class="defSDLinksonHdr astFlex col-lg-12">
				            <h3>Top Cities</h3>
			            </div>
			            <?php
                        foreach($CheckDATA as $rows)
			            {
				            $astInCity = $rows['InCity'];
				            $astMarks  = $rows['marks'];
				
				            ?>
				            <a href="javascript:void(0)" nowrap class="defSDLnk btn astFlex stss" fm="InCity" id="<?php echo $astInCity;?>" 
				                                 onclick="defSDLinks(this)">
			                    <span class="astFlex">(<?php  echo $astMarks;?>)</span>
					            <b class="astFlex"><?php  echo $astInCity;?></b>
			                </a>
				            <?php
						}
			
					}	
					
					exit();
				}
			}
		
		    if($fm == "hEAtmaP")
			{
				
				
				$data = array();
				$tOaction = $_POST['tOaction'];
				if($tOaction == "stFIRST")
				{
					$astInCountrYes  = $_POST['astInCountrYes'];
			        $astInCountrYefs = $_POST['astInCountrYefs'];
					$astInCitYesFM   = $_POST['astInCitYesFM'];
					
					$astInYes = " AND InPHCountry !='' ";
					$astInGes = " ";
					if($astInCountrYes == "InCountry")
					{
						//$astInYes = " AND InPHCountry='UAE' ";
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InPHCountry='$astInCountrYefs' ";
							$astInGes = "";
						}
						
					}
					elseif($astInCountrYes == "InCity")
					{
						if($astInCountrYefs !="")
						{
							$astInYes = " AND InPHCountry='$astInCountrYefs' 
							              AND InPHCity='$astInCitYesFM' ";
							$astInGes = "";
						}
						
					}
					$tb = " tb_heatindex_map ";
	                $tv = " ROUND(InPHmPRice,2) as min_price, 
					        ROUND(InPHxPRice,2) as max_price,
					        ROUND(InPHDPRice,2) as median_price ,
							ST_AsGeoJSON(InPHSHaPe) as geojson,
							ST_AsText(InPHSHaPe) as InPHSHaPes,
					        tb_heatindex_map.* ";
	                
					$astDRents = " ORDER BY InPHID DESC LIMIT 100 ";
	
	                
	                $astWHRs  = $astInYes.$astDRents;
					
	                $CheckDATA = $stDBss->CheckDATA($tv,$tb,$astWHRs);
					
					$geojson = array(
                        'type'      => 'FeatureCollection',
                        'features'  => array()
                    ); 
					
                    foreach($CheckDATA as $row)
			        {
						
	                    $feature = array(
                            'type' => 'Feature',
                            'geometry' => json_decode($row['geojson'], true),
                            'crs' => array(
                                'type' => 'EPSG',
                                'properties' => array('code' => '900913')
                            ),
                           'properties' => array(
                                'local_name' => $row['InPHCountry'],
		                        'en_name' => $row['InPHCity'],
		                        'sector_name' => $row['InPHArea'],
		                        'en_sector_name' => $row['InPHAddress'],
		                        'min_price' => $row['min_price'],
		                        'max_price' => $row['max_price'],
		                        'median_price' => $row['median_price']
                            )
                        );
      
	                    
					    array_push($geojson['features'], $feature);
						
					}
			
                    echo json_encode($geojson);
			        exit();
				}
				
			}
		
		}
	}

?>


