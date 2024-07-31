    let nVar,watchID,map, newUser, users, mapquest, firstLoad ,mapboxUrl ,mapboxAttribution ,
	    accessTokenUrl,mVar,astCenter,searchList;
	mVar = false;
	firstLoad = true;
	nVar = false;
	let sideSEARch = false;
	
	$('.fullScreen').removeClass("fa-eye");
	$('.fullScreen').addClass("fa-eye-slash");	
    $("#share-side").hide("slow");
		
	//let shareUrl ;
	let getUrl  = window.location;
	
	let defltMAP    = $("#defaultMAP").val();
	let stWEBZOOM   = $("#stWEBZOOM").val();
	let stWEBLAYER  = $("#stWEBLAYER").val();
	
	let defmYLaT    = $("#maPSHAReLaT").val();
    let defmYLnG    = $("#maPSHAReLnG").val();
	
	mapboxUrl ='https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}';
	mapboxAttribution ='Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ?<a href="https://www.mapbox.com/">Mapbox</a>';
	accessTokenUrl ='pk.eyJ1IjoibXNlbmFuIiwiYSI6ImNrbzI4YW1nMjAyNW0ycG52Ym9xMW05Z3IifQ.TtAbPlev96adjUMS5Jwr5g';
	
    users      = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
	searchList = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
    newUser    = new L.LayerGroup();
	  
    let grayscale = L.tileLayer(mapboxUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
        streets   = L.tileLayer(mapboxUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    satellite = L.tileLayer(mapboxUrl, {id: 'mapbox/satellite-streets-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    darkMAP   = L.tileLayer(mapboxUrl, {id: 'mapbox/dark-v10', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl});

	mapquest = new L.TileLayer("http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png", {
        maxZoom: 18,
        subdomains: ["otile1", "otile2", "otile3", "otile4"]
        
	});
	 	  
	astCenter = new L.LatLng(39.90973623453719, -93.69140625);	  
	if(defmYLaT != "" && defmYLnG !="")
	{
		astCenter = new L.LatLng(defmYLaT, defmYLnG);	
	}		
	
	let dfstWEBLAYER = defstWEBLAYER();
	map = new L.Map('map', {
        center: astCenter,
        zoom: stWEBZOOM,
		watch:true,
		fadeAnimation:true,
		zoomAnimation:true,
        layers: [dfstWEBLAYER,users,newUser]
	});  
    
    let baseMaps = {
          "LIGHT MAP": grayscale,
          "STREETS MAP": streets,
	      "SATELLITE MAP": satellite,
	      "DARK MAP": darkMAP
	};
	
    let overlayMaps = {
         "INDEXs": users
	};

    L.control.layers(baseMaps, overlayMaps).addTo(map);

    function geoLocate() 
	{
        map.locate({setView: true, maxZoom: 17});
	}
	 
    let geolocControl = new L.control({
        position: 'topright'
	});
    
	geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a  class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"><span class="fa fa-map-marker"></span></a>';
        return div;
	};
	     
	let hideControl = new L.control({
        position: 'topright'
	});
      
	hideControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'full-Screen');
        div.innerHTML = '<a class="" href="#" onclick="gethide(); return false;" title="Full Screen Mode"><span class="fullScreen fa fa-eye-slash fa-eye"></span></a>';
        return div;
	};
	  
	/////////// 
    let dfLocationINFs = new L.control({
        position: 'bottomleft'
	});
	
	////
    map.addControl(geolocControl);
    map.addControl(new L.Control.Scale());
	map.addControl(hideControl);
	
	function defstWEBLAYER()
	{
		let stWEBLAYER,stWEBLAYERs;
		    stWEBLAYER  = $("#stWEBLAYER").val();
			
		if(stWEBLAYER == "LIGHT_MAP")
		{
			stWEBLAYERs = grayscale;
		}
		else if(stWEBLAYER == "STREETS_MAP")
		{
			stWEBLAYERs = streets;
		}
		else if(stWEBLAYER == "SATELLITE_MAP")
		{
			stWEBLAYERs = satellite;
		}
		else if(stWEBLAYER == "DARK_MAP")
		{
			stWEBLAYERs = darkMAP;
		}
		else
		{
			stWEBLAYERs = darkMAP;
		}
		
		return stWEBLAYERs;
	}
	