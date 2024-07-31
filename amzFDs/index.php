<?php require_once('../../club/libs/modules/brInit.php');
  
    $BRIGHTPath       = "../";
    $GAssetsPath      = "../../";
	
    $hooderLOGO    = $fatherCLUBUrlLINK."GAssets/icons/AmapLogo.png";
	$headerIcon    = $fatherCLUBUrlLINK."GAssets/icons/AmaPIcon.png";
	$defMAPTITLe   = " REAL AGENTS MAP | PANEL ";
	$defMAPDESC    = $defMAPTITLe;
?>	
<!DOCTYPE html>
<html>
<head lang="en">
    
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $defMAPDESC;?>">
    <meta name="author" content="monear senan (bright lab)">
	<title id="real-title-top"><?php echo $defMAPTITLe;?></title>
    <link rel="shortcut icon" id="ftPageLOGO" href="<?php echo $headerIcon;?>">
	<meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="<?php echo $defMAPTITLe;?> | <?php echo $defMAPTITLe;?>">
    <meta name="twitter:description" content="<?php echo $defMAPTITLe." | ".$defMAPDESC;?>">
    <meta name="twitter:image" content="<?php echo $headerIcon;?>">
    <meta property="og:url" content="<?php echo $builderCLUBUrl."agentsmap/amzFDs/index.php";?>">
    <meta property="og:title" content="<?php echo $defMAPTITLe;?>">
    <meta property="og:description" content="<?php echo $defMAPTITLe." | ".$defMAPDESC;?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $headerIcon;?>">
    <meta property="og:image:type" content="image/*">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
	
	
	
	<link type="text/css" rel="stylesheet" href="<?php echo $GAssetsPath;?>GAssets/Amap/css/style-starter-st.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $GAssetsPath;?>GAssets/Amap/css/h-map_st.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $GAssetsPath;?>GAssets/Amap/css/real-map-style.css" />
    
	<link rel="stylesheet" href="<?php echo $GAssetsPath;?>club/rAssets/css/cropper.css" type="text/css" media="all">
		
	
	
    <script type="text/javascript" src="<?php echo $GAssetsPath;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
	
	<script type="text/javascript" src="<?php echo $GAssetsPath;?>INDEXMAP/assets/inAssets/share_media.js"></script>

	<script type="text/javascript" src="<?php echo $builderCLUBUrl;?>rAssets/js/cropper.js"></script> 
	
	<link type="text/css" rel="stylesheet" href="<?php echo $GAssetsPath;?>GAssets/Amap/css/homeAmap.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $GAssetsPath;?>GAssets/Amap/css/markerAmap.css"/>
    
	<link type="text/css" rel="stylesheet" href="<?php echo $BRIGHTPath;?>amzAssets/amazCSS/hmeAGNTsss.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $BRIGHTPath;?>amzAssets/amazCSS/hmeAGNTsss-v2.css"/>
	
	<!--
	<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript"></script>
	<script src="https://js.api.here.com/v3/3.1/mapsjs-core-legacy.js" type="text/javascript"></script>
	<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript"></script>
	<script src="https://js.api.here.com/v3/3.1/mapsjs-service-legacy.js" type="text/javascript"></script>
	-->
	
	<script src="<?php echo $GAssetsPath;?>agentsmap/amzAssets/amazJS/mapsjs-core.js" type="text/javascript"></script>
	<script src="<?php echo $GAssetsPath;?>agentsmap/amzAssets/amazJS/mapsjs-core-legacy.js" type="text/javascript"></script>
	<script src="<?php echo $GAssetsPath;?>agentsmap/amzAssets/amazJS/mapsjs-service.js" type="text/javascript"></script>
	<script src="<?php echo $GAssetsPath;?>agentsmap/amzAssets/amazJS/mapsjs-service-legacy.js" type="text/javascript"></script>
	
<style>
.dfPanelPAGe{
	background-color:#eee;
	justify-content:center;
	align-items:center;
	position:fixed;
	top:0;bottom:0;left:0;right:0;
	overflow-y:auto;
}
.dfPanelPAGe .dfPanelPAGes{
	background-color:#ddd;
	justify-content:center;
	align-items:center;
	min-height:100%;
	width:100%;
	position:relative;
	flex-flow:column;
}
.dfPanelPAGe input{
	outline:0px;
	border:1px solid #eee;
	border-radius:3px;
	height:40px;
	width:100%;
	display:flex;
	justify-content:start;
	align-items:center;
	padding:0px 15px;
}
.dfPanelPAGe .dfPanelPAGInPuts{
	gap:5px;
	padding:5px 0px;
	justify-content:center;
	align-items:center;
}
.dfPanelPAGe .dfPanelPAGmessages{
	padding:15px;
	justify-content:center;
	align-items:center;
	background-color:#eee;
	margin:5px 0px;
	border-radius:3px;
}
.dfPanelPAGe .dfPanelPAGInPuts .dfPanelPAGInbtns{
	height:45px;
	width:100%;
	border-radius:3px;
	border:0px solid #fff;
	background-color:#fe6f4b;
	color:#fff;
}
.dfPanelPAGe .dfPanelPAGInPuts .dfPanelPAGInbtns:hover{
	background-color:#f13809;
	color:#fff;
}
.dfPanelPAGKeYs{
	position:fixed;
	left:0;right:0;top:0;
	height:60px;
	justify-content:space-between;
	align-items:center;
	flex-flow:wrap row;
	border-bottom:#eee;
	background-color:#f7f7f7;
	gap:5px;
}
.dfPanelPAGKeYs .dfPanelPAGKeY{
	height:50px;
	padding:0px 10px;
	border-radius:3px;
	background-color:#fe6f4b;
	color:#fff;
	justify-content:center;
	align-items:center;
}
.dfPanelPAGKeYclicked{
	background-color:#000 !important;
	color:#fff !important;
} 
</style>	
</head>
<body>
    <div class="d-flex dfPanelPAGe">
	    <div class="dfPanelPAGes d-flex">
		    <div class="col-lg-12 dfPanelPAGKeYs d-flex">
				<a href="javascript:void(0)" class="d-flex dfPanelPAGKeY" id="a" onclick="dfPanelPAGKeYs(this)">
					Aa
				</a>
				<a href="javascript:void(0)" class="d-flex dfPanelPAGKeY" id="b" onclick="dfPanelPAGKeYs(this)">
					Bb
				</a>
				<a href="javascript:void(0)" class="d-flex dfPanelPAGKeY" id="c" onclick="dfPanelPAGKeYs(this)">
					Cc
				</a>
				<a href="javascript:void(0)" class="d-flex dfPanelPAGKeY" id="d" onclick="dfPanelPAGKeYs(this)">
					Dd
				</a>
				<a href="javascript:void(0)" class="d-flex dfPanelPAGKeY" id="e" onclick="dfPanelPAGKeYs(this)">
					Ee
				</a>
			</div>
		    <div class="col-lg-4">
				<div class="d-flex dfPanelPAGInPuts">
				    <input type="text" id="dfPass" placeholder="password" class="form-container">
				</div>
				<div class="d-flex dfPanelPAGInPuts">
				    <input type="text" id="dfRows" value="3" class="form-container">
					<input type="text" id="dfPages" value="0" class="form-container">
				</div>
				<div class="d-flex dfPanelPAGInPuts">
				    <input type="text" id="dfRowsss" value="0" class="form-container" readOnly>
					<input type="text" id="dfPagess" value="0" class="form-container" readOnly>
				</div>
				<div class="d-flex dfPanelPAGmessages">
				    click here to start operation
				</div>
				<div class="d-flex dfPanelPAGInPuts">
				    <button class="btn dfPanelPAGInbtns" onclick="dfPanelPAGe()">start</button>
				</div>	
			</div>
		
		    <div class="dfPanelPAGLATLNGss">
			</div>
		</div>
	</div>
</body>
    <input type="hidden" value="a" id="dfPanelPAGKeYIDs">
<script>

    let fmAPIKeYs = "8qVePpApZalvTODPThTU4DBvz5k-rBi09kzEeunXzNE";
    function dfPanelPAGKeYs(id)
	{
		let fmID = $(id).attr("id");
		    
			$("#dfPanelPAGKeYIDs").val(fmID);
			$(".dfPanelPAGKeY").removeClass("dfPanelPAGKeYclicked");
			$(id).addClass("dfPanelPAGKeYclicked");
			
			if(fmID == "a")
			{
				fmAPIKeYs = "Hz9dJ0oKSW4ZcCw8LS8fb8bjV5LD9eC3Np0xeP5xQfE";
			}
			else if(fmID == "b")
			{
				fmAPIKeYs = "gnRTGHIizVcVkj_QUW7UuDasWt8imhnyT4QlhNMLTEE";
			}
			else if(fmID == "c")
			{
				fmAPIKeYs = "8qVePpApZalvTODPThTU4DBvz5k-rBi09kzEeunXzNE";
			}
			else if(fmID == "d")
			{
				fmAPIKeYs = "8qVePpApZalvTODPThTU4DBvz5k-rBi09kzEeunXzNE";
			}
			else if(fmID == "e")
			{
				fmAPIKeYs = "8qVePpApZalvTODPThTU4DBvz5k-rBi09kzEeunXzNE";
			}
	}
	
    function dfPanelPAGe()
	{
		let dfPass, dfRows, dfPages, 
		    dfRowsss, dfPagess, dferror;
		    
			dferror = 0;
		    $(".dfPanelPAGInPuts input").each(function()
		    {
			    if($(this).val() == "")
			    {
				    $(this).focus();
				    dferror = 1;
				    return false;
				}
			});	
		
		    if(dferror != 1)
			{
				dfPass  = $("#dfPass").val();
				dfRows  = $("#dfRows").val();
				dfPages = $("#dfPages").val();
				
				if(dfPass != "test@dr")
				{
					dferror = 2;
					return false;
				}
				
				if(dferror != 2)
				{
					dfPanelPAGes();
				}
			}
	}
	
	function dfPanelPAGes()
	{
		let dfPass, dfRows, dfPages, 
		    dfRowsss, dfPagess, dferror, dfResponse = 0, 
			mAfsALATs, mAfsALNGs, mAID, dfKeYDs;
			
			dfRows  = $("#dfRows").val();
			dfPages = $("#dfPages").val();
			dfKeYDs = $("#dfPanelPAGKeYIDs").val();
			dfPages++;
			
			$.ajax({
				url:'amzPFDs/amzPFDs.php?amzQRYs=latlng',
				method:'POST',
				data:{dfRows:dfRows, dfPages:dfPages, dfKeYDs:dfKeYDs},
				beforeSend:function()
				{
					$(".dfPanelPAGmessages").html("processing...");
					$(".dfPanelPAGLATLNGss").html("");
				},
				success:function(results)
				{
					$("#dfPages").val(dfPages);

					if(results != 3)
					{
						$("#dfPagess").val(dfPages);
						$("#dfRowsss").val(dfPages * dfRows);
						
						$(".dfPanelPAGLATLNGss").html(results);
						$(".dfPanelPAGLATLNGs").each(function()
						{
							mAID = $(this).attr("id");
							mAfsALATs = $("#dfPanelPAGLAT"+mAID).val();
						    mAfsALNGs = $("#dfPanelPAGLNG"+mAID).val();
							
							$(".dfPanelPAGmessages").html("start inserting ...");
							setTimeout(function()
							{
								fsGetAddresss("converLATLNG",mAfsALATs,mAfsALNGs);
							},100);
						});
						
					}
					else
					{
						$(".dfPanelPAGmessages").html("operarion failed.....");
					}
				}
			});
			
	}
	
	function fsGetAddresss(fm,mAfsALATs,mAfsALNGs)
	{
		let platform,service,fsCountryName,fsState,fsDistrict,fsCity,fsCounty,
			fsStreet,fsPostalCode,fsHouseNumber;

			platform = new H.service.Platform(
			{   
				//'apikey': '8qVePpApZalvTODPThTU4DBvz5k-rBi09kzEeunXzNE',
				//'apikey': 'gnRTGHIizVcVkj_QUW7UuDasWt8imhnyT4QlhNMLTEE',
				'apikey':fmAPIKeYs,
				locale:"en-US",
				categories:"500,550,600"
			}); 
			
			service = platform.getSearchService();
			
			service.reverseGeocode
			(
				{
					at: mAfsALATs+','+mAfsALNGs+',150',
					locale:"en-US",
				    language:"en-US",
				    lang:"en-US"
				},
			    (result) => 
				{   
				    result.items.forEach((item) => 
					{  
					    fsCountryName = item.address.countryName;
						fsState       = item.address.state;
						fsDistrict    = item.address.district;
						fsCity        = item.address.city;
						fsCounty      = item.address.county;
						fsStreet      = item.address.street;
						fsPostalCode  = item.address.postalCode;
						fsHouseNumber = item.address.houseNumber;
						
					    fsGetAddress(fm,mAfsALATs,mAfsALNGs,fsCountryName,fsState,fsDistrict,fsCity,fsCounty,fsStreet,fsPostalCode,fsHouseNumber);  
					}); 
				}
			);	
			
			
	}
	
	function fsGetAddress(fm,fslat,fslng,fsCountryName,fsState,fsDistrict,fsCity,fsCounty,fsStreet,fsPostalCode,fsHouseNumber)
	{
		    if(fsDistrict == "undefined" || fsDistrict == "" || fsDistrict == null)
			{
				fsDistrict = "";
			}
			
			if(fsState == "undefined" || fsState == "" || fsState == null)
			{
				fsState = "";
			}
			
			if(fsCounty == "undefined" || fsCounty == "" || fsCounty == null)
			{
				fsCounty = "";
			}
			
			if(fsPostalCode == "undefined" || fsPostalCode == "" || fsPostalCode == null)
			{
				fsPostalCode = "";
			}
			
			if(fsHouseNumber == "undefined" || fsHouseNumber == "" || fsHouseNumber == null)
			{
				fsHouseNumber = "";
			}
			
			if(fsStreet == "undefined" || fsStreet == "" || fsStreet == null)
			{
				fsStreet = "";
			}
			
			let dfResponse = "";
			
		$.ajax({
			url:'amzPFDs/amzPFDs.php?amzQRYs=InUPD',
		    method:'POST',
			data:{fm:fm,fsCountryName:fsCountryName,fsState:fsState,
			      fsDistrict:fsDistrict,fsCity:fsCity,fsCounty:fsCounty,
				  fsStreet:fsStreet,fsPostalCode:fsPostalCode,
				  fsHouseNumber:fsHouseNumber,fslat:fslat,fslng:fslng},
			beforeSend:function()
			{
				$(".dfPanelPAGmessages").html("inserting... ");
			},
			success:function(res)
			{
				dfResponse = res.split("|");
				$(".dfPanelPAGmessages").html("success..."+dfResponse[1]);

				setTimeout(function()
				{
					dfPanelPAGes();
				},200);
				
			}
		});	
	}	
</script>

</html>	
	  