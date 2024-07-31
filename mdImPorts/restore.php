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
				      fm="index" onsubmit="mdUPLOADINGfiles(event)"
					  name="mdUPLOADfiles" id="mdUPLOADfiles" class="mdUPLOADfiles d-flex">
					  
                    <div class="d-flex">
                        <label class="mdUPLOADlabel d-flex btn btn-info" for="mdUPLOADIns">
						    <span>Choose Excel File</span>
							<input type="file" name="mdUPLOADIns" id="mdUPLOADIns" accept=".xls,.xlsx" class="d-none" 
							    onchange="mdUPLOADInchange(this)">
						</label>
						<select id="mdUPLOADdollar" name="mdUPLOADdollar" class="mdUPLOADdollar mdUPLOADInss form-control">
						    <option value="USD">USD</option>
							<option value="SAR">SAR</option>
							<option value="EUR">EUR</option>
							<option value="MXN">MXN</option>
						</select>
                        <button type="submit" class="btn btn-primary">
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
							<input type="text" id="mdUPLOADoset" name="mdUPLOADoset" class="mdUPLOADInss form-control" readOnly>
							<input type="text" id="mdUPLOADRows" name="mdUPLOADRows" class="mdUPLOADInss form-control" readOnly>
							<input type="text" id="mdUPLOADPath" name="mdUPLOADPath" class="mdUPLOADInss form-control" readOnly>
                        </div>
                    </div>
                </form>
            </div>
            <div id="" class="">
			  
			</div>


            <?php
			
			$tv  = " * ";
			$tb  = " tb_indexmaz ";
			$stw = " AND InUPD='0' 
			         ORDER BY InCreatedOn DESC LIMIT 3 ";
			$CheckDATA = $stDBss->CheckDATA($tv,$tb,$stw);
						
            if (! empty($CheckDATA)) {
            ?>

            <table class='tutorial-table table'>
                <thead>
                    <tr>
			            <th>ID</th>
                        <th>Country</th>
                        <th>Area</th>
                    </tr>
                </thead>
                <?php
                while($rowsREaLs = mysqli_fetch_assoc($CheckDATA)) { // ($row = mysqli_fetch_array($result))
                ?>
                <tbody>
                    <tr>
			            <td><?php  echo $rowsREaLs['InID']; ?></td>
                        <td><?php  echo $rowsREaLs['InCountry']; ?></td>
                        <td><?php  echo $rowsREaLs['InArea']; ?></td>
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
	
<script>
    function fractRemove(number)
	{
		return Math[number < 0 ? 'ceil' : 'floor'](number);
	}
	
    function mdUPLOADInchange(id)
	{
		let mdUPLOADIn, mdUPLOADID, mdUPLOADfile, mdUPLOADName, 
		    mdUPLOADsize, mdUPLOADRows, mdUPLOADoset, dfNformat ,
			mdfNform, mdAction = "mdUPLOADOLDIndx", mdUPLOADdollar;
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
			
			
			mdUPLOADdollar = $("#mdUPLOADdollar").val();
			mdfNform    = new FormData();
			mdfNform.append("mdUPLOADIns",mdUPLOADfile);
			
			$(".mdUPLOADstatus").html("start...");
			if(mdUPLOADsize > 0)
			{
				$.ajax({
				    url:'mdUPLOADSFiles/index.php?mdAction='+mdAction+'&mdDollar='+mdUPLOADdollar,
				    method:'POST',
				    data:mdfNform,
				    contentType:false,
			        cache:false,
			        processData:false,
				    beforeSend:function()
				    {
					    $(".mdUPLOADstatus").html("UploadING...");
						$("#mdUPLOADPath").val("");
					},
				    success:function(mdResult)
				    {
						alert(mdResult);
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
	
	function mdUPLOADINGfiles(evt)
	{
		evt.preventDefault();
		let mdUFOrms, mdAction; 
	}
	
	
</script>	
</body>
</html>