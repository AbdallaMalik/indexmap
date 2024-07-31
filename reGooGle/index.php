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
	$stDTWEBLOGO  = $stDBCONST->getstWEBLOGO();
	$stDTWEBFICON = $stDBCONST->getstWEBFICON();
	$stWEBTITLE   = $stDBCONST->getstWEBTITLE();
	$stWEBZOOM    = $stDBCONST->getstWEBZOOM();
	
	$stWEBLAYER   = $stDBCONST->getstWEBLAYER();
	
?>	
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>CCLLUBB GooGLe Reverse Geocoding</title>
    
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/inAssets/style.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
    <link rel="stylesheet" type="text/css" href="dflstyless.css" />
    <!--<script type="module" src="./index.js"></script>-->
  
<style>
.dfloatLATLNGs{
	width:100%;
	display:flex;
	justify-content:space-between;
	align-items:center;
	gap:5px;
	flex-flow:wrap;
	height:fit-content;
}
.dfloatLATLNGs input{
	flex:1;
}
.dfloatLATLNGs #mdLatLnGs{
	max-width:200px;
}
.dfloatLATLNGs #dfstartROWs,
.dfloatLATLNGs #dfstartOFFs,
.dfloatLATLNGs select{
	max-width:100px;
}
.dfloatLATLNGs select{
	display:flex;
	justify-content:flex-start;
	align-items:center;
	padding:0px 5px;
	margin:0px;
	height:35px;
	border:1px solid #eee;
	border-radius:3px;
	outline:0px;
}
.dfloatBODYs select{
	-webkit-appearance:menulist;
}
@media (max-width:767px)
{
	.dfloatLATLNGs input,
	.dfloatLATLNGs #mdLatLnGs{
		flex:calc(100% / 1);
		max-width:100%;
	}
	.dfloatLATLNGs select{
		max-width:initial;
		flex:calc(100% / 3);
	}
	.dfloatLATLNGs #dfstartROWs,
	.dfloatLATLNGs #dfstartOFFs{
		max-width: calc(50% - 10px);
		flex:1;
	}
	.dfloatBODYs,
	.dfloatBODYs .floating-panel{
		padding:0px 5px;
	}
	.dfloatBODYs .dfloatPANeLs,
	.dfloatBODYs .dfloatLATLNGs,
	.dfloatBODYs .dfloatCONTROLs,
	.dfloatBODYs .dfloatLATLNGs
	{
		padding:5px;
	}
	.dfloatBODYs .dfloatPANeLs .dfloatLATLNGs, 
	.dfloatBODYs .dfloatPANeLs .dfloatCONTROLs{
		padding:5px;
	}
	.dfORDers{
		display:none !important;
	}
	.dfloatBODYs .dfloatCONTROLs{
		width:100%;
		gap:5px;
	}
	.dfloatBODYs .dfloatCONTROLs input{
		flex:1;
	}
	.dfdisabled{
		width:90%;
		min-height:50px;
		bottom:-50px;
	}
	.dfstartMAP{
		height:300px;
		width:90%;
	}
}
</style> 

  </head>
<body>
    <div class="dfloatBODYs d-flex">
	
    <div id="floating-panel" class="dfloatPANeLs d-flex dfdisablede">
        <div class="dfloatLATLNGs d-flex">
		    <select id="dfstartAkind" onchange="dfstartAkind(this)">
			    <option value="GerePair">GerePair</option>
				<option value="Genew">Genew</option>
			</select>
			<select id="dfstartAction">
			    <option value="Geocode">Geocode</option>
				<option value="Geocity">Geocity</option>
				<option value="Geofix">Geofix</option>
			</select>
		    <input id="latmdAddress" type="text" value="" class="" />
		    <input id="mdLatLnGs" type="text" value="40.714224,-73.961452" class="dfvdisabled" />
			<input id="dfstartROWs" type="text" value="1" />
			<input id="dfstartOFFs" type="text" value="0" />
			
			<input id="dfstartTTLs" type="hidden" value="1" class="dfvdisabled" />
			
            <input id="dfReversGeocode" type="button" value="Reverse Geocode" class="d-none" />
		</div>	
		<div class="dfloatCONTROLs dfORDers d-flex">
		    <input id="dfstartCNTYs" type="text" placeholder="Country" value=""/>
		    <select id="dfstartORDs">
			    <option value="DESC">DESC</option>
				<option value="ASC">ASC</option>
			</select>
			<input class="dfstartMAGs" type="text" value="" placeholder="Start Geocoding..." class="dfvdisabled"/>
		</div>
		<div class="dfloatCONTROLs d-flex">
		    
			<input class="btn dfstartGeOCODEs" id="mdstartAddress" type="button" value="Start" onclick="mdstartGeocode(this)" fm="start" />
			<input class="btn dfstartGeOCODEs" id="dfstartGeOCODEs" type="button" value="Geocode" fm="Geocode" />
            <input class="btn dfstartGeOCODEs" id="dfstoPGeOCODEs" type="button" value="Stop" fm="stop"/>
		
		    <input type="hidden" id="dfResLat">
			<input type="hidden" id="dfResLnG">
		</div>
		<div class="mdSHOWresults d-none"></div>
		<div class="dfdisabled"></div>
    </div>
    <div id="map" class="dfstartMAP"></div>

	</div>
    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpAZyH_n_rfSKhpslDsb_J3KMxmUKP2Kc&callback=initMap&v=weekly&language=en" defer></script>
    
</body>
</html>


<script>
//AIzaSyAEpf8ewMzQk1Yi2ONMz-l3zYFykUNfJ5M  //dr api
//AIzaSyDpAZyH_n_rfSKhpslDsb_J3KMxmUKP2Kc
//AIzaSyDpAZyH_n_rfSKhpslDsb_J3KMxmUKP2Kc

//AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg default testing google api
    
	
	let map;
    let marker;
    let geocoder;
    let responseDiv;
    let response;

    function initMap() 
	{
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5.5,
            center: { lat: 23.885942, lng: 45.079162 },
            mapTypeControl: false,
		});
        
		geocoder = new google.maps.Geocoder();

		let inputText = document.getElementById("latmdAddress");
		let submitButton = document.getElementById("dfstartGeOCODEs");
		let clearButton = document.getElementById("dfstoPGeOCODEs");
        
		/*
		response = document.createElement("pre");
        response.id = "response";
        response.innerText = "";
        responseDiv = document.createElement("div");
        responseDiv.id = "response-container";
        responseDiv.appendChild(response);

        let instructionsElement = document.createElement("p");

        instructionsElement.id = "instructions";
        instructionsElement.innerHTML =
		*/
            "<strong>Instructions</strong>: Enter an address in the textbox to geocode or click on the map to reverse geocode.";
  
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
        
		//map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
        //map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
        
		marker = new google.maps.Marker({
            map,
		});
        
		map.addListener("click", (e) => {
            geocode({ location: e.latLng });
		});
   
        submitButton.addEventListener("click", () =>
            geocode({ address: inputText.value }),
        );
  
        clearButton.addEventListener("click", () => {
            clear();
		});
        //clear();
	}

    function clear() {
        marker.setMap(null);
        //responseDiv.style.display = "none";
	}

    function geocode(request) {
        clear();
        geocoder
            .geocode(request)
            .then((result) => {
                const { results } = result;

				$(".dfdisabled").html(results[0].geometry.location);
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                marker.setMap(map);
                //responseDiv.style.display = "block";
                //response.innerText = JSON.stringify(result, null, 2);
                
				console.log("<br>location :"+results[0].geometry.location);
				
				mdcodeAddress(results[0].geometry.location);
				return results;
			})
            .catch((e) => {
				$(".dfdisabled").html("start");
				mdstartAddress();
				//(24.5707083, 46.6908094)
                //alert("Geocode was not successful for the following reason: " + e);
			});
	}

    window.initMap = initMap;
	
	function dfstartAkind(id)
	{
		let mdVALUe;
		    mdVALUe = $(id).val();
			
			if(mdVALUe == "GerePair")
				$("#dfstartOFFs").val(0);
			else
				$("#dfstartOFFs").val(60000);
	}
	
	function dfstrtAknds()
	{
		let dfstart, dfstOFFs;
		    
			dfstart  = $("#dfstartAkind").val();
			dfstOFFs = $("#dfstartOFFs").val();
			dfstTTLs = $("#dfstartTTLs").val();
			
			if(dfstart == "GerePair")
			{
				if(dfstOFFs > 500)
				{
					setTimeout(function()
					{
						dfstTTLs++;
						$("#dfstartTTLs").val(dfstTTLs);
						$("#dfstartOFFs").val(0);
						mdstartAddress();
					},5000);
				}
				else
				{
					mdstartAddress();
				}
			}
			else if(dfstart == "Genew") 
			{
				if(dfstOFFs > 70000)	
				{
					setTimeout(function()
					{
						dfstTTLs++;
						$("#dfstartTTLs").val(dfstTTLs);
						$("#dfstartOFFs").val(60000);
						mdstartAddress();
					},5000);
				}
				else
				{
					mdstartAddress();
				}
			}
	}
	
	function mdstartGeocode(id)
	{
		let fm;
		    fm = $(id).attr("fm");
			
			$(".dfdisabled").html("");
			if(fm == "start")
			{
				$(".dfdisabled").html("start");
				mdstartAddress();
			}
	}
	
	function mdstartAddress()
	{
		let mdROWs, mdOFFs, dfAction, mdstartID, mdstartAdds;
		
		    mdROWs   = $("#dfstartROWs").val();
			mdOFFs   = $("#dfstartOFFs").val();
			mdAction = $("#dfstartAction").val();
			
			dfAction = "start";
			mdURLs   = "mdGstart.php";
			
		    mdOFFs++;
			$.ajax({
				url:mdURLs,
				method:'POST',
				data:{mdOFFs:mdOFFs,mdROWs:mdROWs,
				      dfAction:dfAction,mdAction:mdAction},
				beforeSend:function()
				{
					$(".dfdisabled").html("Geocode");
					$(".mdSHOWresults").html("");
				},
				success:function(mdResults)
				{
					if(mdResults != 2 && mdResults != 0)
					{
						$(".mdSHOWresults").html(mdResults);
						mdstartID   = $("#mdstartID").val();
						mdstartAdds = $("#mdstartAdds"+mdstartID).val();
						
						$(".dfdisabled").html("Geocoding");
						console.log("<br>mdResults:"+mdResults);
						console.log("<br>mdstartAdds:"+mdstartAdds);
						console.log("<br>mdstartID:"+mdstartID);
						if(mdstartAdds != "")
						{
							$("#latmdAddress").val(mdstartAdds);
							$("#mdLatLnGs").val("");
							$("#dfstartGeOCODEs").click();
						}
						
					}
					
					$("#dfstartOFFs").val(mdOFFs);
				}
			})
			  
	}
	
	function mdcodeAddress(mdLATLn)
	{
		let mdAddress, mdAdds, mdALAT, mdALNG, mdstartID, mdLATLns, 
		    mdLATLNG, mdtestOFFs, dfstartTTLs;
		    mdAddress = document.getElementById("latmdAddress").value;  
          	
			mdtestOFFs   = $("#dfstartOFFs").val();
			dfstartTTLs  = $("#dfstartTTLs").val();
			
			$("#mdLatLnGs").val(mdLATLn);
			
			if(mdLATLn != "")
			{
				mdLATLNG  = $("#mdLatLnGs").val();
				mdLnGth   = mdLATLNG.length;
			    mdOffset  = mdLATLNG.indexOf(",");
				
				mdALAT    = mdLATLNG.substr(1,mdOffset - 1);
				
				mdOffsetA = mdOffset * 1 + 1;
				mdOffsetB = mdOffset * 1 + 2;
				
				mdALNG    = mdLATLNG.substr(mdOffsetA,mdLnGth - mdOffsetB);
				
				mdALAT    = mdALAT.trim();
				mdALNG    = mdALNG.trim();
				
				mdstartID = $("#mdstartID").val();
				
				dfAction = "Geocode";
			    mdURLs   = "mdGstart.php";
				
				$.ajax({
					url:mdURLs,
					method:'POST',
					data:{dfAction:dfAction,mdALAT:mdALAT,
					      mdALNG:mdALNG,mdstartID:mdstartID},
					beforeSend:function()
					{
						$(".dfdisabled").html("feeding");
					},
					success:function(mdResults)
					{
						if(mdResults == 1)
						{
							$(".dfdisabled").html("done");
							dfstrtAknds();
						}
						else
						{
							$(".dfdisabled").html("error");
						}
					}
				});
			}
	}
	
	function drawBounds(map)
	{
		var bounds = map.getBounds();
            var areaBounds = {
                north: bounds.getNorthEast().lat(),
                south: bounds.getSouthWest().lat(),
                east: bounds.getNorthEast().lng(),
                west: bounds.getSouthWest().lng()
			};
	}
</script>