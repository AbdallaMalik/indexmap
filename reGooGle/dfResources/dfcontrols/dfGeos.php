<?php require_once('../../../mdDB/astinit.php');
    
	$smPATH = "../../../";

    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	
	if(isset($_POST["dfGeActions"]))
	{
		$dfGeActions = $_POST["dfGeActions"];
		
		
		$dfResults = 0;
		if($dfGeActions == "freverseGeos")
		{
			$dfRes  = array();
			$dfData = array();
			
			$dfstartCNTYs = $_POST["dfstartCNTYs"];
			$dfstartORDs  = $_POST["dfstartORDs"];
			$dfstartOFFs  = $_POST["dfstartOFFs"];
			$dfstartROWs  = $_POST["dfstartROWs"];
    
			$dfstrtOFFs   = ($dfstartOFFs - 1) * $dfstartROWs;
			
			$dfstrtCNTYs  = "";
			if($dfstartCNTYs != "")
			{
				$dfstrtCNTYs = " AND InCountry='$dfstartCNTYs' ";
			}
			
			$tb = " tb_indexmaz ";
			$tv = " COUNT(*) as tno,InLNG,InLAT ";
			
			$dGQuerYs = " GROUP BY InLNG,InLAT 
					      ORDER BY tno $dfstartORDs 
					      LIMIT $dfstrtOFFs, $dfstartROWs ";

			$dfQuerYs = $dfstrtCNTYs;			  
	        $dfWHres  = " AND InLNG !='' AND InLAT !='' 
			              AND InUPD !='6' AND InCountry !='china' ";
			
			$tGWe = $dfWHres.$dfQuerYs.$dGQuerYs;
	        $fnAsCTsLcT = $stDBss->CheckDATA($tv,$tb,$tGWe);
			
			if(mysqli_num_rows($fnAsCTsLcT) > 0)
			foreach($fnAsCTsLcT as $dfROWs)
			{
				$InLNG   = $dfROWs["InLNG"];
				$InLAT   = $dfROWs["InLAT"];
				$dftotal = $dfROWs["tno"];
				
				//$dfLatLnGs = $InLAT.",".$InLNG;
				
				$dfData["dfResLat"] = $InLAT;
				$dfData["dfResLnG"] = $InLNG;
				$dfData["dftotal"]   = $dftotal;
				$dfData["dfmssage"]  = "s";
				$dfData["dfstates"]  = 1;
				
				array_push($dfRes, $dfData);
			}
			else
			{
				$dfmssage  = "finished all recoreds.";
				$dfResults = 2;
				
				$dfData["dfmssage"]  = $dfmssage;
				$dfData["dfstates"]  = $dfResults;
				
				array_push($dfRes, $dfData);
			}
			
			echo json_encode($dfRes);
			exit();
		}
		
		if($dfGeActions == "insertGeOCODEs")
		{
			$dfLatLnGss = trim($_POST['dfLatLnGss']);
			$dfResultss = $_POST['dfResults'];
			$dfcounts   = "";
			$dfRebs = array(",","،","-");
			$dfResultsss = array();
			
			$dfStart = 1;
			$message = "error";
			if(strpos($dfLatLnGss,",") != false)
			{
				//$dfLatLnGsss = explode(",",$dfLatLnGss);
				$InLAT = $_POST['dfResLat'];
				$InLNG = $_POST['dfResLnG'];
				
				$dfResultsss = str_replace($dfRebs,"-",$dfResultss);
				
				if(strpos($dfResultsss,"-") != false)
				{
					$dfResultsss = explode("-",$dfResultsss);
					
					$dfcounts    = count($dfResultsss);
					
					$dfResultsss = array_reverse($dfResultsss);
					$InCountry   = trim($dfResultsss[0]);
					$InCity      = trim($dfResultsss[1]);
					$InDistrict  = trim($dfResultsss[2]);
					
					$InAddress   = str_replace($dfRebs,"_",$dfResultss);
					$InAddress   = trim($InAddress);
					
					if($InCountry == "United Arab Emirates")
				    {
					    $InCountry = "UAE";
						$InAddress   = str_replace("United Arab Emirates",$InCountry,$dfResultss);
					}
				
				    if($InCountry == "United States")
				    {
					    $InCountry = "USA";
						$InAddress   = str_replace("United States",$InCountry,$dfResultss);
					}
				
				    if($InCountry == "United Kingdom")
				    {
					    $InCountry = "UK";
						$InAddress   = str_replace("United Kingdom",$InCountry,$dfResultss);
					} 
					
					
					
					$InArea      = $InAddress;
					if($dfcounts > 3)
					{
						$InArea      = $dfResultsss[3];
					}
				
					$tb = " tb_indexmaz ";
					$tv = " InCountry='$InCountry', 
					        InCity='$InCity',
							InDistrict='$InDistrict',
							InArea='$InArea',
							InAddress='$InAddress',
							InUPD='6' ";
							
					$tw = " AND (InLAT='$InLAT' AND InLNG='$InLNG') ";
					$UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
					if($UPDateDATA)
					{
						$message = "Done";
					}
					
				}
			}
			
			
			$dfResults = $dfcounts." ".$InCountry."|".$message;
			echo $dfResults;
			exit();
		}
	}
	else
	{
		echo "error";
		exit();
	}
	
?>	