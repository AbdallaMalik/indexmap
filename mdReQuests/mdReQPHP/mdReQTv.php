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
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		?>
		<!-- Font Icons css -->
        <link rel="stylesheet" href="<?php echo $smURLPARENt;?>club/clubstore/csassets/css/font-icons.css">
 
		<input type="hidden" id="sinitPeechId">
	    <input type="hidden" id="speechSTVLangageID">
	    <div class="speechHOMes"><blockquote>Welcome TO INDEX TV.</blockquote></div>
		
	<script>
       
	let startSPEEchLOoP = false;
    let windowReady = false;
    let voiceReady = false;     
    let sPeechId = "",sPeechNEXTId="";	
	
	document.querySelector("#google_translate_element select").addEventListener("change", () => {
		$J("#speechVoices").html("");
        SpeechSynthsisUttrnce();
		let fm   = $J("#sinitPeechId").val();
        sPInitchTVsTARt("speechcancel",fm);
	    sPInitchTVsTARt("speechSTart",fm);
    });
	
	function SpeechSynthsisUttrnce()
	{
		$J("#speechVoices").html("");
		let speechSTVLangage = $J("#google_translate_element select").val().toLowerCase()
		if(speechSTVLangage == "")
		{
			speechSTVLangage = "us";
		}
		else if(speechSTVLangage == "en")
		{
			speechSTVLangage = "us";
		}
		else if(speechSTVLangage == "sp")
		{
			speechSTVLangage = "es";
		}
		else if(speechSTVLangage == "fa")
		{
			speechSTVLangage = "ar";
		}
 
        let voices = [];
		let voicePrefix;
		
		var voicelist = responsiveVoice.getVoices();
        var vselect = $J("#speechVoices");
        $.each(voicelist, function() 
		{
			voicePrefix = this.name.substring(0,2).toLowerCase();		
			console.log("lang is :"+speechSTVLangage);
			if(voicePrefix.match(speechSTVLangage))
			{
				vselect.append($J("<option />").val(this.name).text(this.name));
				if(speechSTVLangage == "ar")
				{
					$J("#speechVoices").find("option").attr("value","Arabic Female");
				}
			}
        });	
		
		document.querySelector("#speechRate").addEventListener("input", () => {
            const rate = document.querySelector("#speechRate").value;
            responsiveVoice.rate = rate;
            document.querySelector("#speechRateLabel").innerHTML = rate;
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
			let fm   = $J("#sinitPeechId").val();
            sPInitchTVsTARt("speechcancel",fm);
			sPInitchTVsTARt("speechSTart",fm);
        });
	
	}
	
	
	function speechTVsTARatNOw(id)
	{
		let fmId = $J(id).attr("id");
		let fm   = $J("#sinitPeechId").val();
		if(fmId == "speechSTart")
		{
			let speechText = document.querySelector(".speechARTIcLeTv"+fm).textContent;
            responsiveVoice.speak(speechText,$J('#speechVoices').val());
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
			$J(".tvTXTtOSpeech").removeClass("tvtOStart");
			sptchINIt = false;
		}
	}
	    
	function sPInitchTVsTARt(fmId,fm)
	{
		let speechText = "";
		if(fmId == "speechHOMes")
		{
			speechText = document.querySelector(".speechHOMes").textContent;
            responsiveVoice.speak(speechText,$J('#speechVoices').val());
		}
		else if(fmId == "speechSTart")
		{
			//let sPeechId =  (".speechARTIcLeTvId").val();
			speechText = document.querySelector(".speechARTIcLeTv"+fm).textContent;
            responsiveVoice.speak(speechText,$J('#speechVoices').val());
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
			$J(".tvTXTtOSpeech").removeClass("tvtOStart");
			sptchINIt = false;
		}
	}
	
    document.getElementById("lightgallery").addEventListener('onAfterOpen',function(e)
	{ 
		$J(".tvItemsFirstLOADBEFORE").addClass("hide");
		tvINDexFEtchTOsliders();
	    SpeechSynthsisUttrnce();
		
		sPeechId     = $J(".speechARTIcLeTv").first().attr("id");
		$J("#sinitPeechId").val(sPeechId);
		
		sPInitchTVsTARt("speechHOMes","");
		setTimeout(function()
		{
			sPInitchTVsTARt("speechSTart",sPeechId);
		},3000);	
	});
	
	document.getElementById("lightgallery").addEventListener('onAfterSlide',function(e)
	{   
		SpeechSynthsisUttrnce();
		const {index,prevIndex} = e.detail;
			
		if(index != 0)
		{
			sPInitchTVsTARt("speechcancel",sPeechId);
		    $J(".speechARTIcLeTv").each(function()
			{
				if($J(this).attr("fm") != sPeechId)
				{
					sPeechId = $J(this).attr("id");
					return sPeechId;
				}
			});
			$J("#sinitPeechId").val(sPeechId);
			sPInitchTVsTARt("speechSTart",sPeechId);	
		}
		else
	    {				
		}
	});
	
	document.addEventListener('fullscreenchange',function()
	{
		if(document.fullscreenElement !== null)
		{
		}
		else
		{
			$J(".lg-toolbar button.lg-close").click();
		}
	});
	
    function tvItemsFirstLOADNONE()
	{
		sPInitchTVsTARt("speechPause","");
		mdBeFOReTVs(1);
	}
	
	function speechTVset()
	{
		if($J(".tvTXTtOSpeech").hasClass("tvtOStart"))
		{
			$J(".tvTXTtOSpeech").removeClass("tvtOStart");
		}
		else
		{
			$J(".tvTXTtOSpeech").addClass("tvtOStart");
		}
	}
		
    </script> 
	
		<?php
		if($dfAction == "mdTv")
		{
			$dfKNd = $_POST['dfKNd'];
			$md    = $_POST['md'];
			$fblNAVcurrencyNAME = "";
			$fnAcINDEXchanges = fnAcurrencYINDEXchanges();
			?>
			
			<div class="container imgLightbox">
                <div class="ct-section--products">
                    <div class="row">
                        <div class="col-md-12 demo-gallery">
                            <ul id="lightgallery" class="list-unstyled row">
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
				
				                    $tWHRes = $tWHRe.$tORDer;
				                    $mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
									
									if(mysqli_num_rows($mdQuery) > 0)
									{
										mdTVLOademPTY();
										//mdTVLOads($mdQuery,$dfKNd,$md);
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