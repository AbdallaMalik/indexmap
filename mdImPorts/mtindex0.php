<?php require_once('../mdDB/astinit.php');
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    //require_once ('./vendor/autoload.php');
    //ini_set('max_execution_time', 8000);
    //ini_set('memory_limit','8000M');
    //set_time_limit(0);
	
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
    <link rel="shortcut icon" id="ftPageLOGO" href="<?php //echo $headerIcon;?>">
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
	
    <link href='<?php echo $smURLPARENt;?>GAssets/Amap/css/style-starter-st.css' rel='stylesheet' type='text/css'>
    <link href="<?php echo $mdPATH;?>mdAssets/homeImports.css" rel="stylesheet" type="text/css">
    <!-- <script src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-3.3.1.min.js"></script>-->
    <script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>

<style>
.mdUPLOADfilesParent, input, button,
.btn, a, label, span, table, select{
	text-transform:uppercase;
}
select{
	-webkit-appearance:menulist;
}
.mdUPLOADfilesParent{
	display:flex;
	justify-content:flex-start;
	align-items:center;
	flex-flow:wrap;
	margin:0px !important;
	padding:0px !important;
	background-color:#fafbfd;
	height:100%;
	width:100%;
	position:fixed;
	overflow-y:scroll;
}
.mdmetAParent{
	margin:0px;
	padding:0px;
	width:100%;
	position:relative;
	height:fit-content;
	min-height:100%;
	padding:0px;
	display:flex;
	justify-content:flex-start;
	align-items:flex-start;
	flex-flow:wrap;
	gap:30px;
}
.mdUPLOADfilescn{
	padding:0px;
	position:relative;
	margin:0px;
	border-bottom:1px solid #f7f7f7;
	margin:0px;
	min-width:100%;
}
.mdUPLOADfiles{
	justify-content:space-between;
	align-items:center;
	gap:0px;
	flex-flow:wrap;
	width:100%;
}
.mdmetAheader,
.mdmetAsheader{
	justify-content:space-between;
	align-items:center;
	gap:5px;
	flex-flow:wrap;
	position: fixed;
    height: 50px;
    border-bottom: 1px solid #eee;
	padding:0px 30px;
}
.mdmetAheader{
	top: 0;
    left: 0;
    right: 0;
	gap:30px;
	background-color:#f9f9f9;
	z-index: 100;
}
.mdmetAsheader{
	position:relative;
	margin-top:50px;
	gap:5px;
	padding:15px 30px;
	background-color:#fff;
	border-bottom:0px;
	height:fit-content;
	flex:calc(100% / 1);
}
.mdmetAcontrol{
	justify-content:space-between;
	align-items:center;
	padding:0px;
	margin:0px;
	height:50px;
	gap:5px;
	flex:1;
}
.mdmetAheader .btn,
.mdmetAheader select,
.mdmetAheader input{
	height:40px;
	padding:0px 5px;
	margin:0px;
	justify-content:center;
	align-items:center;
	border-radius:3px;
	border:0px;
	outline:0px;
}
.mdmetAheader select,
.mdmetAheader input{
	border:1px solid #eee;
}
.mdmetAheader .btn,
.mdmetAheader select,
.mdmetAheader input,
.mdmetAheader span{
	white-space: nowrap;
}
.mdmetAheader .btn{
	padding:0px 15px;
}
.mdmetAsheader .mdmetAshlabel,
.mdmetAsheader .mdmetAshinPuts{
	justify-content:space-between;
	align-items:center;
	flex-flow:wrap;
	gap:5px;
	padding:0px;
	margin:0px;
	flex:calc(100% / 1);
	position:relative;
	transition:0.5s;
}
.mdmetAsheader .mdmetAshlabel{
	background-color:#ece;
	width:0px;
	height:0px;
	overflow:hidden;
}
.mdmetAshstart{
	width:100% !important;
	height:40px !important;
	padding:0px 15px !important;
}
.mdmetAsheader .mdmetAshinPuts{
	min-height:40px;
}
.mdmetAsheader .mdmetAshlabel span{
}
.mdmetAsheader .mdmetAshinPuts input{
	flex:1;
}
.mdmetAtParent{
	position:relative;
	width:calc(100% - 60px);
	padding:30px;
	margin:0px 30px;
	background-color:#fff;
	border:1px solid #eee;
	border-radius:3px;
	display:flex;
	justify-content:center;
	align-items:flex-start;
	flex-flow:wrap;
	height:fit-content;
}
.mdmetAtable{
	position:relative;
	overflow-y:scroll;
	width:100%;
	padding:0px;
	margin:0px;
	border:1px solid #eee;
	border-collapse: separate;
}
.mdmetAtable thead{
	background-color:#eee;
}
.mdmetAtable tr,
.mdmetAtable th,
.mdmetAtable td{
	border:0px;
}
.mdmetAtable th,
.mdmetAtable td{
	border-bottom:1px solid #f8f8f8;
	background-color:#f9f9f9;
}
@media (max-width:767px)
{
	.mdmetAParent{
		gap:15px;
	}
	.mdmetAheader{
		height:100px;
		gap:0px;
		padding:0px 15px;
	}
	.mdmetAsheader{
		padding:15px 15px;
		margin-top:100px;
	}
	.mdmetAsheader .mdmetAcontrol{
		flex:calc(100% / 1);
	}
	.mdmetAshstart{
		padding:0px 5px !important;
	}
	.mdmetAcontrol{
		flex:calc(100% / 1);
	}
	.mdmetAheader .btn,
	.mdmetAheader select{
		font-size:12px;
		flex:1;
		padding:0px 5px;
	}
	.mdmetAsheader .mdmetAshinPuts input{
		flex:calc(100% / 3);
	}
	.mdmetAtParent{
		width:calc(100% - 30px);
		margin:0px 15px;
		padding:15px;
	}
	.mdmetAtable{
	}
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
						    <label class="mdUPLOADlabel d-flex btn btn-info" for="mdUPLOADIns">
						        <span>Import Excel File</span>
							    <input type="file" name="mdUPLOADIns" id="mdUPLOADIns" accept=".xls,.xlsx" class="d-none" 
							        onchange="mdUPLOADInchange(this)">
						    </label>
							
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
                        </div>
						<div class="d-flex mdmetAcontrol">
						    <button type="submit" class="btn btn-primary mdSTARTfeedinGs" 
						        md="Geocode" mdKND="" onclick="mdUPLOADINGfiles(event,this)">
						        Geocode
						    </button>
							
							<button type="submit" class="btn btn-primary mdSTARTfeedinGs" 
						        md="transfer" mdKND="" onclick="mdUPLOADINGfiles(event,this)">
						        transfer
						    </button>
							
							<button type="submit" class="btn btn-primary mdSTARTfeedinGs" 
						        md="meta" mdKND="contact" onclick="mdUPLOADINGfiles(event,this)">
						        meta 1
						    </button>
							
							<button type="submit" class="btn btn-primary mdSTARTfeedinGs" 
						        md="meta" mdKND="mdLicense" onclick="mdUPLOADINGfiles(event,this)">
						        meta 2
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
			
			$tv  = " * ";
			$tb  = " tb_mdtable ";
			$stw = " ORDER BY mdID DESC LIMIT 2 ";
			$CheckDATA = $stDBss->CheckDATA($tv,$tb,$stw);
						
            if (!empty($CheckDATA)) 
			{
            ?>

            <table class="mdmetAtable table stripe table-hover">
                <thead>
                    <tr>
			            <th>ID</th>
                        <th>Name</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <?php
                while($rowsREaLs = mysqli_fetch_assoc($CheckDATA)) { // ($row = mysqli_fetch_array($result))
                ?>
                <tbody>
                    <tr>
			            <td><?php  echo $rowsREaLs['mdID']; ?></td>
                        <td><?php  echo $rowsREaLs['mdbName']; ?></td>
                        <td><?php  echo $rowsREaLs['mdbArea']; ?></td>
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

            console.log("<br>mdUPfiles:"+mdUPfiles);
            console.log("<br>mdtParent:"+mdtParent);
	}
	
    function fractRemove(number)
	{
		return Math[number < 0 ? 'ceil' : 'floor'](number);
	}
	
    function mdUPLOADInchange(id)
	{
		let mdUPLOADIn, mdUPLOADID, mdUPLOADfile, mdUPLOADName, 
		    mdUPLOADsize, mdUPLOADRows, mdUPLOADoset, dfNformat ,
			mdfNform, mdAction = "mdUPLOADIDIndx", mdDollar, 
			mdUPLOADPurPose, mdPurPoses;
			
		    mdUPLOADIn = $(id).val();
			mdUPLOADID = $(id).attr("id");
			
			mdUPLOADfile = document.getElementById(mdUPLOADID).files[0];
			mdUPLOADName = mdUPLOADfile.name;
			mdUPLOADsize = mdUPLOADfile.size;
			
			$("#mdUPLOADName").val(mdUPLOADName);
			
			mdUPLOADsize  = mdUPLOADsize / 1024 / 1024;
			mdUPLOADsizee = fractRemove(mdUPLOADsize);
			mdUPLOADsizes = mdUPLOADsizee+"mb";
			$("#mdUPLOADsize").val(mdUPLOADsizes);
			
			mdfNform    = new FormData();
			mdfNform.append("mdUPLOADIns",mdUPLOADfile);
			
			mdDollar  = $("#mdUPLOADdollar").val();
			mdPurPose = $("#mdUPLOADPurPose").val();
			
			mdPurPoses = mdAction+'&mdDollar='+mdDollar+'&mdPurPose='+mdPurPose;
			$(".mdUPLOADstatus").html("start...");
			if(mdUPLOADsize > 0)
			{
				$.ajax({
				    url:'mdUPLOADSFiles/mdUPindex.php?mdAction='+mdAction,
				    method:'POST',
				    data:mdfNform,
				    contentType:false,
			        cache:false,
			        processData:false,
				    beforeSend:function()
				    {
						$(".mdmetAshlabel").addClass("mdmetAshstart");
					    $(".mdUPLOADstatus").html("UploadING...");
						$("#mdUPLOADPath").val("");
					},
				    success:function(mdResult)
				    {
						console.log("<br>:mdResult"+mdResult);
						mdResults = mdResult.split("|");
						$(".mdUPLOADstatus").html("Done");
						
						setTimeout(function()
						{
							location.reload();  
						},2000);
						
					}
				});
			}
			else
			{
				
				return false;
			}
			
	}
	
	function mdUPLOADINGfiles(evt,id)
	{
		let md,mdUFOrms, mdAction, mdUPLOADRows, 
		    mdUPLOADoset, mdUPLOADName; 
		
		    evt.preventDefault();
			
			md           = $(id).attr("md");
			mdKND        = $(id).attr("mdKND");
		    mdUPLOADRows = $("#mdUPLOADRows").val();
			mdUPLOADoset = $("#mdUPLOADoset").val();
			mdUPLOADName = $("#mdUPLOADName").val();
			mdAction     = "mDFeeds";
			
			mdmassage = md;
			if(md == "meta")
				mdmassage = mdKND;
			
			mdUPLOADoset++;
		    $.ajax({
				url:'mdUPLOADSFiles/mdUPindex.php?mdAction='+mdAction,
				method:'POST',
				data:{md:md,mdKND:mdKND,mdUPLOADoset:mdUPLOADoset,
				      mdUPLOADRows:mdUPLOADRows
				},
				beforeSend:function()
				{
					$(".mdmetAshlabel").addClass("mdmetAshstart");
					$(".mdUPLOADstatus").html(mdmassage+" "+mdUPLOADoset+"..."+mdUPLOADName);
				},
				success:function(mdResult)
				{
					$("#mdUPLOADoset").val(mdUPLOADoset);
					$("#mdUPLOADName").val(mdResult);
					console.log("<br>"+mdResult);
					if(mdResult != 4)
					{
						$(".mdUPLOADstatus").html("Done ..."+mdResult);
					    
						setTimeout(function()
						{
							$(id).click();
						},10);
					}
					else
					{
						$("#mdUPLOADoset").val(0);
						$(".mdUPLOADstatus").html("error ..."+mdResult);
						setTimeout(function()
						{
							$(".mdmetAshlabel").removeClass("mdmetAshstart");
						},3000);
						
						setTimeout(function()
						{
							$(id).click();
						},10000);
					}	
				}
			});
	}
	
	
</script>	
</body>
</html>