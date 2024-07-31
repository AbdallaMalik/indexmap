<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
	
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['fmAction']))
	{
		$dfResults = "";
		$fmAction = $_POST['fmAction'];
		if($fmAction == "mdPHP")
		{
			$fmRequest = $_POST['fmRequest'];
			if($fmRequest == "dfLOcations")
			{
				$fmKNd       = $_POST['fmKNd'];
				$dfCountries = $_POST['dfCountries'];
				$dfCities    = $_POST['dfCities'];
				$fDistricts  = $_POST['fDistricts'];
				$dfArea      = $_POST['dfArea'];
				$dfAddress   = $_POST['dfAddress'];
				$dfProName   = $_POST['dfProName'];
				
				
				$srSCNTRY    = dfLOcations("srSCNTRY",$dfCountries,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
				$srSCITY     = dfLOcations("srSCITY",$dfCountries,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
				$srDSTRCT    = dfLOcations("srDSTRCT",$dfCountries,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
				$srAREAs     = dfLOcations("srAREAs",$dfCountries,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
				$srADDRes    = dfLOcations("srADDRes",$dfCountries,$dfCities,$fDistricts,$dfArea,$dfAddress,$dfProName);
				
				echo $dfResults."|".$srSCNTRY."|".$srSCITY."|".$srDSTRCT."|".$srAREAs."|".$srADDRes;
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