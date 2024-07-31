<?php

    $smPATH = "../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();

	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();
	$stWEBFICON   = $stDBCONST->getstWEBFICON();
	$stWEBLOGO    = $stDBCONST->getstWEBLOGO();
	$stWEBTITLE   = $stDBCONST->getstWEBTITLE();
	
  
    $res = 4;
    if($_POST['uStart'] !="")
    {
	    $start     = $_POST['uStart'];
	    $lmt       = $_POST['limit'];
        $counter = 1;
		$tv  = " * ";
	    $tb  = " at_real_estate ";
	    $stw = " AND Lat !='' 
		         AND Lng !='' 
				 AND Price !='' 
				 AND PriceFt !='' 
				 AND Unique_ID > '$start'
		         ORDER BY Unique_ID ASC LIMIT $lmt ";
		$CheckDATA = $stDBss->CheckDATA($tv,$tb,$stw);
        
		while($rows = mysqli_fetch_assoc($CheckDATA))
        { 
	        $InName        = "";
			$InCountry     = $rows['Country'];
			$InArea        = $rows['Area'];
			$InLAT         = $rows['Lat'];
			$InLNG         = $rows['Lng'];
			$InPrice       = $rows['Price'];
			$InPricePFT    = $rows['PriceFt'];
			
			$InProjectName = "";
			
			$InCNCYName    = "USD";
			$InPATHs       = "";
			$InBEDs        = "";
			$InTYPE        = "";
			$InLink        = "";
			$InKEY         = "0";
			$InSource      = "0";
			$InOwnerId     = $rows['d_owner_id'];
			
			$InSizeFT   = $InPrice / $InPricePFT / 10; 
			$InSize     = 0.0929 * $InSizeFT;
			$InPricePMT = 10.7639 * $InPricePFT;
			
			$InSize     = round($InSize,3);
			$InSizeFT   = round($InSizeFT,3);
			$InPricePMT = round($InPricePMT,3);
			
			$offset     = 0;
	        $offset     = strpos($InArea,",",$offset + 1);
	        $InCity     = substr($InArea,0,$offset);
			$InAddress  = substr($InArea,$offset,-1);
	  
	        $InAddress  = str_replace(",","",$InAddress);
			
			$tv = " tb_indexmaz (InName,InCountry,InCity,InArea,InAddress,InSize,InSizeFT,
					             InPrice,InPricePFT,InPricePMT,InLAT,InLNG,InProjectName,
								 InCNCYName,InTYPE,InSource,InLink,InKEY) ";
			$ts = " VALUES('$InName','$InCountry','$InCity','$InArea','$InAddress','$InSize','$InSizeFT',
					       '$InPrice','$InPricePFT','$InPricePMT','$InLAT','$InLNG','$InProjectName',
						   '$InCNCYName','$InTYPE','$InSource','$InLink','$InKEY') ";
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
			
			$counter++;
		}
	}
    else
    {
	  $res = 5;
	}

	echo $res; 
 
 
  
?>