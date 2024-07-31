<?php require_once('../mdDB/astinit.php');

    $mdPATH = "";
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

<!DOCTYPE html>
<html>
<head>
<link href='<?php echo $smURLPARENt;?>GAssets/Amap/css/style-starter-st.css' rel='stylesheet' type='text/css'>
<link href="<?php echo $mdPATH;?>mdAssets/homeImports.css" rel="stylesheet" type="text/css">
<!-- <script src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-3.3.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>

<style>
.mdUPLOADfilesParent,
.mdUPLOADfilesParent input,
.mdUPLOADfilesParent button,
.mdUPLOADfilesParent .btn,
.mdUPLOADfilesParent a,
.mdUPLOADfilesParent label,
.mdUPLOADfilesParent span,
.mdUPLOADfilesParent table{
	text-transform:uppercase;
}
.mdUPLOADfilescn{
	background-color:#f8f8f8 !important;
	border:1px solid #eee;
	border-radius:3px;
	padding:30px;
	justify-content:start;
	align-items:center;
	flex-flow:wrap row;
	gap:15px;
}
.mdUPLOADfilescn .mdUPLOADfiles{
	background-color:#fff;
	border:1px solid #eee;
	border-radius:3px;
	padding:15px;
	justify-content:center;
	align-items:center;
	flex-flow:wrap row;
	flex:calc(100% / 1);
	gap:15px;
}
.mdUPLOADfilescn .mdUPLOADfiles> div{
	flex:calc(100% / 1);
	justify-content:space-between;
	align-items:center;
}
.mdUPLOADfilescn .mdUPLOADfiles> div.mdUPLOADInfos{
	flex:calc(100% / 1);
	justify-content:start;
	align-items:center;
	flex-flow:wrap row;
	background-color:#f9f9f9;
	gap:5px;
	border-top:1px solid #ddd;
	padding-top:10px;
}
.mdUPLOADfilescn .mdUPLOADfiles> div.mdUPLOADInfos label{
	flex:calc(100% / 1);
	justify-content:space-between;
	align-items:center;
}
.mdUPLOADfilescn .mdUPLOADfiles> div.mdUPLOADInfos> div{
	flex:calc(100% / 1);
	justify-content:space-between;
	align-items:center;
	flex-flow:wrap row;
	gap:5px;
}
.mdUPLOADfilescn .mdUPLOADfiles> div.mdUPLOADInfos .mdUPLOADInss{
	flex:1;
	justify-content:start;
	align-items:center;
	padding:0px 10px;
	background-color:#fff;
}
.mdUPLOADfiles .btn{
	outline:0px;
	border:0px solid #eee;
	border-radius:3px;
	padding:0px 15px;
	height:40px;
	display:flex;
	justify-content:center;
	align-items:center;
}
.mdUPLOADlabel{
	
}
select.mdUPLOADdollar{
	width:150px !important;
}
</style>

</head>

<body>
  
    <div class="mdUPLOADfilesParent container">
        
        <div class="row">
            <div class="mdUPLOADfilescn col-md-12 d-flex">
			    <h3>Import Files</h3>
                <form action="" method="POST" 
				      fm="index"
					  name="mdUPLOADfiles" id="mdUPLOADfiles" class="mdUPLOADfiles d-flex">
					  
                    <div class="d-flex">
                       
						<select id="mdUPLOADdollar" name="mdUPLOADdollar" class="mdUPLOADdollar mdUPLOADInss form-control">
						    <option value="USD">USD</option>
							<option value="SAR">SAR</option>
							<option value="EUR">EUR</option>
							<option value="AED">AED</option>
							<option value="MXN">MXN</option>
						</select>
						<select id="mdUPLOADPurPose" name="mdUPLOADPurPose" class="mdUPLOADdollar mdUPLOADInss form-control">
						    <option value="0">Market</option>
							<option value="1">Ded</option>
						</select>
						<select id="mdUPLOADKeY" name="mdUPLOADKeY" class="mdUPLOADdollar mdUPLOADInss form-control" onchange="mdUPLOADKeYss(this)">
						    <option value="InCountry">Country</option>
							<option value="InCity">City</option>
							<option value="InDistrict">District</option>
							<option value="InArea">Area</option>
							<option value="InAddress">Address</option>
							<option value="InPtName">Pname</option>
							<option value="InComPound">ComPound</option>
						</select>
						
                        <button type="submit" onclick="mdUPLOADINGfiles(event)" class="btn btn-primary">
						    Import
						</button>
                    </div>
					
					<div class="d-flex mdUPLOADInfos">
					    <label class="d-flex">
						    <span>status</span>
							<span class="mdUPLOADstatus"></span>
						</label>
						<div class="d-flex">
                            <input type="text" id="mdUPLOADName" name="mdUPLOADName" class="mdUPLOADInss form-control" readOnly>
							<input type="text" id="mdUPLOADsize" name="mdUPLOADsize" class="mdUPLOADInss form-control" readOnly>
							<input type="text" value="0" id="mdUPLOADoset" name="mdUPLOADoset" class="mdUPLOADInss form-control">
							<input type="text" value="10" id="mdUPLOADRows" name="mdUPLOADRows" class="mdUPLOADInss form-control">
							<input type="text" id="mdUPLOADPath" name="mdUPLOADPath" class="mdUPLOADInss form-control" readOnly>
                        </div>
                    </div>
                </form>
            </div>
		</div>
    </div>
	
<script>
	function mdUPLOADINGfiles(evt)
	{
		evt.preventDefault();
		mdRestorefiles();
	}
	
	function mdUPLOADKeYss(id)
	{
		$("#mdUPLOADoset").val(0);
		$("#mdUPLOADName").val(0);
	}
	
	function mdRestorefiles()
	{
		let mdUFOrms, mdAction, 
		    mdUPLOADRows, mdUPLOADoset;
			
			mdUPLOADoset = $("#mdUPLOADoset").val();
			mdUPLOADRows = $("#mdUPLOADRows").val();
			mdUPLOADKeY  = $("#mdUPLOADKeY").val();
			
			mdUPLOADName = mdUPLOADoset * mdUPLOADRows;
			
			mdUPLOADoset++;
			mdAction = "mdRestore";
			$.ajax({
				url:'mdUPLOADSFiles/restoreOLD.php?mdAction='+mdAction,
				method:'POST',
				data:{mdUPLOADoset:mdUPLOADoset,
				      mdUPLOADRows:mdUPLOADRows,
					  mdUPLOADKeY:mdUPLOADKeY},
				beforeSend:function()
				{
					$("#mdUPLOADName").val(mdUPLOADName);
				},
				success:function(mdResult)
				{
				
					mdResults = mdResult.split("|");
					$("#mdUPLOADoset").val(mdUPLOADoset);
					$("#mdUPLOADPath").val(mdResults[1]);
					
					setTimeout(function()
					{
						if(mdResults[0] != 4)
						{
							mdRestorefiles();
						}
						else
						{
							$("#mdUPLOADoset").val(0);
						}
					},1000)
				}
			});
	}
	
	
</script>	
</body>
</html>