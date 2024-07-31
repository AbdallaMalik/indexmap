<?php require_once('../../reGccllPanel/reGDB/reGcInit.php');

	$reAdirect = "";
	$reGdirect = "../";
	$reGPdirect = "../../";
	
	function mdSTRclean($mdstr)
	{
		$mdNwrod = "";
		$mdword  = "";
		
	    $mdstr   = trim($mdstr);
		$mdwrdb  = "";
		if(strpos($mdstr,"(") != false)
		{
			$mdstart = strpos($mdstr,"(");
		    $mdlast  = strpos($mdstr,")");
		    $mdword  = substr($mdstr,$mdstart,$mdlast);
			
			$mdstartb = strpos($mdword,"(");
		    $mdlastb  = strpos($mdword,")");
		    $mdwrdb   = substr($mdword,$mdstartb+1,$mdlastb-1);
		}			
			
		$mdRes   = array(";","\\","\"","'","|","?","%","&","/","<",">",$mdword);
			
		$mdNwrod = str_replace($mdRes,"",$mdstr);
		$mdNwrod = trim($mdNwrod)." ".$mdwrdb;
			
		return $mdNwrod;	
	}
	
	$defMAPTITLe = "transfer panel";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $defMAPTITLe;?>">
    <meta name="author" content="monear senan (bright lab)">
	<title id="real-title-top"><?php echo $defMAPTITLe;?></title>
    <link rel="shortcut icon" id="ftPageLOGO" href="<?php echo $reGcicon;?>">
	<meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?php //echo $defMAPTITLe;?>">
    <meta property="og:description" content="<?php //echo $defMAPTITLe." | ".$defMAPDESC;?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php //echo $headerIcon;?>">
    <meta property="og:image:type" content="image/*">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
	
    <link href='<?php echo $reGPdirect;?>GAssets/Amap/css/style-starter-st.css' rel='stylesheet' type='text/css'>
    <link href="<?php echo $reAdirect;?>mdAssets/homeImports.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $reAdirect;?>mdAssets/reGlocate.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo $reGPdirect;?>GAssets/Amap/js/jquery-2.2.3.js"></script>

<style>
.mdmetAtParent{
	position:relative;
	width:100% !important;
	overflow:hidden !important;
}
.mdmetAtParent .mdmetAtable{
	position:relative;
	width:100% !important;
	max-width:100% !important;
	overflow:scroll !important;
}
</style>
	
    <script>
    $(document).ready(function()
	{
		mdstartHTML();			
	});
    </script>
</head>

<body>
  
    <div class="mdUPLOADfilesParent">
        
        <div class="mdmetAParent">
            <div class="mdUPLOADfilescn d-flex">
                <form action="" method="POST" fm="index" 
					name="mdUPLOADfiles" id="mdUPLOADfiles" 
					class="mdUPLOADfiles d-flex">
					  
                    <div class="d-flex mdmetAheader">
                        <div class="d-flex mdmetAcontrol">
						    
						    <select id="mdUPLOADKeY" name="mdUPLOADKeY" class="mdUPLOADdollar mdUPLOADInss form-control">
						        <option value="InCountry">Country</option>
							    <option value="InCity">City</option>
								<option value="InDistrict">District</option>
								<option value="InArea">Area</option>
								<option value="InAddress">Address</option>
								<option value="InComPound">Build</option>
						    </select>
							
                        </div>
						<div class="d-flex mdmetAcontrol">
						    
							<button type="submit" class="btn btn-primary mdSTARTfeedinGs" 
						        md="reGlocate" mdKND="reGlocate" onclick="mdUPLOADINGfiles(event,this)">
						        reGlocate
						    </button>
						</div>
						
                    </div>
					
					<div class="d-flex mdmetAsheader">
					    <label class="d-flex mdmetAshlabel">
						    <span>status</span>
							<span class="mdUPLOADstatus"></span>
						</label>
						<div class="d-flex mdmetAshinPuts">
						    <input type="text" id="mdUPLOADoset" name="mdUPLOADoset" value="0" class="mdUPLOADInss form-control">
							<input type="text" id="mdUPLOADRows" name="mdUPLOADRows" value="1" class="mdUPLOADInss form-control">
                            <input type="text" id="mdUPLOADName" name="mdUPLOADName" class="mdUPLOADInss form-control" readOnly>
							<input type="text" id="mdUPLOADsize" name="mdUPLOADsize" class="mdUPLOADInss form-control" readOnly>
							
							<input type="hidden" id="mdUPLOADPath" name="mdUPLOADPath" class="mdUPLOADInss form-control" readOnly>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="mdmetAtParent">
            <?php
			
			$cGtv = " * ";
			$cGtb = " tb_reGcLocates ";
			$cGtw = " AND reGvalue != ''
			          ORDER BY reGID DESC 
			          LIMIT 5 ";
			$reGcPselect = reGcPselect($cGtb,$cGtv,$cGtw);
						
            if(mysqli_num_rows($reGcPselect) > 0) 
			{
                ?>
                <table class="mdmetAtable table stripe table-hover">
                    <thead>
                        <tr>
			                <th>reGID</th>
                            <th>reGvalue</th>
						    <th>reGOParent</th>
                        </tr>
                    </thead>
					<tbody>
                    <?php
                    foreach($reGcPselect as $reGROWs)
				    { 
					    $reGID      = $reGROWs['reGID'];
						$reGvalue   = $reGROWs['reGvalue'];
						$reGOParent = $reGROWs['reGOParent'];
                        ?>
                        <tr>
			                <td> <?php  echo $reGID; ?></td>
							<td> <?php  echo $reGvalue; ?></td>
							<td> <?php  echo $reGOParent; ?></td>
                        </tr>
                        <?php
					}
                    ?>
                    </tbody>
                </table>
                <?php
			}
            ?>
			</div>
			
        </div>
    
	</div>
	
<script>
	function mdstartHTML()
	{
		let mdAParent, mdUPfiles, mdtParent, mdtPheiht;
		    
			mdAParent = $(".mdmetAParent").height();
			mdUPfiles = $(".mdUPLOADfilescn").height();
			
			mdUPfiles = mdUPfiles * 1 + 60;
			mdtPheiht = mdAParent - mdUPfiles + "px";
			
			$(".mdmetAtParent").css({'min-height':mdtPheiht});
			
			mdtParent = $(".mdmetAtParent").height();

            //console.log("<br>mdUPfiles:"+mdUPfiles);
            //console.log("<br>mdtParent:"+mdtParent);
	}
	
    function fractRemove(number)
	{
		return Math[number < 0 ? 'ceil' : 'floor'](number);
	}
	
	function mdUPLOADINGfiles(evt,id)
	{
		let md,mdUFOrms, mdAction, mdUPLOADRows, 
		    mdUPLOADoset, mdUPLOADName; 
		
		    evt.preventDefault();
			
			reGmd        = $(id).attr("md");
			reGknd       = $(id).attr("mdKND");
		    mdUPLOADRows = $("#mdUPLOADRows").val();
			mdUPLOADoset = $("#mdUPLOADoset").val();
			mdUPLOADKeY  = $("#mdUPLOADKeY").val();
			reGaction    = "reGlocate";
			
			mdmassage = reGmd;
			if(reGmd == "meta")
				mdmassage = reGknd;
			
			mdUPLOADoset++;
		    $.ajax({
				url:'mdUPLOADSFiles/reGlocate.php',
				method:'POST',
				data:{reGaction:reGaction,reGmd:reGmd,
				      reGknd:reGknd,
					  mdUPLOADoset:mdUPLOADoset,
				      mdUPLOADRows:mdUPLOADRows, 
					  mdUPLOADKeY:mdUPLOADKeY
				},
				beforeSend:function()
				{
					$(".mdmetAshlabel").addClass("mdmetAshstart");
					$(".mdUPLOADstatus").html(mdmassage+" "+mdUPLOADoset+"...");
				},
				success:function(mdResult)
				{
					
					$("#mdUPLOADName").val(mdResult);
					console.log("<br>"+mdResult);
					if(mdResult != 4)
					{
						$("#mdUPLOADoset").val(mdUPLOADoset);
						$(".mdUPLOADstatus").html("Done ..."+mdResult);
					    
						setTimeout(function()
						{
							$(id).click();
						},10);
					}
					else
					{
						$("#mdUPLOADoset").val(0);
						$(".mdUPLOADstatus").html("restart ..."+mdResult);
						setTimeout(function()
						{
							$(".mdmetAshlabel").removeClass("mdmetAshstart");
							$(id).click();
						},5000);
						
					}	
				}
			});
	}
	
	
</script>	
</body>
</html>