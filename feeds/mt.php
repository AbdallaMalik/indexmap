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
	$stWEBTITLE   = $stDBCONST->getstWEBTITLE();
	
	$smCONNECT    = $stDBss->getsmCONNECT();

?>

    <link href='<?php echo $smURLPARENt;?>GAssets/Amap/css/style-starter-st.css' rel='stylesheet' type='text/css'>
    <script src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
	
	<link rel="stylesheet" href="feeds.css">
	
    <center>
	     
	     <div class="db-config d-none">
      	    <h4>convert from feet to meter</h4>
			<div>
	           <input type="hidden" value="0"  placeholder="db name" id="dbName" class="form-control">
			   <input type="password" value="Hopeless08-max"  placeholder="db pass" id="dbPass" class="form-control" readOnly><br/>
			</div>
			<div id="db-error" class="alert-danger"></div>
		 </div>
	     <div class="d-transfer">
		      <h4> Data Transportation</h4>
      	    <div id="d-error" class="alert-danger"></div>
	        <input type="text" value="" placeholder="country" id="country" class="form-control">
			<div>
			   <input type="text" value="1" id="res" class="form-control" readOnly>
			   <input type="text" value="1" id="num" class="form-control" readOnly>
			</div> 
            <div>			
			    <input type="text" value="" id="limitData" placeholder="Limit Data" class="form-control" >
			    <input type="text" value="" id="startId" placeholder="Start Id" class="form-control">
			</div>	
			<br/>
			<div id="result" class="alert-success"></div>
			<button onclick="btn()" class="btn">Start</button><br/>
		 </div>
	</center>
		
<script>
    
	  function btn()
	  {
		  
		  let uStart   = $("#startId").val();
		  let limit    = $("#limitData").val();
		  let res      = $("#res").val();
		  let num      = $("#num").val();
		  
		  let dbName   = $("#dbName").val();
		  let dbPass   = $("#dbPass").val();
		  let country  = $("#country").val();
		  
		  if(dbName =="")
		  {
			  $("#db-error").fadeIn("slow").text("Please Add DB Name");
			  setTimeout(function()
			  {
				  $("#db-error").fadeOut("slow").text("Please Add DB Name");
			  },3000);
		  }
		  else if(dbPass =="")
		  {
			  $("#db-error").fadeIn("slow").text("Please Add DB Pass");
			  setTimeout(function()
			  {
				  $("#db-error").fadeOut("slow").text("Please Add DB Pass");
			  },3000);
		  }
		  else if(country =="")
		  {
			  $("#d-error").fadeIn("slow").text("Please Add country Name");
			  setTimeout(function()
			  {
				  $("#d-error").fadeOut("slow").text("Please Add country Name");
			  },3000);
		  }
		  
		  if(dbName !="" && dbPass !="" && country !="" && uStart !="" && limit !="")
		  {
			$.ajax(
		    {
			 url:'convertTO.php',
			 method:'POST',
			 data:{uStart:uStart,limit:limit,dbName:dbName,dbPass:dbPass,country:country},
			 beforeSend:function()
			 {
			   $("#result").fadeIn("slow").html('<p>Updating Data : '+(num)+'  <p/><p> Please Wait : '+(res)+'...</p>');
			 },
			 success:function(data)
			 {
				if(data == 1)
				{	 
					 $("#res").val(res * 1 + 1);
					 $("#startId").val(uStart * 1 + limit * 1);
					 $("#num").val(res * limit * 1);
					 setTimeout(function()
					 {
					    btn();
					 },2000);
					 
					 $("#result").fadeIn("slow").html('<p> Done Successfully ...</p><p> Result : '+num+'</p>');
				 }
				 else if(data == 2)
				 {
					 $("#startId").val(uStart * 1 + limit * 1);
					 setTimeout(function()
					 {
						// btn();
					 },1000);
					 $("#result").fadeIn("slow").html("Erorr :");
				 }
				 else if(data == 3)
				 {
					 $("#startId").val(uStart * 1 + limit * 1);
					 setTimeout(function()
					 {
						 btn();
					 },1000);
					 $("#result").fadeIn("slow").html("There Is No Data To Be Syn :");
				 }
				 else if(data == 5)
				 {
					 $("#result").fadeIn("slow").html("There Is No More Data To be Syn ... :");
				 }
				 else 
				 {
					 $("#startId").val(uStart * 1 + limit * 1);
					 setTimeout(function()
					 {
						 //btn();
					 },1000);
					 $("#result").fadeIn("slow").html("Waiting ... :");
				 }
				 
				 
			 }
		   });
	  
		  }
	  
	  }
</script>








