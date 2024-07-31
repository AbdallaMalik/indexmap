<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$mdGDate    = date("Y-m-d");
	$mdGTDate   = date("Y-m-d H:i:s");
	
    $mdSUSerID   = 0;
	$mdSUSerName = "";
	$mdSUSerMail = "";
	$mdSUSerTYPE = "";
	
	$mdGVUsion  = $stDBCONST->getmdVUsion("mdUser");
	if($mdGVUsion != "false")
	{
		$mdSUSerID   = $mdGVUsion['ID'];
		$mdSUSerName = $mdGVUsion['display_name'];
		$mdSUSerMail = $mdGVUsion['user_email'];
		$mdSUSerTYPE = $mdGVUsion['is_user_type'];
	}
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		
		if($dfAction == "mdTBLeAction")
		{
			$dfKNd = $_POST['dfKNd'];
			$fm    = $_POST['fm'];
			$mdID  = $_POST['mdID'];
			
			if($mdGVUsion != "false")
			if($dfKNd == "mdcontrol")
			{
				$mdKNd = $_POST['mdKNd'];
				
				$mdResults = 0;
				$mdRmss    = "undefined error !";
				if($mdKNd == "InPro")
				{
					if($fm == "edt" || $fm == "add")
					{
						$mdInName       = $_POST['mdInName'];
						$mdInPurPose    = $_POST['mdInPurPose'];
						$mdInTYPE       = $_POST['mdInTYPe'];
						$mdInPID        = $_POST['mdInPID'];
						
						$mdInCountry    = $_POST['mdInCountry'];
						$mdInCity       = $_POST['mdInCity'];
						$mdInDistrict   = $_POST['mdInDistrict'];
						$mdInArea       = $_POST['mdInArea'];
						$mdInAddress    = $_POST['mdInAddress'];
						$mdInComPound   = $_POST['mdInComPound'];
						$mdInPName      = $_POST['mdInPName'];
						
						$mdInSize       = $_POST['mdInSize'];
						$mdInSizeFT     = $_POST['mdInSizeFT'];
						$InPrice        = $_POST['mdInPrice'];
						$InPricePFT     = $_POST['mdInPricePFT'];
						$InPricePMT     = $_POST['mdInPricePMT'];
						
						$mdInBEDs       = $_POST['mdInBEDs'];
						$mdInPATHs      = $_POST['mdInPATHs'];
						$mdInLink       = $_POST['mdInLink'];
						$mdInUnit       = $_POST['mdInUnit'];
						$mdInDateROsale = $_POST['mdInDateROsale'];
						
						$mdInLAT        = $_POST['mdInLAT'];
						$mdInLNG        = $_POST['mdInLNG'];
						$mdInOwnerId    = 0;
						
						$mdInKEY        = 2;
						
						$mdscurrencY    = $_POST['mdFORMscurrencY'];
						$mdsSizeVLUe    = $_POST['mdFORMsSizeVLUe'];
						
						$mdInstatus     = $_POST['mdInstatus'];
						$mdInPName      = $_POST['mdInPName'];
						$mdInPROID      = $_POST['mdInPROID'];
						$mdInRKind      = $_POST['mdInRKind'];
						$mdInDateOBuild = $_POST['mdInDateOBuild'];
						
						$mdInDateOBuild = date("Y-m-d",strtotime($mdInDateOBuild));
						
						$mdPHUPloadedIms = $_POST['this_PHUPloadedIms'];
						$mdPHUPloadedIfm = $_POST['this_PHUPloadedIfm'];
						
						$mdInPrice    = mdPROcurrencYies($InPrice,$mdscurrencY,2);
						$mdInPricePFT = mdPROcurrencYies($InPricePFT,$mdscurrencY,2);
						$mdInPricePMT = mdPROcurrencYies($InPricePMT,$mdscurrencY,2);
						
						$mdUPDate = "";
						$mdUPDates = "";
						
						if($fm == "edt")
						{
							$tb = " tb_IndexmaPs ";
							
						    $tv = " InPurPose='$mdInPurPose', InTYPE='$mdInTYPE', InPID='$mdInPID', 
						            InCountry='$mdInCountry', InCity='$mdInCity', InDistrict='$mdInDistrict',
								    InArea='$mdInArea', InAddress='$mdInAddress', InComPound='$mdInComPound',
								    InProjectName='$mdInPName', InSize='$mdInSize', InSizeFT='$mdInSizeFT',
								    InPrice='$mdInPrice', InPricePFT='$mdInPricePFT', InPricePMT='$mdInPricePMT', 
								    InBEDs='$mdInBEDs', InPATHs='$mdInPATHs', InLink='$mdInLink', InUnit='$mdInUnit', 
								    InDateROsale='$mdInDateROsale', InLAT='$mdInLAT', InLNG='$mdInLNG', 
								    InKEY='$mdInKEY' ";
						    $tw = " AND InID='$mdID' ";
						
						    $mdUPDates = $stDBss->UPDateDATA($tb,$tv,$tw);
							
						}
						elseif($fm == "add")
						{
							$mdInKEY        = 1;
							$mdInUPD        = 2;
							$tb = " tb_IndexmaPs(InName,InPurPose,InCountry,InCity,InDistrict,InArea,InAddress,
									             InComPound,InSize,InSizeFT,InPrice,InPricePFT,InPricePMT,	
												 InLAT,InLNG,InProjectName,InPATHs,InBEDs,InTYPE,InLink,InFileID,
												 InUPD,InPID,InUnit,InDateROsale,InCNCYName,InOwnerId ) 
									VALUES('','$mdInPurPose','$mdInCountry','$mdInCity','$mdInDistrict','$mdInArea','$mdInAddress',
									       '$mdInComPound','$mdInSize','$mdInSizeFT','$mdInPrice','$mdInPricePFT','$mdInPricePMT',	
										   '$mdInLAT','$mdInLNG','$mdInPName','$mdInPATHs','$mdInBEDs','$mdInTYPE','$mdInLink','',
										   '$mdInUPD','$mdInPID','$mdInUnit','$mdInDateROsale','','$mdSUSerID') ";
														 
							$mdUPDates = $stDBss->CreateDATA($tb);
						}
						
						if($mdUPDates)
						{
							if($fm == "add")
							{		   
								$tbPRs = " tb_properties(title,description,size,sizeTYPE,rooms,paths,beds,kitchens,
								                         state,city,town,address,PricePERm,PricePERf,
								                         price,currency,latitude,longitude,owner_id,establishDate)
										   VALUES('$mdInName','','$mdInSize','$mdsSizeVLUe','0','$mdInPATHs','$mdInBEDs','0', 
										          '','$mdInCity','$mdInDistrict','$mdInAddress','$mdInPricePMT','$mdInPricePFT',
										          '$mdInPrice','USD','$mdInLAT','$mdInLNG','$mdSUSerID','$mdInDateOBuild')";			   
											   
		                        $mdUPDate = $stDBss->CreateDATA($tbPRs);
								if($mdUPDate)
								{
									$tb = " tb_properties ";
				                    $tv = " id ";
				                    $tw = " AND owner_id='$mdSUSerID' 
			                                ORDER BY id DESC LIMIT 1 ";
				
				                    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
									$mdRWs   = mysqli_fetch_assoc($mdQuery);
			                        $mdPId   = $mdRWs['id'];
					  
					                $tbUP   = " tb_properties ";
					                $tvUP   = " orginParent='$mdPId' ";
					                $twUP   = " AND id='$mdPId' ";
					                $mdUPDate   = $stDBss->UPDateDATA($tbUP,$tvUP,$twUP);
					  
					                $tb = " tb_IndexmaPs ";
				                    $tv = " InID ";
				                    $tw = " AND InOwnerId='$mdSUSerID' 
			                                ORDER BY InID DESC LIMIT 1 ";
				
				                    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
									$mdRWs   = mysqli_fetch_assoc($mdQuery);
			                        $mdxPId  = $mdRWs['InID'];
									
					                $tbUP   = " tb_IndexmaPs ";
					                $tvUP   = " InKEY='$mdPId' ";
					                $twUP   = " AND InID='$mdxPId' ";
					                $mdUPDate   = $stDBss->UPDateDATA($tbUP,$tvUP,$twUP);
									
		                            $tbs  = " tb_pro_copy(copy_status,copy_no,copy_country,proId)
									          VALUES('0','1','$mdInCountry','$mdPId') ";
		                            $mdUPDate = $stDBss->CreateDATA($tbs);
									
									$tbs  = " tb_users_properties(user_id,pro_id,proStatusTYPE,pro_parent_id,user_type,
					                                              pro_category,pro_type,pro_status,pro_country,created_on)
									          VALUES('$mdSUSerID','$mdPId','$mdInstatus','$mdInPROID','$mdSUSerTYPE',
				                                     '$mdInTYPE','$mdInPurPose','$mdInstatus','$mdInCountry','$mdGTDate') ";
		                            $mdUPDate = $stDBss->CreateDATA($tbs);
					                if($mdUPDate)
									{
										if(!empty($mdPHUPloadedIfm))
										{
											$mdPHUPloadedIfm = explode(",",$mdPHUPloadedIfm);
											$PhotosURL       = $mdPHUPloadedIfm[0];
											
											$tkv  = " tb_properties_images(image_url,image_meta,image_status,image_parent_id) 
										              VALUES('$PhotosURL','property','thump','$mdPId') ";
					                        $mdUPDates = $stDBss->CreateDATA($tkv);
										}
										
										if(!empty($mdPHUPloadedIms))
										{
											$mdPHUPloadedIms = explode(",",$mdPHUPloadedIms);
											
											foreach($mdPHUPloadedIms as $mdImURL)
											{
												$mdImURL = trim($mdImURL);
												if(!empty($mdImURL))
												{
													$tkv  = " tb_properties_images(image_url,image_meta,image_status,image_parent_id) 
										                      VALUES('$mdImURL','property','gallery','$mdPId') ";
					                                $mdUPDates = $stDBss->CreateDATA($tkv);
												}
											}
											
										}
										
									}
								}
							}
							elseif($fm == "edt")
							{
								$mdResults = 5;
							}
							
							if($mdUPDate)
						    {
							    $mdResults = 1;
							
							    if($fm == "edt")
							        $mdRmss    = "UPdated successfully";
							    elseif($fm == "add")
							        $mdRmss    = "Added successfully";
							}
						    else
						    {
							    $mdResults = 2;
							    $mdRmss    = "unknown error";
							}
						}
						else
						{
							$mdResults = 4;
							$mdRmss    = "unknown error";
						}
						
						
						
						$mdResults = $mdResults."|".$mdRmss;
						echo $mdResults;
					    exit();
					}
						    
					if($fm == "dlt")
					{
						$tb = " tb_IndexmaPs ";
						$tw = " AND InID='$mdID' ";
						$mdUPDate = $stDBss->DELEteDATA($tb,$tw);
						if($mdUPDate)
						{
							$mdResults = 1;
							$mdRmss    = "Deleted successfully";
						}
						else
						{
							$mdResults = 2;
							$mdRmss    = "unknown error";
						}
						
						$mdResults = $mdResults."|".$mdRmss;
						echo $mdResults;
						
						exit();
					}
					
					if($fm == "share")
					{
						
						$mdResults = 0;
						$mdRmss    = "not ready";
						
						$mdResults = $mdResults."|".$mdRmss;
						echo $mdResults;
						
						exit();
					}
				}
			}
		    else
			{
				$mdResults = 0;
				$mdRmss    = "you are not logged in!";
						
				$mdResults = $mdResults."|".$mdRmss;
				echo $mdResults;
				exit();
			}
		}
	
	    if($dfAction == "mdTv")
		{
			$dfKNd = $_POST['dfKNd'];
			$fm    = $_POST['fm'];
			$mdID  = $_POST['fmId'];
			
			if($dfKNd == "mdGTv")
			{
				$tBLe  = " tb_properties 
						   LEFT JOIN tb_users_properties
						   ON tb_properties.id = tb_users_properties.pro_id
						   AND tb_properties.owner_id = tb_users_properties.user_id";
				
				$tVLUe = " * ";
				                    
				$tWHRe = " AND tb_properties.id = tb_users_properties.pro_id 
						   AND tb_properties.owner_id = tb_users_properties.user_id";
									
				$tORDer = " ORDER BY tb_properties.id DESC 
		                    LIMIT 0,50 ";		
				
				$tWHRes = $tWHRe.$tORDer;
				$mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
									
			    if(mysqli_num_rows($mdQuery) > 0)
				{
					dhPROtYMAInTvINDExs($mdQuery);
				}
				
				exit();
			}
		}
	}
	else
	{
		echo "error";
		exit();
	}