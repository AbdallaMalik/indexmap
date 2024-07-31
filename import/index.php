<?php require_once('../mdDB/astinit.php');
	
    $smPATH = "../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();

	$smURLPATH     = $stDBCONST->getsmURLPATH();
	$smURLPARENt   = $stDBCONST->getsmURLPARENt();
	$stWEBFICON    = $stDBCONST->getstWEBFICON();
	$stWEBLOGO     = $stDBCONST->getstWEBLOGO();
	$stWEBTITLE    = "CCLUBB | IMPORT SYSTEM";
	$smCONNECT     = $stDBss->getsmCONNECT();
	$defASGDescPON = "";

?>

<!DOCTYPE html5>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $defASGDescPON;?>">
    <meta name="author" content="BrightLab(Monear Senan)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo $defASGDescPON;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, shrink-to-fit=no,user-scalable=no">
	<meta name="theme-color">
	<link id="real_title_top" rel="shortcut icon" href="<?php echo $stWEBFICON;?>">
	<title><?php echo $stWEBTITLE;?></title>
	
	<!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="<?php echo $stWEBTITLE;?>">
    <meta name="twitter:description" content="<?php echo $defASGDescPON;?>">
    <meta name="twitter:image" content="<?php echo $stWEBFICON;?>">
    <!-- Facebook -->
    <meta property="og:url" content="<?php echo $smURLPATH."/import/index.php";?>">
    <meta property="og:title" content="<?php echo $stWEBTITLE;?>">
    <meta property="og:description" content="<?php echo $defASGDescPON;?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $stWEBFICON;?>">
    <meta property="og:image:type" content="image/*">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
	
	
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/inAssets/style.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/inAssets/inmap.css" />

	
    <script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>assets/inAssets/index.css"/>
	
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>import/BZAssets/css/BZAstYless.css" />
	
	
<style>
.uPloadPRogresns{
	justify-content:center;
	flex:1;
	width:100%;
}
.uPloadPRogresns> div,
.uPloadPRogresns> div> b{
	flex:1;
	justify-content:center;
	gap:5px;
	min-height:40px;
}

form.defmANiPULchoose{
	flex-flow:wrap row;
	flex:1;
}
form.defmANiPULchoose> div{
	flex:1;
}
form.defmANiPULchoose> div.gap-10{
	gap:15px;
}
</style>

</head>

<body>
    <div class="astBRIGHTBPDY">


        <header class="astMAPheaderPARTs astBZHEADere row">
		  <div class="astBZHEADeres astFLex container-lg">
		  
	        <div class="astMAPheaderOs astFLex">
	            <div class="astMAP_logo astFLex"> 
			        <a href="<?php echo $smURLPATH;?>index.php">
				        <img src="<?php echo $stWEBLOGO;?>">
			        </a>
			    </div>
		        <div class="astMAP_selections astFLex astMAP_selections_mobile">
	                <div class="astMAP_selection astFLex">
				        <div class="astMAP_selection_mobheader astFLex">
					        <a href="javascript:void(0)" class="astFLex">
						    <img src="<?php echo $stWEBLOGO;?>">
						    </a>
						    <a href="javascript:void(0)" fm="sideSEARch" onclick="astMAPSIDes(this)" class="close astFLex">
						        <i class="fa fa-close"></i>
						    </a>
					    </div>
				        <div class="astMAP_selection_states astFLex">
				            <select class="form-control astFLex tOactionVARIABLe" 
							        onchange="defmANiPULAtions(this)" fm="tOaction">				
						        <option value="import">import</option>
					            <option value="export">export</option>
				            </select>
					    </div>
				 
				        <div class="astMAP_selection_mtf astFLex">
				            <select class="form-control tOamaPVARIABLe" 
						        onchange="defmANiPULAtions(this)" fm="tOmaPe">
				                <option value="index"> Index Map </option>
					            <option value="agent"> Agent Map </option>
				            </select>
			            </div>
				    
					    <div class="astMAP_selection_search astFLex">
						    <select class="form-control tOfileVARIABLe" 
						        onchange="defmANiPULAtions(this)" fm="tOfile">
				                <option value="excel"> excel file </option>
					            <option value="txt"> txt file </option>
				            </select>
				            <button id="btn-search" class="btn" onclick="defmANiPULAtions(this)" fm="tOoo">
					            <i class="fa fa-search"></i>
								<span class="fa">Submit</span>
					        </button>
				        </div>
					
			        </div>
	            </div>
				
			</div>	
			
			<div class="astMAP_menu astFLex"> 
			    <a href="javascript:void(0)" fm="sideSEARch" onclick="astMAPSIDes(this)" class="astMAP_search astFLex">
				    <i class="fa fa-search"></i>
			    </a>
				<a href="javascript:void(0)" fm="start" onclick="astMOReIMAPsTA(this)" class="astFLex">
				    <i class="fa fa-list"></i>
			    </a>
			</div>
		 
		  </div>
		</header>
		
		<div class="astBZBODYe">
		    
		    <div class="astFLex container-lg">
		        <div class="astLOADconents astFLex"> </div>
		    </div>
		</div>
		
		<footer class="astBZFOOTere">
		</footer>
	</div>
	
	<input type="hidden" id="astBZFileCount" value="0">
	<input type="hidden" id="astTOTalROWs" value="1000">
	<input type="hidden" id="astTOTalOffset" value="0">
	<input type="hidden" id="fileNTYPeGROUPINGs" value="">
	
	
<script>
    
	
	defmANiPULOad();
	function defmANiPULAtions(id)
	{
		let fm = $(id).attr("fm");
		if(fm == "tOoo")
		{
			defmANiPULOad();
			
		}
	}
	
	
	
	function defmANiPULOad()
	{
		let tOactionVARIABLe,tOamaPVARIABLe,tOfileVARIABLe;
		    
			tOactionVARIABLe = $(".tOactionVARIABLe").val();
			tOamaPVARIABLe   = $(".tOamaPVARIABLe").val();
			tOfileVARIABLe   = $(".tOfileVARIABLe").val();
			
		
        $.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=load',
			method:'POST',
			data:{tOaction:tOactionVARIABLe,
			      tOamaP:tOamaPVARIABLe,
				  tOfile:tOfileVARIABLe},
			beforeSend:function()
			{
				$(".astLOADconents").html("LOADING");
			},
			success:function(res)
			{
				$(".astLOADconents").html(res);
			}
		});		
		
	}

	
	///////////////////////
	function defmANiPULimPort(evt,id)
	{
		evt.preventDefault();
		
		let blPRGrss , uPloadedFiles,sendFiles,totalFiles,indStart,fileName;	
		    
			let fileATYPe = $("#defmANiPULchooseTYPe").val();
		    let fileACNYe = $("#defmANiPULchooseCNY").val();
		
			
			sendFiles     = new FormData();
			uPloadedFiles = document.getElementById('defmANiPULchoose').files[0];
		    sendFiles.append("defmANiPULchoose",uPloadedFiles);
			
		    		
		if($("#defmANiPULchoose").val() !="")
		{
			$.ajax({
		        url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=stINSRTFiles&fileATYPe='+fileATYPe+'&fileACNYe='+fileACNYe,
		        method:'POST',
		        data:sendFiles,
			    cache:false,
				contentType:false,
			    processData:false,
		        beforeSend:function()
		        {
					$(".uPloadPRogresns").html(dtinsrtPROGrss("STEP 1: UPLOADING FILE :<br> <hr> PLAESE WAIT..."));
			    },
			    success:function(res)
			    {
					response = res.split("|");
					$(".uPloadPRogresns").html(dtinsrtPROGrss("DONe... :<br>"));
					if(response[0] != 66 || response[0] != 77)
				    {
					    $("#defmANiPULchooseName").val(response[2]);
					    $("#astTOTalOffset").val(0);
					    $("#fileNTYPeGROUPINGs").val("sTART");
					    setTimeout(function()
					    {
						    $(".uPloadPRogresns").html(dtinsrtPROGrss(""));
						    defmANiPULGROUPs();	
					    },1000);
					}
				    else
				    {
						
					
					}
			    }
			});
			
		}
			
	}
	
	
	function defmANiPULINSrts()
	{
		let fileNAme  = $("#defmANiPULchooseName").val();
		let filsSIze  = "2";//$("#defmANiPULchooseNo").val();
		let fileCount = $("#astBZFileCount").val();
		let fileATYPe = $("#defmANiPULchooseTYPe").val();
		let fileACNYe = $("#defmANiPULchooseCNY").val();
		
		
		fileCount++;
		let response  = "";
		$.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=stINSRTFiles',
			method:'POST',
			data:{fileNAme:fileNAme,
			      filsSIze:filsSIze,
				  fileCount:fileCount,
				  fileATYPe:fileATYPe,
				  fileACNYe:fileACNYe},
			beforeSend:function()
			{
				$(".uPloadPRogresns").append(dtinsrtPROGrss("STEP 2 : UPDATING DATE <br> <hr> PLAESE WAIT..."));
			},
			success:function(res)
			{
				response = res.split("|");
				$(".uPloadPRogresns").append(dtinsrtPROGrss("DOne <br>"));
				$("#astBZFileCount").val(fileCount);
				
				if(response[0] != 66)
				{
					defmANiPULINSrts();
				}
				else
				{
					$("#astTOTalOffset").val(0);
					$("#fileNTYPeGROUPINGs").val("sTART");
					setTimeout(function()
					{
						$(".uPloadPRogresns").html(dtinsrtPROGrss(""));
						defmANiPULGROUPs();	
					},1000);
					
				}
			}
		});		
		
	}
	
	
	function defmANiPULGROUPs()
	{
		let astTOTalROWs   = $("#astTOTalROWs").val();
		let astTOTalOffset = $("#astTOTalOffset").val();
		let fileNAme       = $("#defmANiPULchooseName").val();
		let fileNTYPe      = $("#fileNTYPeGROUPINGs").val();
		astTOTalOffset++;
		let response  = "";
		
		$.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=stGROUPsFiles',
			method:'POST',
			data:{astTOTalOffset:astTOTalOffset,
			      astTOTalROWs:astTOTalROWs,
				  fileNAme:fileNAme,
				  fileNTYPe:fileNTYPe},
			beforeSend:function()
			{
				$(".uPloadPRogresns").append(dtinsrtPROGrss("STEP 3: GROUPING <br> <hr> PLAESE WAIT..."));
			},
			success:function(res)
			{
				$("#astTOTalOffset").val(astTOTalOffset);
				$(".uPloadPRogresns").append(dtinsrtPROGrss("DONE : "));
				
				response = res.split("|");
				if(response[0] == 6)
				{
					$(".uPloadPRogresns").html(dtinsrtPROGrss("Finished : <br>"));
				}
				else if(response[0] == 1)
				{
					setTimeout(function()
				    {
					    $(".uPloadPRogresns").append(dtinsrtPROGrss("Result : "+response[1]+"<br>"));
					    defmANiPULGROUPs();
					},1000);					
				}
				else
				{
					$("#astTOTalOffset").val(0);
					$("#fileNTYPeGROUPINGs").val("resTART")
					setTimeout(function()
				    {
					    $(".uPloadPRogresns").append(dtinsrtPROGrss("restart :"+response[1]+"<br>"));
					    defmANiPULGROUPs();
					},1000);
				}
				
				
			}
		});		
		
	}
	
	
	
	///////////////////////////////
	
	function dtinsrtPROGrss(parts)
	{
		let bnames = '<div class="col-md-12 col-sm-12 astFLex alert-success">'+
		                ''+
						'<b class=" astFLex">'+parts+'</b>'+
					 '</div>';
					  
		return bnames;		  
	}
	
	
	
	function dtwnsrtPROGrss(one,no,mssage)
	{
		let bnames = '<div class="col-md-4 col-sm-6 navToFLex alert-success">'+
						'<p>'+one+' :</p>'+
						'<b class="navToFLex">'+no+'</b>'+
						'<span class="btn-success navToFLex">'+mssage+'</span>'+
					  '</div>';
					  
		return bnames;		  
	}
	
	function dtPROGrss()
	{
		let edt = '<div class="ct-progressBar">'+
                      '<div class="ct-progressBar-title text-uppercase">'+
				        'Loading<span class="ct-progressBar-text">50%</span>'+
			          '</div>'+
                      '<div class="ct-progressBar-container">'+
                           '<div class="progress">'+
                              '<div class="progress-bar progress-bar-primary progress-bar-striped active animating" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>'+
                           '</div>'+
                      '</div>'+
                  '</div>';
				  
		return 	edt;	  
	}
	
	function blPROGrss(title,progress,name,size)
	{
		let edt = '<div class="ct-progressBar">'+
		              '<br><div class="ct-progressBar-title text-uppercase">'+
				        name+'<span class="ct-progressBar-text">'+size+'</span>'+
			          '</div>'+
                      '<div class="ct-progressBar-title text-uppercase">'+
				        title+'<span class="ct-progressBar-text">'+progress+'%</span>'+
			          '</div>'+
                      '<div class="ct-progressBar-container">'+
                           '<div class="progress">'+
                              '<div class="progress-bar progress-bar-primary progress-bar-striped active animating" role="progressbar" aria-valuenow="'+progress+'" aria-valuemin="0" aria-valuemax="100" style="width: '+progress+'%;"></div>'+
                           '</div>'+
                      '</div>'+
                  '</div>';
				  
		return 	edt;	  
	}

	
	
	
	
	
	function defmANiPULGEOMETRY()
	{
		let astTOTalROWs   = $("#astTOTalROWs").val();
		let astTOTalOffset = $("#astTOTalOffset").val();
		
		astTOTalOffset++;
		let response  = "";
		$.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=stGEOMETRYsFiles',
			method:'POST',
			data:{astTOTalOffset:astTOTalOffset,
			      astTOTalROWs:astTOTalROWs},
			beforeSend:function()
			{
				$(".uPloadPRogresns").append(dtinsrtPROGrss("STRT :"));
			},
			success:function(res)
			{
				$("#astTOTalOffset").val(astTOTalOffset);
				$(".uPloadPRogresns").append(dtinsrtPROGrss("DONE : "));
				
				response = res.split("|");
				setTimeout(function()
				{
					$(".uPloadPRogresns").append(dtinsrtPROGrss("Result : "+res+"<br>"));
					defmANiPULGEOMETRY();
				},3000);
				
			}
		});		
		
	}
	
	
	function defmANiPULDIVIDE()
	{
		let astTOTalROWs   = $("#astTOTalROWs").val();
		let astTOTalOffset = $("#astTOTalOffset").val();
		
		astTOTalOffset++;
		let response  = "";
		$.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=defmANiPULDIVIDE',
			method:'POST',
			data:{astTOTalOffset:astTOTalOffset,
			      astTOTalROWs:astTOTalROWs},
			beforeSend:function()
			{
				$(".uPloadPRogresns").append(dtinsrtPROGrss("STRT :"));
			},
			success:function(res)
			{
				$("#astTOTalOffset").val(astTOTalOffset);
				$(".uPloadPRogresns").append(dtinsrtPROGrss("DONE : "));
				
				response = res.split("|");
				if(response[0] == 1 || response[0] == 2)
				{
					setTimeout(function()
				    {
					    $(".uPloadPRogresns").append(dtinsrtPROGrss("Result : "+res+"<br>"));
					    defmANiPULDIVIDE();
					},1000);
				}
				else
				{
					alert(res);
				}
				
				
			}
		});		
		
	}
	
	
	function defmANiPULDIVID()
	{
		let astTOTalROWs   = $("#astTOTalROWs").val();
		let astTOTalOffset = $("#astTOTalOffset").val();
		
		astTOTalOffset++;
		let response  = "";
		$.ajax({
			url:'<?php $smPATH;?>defmANiPULAtions.php?tOaction=defmANiPULDIVID',
			method:'POST',
			data:{astTOTalOffset:astTOTalOffset,
			      astTOTalROWs:astTOTalROWs},
			beforeSend:function()
			{
				$(".uPloadPRogresns").append(dtinsrtPROGrss("STRT :"));
			},
			success:function(res)
			{
				$("#astTOTalOffset").val(astTOTalOffset);
				$(".uPloadPRogresns").append(dtinsrtPROGrss("DONE : "));

				response = res.split("|");
				if(response[0] == 1)
				{
					setTimeout(function()
				    {
					    $(".uPloadPRogresns").append(dtinsrtPROGrss("Result : "+res+"<br>"));
					    defmANiPULDIVID();
					},1000);
				}
				else
				{
					alert(res);
				}
				
				
			}
		});		
		
	}
	
</script>	
	<script type="text/javascript" src="<?php echo $smURLPATH;?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>