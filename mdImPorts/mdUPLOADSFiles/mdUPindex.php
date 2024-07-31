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
	$mdGCode      = $stDBCONST->getmdVUsion("mdGCode");
	$mdGMail      = $stDBCONST->getmdVUsion("mdGMail");
	
	$mdGdate      = date("Y-m-d H:i:s");
	$mdResDate    = date("Y-m-d");
	
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
							
							$mdbCountry     = "Saudi Arabia";
                            
							//$InFileID       = basename($targetPath);
							
			                $i = 1;
		                    for($i = 1; $i <= $sheetCount; $i++) 
		                    {
			                    $mdbName = "";
			                    if(isset($spreadSheetAry[$i][0])){
                                    $mdbName = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][0]);
								}
								$mdCode = "";
			                    if(isset($spreadSheetAry[$i][1])){
                                    $mdCode = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][1]);
								}
								$mdbGPhone = "";
			                    if(isset($spreadSheetAry[$i][2])){
                                    $mdbGPhone = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][2]);
								}
								$mdbCode = "";
			                    if(isset($spreadSheetAry[$i][3])){
                                    $mdbCode = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][3]);
								}
								$mdbPhone = "";
			                    if(isset($spreadSheetAry[$i][4])){
                                    $mdbPhone = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][4]);
								}
								$mdbMail = "";
			                    if(isset($spreadSheetAry[$i][5])){
                                    $mdbMail = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][5]);
								}
								$mdbDistrict = "";
			                    if(isset($spreadSheetAry[$i][6])){
                                    $mdbDistrict = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][6]);
								}
								$mdbCity = "";
			                    if(isset($spreadSheetAry[$i][7])){
                                    $mdbCity = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][7]);
								}
								$mdbArea = "";
			                    if(isset($spreadSheetAry[$i][8])){
                                    $mdbArea = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][8]);
								}				
								$mdbStreet = "";
			                    if(isset($spreadSheetAry[$i][9])){
                                    $mdbStreet = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][9]);
								}
								$mdbuildNo = "";
			                    if(isset($spreadSheetAry[$i][10])){
                                    $mdbuildNo = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][10]);
								}
								$mdbextracode = "";
			                    if(isset($spreadSheetAry[$i][11])){
                                    $mdbextracode = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][11]);
								}
								$mdbziPcode = "";
			                    if(isset($spreadSheetAry[$i][12])){
                                    $mdbziPcode = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][12]);
								}
								$mdbLsname = "";
			                    if(isset($spreadSheetAry[$i][13])){
                                    $mdbLsname = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][13]);
								}
								$mdbLsnumber = "";
			                    if(isset($spreadSheetAry[$i][14])){
                                    $mdbLsnumber = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][14]);
								}
								
								$mdbLsstatus = "";
			                    if(isset($spreadSheetAry[$i][15])){
                                    $mdbLsstatus = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][15]);
								}
								
								$mdbLsdate = "";
			                    if(isset($spreadSheetAry[$i][16])){
                                    $mdbLsdate = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][16]);
								}
								
							
								$mdbName      = mdSTRclean($mdbName);
								$mdbCode      = mdSTRclean($mdbCode);
								$mdbPhone     = mdSTRclean($mdbPhone);
								$mdbMail      = mdSTRclean($mdbMail);
								$mdbDistrict  = mdSTRclean($mdbDistrict);
								$mdbCity      = mdSTRclean($mdbCity);
								$mdbArea      = mdSTRclean($mdbArea);
								$mdbStreet    = mdSTRclean($mdbStreet);
								$mdbuildNo    = mdSTRclean($mdbuildNo);
								$mdbextracode = mdSTRclean($mdbextracode);
								$mdbziPcode   = mdSTRclean($mdbziPcode);
								$mdbLsname    = mdSTRclean($mdbLsname);
								$mdbLsnumber  = mdSTRclean($mdbLsnumber);
								$mdbLsstatus  = mdSTRclean($mdbLsstatus);
								$mdbLsdate    = mdSTRclean($mdbLsdate);
								
                                if($mdbMail == "")
									$mdbMail = "mdclub_".$mdbPhone."@gmail.com";
								
								if($mdbCode != "BrokerType_Individual")
									if($mdbGPhone != "")
									    $mdbPhone = $mdbPhone."|".$mdbGPhone;
								
								if($mdbMail != "shit")
								{
									$tb = " tb_mdtable ";
									$tv = " MAX(mdID) as mdID ";
									$tw = " LIMIT 1 ";
									$checkDATA = $stDBss->CheckDATA($tv,$tb,$tw);
									$checkROWs = mysqli_fetch_assoc($checkDATA);
									$mdIDs      = $checkROWs['mdID'];
									
									$mdID = $mdIDs + 1;
									$tbs = " tb_mdtable(mdID,mdbName,mdbCode,mdbPhone,mdbMail,mdbCountry,mdbDistrict,mdbCity,mdbArea,
									                    mdbStreet,mdbuildNo,mdbextracode,mdbziPcode,mdbLsname,mdbLsnumber,mdbLsstatus,mdbLsdate,
														mdbLAT,mdbLNG) 
									         VALUES('$mdID','$mdbName','$mdbCode','$mdbPhone','$mdbMail','$mdbCountry','$mdbDistrict','$mdbCity','$mdbArea',
									                '$mdbStreet','$mdbuildNo','$mdbextracode','$mdbziPcode','$mdbLsname','$mdbLsnumber','$mdbLsstatus','$mdbLsdate',
													'','') ";
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
		
		if($mdAction == "mDFeeds")
		{
			$mdResult = 0;
			
			$md = $_POST['md'];
			if($md == "transfer")
			{
				$mdDoset = $_POST['mdUPLOADoset'];
			    $mdDRows = $_POST['mdUPLOADRows'];
			
			    $mdDosts = ($mdDoset - 1) * $mdDRows;
			
			    $mddist = array("منطقة","منطقه");
			
			    $tb = " tb_mdtable ";
			    $tv = " * ";
			    $tw = " AND mdbLAT !='0' 
				        AND mdbstatus = '1' ";
			    $mdORDeRs = " ORDER BY mdID ASC 
			                  LIMIT $mdDosts,$mdDRows ";
			
			    $tws = $tw.$mdORDeRs;
			    $startDATA = $stDBss->CheckDATA($tv,$tb,$tws);
			    if(mysqli_num_rows($startDATA) > 0)
			    {
				    foreach($startDATA as $mdROWs)
				    {
					    $mdID         = $mdROWs['mdID'];
					    $mdbName      = $mdROWs['mdbName'];
					    $mdbCode      = $mdROWs['mdbCode'];
					    $mdbPhone     = $mdROWs['mdbPhone'];
					    $mdbMail      = $mdROWs['mdbMail'];
					    $mdbCountry   = $mdROWs['mdbCountry'];
					    $mdbDistrict  = $mdROWs['mdbDistrict'];
					    $mdbCity      = $mdROWs['mdbCity'];
					    $mdbArea      = $mdROWs['mdbArea'];
					    $mdbStreet    = $mdROWs['mdbStreet'];
					    $mdbuildNo    = $mdROWs['mdbuildNo'];
					    $mdbextracode = $mdROWs['mdbextracode'];
					    $mdbziPcode   = $mdROWs['mdbziPcode'];
					    $mdbLAT       = $mdROWs['mdbLAT'];
					    $mdbLNG       = $mdROWs['mdbLNG'];
					 
					    $mdbLsname   = $mdROWs['mdbLsname'];
					    $mdbLsnumber = $mdROWs['mdbLsnumber'];
					    $mdbLsstatus = $mdROWs['mdbLsstatus'];
					
					    $mdbLsdate   = $mdROWs['mdbLsdate'];
					
					    $mdCode      = $mdGCode."-".rand(999999, 111111);
					
					    //$mdbDistrict = str_replace($mddist,"",$mdbDistrict);
					
					    $mdUSName    = mdFINDusername($mdbMail);
					    $mdfakePASS  = "";
					    $mdencPass   = rand(0000,9999);
					    $mdIRlUser   = "";
					
					    $mdbAddress  = $mdbArea." ".$mdbStreet;
					
					    $mdUSTTYPe   = "";
					
					    $mdUSTTYPe = "Individual Broker";
					    if($mdbCode == "BrokerType_Office")
					    {
						    $mdUSTTYPe = "Office Broker";
						}
					
					    $tbb = " tb_signups ";
			            $tvb = " signup_id ";
			            $twb = " AND user_email = '$mdbMail' ";
			            $mdORDeRbs = " LIMIT 1 ";
			
			            $twbs = $twb.$mdORDeRbs;
			            $startBDATA = $stDBss->CheckDATA($tvb,$tbb,$twbs);
					    if(mysqli_num_rows($startBDATA) > 0)
					    {
							$mdResult = 3;
							$tbUSR = " tb_business ";
							$tvUSR = " a_latitude = '$mdbLAT', 
							           a_longitude = '$mdbLNG' ";
							$twUSR = " AND a_email='$mdbMail' ";
							$UPDateDATA = $stDBss->UPDateDATA($tbUSR,$tvUSR,$twUSR);
							if($UPDateDATA)
							{
								$mdResult = 1.5;
								$tbUSRs = " tb_mdtable ";
							    $tvUSRs = " mdbstatus = '2' ";
							    $twUSRs = " AND mdbMail='$mdbMail' ";
							    $UPDateDATAs = $stDBss->UPDateDATA($tbUSRs,$tvUSRs,$twUSRs);
								if($UPDateDATAs)
								    $mdResult = 2.5; 
							} 
						}
					    else
					    {
						    $tbRN = " tb_signups(user_login, user_email, active, activation_key) 
						              VALUES('$mdUSName', '$mdbMail', '0', '$mdCode') ";
						
						    $CNUser = $stDBss->CreateDATA($tbRN);
						    if($CNUser)
						    {
							    $tbRN = " tb_users(user_login, user_pass, user_nicename, user_email, user_url, user_activation_key, user_status, display_name,user_country,user_business_name,is_user_type,is_reg_way,isRealUser) 
						                  VALUES('$mdUSName', '$mdfakePASS', '$mdUSName', '$mdbMail', '', '','0' , '$mdbName','$mdbCountry','$mdbName','$mdUSTTYPe','mdtable','$mdIRlUser') ";
						
						        $CNUser = $stDBss->CreateDATA($tbRN);
						        if($CNUser)
							    {
								    $tbRN = " users(email,password) 
						                      VALUES('$mdbMail', '$mdencPass') ";
						
						            $CNUser = $stDBss->CreateDATA($tbRN);
								    if($CNUser)
								    {
									    $tb = " tb_users ";
				                        $tv = " * ";
				                        $tw = " AND user_email='$mdbMail' ";
				
				                        $mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
									    $mdQRWOs = mysqli_fetch_assoc($mdQuery);
									
									    $mdReGID = $mdQRWOs['ID'];
									    $mdReGTB = $mdQRWOs['is_user_type'];
									
									    if($mdReGTB == "Customer")
				                        {
					                        $stDBss->mdAcustTOvisitors($mdReGID,$mdbMail);
										}
				                        else
				                        {
					                        $stDBss->mdtvMaGazines($mdReGID,$mdbName);
					                        $stDBss->mdAcustTOvisitors($mdReGID,$mdbMail);
										}
				
									    $tbRN = " tb_business(a_name, a_email, a_user, a_country,a_city,a_district,a_town,a_county,a_address,a_compound,a_latitude,a_longitude,a_establish_date,a_ads_update) 
						                          VALUES('$mdbName', '$mdbMail', '$mdReGID', '$mdbCountry','$mdbCity','$mdbDistrict','$mdbCity','$mdbArea','$mdbAddress','$mdbuildNo','$mdbLAT','$mdbLNG','$mdResDate','9') ";
						
						                $CNUsers = $stDBss->CreateDATA($tbRN);
									    if($CNUsers)
										{
											$mdResult = 1.3;
											$tbUSRs = " tb_mdtable ";
							                $tvUSRs = " mdbstatus = '3' ";
							                $twUSRs = " AND mdbMail='$mdbMail' ";
							                $UPDateDATAs = $stDBss->UPDateDATA($tbUSRs,$tvUSRs,$twUSRs);
								            if($UPDateDATAs)
								                $mdResult = 1;
										}
									    else
									    {
										    $mdResult = 2;
										}
									}
								}
							}
							
						}
					
					}
				}
				else
				{
					$mdResult = 4;
				}
			
			    echo $mdResult;
			    exit();
			}
			
			if($md == "meta")
			{
				$mdKND = $_POST['mdKND'];
				if($mdKND == "contact")
				{
					$mdcount = 0;
					$mdDoset = $_POST['mdUPLOADoset'];
			        $mdDRows = $_POST['mdUPLOADRows'];
			
			        $mdDosts = ($mdDoset - 1) * $mdDRows;
				
					$tb = " tb_users ";
				    $tv = " user_email,ID ";
				    $tw = " AND is_reg_way = 'mdtable' ";
				
				    $mdORDeRs = " ORDER BY ID ASC 
					              LIMIT $mdDosts,$mdDRows";
					
					$tWHeRs = $tw.$mdORDeRs;
				    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tWHeRs);
				    if(mysqli_num_rows($mdQuery) > 0)
				    foreach($mdQuery as $mdQRWOs)
				    {
						$mdcount++;
					    $mdReGID = $mdQRWOs['ID'];
					    $mdRMail = $mdQRWOs['user_email'];
					
					    $tbm = " tb_mdtable ";
				        $tvm = " mdbMail,mdbPhone ";
				        $twm = " AND mdbMail ='$mdRMail' LIMIT 1";
					    $mdtQuer = $stDBss->CheckDATA($tvm,$tbm,$twm);
					    if(mysqli_num_rows($mdtQuer) > 0)
					    {
							$mdResult = 6; 
						    $mdtROWs  = mysqli_fetch_assoc($mdtQuer);
						    $mdbPhone = $mdtROWs['mdbPhone'];
						
						    $tbs = " tb_business ";
				            $tvs = " a_id,a_email ";
				            $tws = " AND a_email ='$mdRMail' LIMIT 1";
					        $mdBSQ = $stDBss->CheckDATA($tvs,$tbs,$tws);
						    if(mysqli_num_rows($mdBSQ) > 0)
						    {
							    $mdBSROWs = mysqli_fetch_assoc($mdBSQ);				
							    $mdBSSGID = $mdBSROWs['a_id'];
								
								$mdbPhones = "";
								$ebsWHats  = "";
								$ebsMobile = $mdbPhone;
								$ebsTel    = $mdbPhone;
								
								if(strpos($mdbPhone,"|") != false)
								{
									$mdbPhones  =  explode("|",$mdbPhone);
									$ebsMobile  = $mdbPhones[0];
									$ebsTel     = $mdbPhones[1];
								}
										
								$ebsMobile  = trim($ebsMobile);
								$ebsTel     = trim($ebsTel);
										
								if(!empty($ebsTel))
									$ebsTel = "966".$ebsTel;
								if(!empty($ebsMobile))
									$ebsMobile = "966".$ebsMobile;
										
								$ebsWHats = $ebsMobile;
								
								$tblDLT    = " tb_business_meta ";
			                    $whereDLT  = " AND parent_id ='$mdBSSGID' 
							                   AND s_user_id ='$mdReGID' ";
			                    $clubGENERALdltInfo = $stDBss->DELEteDATA($tblDLT,$whereDLT);
			  
			                    $partOne = array("b_tel"=>$ebsTel,"b_mobile"=>$ebsMobile,"b_whatsapp"=>$ebsWHats); 
								
								$mdcounter = 0;
								foreach($partOne as $key=>$value)
	                            {
									$mdcounter++;
									$mdResult = 5;
									if(!empty($value))
									{
										$mdResult = 7; 
										$tblss    = " tb_business_meta(item_key,item_value,parent_id,s_user_id)
												      VALUES('$key','$value','$mdBSSGID','$mdReGID')";
									    $clbvGENERALedtInfo = $stDBss->CreateDATA($tblss);
										if($clbvGENERALedtInfo)
					                    {
											$mdResult = 2;
											if($mdcounter == 3)
											{
												$tbUSR = " tb_users ";
											    $tvUSR = " is_reg_way = 'mdUP'";
											    $twUSR = " AND ID='$mdReGID' ";
									            $UPDateDATA = $stDBss->UPDateDATA($tbUSR,$tvUSR,$twUSR);
											    if($UPDateDATA)
												    $mdResult = 1; 
												
											}
											
										} 
									}
								}
							}
						}
					    else
					    {
						    $mdResult = 3; 
						}
						
						if($mdcount > 5000)
							break;
					}
					else
					{
						$mdResult = 4;
					}
					
					echo $mdResult;
					exit();
				}
				
				if($mdKND == "mdLicense")
				{
					$mdcount = 0;
					$mdDoset = $_POST['mdUPLOADoset'];
			        $mdDRows = $_POST['mdUPLOADRows'];
			
			        $mdDosts = ($mdDoset - 1) * $mdDRows;

					$tb = " tb_users ";
				    $tv = " user_email,ID ";
				    $tw = " AND is_reg_way = 'mdUP' ";
				
				    $mdORDeRs = " ORDER BY ID ASC 
					              LIMIT $mdDosts,$mdDRows";
					
					$tWHeRs = $tw.$mdORDeRs;
				    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tWHeRs);
				    if(mysqli_num_rows($mdQuery) > 0)
				    foreach($mdQuery as $mdQRWOs)
				    {
					    $mdReGID = $mdQRWOs['ID'];
					    $mdRMail = $mdQRWOs['user_email'];
					
					    $mdKeY = "BLicense";
						
							$tbm = " tb_mdtable ";
				            $tvm = " mdID,mdbMail,mdbuildNo,mdbextracode,mdbziPcode,mdbLsname, 
							         mdbLsnumber,mdbLsstatus,mdbLsdate ";
				            $twm = " AND mdbMail ='$mdRMail' LIMIT 1";
					        $mdtQuers = $stDBss->CheckDATA($tvm,$tbm,$twm);
							if(mysqli_num_rows($mdtQuers) > 0)
							{
								$mdtROWss = mysqli_fetch_assoc($mdtQuers);
								$mdResult = 5;
								$mdID         = $mdtROWss['mdID'];
					            $mdbMail      = $mdtROWss['mdbMail'];
					            $mdbuildNo    = $mdtROWss['mdbuildNo'];
					            $mdbextracode = $mdtROWss['mdbextracode'];
					            $mdbziPcode   = $mdtROWss['mdbziPcode'];
								$mdbLsname    = $mdtROWss['mdbLsname'];
					            $mdbLsnumber  = $mdtROWss['mdbLsnumber'];
					            $mdbLsstatus  = $mdtROWss['mdbLsstatus'];
					            $mdbLsdate    = $mdtROWss['mdbLsdate'];

								$tbs = " tb_business ";
				                $tvs = " a_id ";
				                $tws = " AND a_email ='$mdRMail'
								         LIMIT 1";
					            $mdBSQ = $stDBss->CheckDATA($tvs,$tbs,$tws);
						        if(mysqli_num_rows($mdBSQ) > 0)
								{
									$mdcounter = 0;
									$mdResult = 2;
									$mdBSROWs = mysqli_fetch_assoc($mdBSQ);				
							        $mdBSSGID = $mdBSROWs['a_id'];
									
									$tblDLT    = " tb_users_meta ";
			                        $whereDLT  = " AND mteParent ='$mdRMail' ";
			                        $clubGENERALdltInfo = $stDBss->DELEteDATA($tblDLT,$whereDLT);
			  
									$metaLicense = array("B_License"=>$mdbLsname,"B_Lsnumber"=>$mdbLsnumber,"B_Lstatus"=>$mdbLsstatus,"B_Lsdate"=>$mdbLsdate,"B_LsziPcode"=>$mdbziPcode,"B_LseXcode"=>$mdbextracode,"B_LsBnumber"=>$mdbuildNo); 
								    foreach($metaLicense as $mtKind=>$mtVALUe)
									{
										$mdcounter++;
										$tbmeta    = " tb_users_meta(mtKeY,mtKind,mtVALUe,mteParent,mtIUParent,mtIBParent)
												       VALUES('$mdKeY','$mtKind','$mtVALUe','$mdRMail','$mdReGID','$mdBSSGID')";
									    $metaDATA = $stDBss->CreateDATA($tbmeta);
									    if($metaDATA)
									    {
											if($mdcounter == 7)
											{
												$tbUSR = " tb_users ";
											    $tvUSR = " is_reg_way = 'mdUP0'";
											    $twUSR = " AND ID='$mdReGID' ";
									            $UPDateDATA = $stDBss->UPDateDATA($tbUSR,$tvUSR,$twUSR);
											    if($UPDateDATA)
												    $mdResult = 1; 
												
											}
										}
									}
								}
							}
							else
							{
								$mdResult = 6;
							}
					}
					else
					{
						$mdResult = 4;
					}
					
					echo $mdResult;
					exit();
				}
				
			}
		
		    if($md == "Geocode")
			{	
                $mdcount = 0;
				$mdDoset = $_POST['mdUPLOADoset'];
			    $mdDRows = $_POST['mdUPLOADRows'];
			
			    $mdDosts = ($mdDoset - 1) * $mdDRows;
				
				$tb = " tb_mdtable ";
			    $tv = " * ";
			    $tw = " AND mdbLAT !='0' ";
			    $mdORDeRs = " ORDER BY mdID ASC 
			                  LIMIT $mdDosts,$mdDRows ";
			
			    $tws = $tw.$mdORDeRs;
			    $startDATA = $stDBss->CheckDATA($tv,$tb,$tws);
			    if(mysqli_num_rows($startDATA) > 0)
			    {
				    foreach($startDATA as $mdROWs)
					{
						$mdResult = 2;
						$mdbMail      = $mdROWs['mdbMail'];
					    $mdbDistrict  = $mdROWs['mdbDistrict'];
					    $mdbCity      = $mdROWs['mdbCity'];
						
						$tbUSRs = " tb_business ";
						$tvUSRs = " a_city='$mdbCity', 
						            a_district='$mdbDistrict' ";
						$twUSRs = " AND a_email='$mdbMail' ";
						$UPDateDATAs = $stDBss->UPDateDATA($tbUSRs,$tvUSRs,$twUSRs);
						if($UPDateDATAs)
							$mdResult = 1;
					}
				}
				else
				{
					$mdResult = 4;
				}
				
				echo $mdResult;
				exit();
			}
		}
	}
	else
	{
		echo "error";
		exit();
	}

?>