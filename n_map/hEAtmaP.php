<script>
    let hEAtmaP ="",HeaTOVeRLayers,geojson,heaTLegend,
	    grades_sa,infoHEATMaP,HeatbaseMaps;
	
	let Heatgrayscale = L.tileLayer(mapboxUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
        Heatstreets   = L.tileLayer(mapboxUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    Heatsatellite = L.tileLayer(mapboxUrl, {id: 'mapbox/satellite-streets-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    HeatdarkMAP   = L.tileLayer(mapboxUrl, {id: 'mapbox/dark-v10', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl});

	
	hEAtmaP = L.map('HEAtMaPLOaD', {
        center: [25.17067,55.21428],
        zoom: 6,
        layers: [HeatdarkMAP]
    });

	HeatbaseMaps = {
        "LIGHT MAP": Heatgrayscale,
        "STREETS MAP": Heatstreets,
	    "SATELLITE MAP": Heatsatellite,
	    "DARK MAP": HeatdarkMAP
	};
	
	HeaTOVeRLayers = {
        "Country": geojson
    };	
	
	
    heaTLegend = L.control({position: 'bottomright'});
	L.control.layers(HeatbaseMaps).addTo(hEAtmaP);

	grades_sa=[10,50,100,200,300,400,500,100,1500,2000,2500,3000,4000,5000,6000,7000,8000];
	
	function getColor_sa(d) 
	{
        return  d > 8000 ? '#80024e' :
                d > 7000 ?  '#b63978':
                d > 6000 ?  '#c34073':
                d > 5000 ?   '#d94e6a':
                d > 4000 ? '#dc4027' :
                d > 3000 ? '#ef3c1f' :
                d > 2500 ? '#ef3c1f' :
		        d > 2000 ? '#e25c69' :
		        d > 1500 ? '#ea6a68' :
		        d > 1000 ? '#f37867' :
		        d > 500 ? '#f88468' :
		        d > 400 ? '#fb9f76' :
			    d > 300 ? '#ffc68f' :
			    d > 200 ? '#ffe7c0' :
			    d > 100 ? '#fef5cd' :
				d > 50 ? '#f0f0f0' :
				d > 10 ? '#f7f7f7' :
					     '#fcfcc0';
                
	}
	
	function style_sa(feature) {
        return {
            fillColor: getColor_sa(feature.properties.median_price),
            weight: 0.5,
            opacity: 1,
            color: 'white',
            dashArray: '0',
            fillOpacity: 1
		};
	}
	
	function onEachFeature(feature, layer) 
	{
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
		});
	}
	
	function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 4,
            color: 'white',
            dashArray: '',
            fillOpacity: 1
		});

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
		}
	    infoHEATMaP.update(layer.feature.properties);
	}

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
	    infoHEATMaP.update();
	}

    function zoomToFeature(e) {
        hEAtmaP.fitBounds(e.target.getBounds());
	}

	////////////////////
	infoHEATMaP = L.control();

    infoHEATMaP.onAdd = function (hEAtmaP) 
	{
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
	};

    infoHEATMaP.update = function (props) {
        this._div.innerHTML = '<h4>County info</h4>' +  (props ?
		   '<table><tr><td style="width: 100px;"><b>Local Name  </b></td><td>'+props.en_name+'</td><td>'+props.local_name+'</td></tr><tr><td><b>Sector   Name  </b></td><td>'+props.en_sector_name+'</td><td>'+props.sector_name+'</td></tr><tr><td style=" color: red;"><b>Max Price  </b></td><td style=" color: red;">'+props.max_price+' $</td></tr><tr><td style=" color: green;"><b>Min Price  </b></td><td style=" color: green;">'+props.min_price+' $</td></tr><tr><td style=" color: grey;"><b>Median Price  </b></td><td style=" color: grey;"><b>'+props.median_price+' $</b></td></tr><table>'      
           : 'Hover over a county');
	};

    infoHEATMaP.addTo(hEAtmaP);
	
	
	function heaTLeGendAdd(grades,layer){
	
        heaTLegend.onAdd = function (hEAtmaP) {

        var div = L.DomUtil.create('div', 'info legend'),
            labels = [];

            // loop through our density intervals and generate a label with a colored square for each interval
    	   
			    for (var i = 0; i < grades.length; i++) 
				{
			
				    div.innerHTML +=
					'<i style="background:' + getColor_sa(grades[i] + 1) + '"></i> ' +
					grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' :'+');
				}
			
            return div;
		};

        heaTLegend.addTo(hEAtmaP);
	}

	
	
	function HEAtMaPLOaD()
    {
	    let fm = "hEAtmaP";
	    let tOaction = "stFIRST";
		let astInCountrYes  = $("#astInCountrYes").val();
		let astInCountrYefs = $("#astInCountrYesFM").val();
		let astInCitYesFM   = $("#astInCitYesFM").val();
		
		
	    $.ajax({
			url:'n_map/realDataJson.php?stFMs=astMOReIMAPsTAs',
			method:'POST',
			data:{fm:fm,tOaction:tOaction,
			      astInCountrYes:astInCountrYes,
				  astInCountrYefs:astInCountrYefs,
				  astInCitYesFM:astInCitYesFM},
			dataType:'JSON',
			beforeSend:function()
			{
				$(".defHEATGraPhCanvasPROG").show("slow");	
			},
			success:function(statesData)
		    {
				$(".defHEATGraPhCanvasPROG").hide("slow");	
	            geojson = L.geoJson(statesData,{
                    style: style_sa,
                    onEachFeature: onEachFeature
				});
	            heaTLeGendAdd(grades_sa,astInCountrYefs);
	
	            hEAtmaP.addLayer(geojson);
	            hEAtmaP.fitBounds(geojson.getBounds());
				
			}
		});
	}
	
</script>	