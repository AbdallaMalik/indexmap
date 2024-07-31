<?php require_once('../mdDB/astinit.php');
    use Phppot\DataSource;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
	require_once ('./vendor/autoload.php');
	//ini_set('max_execution_time', 8000);
    //ini_set('memory_limit','8000M');
    //set_time_limit(0);
	
    $smPATH = "../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smURLPARENt   = $stDBCONST->getsmURLPARENt();
	$smCONNECT     = $stDBss->getsmCONNECT();

	function astDIVIDes($str,$type,$CHINA)
	{
		$res    = "";
		$off    = 0;
		$find   = "";
		$findNo = "";
		$strPOsXPlode  = array();
		$strdea        = array();
		
		$InArea   = "";
		$Address  = "";
		$InCity   = "";
		$InCitYs  = "";
		
		if(strpos($str,"(") !== false && strpos($str,"(2)") == false)
		{
			$find       = ",";
			$strdea     = explode("(",$str);
			
			$str        = $strdea[1];
			$str       = str_replace(")","",$str);
			$findNo     = substr_count($str,",");
            $stPos      = strpos($str,$find,$off+1);	
		}
		elseif(strpos($str,"?") !==false)
		{
			$find       = "?";
			$findNo     = substr_count($str,"?");
			$stPos    = strpos($str,$find,$off+1);
		}
		elseif(strpos($str,",") !==false)
		{
			$find       = ",";
			$findNo     = substr_count($str,",");
			$stPos    = strpos($str,$find,$off+1);
		}
		
		
		if($find != "")
		{ 
	        $strPOsXPlode = explode($find,$str);
			$i = 0;
			for($i == 0;$i < $findNo ; $i++)
			{
				if($findNo == 1)
				{
					$Address = $strPOsXPlode[0];
			        $InArea  = $strPOsXPlode[1];
			        $InCity  = $strPOsXPlode[1];
					$InCitYs = $strPOsXPlode[1];
				}
				elseif($findNo == 2)
				{
					$Address = $strPOsXPlode[0];
			        $InArea  = $strPOsXPlode[1];
			        $InCity  = $strPOsXPlode[2];
					$InCitYs = $strPOsXPlode[2];
				}
				elseif($findNo == 3)
				{
					$Address = $strPOsXPlode[0];
			        $InArea  = $strPOsXPlode[1]." , ".$strPOsXPlode[2];
			        $InCity  = $strPOsXPlode[3];
					$InCitYs = $strPOsXPlode[2];
				}
				else
				{
					$Address = $strPOsXPlode[0];
			        $InArea  = $strPOsXPlode[1]." , ".$strPOsXPlode[2];
			        $InCity  = $strPOsXPlode[3];
					$InCitYs = $strPOsXPlode[2];
				}
			}   
		}
		else
		{
			$Address = $str;
			$InArea  = $str;
			$InCity  = $str;
		}
		
		if($CHINA == "CHINA")
		{
			$InCity = $InCitYs;
		}
		
		if($type == "ad")
			$res = $Address;
		elseif($type == "ar")
			$res = $InArea;
		elseif($type == "st")
			$res = $InCity;	
			
					
		
		return $res;
	}
	
	
	if(isset($_GET['tOaction']))
	{
		
		////////////////////
		$tOaction = $_GET['tOaction'];
		if($tOaction == "load")
		{
			$tOactionVs = $_POST['tOaction'];
			$tOamaPVs   = $_POST['tOamaP'];
			$tOfileVs   = $_POST['tOfile'];
			
			if($tOactionVs == "import")
			{
				
				?>
				<div class="astBZBODYeimport">
		            <div class="row">
		                <div class="col-lg-12 defmANiPULchooses astFLex">
						    <form class="defmANiPULchoose astFLex" onsubmit="defmANiPULimPort(event,this)">
								<div class="astFLex">
								    
								    <input name="defmANiPULchoose" id="defmANiPULchoose" type="file">
								    <input id="defmANiPULchooseName" type="hidden" value="0">	
									<input id="defmANiPULchooseNo" type="hidden" value="0">	
								</div>
								<div class="astFLex gap-10">
									<select id="defmANiPULchooseCNY" class="astFLex form-control">
									    <option value="USD">USD</option>
										<option value="AED">AED</option>
										<option value="BHD">BHD</option>
										<option value="EUR">EUR</option>
										<option value="SAR">SAR</option>
									</select>
									<select id="defmANiPULchooseTYPe" class="astFLex form-control">
									    <option value="0">default</option>
										<option value="1">New</option>
										<option value="2">GARY</option>
										<option value="3">Latest</option>
									</select>
								</div>
								
								<div class="astFLex">
									<input id="defmANiPULuPload" type="submit" class="astFLex btn" value="UPLOAD">
								</div>	
							</form>	
							<div class="astFLex" style="display:none !important">
							    <input type="button" onclick="defmANiPULINSrts()" class="astFLex btn" value="Start">
								<input type="button" onclick="defmANiPULGROUPs()" class="astFLex btn" value="GROUP">
								<input type="button" onclick="defmANiPULGEOMETRY()" class="astFLex btn" value="GEOMETRY">
								<input type="button" onclick="defmANiPULDIVIDE()" class="astFLex btn" value="DIVIDE">
							    <input type="button" onclick="defmANiPULDIVID()" class="astFLex btn" value="DIVIDE D">
							
							
							</div>		
								
                            <div id="filelist" class="row astFLex">
							    <div></div>
							</div> 
							<br/><br/>	
							
							<div class="row astFLex uPloadPRogresns"></div> 
						</div>
		            </div>
					<?php 
					
					
					$tb = " tb_indexmaz ";
	                $tv = " * ";
	                
					$astDRents = " ORDER BY InID DESC LIMIT 5 ";
	
	                $astInYes = " ";
	                $astWHRs  = $astInYes.$astDRents;
					
                    
					$strCounts = 0;
	                $CheckDATA = $stDBss->CheckDATA($tv,$tb,$astWHRs);
					?>
					<br>
					<hr>
					<table class="table table stripped table-hover">
					    <thead>
						    <tr>
							    <th>ID</th>
								<th>Address</th>
								<th>Country</th>
								<th>P/ft</th>
								<th>P/mt</th>
							</tr>
						</thead>
						<tbody>
					    <?php
					    while($astROWs = mysqli_fetch_assoc($CheckDATA))
					    {
						    $strCounts++;
						    $InID      = $astROWs['InID'];
							$InAddress = $astROWs['InAddress'];
							$InCountry = $astROWs['InCountry'];
							$InPricePFT = $astROWs['InPricePFT'];
							$InPricePMT = $astROWs['InPricePMT'];
						
						    ?>
							<tr>
							    <td><?php echo $InID;?></td>
								<td><?php echo $InAddress;?></td>
								<td><?php echo $InCountry;?></td>
								<td><?php echo $InPricePFT;?></td>
								<td><?php echo $InPricePMT;?></td>
							</tr>
							<?php
						}
					?>
					    </tbody>
					    <tfoot>
						    <tr>
							    <td></td>
								<td></td>
								<td></td>
							</tr>
						</tfoot>
					</table>	
		        </div>
				<?php
				exit();
			}
			
		}
		
		if($tOaction == "stUPLOADFiles")
		{
			$fileCount = 0;
			$defnAme   = "";
			$i = 0;
            if(!empty($_FILES['defmANiPULchoose']['name']))
			{
				$defmANiPULchoose = $_FILES['defmANiPULchoose']['name'];
				$fileCount = count($defmANiPULchoose);
				
				for($i == 0; $i < $fileCount ; $i++)
				{
					$defnAmes  = $_FILES['defmANiPULchoose']['name'][$i];
					$defnAme   = explode(".",$defnAmes);
					$defnAmeK  = rand();
					$defnAmeSN = $defnAmeK.".".$defnAme[1];
					$targetPath = 'uploads/' . $defnAmeSN;
				    if(move_uploaded_file($_FILES['defmANiPULchoose']['tmp_name'][$i], $targetPath))
				    {
					    $res = 1;
					}
				    else
					{
					    $res = 2;
					}
				}
			}
			else
			{
				$res = 3;
			}
				
			
			echo $res."|".$fileCount."|".$defnAmeSN;
			exit();
		}
		
		if($tOaction == "stINSRTFiles")
		{
			
			
			$fileNAme    = "";//$_POST['fileNAme'];
			$filsSIze    = 2;
	        $fileCount   = 0;
	        $fileATYPe   = $_GET['fileATYPe'];
			$InCNCYName  = $_GET['fileACNYe'];
			$InKEY       = $fileATYPe;
			$InPricePMTa = "";
			
	        //$basenames   = explode(".",$fileNAme);
		    //$basename    = $fileNAme;
			
			$excelINSERT = "";
			$allowedFileType = [
                'application/vnd.ms-excel',
                'text/xls',
                'text/xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];

            if(in_array($_FILES["defmANiPULchoose"]["type"], $allowedFileType))
			{
				$fileNAmes   = $_FILES['defmANiPULchoose']['name'];
				$fileNAmee   = explode(".",$fileNAmes);
				$fileNAme    = rand().".".$fileNAmee[1];
				$targetPath = 'uploads/' . $fileNAme;
                move_uploaded_file($_FILES['defmANiPULchoose']['tmp_name'], $targetPath);

                $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                $spreadSheet = $Reader->load($targetPath);
                $excelSheet = $spreadSheet->getActiveSheet();
                $spreadSheetAry = $excelSheet->toArray();
                $sheetCount = count($spreadSheetAry);
				
				$i    = 1;
				$res     = "";
				$baseEXe     = "xlsx";
				$InPricePMsss = "";
				$ChckCURRncYs = $stDBexTRas->CheckCURRencYs($InCNCYName);
				if($filsSIze > $fileCount)
				{     						  
			        for($i = 1; $i <= $sheetCount; $i++)
			        {
				        $InSource =""; $InLink =""; $InPrice =""; $InAddress ="";
						$InProjectName =""; $InArea =""; $InPATHs =""; $InSizeFT ="";
						$InSize = "";
						$InPricePFT =""; $InPricePMT =""; $InTYPE =""; $InLAT =""; 
						$InLNG ="";  $InBEDs =""; $InDescription =""; $InCountry =""; 
						$InCity ="";$InAddrssaa ="";
						
						
			            if(isset($spreadSheetAry[$i][0])) {
                            $InSource = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][0]);
						}
						
						if(isset($spreadSheetAry[$i][1])) {
                            $InCountry = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][1]);
						}
				
			            if(isset($spreadSheetAry[$i][4])) {
                            $InPrice = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][4]);
						}
			    
			            if(isset($spreadSheetAry[$i][6])) {
                            $InAddress = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][6]);
						}
						
						if(isset($spreadSheetAry[$i][9])) {
                            $InSize = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][9]);
						}
						
                        if(isset($spreadSheetAry[$i][10])) {
                            $InLAT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][10]);
						}
					
			            if(isset($spreadSheetAry[$i][11])) {
                            $InLNG = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][11]);
						}
			    
				        if(isset($spreadSheetAry[$i][12])) {
                            $InPricePMT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][12]);
						}

			            if(isset($spreadSheetAry[$i][13])) {
                            $InPricePFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][13]);
						}
						if(isset($spreadSheetAry[$i][14])) {
                            $InSizeFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][14]);
						}
						if(isset($spreadSheetAry[$i][15])) {
                            $InCity = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][15]);
						}
						if(isset($spreadSheetAry[$i][16])) {
                            $InProjectName = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][16]);
						}
						if(isset($spreadSheetAry[$i][17])) {
                            $InArea = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][17]);
						}
						
						
			            $InName     = $InDescription;

						
						if($InCountry == "USA")
						{
							$InAddress = $InAddress.",".$InArea;
							
							$InAddress = str_replace(", USA","",$InAddress);
						}
						if(!empty($InPricePFT))
				        {
							$InPricePFTa   = $InPricePFT;
				            $InPricePMTa   = $InPricePMT;
				            $InPricea      = $InPrice;
				            $InSizea       = $InSize;
							
							if($InCNCYName !="USD")
							{	
								$InPricePFTa   = $InPricePFTa / $ChckCURRncYs;
				                $InPricePMTa   = $InPricePMTa / $ChckCURRncYs;
				                $InPricea      = $InPricea / $ChckCURRncYs ;
							}
							
							if($InCountry == "UAE" && $fileATYPe == 3)
							{
								$ChckCURRncYs = $stDBexTRas->CheckCURRencYs("AED");
								$InPricea      = $InPricea / $ChckCURRncYs ;
								$InPricePFTa   = $InPricePFTa / $ChckCURRncYs;								
							}
				            
							
						    $InAddrssaa = $InAddress;
				            

						    $InAddress      = astDIVIDes($InAddrssaa,"ad",$InCountry);
							
							if($InCity == "")
							{
								$InCity  = astDIVIDes($InAddrssaa,"st",$InCountry);
							}
							if($InProjectName == "")
							{
								$InProjectName  = astDIVIDes($InAddrssaa,"ad",$InCountry);	
							}
							if($InArea == "")
							{
								$InArea  = astDIVIDes($InAddrssaa,"ad",$InCountry);	
							}
							
						}
						else
						{
							$res = 5;
						}
						
						
						
						$find = array("?","?","?");
						$InArea        = str_replace("\'","",$InArea);
						$InProjectName = str_replace("\'","",$InProjectName);
						$InAddress     = str_replace("\'","",$InAddress);
						$InName        = str_replace("\'","",$InName);
						$InName        = str_replace("|","_",$InName);
						$InName        = str_replace($find," ",$InName);
						$InFileID      = $fileNAme;
						if($InLAT != "")
					    {	
							$tv = " tb_indexmaz(InName,InCountry,InCity,InArea,InAddress,InSize,InSizeFT,
					                            InPrice,InPricePFT,InPricePMT,InLAT,InLNG,InProjectName,
										        InCNCYName,InTYPE,InSource,InLink,InKEY,InFileID) ";
					        $ts = " VALUES('$InName','$InCountry','$InCity','$InArea','$InAddress','$InSizea','$InSizeFT',
					                       '$InPricea','$InPricePFTa','$InPricePMTa','$InLAT','$InLNG','$InProjectName',
								           '$InCNCYName','$InTYPE','$InSource','$InLink','$InKEY','$InFileID') ";
					        $tb = $tv.$ts;
					        $CreateDATA = $stDBss->CreateDATA($tb);
					        if($CreateDATA)
					        {
								$res = 1;   
							}
					        else
					        {
						        $res = 2;
							}
						}
						else
						{
							$res = 3;
						}
					}
					
				}
			    else
				{
					$res = 66;
				}
			}
            else
			{
			    $res = 77;
			}			
			
			
			echo $res."|".$fileCount."|".$fileNAme;
			exit();
		}
	
	    if($tOaction == "stGROUPsFiles")
		{
			$fileCount = 0;
			$res = "";
			$astTOTalOffset = $_POST['astTOTalOffset'];
			$astTOTalROWs   = $_POST['astTOTalROWs'];
			$fileNAme       = $_POST['fileNAme'];
			$fileNTYPe      = $_POST['fileNTYPe'];
			
			$resTART  = 0;
			
				
				
			$Offset  = ($astTOTalOffset - 1) * $astTOTalROWs;
				
			$tvsa = " count(*) as no,InLAT,InLNG,InProjectName,InAddress,InCountry,InKEY ";
			$tbsa = " tb_indexmaz ";
			$twsa = " AND InLAT !='' 
					  AND InLNG !=''  
					  AND InAddress !=''
					  GROUP BY InLAT,InLNG,InCountry,InKEY 
					  LIMIT $Offset,$astTOTalROWs ";
			$CheckDATasa = $stDBss->CheckDATA($tvsa,$tbsa,$twsa);
			
			
			
			
			while($astROWs = mysqli_fetch_assoc($CheckDATasa))
			{
				$fileCount++;
				
				
				$InPLAT     = $astROWs['InLAT'];
				$InPLNG     = $astROWs['InLNG'];
				$InPName    = $astROWs['InProjectName'];
				$InPCountry = $astROWs['InCountry'];
				$InPAddress = $astROWs['InAddress'];
				$InPKEY     = $astROWs['InKEY'];
				$InPNO      = $astROWs['no'];
				
				$InPsearch = $InPCountry.", ".$InPAddress.", ".$InPName;
									
				$tvsaa = " InPID ";
				$tbsaa = " tb_index_parent ";
				$twsaa = " AND InPLAT='$InPLAT' 
						   AND InPLNG='$InPLNG'  
						   AND InPCountry='$InPCountry'
						   AND InPKEY='$InPKEY' ";
				
				$CheckDATasaa = $stDBss->CheckDATA($tvsaa,$tbsaa,$twsaa);
			    if(mysqli_num_rows($CheckDATasaa) > 0)
				{
					$CheckDATasaaa = mysqli_fetch_assoc($CheckDATasaa);
					$InPID      = $CheckDATasaaa['InPID'];
					
					$tb = " tb_indexmaz ";
					$tv = " InPID='$InPID' ";
					$tw = " AND InLAT='$InPLAT' 
							AND InLNG='$InPLNG'  
						    AND InCountry='$InPCountry' 
							AND InKEY='$InPKEY' ";
					
					$UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
					if($UPDateDATA)
					{
						$res = 1;
					}
					else
					{
						$res = 2;
					}
				}
				else
				{
					$tva = " tb_index_parent (InPLAT,InPLNG,InPName,InPAddress,InPCountry,InPsearch,InPKEY,InPNO) ";
					$tsa = " VALUES('$InPLAT','$InPLNG','$InPName','$InPAddress','$InPCountry','$InPsearch','$InPKEY','$InPNO') ";
					$tba = $tva.$tsa;
					$CreateDATAa = $stDBss->CreateDATA($tba);
					if($CreateDATAa)
					{
						$res = 1;
					}
					else
					{
						$res = 2;
					}
										
				}
									
			}
			
			
			if($fileNTYPe == "resTART")
			{
				if(mysqli_num_rows($CheckDATasa) > 0)
				{
					
				}
				else
				{
					$res = 6;
				}
			}
			echo $res."|".$Offset;
			exit();
		}
	
	    if($tOaction == "stGEOMETRYsFiles")
		{
			exit();

			$fileCount = 0;
			$res = "";
			$astTOTalOffset = $_POST['astTOTalOffset'];
			$astTOTalROWs   = $_POST['astTOTalROWs'];
				
				
			$Offset  = ($astTOTalOffset - 1) * $astTOTalROWs;
				
			$tvsa = " count(*) as no,
			          max(InPricePMT) as mx,
					  min(InPricePMT) as mn,
					  avg(InPricePMT) as av,
					  InLAT,InLNG,InAddress,InCountry,InCity,InKEY ";
			$tbsa = " tb_indexmaz ";
			$twsa = " AND InLAT !='' 
					  AND InLNG !=''  
					  AND InAddress !=''
					  AND InCity !=''
					  GROUP BY InAddress,InCity,InCountry
					  ORDER BY no DESC
					  LIMIT $Offset,$astTOTalROWs ";
			$CheckDATasa = $stDBss->CheckDATA($tvsa,$tbsa,$twsa);
			
			while($astROWs = mysqli_fetch_assoc($CheckDATasa))
			{
				$fileCount++;
				
				
				$InPLAT     = $astROWs['InLAT'];
				$InPLNG     = $astROWs['InLNG'];
				$InPCountry = $astROWs['InCountry'];
				$InPAddress = $astROWs['InAddress'];
				$InPKEY     = $astROWs['InKEY'];
				$InMX       = $astROWs['mx'];
				$InMN       = $astROWs['mn'];
				$InAV       = $astROWs['av'];
				$InPCity    = $astROWs['InCity'];
				$InPNO      = $astROWs['no'];
				
				
				
				$tvsaa = " InLAT,InLNG,
                           ((acos(cos(('$InPLAT' * pi()/180)) * 
						   cos((InLAT * pi()/180)) * 
						   cos((InLNG * pi()/180) - '$InPLNG' * pi()/180) + 
						   sin(('$InPLAT' * pi()/180)) * 
						   sin((InLAT * pi()/180))) * 180/pi()) * 60 * 1.1515 * 1.609344)
						   AS distance ";
				$tbsaa = " tb_indexmaz ";
				
				$twsaa = " HAVING distance < 0.5  
						   limit 500 ";
				$CheckDATasaa = $stDBss->CheckDATA($tvsaa,$tbsaa,$twsaa);
					
				$stGeoma = "";	
				$astGeomaNON = "";
				$strCounts = 0;
				while($rows = mysqli_fetch_assoc($CheckDATasaa))
				{
					$strCounts++;
					$InLATa = $rows['InLAT'];
				    $InLNGa = $rows['InLNG'];
					
					$stGeoma .= "$InLNGa $InLATa".",";
					$astGeomaNON = "$InLNGa $InLATa";
				}
				
				$stGeom = " ST_GeomFromText('POLYGON(($astGeomaNON,
				                                      $stGeoma
													  $astGeomaNON))') ";
               
				if($strCounts !="")
				{
					$tva = " tb_heatindex_map (InPHCountry,InPHCity,InPHArea,InPHAddress,
				                           InPHmPRice,InPHxPRice,InPHDPRice,
										   InPHSHaPe) ";
				    $tsa = " VALUES('$InPCountry','$InPCity','$InPAddress','$InPAddress',
				                '$InMN','$InMX','$InAV',
								 $stGeom) ";
				    $tba = $tva.$tsa;
				    $CreateDATAa = $stDBss->CreateDATA($tba);
				    if($CreateDATAa)
				    {
					    $res = 1;
					}
				    else
				    {
					    $res = 2;
					}
				}
				else
				{
					$res = 3;
				}
				
			}
			
			
			echo $res."|".$Offset;
			exit();
			
		}
	
	    if($tOaction == "defmANiPULDIVIDE")
		{
			//exit();
			//130366;//274328
			$fileCount = 0;
			$res = "";
			$astTOTalOffset = $_POST['astTOTalOffset'];
			$astTOTalROWs   = $_POST['astTOTalROWs'];
				
				
			$Offset  = ($astTOTalOffset - 1) * $astTOTalROWs;
				
			$tvsa = " * ";
			$tbsa = " tb_indexmaz ";
			$twsa = " AND InID > 389000 ORDER BY InID ASC
					  LIMIT $Offset,$astTOTalROWs ";
			$CheckDATasa = $stDBss->CheckDATA($tvsa,$tbsa,$twsa);
			
			while($astROWs = mysqli_fetch_assoc($CheckDATasa))
			{
				$InID       = $astROWs['InID'];
				$InName     = $astROWs['InName'];
				$InCountry  = $astROWs['InCountry'];
				$InCity     = $astROWs['InCity'];
				$InArea     = $astROWs['InArea'];
				$InAddress  = $astROWs['InAddress'];
				$InSize     = $astROWs['InSize'];
				$InSizeFT   = $astROWs['InSizeFT'];
				$InPrice    = $astROWs['InPrice'];
				$InPricePFT = $astROWs['InPricePFT'];
				$InPricePMT = $astROWs['InPricePMT'];
				$InLAT      = $astROWs['InLAT'];
				$InLNG      = $astROWs['InLNG'];
				$InPName    = $astROWs['InProjectName'];
				$InCNCYName = $astROWs['InCNCYName'];
				$InKEY      = $astROWs['InKEY'];
				$InFileID   = $astROWs['InFileID'];
				$InPID      = $astROWs['InPID'];
				
				$InTYPE   = "";
				$InSource = "";
				$InLink   = "";
				if($InID < 600000)
				{	
					$tv = " tb_indexmaz_d (InName,InCountry,InCity,InArea,InAddress,InSize,InSizeFT,
					                             InPrice,InPricePFT,InPricePMT,InLAT,InLNG,InProjectName,
										         InCNCYName,InTYPE,InSource,InLink,InKEY,InFileID,InPID) ";
					$ts = " VALUES('$InName','$InCountry','$InCity','$InArea','$InAddress','$InSize','$InSizeFT',
					                       '$InPrice','$InPricePFT','$InPricePMT','$InLAT','$InLNG','$InPName',
								           '$InCNCYName','$InTYPE','$InSource','$InLink','$InKEY','$InFileID','$InPID') ";
					$tb = $tv.$ts;
					$CreateDATA = $stDBss->CreateDATA($tb);
					if($CreateDATA)
					{
						$res = 1;   
					}
					else
					{
						$res = 2;
					}
				}
				else
				{
					$res = 3;
				}
			}
			
			
			echo $res."|".$Offset."|".$InID;
			exit();
		}
	
	    if($tOaction == "defmANiPULDIVID")
		{
			
			$fileCount = 0;
			$res = "";
			$astTOTalOffset = $_POST['astTOTalOffset'];
			$astTOTalROWs   = $_POST['astTOTalROWs'];
				
				
			$Offset  = ($astTOTalOffset - 1) * $astTOTalROWs;
				
			$tvsa = " * ";
			$tbsa = " tb_indexmaz ";
			$twsa = " AND InID > 299999 
			          ORDER BY InID ASC
					  LIMIT $Offset,$astTOTalROWs ";
			$CheckDATasa = $stDBss->CheckDATA($tvsa,$tbsa,$twsa);
			
			while($astROWs = mysqli_fetch_assoc($CheckDATasa))
			{
				$fileCount ++;
				$InID       = $astROWs['InID'];
				$InName     = $astROWs['InName'];
				$InCountry  = $astROWs['InCountry'];
				$InCity     = $astROWs['InCity'];
				$InArea     = $astROWs['InArea'];
				$InAddress  = $astROWs['InAddress'];
				$InSize     = $astROWs['InSize'];
				$InSizeFT   = $astROWs['InSizeFT'];
				$InPrice    = $astROWs['InPrice'];
				$InPricePFT = $astROWs['InPricePFT'];
				$InPricePMT = $astROWs['InPricePMT'];
				$InLAT      = $astROWs['InLAT'];
				$InLNG      = $astROWs['InLNG'];
				$InPName    = $astROWs['InProjectName'];
				$InCNCYName = $astROWs['InCNCYName'];
				$InKEY      = $astROWs['InKEY'];
				$InFileID   = $astROWs['InFileID'];
				$InPID      = $astROWs['InPID'];
				
				$InTYPE   = "";
				$InSource = "";
				$InLink   = "";
				//53516
				if($InID < 500000)
				{	
					$tv = " tb_indexmaz_d (InName,InCountry,InCity,InArea,InAddress,InSize,InSizeFT,
					                             InPrice,InPricePFT,InPricePMT,InLAT,InLNG,InProjectName,
										         InCNCYName,InTYPE,InSource,InLink,InKEY,InFileID,InPID) ";
					$ts = " VALUES('$InName','$InCountry','$InCity','$InArea','$InAddress','$InSize','$InSizeFT',
					                       '$InPrice','$InPricePFT','$InPricePMT','$InLAT','$InLNG','$InPName',
								           '$InCNCYName','$InTYPE','$InSource','$InLink','$InKEY','$InFileID','$InPID') ";
					$tb = $tv.$ts;
					$CreateDATA = $stDBss->CreateDATA($tb);
					if($CreateDATA)
					{
						$res = 1;   
					}
					else
					{
						$res = 2;
					}
				}
				else
				{
					$res = 3;
				}
				
			}
		
			echo $res."|".$Offset."|".$InID;
			exit();
		}
	
	}
?>