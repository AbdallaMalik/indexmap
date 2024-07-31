    <link href="<?php echo $smURLPARENt;?>homes/tv-assets/tv/css/lightgallery.css" rel="stylesheet">
    <link href="<?php echo $smURLPARENt;?>homes/tv-assets/tv/css/lg-transitions.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/mdTVLst.css" />
	
	<div class="mdGOOGLstart">
        <div id="google_translate_element" class="mdGOOGLstartran">
		    <select style="">
			    <option value="en">English</option>
				<option value="ar">Arabic</option>
			</select>
	    </div>
    </div>
		
    <?php  $fnAtransalteTVtoSPEEch = fnAtransalteTVtoSPEEch("");  ?>
    <div class="mdCONTRoLtv">
	    <div id="tvTXTtOSPchDEATch" class="mdCONTRoLtves"><?php echo $fnAtransalteTVtoSPEEch;?></div>
    </div>
    <input id="speechSTVLangage" type="hidden" value="en">	
	
	<input id="tvINDexFEtchTOslidersID" type="hidden">
    <input id="tvINDexDevs_ID" type="hidden">
	<input type="hidden" id="sinitPeechId">
	<input type="hidden" id="speechSTVLangageID">
	
	<div class="tvItemsFirstLOAD">
	    <div id="tvItemsFirstLOAD"> </div>
		<div class="tvItemsFirstLOADBEFORE"></div>
	</div> 
	
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lightgallery.js"></script>	
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-pager.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-autoplay.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-fullscreen.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-zoom.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-hash.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-share.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-rotate.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=xkSYLKKb"></script>  
    
<script>	
	//////////////////tv/////////
	mdGOOGLstart();
	function mdGOOGLstart()
	{
		googleTranslateElementInit = function() 
	    {   
		    $J("#google_translate_element").html("");  
	        new google.translate.TranslateElement (
		    {   pageLanguage:'en',
		        autoDisplay: 'true',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
			},
			'google_translate_element');     
		}
	}
	
	function mdBeFOReTVs(md)
	{
		$J(".astMOReIMAPsLIST").addClass("hide");
		$J(".mdInitaiteMAPs").addClass("mdInitaiteMAPins");
		$J(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
		
		if(md == 1)
		{
			$J(".overlay_tv_language").detach().appendTo(".mdGOOGLstart");						
		    $J(".tvTXTtOSpeech").detach().appendTo(".mdCONTRoLtv");
			$J(".tvItemsFirstLOADBEFORE").html("<div><span>CLOSING TV...</span></div>");
			$J(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			
			setTimeout(function()
			{
				$J(".astMOReIMAPsLIST").removeClass("hide");
			    $J(".mdInitaiteMAPs").removeClass("mdInitaiteMAPins");
				$J(".tvItemsFirstLOADBEFORE").html("<div><span>CLOSING TV...</span></div>");
		        $J("div#tvItemsFirstLOAD").html("");
				
			},500);
			
			setTimeout(function()
			{
				$J(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
			},700);
		}
	}
	
	function mdOPeNtv(id)
	{
		let dfAction, dfKNd, md, mYDroPURL;
		
		    dfAction  = "mdTv";
			dfKNd     = $J(id).attr("dfKNd");
			md        = "";
		    mYDroPURL = "<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQTv.php";
			$J(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			console.log("<br> : start");
			mdBeFOReTVs(0);
		$.ajax({
		   url:mYDroPURL,
		   method:'POST',
		   data:{dfAction:dfAction,dfKNd:dfKNd,md:md},
		   beforeSend:function()
		   {
			   $J(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			   $J(".tvItemsFirstLOADBEFORE").html("<div><span>STARTING TV...</span></div>");
			   $J("div#tvItemsFirstLOAD").html("");
			   console.log("<br> : before");
		   },
		    success:function(res)
		    {
			   $J("div#tvItemsFirstLOAD").html(res);
			   $J(".tvItemsFirstLOADBEFORE").html("");
			   $J(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
			   
			   console.log("<br> : done");
			   loaddefaulttHOEsTv();
			   $J(".lg-toolbar").append('<div class="homesIndexFsliders astFlex">'+
			                                '<div class="overlay_layerTVFooter astFlex">'+
												    '<div class="overlay_layerTVFooterInn astFlex">'+
													    
			                                            '<div class="homeTVIndexBDYtitle astFlex">'+
				                                            '<h4 class="astFlex">P.Index</h4>'+
				                                        '</div>'+
				                                        '<div class="homeTVIndexBDY homeIndexBDY">'+
				                                            '<marquee class="homNdexMARQuee">'+
				                                                '<ul class="nav navbar-nav homeTVIndexBDYul"></ul>'+
					                                        '</marquee>'+	
                                                        '</div>'+
			                                        '</div>'+
									        '</div>'+ 
			                            '</div>');
										
				$J(".lg-toolbar").append('<div class="overlay_tv_language text-uppercase"></div>');
				$J(".lg-toolbar").append('<div class="tvTXTtOSpeech"></div>');
				
				//$J(".overlay_tv_language").html("");
			    //$J(".tvTXTtOSpeech").html("");
				
				$J("#google_translate_element").detach().appendTo(".overlay_tv_language");						
			    $J("#tvTXTtOSPchDEATch").detach().appendTo(".tvTXTtOSpeech");
		   }
		}); 
	}
	
	function loaddefaulttHOEsTv()
	{
        lightGallery(document.getElementById('lightgallery'),{
			    fullscreen:true,
			    autoplay:true,
				loop:true,
				mode: 'lg-zoom-in-big',
				cssEasing:'cubic-bezier(0.2,0,0.3,1)',
				pause:30000,
				speed:1000,
				progressBar:false,
				height:'100%',
				width:'100%',
				controls:false,
				closable:true,
				escKey:false,
				counter:false,
				startClass:'lg-zoom-in-big',
				pager:false,
				hash:false,
				zoom:false,
				selector:'.preview_tv_item',
				hideBarsDelay:6600000
		});
		
        $J(".preview_tv_item").click();
		var scrollingElement = (document.scrollingElement || document.body);
		scrollingElement.scrollTop = scrollingElement.scrollHeight;
        $J("button.lg-fullscreen").click();	
		
		/////
		console.log("<br> : gallery");
		let tvSTARTItems = document.getElementById("lightgallery");
	    
		tvSTARTItems.addEventListener('onBeforeClose',function(e)
	    {
	        tvItemsFirstLOADNONE();
		});
	} 
	 
	function tvINDexFEtchTOsliders()
	{
	    let dfAction, dfKNd, md, mYDroPURL, fm, fmId;
		
		    dfAction  = "mdTv";
			dfKNd     = "mdGTv";
			md        = "";
		    mYDroPURL = "<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQProPertYies.php";
			
		    fm     = $J("#tvINDexFEtchTOslidersID").val();
		    fmId   = $J("#tvINDexDevs_ID").val();
		$.ajax({
		   url:mYDroPURL,
		   method:'POST',
		   data:{dfAction:dfAction,dfKNd:dfKNd,fm:fm,fmId:fmId},
		   beforeSend:function()
		   {
		   },
		   success:function(res)
		   {
			   $J(".homeTVIndexBDYul").html(res);
		   }
		}); 
		
	} 
</script>
