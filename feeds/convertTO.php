<?php require_once('../mdDB/astinit.php');

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
	    $tb  = " tb_indexmaz ";
	    $stw = " AND InID > '$start'
		         ORDER BY InID ASC LIMIT $lmt ";
		$CheckDATA = $stDBss->CheckDATA($tv,$tb,$stw);
        
		while($rows = mysqli_fetch_assoc($CheckDATA))
        { 
			
			$InID          = $rows['InID'];
			$InCountry     = $rows['InCountry'];
			$InSizeFT      = $rows['InSizeFT'];
			$InPrice       = $rows['InPrice'];
			$InPricePFT    = $rows['InPricePFT'];
			
			if($InCountry != "UAE")
			{
				$InPrice = $InSizeFT * $InPricePFT;
			}
			
			$InPricePMT    = $InPricePFT * 10.7639;
			$InSize        = $InPrice / $InPricePMT;
			
			
			
			$InSize        = round($InSize,3);
			$InPricePMT    = round($InPricePMT,3);
			
			
			$tb = " tb_indexmaz ";
			$tv = " InSize='$InSize',
			        InPricePMT='$InPricePMT', 
					InPrice='$InPrice' ";
					
			$tw = " AND InID='$InID' ";
			
			$UPDateDATA = $stDBss->UPDateDATA($tb,$tv,$tw);
			
			if($UPDateDATA)
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