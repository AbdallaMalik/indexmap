<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();

	$mdDURLoGo  = $smURLPARENt."GAssets/icons/my-profile.png";
	
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
	require_once($smPATH.'mdReQuests/mdReTVs/mdPHP/mdReQueries.php');
	
	if(isset($_POST['tfm']))
	{
		$tfm    = $_POST['tfm'];
		$mdResults = "";
		$mdResult  = 0;
		$mdmass    = "unknown error";
		
		if($tfm == "modalPHP")
		{
			$tmd    = $_POST['tmd'];
		    $tmodal = $_POST['tmodal'];
			if($tmd == "mdPROPiims")
			{
				$tmdact    = $_POST['tmdact'];
				
				if($tmdact == "remove")
				{
					$tmID = $_POST['tmID'];
					
					$tb = " tb_properties_images ";
					$tw = " AND image_id='$tmID' ";
					
					$mdExecute = $stDBss->DELEteDATA($tb,$tw);
					if($mdExecute)
					{
						$mdResult = 1;
						$mdmass = "Deleted Successfully";
					}
					
					$mdResults = $mdResult."|".$mdmass;
					echo $mdResults;
					exit();
				}
			
			    if($tmdact == "add")
				{
					$tmID     = $_POST['tmID'];
					$tmdVALUe = $_POST['tmdVALUe'];
					
					if(!empty($tmdVALUe))
					{
						$tmdVALUes = explode(",",$tmdVALUe);
											
						foreach($tmdVALUes as $mdImURL)
						{
							$mdImURL = trim($mdImURL);
							if(!empty($mdImURL))
							{
								$tkv  = " tb_properties_images(image_url,image_meta,image_status,image_parent_id) 
										  VALUES('$mdImURL','property','gallery','$tmID') ";
					            $mdUPDates = $stDBss->CreateDATA($tkv);
								
								if($mdUPDates)
								{
									$mdResult = 1;
									$mdmass   = "images added successfully";
								}
							}
						}
											
					}
					
					$mdResults = $mdResult."|".$mdmass;
					echo $mdResults;
					exit();
				}
			
			    if($tmdact == "edt")
				{
					$tmIDs    = $_POST['tmID'];
					
					$tmIDes   = explode(",",$tmIDs);
					$tmID     = $tmIDes[0];
					$mdPID    = $tmIDes[1];
					
					$tmdVALUe = $_POST['tmdVALUe'];
					$mdImURL  = "";
					
					if(!empty($tmdVALUe))
					{
						$tmdVALUes = explode(",",$tmdVALUe);
						$mdImURL   = $tmdVALUes[0];	
						if(!empty($mdImURL))
						{
							$mdImURL = trim($mdImURL);	
							$tb = " tb_properties_images ";
							$tv = " image_url='$mdImURL' ";
							$tw = " AND image_id='$tmID' ";
							
							$mdUPDates = $stDBss->UPDateDATA($tb,$tv,$tw);
						    if($mdUPDates)
							{
								$mdResult = 1;
								$mdmass   = "images added successfully";
							}
						}	
					}
					
					$mdResults = $mdResult."|".$mdmass."|".$mdPID."|".$tmID."|".$mdImURL;
					echo $mdResults;
					exit();
				}
			
			}
		}
	}
	else
	{
		echo "error";
		exit();
	}