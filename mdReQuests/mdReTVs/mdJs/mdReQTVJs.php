    <link href="<?php echo $smURLPARENt;?>homes/tv-assets/tv/css/lightgallery.css" rel="stylesheet">
    <link href="<?php echo $smURLPARENt;?>homes/tv-assets/tv/css/lg-transitions.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/mdReQtv.css" />
	
	<div class="mdGOOGLstart">
        <div id="google_translate_element" class="mdGOOGLstartran">
		    
			<select style="">
			    <option value="en">English</option>
				<option value="ar">Arabic</option>
			</select>
           
	    </div>
    </div>
		
    <?php 	
	$fnAtransalteTVtoSPEEch = fnAtransalteTVtoSPEEch("");  
	?>
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
	
    <!--<script src="<?php echo $smPATH;?>mdAssets/js/lightGallery.js"></script>-->
	<script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-pager.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-autoplay.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-fullscreen.js"></script>
	
	<script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-zoom.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-hash.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-share.js"></script>
    <script src="<?php echo $smURLPARENt;?>homes/tv-assets/tv/js/lg-rotate.js"></script>
	
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=xkSYLKKb"></script>  
<style>
.mdsPeechARTIcLeTv{
	display:flex !important;
	background-color:#fff;
	position:fixed;
	height:40px;
	justify-content:flex-start;
	align-items:center;
	bottom:40px;
	left:0;
	right:0;
	overflow:hidden;
	opacity:0;
	gap:5px;
	flex-flow:wrap;
	padding:0px 15px;
	flex-wrap:row;
}
.mdsPeechARTIcLeTv.theme2{
	bottom:320px;
	right:0;
	height:initial;
	width:300px;
	padding:15px;
	flex-flow:column;
	border-radius:0px 3px 3px 0px;
	line-height:initial;
}
.mdsPeechARTIcLeTv h1,
.mdsPeechARTIcLeTv p{
	color:#000 !important;
	font-size:12px;
	display:flex;
	justify-content:flex-start;
	align-items:center;
	padding:0px;
	margin:0px;
	flex-wrap:row;
	line-height:initial;
}
.mdsPeechARTIcLeTv.theme2 h1,
.mdsPeechARTIcLeTv.theme2 p{
	flex:calc(100% / 1);
	width:100%;
}
.lg-img-wrap{
}
.lg-img-wrap img.lg-image{
	transition:2.5s !important;
}
.mdGOoGledirection .mdsPeechARTIcLeTv,
.mdGOoGledirection .mdTVTheme2_footer,
.mdGOoGledirection .mdTVTheme2_header,
.mdGOoGledirection .homesIndexFsliders,
.mdGOoGledirection marquee a{
	direction:rtl;
}
.mdGOoGledirection marquee{
	direction:ltr;
}
.lg-on .mdGOOGLstart
{
	z-index: 999902 !important;
    top: 10px;
    left: calc(50% - 75px);
    right: auto;
    width: 150px;
}
@media (max-width:767px)
{
	.mdsPeechARTIcLeTv{
		opacity:0;
	}
}

</style>  
    <script src="<?php echo $smPATH;?>mdAssets/js/mdfscreen.js"></script>
<script>	
	//////////////////tv/////////

	$(document).ajaxStart(function(){
		console.log("<br> ajaxStart:done");
		
	})
	
	$(document).ready(function(e)
	{
		mdGOOGLstart();
		console.log("<br> ready:done");
		$(".mdOPeNGentv").click(function(e)
		{
			if (screenfull.isFullscreen !== true)
			{
                screenfull.toggle();
			}
			
			mdOPeNGentv($(this));
		});
	});
	
	function mdGOOGLstart()
	{
		googleTranslateElementInit = function() 
	    {   
		    $("#google_translate_element").html("");  
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
		$(".astMOReIMAPsLIST").addClass("hide");
		$(".mdInitaiteMAPs").addClass("mdInitaiteMAPins");
		$(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
		if(md == 1)
		{
			//$(".overlay_tv_language").detach().appendTo(".mdGOOGLstart");						
		    $(".tvTXTtOSpeech").detach().appendTo(".mdCONTRoLtv");
			$(".tvItemsFirstLOADBEFORE").html("<div><span>CLOSING TV...</span></div>");
			$(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			
			setTimeout(function()
			{
				$(".astMOReIMAPsLIST").removeClass("hide");
			    $(".mdInitaiteMAPs").removeClass("mdInitaiteMAPins");
				$(".tvItemsFirstLOADBEFORE").html("<div><span>CLOSING TV...</span></div>");
		        $("div#tvItemsFirstLOAD").html("");
				
			},500);
			
			setTimeout(function()
			{
				$(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
			},700);
		}
	}
	
	function mdOPeNGentv($id)
	{
		let dfAction, dfKNd, md, mYDroPURL, mdchFScreen, 
		    mdtitle, mdDTLimits, mdMAPscountries, mdMAPscities, 
			mdMAPsdistrict, mdMAPsareas, mdMAPsaddress ,mdMAPsbuilds,
			mdMAPsPname, mdMAPsSize, mdMAPscurrencY, mdMAPssearchBOx,
			mdSROsaleVLUes ,mdSResDNeVLUes ,mdSBedsVLUes ,mdSBthsVLUes,
			mdSPricesVLUes ,mdSAreasVLUes, mdfGeTzOooOm,
			mdastmnPrice,mdastmxPrice, mdSPricPMTsVLUs, 
			mdUNLOCkVALUes, mdsearchLstPAsnone, mdsearchLstOPsnone;
		
		    dfAction  = "mdTv";
			dfKNd     = $id.attr("dfKNd");
			md        = "";
			
			mdMAPscountries = $(".mdMAPscountries").val();
			mdMAPscities    = $(".mdMAPscities").val();
			mdMAPsdistrict  = $(".mdMAPsdistrict").val();
			mdMAPsareas     = $(".mdMAPsareas").val();
			mdMAPsaddress   = $(".mdMAPsaddress").val();
			mdMAPsbuilds    = $(".mdMAPsbuilds").val();
			mdMAPsPname     = $(".mdMAPsPname").val();
			mdMAPssearchBOx = $(".mdMAPssearchBOx").val();
			mdMAPsSize      = $(".mdMAPsSize").val();
			mdMAPscurrencY  = $(".mdMAPscurrencY").val();
			
			mdMAPsSizeVLUe     = $(".mdMAPsSizeVLUe").val();
			mdMAPscurrencYVLUe = $(".mdMAPscurrencYVLUe").val();
			
			mdastmnPrice    = mdSPricePMTsVLUs("min");
		    mdastmxPrice    = mdSPricePMTsVLUs("max");
			
			mdSROsaleVLUes  = $(".intsrSROsaleVLUes").val();
			mdSResDNeVLUes  = $(".intsrSResDNeVLUes").val();
			mdSBedsVLUes    = $(".intsrSBedsVLUes").val();
			mdSBthsVLUes    = $(".intsrSBthsVLUes").val();
			mdSPricesVLUes  = $(".intsrSPricesVLUes").val();
			mdSAreasVLUes   = $(".intsrSAreasVLUes").val();
			
			mdfGeTzOooOm    = "";//$("#defGeTzOooOm").val();
			mdDTLimits      = "";//$(".mdDTLimits").val();

		    mYDroPURL = "<?php echo $smPATH;?>mdReQuests/mdReTVs/mdHTML/mdReQTv.php";
			
			mdchFScreen = '<a href="javascript:void(0)" class="btn mdchFScreen" onclick="mdcheckFScreen(this)">fs</a>';
			$(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			
			console.log("<br> : start");
			mdBeFOReTVs(0);
			
		$.ajax({
		   url:mYDroPURL,
		   method:'POST',
		   data:{dfAction:dfAction,dfKNd:dfKNd,md:md, 
		         mdMAPscountries:mdMAPscountries, mdMAPscities:mdMAPscities, 
				 mdMAPsdistrict:mdMAPsdistrict, mdMAPsareas:mdMAPsareas, mdMAPsaddress:mdMAPsaddress,
				 mdMAPsbuilds:mdMAPsbuilds, mdMAPsPname:mdMAPsPname, mdMAPsSize:mdMAPsSize, 
				 mdMAPscurrencY:mdMAPscurrencY, mdMAPssearchBOx:mdMAPssearchBOx,
			     mdSROsaleVLUes:mdSROsaleVLUes, mdSResDNeVLUes:mdSResDNeVLUes, mdSBedsVLUes:mdSBedsVLUes,
				 mdSBthsVLUes:mdSBthsVLUes,mdSPricesVLUes:mdSPricesVLUes,mdSAreasVLUes:mdSAreasVLUes, 
				 mdfGeTzOooOm:mdfGeTzOooOm,mdMAPsSizeVLUe:mdMAPsSizeVLUe,mdMAPscurrencYVLUe:mdMAPscurrencYVLUe, 
				 mdastmnPrice:mdastmnPrice,mdastmxPrice:mdastmxPrice,mdDTLimits:mdDTLimits
		   },
		   beforeSend:function()
		   {
			   $(".tvItemsFirstLOADBEFORE").addClass("mdTVclose");
			   $(".tvItemsFirstLOADBEFORE").html("<div><span>STARTING TV...</span></div>");
			   $("div#tvItemsFirstLOAD").html("");
			   //console.clear();
		   },
		    success:function(res)
		    {
			   $("div#tvItemsFirstLOAD").html(res);
			   $(".tvItemsFirstLOADBEFORE").html("");
			   $(".tvItemsFirstLOADBEFORE").removeClass("mdTVclose");
			   
			   loaddefaulttHOEsTv();
			   $(".lg-toolbar").append('<div class="translate homesIndexFsliders astFlex">'+
			                                '<div class="overlay_layerTVFooter astFlex">'+
												    '<div class="overlay_layerTVFooterInn astFlex">'+
													    
			                                            '<div class="homeTVIndexBDYtitle astFlex">'+
				                                            '<h4 class="astFlex">C-Index</h4>'+
															'<span class="tvBTMProGss"></span>'+
				                                        '</div>'+
				                                        '<div class="homeTVIndexBDY homeIndexBDY">'+
				                                            '<marquee class="homNdexMARQuee">'+
				                                                '<ul class="nav navbar-nav homeTVIndexBDYul"></ul>'+
					                                        '</marquee>'+	
                                                        '</div>'+
			                                        '</div>'+
									        '</div>'+ 
			                            '</div>');
										
				$(".lg-toolbar").append('<div class="overlay_tv_language text-uppercase"></div>');
				$(".lg-toolbar").append('<div class="tvTXTtOSpeech"></div>');
				
				//$("#google_translate_element").detach().appendTo(".overlay_tv_language");						
			    $("#tvTXTtOSPchDEATch").detach().appendTo(".tvTXTtOSpeech");
			
				mdSCRestart();
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
				progressBar:true,
				height:'100%',
				width:'100%',
				//controls:false,
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
		 
		    PreviewTVitem();
	}
  	
	function tvINDexFEtchTOsliders()
	{
	    let dfAction, dfKNd, md, mYDroPURL, fm, fmId;
		
		    dfAction  = "mdTv";
			dfKNd     = "mdGTv";
			md        = "";
		    mYDroPURL = "<?php echo $smPATH;?>mdReQuests/mdReTVs/mdPHP/mdReQtvs.php";
			
		    fm     = $("#tvINDexFEtchTOslidersID").val();
		    fmId   = $("#tvINDexDevs_ID").val();
		$.ajax({
		   url:mYDroPURL,
		   method:'POST',
		   data:{dfAction:dfAction,dfKNd:dfKNd,fm:fm,fmId:fmId},
		   beforeSend:function()
		   {
		   },
		   success:function(res)
		   {
			   $(".homeTVIndexBDYul").html(res);
		   }
		}); 
	} 
	
	 ///////////////////////
    function mdGTVcounts(sPeechId,index)
	{
		let mdGTVcounts, mdADStvIDs, mdIndex;
	}

	function mdOPeNtv(id)
	{
		
	}
    
	function mdSWLNdirection()
	{
		let speechSTVLangage ;
		    speechSTVLangage = $("#google_translate_element select").val().toLowerCase();
	        
			$("body").removeClass("mdGOoGledirection");
			$(".homNdexMARQuee").removeAttr("direction");
			
			if(speechSTVLangage == "ar" || speechSTVLangage == "fa")
			{
				$("body").addClass("mdGOoGledirection");
				$("marquee").attr("direction","right");
				//$(".homNdexMARQuee").attr("direction","left");
			}
			
			
	}
	
	function mdLANchange()
	{
		//$(".lg-actions> button.lg-next").click();
		//$("div.lg-outer").addClass("lg-show-autoplay");
	}
	
    
	/*
    <select class="goog-te-combo" aria-label="أداة ترجمة اللغة"><option value="ar">العربية</option><option value="is">الآيسلندية</option><option value="az">الأذرية</option><option value="ur">الأردية</option><option value="hy">الأرمنية</option><option value="as">الأسامية</option><option value="es">الإسبانية</option><option value="eo">الإسبرانتو</option><option value="et">الإستونية</option><option value="af">الأفريقانية</option><option value="sq">الألبانية</option><option value="de">الألمانية</option><option value="am">الأمهرية</option><option value="en">الإنجليزية</option><option value="id">الإندونيسية</option><option value="or">الأوديا (الأوريا)</option><option value="om">الأورومية</option><option value="uz">الأوزبكية</option><option value="uk">الأوكرانية</option><option value="ug">الأويغورية</option><option value="ga">الأيرلندية</option><option value="it">الإيطالية</option><option value="ig">الإيغبو</option><option value="ilo">الإيلوكانو</option><option value="ay">الأيمارا</option><option value="ee">الإيوي</option><option value="eu">الباسكية</option><option value="ps">الباشتوية</option><option value="bm">البامبارا</option><option value="pt">البرتغالية</option><option value="bg">البلغارية</option><option value="pa">البنجابية</option><option value="bn">البنغالية</option><option value="bho">البوجبورية</option><option value="my">البورمية</option><option value="bs">البوسنية</option><option value="pl">البولندية</option><option value="be">البيلاروسية</option><option value="ta">التاميلية</option><option value="th">التايلاندية</option><option value="tt">التتارية</option><option value="tk">التركمانية</option><option value="tr">التركية</option><option value="ts">التسونغا</option><option value="cs">التشيكية</option><option value="ti">التيغرينية</option><option value="te">التيلوغوية</option><option value="gl">الجاليكية</option><option value="jw">الجاوية</option><option value="gn">الجورانية</option><option value="ka">الجورجية</option><option value="km">الخميرية</option><option value="xh">الخوسا</option><option value="da">الدانمركية</option><option value="doi">الدوغرية</option><option value="dv">الديفهية</option><option value="ru">الروسية</option><option value="ro">الرومانية</option><option value="zu">الزولو</option><option value="sm">الساموانية</option><option value="su">الساندينيزية</option><option value="nso">السبيدية</option><option value="sk">السلوفاكية</option><option value="sl">السلوفينية</option><option value="sd">السندية</option><option value="sa">السنسكريتية</option><option value="si">السنهالية</option><option value="sw">السواحيلية</option><option value="sv">السويدية</option><option value="ceb">السيبيوانية</option><option value="st">السيسوتو</option><option value="sn">الشونا</option><option value="sr">الصربية</option><option value="so">الصومالية</option><option value="zh-TW">الصينية (التقليدية)</option><option value="zh-CN">الصينية (المبسطة)</option><option value="tg">الطاجيكية</option><option value="iw">العبرية</option><option value="gu">الغوجاراتية</option><option value="gd">الغيلية الأسكتلندية</option><option value="fa">الفارسية</option><option value="fr">الفرنسية</option><option value="fy">الفريزية</option><option value="tl">الفلبينية</option><option value="fi">الفنلندية</option><option value="vi">الفيتنامية</option><option value="ca">القطلونية</option><option value="ky">القيرغيزية</option><option value="kk">الكازاخية</option><option value="ckb">الكردية (السورانية)</option><option value="ku">الكردية (الكرمانجية)</option><option value="hr">الكرواتية</option><option value="kn">الكنادية</option><option value="co">الكورسيكية</option><option value="ko">الكورية</option><option value="gom">الكونكانية</option><option value="qu">الكيتشوا</option><option value="rw">الكينيارواندية</option><option value="lv">اللاتفية</option><option value="la">اللاتينية</option><option value="lo">اللاوو</option><option value="ht">اللغة الكريولية الهايتية</option><option value="lg">اللوغندية</option><option value="lb">اللوكسمبورغية</option><option value="lt">الليتوانية</option><option value="ln">اللينغالا</option><option value="mr">الماراثية</option><option value="ml">المالايالامية</option><option value="mt">المالطيّة</option><option value="mi">الماورية</option><option value="mai">المايثيلية</option><option value="mg">المدغشقرية</option><option value="mk">المقدونية</option><option value="ms">الملايو</option><option value="mn">المنغولية</option><option value="mni-Mtei">الميتية (المانيبورية)</option><option value="lus">الميزو</option><option value="no">النرويجية</option><option value="ne">النيبالية</option><option value="hmn">الهمونجية</option><option value="hi">الهندية</option><option value="hu">الهنغارية</option><option value="ha">الهوسا</option><option value="nl">الهولندية</option><option value="cy">الويلزية</option><option value="ja">اليابانية</option><option value="yo">اليورباية</option><option value="el">اليونانية</option><option value="yi">الييدية</option><option value="ny">تشيتشوا</option><option value="ak">توي</option><option value="kri">كريو</option><option value="haw">لغة هاواي</option></select>
    
	*/	
</script>
