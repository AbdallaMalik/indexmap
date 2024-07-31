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
	$mdWEBTITLe = $stDBCONST->getstWEBTITLE();
	$mdGCode    = $stDBCONST->getmdVUsion("mdGCode");
	$mdGMail    = $stDBCONST->getmdVUsion("mdGMail");
			
	$mdSUSerID  = 0;
	
	$mdGVUsion  = $stDBCONST->getmdVUsion("mdUser");
	if($mdGVUsion != "false")
	{
		$mdSUSerID = $mdGVUsion['ID'];
	}
	
	//tb_IndexmaPs_meta
	//$mdTBconnct = $stDBss->mdTBconnect("root","bsV@1234Vsb","cclub_agents_club");
	//$mdTBconnct = $stDBss->mdTBconnect("cllubb_bright","bright@91mD#5","cllubb_agents_club");
	
	/*
	unset($_SESSION['mCCLUBsValidUser']);
	unset($_SESSION['mCCLUBsSinfo']);
    unset($_SESSION['mCCLUBsSemail']);
    unset($_SESSION['mCCLUBsValidUser']);
	unset($_SESSION['FILTERheaderDROPDOWNCountries']);
	*/
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['mdAction']))
	{
		$mdResults = "";
		$mdResult  = 0;
		$mdmass    = "unknown error!";
		
		$mdGdate   = date("Y-m-d H:i:s");
		$mdResDate = date("Y-m-d");
		
		$mdAction  = $_POST['mdAction']; 
		if($mdAction == "mdReGPHP")
		{
			
			$md      = $_POST['md'];
			$mdclass = $_POST['mdclass'];
			$mobileSESSION[] = array();
			
			if($md == "access")
			{
				unset($_SESSION['FILTERheaderDROPDOWNCountries']);
				$mdResult = 0;
				$mdmass   = "this user is not registered";
					
				$mdUserMAIL = $_POST['mdUserMAIL'];
				$mdUserPAss = $_POST['mdUserPAss'];
				
				$tb = " tb_signups ";
				$tv = " user_email, user_login, active ";
				$tw = " AND(user_login='$mdUserMAIL' OR user_email='$mdUserMAIL') ";
				
				$mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
				if(mysqli_num_rows($mdQuery) > 0)
				{
					$mdRQRWOs    = mysqli_fetch_assoc($mdQuery);
					$mdNUserMAIL = $mdRQRWOs['user_email']; 
					
					$tba = " users ";
				    $tva = " * ";
				    $twa = " AND email='$mdNUserMAIL' LIMIT 1 ";
				
				    $mdQuerya = $stDBss->CheckDATA($tva,$tba,$twa);
					$mdQRWOs  = mysqli_fetch_assoc($mdQuerya);
					
					$mdPassword = $mdQRWOs['password'];
					
					if(password_verify($mdUserPAss, $mdPassword))
					{
						$tbs = " tb_users ";
				        $tvs = " * ";
				        $tws = " AND user_email ='$mdNUserMAIL' LIMIT 1 ";
				
				        $mdQuerys = $stDBss->CheckDATA($tvs,$tbs,$tws);
					    $mdRWOs   = mysqli_fetch_assoc($mdQuerys);
						
						$mdUserst = $mdRWOs['user_status'];
						$mdUserct = $mdRWOs['user_country'];
						
						$_SESSION['FILTERheaderDROPDOWNCountries'] = $mdUserct;
						
						if($mdUserst == 8)
				        {
					        $mdResult = 8;
							$mdmass   = "this user is blocked";
						}
				        elseif($mdUserst == 7)
				        {
					        $mdResult = 7;
							$mdmass   = "this user is blocked";
						}
				        elseif($mdUserst == 6)
				        {
					        $_SESSION['mCCLUBsValidUser']  = $mdRWOs;
					        $mobileSESSION                 = $mdRWOs;
                            $mdResult = 1;
							$mdmass   = "done successfully";
						}
				        elseif($mdUserst == 1)
				        {
                            $_SESSION['mCCLUBsValidUser']  = $mdRWOs;
				            $mobileSESSION                 = $mdRWOs;
                            $mdResult = 1;
							$mdmass   = "done successfully";
						}
				        else
				        {
							$mdResult = 0;
						    $mdmass   = "error in sending verification required !";
							
					        $mdCode = $mdGCode."-".rand(999999, 111111);
							$md     = "activate";
							
							$tb = " tb_signups ";
							$tv = " active='0', 
							        activation_key='$mdCode' ";
							$tw = " AND(user_login='$mdUserMAIL' OR user_email='$mdUserMAIL') ";		
									
							$mdUPDate = $stDBss->UPDateDATA($tb,$tv,$tw);
					        if($mdUPDate)
					        {
								$subject = $mdWEBTITLe." | Verification Code";
                                $message = "Your verification code is : $mdCode";
                                $sender = "From: ".$mdGMail;
								
								$mSinfo = "before you can login , you need to confirm your email address via the email we just sent to you. - $mdNUserMAIL";
                                $_SESSION['mCCLUBsSinfo'] = $mSinfo;
                                $_SESSION['mCCLUBsSemail'] = $mdNUserMAIL;
                                $mdResult = 1;
								$mdmass   = "verification required !";
								
                                /*
                                $mdResult =5;								
						        if(mail($mdNUserMAIL, $subject, $message, $sender))
			                    {
                                    $mSinfo = "before you can login , you need to confirm your email address via the email we just sent to you. - $mdNUserMAIL";
                                    $_SESSION['mCCLUBsSinfo'] = $mSinfo;
                                    $_SESSION['mCCLUBsSemail'] = $mdNUserMAIL;
                                    $mdResult = 2;
								}
					            */
					
							}
                    
						}
					}
					
				}
				
				$mdResults = $mdResult."|".$md."|".$mdmass;
				
				echo $mdResults;
				exit();
			}
		
		    if($md == "create")
			{
				$mdUserMAIL    = $_POST['mdUserMAIL'];
				$mdUserPAss    = $_POST['mdUserPAss'];
				$mdUserTYPe    = $_POST['mdUserTYPe'];
				$mdUserFName   = $_POST['mdUserFName'];
				$mdUserLName   = $_POST['mdUserLName'];
				$mdUserName    = $_POST['mdUserName'];
				$mdUserRewaY   = $_POST['mdUserRewaY'];
				$mdUserCountrY = $_POST['mdUserCountrY'];
				$mdUserCitY    = $_POST['mdUserCitY'];
				$mdUserAddress = $_POST['mdUserAddress'];
				
				$mdUsrFName    = $mdUserFName." ".$mdUserLName;
				
				$mdRealUser  = rand().$mdUserName;
                $mdIRlUser   = password_hash($mdRealUser, PASSWORD_BCRYPT);
				
				if(!filter_var($mdUserMAIL,FILTER_VALIDATE_EMAIL))
                {
	                $mdResult = 6; 
					$mdmass   = "invalid email";
				}
                else if(!preg_match("/^[a-zA-Z0-9_]*$/",$mdUserName))
                {
	                $mdResult = 7; 
					$mdmass   = "invalid username";
				}
                else
                {
					$tb = " tb_signups ";
				    $tv = " user_email, user_login ";
				    $tw = " AND(user_login='$mdUserName' OR user_email='$mdUserMAIL') ";
				
				    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
				    if(mysqli_num_rows($mdQuery) > 0)
					{
						$mdRRows  = mysqli_fetch_assoc($mdQuery);
						$mdTUMail = $mdRRows['user_email'];
						$mdTUName = $mdRRows['user_login'];
						
						if($mdTUMail == $mdUserMAIL)
						{
							$mdResult = 2; 
					        $mdmass   = "this email exist !";
						}
						else
						{
							$mdResult = 7; 
					        $mdmass   = "this username exist !";
						}
					}
					else
					{
						$mdencPass   = password_hash($mdUserPAss, PASSWORD_BCRYPT);
		                $mdfakePASS  = "";
                        $mdCode      = $mdGCode."-".rand(999999, 111111);
						$md          = "activate";
						
						$tbRN = " tb_signups(user_login, user_email, active, activation_key) 
						          VALUES('$mdUserName', '$mdUserMAIL', '0', '$mdCode') ";
						
						$CNUser = $stDBss->CreateDATA($tbRN);
						if($CNUser)
						{
							$tbRN = " tb_users(user_login, user_pass, user_nicename, user_email, user_url, user_activation_key, user_status, display_name,user_country,user_business_name,is_user_type,is_reg_way,isRealUser) 
						              VALUES('$mdUserName', '$mdfakePASS', '$mdUserName', '$mdUserMAIL', '', '','0' , '$mdUsrFName','$mdUserCountrY','$mdUsrFName','$mdUserTYPe','$mdUserRewaY','$mdIRlUser') ";
						
						    $CNUser = $stDBss->CreateDATA($tbRN);
						    if($CNUser)
							{
								$tbRN = " users(email,password) 
						                  VALUES('$mdUserMAIL', '$mdencPass') ";
						
						        $CNUser = $stDBss->CreateDATA($tbRN);
								if($CNUser)
								{
									$tb = " tb_users ";
				                    $tv = " * ";
				                    $tw = " AND user_email='$mdUserMAIL' ";
				
				                    $mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
									$mdQRWOs = mysqli_fetch_assoc($mdQuery);
									
									$mdReGID = $mdQRWOs['ID'];
									$mdReGTB = $mdQRWOs['is_user_type'];
									
									if($mdReGTB == "Customer")
				                    {
					                    $stDBss->mdAcustTOvisitors($mdReGID,$mdUserMAIL);
									}
				                    else
				                    {
					                    $stDBss->mdtvMaGazines($mdReGID,$mdUsrFName);
					                    $stDBss->mdAcustTOvisitors($mdReGID,$mdUserMAIL);
									}
				
									$tbRN = " tb_business(a_name, a_email, a_user, a_country,a_city,a_latitude,a_longitude,a_establish_date) 
						                      VALUES('$mdUsrFName', '$mdUserMAIL', '$mdReGID', '$mdUserCountrY','$mdUserCitY','','','$mdResDate') ";
						
						            $CNUser = $stDBss->CreateDATA($tbRN);
									
									$mdResult = 2;
								    $mdmass   = "error in verification required !";
								
									if($CNUser)
									{
										
										$subject = $mdWEBTITLe." | Verification Code";
                                        $message = "Your verification code is : $mdCode";
                                        $sender = "From: ".$mdGMail;
								
								        $mSinfo = "before you can login , you need to confirm your email address via the email we just sent to you. - $mdUserMAIL";
                                        $_SESSION['mCCLUBsSinfo'] = $mSinfo;
                                        $_SESSION['mCCLUBsSemail'] = $mdUserMAIL;
										$_SESSION['FILTERheaderDROPDOWNCountries'] = $mdUserCountrY;
                                        $mdResult = 1;
								        $mdmass   = "verification required !";
								
                                        /*
                                        $mdResult = 4;
                                        $mdmass   = "error in verification required !";										
						                if(mail($mdUserMAIL, $subject, $message, $sender))
			                            {
                                            $mSinfo = "before you can login , you need to confirm your email address via the email we just sent to you. - $mdUserMAIL";
                                            $_SESSION['mCCLUBsSinfo'] = $mSinfo;
                                            $_SESSION['mCCLUBsSemail'] = $mdUserMAIL;
                                            $mdResult = 1;
										}
					                    */
									}
									
									
								}
							}
						}
						
					}
				}
				
				
				$mdResults = $mdResult."|".$md."|".$mdmass;
				
				echo $mdResults;
				exit();
			}
		
		    if($md == "activate")
			{
				$mdUserCode = $_POST['mdUserCode'];
				
				$mdUsMAIL = $stDBCONST->getmdVUsion("mdUMail");
				$mdUsINFO = $stDBCONST->getmdVUsion("mdUINfo");

				$mdResult = 0;
				$mdmass   = "activation code is not correct";
				
				$tb = " tb_signups ";
				$tv = " * ";
				$tw = " AND user_email = '$mdUsMAIL' 
				        AND activation_key = '$mdUserCode' ";
				
				$mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
				
				if(mysqli_num_rows($mdQuery) > 0)
				{
					$mdQRWOs = mysqli_fetch_assoc($mdQuery);
					
					$tb = " tb_users ";
					$tv = " user_status = '1' ";
					$tw = " AND user_email = '$mdUsMAIL' ";
							
					$mdUPDate = $stDBss->UPDateDATA($tb,$tv,$tw);
					
					if($mdUPDate)
					{
						$tb = " tb_signups ";
					    $tv = " active = '1', activated = '$mdGdate' ";
					    $tw = " AND user_email = '$mdUsMAIL' 
				                AND activation_key = '$mdUserCode' ";
							
					    $mdUPDate = $stDBss->UPDateDATA($tb,$tv,$tw);
						
						$mdResult = 1;
					    $mdmass   = "done successfully";
					
					    $md = "done";
					    unset($_SESSION['mCCLUBsSinfo']);
                        unset($_SESSION['mCCLUBsSemail']);
                        unset($_SESSION['mCCLUBsValidUser']);
					
					    $_SESSION['mCCLUBsValidUser'] = $mdQRWOs;
					}
					
				}
				
				$mdResults = $mdResult."|".$md."|".$mdmass;
				
				echo $mdResults;
				exit();
			}
		}
		elseif($mdAction == "mdPRcode")
		{
			$md = $_POST['md'];
			if($md == "mdsave")
			{
				$mdInPRoName    = trim(htmlspecialchars($_POST['mdInPRoName']));
				$mdInPRoDesc    = trim(htmlspecialchars($_POST['mdInPRoDesc']));
				$mdInPRoKnd     = $_POST['mdInPRoKnd'];
				$mdInPRostatus  = $_POST['mdInPRostatus'];
				$mdInPRoCountry = $_POST['mdInPRoCountry'];
				$mdInPRoCity    = trim(htmlspecialchars($_POST['mdInPRoCity']));
				$mdInPRoKeY     = $_POST['mdInPRoKeY']; 
				$mdInPRocomm    = $_POST['mdInPRocomm']; 
				
				$mdPRoID  = 0;
				$mdResult = 4;
			    $mdmass   = "unknown error!";
				
				$tb = " tb_projects ";
				$tv = " projectId ";
				$tw = " AND projectName='$mdInPRoName'
				        AND projectType='$mdInPRoKnd' 
						AND project_country='$mdInPRoCountry' 
						AND project_city='$mdInPRoCity' 
						AND projectOwner='$mdSUSerID' ";
				
				$mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
				if(!mysqli_num_rows($mdQuery) > 0)
				{
					$mdResult = 0;
					$mdmass   = "you are not logged in!";
					if($mdSUSerID != 0)
					{
						$mdResult = 2;
					    $mdmass   = "unknown error!";
						
						$tbRN = " tb_projects(projectName,projectDesc,projectType,projectStatus,
						                      project_country,project_city,pro_commision,projectOwner) 
						          VALUES('$mdInPRoName','$mdInPRoDesc','$mdInPRoKnd','$mdInPRostatus',
								         '$mdInPRoCountry','$mdInPRoCity','$mdInPRocomm','$mdSUSerID') ";
						
						$CNUser = $stDBss->CreateDATA($tbRN);
						if($CNUser)
						{
							$mdResult = 1;
					        $mdmass   = "done successfully!";
							
							$tbk = " tb_projects ";
				            $tvk = " projectId ";
				            $twk = " AND projectName='$mdInPRoName'
				                     AND projectType='$mdInPRoKnd' 
						             AND project_country='$mdInPRoCountry' 
						             AND project_city='$mdInPRoCity' 
						             AND projectOwner='$mdSUSerID' 
									 ORDER BY projectId DESC LIMIT 1 ";
				
				            $mdQuerYk = $stDBss->CheckDATA($tvk,$tbk,$twk);
							$mdROws   = mysqli_fetch_assoc($mdQuerYk);
							$mdPRoID  = $mdROws['projectId'];
						}
					}
				}
				else
				{
					$mdResult = 3;
					$mdmass   = "this Project already exist !";
				}
						
				$mdResults = $mdResult."|".$mdmass."|".$mdPRoID;
				
				echo $mdResults;
				exit();
			}
		}
		else
		{
			
			echo "error";
			exit();
		}
	}