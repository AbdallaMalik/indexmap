<?php 
  if(isset($_GET['map']))
  {
	  $m_title = $_GET['map'];
	  $n_map   = "REAL ESTATE @ MAP";
	  $t_desc  = $m_title." "." All REAL ESTATE AGENTS IN ".$m_title;
	  
  }
  elseif(isset($_GET['search-map']))
  {
	  $m_title = $_GET['search-map'];
	  $n_map   = "REAL ESTATE @ MAP";
	  $t_desc  = $m_title." "." All RESULTS FOR ".$m_title." "."REAL ESTATE @ MAP , atworld , atagents , atmap , atclub";
	  
  } 
  elseif(isset($_GET['name']))
  {
	  $m_title = $_GET['name'];
	  $n_map   = "REAL ESTATE @ MAP";
	  $t_desc  = $m_title." "." All RESULTS FOR ".$m_title." "."REAL ESTATE @ MAP , atworld , atagents , atmap , atclub";
	  
	  
  }
  elseif(isset($_GET['myLat']))
  {
	  $m_title = "My Location";
	  $n_map   = "REAL ESTATE @ MAP";
	  $t_desc  = $m_title." "." All RESULTS FOR ".$m_title." "."REAL ESTATE @ MAP , atworld , atagents , atmap , atclub";
	  
	  
  }
  elseif(isset($_GET['advanced-search']))
  {
	  $m_title = $_GET['advanced-search'];
	  $n_map   = "REAL ESTATE @ MAP";
	  $t_desc  = $m_title." "." All RESULTS FOR ".$m_title." "."REAL ESTATE @ MAP , atworld , atagents , atmap , atclub";
	  
	  
  }
  else
  {
	 $m_title = "REAL ESTATE @ MAP"; 
	 $n_map   = "Home  ";
	 $t_desc  = $m_title." ".", atworld , atagents , atmap , atclub , REAL ESTATE @ MAP , atworld , atagents , atmap , atclub";
	  
	 
  }  

	require_once('panel/modules/config.php');		   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="description" content="<?php echo $t_desc;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<title><?php echo $m_title." | ".$n_map;?></title>
    <link rel="icon" href="img/top_map.png">
	
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet' />
	
	<link type="text/css" rel="stylesheet" href="assets/css/style-starter.css" />
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.css" />
 
	<link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.css" />
    <link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.Default.css" />
	<link type="text/css" rel="stylesheet" href="assets/css/h-map_st.css" />
    
	
	
	<script type="text/javascript" src="assets/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="assets/leaflet/plugins/leaflet.markercluster/leaflet.markercluster.js"></script>
    
	<script type="text/javascript" src="assets/bootstrap/js/jquery-3.3.1.min.js"></script>
    
	
	
<style type="text/css">
#searchModel .modal-body .search-input{
	box-shadow:0px 0px 15px 0px #ddd;
    padding:10px;
	text-align:center;
	border-radius:10px;
}
#searchModel .modal-body{
	 margin-top:10px;
	 margin-bottom:10px;
}
#searchModel .modal-header h3{
   text-align:center;
   float:none;
}
#searchModel .modal-header .close{
   position:absolute;
   right:10px;
   top:5px;
   width:35px;
   height:35px;
   line-height:35px;
   background-color:#ff1e56;
   color:#fff;
   opacity:1 !important;
   text-align:center;
   border-radius:50%;
}
#searchModel .modal-header .close:hover{
   position:absolute;
   right:10px;
   top:5px;
   width:35px;
   height:35px;
   line-height:35px;
   background-color:#777;
   color:#fff;
}
#searchModel .modal-header .close span{
   line-height:35px;
   text-align:center;
}
#searchModel .modal-body .search-input input, #searchModel .modal-body .search-input select{
	margin:3px 0px;
	height:40px !important;
}
#searchModel .modal-body .searchbtn{
	text-align:center;
	padding:5px 0px;
}
#searchModel .modal-body .searchbtn button{
	 width:80px;
	 height:40px;
	 line-height:40px;
	 padding:0px;
}
		
		
	
	  </style>
</head>
<body>
   
	<div class="my_map">
	
	<div class="modal hide fade" id="updateModal">
      <div class="modal-header" >
	    <h3>Update This Item</h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
      </div>
      <div class="modal-body" >
        <form class="well">
		  <label>ID</label>
          <input type="text" class="form-control" name="id_update" id="id_update" readOnly>
          <label>LAT</label>
          <input type="text" class="form-control" name="lat_update" id="lat_update">
          <label>LON</label>
          <input type="text" class="form-control" name="lon_update" id="lon_update"><br>
          <button type="button" class="btn btn-primary" onclick="updateUser();">Submit</button>
        </form>
      </div>
	  
	  
    </div>
	
	<div class="modal hide fade" id="updateSuccessModal">
      <div class="modal-header">
	    <h3>Updated Successfully</h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
      </div>
      <div class="modal-body">
        <p>Thank you</p>
      </div>
    </div>
	 

      	 
	   <div class="side-menu" id="side-menu">
	         <div class="side-menu-hide" onclick="side_menu_hide()"><span class="fa fa-close"></span></div>
			 <div class="menu-title">
			     <h4> @ MAP INFORMATION</h4>
			 </div>
			 <div class="menu-cont">
			      <div class="menu-info">
				       <div class="agents-num-1">
					        <h5>@ MAP AGENTS</h5>
				            <center>
					           <?php 
						         $agentsData_1 = mysqli_query($con,"select COUNT(*) as no from atword_xl_db");
							     $agentsNo_1   = mysqli_fetch_array($agentsData_1);
							     
								 ?>
								  <div class='numscroller numscroller-big-bottom' >
								    <?php echo $agentsNo_1['no'];?>
								  </div>
								 <?php
						       ?>
					        </center>
				       </div>
					   <div class="agents-num-1">
					        <h5>@ MAP COUNTRIES</h5>
				            <center>
					           <?php 
						         $agentsData_2 = mysqli_query($con,"select DISTINCT Country from atword_xl_db");
							     $agentsNo_2   = $agentsData_2->num_rows;
							     
								 ?>
								  <div class='numscroller numscroller-big-bottom' >
								    <?php echo $agentsNo_2;?>
								  </div>
								 <?php
						       ?>
					        </center>
				       </div>
					   <div class="agents-num-1">
					        <h5>@ MAP CITIES</h5>
				            <center>
					           <?php 
						         $agentsData_3 = mysqli_query($con,"select DISTINCT City from atword_xl_db");
							     $agentsNo_3   = $agentsData_3->num_rows;
							      
								 ?>
								  <div class='numscroller numscroller-big-bottom' >
								    <?php echo $agentsNo_3;?>
								  </div>
								 <?php
						       ?>
					        </center>
				       </div>
				       
				  </div>
			 </div>
	   </div>
	   <div class="top-select-cont">
	       <div class="top-main">
	        <div class="left-logo">
			     <a href="index.php"><img src="img/map.png"></a>
			</div>
		   <div class="top-inputs">
	        <div class="drop-d-select">
			     <select class="form-control" id="choose-country">
				   <?php 
				     if(isset($_GET['map']))
					 {
						 $map = $_GET['map'];
						 $mapTitle = $_GET['map'];
						 echo '<option value="'.$map.'">'.$mapTitle.'</option>';
					 }
					 else
					 {
						 $map = "";
						 $mapTitle = $_GET['Choose A Country'];
						 echo '<option value="'.$map.'">'.$mapTitle.'</option>';
					 }
						 
					   ?>
				     
					 <?php  
					    $countryData = mysqli_query($con,"select COUNT(*) as no ,Country from atword_xl_db GROUP BY Country having COUNT(*) >1 ORDER BY Country ASC");
						while($rows = mysqli_fetch_array($countryData))
						{
					 ?>
					     <option value="<?php echo $rows['Country'];?>"><?php echo strtoupper($rows['Country']);?></option>
					 <?php 
						}
					 ?>
				 </select>
				 <select class="form-control" id="choose-state" >
				     <option value="Kansas"> Choose State </option>
					 <?php  
					    $countryData = mysqli_query($con,"select DISTINCT State from atword_xl_db where Country='USA' and State !='' order by State ASC LIMIT 60");
						while($rows = mysqli_fetch_array($countryData))
						{
					 ?>
					     <option value="<?php echo $rows['State'];?>"><?php echo strtoupper($rows['State']);?></option>
					 <?php 
						}
					 ?>
				 </select>
			</div>
			<div class="search-cont">
			     <div class="agents-num">
				      <h4 >
					     <span id="agentsNo_data"><?php 
						    $agentsData = mysqli_query($con,"select COUNT(*) as no from atword_xl_db");
							$agentsNo   = mysqli_fetch_array($agentsData);
							echo number_format($agentsNo['no'])." ";
						 ?>
						 </span>
						 <span id="agentsNo_res">AGENTS</span>
					  </h4>
				 </div>
				 <div class="search-div">
				      <?php 
				     if(isset($_GET['search-map']))
					 {
						 $map = $_GET['search-map'];
						 echo '<input type="text" value="'.$map.'" id="search-map">';
					 }
					 else
					 {
						 echo '<input type="text" placeholder="Century 21" id="search-map">';
					 }
						 
					   ?>
			          
				      <button id="btn-search" class="btn">
					         <span class="fa fa-search"></span>
					  </button>
				 </div>	  
			</div>
	       </div>
		   </div>
	  </div>
	   <div id="map" class="map-size"></div>
	   <div id="loading-mask" class="modal-backdrop" ></div>
	   <div id="loading" style="">
        <div class="loading-indicator">
		    <h4 id="error-msg">Loading Data ...</h4>
            <img src="img/ajax-loader.gif">
        </div>
       </div>
	   
	   <div id="loading-more" style="display:none">
        <div class="loading-indicator">
		    <h4 >
			    <div class="img-loading"><img src="img/loader.gif"></div>
			    <span id="error-msg-more">Searching ...</span>
				<button class="btn btn-stop" onclick="stopSearching()" alt="Stop Searching"><span class="fa fa-close"></span></button>
				
			</h4>
            
        </div>
       </div>
	   
	   <div id="searching-more">
				<button class="btn btn-stop" onclick="moreSearching()" alt="Stop Searching"><span class="fa fa-search"></span></button>
       </div>
	   
	   <div  style="display:none;background:red;position: absolute;width: 220px;height: 100px;top: 50%;left: 50%;margin: -10px 0 0 -110px;z-index: 20001;border-radius:5px;">
	         hello baby
			<div id="nResults"></div>
			<div id="nProgress"></div>
	   </div>
	   
	   <a href="javascript:void(0)" class="btn-share" onclick="sharePage()">
	      <span class="fa fa-share"></span>
	   </a>
	  <div class="bottom-menu">
	        <div class="bt-menu" id="bt-menu_2"  style="display:none">
			     <span style="margin-top:8px;"></span>
				 <span></span>
				 <span></span>
			</div>
			<div class="bt-info">
			     <div class="bt-logo">
				    <img src="img/map.png">
			     </div>
			     <h4>REAL ESTATE AGENTS @ MAP</h4>
				
			</div>
			
	   </div>
	   
	   
	
	
	<div class="share-side" id="share-side">
	       <div class="side-menu-hide" onclick="side_menu_hide()"><span class="fa fa-close"></div>
	       <div class="share-div" id="share-div">
		      <div class="">
                  <center>
                    <div class="btn-bt"> 
					   <div><button class="social-share facebook"><span class="fa fa-facebook"></span></button></div>
                       <div><button class="social-share twitter"><span class="fa fa-twitter"></span></button></div>
                       <div><button class="social-share instagram"><span class="fa fa-instagram"></span></button></div>
					   <div><button class="social-share whatsapp"><span class="fa fa-whatsapp"></span></button></div>
                    </div>
				 </center>
				 <input id="sHeaders" type="hidden">
             </div>
		   </div>
	</div>
	
	<div class="modal hide fade" id="singleItemShare">
      <div class="modal-header">
	    <h3>Share This Agent </h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
      </div>
      <div class="modal-body">
	        <div class="share-chat">
			     <h5>Contact With Agent</h5>
				 <div class="chat-div">
					     <div><center><button class="social-share wt-chat"><span class="fa fa-whatsapp"></span></button></center></div>
						 <div><center><button class="social-share ph-chat"><span class="fa fa-phone"></span></button></center></div>   
				 </div>
			</div>
			<div class="share-location">
			   <h5>Share Location With </h5>
               <div class="links-s">
                       <div class="social-share fb"><button><span class="fa fa-facebook"></span></button></div>
                       <div class="social-share tw"><button><span class="fa fa-twitter"></span></button></div>
                       <div class="social-share insta"><button><span class="fa fa-instagram"></span></button></div>
					   <div class="social-share wt"><button><span class="fa fa-whatsapp"></span></button></div>
					   
               </div>
			</div>   
			 <input id="thisHeaders" type="hidden">
      </div>
	  
	  
	  
    </div>
	
	
	
	<div class="modal hide fade" id="searchModel">
      <div class="modal-header">
	    <h3 id="search-error">Advanced Search</h3>
        <a class="close" data-dismiss="modal"><span class="fa fa-close"></span></a>
        
      </div>
      <div class="modal-body">
	        <div class="search-input">
			     <input type="text" placeholder="Search here ..." id="searchTxt" class="from-control">
				 <select class="from-control" id="searchA">
				     <option value="">Choose Country</option>
					 <?php  
					    $countryData = mysqli_query($con,"select COUNT(*) as no ,Country from atword_xl_db GROUP BY Country having COUNT(*) >1 ORDER BY Country ASC");
						while($rows = mysqli_fetch_array($countryData))
						{
					 ?>
					     <option value="<?php echo $rows['Country'];?>"><?php echo strtoupper($rows['Country']);?></option>
					 <?php 
						}
					 ?>
				 </select>
				 <select class="from-control searchST">
				         <option value="">Choose State</option>
				 </select>
				 <select class="from-control searchST" >
				         <option value="">Choose City</option>
				 </select>
				 <div id="searchB1"></div>
				 
				 
				 <div class="searchbtn">
				      <button class="btn btn-style" onclick="searchAdv()">Search</button>
				 </div>
			</div>
			 
      </div>
	  
    </div>
	 
	
	</div>
	
	

	<?php 
	   if(isset($_GET['shareID']))
		   {
			   $id   = $_GET['shareID'];
			   $lat  = $_GET['lat'];
			   $lng  = $_GET['lng'];
			   $name = $_GET['name'];
			   
			   ?>
			  <input type="hidden" value="<?php echo $id;?>" id="shareID">
			  <input type="hidden" value="<?php echo $lat;?>" id="lat">
			  <input type="hidden" value="<?php echo $lng;?>" id="lng">
			  <input type="hidden" value="<?php echo $name;?>" id="name">
			  
			  <?php
			  
		   }
		   else
		   {
			   ?>
			  <input type="hidden" value="" id="shareID">
			  <input type="hidden" value="" id="lat">
			  <input type="hidden" value="" id="lng">
			  <input type="hidden" value="" id="name">
			  
			  <?php
		   }
	
	?>
	<input type="hidden" value=""  id="myLat">
    <input type="hidden" value="" id="myLng">
	<input type="hidden" value="" id="myRadis">
	<input type="hidden" value="" id="PageNo">
	<input type="hidden" value="no" id="PNo">
	
	<?php 
	              if(isset($_GET['advanced-search']))
					 {
						 ?>
						    <input type="hidden" value="<?php echo $_GET['advanced-search']; ?>"  id="sTxt">
                            <input type="hidden" value="<?php echo $_GET['searchA']; ?>" id="sTxA">
	                        <input type="hidden" value="<?php echo $_GET['searchB']; ?>" id="sTxB">
	                        <input type="hidden" value="<?php echo $_GET['searchD']; ?>" id="sTxD">
						 
						 <?php 
					 }
					 else
					 {
						 ?>
						    <input type="hidden" value="" id="sTxt">
                            <input type="hidden" value="" id="sTxA">
	                        <input type="hidden" value="" id="sTxB">
	                        <input type="hidden" value="" id="sTxD">
						 
						 <?php 
					 }
	?>
	
	
<script>
    //use 'strict'
	
    let nVar,watchID,map, newUser, users, mapquest, firstLoad ,mapboxUrl ,mapboxAttribution ,accessTokenUrl,mVar;
	mVar = false;
	firstLoad = true;
	nVar = false;
	
	$('.fullScreen').removeClass("fa-eye");
	 $('.fullScreen').addClass("fa-eye-slash");	
    let country_1= $("#choose-country").val();
	let search_1 = $("#search-map").val();
	let share_ID = $("#shareID").val();
	let a_Search = $("#sTxt").val();

		
	let mLat = $("#myLat").val();
	let mLng = $("#myLng").val();
		
	let shareUrl ;
	let getUrl  = window.location;
	firstIntail();
	
   function firstIntail()
	{
	  if(mLat !="" && mLng !="" && mLat !=0)
		{
			getMyLocation();
		}
		else if(a_Search !="")
		{
			AdvSearc();
		}
	    else if(share_ID !="")
		{
			getLat();
		}
		else if(country_1 =="" && search_1 =="")
		{
			getUsers();
		}  
	    else if(country_1 !="" && search_1 =="")
		{
			country();
		}
		else if(search_1 !="")
		{
			$("#PNo").val("yes");
			search();
		}
        else
		{
			getUsers();
		}
	}		
        
		
	mapboxUrl ='https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}';
	mapboxAttribution ='Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ɠ<a href="https://www.mapbox.com/">Mapbox</a>';
	accessTokenUrl ='pk.eyJ1IjoibXNlbmFuIiwiYSI6ImNrbzI4YW1nMjAyNW0ycG52Ym9xMW05Z3IifQ.TtAbPlev96adjUMS5Jwr5g';
					
	// When the window has finished loading create our google map below
    //google.maps.event.addDomListener(window, 'load', init);
	
	
   
    users      = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
	searchList = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
    newUser    = new L.LayerGroup();
	  
    let grayscale = L.tileLayer(mapboxUrl, {id: 'mapbox/light-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
        streets   = L.tileLayer(mapboxUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    satellite = L.tileLayer(mapboxUrl, {id: 'mapbox/satellite-streets-v9', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl}),
	    heatmap   = L.tileLayer(mapboxUrl, {id: 'mapbox/dark-v10', tileSize: 512, zoomOffset: -1, attribution: mapboxAttribution ,accessToken:accessTokenUrl});

	
	 mapquest = new L.TileLayer("http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png", {
        maxZoom: 18,
        subdomains: ["otile1", "otile2", "otile3", "otile4"]
        
      });
	  
	
	map = new L.Map('map', {
        center: new L.LatLng(39.90973623453719, -93.69140625),
        zoom: 3,
		watch:true,
        layers: [grayscale,mapquest, users, newUser]
      });  


    
    let baseMaps = {
          "Light Gray Map": grayscale,
          "Streets Map": streets,
	      "Satellite Map": satellite,
	      "heat Map": heatmap
       };
    let overlayMaps = {
         "All Agents": users
     };


    L.control.layers(baseMaps, overlayMaps).addTo(map);
	 
      
	  
	  // GeoLocation Control
      function geoLocate() {
		
        map.locate({setView: true, maxZoom: 17});
		map.on('locationfound',function(e)
		{
			var myLat = e.latlng.lat;
			var myLng = e.latlng.lng;
			$("#myLat").val(myLat);
		    $("#myLng").val(myLng);
			$("#myRadis").val(50000/2);			
			getMyLocation();
		});
		map.on('locationerror',function(e)
		{
			alert("Please Activate GPS");
		});
		
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
	  
	  
      map.addControl(geolocControl);
      map.addControl(new L.Control.Scale());
	  map.addControl(hideControl);

	 $(document).ready(function() {
        $.ajaxSetup({cache:false});
        
	    startWatch();
		window.onload = startWatch;
		/////////////
		
		///// countries filter /////
		$("#choose-country, #choose-state").change(function()
		{
		   $("#PNo").val("no");
		   $("#PageNo").val("");
           $("#loading-more").hide("slow");		
		   country();
		});
		////// search filters //////
		$("#btn-search").click(function()
		{
			$("#PNo").val("yes");
		    search();
		});
		
		////// search filters //////
		$("#search-map").keyup(function()
		{
		    $("#PNo").val("no");
			$("#PageNo").val("");
            $("#loading-more").hide("slow");	
		});
		
		
		$("#searchA").change(function()
		{
			let searchA = $("#searchA").val();
			if(searchA !="")
			{
				var dataString = 'search='+ searchA;
				$.ajax({
					url:'map/searchA.php',
					type:'POST',
					data:dataString,
					beforeSend:function()
					{
						$("#search-error").text("Loading Details ...");
					},
					success:function(data)
					{
						$(".searchST").hide("slow");
						$("#searchB1").html(data);
						$("#search-error").text("Advanced Search");
					}
				});
			}
		});
		
		
	  });
	
	
	  function stopSearching()
	  {
		    $("#PNo").val("no");
			$("#PageNo").val("");
            $("#loading-more").hide("slow");	
	  }
	  ////// full screen hide/////
	  function gethide()
	  {
		  if(nVar == false)
			{
				
				$(".top-select-cont").css({'display':'none'});
				$('#map').removeClass("map-size");
				$('.fullScreen').addClass("fa-eye");
				$('.fullScreen').removeClass("fa-eye-slash");			
				nVar = true;
			}
			else
			{
				$(".top-select-cont").css({'display':'block'});
				$('#map').addClass("map-size");
				$('.fullScreen').removeClass("fa-eye");
				$('.fullScreen').addClass("fa-eye-slash");
				
				nVar = false;
			}
		
	  }

	    ////////////// start functions Loading /////
		
	 function country()
	    {
		   let country = $("#choose-country").val();
		   let state   = $("#choose-state").val();
		   	   
		   if(country == "USA")
			   $("#choose-state").show("slow"); 
		   else
			   $("#choose-state").hide("slow");
		   
		   getCountryNo(country,state);
		   var dataString = 'country='+ country + '&state='+ state;
		   $.ajax({
			   url:'map/get_users.php',
			   type:'POST',
			   data:dataString,
			   dataType:'JSON',
			   beforeSend:function()
			   {
				    
				   $("#error-msg").fadeIn("slow").text("Loading "+country+" Data ...");
				   $("#loading").show("slow");
				   $("#loading-mask").show("slow");
				   window.history.pushState("Details","Title","index.php?map="+country);
				   shareUrl = "?map="+country;
				   $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl);
				   
			   },
			   success:function(data)
			   { 
			     getCountryNo(country,state);
			     if(data !="")
				 {
					   searchList.clearLayers();
				       users.clearLayers();
				       for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             users.addLayer(marker);
		               }
				    
					   map.fitBounds(users.getBounds());
			           $("#error-msg").fadeOut("slow").text("Loading "+country+" Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					   
                       firstLoad = false;
				 }
				 else
				 {
					 $("#error-msg").fadeIn("slow").text("No Data Found ....");
					 setTimeout(function(){
					     $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
					 },3000);
				 }
				   
			   }
		   });
           		   
			
		}
	  
     function search()
		{
		   let search     = $("#search-map").val();
		   let newName    = search.replace(/[ ]/g,'-');
           let searchName = search.replace(/[-]/g,' ');	
		   let page_no    = $("#PageNo").val();
		   let PNo        = $("#PNo").val();	
		   if(page_no=="")
			   page_no = 0;
		   else 
			   page_no = page_no;
		   
           	page_no++;
           	   
           $("#PageNo").val(page_no);		
		   if(search == "")
		   {
			   $("#search-map").focus();
		   }
		   var dataString = 'search='+ searchName+'&page_no='+ page_no;
		   if(search !="" && PNo =="yes")
		   {
			   $.ajax({
			   url:'map/get_search.php',
			   type:'POST',
			   data:dataString,
			   dataType:'JSON',
			   beforeSend:function()
			   {
				   
				   $("#error-msg").fadeIn("slow").text("Loading "+searchName+" Data ...");
				   $("#loading").show("slow");
				   $("#loading-mask").show("slow");
				   window.history.pushState("Details","Title","index.php?search-map="+newName);
				   shareUrl = "?search-map="+newName;
			       $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl)
				   
			   },
			   success:function(data)
			   { 
			     if(data !="" && PNo =="yes")
				 {
					   getSearchNo(searchName);
				       searchList.clearLayers();
				       users.clearLayers();
				       for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             searchList.addLayer(marker);
		               }
				       map.addLayer(searchList);
					   map.fitBounds(searchList.getBounds());
			           $("#error-msg").fadeOut("slow").text("Loading "+searchName+" Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					   
					    setTimeout(function(){
						     reloadSearch();
					     },500);
                       firstLoad = false;
				 }
				 else
				 {
					 $("#error-msg").fadeIn("slow").text("No Data Found ....");
					 setTimeout(function(){
					     $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
						 $("#search-map").val("");
					 },3000);
				 }
				   
			   }
		   });
           
			   
		   }
		  	
			
		}
	
     function reloadSearch()
	 {
		   let search     = $("#search-map").val();
		   let newName    = search.replace(/[ ]/g,'-');
           let searchName = search.replace(/[-]/g,' ');	
		   let page_no    = $("#PageNo").val();
           let PNo        = $("#PNo").val();	
			page_no++;
            	
           $("#PageNo").val(page_no);		
		   if(search == "")
		   {
			   //$("#search-map").focus();
		   }
		   var dataString = 'search='+ searchName+'&page_no='+ page_no;
		   if(search !="" && PNo =="yes")
		   {
			   $.ajax({
			   url:'map/get_search.php',
			   type:'POST',
			   data:dataString,
			   dataType:'JSON',
			   beforeSend:function()
			   {
				   
				   $("#error-msg-more").fadeIn("slow").text("Searching more ...");
				   $("#loading-more").show("slow");
				   window.history.pushState("Details","Title","index.php?search-map="+newName);
				   shareUrl = "?search-map="+newName;
			       $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl)
				   
			   },
			   success:function(data)
			   { 
			     
			     if(data !="" && data !=0 && PNo =="yes")
				 {
				       //map.removeLayer(users);
				       for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             searchList.addLayer(marker);
		               }
				       //map.addLayer(users);
					   map.fitBounds(searchList.getBounds());
			           //$("#error-msg-more").fadeOut("slow").text("Loading "+searchName+" Data ...");
				       //$("#loading-more").hide("slow");
				      
					    setTimeout(function(){
						     reloadSearch();
					     },500);
                       firstLoad = false;
				 }
				 else
				 {
					 $("#error-msg-more").fadeIn("slow").text("No More Data Found");
					 setTimeout(function(){
						 
					     $("#error-msg-more").fadeOut("slow").text("No More Data Found");
				         $("#loading-more").hide("slow");
						 $("#search-map").val("")
				         
					 },1000);
				 }
				   
			   }
		   });
           
			   
		   }
		  	
			
	 }	 
	 function getUsers() {
        $.getJSON("map/get_data.php", function (data) {
                for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             users.addLayer(marker);
					         
					   }
		        }).complete(function() {
                if (firstLoad == true) 
				{
                         map.fitBounds(users.getBounds());
			             $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
			             getUEAno();
			             window.history.pushState("Details","Title","index.php?map=UAE");
			             shareUrl = "?map=UAE";
			             $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl)
			
                         firstLoad = false;
               };
        });
      }

	  var redIcon = new L.Icon({
		  iconUrl:'assets/leaflet/images/marker-red.png',
		  iconSize:[25,41],
		  iconAnchor:[12,41],
		  popupAnchor:[1,-34],
		  shadowSize:[41,41]
	  });
     function getLat()
	   {
		   let shareID = $("#shareID").val();
		   let lat = $("#lat").val();
		   let lng = $("#lng").val();
		   let dName = $("#name").val();
		   let newName = dName.replace(/[ ]/g,'-');	
		   	   
		   
		   
		   var dataString = 'shareID='+ shareID;
		   $.ajax({
			   url:'map/get_lat.php',
			   type:'POST',
			   data:dataString,
			   dataType:'JSON',
			   beforeSend:function()
			   {
				   $("#error-msg").fadeIn("slow").text("Loading "+dName+" Data ...");
				   $("#loading").show("slow");
				   $("#loading-mask").show("slow");
				   window.history.pushState("Details","Title","index.php?shareID="+shareID+"&lat="+lat+"&lng="+lng+"&name="+newName);
				   shareUrl = "?shareID="+shareID+"&lat="+lat+"&lng="+lng+"&name="+newName;
				   $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl);
				   
			   },
			   success:function(data)
			   { 
			         getLatNo(shareID);
			         if(data !="")
				     {
				       searchList.clearLayers();
				       users.clearLayers();
				       var nLocation = new L.LatLng(lat,lng);
				   
				       for (var i = 0; i < data.length; i++) 
					   {
                              var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             
							 
						if(data[i].lat == lat && data[i].lng == lng)
			              {
				            let Nname  = data[i].name;
                            let Ntitle = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+ web_s +"' target='_blank'>"+ name + "</a></div></div>";
                            let Nphone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                            let Ncity  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ city +" , "+ us +"</div></div>";
			                let NUN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                let Nimg   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                let Nbtn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ data[i].Phone_Number +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+ data[i].name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
				           var nMarker = new L.Marker(nLocation, {
                                  Ntitle: Nname,
								  icon:redIcon
                           }).addTo(map);
					        var rmarker = L.circle([lat,lng],500,{
						         weight:1,
						         color:'orange',
						         fillColor:'green',
						         fillOpacity:'0.02'
					        }).addTo(map);
						   nMarker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + Ntitle + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'}).openPopup();
				   	
						  }
			              users.addLayer(marker);
		               }
				    
					   map.fitBounds(users.getBounds());
					   newUser.addLayer(nMarker);
					   newUser.addLayer(rmarker);
			           $("#error-msg").fadeOut("slow").text("Loading "+dName+" Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
				   
                       firstLoad = false;
					
				     }
				 else
				    {
					 $("#error-msg").fadeIn("slow").text("No Data Found ....");
					 setTimeout(function(){
					     $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
					 },3000);
				    }
				   
			   }
		   });
           		   
			
	   }
	 
	 function getMyLocation()
	   {
		   
		   var lat = $("#myLat").val();
		   var lng = $("#myLng").val();  
		   var radis = $("#myRadis").val();
		   
		   var dataString = 'lat='+ lat + '&lng='+ lng;
		   $.ajax({
			   url:'map/get_my_lat.php',
			   type:'POST',
			   data:dataString,
			   dataType:'JSON',
			   beforeSend:function()
			   {
				   $("#error-msg").fadeIn("slow").text("Loading  Data ...");
				   $("#loading").show("slow");
				   $("#loading-mask").show("slow");
				   window.history.pushState("Details","Title","index.php?myLat="+lat+"&myLng="+lng);
				   shareUrl = "?myLat="+lat+"&myLng="+lng;
				   $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl);
				   
			   },
			   success:function(data)
			   { 
			     if(data !="")
				 {
				   searchList.clearLayers();
				    users.clearLayers();
				   var nLocation = new L.LatLng(lat,lng);
				   for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             users.addLayer(marker);
		               }
				    
					   
				     
				       var Ntitle ,nameHere;
		               nameHere = "Your Location";
		               var nMarker = new L.Marker(nLocation, {
                               Ntitle: nameHere,
							   icon:redIcon
                        }).addTo(map);
					   nMarker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>Your Location : <span class='fa fa-map-marker'></span></div>", {maxWidth: '400'}).openPopup();
				   	   var rmarker = L.circle([lat,lng],radis,{
						    weight:1,
						    color:'orange',
						    fillColor:'green',
						    fillOpacity:'0.02'
					    }).addTo(map);
		               map.fitBounds(users.getBounds());
		               newUser.addLayer(nMarker);
					   newUser.addLayer(rmarker);
			           $("#error-msg").fadeOut("slow").text("Loading  Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					   
                       firstLoad = false;
			        
					
				 }
				 else
				 {
					 
					 $("#error-msg").fadeIn("slow").text("Network Error ...");
					 setTimeout(function(){
					   $("#error-msg").fadeOut("slow").text("Loading  Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					 },3000);
				 }
				   
			   }
		   });
           		   
			
	   }
	 			
	  /////// Country URL Profile////	
     function urlUpdate(ID,Country,email)
	   {
		       let offset , nUrl , realUrl , stateUrl;
		       if(Country =="UNITED KINGDOM")
			        us = "UK";
	           else if(Country =="SAUDI ARABIA")
			        us = "KSA";			   
		       else
			        us = Country;
	           offset = 0;	 
	           offset = email.indexOf("@");
	           nUrl   = email.substr(0,offset);
		
	           
			   
		     if(Country == "UAE")
			         stateUrl = "https://ae.at.world/atclub/members/";
		      else if(Country == "CYPRUS")   
			         stateUrl = "https://cy.at.world/atclub/members/";
		      else if(Country == "SAUDI ARABIA") 
			         stateUrl = "https://sa.at.world/atclub/members/";
			  else if(Country == "QATAR") 
			         stateUrl = "https://qa.at.world/atclub/members/";
              else if(Country == "Egypt") 
			         stateUrl = "https://eg.at.world/atclub/members/";
              else if(Country == "KUWAIT" || Country == "Kuwait") 
			         stateUrl = "https://kw.at.world/atclub/members/";
              else if(Country == "BAHRAIN") 
			         stateUrl = "https://bh.at.world/atclub/members/";
              else if(Country == "OMAN" || Country == "Oman") 
			         stateUrl = "https://om.at.world/atclub/members/";
              else if(Country == "Turkey") 
			         stateUrl = "https://tr.at.world/atclub/members/";				 
              else 
			         stateUrl = "https://at.world/atcluben/members/";
				 
			realUrl = stateUrl+us+"_"+nUrl+"_AT_"+ID+"/";
				 
	        return realUrl;
	    }
	
	////////////////////////
	 function side_menu_hide()
		{
			//$("#side-menu").hide("slow");
			$("#share-side").hide("slow");
			mVar = false;
		}		
	  
	function getSearchNo(m)
	{
		 var dataString = 'm='+ m;
        $.ajax({
          type: "POST",
          url: "map/get_search_1.php",
          data: dataString,
          success: function(res) {
			
            $("#agentsNo_data").text(res);
			$("#agentsNo_res").text("RESULTS");
			setShareLinks();
          }
        });
        return false;
	}	
	
	function getCountryNo(m,n)
	{
        var dataString = 'm='+ m + '&n=' + n;
        $.ajax({
          type: "POST",
          url: "map/get_user_1.php",
          data: dataString,
          success: function(res) {
			
            $("#agentsNo_data").text(res);
			$("#agentsNo_res").text("AGENTS");
			setShareLinks();
          }
        });
        return false;
		
	}
	
	function getLatNo(shareId)
	{
		var dataString = 'shareId='+ shareId;
        $.ajax({
          type: "POST",
          url: "map/get_lat_no.php",
          data: dataString,
          success: function(res) {
			
            $("#agentsNo_data").text(res);
			$("#agentsNo_res").text("AGENTS");
			setShareLinks();
          }
        });
        return false;
		
		
	}
	  
	
	function getUEAno()
	{
        $.ajax({
          type: "POST",
          url: "map/get_data_1.php",
          success: function(res) {
            $("#agentsNo_data").text(res);
			$("#agentsNo_res").text("AGENTS");
			setShareLinks();
          }
        });
        return false;
		
	}
	
	function btnUpdate(Id)
	{
		$('#updateModal').css({'margin-top':'-150px','width':'350px','height':'350px','margin-left':'-180px'});
		$('#updateModal').modal('show');
        var ID = $(Id).attr("id");
        var lat = $(Id).attr("lat");
        var lng = $(Id).attr("lng");
        $("#id_update").val(ID);
		$("#lat_update").val(lat);
		$("#lon_update").val(lng);
       
	}
	
	
	function updateUser()
	{
		$("#loading-mask").show();
        $("#loading").show();
        var id  = $("#id_update").val();
        var lat = $("#lat_update").val();
        var lng = $("#lon_update").val();
		$('#updateSuccessModal').css({'margin-top':'-150px','width':'350px','height':'100px','margin-left':'-180px'});
 
        var dataString = 'id='+ id + '&lat=' + lat + '&lng=' + lng;
        $.ajax({
          type: "POST",
          url: "map/update_user.php",
          data: dataString,
          success: function(res) {
			$('#updateModal').modal('hide');
            $("#loading-mask").hide();
            $("#loading").hide();
            $('#updateSuccessModal').modal('show');
          }
        });
        return false;
	}
	
	
	function sharePage()
	{
			if(mVar == false)
			{
				$("#share-side").show("slow");
				mVar = true;
			}
			else
			{
				$("#share-side").hide("slow");
				mVar = false;
			}
	}
	
	
	////// search Advanced /////
	function moreSearching()
	{
		$('#searchModel').css({'margin-top':'-150px','width':'300px','height':'370px','margin-left':'-150px'});
		$('#searchModel').modal('show');
	}
	
	function searchAdv()
	{
		let name      = $("#searchTxt").val();
		let searchA   = $("#searchA").val();
		let searchB   = $("#searchB").val();
		let searchD   = $("#searchD").val();
		let searchTxt = name.replace(/[ ]/g,'-');
		if(searchTxt =="")
		{
			$("#search-error").text("Fill Search Fields");
			setTimeout(function()
			{
				$("#search-error").text("Advanced Search");
			},3000);
		}		
    	var dataString = 'searchTxt='+ name +'&searchA='+ searchA +'&searchB='+ searchB +'&searchD='+ searchD;
		if(searchTxt !="")
		{
			$.ajax({
				url:'map/searchAdv.php',
			    type:'POST',
			    data:dataString,
			    dataType:'JSON',
			    beforeSend:function()
			    {
				     $('#searchModel').modal('hide');
					  $("#error-msg").fadeIn("slow").text("Loading "+name+" Data ...");
				      $("#loading").show("slow");
				      $("#loading-mask").show("slow");
				      window.history.pushState("Details","Title","index.php?advanced-search="+searchTxt+"&searchA="+searchA+"&searchB="+searchB+"&searchD="+searchD);
				      shareUrl = "?advanced-search="+searchTxt+"&searchA="+searchA+"&searchB="+searchB+"&searchD="+searchD;
			          $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl)
					 
			    },
			    success:function(data)
			    {
				    if(data !="" && data !=0)
				 {
					   //getSearchNo(searchName);
				       searchList.clearLayers();
				       users.clearLayers();
				       for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             searchList.addLayer(marker);
		               }
				       map.addLayer(searchList);
					   map.fitBounds(searchList.getBounds());
			           $("#error-msg").fadeOut("slow").text("Loading "+name+" Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					   
					    setShareLinks()
                       firstLoad = false;
				 }
				 else
				 {
					 $("#error-msg").fadeIn("slow").text("No Data Found ....");
					 setTimeout(function(){
					     $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
						 $("#search-map").val("");
					 },3000);
				 }
				   
			    }	
			});
		}
		else
		{
			
		}
	}
	
	
	function AdvSearc()
	{
		let name      = $("#sTxt").val();
		let searchA   = $("#sTxA").val();
		let searchB   = $("#sTxB").val();
		let searchD   = $("#sTxD").val();
		let searchTxt = name.replace(/[-]/g,' ');
		
		var dataString = 'searchTxt='+ searchTxt +'&searchA='+ searchA +'&searchB='+ searchB +'&searchD='+ searchD;
		if(searchTxt !="")
		{
			$.ajax({
				url:'map/searchAdv.php',
			    type:'POST',
			    data:dataString,
			    dataType:'JSON',
			    beforeSend:function()
			    {
				      //$('#searchModel').modal('hide');
					  $("#error-msg").fadeIn("slow").text("Loading "+searchTxt+" Data ...");
				      $("#loading").show("slow");
				      $("#loading-mask").show("slow");
				      window.history.pushState("Details","Title","index.php?advanced-search="+name+"&searchA="+searchA+"&searchB="+searchB+"&searchD="+searchD);
				      shareUrl = "?advanced-search="+name+"&searchA="+searchA+"&searchB="+searchB+"&searchD="+searchD;
			          $("#sHeaders").val(getUrl.origin+getUrl.pathname+shareUrl)
					 
			    },
			    success:function(data)
			    {
				    if(data !="" && data !=0)
				 {
					   //getSearchNo(searchName);
				       searchList.clearLayers();
				       users.clearLayers();
				       for (var i = 0; i < data.length; i++) 
					   {
                             var location = new L.LatLng(data[i].lat, data[i].lng);
                             let name    = data[i].name;
                             let web     = data[i].website;
			                 let phone   = data[i].Phone_Number;
			                 let city    = data[i].city;
			                 let image   = data[i].image;
			                 let email   = data[i].email;
							 let Country     = data[i].Country;
			                 let web_s = web.replace('at.world/atagents/','');
			                 image_sr ="img/map.png";
			                 
			                 let urlbs = urlUpdate(data[i].Unique_ID,Country,email);
							 
							 let title = "<div class='leaf-header-data'><div class='leaf-header-info' style=''><a href='"+web_s+"' target='_blank'>"+ name + "</a></div></div>";
                             let sh_phone = "<div class='leaf-body-data'><div class='leaf-body-title'>Phone</div><div class='leaf-body-info' style=''><a href='tel:+"+ phone +"' target='_blank'>+"+ phone + "</a></div></div>";
                             let sh_city  = "<div class='leaf-body-data' style='background:#fff'><div class='leaf-body-title'>Location</div><div >"+ Country +" , "+ city +"</div></div>";
			                 let UN_ID = "<div class='leaf-body-data'><div class='leaf-body-title'>ID</div><div>"+ data[i].Unique_ID +"</div></div>";
			
			                 let sh_img   = "<center><div class='agent_img'><img src='"+image_sr+"' alt='No Image'></div></center>";
			                 let sh_btn   = "<center><div class='item-btns'><button class='btn_up btn' onclick='btnUpdate(this)'  lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"'><span class='fa fa-edit'></span> EDIT </button>"+
			                 "<button class='wts-share btn' onclick='shareThis(this)' phone='"+ phone +"' lng='"+ data[i].lng +"' lat='"+ data[i].lat +"' id='"+ data[i].Unique_ID +"' name='"+name+"' ><span class='fa fa-whatsapp'></span></button>"+
			                 "<button class='item-prof btn' ><a href='"+ urlbs +"' target='_blank' ><span class=''>@</span><span class='leaf-body-logo'>CLUB</span></a></button></div></center>";
            
							 var marker = new L.Marker(location, {
                                title: name
                             });
                             marker.bindPopup("<div class='leaf-popup' style='text-align: center; margin-left: auto; margin-right: auto;'>"+sh_img + title + sh_phone + sh_city + UN_ID + sh_btn+"</div>", {maxWidth: '400'});
                             searchList.addLayer(marker);
		               }
				       map.addLayer(searchList);
					   map.fitBounds(searchList.getBounds());
			           $("#error-msg").fadeOut("slow").text("Loading "+searchTxt+" Data ...");
				       $("#loading").hide("slow");
				       $("#loading-mask").hide("slow");
					   setShareLinks();
					    
                       firstLoad = false;
				 }
				 else
				 {
					 $("#error-msg").fadeIn("slow").text("No Data Found ....");
					 setTimeout(function(){
					     $("#error-msg").fadeOut("slow").text("No Data Found ....");
				         $("#loading").hide("slow");
				         $("#loading-mask").hide("slow");
						 $("#search-map").val("");
					 },3000);
				 }
				   
			    }	
			});
		}
		else
		{
			
		}
		
	}
	///////////////////////////////
	function shareThis(Id)
	{
		$('#singleItemShare').css({'margin-top':'-150px','width':'300px','height':'270px','margin-left':'-150px'});
 
		$('#singleItemShare').modal('show');
        var shareId = $(Id).attr("id");
		var name  = $(Id).attr("name");
		var lat   = $(Id).attr("lat");
		var lng   = $(Id).attr("lng");
		var phone = $(Id).attr("phone");
        
       setShareThisLinks(phone,lat,lng,shareId,name)
	}
	
function socialWindow(url) {
  var left = (screen.width - 570) / 2;
  var top = (screen.height - 570) / 2;
  var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
  // Setting 'params' to an empty string will launch
  // content in a new tab or window rather than a pop-up.
  // params = "";
  window.open(url,"NewWindow",params);
}

function setShareLinks() {
  let shareHeaders = $("#sHeaders").val();
  var pageUrl = encodeURIComponent(shareHeaders);
  var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

  $(".social-share.facebook").on("click", function() {
    url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
    socialWindow(url);
  });

  $(".social-share.twitter").on("click", function() {
    url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
    socialWindow(url);
  });

  $(".social-share.linkedin").on("click", function() {
    url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
    socialWindow(url);
  })
  
  $(".social-share.whatsapp").on("click", function() {
    url = "https://wa.me/?text=" + pageUrl;
    socialWindow(url);
  })
}

 function setShareThisLinks(phone,lat,lng,shareId,name) {
  let newName = name.replace(/[ ]/g,'-');
  let newPhone = phone.replace(/[+|-|]/g,'');  
  let mUrl = getUrl.origin+getUrl.pathname+"?shareID="+shareId+"&lat="+lat+"&lng="+lng+"&name="+newName;
  var pageUrl = encodeURIComponent(mUrl);
  //var pageUrl = mUrl;
  var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));
  var wts = encodeURIComponent($("meta[property='og:description']").attr("content"));

  $(".social-share.fb").on("click", function() {
    url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  });

  $(".social-share.tw").on("click", function() {
    url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  });

  $(".social-share.lnk").on("click", function() {
    url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  })
  
  $(".social-share.wt").on("click", function() {
    url = "https://wa.me/?text=" + pageUrl ;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  })
  
  $(".social-share.wt-chat").on("click", function() {
    url = "https://wa.me/+"+ newPhone + "?text=" + encodeURIComponent(newName) ;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  })
  
  $(".social-share.ph-chat").on("click", function() {
    url = "tel:+"+ newPhone;
    socialWindow(url);
	$('#singleItemShare').modal('hide');
  })
}


	
     
	
	/////////////////////////////
	function showPosition() 
	{
                 if(navigator.geolocation) {
                     watchID = navigator.geolocation.watchPosition(successCallback);
                  } else {
                          alert("Sorry, your browser does not support HTML5 geolocation.");
                         }
     }
	 
    function successCallback(position) 
	{
		var toggleWatchBtn = document.getElementById("nProgress");
         toggleWatchBtn.innerHTML = "Stop Watching";
        
        // Check position has been changed or not before doing anything
        if(prevLat != position.coords.latitude || prevLong != position.coords.longitude)
		{
            
            // Set previous location
            var prevLat = position.coords.latitude;
            var prevLong = position.coords.longitude;
           
            // Get current position
            var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
            document.getElementById("nResults").innerHTML = positionInfo;
            
			//searchDistance
			if(!position.coords.latitude)
			{
				$("#myLat").val(0);
				$("#myLng").val(0);
				
				
			}	
			else
			{
				$("#myLat").val(position.coords.latitude);
				$("#myLng").val(position.coords.longitude);
				
			}
				
        }
        
    }

    function startWatch() 
	{
        var result = document.getElementById("nResults");
        var toggleWatchBtn = document.getElementById("nProgress");
        
		if(watchID) 
		    {
                toggleWatchBtn.innerHTML = "Start Watching";
                navigator.geolocation.clearWatch(watchID);
                watchID = false;
            } else 
			{
                toggleWatchBtn.innerHTML = "Aquiring Geo Location...";
                showPosition();
            }
    }
	
	
	
</script>
      
	  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>