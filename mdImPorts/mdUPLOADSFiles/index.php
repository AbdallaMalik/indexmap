<?php require_once('../../mdDB/astinit.php');
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    require_once ('./vendor/autoload.php');
     
	ini_set('max_execution_time', 8000);
    ini_set('memory_limit','8000M');
    set_time_limit(0); 

	$mdPATH = "../";
	$smPATH = "../../";
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
	
	function mdSTRclean($mdstr)
	{
		$mdRNwrod = "";
		$mdNwrod = "";
		$mdword  = "";
		
	    $mdstr   = trim($mdstr);
		$mdwrdb  = "";
		if(strpos($mdstr,"(") != false)
		{
			$mdstart = strpos($mdstr,"(");
		    $mdlast  = strpos($mdstr,")");
		    $mdword  = substr($mdstr,$mdstart,$mdlast);
			
			$mdstartb = strpos($mdword,"(");
		    $mdlastb  = strpos($mdword,")");
		    $mdwrdb   = substr($mdword,$mdstartb+1,$mdlastb-1);
		}			
			
		$mdRed   = array("  ","   ");	
		$mdReb   = array("✤","|","-","+",":","@","=","/","\\","\"","&");	
		$mdRes   = array(",","{","}","*","$","٪","▪◾◼⬛","★","✔","✅","✔️","⚡","✦","❗",";","'","?","%","<",">",$mdword);
			 
		$mdNwrod = str_replace($mdRes,"",$mdstr);
		$mdNwrod = str_replace($mdReb," ",$mdNwrod);
		$mdNwrod = str_replace($mdRed," ",$mdNwrod);
		
		$mdNwrod = trim($mdNwrod)." ".trim($mdwrdb);
			
		$mdRNwrod = str_replace($mdRed," ",$mdNwrod);
		$mdRNwrod = trim($mdRNwrod);	
		return $mdRNwrod;	
	}
	
    if(isset($_GET["mdAction"]))
	{
		$mdAction = $_GET["mdAction"];
		
		$mdResults = "";
		$mdResult  = "";
		if($mdAction == "mdUPLOADIDIndx")
		{
			
			$dmFileTYPe = [
                'application/vnd.ms-excel',
                'text/xls',
                'text/xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];
			
			if(isset($_FILES["mdUPLOADIns"]["type"]))
			{
				if(in_array($_FILES["mdUPLOADIns"]["type"], $dmFileTYPe)) 
				{
					$targetPath = 'uploads/' . $_FILES['mdUPLOADIns']['name'];

                    if(move_uploaded_file($_FILES['mdUPLOADIns']['tmp_name'], $targetPath))
					{
						$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

                        $spreadSheet    = $Reader->load($targetPath);
                        $excelSheet     = $spreadSheet->getActiveSheet();
                        $spreadSheetAry = $excelSheet->toArray();
                        $sheetCount     = count($spreadSheetAry);
                       
  
                        if($sheetCount > 0)
						{
							$InCNCYName     = $_GET['mdDollar'];
							$InPID          = $_GET['mdPurPose'];
							
                            $ChckCURRncYs   = $stDBexTRas->CheckCURRencYs($InCNCYName);
							
							$InFileID = basename($targetPath);
							
			                $i = 1;
		                    for($i = 1; $i <= $sheetCount; $i++) 
		                    {
			                    $InTYPE = "";
			                    if(isset($spreadSheetAry[$i][0])){
                                    $InTYPE = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][0]);
								}
								$InPurPose = "";
			                    if(isset($spreadSheetAry[$i][1])){
                                    $InPurPose = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][1]);
								}
								$InLink = "";
			                    if(isset($spreadSheetAry[$i][2])){
                                    $InLink = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][2]);
								}
								$InPrice = "";
			                    if(isset($spreadSheetAry[$i][3])){
                                    $InPrice = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][3]);
								}
								$InName = "";
			                    if(isset($spreadSheetAry[$i][4])){
                                    $InName = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][4]);
								}
								$InCity = "";
			                    if(isset($spreadSheetAry[$i][5])){
                                    $InCity = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][5]);
								}
								$InDistrict = "";
			                    if(isset($spreadSheetAry[$i][6])){
                                    $InDistrict = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][6]);
								}				
								$InProjectName = "";
			                    if(isset($spreadSheetAry[$i][7])){
                                    $InProjectName = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][7]);
								}
								$InComPound = "";
			                    if(isset($spreadSheetAry[$i][8])){
                                    $InComPound = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][8]);
								}
								$InBEDs = "";
			                    if(isset($spreadSheetAry[$i][9])){
                                    $InBEDs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][9]);
								}
								$InPATHs = "";
			                    if(isset($spreadSheetAry[$i][10])){
                                    $InPATHs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][10]);
								}
								$InSizeFT = "";
			                    if(isset($spreadSheetAry[$i][11])){
                                    $InSizeFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][11]);
								}
								
								$InLATs = "";
			                    if(isset($spreadSheetAry[$i][12])){
                                    $InLATs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][12]);
								}
								
								$InLNGs = "";
			                    if(isset($spreadSheetAry[$i][13])){
                                    $InLNGs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][13]);
								}
								
								$InPricePFT = "";
			                    if(isset($spreadSheetAry[$i][14])){
                                    $InPricePFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][14]);
								}
								
								
								$InUnit       = "";
								$InDateROsale = "";
								
								if($InPID == 1)
								{
									$InUnit = "";
									if(isset($spreadSheetAry[$i][16])){
                                        $InUnit = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][16]);
									}
									
									$InDateROsale = "";
									if(isset($spreadSheetAry[$i][17])){
                                        $InDateROsale = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][17]);
									}
									
									$InUnit       = trim($InUnit);
									$InDateROsale = trim($InDateROsale);
								}
								
								$mdRes  = array(",","،"," ","-");
								$md_Res = array("-");
								$md_Rss = array(" ");
								
								$InPricePFT = str_replace($mdRes,"",$InPricePFT);
								$InPrice    = str_replace($mdRes,"",$InPrice);
								$InSizeFT   = str_replace($mdRes,"",$InSizeFT);
								$InSizeFT   = str_replace($md_Res,0,$InSizeFT);
								
								$InPricePFT = floatval($InPricePFT);
								$InPrice    = floatval($InPrice);
								$InSizeFT   = floatval($InSizeFT);
								
								/////
								$InLATs   = str_replace($md_Rss,"",$InLATs);
								$InLNGs   = str_replace($md_Rss,"",$InLNGs);
								
								$InLAT = "";
								if($InLATs != "")
								{
									$InLAT = doubleval($InLATs);
								}
								
								$InLNG = "";
								if($InLNGs != "")
								{
									$InLNG = doubleval($InLNGs);
								}
								
								$InBEDss  = str_replace($md_Res,0,$InBEDs);
								$InPATHss = str_replace($md_Res,0,$InPATHs);
								
								$InBEDs   = trim($InBEDss);
								$InPATHs  = trim($InPATHss);
								
								if(!empty($InBEDs) && $InBEDs != "Studio")
								{
									$InBEDs = intval($InBEDs);
								}
								elseif(empty($InBEDs))
								{
									$InBEDs = 0;
								}
								
								if(!empty($InPATHs) && $InPATHs != "Studio")
								{
									$InPATHs = intval($InPATHs);
								}
								elseif(empty($InPATHs))
								{
									$InPATHs = 0;
								}
								
								if($InSizeFT == 0)
								{
									$InSizeFT = $InPrice / $InPricePFT;
								}
								
								$InPrice    = $InPrice / $ChckCURRncYs;
								$InPricePFT = $InPrice / $InSizeFT;
								
								
								$InSize = "";
								$InPricePMT = "";
								if(!empty($InSizeFT))
								    $InSize = $InSizeFT / 10.7641;
								
								if(!empty($InPricePFT))
								    $InPricePMT = $InPricePFT * 10.7641;
								
								$InCountry = "UAE";
								$InArea    = $InProjectName;
								$InAddress = "";
								$InUPD     = 1;
								
								$InPricePFT = round($InPricePFT,0);
								$InPricePMT = round($InPricePMT,0);
								$InPrice    = round($InPrice,0);
								$InSize     = round($InSize,0);
								
								$InName        = mdSTRclean($InName);
								$InPurPose     = mdSTRclean($InPurPose);
								$InTYPE        = mdSTRclean($InTYPE);
								$InCountry     = mdSTRclean($InCountry);
								$InCity        = mdSTRclean($InCity);
								$InDistrict    = mdSTRclean($InDistrict);
								$InArea        = mdSTRclean($InArea);
								$InAddress     = mdSTRclean($InAddress);
								$InComPound    = mdSTRclean($InComPound);
								$InProjectName = mdSTRclean($InProjectName);
								$InLink        = trim($InLink);
                                $InCNCYNm = "";
								
								if($InLAT == "")
								{
									/*
									if($InPID == 0)
										$InPID = 3;
									elseif($InPID == 1)
									    $InPID = 4;
									*/
								}
								
								$tv = " InID ";
								$tb = " tb_IndexmaPs ";
								$tw = " AND InName = '$InName' AND InPurPose = '$InPurPose' 
										AND InTYPE = '$InTYPE' AND InCountry = '$InCountry'
								        AND InCity = '$InCity' AND InDistrict = '$InDistrict' 
									    AND InArea = '$InArea' AND InAddress = '$InAddress'
										AND InComPound= '$InComPound' AND InSize = '$InSize'
										AND InSizeFT = '$InSizeFT' AND InPrice = '$InPrice' 
										AND InPricePFT = '$InPricePFT' AND InPricePMT = '$InPricePMT'
										AND InLAT = '$InLAT' AND InLNG = '$InLNG' 
										AND InProjectName = '$InProjectName' AND InBEDs = '$InBEDs'
										AND InPATHs = '$InPATHs' AND InLink = '$InLink' 
										AND InUnit = '$InUnit' AND InDateROsale = '$InDateROsale'
										AND InUPD = '$InUPD' AND InPID='$InPID' ";
								
								$CheckDATA = $stDBss->CheckDATA($tv,$tb,$tw);
								if(mysqli_num_rows($CheckDATA) > 0)
								{ 
									$mdResults = "mdExistCell";
								}
								else
								{
									$tvss = " max(InID) as InID ";
								    $tbss = " tb_IndexmaPs ";
								    $twss = " LIMIT 1 ";
								
								    $CheckDATAss = $stDBss->CheckDATA($tvss,$tbss,$twss);
									$CheckROWS   = mysqli_fetch_assoc($CheckDATAss);
									$InID        = $CheckROWS['InID'];
									$InID = $InID + 1;
									
									if($InArea != "Pacific" && $InArea != "Canal Residence West" && $InArea != "Lincoln Park" && $InArea != "Pacific " && $InArea != "Canal Residence West " && $InArea != "Lincoln Park ")
									{
										$tbs = " tb_IndexmaPs(InID,InName,InPurPose,InCountry,InCity,InDistrict,InArea,InAddress,
									                     InComPound,InSize,InSizeFT,InPrice,InPricePFT,InPricePMT,	
														 InLAT,InLNG,InProjectName,InPATHs,InBEDs,InTYPE,InLink,InFileID,
														 InUPD,InPID,InUnit,InDateROsale,InCNCYName) 
									             VALUES('$InID','$InName','$InPurPose','$InCountry','$InCity','$InDistrict','$InArea','$InAddress',
									                     '$InComPound','$InSize','$InSizeFT','$InPrice','$InPricePFT','$InPricePMT',	
														 '$InLAT','$InLNG','$InProjectName','$InPATHs','$InBEDs','$InTYPE','$InLink','$InFileID',
														 '$InUPD','$InPID','$InUnit','$InDateROsale','$InCNCYNm') ";
									    $CreateDATA = $stDBss->CreateDATA($tbs);
									
									    if($CreateDATA)
									    {
										    $mdResults = 1;
										}
									    else
									    {
										    $mdResults = 2;
										}
									}
									else
									{
										$mdResults = 3;
									}
								}
							}
						}		
						
						$mdResult  = 1;
					}
                    else
					{
						$mdResults = 0;
						$mdResult  = 0;
					}
				}
				else
				{
					$mdResults = "mdTYPerroe";
					$mdResult  = "mdTYPerroe";
				}
			}
			else
			{
				$mdResults = "mdFilenotexist";
				$mdResult  = "mdFilenotexist";
			}
			
			$mdResultss = $mdResult."|".$mdResults;
			
			echo $mdResultss;
			exit();
		}
		
	}
	else
	{
		echo "error";
		exit();
	}

?>