<?php require_once('../../../club/libs/modules/brInit.php');
  
    $smPATH = "../../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
  
    $BRIGHTPath       = "../../";
    $GAssetsPath      = "../../../";

    if(isset($_GET['amzQRYs']))
	{
		$amzQRYs = $_GET['amzQRYs'];
		$results = "";
		if($amzQRYs == "latlng")
		{
			$dfRows   = $_POST['dfRows'];
			$dfPages  = $_POST['dfPages'];
			$dfKeYDs  = $_POST['dfKeYDs'];
			
			$dfOffset = ($dfPages - 1) * $dfRows;
			
			$dfQuerYs = " AND InCountry !='' ";
			if($dfKeYDs == "a")
			{
				$dfQuerYs = " AND (InCountry ='Saudi Arabia' OR InCountry ='UAE') ";
				//$dfQuerYs = " AND InCountry !='USA' ";
			}
			elseif($dfKeYDs == "b")
			{
				//$dfQuerYs = " AND InCountry ='SAUDI ARABIA' ";
				//$dfQuerYs = " AND InCountry !='' ";
				$dfQuerYs = " AND (InCountry ='Saudi Arabia' OR InCountry ='UAE') ";
			}
			elseif($dfKeYDs == "c")
			{
				$dfQuerYs = " AND InCountry ='UAE' ";
			}
			elseif($dfKeYDs == "d")
			{
				$dfQuerYs = " AND InCountry !='USA' ";
			}
			elseif($dfKeYDs == "e")
			{
				$dfQuerYs = " AND InCountry !='' ";
			}
			
			$dGQuerYs = " GROUP BY InLNG,InLAT 
					      ORDER BY tno ASC 
					      LIMIT $dfOffset, $dfRows ";
			
			$tv = " COUNT(*) as tno,InLNG,InLAT ";
			$tb = " tb_indexmaz ";
	        $wb = " AND InLNG !='' 
			        AND InLAT !='' 
					AND InUPD ='0' ";
			
			$tGWe = $wb.$dfQuerYs.$dGQuerYs;
	        $fnAsCTsLcT = $stDBss->CheckDATA($tv,$tb,$tGWe);
			
			$dfCounter = 0;
			if(mysqli_num_rows($fnAsCTsLcT) > 0)
			{
				foreach($fnAsCTsLcT as $fbROWs)
				{
					$dfCounter++;
					$fbLNGs = $fbROWs['InLNG'];
					$fbLATs = $fbROWs['InLAT'];
					
					?>
					<div class="dfPanelPAGLATLNGs" id="<?php echo $dfCounter;?>">
					    <input type="hidden" id="dfPanelPAGLAT<?php echo $dfCounter;?>" value="<?php echo $fbLATs;?>">
						<input type="hidden" id="dfPanelPAGLNG<?php echo $dfCounter;?>" value="<?php echo $fbLNGs;?>">
					</div>
					<?php
				}
				
			}
			else
			{
				$results = 3;
			}
			
			echo $results;
			exit();
		}
	
	    if($amzQRYs == "InUPD")
		{
			$fm = $_POST['fm'];
			if($fm == "converLATLNG")
			{
				$fslat         = $_POST['fslat'];
				$fslng         = $_POST['fslng'];
				$fsCountryName = $_POST['fsCountryName'];
				$fsState       = $_POST['fsState'];
				$fsDistrict    = $_POST['fsDistrict'];
				$fsCity        = $_POST['fsCity'];
				$fsCounty      = $_POST['fsCounty'];
				$fsStreet      = $_POST['fsStreet'];
				$fsPostalCode  = $_POST['fsPostalCode'];
				$fsHouseNumber = $_POST['fsHouseNumber'];
				
				if($fsCountryName == "United Arab Emirates")
				{
					$fsCountryName = "UAE";
				}
				
				if($fsCountryName == "United States")
				{
					$fsCountryName = "USA";
				}
				
				if($fsCountryName == "United Kingdom")
				{
					$fsCountryName = "UK";
				}
				
				$fsAddress     = $fsStreet." ".$fsHouseNumber." ".$fsPostalCode;
				
				if($fsDistrict == "undefined" || $fsDistrict == "")
				{
					$fsDistrict = "";
				}
				
				$tv   = " * ";
				$tb   = " tb_indexmaz ";
	            $tGWe = " AND (InLNG='$fslng' AND InLAT='$fslat') 
				          AND InUPD ='0' ";
	            $fnesnCOUNTsLcT = $stDBss->CheckDATA($tv,$tb,$tGWe);
				
				if(mysqli_num_rows($fnesnCOUNTsLcT) > 0)
				{
					$tbl = " tb_indexmaz ";
				    $set = " InCountry='$fsCountryName',
					         InCity='$fsCity' ,
				             InDistrict='$fsDistrict', 
						     InArea='$fsCounty',
						     InAddress='$fsAddress', 
				             InUPD='3' ";
				    $whr = " AND (InLNG='$fslng' AND InLAT='$fslat') ";
				    $cedtInfo = $stDBss->UPDateDATA($tbl,$set,$whr);
				    if($cedtInfo)
				    {
						$tbls = " tb_index_parent ";
				        $sets = " InPCountry='$fsCountryName', 
						          InPAddress='$fsAddress' ";
				        $whrs = " AND (InPLNG='$fslng' AND InPLAT='$fslat') ";
				        $cedtInfos = $stDBss->UPDateDATA($tbls,$sets,$whrs);
					    if($cedtInfos)
					        $results = 1;
						else
							$results = 2;
					}
				    else
				    {
					    $results = 3;
					}
				}
				else
				{
					$results = 4;
				}
				
				echo ""."|".$results;
				exit();
			}
		    else
			{
				echo "error";
				exit();
			}
			
			
		}
	        
	}
?>