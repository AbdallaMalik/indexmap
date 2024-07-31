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
    <title>CCLLUBB GooGLe Reverse Geocoding</title>
    
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/inAssets/style.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
    <link rel="stylesheet" type="text/css" href="dflstyless.css" />
    <!--<script type="module" src="./index.js"></script>-->
  </head>
<body>
    <div class="dfloatBODYs d-flex">
	
    <div id="floating-panel" class="dfloatPANeLs d-flex dfdisablede">
        <div class="dfloatLATLNGs d-flex">
		    <input id="latmdAddress" type="text" value="" class="" />
		    <input id="mdLatLnGs" type="text" value="40.714224,-73.961452" class="dfvdisabled" />
			<input id="dfstartROWs" type="text" value="1" />
			<input id="dfstartOFFs" type="text" value="0" />
			<input id="dfstartTTLs" type="text" value="1" class="dfvdisabled" />
			
            <input id="dfReversGeocode" type="button" value="Reverse Geocode" class="d-none" />
		</div>	
		<div class="dfloatCONTROLs d-flex">
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
            zoom: 8,
            center: { lat: -34.397, lng: 150.644 },
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
        clear();
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
			dfAction = "start";
			mdURLs   = "mdstart.php";
			
		    mdOFFs++;
			$.ajax({
				url:mdURLs,
				method:'POST',
				data:{mdOFFs:mdOFFs,mdROWs:mdROWs,
				      dfAction:dfAction},
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
			    mdURLs   = "mdstart.php";
				
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
							
							if(mdtestOFFs >  50000)
							setTimeout(function()
							{
								dfstartTTLs++;
								$("#dfstartTTLs").val(dfstartTTLs);
								$("#dfstartOFFs").val(0);
								mdstartAddress();
							},5000);
							else
							setTimeout(function()
							{
								mdstartAddress();
							},10);
						}
						else
						{
							$(".dfdisabled").html("error");
						}
					}
				});
			}
	}
</script>