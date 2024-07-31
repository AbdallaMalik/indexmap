<?php require_once('../../../mdDB/astinit.php');
      
	$smPATH = "../../../";
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$smURLPATH   = $stDBCONST->getsmURLPATH();
	$smURLPARENt = $stDBCONST->getsmURLPARENt();
	$mdDURLoGo   = $smURLPARENt."GAssets/icons/my-profile.png";
	
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
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		
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