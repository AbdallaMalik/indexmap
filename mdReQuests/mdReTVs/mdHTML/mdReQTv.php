<?php require_once('../../../mdDB/astinit.php');
      
	$smPATH = "../../../";
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();

	$mdDURLoGo  = $smURLPARENt."GAssets/icons/my-profile.png";
	$mdGDate    = date("Y-m-d");
	require_once('../../../../club/qr/library/phpqrcode/qrlib.php');
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	require_once($smPATH.'mdReQuests/mdReTVs/mdPHP/mdReQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		?>
		<!-- Font Icons css -->
        <link rel="stylesheet" href="<?php echo $smURLPARENt;?>club/clubstore/csassets/css/font-icons.css">
 
        
		<input type="hidden" id="mdADStvID">
		<input type="hidden" id="mdGINcounts">
		<input type="hidden" id="mdGYIndex">
		
		<input type="hidden" id="sinitPeechId">
	    <input type="hidden" id="speechSTVLangageID">
	    <div class="speechHOMes translate"><blockquote>Welcome TO INDEX TV.</blockquote></div>
		
<script>
	let startSPEEchLOoP = false, windowReady = false,
	    voiceReady = false, sPeechId = "", sPeechNEXTId="", 
		mdGallerY, mdViDeo, mdADStvID;
		
		mdADStvID = "";	
   
    
	$(document).ready(function(e)
	{  
	    mdGallerY = document.getElementById("lightgallery");
		
	    document.querySelector("#google_translate_element select").addEventListener("change", () => {
		    let fm = "";
			
			mdLANchange();
			mdSWLNdirection();
			
			$("#speechVoices").html("");
            SpeechSynthsisUttrnce();
		    fm   = $("#sinitPeechId").val();
            sPInitchTVsTARt("speechcancel",fm);
			sPInitchTVsTARt("speechSTart",fm);
			
		});
		
        mdGallerY.addEventListener('onAfterOpen',function(e)
	    { 
		    $(".tvItemsFirstLOADBEFORE").addClass("hide");
		    tvINDexFEtchTOsliders();

	        SpeechSynthsisUttrnce();
		
		    sPeechId     = $(".speechARTIcLeTv").first().attr("id");
		    $("#sinitPeechId").val(sPeechId);
		
		    sPInitchTVsTARt("speechHOMes","");
		    setTimeout(function()
		    {
			    sPInitchTVsTARt("speechSTart",sPeechId);
			},3000);			
		});
	
	    mdGallerY.addEventListener('onAfterSlide',function(e)
	    {   
		    let mdGINcounts, mdADStvIDs, mdADStvID, mdthstart, mdthend, 
			    mdADsbrk ,mdADsbreak;
		    SpeechSynthsisUttrnce();
		    const {index,prevIndex} = e.detail;
		
		    $("#mdGYIndex").val(index);
			
			mdADsbrk = 0;
			mdADsbreak = $("#mdADsbreak").val();
		    if(index != 0)
		    {
			    sPInitchTVsTARt("speechcancel",sPeechId);
		        $(".speechARTIcLeTv").each(function()
			    {
				    if($(this).attr("fm") != sPeechId)
				    {
					    sPeechId  = $(this).attr("id");
						mdADStvID = $(this).attr("md");
						mdthstart = $(this).attr("mdthstart");
						mdthend   = $(this).attr("mdthend");
						$("#mdADStvID").val(mdADStvID);
						
					    return sPeechId;
					}
				});
				
				mdIndex = index * 1 + 1;
		        //mdGINcounts = mdIndex / 5;
				//mdGINcounts = mdIndex;
				
				mdGADcounts = mdIndex / 5;
				
				mdGADcounts = parseInt(mdGADcounts);
				mdGADcounts = mdGADcounts * 5;
				if(mdIndex == mdGADcounts)
				    $("#mdADStvID").val("ads");
				
				$("#mdGINcounts").val(mdIndex);
			    mdADStvIDs = $("#mdADStvID").val();
			    $("#sinitPeechId").val(sPeechId);

			    sPInitchTVsTARt("speechSTart",sPeechId);
                			
		        if(mdADStvIDs == "ads")
		        {
					$('video.mdGTVdcounts'+mdIndex).attr("autoplay",true);
					$('video.mdGTVdcounts'+mdIndex).parent().addClass("mdGTVfixed");
				}
				else
				{
					$('video.mdGTVdcounts').removeAttr("autoplay");
					$('video.mdGTVdcounts').parent().removeClass("mdGTVfixed");
				}
				
                setTimeout(function()
			    {
				    mdGTVcounts(sPeechId,index);
				},3000);

                setTimeout(function()
				{
					//console.clear();
				    console.log("<br> mdADStvID:"+mdADStvID+"<br>");
				    console.log("<br> index:"+index+"<br>");
					console.log("<br> mdIndex:"+mdIndex+"<br>");
					console.log("<br> mdGADcounts:"+mdGADcounts+"<br>"); 
					console.log("<br> mdADsbreak:"+mdADsbreak+"<br>"); 
					
				    console.log("<br> sPeechId:"+sPeechId+"<br>");
					console.log("<br> mdthstart:"+mdthstart+"<br>");
					console.log("<br> mdthend:"+mdthend+"<br>"); 
				},3000);				
			}
		    else
	        {	
                //sPeechId = 0;	
			}
			
		});
	
	    mdGallerY.addEventListener("onBeforeSlide", function(e)
	    {
		    SpeechSynthsisUttrnce();
		    const {index,prevIndex} = e.detail;
		
		    mdTRNSitionLAYout();
		});
	
	    document.addEventListener('fullscreenchange',function()
	    {
		    if(document.fullscreenElement !== null)
		    {
				//console.clear();
				//console.log("<br> fullscreenchange: fullscreenchange");
			}
		    else
		    {
			    $(".lg-toolbar button.lg-close").click();
			}
		});
		
		mdGallerY.addEventListener('onBeforeClose',function(e)
	    {
	        tvItemsFirstLOADNONE();	
		});
	});
	
	function mdONsPstart(sPchText)
	{
		mdADStvIDs = $("#mdADStvID").val();
		sPchTexts = sPchText.trim();

		if(mdADStvIDs == "ads")
		{
			mdONschPstrt(sPchTexts);
			//mdONsPend(sPchTexts);
		}
		else
			responsiveVoice.speak(sPchTexts,$('#speechVoices').val(),{onstart:()=> mdONschPstrt(sPchTexts),onend:()=> mdONsPend(sPchTexts)});
	
	    if($("div.lg-outer").hasClass("lg-show-autoplay") == false)
		{
			$(".lg-autoplay-button").click();
		}
	}
		
	function mdONsPend(sPchText)
	{
			let mdGINcounts, mdADStvIDs, mdIndex;
		    //console.clear();
			
			mdGINcounts = $("#mdGINcounts").val();
			mdADStvIDs  = $("#mdADStvID").val();
			mdIndex     = $("#mdGYIndex").val();
			sPchTexts = sPchText.trim();
			console.log("<br> sPchText:"+sPchTexts);
			if(mdADStvIDs == "ads")
			{
				
			}
			else
			{
				setTimeout(function()
				{
					$(".lg-actions> button.lg-next").click();
				    if(mdIndex == "" || mdIndex == 0)
				    {
					    //$(".lg-actions> button.lg-next").click();
					}
					//$("div.lg-outer").addClass("lg-show-autoplay");
				},1000);
			}
			
			if($("div.lg-outer").hasClass("lg-show-autoplay") == false)
			{
				$(".lg-actions> button.lg-next").click();
				$(".lg-autoplay-button").click();
			}
	}
		
	function mdONschPstrt(sPchText)
	{
			mdGINcounts = $("#mdGINcounts").val();
			mdADStvIDs  = $("#mdADStvID").val();
			
			if(mdADStvIDs == "ads")
			{
				//$('video.mdGTVdcounts'+mdGINcounts).attr("autoplay",true);
				//$('video.mdGTVdcounts'+mdGINcounts).click();
			    mdViDeo = document.querySelector('video.mdGTVdcounts.mdGTVdcounts'+mdGINcounts);
			    if(mdViDeo.readyState)
			    {
				    mdVTimes  = mdViDeo.duration;
					
					mdVTimess = mdVTimes % 60;
					mdVTimess = mdVTimess * 1000;
					mdVTimess = mdVTimess * 1 + 2;
				    console.log("<br> mdVTimes:"+mdVTimess);
					setTimeout(function()
					{
						$(".lg-actions> button.lg-next").click();
					},mdVTimess);
				}
			}
			
	}
	
	function mdTRNSitionLAYout()
	{
			mdADStvIDs  = $("#mdADStvID").val();
			
			$(".mdGTOleft").addClass("mdGTvleft");
			$(".mdGTOright").addClass("mdGTvright");
			$(".mdTVTheme2_header").addClass("mdTOPheader");
			$(".mdTVTheme2_Pdetails").addClass("mdTOPheader");
			$(".mdTVTheme2_footer").addClass("mdBOTTOMfooter");
			$(".mdTVTheme2_owPHoto").addClass("mdLeFTheader");
			$(".mdTVTheme2_owQR").addClass("mdRIGHTheader");

				setTimeout(function(){
					$(".mdGTOleft").removeClass("mdGTvleft");
			        $(".mdGTOright").removeClass("mdGTvright");
					$(".mdTVTheme2_header").removeClass("mdTOPheader");
			        $(".mdTVTheme2_Pdetails").removeClass("mdTOPheader");
			        $(".mdTVTheme2_footer").removeClass("mdBOTTOMfooter");
			        $(".mdTVTheme2_owPHoto").removeClass("mdLeFTheader");
			        $(".mdTVTheme2_owQR").removeClass("mdRIGHTheader");
				},2000);
			
	}
	
	function SpeechSynthsisUttrnce()
	{
		$("#speechVoices").html("");
		let speechSTVLangage = $("#google_translate_element select").val().toLowerCase();
		if(speechSTVLangage == "")
		{
			speechSTVLangage = "us";
		}
		else if(speechSTVLangage == "en")
		{
			speechSTVLangage = "us";
		}
		else if(speechSTVLangage == "es")
		{
			speechSTVLangage = "es";
		}
		else if(speechSTVLangage == "fa")
		{
			speechSTVLangage = "ar";
		}
		else if(speechSTVLangage == "tr")
		{
			speechSTVLangage = "tu";
		}
		else if(speechSTVLangage == "is")
		{
			speechSTVLangage = "ic";
		}
		
        let voices = [];
		let voicePrefix;
		
		var voicelist = responsiveVoice.getVoices();
        var vselect = $("#speechVoices");
        $.each(voicelist, function() 
		{
			voicePrefix = this.name.substring(0,2).toLowerCase();		
			//console.log("<br>lang is :"+speechSTVLangage);
			//console.log("<br>voicePrefix is :"+voicePrefix);

			if(voicePrefix.match(speechSTVLangage))
			{
				vselect.append($("<option />").val(this.name).text(this.name));
				if(speechSTVLangage == "ar")
				{
					$("#speechVoices").find("option").attr("value","Arabic Female");
				}
				else if(speechSTVLangage == "uk")
				{
					$("#speechVoices").find("option").attr("value","Ukrainian Female");
				}
				else if(speechSTVLangage == "ur")
				{
					$("#speechVoices").find("option").attr("value","Urdu Pakistan");
				}
				else if(speechSTVLangage == "tr")
				{
					$("#speechVoices").find("option").attr("value","Turkish Female");
					$("#speechVoices").find("option").attr("value","Turkish Male");
				}
				
			}
        });	
		
		document.querySelector("#speechRate").addEventListener("input", () => {
            const rate = document.querySelector("#speechRate").value;
            responsiveVoice.rate = rate;
            document.querySelector("#speechRateLabel").innerHTML = rate;
        });
		
		document.querySelector("#speechVolume").addEventListener("input", () => {
            const volume = document.querySelector("#speechVolume").value;
            responsiveVoice.volume = volume;
            document.querySelector("#speechVolumeLabel").innerHTML = volume;
        });

        document.querySelector("#speechPitch").addEventListener("input", () => {
            const pitch = document.querySelector("#speechPitch").value;
            responsiveVoice.pitch = pitch;
            document.querySelector("#speechPitchLabel").innerHTML = pitch;
        });
        
        document.querySelector("#speechVoices").addEventListener("change", () => {
			let fm = $("#sinitPeechId").val();
            sPInitchTVsTARt("speechcancel",fm);
			sPInitchTVsTARt("speechSTart",fm);
        });
		
	}
	
	function speechTVsTARatNOw(id)
	{
		let fmId = $(id).attr("id");
		let fm   = $("#sinitPeechId").val();
		if(fmId == "speechSTart")
		{
			let speechText = document.querySelector(".speechARTIcLeTv"+fm).textContent;
                mdONsPstart(speechText);
		}
		else if(fmId == "speechPause")
		{
			responsiveVoice.pause();
		}
		else if(fmId == "speechResume")
		{
			responsiveVoice.resume();
		}
		else
		{
			responsiveVoice.cancel();
			$(".tvTXTtOSpeech").removeClass("tvtOStart");
			sptchINIt = false;
		}
		
	}
	    
	function sPInitchTVsTARt(fmId,fm)
	{
		let speechText = "";
		if(fmId == "speechHOMes")
		{
			speechText = document.querySelector(".speechHOMes").textContent;
            mdONsPstart(speechText);
		}
		else if(fmId == "speechSTart")
		{
			speechText = document.querySelector(".speechARTIcLeTv"+fm).textContent;
            mdONsPstart(speechText);
		}
		else if(fmId == "speechPause")
		{
			responsiveVoice.pause();
		}
		else if(fmId == "speechResume")
		{
			responsiveVoice.resume();
		}
		else
		{
			responsiveVoice.cancel();
			$(".tvTXTtOSpeech").removeClass("tvtOStart");
			sptchINIt = false;
		}
		
	}
	
    function tvItemsFirstLOADNONE()
	{
		sPInitchTVsTARt("speechPause","");
		mdBeFOReTVs(1);
	}
	
	function speechTVset()
	{
		if($(".tvTXTtOSpeech").hasClass("tvtOStart"))
		{
			$(".tvTXTtOSpeech").removeClass("tvtOStart");
		}
		else
		{
			$(".tvTXTtOSpeech").addClass("tvtOStart");
		}
	}
		
	function PreviewTVitem()
	{
		let mdPreviewRow;
		    mdPreviewRow = $(".mdPreviewTV li").first().attr("id");
			
			//console.clear();
			//console.log("<br><br> mdPreviewRow:"+mdPreviewRow+"<br><br>");
			
			if(mdPreviewRow != "")
			{
				$("#"+mdPreviewRow).click();
				//mdSCRestart();
			}
			else
			{
				$(".preview_tv_item").click();
				//mdSCRestart();
			} 
			
	}
	
	function mdSCRestart()
	{
		//$("button.lg-fullscreen").click();
		mdSWLNdirection();
		setInterval(function()
		{
			if($("body").hasClass("lg-on"))
			if($("div.lg-outer").hasClass("lg-fullscreen-on") == false)
		    {
				//$("button.lg-fullscreen").click();
			}
			
		},20000);
		
		mstart  = 0;
		mscales = 0;
		mdLGIMzooms(mstart,mscales);
	}
	
	function mdLGIMzooms(mstart,mscales)
	{
		let msdirection;
			msdirection = "center";
		    setInterval(function()
		    {
				mstart++;
				
				if(mstart == 10)
					mstart = 0;
				
				if(mstart < 5)
			    {
					mscales++;
				}
				else
			    {
					mscales--;
				}
				
			    //$(".lg-img-wrap> img.lg-image").css({'transform-origin': ''+msdirection+''});
			    $(".lg-img-wrap> img.lg-image").css({'transform': 'scale(1.'+mscales+')'}); 
			},2500);
	}

	
</script>

		<?php
		if($dfAction == "mdTv")
		{
			$dfKNd = $_POST['dfKNd'];
			$md    = $_POST['md'];
			$fblNAVcurrencyNAME = "USD";
			
			$mdMAPscncYVLUe  = $_POST['mdMAPscurrencYVLUe'];
			$mdMAPscurrencY  = $_POST['mdMAPscurrencY'];
			$mdMAPsSize      = $_POST['mdMAPsSize'];
			$mdMAPsSizeVLUe  = $_POST['mdMAPsSizeVLUe'];
			
			$mdMAPscountries = $_POST['mdMAPscountries'];
			$mdMAPscities    = $_POST['mdMAPscities'];
			$mdMAPsaddress   = $_POST['mdMAPsaddress'];
			$mdMAPssearchBOx = $_POST['mdMAPssearchBOx'];

			$mdSROsaleVLUes  = $_POST['mdSROsaleVLUes'];
			$mdSResDNeVLUes  = $_POST['mdSResDNeVLUes'];
			$mdSBedsVLUes    = $_POST['mdSBedsVLUes'];
			$mdSBthsVLUes    = $_POST['mdSBthsVLUes'];
			$mdSPricesVLUes  = $_POST['mdSPricesVLUes'];
			$mdSAreasVLUes   = $_POST['mdSAreasVLUes'];
			$mdastmnPrice    = $_POST['mdastmnPrice'];
			$mdastmxPrice    = $_POST['mdastmxPrice'];
			
			if(!empty($mdSBedsVLUes))
			{
				$mdSBedsVLUes = $mdSBedsVLUes.",";
			}
			
			if(!empty($mdSBthsVLUes))
			{
				$mdSBthsVLUes = $mdSBthsVLUes.",";
			}
			
			if(!empty($mdSResDNeVLUes))
			{
				$mdSResDNeVLUes = trim($mdSResDNeVLUes.",");
			}
			
			$bzSRes  = array(",");

			$bzSROsaleVLUss = bzTVROIMDNxsls(0,$mdSROsaleVLUes);
			$bzROIWHre      = bzTVROIMDNxsls(2,$mdSROsaleVLUes);
			
			$mdROIPID = 0;
			if($bzROIWHre == "ded")
			    $mdROIPID = 1;

			$mdSReQPRICeDs  = mdTVPriCes("mdPrice","mdPrices",$mdMAPsSizeVLUe,$mdMAPscurrencYVLUe,$mdSPricesVLUes,"");
			$mdSReQAReADs   = mdTVPriCes("mdArea","mdAreas",$mdMAPsSizeVLUe,$mdMAPscurrencYVLUe,$mdSAreasVLUes,"");
			$mdGLBSchFULLs  = mdTVschFULLs($mdSBedsVLUes,$mdSBthsVLUes,$mdSResDNeVLUes,"find");
			$mdGLBSZOoMs    = mdTVGLBSZOoMs($mdfGeTzOooOm,$mdROIPID,$bzSROsaleVLUss,"map");
            $dfLOcSchs      = mdTVLOcSearchs($mdMAPscountries,$mdMAPscities,$mdMAPsaddress,$mdMAPssearchBOx);
			
			$mdVPRICeDs     = $mdSReQPRICeDs.$mdSReQAReADs;
			$sWHRes         = $mdGLBSZOoMs.$dfLOcSchs.$mdVPRICeDs.$mdGLBSchFULLs;
			
			?>
			<div class="container imgLightbox">
                <div class="ct-section--products">
                    <div class="row">
                        <div class="col-md-12 demo-gallery">
                            <ul id="lightgallery" class="mdPreviewTV list-unstyled row">
							    <?php 
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
		                                        LIMIT 0,20 ";		
				
				                    $tWHRes = $tWHRe.$sWHRes.$tORDer;
				                    $mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
									
									if(mysqli_num_rows($mdQuery) > 0)
									{
										mdTVLOads($mdQuery,$dfKNd,$md);
									}
									else
									{
										mdTVLOademPTY();
									}
								}
								?>
							</ul>
						</div>	
					</div>	
				</div>	
			</div>	
			<?php
			exit();
		}	
	}