<?php 	
	function mdTVLOads($mdQuery,$dfKNd,$md)
	{
		global $mdMAPscurrencY ,$smURLPARENt, $stDBss;
		
		$fnAcINDEXchanges = fnAcurrencYINDEXchanges();
		
		$mdCounter    = 0;
		$mdGcounter   = 1;
		$mdGPcounter  = 0;
		$mdCURNCYname = $mdMAPscurrencY;
		$themeMD      = "";
		$mdTHemes     = 2;
		$mdthstart    = 0;
		$mdthend      = 0;
		$mdADsbreak   = 5;
		while($tvROWs = mysqli_fetch_assoc($mdQuery))
		{
			$mdCounter++;
			$mdGPcounter++;
			
			$ProuId     = $tvROWs['user_id'];
			$PromediaId = $tvROWs['id'];
			$PCategory  = $tvROWs['pro_category'];
			$PTYPe      = $tvROWs['pro_type'];
			$PStatus    = $tvROWs['pro_status'];
			$PCountry   = $tvROWs['pro_country'];
									
									
			$PName      = $tvROWs['title'];
			$PDesc      = $tvROWs['description'];
			$PSize      = $tvROWs['size'];
			$PsizeTYPE  = $tvROWs['sizeTYPE'];
			$PRooms     = $tvROWs['rooms'];
			$PBath      = $tvROWs['paths'];
			$PBeds      = $tvROWs['beds'];
			$Pkitchens  = $tvROWs['kitchens'];
			$PPrice     = $tvROWs['price'];
			$POLPrice   = $tvROWs['oldPrice'];
			$PPricePm   = $tvROWs['PricePERm'];
			$PPricePf   = $tvROWs['PricePERf'];
			$PDiscount  = $tvROWs['discount'];
			$PCurrency  = $tvROWs['currency'];
			$PState     = $tvROWs['state'];
			$PCity      = $tvROWs['city'];
			$PAddress   = $tvROWs['address'];
			$PGarage    = 0;						
			
			$fnAsinCURRENcYiesLcT = fnAsinCURRENcYiesLcT($fnAcINDEXchanges,$PCurrency,$PPrice,$POLPrice,$PsizeTYPE);
			foreach($fnAsinCURRENcYiesLcT as $fnAsnCUNcYs=>$fnValues)
			{
				switch($fnAsnCUNcYs)
				{
					case "OnPrice":
					    $OnPrice  = $fnValues;
						break;
					case "POLPrice":
					    $POLPrice  = $fnValues;
						break;
					case "indexPERce":
					    $nREALTESTm  = $fnValues;
						break;	
					case "indexPRIce":
					    $nREALTESTPG  = $fnValues;
						break;	
					case "indexPROpluseUP":
					    $indexPROpluseUP  = $fnValues;
						break;	
					case "POINterFaUP":
					    $POINterFaUP  = $fnValues;
						break;		
				}
			}
			
			$mdCNYVALUe = blastCurrencY("Last",$mdCURNCYname);
			$mdPRCePMT = mdCONVertFRM("mt",$PsizeTYPE,$PSize,$PPrice,$mdCNYVALUe);
			$mdPRCePFT = mdCONVertFRM("ft",$PsizeTYPE,$PSize,$PPrice,$mdCNYVALUe);
			$mdPRCe    = mdCONVertFRM("price",$PsizeTYPE,$PSize,$PPrice,$mdCNYVALUe);

			
			$mdPRCeFORm = $mdPRCe." ".$mdCURNCYname;
			
			$PhrPrice    = $PsizeTYPE." / <span> ".$mdMAPscurrencY." </span> ".number_format($OnPrice,3);
				
			$sPeechPRIce   = $mdPRCeFORm;
			
			$PPPsizeTYPE = "m2";
			if($PsizeTYPE == "m2")
			{
				$PPPsizeTYPE = "sqmt";
			}
			else
			{
				$PPPsizeTYPE = "sqft";
			}
			
            $PPPTYPe = "Sale";
            if($PTYPe == "sale")
			{
				$PPPTYPe = "Sale";
			}
            else
			{
				$PPPTYPe = "Rent";
			}
			
			$tUsrName = "";
            $tUsrMail = "";
			$tUbssCtrY = "";
			$tUbssID = "";
			$tUsrID  = "";
			
			$tVLUe       = " ID,user_login,user_email,display_name ";	
            $tUsrs       = " tb_users ";
	        $wUsrs       = " AND ID='$ProuId' ";
	        $tUsrsDATA   = $stDBss->CheckDATA($tVLUe,$tUsrs,$wUsrs);
		    if(mysqli_num_rows($tUsrsDATA) > 0)
			{
				$tUsrsROWs = mysqli_fetch_assoc($tUsrsDATA);
					
				$tUsrID    = $tUsrsROWs['ID'];
			    $tUsrLoGIn = $tUsrsROWs['user_login'];
			    $tUsrMail  = $tUsrsROWs['user_email'];
			    $tUsrName  = $tUsrsROWs['display_name'];
	
				$tUbss       = " tb_business ";
				$tVLUe       = " a_id,a_user,a_country,a_city,a_address,a_type ";	
	            $wUbss       = " AND a_email='$tUsrMail' ";
	            $tUbssDATA   = $stDBss->CheckDATA($tVLUe,$tUbss,$wUbss);
				if(mysqli_num_rows($tUbssDATA) > 0)
				{
					$tUbssROWs = mysqli_fetch_assoc($tUbssDATA);
					
					$tUbssID    = $tUbssROWs['a_id'];
			        $tUbssUsrID = $tUbssROWs['a_user'];
			        $tUbssCtrY  = $tUbssROWs['a_country'];
			        $tUbssCitY  = $tUbssROWs['a_city'];
				    $tUbssAdds  = $tUbssROWs['a_address'];
				    $tUbssTYPe  = $tUbssROWs['a_type'];
				}
			}					
			
            $seenMAIlb = asINbSsMAILS($tUsrMail);	

            $asbsCNTCTS = asbssCONTACTS($tUbssCtrY,$tUbssID,$tUsrID);
	        $absTEL     = asINbSsCONTACTS("tel",$asbsCNTCTS);
	        $absTELSn   = asINbSsCONTACTS("telsn",$asbsCNTCTS);
	        $absMOB     = asINbSsCONTACTS("mob",$asbsCNTCTS);
	        $absMOBSn   = asINbSsCONTACTS("mobsn",$asbsCNTCTS);			
			
            $sPeechSIZe    = $PSize."".$PPPsizeTYPE;		
            $sPeechROOms   = "<p>".$PRooms." Rooms.</p>
			                  <p>".$PBath." Bathrooms.</p>
							  <p>".$PGarage."Garage.</p>";
            $sPechPROPERtY = "<p>".$PName." For ".$PPPTYPe.". AT ".$PAddress." ST, IN ".$PCity."</p>";

			$userLOGO = mdUSRsAVtar($ProuId,"avatar");
			$imgUrl   = dhPROtYMAInPhoto($PromediaId,"property","tv","gallery");
			//$PimQR    = $smURLPARENt."homes/tv-assets/qr.png";

			$PimQR = mdPRQRcode($PromediaId,$ProuId."HPRO".$PromediaId);
			
			if($mdCounter == $mdADsbreak)
			{
				$mdADSound   = "";
				$themeMD     = "ads";
				?>
                <li class="preview_tv_item col-xs-6 col-sm-4 col-md-3" id="PreviewTVitem<?php echo $mdGPcounter;?>" data-video="<?php echo $smURLPARENt;?>homes/tv-assets/ads/1.mp4" data-id="<?php echo $mdGPcounter;?>" data-src="<?php echo $smURLPARENt;?>homes/tv-assets/ads/1.mp4" data-sub-html=".overlay_layerTV<?php echo $mdGPcounter;?>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <input type="hidden" id="mdADsbreak" value="<?php echo $mdADsbreak;?>">
					<div class="overlay_layerTV overlay_layerTV<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>">
                        <div class="mdVDeOclass mdGTVcounts<?php echo $mdGPcounter;?>" mdGct="<?php echo $mdGPcounter;?>">
						    <video data-id="<?php echo $mdGPcounter;?>" class="mdGTVdcounts mdGTVdcounts<?php echo $mdGPcounter;?>" controls>
                                <source src="<?php echo $smURLPARENt;?>homes/tv-assets/ads/1.mp4">
                                
                                Your browser does not support the video tag.
                            </video>
  						</div>
			        </div>
			        <a href="" data-id="<?php echo $mdGPcounter;?>" class="tvShow" data-video="<?php echo $smURLPARENt;?>homes/tv-assets/ads/1.mp4">
					    
						<!--
						<img class="img-responsive" data-id="<?php echo $mdGPcounter;?>" data-src="<?php echo $smURLPARENt;?>homes/tv-assets/bg.jpg" src="<?php echo $smURLPARENt;?>homes/tv-assets/bg.jpg" alt="no image">
				        <i class="fa fa-eye"></i>
						-->
	                </a>
			        <?php 
			        mdTVsounds($themeMD,$mdGPcounter,$mdADSound,"","","","","","","","","");
			        ?>
		        </li> 
				<?php
				$mdCounter = 0;
				
				if($mdGcounter == $mdTHemes)
					$mdGcounter = 0;
				
				$mdGcounter++;
			}
			else
			{
				$mdthstart = $mdADsbreak;
				if($mdGcounter != 0)
				    $mdthstart = $mdGcounter * $mdADsbreak;
				
				$mdthend   = $mdthstart + $mdADsbreak;
				$themeMD = "theme".$mdGcounter;
				//$themeMD = "theme2";
				?>
			    <li class="preview_tv_item col-xs-6 col-sm-4 col-md-3" id="PreviewTVitem<?php echo $mdGPcounter;?>" data-id="<?php echo $mdGPcounter;?>" data-src="<?php echo $imgUrl;?>" data-sub-html=".overlay_layerTV<?php echo $mdGPcounter;?>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                    <input type="hidden" id="mdADsbreak" value="<?php echo $mdADsbreak;?>">
					<div class="overlay_layerTV overlay_layerTV<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>"> 
					<?php
					    dhPROtYMAInTvSLiders($PromediaId,$PRooms,$PBath,$Pkitchens,$PGarage,$PName,$PsizeTYPE,$PSize,$mdPRCeFORm,$mdPRCePMT,$mdPRCePFT,$absTEL,$seenMAIlb,$PimQR,$userLOGO,$PStatus,$PCategory,$PTYPe,$PCountry,$PCity,$PAddress,$mdCURNCYname,$themeMD,$mdGPcounter);
						sPchTVReadPARAmeters($PromediaId,$sPechPROPERtY,$PCategory,$PPPTYPe,$PStatus,$sPeechPRIce,$sPeechSIZe,$sPeechROOms,$absTEL,$seenMAIlb,$tUsrName,$themeMD,$mdGPcounter,$mdthstart,$mdthend);
					?>
				    </div>
				    <a href="" class="tvShow">
	                    <img class="img-responsive" data-id="<?php echo $mdGPcounter;?>" data-src="<?php echo $imgUrl;?>" src="<?php echo $imgUrl;?>" alt="no image">
				        <i class="fa fa-eye"></i>
	                </a>
			    </li> 
			    <?php
				//$mdGcounter = 0;
			}
		}
	}
	
	function mdCONVertFRM($md,$PsizeTYPE,$PSize,$PPrice,$mdCNYVALUe)
	{
		$mdReTurn = "";
		$mdRet    = "";
		
		$mdPRCe     = $PPrice * $mdCNYVALUe;
		$mdPRCePMT  = $mdPRCe / $PSize;
		$mdPRCePFT  = $mdPRCePMT / 10;
		
		if($PsizeTYPE == "f2")
		{
			$mdPRCePFT  = $mdPRCe / $PSize;
			$mdPRCePMT  = $mdPRCePFT * 10;  
		}
		
		if($md == "mt")
			$mdReTurn = $mdPRCePMT;
		elseif($md == "ft")
			$mdReTurn = $mdPRCePFT;
		elseif($md == "price")
			$mdReTurn = $mdPRCe;
			
		$mdRet = number_format($mdReTurn);
		
		return $mdRet;
	}
	
	function fnAsinCURRENcYiesLcT($fnAcINDEXchanges,$PCurrency,$PPrice,$POLPrice,$PsizeTYPE)
    {
		global $mdMAPscurrencY;
		$fnArndDXchs = fnArandomINDEXchanges();
		$absITMArrYs = array();
		
		if($PCurrency != $mdMAPscurrencY)
		{
			$blastCurrencYv  = blastCurrencY("Last",$PCurrency);
		    $bflastCurrencYv = blastCurrencY("bLast",$PCurrency);
			$PPrice    = $PPrice * $blastCurrencYv;
			$POLPrice  = $POLPrice * $blastCurrencYv;
		}
		else
		{
			$blastCurrencYv  = blastCurrencY("Last",$fnAcINDEXchanges);
		    $bflastCurrencYv = blastCurrencY("bLast",$fnAcINDEXchanges);
		    $PPrice   = $PPrice;
			$POLPrice = $POLPrice;
		}
										
		$nREALTESTP  = $PPrice * $blastCurrencYv / $bflastCurrencYv * $fnArndDXchs;
	    $nREALTESTmn = $nREALTESTP - $PPrice;
									
	    $nREALTESTPG = round($nREALTESTP,3);
	    $nREALTESTmd = $nREALTESTmn / $PPrice ;
	    $nREALTESTmG = $nREALTESTmd * 100 ;
	    $nREALTESTm  = round($nREALTESTmG,4);

		$PhrPrice    = $PPrice;
								
		if($nREALTESTm > 0)
		{
			if($PsizeTYPE == "singLEs")
			{
			    $indexPROpluseUP = "indexPROpluseUPsin";
			    $POINterFaUP     = "POINterFaUPsin";
			}
			else
			{
				$indexPROpluseUP = "indexPROpluseUP";
			    $POINterFaUP     = "POINterFaUP";
			}
		}
		else
		{
			if($PsizeTYPE == "singLEs")
			{
				$indexPROpluseUP = "indexPROpluseDOWNsin";
			    $POINterFaUP     = "POINterFaDOWNsin";	
			}
			else
			{
				$indexPROpluseUP = "indexPROpluseDOWN";
			    $POINterFaUP     = "POINterFaDOWN";	
			}
			
		}
		
		$absITMArrYs = array("OnPrice"=>$PhrPrice,"indexPERce"=>$nREALTESTm,"indexPRIce"=>$nREALTESTPG,
		                     "indexPROpluseUP"=>$indexPROpluseUP,"POINterFaUP"=>$POINterFaUP,"POLPrice"=>$POLPrice);
		
        return $absITMArrYs ;	  
    }
	
	function fnArandomINDEXchanges()
	{
		$changes = 0.99;
		$chrana = rand(989,999) / 1000;
		
		
		$chres = $changes * $chrana;
		return $chres;
	}
	
	function asINbSsMAILS($absMAIl)
	{
		$absITEM = "";
		if(strpos($absMAIl,"_@_") !=false)
		{
			$off        = strpos($absMAIl,"_@_",0);	
	        $nUrl       =  substr($absMAIl,0,$off);
			$seenMAIlb  = str_replace($nUrl,"",$absMAIl);  
			$absITEM  = str_replace("_@_","",$seenMAIlb);	  
		}
		else
		{
			$absITEM = $absMAIl;
		}
	    return $absITEM;
	}
	
	function blastCurrencY($TYPe,$key)
    {
		global $stDBss;
		
		$tb = " tb_indexskeys ";
		$tv = " indexValue ";
		$tw = " AND indexTYPE='$TYPe' 
		        AND indexKey='$key' ";
				
		$dhLoadSELECT = $stDBss->CheckDATA($tv,$tb,$tw);
		$rows = mysqli_fetch_assoc($dhLoadSELECT);
		
	    $indexValue = $rows['indexValue'];
			
		return $indexValue;  
	}
  
	function asbssCONTACTS($aCountry,$assId,$aUsrId)
	{
		$absITMArrYs = array();
		$absTEL     = "";
		$absTELSn   = "";
		$absMOB     = "";
		$absMOBSn   = "";
		$absWHTSUP  = "";
		$absTWITTER = "";
		$absFACBOOK = "";
		$absINSTGRM = "";
		$absTELGRM  = "";
		$absSKYPE   = "";
		$absWEB     = "";
		$absFAX     = "";
		$absTIKTOK  = "";
		$absZOOM    = "";
		$absLINKED  = "";
		$absYOUTUB  = "";
		/////////////////////////////
		$aCPhone     = aChooseCODEcountrY($aCountry);
	    $rowCountrY  = mysqli_fetch_assoc($aCPhone);
	    $aCODECtrY   = $rowCountrY['phonecode'];	
		$asbsnsCNTS  = asbssnssCONTACTSY($aCODECtrY,$assId,$aUsrId);
		
 		if(mysqli_num_rows($asbsnsCNTS) > 0)
		{
			$asbsArraY = array();         
		    foreach($asbsnsCNTS as $asbsnsROWs)
	        {
		        $asbsArraY[$asbsnsROWs['item_key']]   = $asbsnsROWs['item_value'];
			}
			
			if(isset($asbsArraY["b_tel"]) !="")
		    {
				$absa     = $asbsArraY["b_tel"];
		        $absFNd   = array("+",".","-","("," ",")","?");
		        $absRPLC  = str_replace($absFNd,"",$absa);
		   	    $absTEL   = "+".$absRPLC;
			    $absTELSn = "00".$absRPLC;
			}
			if(isset($asbsArraY["b_mobile"]) !="")
		    {
				$absa     = $asbsArraY["b_mobile"];
		        $absFNd   = array("+",".","-","("," ",")","?");
		        $absRPLC  = str_replace($absFNd,"",$absa);
		   	    $absMOB   = "+".$absRPLC;
			    $absMOBSn = "00".$absRPLC;
			}
			if(isset($asbsArraY["b_whatsapp"]) !="")
			{
				$absWHTSUP  = "https://wa.me/+".$asbsArraY["b_whatsapp"];
			}
			if(isset($asbsArraY["b_twitter"]) !="")
			{
				$absTWITTER = "https://www.twitter.com/".$asbsArraY["b_twitter"];
			}
			if(isset($asbsArraY["b_facebook"]) !="")
			{
				$absFACBOOK = "https://www.facebook.com/".$asbsArraY["b_facebook"];
			}
			if(isset($asbsArraY["b_instagram"]) !="")
			{
				$absINSTGRM = "https://www.instagram.com/".$asbsArraY["b_instagram"];
			}
			if(isset($asbsArraY["b_telegram"]) !="")
			{
				$absTELGRM = "https://t.me/".$asbsArraY["b_telegram"];
			}
			if(isset($asbsArraY["b_skype"]) !="")
			{
				$absSKYPE  = "skype:".$asbsArraY["b_skype"]."?chat";
			}
			if(isset($asbsArraY["b_web"]) !="")
			{
				$absWEB    = $asbsArraY["b_web"];
			}
			if(isset($asbsArraY["b_fax"]) !="")
			{
				$absFAX    = $asbsArraY["b_fax"];
			}
			if(isset($asbsArraY["b_tiktok"]) !="")
			{
				$absTIKTOK = $asbsArraY["b_tiktok"];
			}
		    if(isset($asbsArraY["b_zoom"]) !="")
			{
				$absZOOM   = $asbsArraY["b_zoom"];
			}
			if(isset($asbsArraY["b_linkedin"]) !="")
			{
				$absLINKED = $asbsArraY["b_linkedin"];
			}
			if(isset($asbsArraY["b_youtube"]) !="")
			{
				$absYOUTUB = $asbsArraY["b_youtube"];
			}
		      
			         
		}
		
		$absITMArrYs = array("tel"=>$absTEL,"telsn"=>$absTELSn,"mob"=>$absMOB,"mobsn"=>$absMOBSn,
		                     "whats"=>$absWHTSUP,"twitter"=>$absTWITTER,"facebook"=>$absFACBOOK,
							 "instagram"=>$absINSTGRM,"telegram"=>$absTELGRM,"skype"=>$absSKYPE,
							 "web"=>$absWEB,"fax"=>$absFAX,"tiktok"=>$absTIKTOK,
							 "zoom"=>$absZOOM,"linkedin"=>$absLINKED,"youtube"=>$absYOUTUB);
		return $absITMArrYs;
	}
	
	function asINbSsCONTACTS($absK,$asbssCONTACTS)
	{
		$absITEM = "";
		foreach ($asbssCONTACTS as $absKs=>$absV)
		{
		    if($absKs == $absK)
			{
				$absITEM = $absV;
				break;
			}  
		}
	    return $absITEM;
	}
	
	function aChooseCODEcountrY($item_value)
    {
		global $stDBss;
		
		$tVLUe  = " * ";
		$tBLe   = " tb_country ";
		$tWHRes = " AND name ='$item_value' ";
        $result = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
		return $result;
    }
	
    function asbssnssCONTACTSY($rChooseCountry,$parent_id,$s_user_id)
    {
	    global $stDBss ;
		
	    $tVLUe  = " * ";
		$tBLe   = " tb_business_meta ";
		$tWHRes = " AND parent_id='$parent_id' 
					AND s_user_id='$s_user_id' 
					AND item_value !='' 
					AND item_value !='$rChooseCountry' 
					ORDER BY item_id DESC ";
        $result = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
	    return $result;
    } 
	
	function mdUSRsAVtar($OwnerId,$mdKNd)
	{
		global $smURLPARENt,$stDBss;
		$LhUsrAvatar = $smURLPARENt."GAssets/icons/my-profile.png";
		
		$tVLUe  = " primary_link ";
		$tBLe   = " tb_activity ";
		$tWHRes = " AND user_id='$OwnerId' 
		            AND component='$mdKNd'
					ORDER BY id DESC LIMIT 1 ";
        $mdQuerY = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
		
        if(mysqli_num_rows($mdQuerY) > 0)
        {
	        $asUserImages = mysqli_fetch_assoc($mdQuerY);
            $LhUsrAvatar  = $smURLPARENt."club/".$asUserImages['primary_link'];
			if(@getimagesize($LhUsrAvatar))
			{
				$LhUsrAvatar = $LhUsrAvatar;             
			}		            
		}
			
        return $LhUsrAvatar;		
	}
	
	function dhPROtYMAInPhoto($PId,$key,$tYPe,$imGtype)
	{
		global $smURLPARENt, $stDBss;
		$imgUrl = "";
		if($tYPe == "property")
		{
			$imgUrl = $smURLPARENt."homes/hAssets/images/bg_pattern_pro.png";
		}
		elseif($tYPe == "project")
		{
			$imgUrl = $smURLPARENt."homes/hAssets/images/bg_pattern_pro.png";
		}
		elseif($tYPe == "tv")
		{
			$imgUrl = $smURLPARENt."homes/tv-assets/bg.jpg";
		}
		else
		{
			$imgUrl = $smURLPARENt."homes/hAssets/images/bg_pattern_pro.png";
		}
		
		$tVLUe  = " image_url ";
		$tBLe   = " tb_properties_images ";
		$tWHRes = " AND image_parent_id='$PId' 
		            AND image_meta='$key' 
					AND image_status='$imGtype'
					ORDER BY image_date DESC LIMIT 1 ";
					
        $mdQuerY = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
        if(mysqli_num_rows($mdQuerY)> 0)
        {
	        $asUserImages = mysqli_fetch_assoc($mdQuerY);
            $proImage     = $smURLPARENt.$asUserImages['image_url'];
			if(@getimagesize($proImage))
			{
				$imgUrl = $proImage;             
			}		            
		}					
			
        return $imgUrl;		
	}
	
	function dhPROtYMAInTvSLiders($PId,$Prms,$Pbth,$Pkit,$PGarage,$PNme,$PsTYPE,$Psize,$mdPRCe,$mdPRCePMT,$mdPRCePFT,$Ptels,$Pmls,$PimQR,$PimUsr,$Pstus,$PCategory,$PTYPe,$PctrY,$PctY,$Padrs,$mdCURNCYname,$themeMD,$mdGPcounter)
	{
		$mdPRCeTM1 = $PsTYPE." / ".$mdPRCe;
			
		?>
		<div class="translate mdTVTheme2 mdTVThemes overlay_layerTVmBODY overlay_layerTVmBODY<?php echo $mdGPcounter;?>">
		<?php 
        if($themeMD == "theme1")
		{
        ?>		
			<div class="overlay_layerTVBodY slide-footer overlay_layerTVBodY<?php echo $mdGPcounter;?>">
				<div class="mdGTOleft overlay_layerTVBodYl text-uppercase">
					<div class='ct-product--meta'>
                        <div class='ct-icons'>
                            <span>
                                <i class='fa fa-bed'></i> 
								<?php echo $Prms;?>
                            </span>
                        </div>
						<div class='ct-icons'>
                            <span>
                                <i class='fa fa-bed'></i> 
								<?php echo $Pbth;?>
                            </span>
                        </div>
						<div class='ct-icons'>
                            <span>
                                <i class='fa fa-cab'></i> 
								<?php echo $PGarage;?>
                            </span>
                        </div>
					</div>
				</div>
				<div class="mdGTOleft overlay_layerTVBodYr text-uppercase">
					<div class='slider--info-bt'>
			            <div class='pro-name'>
				            <?php echo $PNme; ?>
				        </div>
				        <div class='pro-u-id'>
				            <div> <?php echo "ID"." : ".$PId; ?></div>
					        <div class='labHDn mob-area'> <?php echo $PsTYPE ." ".$Psize;?></div>
					        <div class='labHDn mob-price'> <?php echo $mdPRCeTM1; ?></div>
				        </div>
				        <div class="pro--info">
				            <span>
                                <i class='fa fa-phone'></i>
						        <?php echo $Ptels; ?>
                            </span>
							<span>
                                <i class='fa fa-envelope'></i>
						        <?php echo $Pmls; ?>
                            </span>
				        </div>
			        </div>
				</div>
				
				<div class='mdGTOright slider-right-info text-uppercase'>
			        <div class='slider-logo-info slider-phone-info s-logo text-uppercase'>
				        <div class='lg-laptop-only s-logo-lft'>
				            <img src='<?php echo $PimQR;?>' class='bt-logo'>
					    </div>
					    <div class='s-logo-rht'>
				            <img src='<?php echo $PimUsr;?>' class='bt-logo'>
					    </div>
					    <div class='lg-mobile-only'>
				            <img src='<?php echo $PimQR;?>' class='bt-logo'>
					    </div>			  
					    <div class='ct-for---sale lg-mobile-only'>
						    <div><span><?php echo $Pstus;?></span></div>		
			            </div>
				    </div>
					<div class='slider-pro-dt text-uppercase'>
				        <div class='slider-phone-info'>
					        <h4> <?php echo $PctrY;?> </h4>
					        <h4> <?php echo $PctY;?> </h4>
					    </div> 
					    <h4 class='lg-mob-address'>
					        <i class='fa fa-map-marker'></i>
					        <?php echo $Padrs; ?>
					    </h4>
					    <h4 class='lg-laptop-only'><?php echo $PsTYPE ." ".$Psize;?></h4>
					    <h4 class='lg-laptop-only'><?php echo $mdPRCeTM1;?></h4>
					    <h4 class='lg-laptop-only lg_laptoP_only_chart d-none'>
							<a href="javascript:void(0)" df="chart" blFM="property" id="<?php echo $PId;?>" onclick="showPROActionItem(this)">
                                <i class="fa fa-line-chart fa-fw"></i>
                            </a>
						</h4>
						<div class='lg-laptop-only text-uppercase seenLAPPrice'>
					        <div class='ct-area lg-laptop-only'>
                                <span><?php echo $PsTYPE ." ".$Psize;?></span>
                            </div>
					        <div class="ct-product--price lg-laptop-only">
                                <span><?php echo $PsTYPE;?></span>  
                            </div>
					    </div>                              
				    </div>
				</div>
				<div class='mdGTOright ct-for--sale lg-laptop-only text-uppercase'>
			        <span><?php //echo $Pstus;?></span>
			    </div>
			
			</div>
		<?php 
		}
		else
		{
        ?>		
			<div class="mdTVTheme2_body mdTVTheme2_body<?php echo $mdGPcounter;?>">
			    <div class="mdTVTheme2_header tvFLex">
				    <div class="mdTVTheme2_owPHoto tvFLex">
					    <img src="<?php echo $PimUsr;?>">
					</div>
					<div class="mdTVTheme2_Pdetails tvFLex">
					    <p class="tvFLex">
						<?php echo $mdPRCePFT." ".$mdCURNCYname." / sqft";?>
						</p>
						<h4 class="tvFLex">
						<?php echo $mdPRCe;?>
						</h4>
					</div>
					<div class="mdTVTheme2_owQR tvFLex">
					    <img src="<?php echo $PimQR;?>">
					</div>
				</div>
				<div class="mdTVTheme2_footer tvFLex">
				    <div class="mdTVTheme2_info tvFLex">
					    <div class="mdTVTheme2_col1 tvFLex">
						    <p class="tvFLex">
							    <span class="mdcolorLBlue">
								    <?php echo $PCategory;?>
								</span> 
								for 
								<span class="mdcolorLBlue">
								    <?php echo $PTYPe;?>
							    </span> 
								in 
								<span><?php echo $Padrs;?></span> 
								<span class="mdcolorLBlue">
								    <?php echo $PctY;?>
								</span> 
							</p>
						</div>
						<div class="mdTVTheme2_col2 tvFLex">
							<h4 class="tvFLex">
								<?php echo $PNme;?>
							</h4>
						</div>
					</div>
					
					<div class="mdTVTheme2_details tvFLex">
					    <div class="mdTVTheme2_col1 tvFLex">
						    <p class="tvFLex">
							    <span class="mdcolorLBlue">
								    <?php echo $mdPRCePFT;?>
								</span> 
								sqft /
								<span class="mdcolorLBlue">
								    <?php echo $mdPRCePMT;?>
								</span> 
								sqm 
							</p>
						</div>
						<div class="mdTVTheme2_col2 tvFLex">
						    <p class="tvFLex">
							    <span class="mdcolorLBlue">
								    <?php echo $Prms;?>
								</span> 
								bedrooms ,
								<span class="mdcolorLBlue">
								    <?php echo $Pbth;?>
								</span> 
								bathrooms 
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php 
		}
        ?>		
		</div>
		<?php
	}
	
	function sPchTVReadPARAmeters($PId,$sPechPROPERtY,$Pcategory,$PsTYPE,$Pstus,$PPrce,$Psize,$Prms,$Ptels,$Pmls,$PimUsr,$themeMD,$mdGPcounter,$mdthstart,$mdthend)
	{
		if($themeMD == "ads")
		{
			?>
			<article class="speechARTIcLeTv speechARTIcLeTv<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>" md="<?php echo $themeMD;?>" mdthstart="<?php echo $mdthstart;?>" mdthend="<?php echo $mdthend;?>" class="form-control bg-dark text-light mt-5">    
				<h1><?php echo $sPechPROPERtY;?></h1>
			</article>
			<?php
		}
		else
		{
			if($Ptels == "")
		    {
			    $Ptels = "no phone";
			}
			?>
			<article class="translate mdsPeechARTIcLeTv speechARTIcLeTv speechARTIcLeTv<?php echo $mdGPcounter;?> <?php echo $themeMD;?>" id="<?php echo $mdGPcounter;?>" md="<?php echo $themeMD;?>" mdthstart="<?php echo $mdthstart;?>" mdthend="<?php echo $mdthend;?>" class="form-control bg-dark text-light mt-5">
	            
				    <h1><?php echo $sPechPROPERtY;?>.</h1>
		            <p>Price : <?php echo $PPrce;?>, WITH, <?php echo $Prms;?> </p>
		            <p>Size :<?php echo $Psize;?>.</p>
		            <p>Property Owner is: <?php echo $PimUsr;?>.</p>
	            
			</article>
			<?php
		}
	}
	
	function mdTVsounds($md,$mdGPcounter,$sPechPROPERtY,$Pcategory,$PsTYPE,$Pstus,$PPrce,$Psize,$Prms,$Ptels,$Pmls,$PimUsr)
	{
		if($md == "")
		{
			?>
			<article class="speechARTIcLeTv speechARTIcLeTv<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>" md="<?php echo $md;?>" mdthstart="0" mdthend="0" class="form-control bg-dark text-light mt-5">                
					<h1><?php echo "no items found";?>.</h1>
			</article>
			<?php
		}
		elseif($md == "ads")
		{
			?>
			<article class="speechARTIcLeTv speechARTIcLeTv<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>" md="<?php echo $md;?>" mdthstart="0" mdthend="0" class="form-control bg-dark text-light mt-5">    
				<h1><?php echo $sPechPROPERtY;?></h1>
			</article>
			<?php
		}
		else
		{
			if($Ptels == "")
		    {
			    $Ptels = "no phone";
			}
			?>
			<article class="speechARTIcLeTv speechARTIcLeTv<?php echo $mdGPcounter;?>" id="<?php echo $mdGPcounter;?>" md="<?php echo $md;?>" mdthstart="0" mdthend="0" class="form-control bg-dark text-light mt-5">
	                
					<h1><?php echo $sPechPROPERtY;?>.</h1>
		            
		            <p>Price : <?php echo $PPrce;?>, WITH, <?php echo $Prms;?> </p>
		            <p>Size :<?php echo $Psize;?>.</p>
		            <p>Property Owner is: <?php echo $PimUsr;?>.</p>
	        </article>
			<?php
		}
	}
	
	function fnAcurrencYINDEXchanges()
	{
		global $mdMAPscurrencY;
		$changesRATes = "";
		if(empty($mdMAPscurrencY))
		{
			$changesRATes = "USD";
		}
		else
		{
			if($mdMAPscurrencY == "USD")
			{
				$changesRATes = "EUR";
			}
			else
			{
				$changesRATes = $mdMAPscurrencY;
			}
		}
	
		return $changesRATes;
	}

	function mdTVLOademPTY()
	{
		global $smURLPARENt;
		?>
		<li class="preview_tv_item col-xs-6 col-sm-4 col-md-3" id="PreviewTVitem"  data-id="" data-src="<?php echo $smURLPARENt;?>homes/tv-assets/bg.jpg"  data-sub-html=".overlay_layerTV1" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
            <div class="overlay_layerTV overlay_layerTV1">
                <div class="noTvItemsFound ">
					<div>no items found!</div>
				</div>							
			</div>
			<a href="" class="tvShow">
	            <img class="img-responsive" data-src="<?php echo $smURLPARENt;?>homes/tv-assets/bg.jpg" src="<?php //echo $imgUrl;?>" alt="no image">
				<i class="fa fa-eye"></i>
	        </a>
			<?php 
			mdTVsounds("",0,"","","","","","","","","","");
			?>
		</li> 
		<?php
	}
	
	function dhPROtYMAInTvINDExs($fbldrSLinXCT)
	{
		global $mdMAPscurrencY;
		$InOff = 0;
		$lastARRKey = 0;
		$response = "";
		$changesRATes = fnAcurrencYINDEXchanges();
		while($fblHEADErIndex = mysqli_fetch_assoc($fbldrSLinXCT))
		{
			$InOff++;
			$PPrce     = $fblHEADErIndex['price'];
			$POLPrice  = $fblHEADErIndex['oldPrice'];
			$PNme      = $fblHEADErIndex['title'];
		    $Pcurrency = $fblHEADErIndex['currency'];
					            
		    
		
            $fnAsinCURRENcYiesLcT = fnAsinCURRENcYiesLcT($changesRATes,$Pcurrency,$PPrce,$POLPrice,"");

			foreach($fnAsinCURRENcYiesLcT as $fnAsnCUNcYs=>$fnValues)
			{
				switch($fnAsnCUNcYs)
				{
					case "OnPrice":
					    $OnPrice  = $fnValues;
						break;
					case "POLPrice":
					    $POLPrice  = $fnValues;
						break;
					case "indexPERce":
					    $nTESTm  = $fnValues;
						break;	
					case "indexPRIce":
					    $indexPPrce  = $fnValues;
						break;	
					case "indexPROpluseUP":
					    $indexPROpluseUP  = $fnValues;
						break;	
					case "POINterFaUP":
					    $POINterFaUP  = $fnValues;
						break;		
				}
			
			}
		    $ndxPPrce = number_format($indexPPrce,1);
		    $response = '<li>
                  <a href="javascript:void(0)" class="bl-fs-14">
					<span class="indexPROfirst">
					    <span class=""></span>
						index
					</span>  
					<b class="indexPROItems">
						<span class="indexPROname">
							'.$PNme.'
							<i class="small_index_key_header">'.$mdMAPscurrencY.'</i>
						</span> 
						<span class="indexPROpluse '.$indexPROpluseUP.'"> 
							<b>'.$ndxPPrce.'</b>
							(
								<b>'.$nTESTm.' %</b>
								<span class="indexPOINterFa '.$POINterFaUP.'"></span>
							)
						</span> 
					</b>    
                </a>
            </li>';
			echo $response;
		}
	}

	///////////////////
	function mdTVtrims($mdstr)
	{
		$mdReStr = "";
		
		    $mdReStr   = trim($mdstr);
			$mdReStr   = htmlspecialchars($mdReStr);
			
		return $mdReStr;
	}
	function mdTVLOcSearchs($dfCountries,$dfCities,$dfAddress,$mdsearchBOx)
	{
		$dfCONTRiess = "";
		$dfCITiess   = "";
		$dfGSeArchs  = "";
        $dfAddrss    = "";
		$mdsrchBOx   = "";
		
		$dfCountries = mdTVtrims($dfCountries);
		$dfCities    = mdTVtrims($dfCities);
		$mdsearchBOx = mdTVtrims($mdsearchBOx);
		
		$dfCONTRiess  = " AND pro_country = 'UAE' ";
		if($dfCountries != "ALL" && $dfCountries != "")
		{
			$dfCONTRiess  = " AND pro_country = '$dfCountries' ";
			if($dfCountries == "WorldWide")
			{
				$dfCONTRiess  = " AND pro_country != '' ";
			}
		}
		
		if($dfCities != "ALL" && $dfCities != "")
		{
			$dfCITiess  = " AND city = '$dfCities' ";
		}
		
		if($dfAddress  != "ALL" && $dfAddress != "")
		{
			$dfAddrss  = " AND address = '$dfAddress' ";
		}

		if($mdsearchBOx != "")
		{
			$mdsrchBOx = " AND (town LIKE '%$mdsearchBOx%' OR 
			                    title LIKE '%$mdsearchBOx%' OR 
								description LIKE '%$mdsearchBOx%') ";
		}
		$dfGSeArchs  = $dfCONTRiess.$dfCITiess.$dfAddrss.$mdsrchBOx;

		return $dfGSeArchs;
	}
	
	function mdTVPriCes($mdKeY,$mdKNd,$mdSIZeVALUe,$mdNUMBVALUe,$mdMPrcVALUe,$mdXPrcVALUe)
	{
		global $stDBexTRas;
		
		$mdResults   = "";
		$mdMoALUe    = "";
		$mdXoALUe    = "";
		$mdMvALUe    = "";
		$mdXvALUe    = "";
		$mdDvALUes   = "";

		if($mdKeY == "mnMx")
		{
			$mdMvALUe = $mdMPrcVALUe;
			$mdXvALUe = $mdXPrcVALUe;
		}
		elseif($mdKeY == "mdPrice" || $mdKeY == "mdArea")
		{
			if(strpos($mdMPrcVALUe,",") != false)
			{
				$mdDvALUes = explode(",",$mdMPrcVALUe);
				$mdMvALUe  = $mdDvALUes[0];
			    $mdXvALUe  = $mdDvALUes[1];
			}
		}
		
		$mdPVALUe = "";
		if($mdKNd == "mdPrices")
		{
			$mdPVALUe = "price";
			if($mdMvALUe != "" && $mdMvALUe != 0)
			{
				$mdMvALUe = $mdMvALUe / $mdNUMBVALUe;
			}
			
			if($mdXvALUe != "" && $mdXvALUe != 0)
			{
				$mdXvALUe = $mdXvALUe / $mdNUMBVALUe;
			}
		}
		elseif($mdKNd == "mdAreas")
		{
			$mdPVALUe = "size";
			if($mdSIZeVALUe == "mt")
			{
				if($mdMvALUe != "" && $mdMvALUe != 0)
				    $mdMvALUe = $mdMvALUe * 10.7641;
				
				if($mdXvALUe != "" && $mdXvALUe != 0)
				    $mdXvALUe = $mdXvALUe * 10.7641;
			}
		}
		
		$mdResults = mdTVReQPrices($mdPVALUe,$mdMvALUe,$mdXvALUe);
		
		return $mdResults;
	}
	
	function mdTVReQPrices($mdPVALUe,$mdMvALUe,$mdXvALUe)
	{
		$mdResults = "";
		if($mdMvALUe != "" && $mdXvALUe != "")
		{
			$mdResults = " AND($mdPVALUe BETWEEN $mdMvALUe AND $mdXvALUe)";
		}
		elseif($mdMvALUe != "")
		{
			$mdResults = " AND $mdPVALUe > $mdMvALUe";
		}
		elseif($mdXvALUe != "")
		{
			$mdResults = " AND $mdPVALUe < $mdXvALUe";
		}
		
		return $mdResults;
	}
	
	function mdTVschFULLs($mdBeDs,$mdPAtHs,$mdTYPes,$mdKNd)
	{
		$mdResults = "";
		$mdTYPess  = "";
		
		$mdBeDss   = mdTVSearchFULLs($mdBeDs,"beds");
		$mdPAtHss  = mdTVSearchFULLs($mdPAtHs,"paths");
		
		if($mdKNd == "find")
		    $mdTYPess  = mdTVSearchFULLs($mdTYPes,"pro_category");
		
		$mdResults = $mdTYPess.$mdPAtHss.$mdBeDss;
		
		return $mdResults;
	}

	function mdTVSearchFULLs($mdSResDNeVLUes,$dfsrSRes)
	{
		
		$mdReTVLUes     = "";
		$mdSResDNeVLUs  = "";
		$srSResDNeVLUes =  array();
		
		$mdSResDNeVLUes = trim($mdSResDNeVLUes);
		if(strpos($mdSResDNeVLUes,",") != false)	
		{
		    $srSResDNeVLUes    = explode(",",$mdSResDNeVLUes);
		    $fbsrchCNT         = count($srSResDNeVLUes);
			
		    $fbsrchCNT   = $fbsrchCNT - 1;
		    $fbsrchCNTer = 0;
		
		    foreach($srSResDNeVLUes as $srSRes)
			{
				$fbsrchCNTer++;
				
				if($srSRes != "")
				{
					if($fbsrchCNTer == $fbsrchCNT)
					{
						if($dfsrSRes == "beds" || $dfsrSRes == "paths")
						{
							$mdSResDNeVLUs .= " $dfsrSRes = '$srSRes' ";
						}
						else
						{
							$mdSResDNeVLUs .= " $dfsrSRes LIKE '%$srSRes%' ";
						}
					}
					else
					{
						if($dfsrSRes == "beds" || $dfsrSRes == "paths")
						{
							$mdSResDNeVLUs .= " $dfsrSRes = '$srSRes' OR";
						}
						else
						{
							$mdSResDNeVLUs .= " $dfsrSRes LIKE '%$srSRes%' OR";
						}
					}
				}
			}
			
			if($mdSResDNeVLUs != "")
			{
				$mdReTVLUes = " AND(".$mdSResDNeVLUs.")";
			}
		}
		
		return $mdReTVLUes;
	}
	
	function mdTVGLBSZOoMs($mYLATLNGs,$mYmdROIPID,$mYROIstus,$mdKNd)
	{
		$mdResults  = "";
		$mYLATLNGss = "";
		$mdZOoms    = "";
		$mdINPuRPose = "";
		
		$mdZOoms   = "";
		if(strpos($mYLATLNGs,"_"))
		{
			$mYLATLNGss = explode("_",$mYLATLNGs);
			
			if($mdKNd == "map")
			{
				if($mYLATLNGs != 12 && $mYLATLNGs != "")
				{
					$astLATs   = $mYLATLNGss[0];
		            $astLNGs   = $mYLATLNGss[1];
			    
		            $astLATses = $mYLATLNGss[2];
		            $astLNGses = $mYLATLNGss[3];

		            $mdZOoms  = " AND (longitude BETWEEN $astLNGs AND $astLNGses ) 
				                  AND (latitude BETWEEN $astLATs AND $astLATses )";
				}	
			}
		}
		
		if(!empty($mYROIstus))
		{
			if($mYROIstus == "Sale")
			    $mdINPuRPose = " AND pro_type = '$mYROIstus'";
			else 
				$mdINPuRPose = " AND pro_type != 'Sale'";
		}
		
		$mdResults = $mdZOoms.$mdINPuRPose;
		return $mdResults;
	}
	
	function bzTVROIMDNxsls($bzKND,$bzSROsaleVLUes)
	{
		$mdResults  = "";
		$mdReTVALUe = "";
		$mdReTQWRYe = "";
		$mdRTQWRYes = "";
		$mdRTQWTYPe = "";
		
		$bzSROslVLUes = trim($bzSROsaleVLUes);
		if(strpos($bzSROslVLUes,"|") != false)
		{
			$atsrSROslVLUes = explode("|",$bzSROslVLUes);
			$mSROsaleVLUes  = $atsrSROslVLUes[0];
			$dSROsaleVLUes  = $atsrSROslVLUes[1];
			
			$mSROsaleVLUes = str_replace(",","",$mSROsaleVLUes);
			if(!empty($mSROsaleVLUes))
			{
				$mdReTVALUe = $mSROsaleVLUes;
			}
			elseif(!empty($dSROsaleVLUes))
			{
				$mdReTVALUe = $dSROsaleVLUes;
			}
		}
		
		if($bzKND == 0)
		{
			$mdResults = $mdReTVALUe;
		}
		elseif($bzKND == 1)
		{
			$mdResults = $mdRTQWRYes;
		}
		elseif($bzKND == 2)
		{
			$mdResults = $mdRTQWTYPe;
		}
		
		return $mdResults;
	}
	
	function mdPRQRcode($uSerID,$aUserLoG)
	{
		global $stDBss, $smURLPARENt;
		
		$qrLink    = "";
		$mdQRlink  = "";
		$smURLclub = $smURLPARENt."club/";
		
		$mdQRcode = mdQRcoderequest($uSerID,$aUserLoG);			 			
		if($mdQRcode != "")
	    {
		   	$mdQRlink = $mdQRcode;		
		}
	    else
	    {
		    $codesDir = "../../../../club/qrcodes/";
		    $codeLOGN = $smURLPARENt."homes/properties/product_single.php?id=".$uSerID;
            $codeName = $codeLOGN;	
	        $codeFile = $aUserLoG.rand().'.png';
	        $formData = $codeName;//$_POST['formData'];
	        $codeSize = 5;
		    $codeLvel = "L";
			      
		    QRcode::png($formData, $codesDir.$codeFile, $codeLvel, $codeSize);
				    
		    $qr_link  = "qrcodes/".$codeFile;	
	        $qr_type  = "hProperties";
			
			$QRtable  = " tb_qr(qr_member,qr_code,qr_link,qr_type,qr_member_id) 
						  VALUES('$aUserLoG','$codeLOGN','$qr_link','$qr_type','$uSerID')";
			$QRnewcode = $stDBss->CreateDATA($QRtable);
  
		    $mdQRlink = mdQRcoderequest($uSerID,$aUserLoG);
		}
		
		return $mdQRlink;
	}
	
	function mdQRcoderequest($uSerID,$aUserLoG)
	{
		global $stDBss, $smURLPARENt;
		
		$qrLink    = "";
		$QRcode    = "";
		$smURLclub = $smURLPARENt."club/";
		
		$dftvs    = " * ";
		$dfROItbs = " tb_qr ";
		$stwGRPs  = " AND qr_member_id='$uSerID' 
		              AND qr_member='$aUserLoG' 
					  AND qr_link !='' 
					  AND qr_type='hProperties' ";
		
		$QRcheck = $stDBss->CheckDATA($dftvs,$dfROItbs,$stwGRPs);			 			
		if(mysqli_num_rows($QRcheck) > 0)
	    {
		    $QRcheckUser  = mysqli_fetch_assoc($QRcheck);
		    $qrLink       = $smURLclub.$QRcheckUser['qr_link'];	
            if(@getimagesize($qrLink))
		    {
			    $QRcode  = $smURLclub.$QRcheckUser['qr_link'];
			}			
		}
		
		return $QRcode;
	}
	
	function mdITeMcounts($mdWHeRs)
	{
		global $stDBss;
		$mdNO = "";
		$tBLe  = " tb_properties 
				   LEFT JOIN tb_users_properties 
				   ON tb_properties.id = tb_users_properties.pro_id 
				   AND tb_properties.owner_id = tb_users_properties.user_id";
		$tVLUe = " COUNT(tb_properties.id) as mdNo ";
				                    
		$tWHRe = " AND tb_properties.id = tb_users_properties.pro_id 
				   AND tb_properties.owner_id = tb_users_properties.user_id";
									
		$tORDer = " ORDER BY tb_properties.id DESC ";		
				
		$tWHRes  = $tWHRe.$tORDer;
		$mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
		$mdROWs  = mysqli_fetch_assoc($mdQuery);
		
		$mdNO    = $mdROWs['mdNo'];
		
		return $mdNO;
	}

	function mdIMAGEcounts($mdWHeRs)
	{
		global $stDBss;
		$mdNO = "";
		$tBLe  = " tb_properties_images ";
		$tVLUe = " COUNT(image_id) as mdNo ";
				                    
		$tWHRe  = $mdWHeRs;
									
		$tORDer = " ORDER BY image_id DESC ";		
				
		$tWHRes  = $tWHRe.$tORDer;
		$mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
		$mdROWs  = mysqli_fetch_assoc($mdQuery);
		
		$mdNO    = $mdROWs['mdNo'];
		
		return $mdNO;
	}

	
?>