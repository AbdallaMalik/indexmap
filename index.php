<?php require_once('mdDB/astinit.php');
    
	$smPATH     = "";
    $ccGHdirect = "../";
	
	$reAdirect  = "";
	$reGdirect  = "../";
	$reGPdirect = "../";
	require_once('../reGccllPanel/reGDB/reGcInit.php');
	$reGctvchwelcome = "INDEXMAP";
	$reGctvsource = "IndexmaP";
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
	
	$maPSHAReID    = "0";
	$maPSHAReLaT   = "";
	$maPSHAReLnG   = "";
	$maPSHAReName  = "";
	$maPSHAReD     = "";
	$defPATHsVALUe = "";
	$defPATHLabels = "Countries";
	$defSEARCh     = "";
    $defCURNCY     = "USD";
	$defSIZE       = "mt";
	$defaultMAP    = "defaultMAP";
	$defMPRICE     = "";
	$defXPRICE     = "";
	
	//////////////////////
	$dfCities       = "";
	$dfArea         = "";
	$dfAddress      = "";
	$dfProName      = "";
	$fDistrict      = "";
	
	$dfCitYs        = "";
	$fCdists        = "";
	$dfDistrict     = "";
	$dfAddresss     = "";
	$dfTower        = "";
	//////////////
	
	$defGeTzOOm    = 12;
	$defASGTITLes  = $stWEBTITLE." | HOME";
	$defASGDescPON = $defASGTITLes." | ALL INDEXS "." | INDEX MAP | CCLUBB";
	
	$defINDstr     = array("-");
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
    if(isset($_GET['defMAP']))
    {
		$defaultMAP    = $_GET['defMAP'];
		
		if(isset($_GET['defPATH']))
		{
			$defPATHsVALUe = trim(strtoupper($_GET['defPATH']));
		}
		if(isset($_GET['ds']))
		{
			$defSEARCh     = $_GET['ds'];
		}
		if(isset($_GET['sD']))
		{
			$maPSHAReID    = $_GET['sD'];
		}
		if(isset($_GET['CY']))
		{
			$defCURNCY     = $_GET['CY'];
		}
		if(isset($_GET['SZ']))
		{
			$defSIZE       = $_GET['SZ'];
		}
		if(isset($_GET['dm']))
		{
			$defMPRICE       = $_GET['dm'];
		}
		if(isset($_GET['dx']))
		{
			$defXPRICE       = $_GET['dx'];
		}
		if(isset($_GET['zOOm']))
		{	
			$stDBCONST->setstWEBPANTO($_GET['zOOm']);
		}
		 	
		if(isset($_GET['aG']))
		{
			$dfCitYs    = $_GET['aG'];
			if($dfCitYs != "ALL" && $dfCitYs != "")
			$dfCitYs = str_replace($defINDstr," ",$dfCitYs);
		}
		if(isset($_GET['ad']))
		{
			$fCdists    = $_GET['ad'];
			if($fCdists != "ALL" && $fCdists != "")
			$fCdists = str_replace($defINDstr," ",$fCdists);
		}
		if(isset($_GET['ac']))
		{
			$dfDistrict    = $_GET['ac'];
			if($dfDistrict != "ALL" && $dfDistrict != "")
			$dfDistrict = str_replace($defINDstr," ",$dfDistrict);
		}
		if(isset($_GET['aA']))
		{
			$dfAddresss    = $_GET['aA'];
			if($dfAddresss != "ALL" && $dfAddresss != "")
			$dfAddresss = str_replace($defINDstr," ",$dfAddresss);
		}
		if(isset($_GET['ar']))
		{
			$dfTower    = $_GET['ar'];
			if($dfTower != "ALL" && $dfTower != "")
			$dfTower = str_replace($defINDstr," ",$dfTower);
		}
		
		if(isset($_GET['layer']))
		{
			$stWEBLAYER = $_GET['layer'];
			$stDBCONST->setstWEBLAYER($stWEBLAYER);
		}			
		
		
		
		
		if($defaultMAP == "MYmAP")
		{
			$defASGTITLes  = $stWEBTITLE." | MY LOCATION";
	        $defASGDescPON = $defASGTITLes." | ALL INDEXS "." | INDEX MAP | CCLUBB";
		}
		else if($defaultMAP == "SHareDMAP")
		{
			$defASGTITLes  = $stWEBTITLE." | ShaRED MAP";
	        $defASGDescPON = $defASGTITLes." | ALL INDEXS "." | INDEX MAP | CCLUBB";
		}
		else
		{
			$defASGTITLes  = $stWEBTITLE." | HOME";
	        $defASGDescPON = $defASGTITLes." | ALL INDEXS "." | INDEX MAP | CCLUBB";
		}  
		
		
		if($defPATHsVALUe !="")
	    {
		    $defPATHsVALUe = trim(strtoupper($_GET['defPATH']));
		    $defPATHLabels = $defPATHsVALUe;	
			
			$defASGTITLes  = $stWEBTITLE." | ".$defPATHsVALUe;
			$defASGDescPON = " PROPERTY INDEX MAP FOR ".$defPATHsVALUe." | ALL INDEXS "." | ".$stWEBTITLE;
	       
		}
	
	    if($defSEARCh != "" && $defPATHsVALUe !="")
		{
			$defASGTITLes  = $defPATHsVALUe." | ".$defSEARCh;
			$defASGDescPON = $defPATHsVALUe." | ALL SEARCh RESULTS FOR "." | ".$defSEARCh;
		}
		elseif($defSEARCh != "" && $defPATHsVALUe =="")
		{
			$defASGTITLes  = $stWEBTITLE." | ".$defSEARCh;
			$defASGDescPON = $defPATHsVALUe." | ALL SEARCh RESULTS FOR "." | ".$defSEARCh;
		}
	} 
	
	
	$stWEBLAYER     = $stDBCONST->getstWEBLAYER();
	$stWEBPANTO     = $stDBCONST->getstWEBPANTO();
	$defASGDescPON  = "CCLUBB"." ".$defASGDescPON."  CURRENCY :".$defCURNCY." | ".$defSIZE." ".$stWEBLAYER." INDEX MAP";
	
	
	if($defSEARCh !="")
	{
		$defSEARCh = str_replace($defINDstr," ",$defSEARCh);
	}
	
	if($defSIZE == "ft")
	{
		$defSIZEs = "feet";
	}
	else
	{
		$defSIZEs = "Meter";
	}
	
	$str         = "test".$defPATHsVALUe;
	$osff        = 0;
	$test        = strpos($str,"-",$osff+1);
	if($test !="")
	{
		if($test == 4)
		{
			$astLENGTH     = strlen($str);
			$defPATHsVALUe = substr($str,$test+1,$astLENGTH);
		}		
	}
	
	$finds         = array("-");
	$defPATHsVALUe = str_replace($finds," ",$defPATHsVALUe);
	$defPATHLabels = str_replace($finds," ",$defPATHLabels);
	
	if($defPATHsVALUe !="")
	{
		$defPATHsVLUes = str_replace($finds,"_",$defPATHsVALUe);
		$stWEBFICONs   = $smURLPARENt."club/templates/filters/TFLAGS/".$defPATHsVLUes.".png";
		if(@getimagesize($stWEBFICONs))
		{
			$stWEBFICON = $stWEBFICONs;
		}
	}
	elseif($defPATHsVALUe == "")
	{
		$defPATHsVALUe = "UAE";
		$defPATHLabels = $defPATHsVALUe;
	}
	
	$mdMAPsSizes     = mdMAPsSizes("srASIZe","mdMAPDrOPs","mdMAPsSize","mdMAPsSizeLst");
	$mdMAPscurrncYes = mdMAPsSizes("srSCRNCY","mdMAPDrOPs","mdMAPscurrencY","mdMAPscurrencYLst");
	$mdsrchLstCNTRYs = mdCOUNTeRsrchLst("srSCNTRYs",$defPATHsVALUe,"");
	
	$mdMPRICes    = "";
	$mdMPRICLABel = "Price/".$defSIZE."^2";
	if($defMPRICE != "" || $defMPRICE != "")
	{
		$mdMPRICes    = $defMPRICE.",".$defXPRICE;
	}
	else
	{
		$mdMPRICes    = "";
	}
	
    /*
	unset($_SESSION['mCCLUBsValidUser']);
	unset($_SESSION['mCCLUBsSinfo']);
    unset($_SESSION['mCCLUBsSemail']);
    unset($_SESSION['mCCLUBsValidUser']);
	unset($_SESSION['FILTERheaderDROPDOWNCountries']);
	*/
		
	$mdTOPIcon = $smURLPARENt."GAssets/icons/favicon.png";	
?>
<!DOCTYPE html5>
<html class="notranslate">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $defASGDescPON;?>">
    <meta name="author" content="BrightLab(Monear Senan)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo $defASGDescPON;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, shrink-to-fit=no,user-scalable=no">
	<meta name="theme-color">
	<link id="real_title_top" rel="shortcut icon" href="<?php echo $stWEBFICON;?>">
	<title><?php echo $defASGTITLes;?></title>
	
	<!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="<?php echo $defASGTITLes;?>">
    <meta name="twitter:description" content="<?php echo $defASGDescPON;?>">
    <meta name="twitter:image" content="<?php echo $stWEBFICON;?>">
    <!-- Facebook -->
    <meta property="og:url" content="<?php echo $smURLPATH."index.php";?>">
    <meta property="og:title" content="<?php echo $defASGTITLes;?>">
    <meta property="og:description" content="<?php echo $defASGDescPON;?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $stWEBFICON;?>">
    <meta property="og:image:type" content="image/*">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
	
	
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/bootstrap/css/bootstrap.css">
	
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/leaflet/leaflet.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/leaflet/Leaflet.markercluster-1.4.1/dist/MarkerCluster.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/leaflet/Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css" />
	
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/inmap.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/index.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/last_style.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/latestcss.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/ltsttble.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/ltstcss.css" />     
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/mdTBLesearch.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/mdhome.css" />	
	
	<script type="text/javascript" src="<?php echo $smURLPATH;?>mdAssets/leaflet/leaflet.js"></script>
	<script type="text/javascript" src="<?php echo $smURLPATH;?>mdAssets/leaflet/Leaflet.markercluster-1.4.1/dist/leaflet.markercluster.js"></script>	
    
	<script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-2.2.3.js"></script>
	<script type="text/javascript" src="<?php echo $smURLPATH;?>mdAssets/mdShare/Chart.min.js"></script>
	<script type="text/javascript" src="<?php echo $smURLPATH;?>mdAssets/mdShare/share_media.js"></script>
    
	<link type="text/css" rel="stylesheet" href="<?php echo $smURLPATH;?>mdAssets/css/mddrstyle.css" />
	<script type="text/javascript" src="<?php echo $smURLPATH;?>mdAssets/js/cropper.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $smURLPATH;?>mdAssets/css/cropper.css" />
	
<style>
.mdGlnk{
	text-decoration:none;
	padding:0px;
	margin:0px;
	border:0px;
	outline:0px;
	height:40px;
	align-items:center;
	justify-content:center;
	gap:3px;
}
.mdAVLecontainer.mdAVLecontnr2{
	gap:5px !important;
	justify-content:space-between !important;
	position:relative;
}
.mdAVLecontainer2{
	flex:calc(100% - 50px);
	flex-flow:wrap;
}
.mdAVLecontainer2 label.mdAVLeLABeL{
	width:100%;
}
.mdAVLecontainer3{
	width:40px;
	height:40px;
	justify-content:center;
	align-items:center;
	align-self:end;
	padding:0px;
}
.mdAVLecontainer3 .mdGlnk{
	width:40px;
	gap:0px;
}
.mdTBLePOPUPmodal{
	position:fixed;
	top:60px;
	left:-100%;
	bottom:0;
	width:100%;
	overflow-y:scroll;
	background-color:rgba(0,0,0,0.5);
	z-index:500;
	transition:0.5s;
}
.mdTBLePOPUPmodal .mdTBLePOPUPcnt{
	justify-content:center;
	align-items:center;
	min-height:calc(100% - 60px);
	width:calc(100% - 50%);
	margin:50px 0px;
	background-color:#fafbfd;
	padding:30px;
	border-radius:3px;
	flex-flow:wrap;
	margin-left: 25%;
    box-shadow: 0px 0px 5px 3px #ddd
	gap:5px !important;
}
.mdTBLePOPUPmodal .mdActcontainer{
	margin:0px;
}
.mdTBLePOPUPmodal .mdActcontainer .mdAVLesection{
	border-radius:0px;
	margin:0px;
}
.mdAVLesection .mdAVLecontainer{
	position:relative;
}
.mdTBLePOPUPmodal .mdAVLesection .mdAVLecontainer{
	flex:calc(100% / 2);
}
.mdTBLePOPUPfooter,
.mdTBLePOPUPheader{
	height:60px;
	justify-content:center;
	align-items:center;
	gap:10px;
	background-color:#f0f0f0;
	width:100%;
}
.mdTBLePOPUPfooter{
	border-top:1px solid #ddd;
	border-radius:0px 0px 3px 3px;
}
.mdTBLePOPUPheader{
	border-bottom:1px solid #ddd;
	border-radius:3px 3px 0px 0px;
}
.mdTBLePOPUPfooter .mdGlnk{
	padding:0px 5px;
	min-width:80px;
}
.mdPROJecTsrch{
	width:100% !important;
}
.mdAVLeINPFORut{
	position:relative;
	justify-content:space-between;
	align-items:center;
	padding:0px 5px;
	height:40px;
	background-color:rgba(0,0,0,0.5);
	transition:0.5s;
	border-radius:3px;
	cursor:pointer;
	width:100%;
	gap:5px;
}
.mdAVLeINPFORut:hover{
	background-color:rgba(0,0,0,0.7);
}
.mdAVLeINPFORut i.fa{
	color:#f6f6f6;
}
.mdUPloadPRoGress{
	position:relative;
	width:100%;
	height:20px;
	background-color:rgba(255,255,255,0.5);
	border-radius:3px;
	display:flex;
	justify-content:center;
	align-items:center;
}
.thisPH_modal{
	z-index:999902;
	width: 100%;
    left: 0;
    right: 0;
    margin: 0;
    top: 0;
    bottom: 0;
    padding: 0;
}
.thisPH_modaldG{
	max-width:100% !important;
	min-width:100%;
	width:100%;
	height:100%;
	margin:0px;
	overflow:hidden;
} 
.thisPH_modalcG{
	position:relative;
	height:100%;
	width:100%;
	overflow-y:scroll;
	margin:0px;
}	
.thisPH_modalcG .modal-header,
.thisPH_modalcG .modal-footer{
	height:50px;
	width:100%;
	position:relative;
	overflow:hidden;
	padding:0px 15px;
	margin:0px;
	justify-content:space-between;
	align-items:center;
	border:1px solid #ddd;
}
.thisPH_modalcG .thisPH_modalfG{
	position:relative;
	height:calc(100% - 50px);
	width:100%;
	background-color:#eee;
	flex-flow:wrap;
	margin: 0px;
}
.thisPH_modalcG .thisPH_modalbDG{
	position:relative;
	height:calc(100% - 0px);
	max-height: 100%;
	width:100%;
	background-color:#f7f7f7;
	flex-flow:row;
}
.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbGG{
	position:relative;
	height:calc(100% - 0px);
	background-color:#f7f7f7;
	flex:calc(100% / 3);
	overflow-y:auto;
}
.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbCPG{
	position:relative;
	background-color:#fafbfd;
	overflow-y:overlay;
}
.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbGYG{
	flex-flow:wrap;
	justify-content:center;
	align-items:center;
	gap:10px;
	background-color:#f8f8f8;
}
.thisPH_modalbGYG .singleImageCanvasContainer{
	height:200px;
	width:initial;
	max-width:calc(100% / 3);
	padding:0px;
	border-radius:3px;
	border:1px solid #eee;
	margin:0px;
	position:relative;
	overflow:hidden;
	display:flex;
	justify-content:center;
	align-items:center;
	background-color:#fff;
}

.thisPH_modalbGYG .singleImageCanvasContainer .singleImageCanvasCloseBtn{
    position: absolute;
    right: 0;
	top:0;
}
.thisPH_modalbGYG .singleImageCanvasContainer .singleImageCanvas{
    width:auto;
	max-width:100%;
	max-height:100%;
    object-fit: cover;
}
.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbCRPG{
	position:relative;
	height:calc(100% - 50px);
	width:100%;
	max-width:100% !important;
	background-color:#fafbfd;
	flex:1;
	overflow-y:overlay;
	justify-content:center;
	align-items:center;
}
.thisPH_modalbCRPG .cropper-container{
	margin:0px;
	padding:0px;
	overflow:hidden;
	max-height:100%;
	max-width:100%;
}
.thisPH_modalbCRPG .cropper-container .cropper-canvas{
	
}
.thisPH_modalbCRPG .cropper-container .cropper-canvas img{
}
.thisPH_modalbCRPG .thisCRPbtns{
	position:absolute;
	bottom:0;
	left:0;
	right:0;
	height:50px;
	display:flex;
	justify-content:center;
	align-items:center;
	gap:10px;
}
.thisPH_modalbCRPG .cropImageBtn{
	display:flex;
	justify-content:center;
	align-items:center;
	bottom:5px;
	z-index:50;
}
.thisPHmodalPROms{
	position:absolute;
	bottom:0;
	left:0;
	right:0;
	height:50px;
	justify-content:center;
	align-items:center;
}
.mdCroPmaPs{
	width:100%;
	height:400px;
	position:relative;
	overflow:hidden;
	border:1px solid #eee;
	border-radius:3px;
	background-color:#e6e4e4;
}
.mdCroPmaPs div.mdCroPmaPslab{
	position:absolute;
	left:0;top:0;bottom:0;right:0;
}
.mdCroPmaPs div.mdCroPmaPscontrol{
	position:absolute;
	top:15px;right:15px;
	background-color:#f9f9f9;
	height:40px;
	width:40px;
	justify-content:center;
	align-items:center;
	padding:0px;
	z-index:10;
	border-radius:3px;
}
.mdCroPmaPs div.mdCroPmaPscontrol a{
	text-decoration:none;
	height:40px;
	width:40px;
	padding:0px;
	border-radius:3px;
	border:0px;
	outline:0;
	justify-content:center;
}
.translated-rtl> body,
.translated-ltr > body{
	top:0px !important;
}
.VIpgJd-ZVi9od-ORHb{
}
.VIpgJd-ZVi9od-ORHb-OEVmcd{;
}
.skiptranslate{
	top:-50px !important;
}
.goog-te-combo{
}
.goog-te-banner-frame.skiptranslate{
   display: none !important;
}
.goog-logo-link{
   display: none !important;
}
.goog-te-gadget{
    color:transparent!important;
}
.goog-te-banner-frame{
    display:none !important;
}
#goog-gt-tt,
.goog-te-balloon-frame{
	display: none !important;
}
.goog-text-highlight{ 
    background: none !important; 
	box-shadow: none !important;
}
.goog-logo-link{
    display:none !important;
}
.goog-te-gadget{
  color:transparent!important;
}
@media (max-width:767px)
{
	.mdCroPmaPs{
		height:300px;
	}
	.thisPH_modalcG .thisPH_modalfG{
		width:100%;
		max-width:100%;
	}
	.thisPH_modalcG .thisPH_modalbDG{
	    flex-flow:wrap;
		gap:15px;
		width:100%;
		max-width:100%;
	}
    .thisPH_modalcG .thisPH_modalbDG .thisPH_modalbGG{
		flex:calc(100% / 1);
		height:fit-content !important;
	}
	.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbCPG{
		width:100%;
		max-width:100%;
		overflow:hidden;
	}
	.thisPH_modalcG .thisPH_modalbDG .thisPH_modalbCRPG{
		overflow:hidden !important;
		width:100% !important;
		max-width:100% !important;
	}
	.thisPH_modalbGYG .singleImageCanvasContainer{
		max-width:calc(100% / 2.5);
	}
	.mdTBLePOPUPmodal{
		top:50px;
	}
	.mdTBLePOPUPmodal .mdTBLePOPUPcnt{
		width:calc(100% - 60px);
		margin:30px 0px;
		margin-left:30px;
		min-height:calc(100% - 60px);
	}
}
</style>	

<style>
.mdOVeRflowIMG{
	z-index:999902;
	height:50%;
	width:auto;
	position:fixed;
	display:none;
}
</style>

<style>
/* ----GenRal----- */
.mdTVThemes{
	text-transform:uppercase !important;
}
.tvFLex{
	display:flex;
	justify-content:flex-start;
	align-items:center;
}
/* ------------ */
.tvBTMProGss{
	
}
.mdTOPheader{
	top:-100% !important;
	bottom:initial !important;
}
.mdBOTTOMfooter{
	bottom:-100px !important;
	top:initial !important;
}
.mdLeFTheader{
	left:-100% !important;
	right:initial !important;
}
.mdRIGHTheader{
	right:-100% !important;
	left:initial !important;
}
/*  ------- */
.mdPROGleft{
	left:0px !important;
}
.mdPROPertiesmodal,
.mdPROPiimlists{
	position:fixed;
	z-index:999902;
	top:0;
	left:-100%;
	bottom:0;
	overflow:hidden;
	background-color:rgba(0,0,0,0.2);
	max-width:100%;
	max-height:100%;
	height:100%;
	width:100%;
	padding:0px;
	margin:0px;
	transition:0.5s;
}
.mdPROPiimlists{
	z-index:10;
	background-color:rgba(0,0,0,0.3);
}
.mdPROPertiesmodal .modal-content,
.mdPROPiimlists .mdPROPcontent{
	position:relative;
	height:100%;
	width:100%;
	overflow:hidden;
	background-color:#fff;
	justify-content:center;
	align-items:center;
	flex-flow:wrap;
	padding:0px;
	margin:0px;
}
.mdPROPertiesmodal .modal-header,
.mdPROPertiesmodal .modal-footer,
.mdPROPiimlists .mdPROPheader,
.mdPROPiimlists .mdPROPfooter{
	height:50px;
	width:100%;
	padding:0px 30px;
	margin:0px;
	background-color:#f7f7f7;
	justify-content:space-between;
	align-items:center;
}
.mdPROPertiesmodal .modal-body,
.mdPROPiimlists .mdPROPbody{
	position:relative;
	overflow-y:scroll;
	height:calc(100% - 100px);
	max-height:calc(100% - 100px);
	width:100%;
	max-width:100%;
	padding:0px;
	margin:0px;
}
.mdPROPertiesmodal .mdProlist{
	width:100%;
	justify-content:flex-start;
	align-items:center;
	padding:15px;
	background-color:#fafbfd;
	flex-flow:column;
}
.mdPROPertiesmodal .mdPROPlist,
.mdPROPiimlists .mdPROPimlist{
	width:100%;
	flex-flow:wrap;
	justify-content:space-between;
	align-items:center;
	gap:10px;
	padding:15px;
}
.mdPROPertiesmodal .mdPROPitems,
.mdPROPiimlists .mdPROPitems{
	height:350px;
	flex:calc(100% / 5);
	flex-flow:wrap;
	justify-content:center;
	align-items:center;
	gap:0px;
	border:1px solid #eee;
	border-radius:3px 3px 0px 0px;
	background-color:#fff;
	position:relative;
	overflow:hidden;
}
.mdPROPiimlists .mdPROPitems{
	height:300px;
}
.mdPROPertiesmodal .mdPROPiPhoto,
.mdPROPiimlists .mdPROPiPhoto{
	height:270px;
	width:100%;
	justify-content:center;
	align-items:center;
}
.mdPROPiimlists .mdPROPiPhoto{
	height:100%;
}
.mdPROPertiesmodal .mdPROPiPhoto a,
.mdPROPertiesmodal .mdPROPiPhoto img,
.mdPROPiimlists .mdPROPiPhoto a,
.mdPROPiimlists .mdPROPiPhoto img{
	justify-content:center;
	align-items:center;
	width:100%;
	height:100%;
	padding:0px;
	margin:0px;
	transition:0.5s;
}
.mdPROPertiesmodal .mdPROPiPhoto img,
.mdPROPiimlists .mdPROPiPhoto img{
	width:100%;
	height:initial;
}
.mdPROPertiesmodal .mdPROPiPhoto a,
.mdPROPiimlists .mdPROPiPhoto a{
	position:relative;
	overflow:hidden;
}
.mdPROPertiesmodal .mdPROPiPhoto a:hover img,
.mdPROPiimlists .mdPROPiPhoto a:hover img{
	transform:scale(1.1);
}
.mdPROPertiesmodal .mdPROPiPhoto a i.fa,
.mdPROPiimlists .mdPROPiPhoto a i.fa{
	position:absolute;
	background-color:#fff;
	width:30px;
	height:30px;
	border-radius:15px;
	padding:0px;
	display:flex;
	justify-content:center;
	align-items:center;
	opacity:0.7;
	z-index:5;
}
.mdPROPertiesmodal .mdPROPiPhoto a:hover i.fa,
.mdPROPiimlists .mdPROPiPhoto a:hover i.fa{
	opacity:1;
}
.mdPROPertiesmodal .mdPROPiPhoto a:hover::before,
.mdPROPiimlists .mdPROPiPhoto a:hover::before{
    position: absolute;
    background-color: rgba(0,0,0,0.6);
    width: 100%;
    height: 1000%;
    content: "";
    z-index: 3;
}
.mdPROPertiesmodal .mdPROPidetails{
	height:80px;
	width:100%;
	justify-content:center;
	align-items:center;
	flex-flow:wrap;
	background-color:#f7f7f7;
}
.mdPROPertiesmodal .mdPROPidetails h1{
	height:40px;
	flex:calc(100% / 1);
	justify-content:flex-start;
	align-items:center;
	padding:0px 10px;
	margin:0px;
	font-size:16px;
	position:relative;
	overflow:hidden;
	flex-wrap:row;
}
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets{
	height:40px;
	flex:calc(100% / 1);
	justify-content:space-between;
	align-items:center;
	padding:0px;
	margin:0px;
	gap:5px;
	background-color:rgba(0,0,0,0.6);
	color:#fff;
}
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets> div,
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets span,
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets p{
	height:40px;
	flex:calc(100% / 4);
	display:flex;
	justify-content:flex-start;
	align-items:center;
	padding:0px;
	margin:0px;
	gap:3px;
	flex-wrap:row;
	position:relative;
	overflow:hidden;
}
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets> div{
	padding:0px 5px;
	border-left:1px solid #eee;
}
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets> div:first-child{
	border-left:0px solid #eee;
}
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets span,
.mdPROPertiesmodal .mdPROPidetails .mdPROPidets p{
	flex:1;
	justify-content:flex-start;
	gap:0px;
}

.mdPROPiimlists .mmdPROPlinks{
	cursor:pointer;
	height:35px;
	padding:0px 15px;
	justify-content:center;
	align-items:center;
	gap:5px;
	position:relative;
	border-radius:3px;
	margin:0px;
	border:0px;
	outline:0px;
	background:gainsboro;
}
.mdPROPiimlists .mmdPROPlinks:hover{
	background:#f7f7f7;
}
.mdPROPiimlists .mmdPROPlinks i.fa{
	padding:0px;
	margin:0px;
}
.mdPROPireurl{
	position:absolute;
	height:60px;
	padding:0px;
	background-color:rgba(255,255,255,0.3);
	z-index:5;
	display:flex;
	justify-content:center;
	align-items:center;
	opacity:0.6;
	gap:5px;
	bottom:-100%;
	overflow:hidden;
	transition:0.5s;
	cursor:default;
}
.mdPROPireurl .mdPROPiremurl{
	position:relative;
	width:100%;
	height:100%;
	padding:5px 30px;
	justify-content:center;
	align-items:center;
	gap:15px;
	transition:0.5s;
	z-index:5;
	border-radius:3px 3px 0px 0px;
}
.mdPROPireurl .btn{
	position:relative;
	height:40px;
	width:40px;
	padding:0px;
	margin:0px;
	display:flex;
	justify-content:center;
	align-items:center;
	border:0px;
	outline:0;
	background:#fff;
	border-radius:20px;
}
.mdPROPireurl .btn i.fa{
	position:relative;
	padding:0px;
	margin:0px;
	opacity:1;
	z-index:initial;
	background-color:transparent;
}
.mdPROPiimlists .mdPROPiPhoto a:hover div.mdPROPireurl{
	opacity:1;
	bottom:0;
}
.mdPROPiimlists .mdPROPiPhoto a.mdPROPiurl1> i.fa{
	transition:0.9s;
	opacity:0.8;
}
.mdPROPiimlists .mdPROPiPhoto a.mdPROPiurl1:hover> i.fa{
	opacity:0;
}
.thisPH_modalbCPG{
	transition:0.5s;
}
.tmodalflXCPG .thisPH_modalbCPG{
	flex:0 !important;
	transition:0.5s;
	overflow:initial !important;
}
.tmodalflXCPG .modal-footer{
	left:0;
	bottom:0;
	position:fixed;
}
.mdLOADmores{
	padding:0px 15px;
	justify-content:center;
	align-self:center;
	background-color:aquamarine;
}
.mdLOADmores .mdLOADmore{
	padding:0px;
	margin:0px;
	text-decoration:none;
	color:#333;
	padding:0px 15px;
	height:40px;
	border-radius:3px;
	display:flex;
	justify-content:center;
	align-items:center;
}
.mdImSTclass{
	box-shadow:0px 0px 5px 1px #ff3131;
}
.mdImSTclass span.mdImSTtitle{
	position:absolute;
	height:30px;
	padding:0px 15px;
	background-color:rgba(255,255,255,0.6);
	color:#000;
	border-radius:3px;
	z-index:3;
	margin-top:-40px;
	display:flex;
	justify-content:center;
	align-items:center;
	transition:0.5s;
}
.mdImSTclass a.mdPROPiurl1:hover span.mdImSTtitle{
	margin-top:initial;
}
.mdImSTclass a.mdPROPiurl1> i.fa{
	margin-bottom:-40px;
}
.mdPROPertiesmodal .modal-footer,
.mdPROPiimlists .mdPROPfooter{
	justify-content:center;	
}
@media (max-width:767px)
{
	.mdPROPertiesmodal .mdPROPitems,
    .mdPROPiimlists .mdPROPitems{
		flex:calc(100% / 1);
	}
	.mdPROPertiesmodal .modal-footer,
	.mdPROPiimlists .mdPROPfooter{
		justify-content:flex-start;
	}
	
}
</style>
</head>
<body class="">
<div class="my_map mdInitaiteMAPs">
	<img src="1.jpg" class="mdOVeRflowIMG">
	<?php 
	$defCURNCYs      = $stDBexTRas->CheckCURRencYs($defCURNCY);
	$CheckCURRencies = $stDBexTRas->CheckCURRencies();
	?>
	
	<script src="<?php echo $smURLPATH;?>mdAssets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
	
	<?php 
	require_once($smPATH.'mdReQuests/mdReQhtml/mdmOdals.php');
	?>
	
	<div id="map" class="map-size dfindexMAPs"></div>
	<div id="loading-mask" class="modal-backdrop" ></div>
	
	<div class="astDTBLeOFIndxes astFLex astDTBLIndxs">
	    <div class="astDTBLeOFHeADeRs astFLex">
		    <b>Index Details</b>
			<a href="javascript:void(0)" class="btn astFLex" fm="" onclick="viewINDeXDTes(this)">
			    <i class="fa fa-close"></i>
			</a>
		</div>
		
		<div class="astDTBLeOFBODYs astFLex">
		</div>
	</div>
	
	<div id="loading" style="">
        <div class="loading-indicator">
		    <h4 id="error-msg">Loading Data ...</h4>
            <img src="<?php echo $smPATH;?>img/ajax-loader.gif">
        </div>
    </div>
	
	
	<div class="mdZOomReset mdSeARchTHis mdMAReKetReset astFLex">
		<div class=".mdSeARchTHis mdMARKtReset astFLex">
			<div class="astFLex mdRzoomSeARch">
			    <a href="javascript:void(0)" class="btn mdZoomOUTtn" 
				    fm="searchTB" fb="mdNzoom" onclick="mdMAPsseArchBOxs(this)">
					<i class="fa fa-search-plus"></i>
				</a>
		    </div>
		</div>
	</div>	
	
	<div class="mdZOomReset mdMAReKetReset astFLex">
	    
		<div class="mdMARKtReset astFLex">
		    <div class="astFLex mdRstVIeW">
				<a href="javascript:void(0)" class="btn mdZoomOUTtn" fm="mdRstVIeW" onclick="mdZOomReset(event,this)">
			        <i class="fa fa-eye-slash"></i>
			    </a>
		    </div>
		</div>
		
        <div class="astFLex mdMAReKetResets mdMAPSelmoreshdrcn mdMAPSedown">
		    
			<label class="astFLex mdMAPSedowncn mdMAPSedownlabel" for="mdMAPsPurPoseSD">
				<span class="astFLex mdMAPsPurPoseSDtitle">market</span>
				<div class="astFLex mdMAPsPurPoseSDbtn">
				    
				    <input type="button" class="astFLex mdMAPsearchVALUe mdMAPsPurPoseSD" 
					    placeholder="Purpose" value="Sale"
					    onclick="mdMAPSedowns(this)"
					    fm="mdMAPsearch" fb="Sale" fmID="mdMAPsPurPoseSD" 
					    id="mdMAPsPurPoseSD" fmLst="mdMAPsPurPoseSDLst" readOnly>
					<i class="astFLex fa fa-chevron-down"></i>	
				</div>	
			</label>
		    
			<div class="astFLex mdMAPSedowncn mdMAPSedownbd mdMAPsPurPoseSDLst">
				<div class="astFLex mdMAPSedowncn mdMAPSedownbods">
					<label class="astFLex mdMAPSlabels">Propose</label>
					<label class="astFLex mdMAPSlabels">Market</label>
					<div class="astFLex mdMAPSedowncnt mdMAPsPurPosecn mdMAPsPurPoseSDMLst">
						<a href="javascript:void(0)" class="mdMAPsearchLnk astNWVLUe astFLex" 
							fm="mdMAPsPurPoseSD" fb="market" fbset="intsrSROsaleVLUes" fValue="Sale" onclick="mdMAPSechoose(this)">
							<span>Sale</span>
						</a>
						<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
							fm="mdMAPsPurPoseSD" fb="market" fbset="intsrSROsaleVLUes" fValue="Rent" onclick="mdMAPSechoose(this)">
							<span>Rent</span>
						</a>
						<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
							fm="mdMAPsPurPoseSD" fb="market" fbset="intsrSROsaleVLUes" fValue="ROI" onclick="mdMAPSechoose(this)">
							<span>ROI</span>
						</a>
					</div>
					<label class="astFLex mdMAPSlabels">DED</label>
					<div class="astFLex mdMAPSedowncnt mdMAPsPurPosecn mdMAPsPurPoseSDDLst">
						<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
							fm="mdMAPsPurPoseSD" fb="ded" fbset="intsrSROsaleVLUes" fValue="Sale" onclick="mdMAPSechoose(this)">
							<span>Sale</span>
						</a>
						<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
							fm="mdMAPsPurPoseSD" fb="ded" fbset="intsrSROsaleVLUes" fValue="Rent" onclick="mdMAPSechoose(this)">
							<span>Rent</span>
						</a>
						<a href="javascript:void(0)" class="mdMAPsearchLnk astFLex" 
							fm="mdMAPsPurPoseSD" fb="ded" fbset="intsrSROsaleVLUes" fValue="ROI" onclick="mdMAPSechoose(this)">
							<span>ROI</span>
						</a>
					</div>
				</div>
				<div class="astFLex mdMAPSedowncn mdMAPSedownfooter">
					<a href="javascript:void(0)" class="btn btn-danger"
						onclick="mdMAPSedowns(this)"
						fm="mdMAPdone" fb="Sale" fmID="mdMAPsPurPoseSD" 
						fbs="reset" fbset="intsrSROsaleVLUes" fmLst="mdMAPsPurPoseSDLst">
									
						<span>reset</span>
					</a>
					<a href="javascript:void(0)" class="btn btn-success"
						onclick="mdMAPSedowns(this)"
						fm="mdMAPdone" fb="Sale" fmID="mdMAPsPurPoseSD" 
						fbs="done" fbset="intsrSROsaleVLUes" fmLst="mdMAPsPurPoseSDLst">
									
						<span>done</span>
					</a>
				</div>
							
			</div>
		
		</div>
        
		<div class="mdMARKtReset mdMAPschBOxsinLNk astFLex">
		    <div class="astFLex mdRstVIeW">
			    <a href="javascript:void(0)" class="astFLex btn start mdMAPsearchVALUe mdMAPschBOxsLNk" 
					onclick="mdMAPSedowns(this)"
					fm="mdMAPsin" fb="mdMAPsin" fmID="mdMAPsinMenu" 
					fmLst="mdMAPsinMenuLst">
					<i class="fa fa-user"></i>
				</a>
		    </div>
			<div class="astFLex mdRstVIeW mdOPeNtvFLOAT">
			    <a href="javascript:void(0)" class="reGctvfmstart astFLex btn mdNormalKeYs mdNormalKeYPlus mdOPeNGentv" 
					reGcturl="reGccllPanel/reGcviews/reGctv/reGctv.php"
					reGctxurl="reGccllPanel/reGcviews/reGctv/reGctvindex.php"
					reGctvaction="reGctvcall"
					reGctvmode="reGctvmember"
					reGctvsource="<?php echo $reGctvsource;?>"
					reGctvuserID="<?php //echo $reGUserID;?>"
					reGctvchID="<?php //echo $tvId;?>"
					reGctvchwelcome="<?php echo $reGctvchwelcome;?>"
					class="reGctvfmstart" 
					onclick="reGctvfmstart(this)">
					<i class="fa fa-tv"></i>
				</a>
		    </div>
			
			
		</div>
		
        		
		
	</div>
	
	<div class="mdZOomReset astFLex">
	    <!-- defsHAReResults(event,this) -->
	    <div class="astFLex mdRstSHeRes">
		
		    <div class="mdRstSHeResIkDe astFLex mdZoomActionHIDe">
	            <div class="mdRstSHsIDeBODYs astFLex">
		            
		        </div>
				<div class="mdRstSHsIDeFOot">
		            <input id="sHeaders" type="hidden">
			    </div>
	        </div>
		
		    <button class="btn astFLex mdZoomAction mdZoomActionHIDe" fm="mdZoomOUT" onclick="mdZOomReset(event,this)"></button>
			<a href="javascript:void(0)" class="start btn mdZoomOUTtn" fm="sideSAHRe" onclick="mdZOomReset(event,this)">
			    <i class="fa fa-share"></i>
			</a>
		</div>
	    
		<div class="astFLex mdZoomOUT">
		    <button class="btn astFLex mdZoomAction mdZoomActionHIDe" fm="mdZoomOUT" onclick="mdZOomReset(event,this)">ZOOM</button>
			<a href="javascript:void(0)" class="btn mdZoomOUTtn" fm="show" md="Zoom" bl="mdZoomOUT" onclick="mdZOomReset(event,this)">
			    <i class="fa">Z</i>
			</a>
		</div>
        <div class="astFLex mdResetOPtions">
		    <button class="btn astFLex mdZoomAction mdZoomActionHIDe" fm="mdResetOPtions"></button>
			<a href="javascript:void(0)" class="btn mdZoomOUTtn" modal="mdPROPertiesmodal" fm="modalHTML" md="mdProlist" onclick="mdSHOWPROs(this)">
			    <i class="fa">P</i>
			</a>
		</div>
        <div class="reGctvdisabled astFLex mdResetOPtions">
		    <button class="btn astFLex mdZoomAction mdZoomActionHIDe" fm="mdResetOPtions"></button>
			<a href="javascript:void(0)" 
			    class="btn mdZoomOUTtn" 
				md="ccGstart" mt="ccG" mdclass="ccGmodal" 
				onclick="ccGmclose(this)">
			    <i class="fa">SM</i>
			</a>
		</div>		
		
		
	</div>
	
	<input type="hidden" value="<?php echo $maPSHAReID;?>" id="maPSHAReID">
	<input type="hidden" value="<?php echo $maPSHAReLaT;?>" id="maPSHAReLaT">
	<input type="hidden" value="<?php echo $maPSHAReLnG;?>" id="maPSHAReLnG">
	<input type="hidden" value="<?php echo $maPSHAReName;?>" id="maPSHAReName">
			  
	<input type="hidden" value="0"  id="myLat">
    <input type="hidden" value="0" id="myLng">
	<input type="hidden" value="" id="myRadis">
	<input type="hidden" value="" id="PageNo">
	<input type="hidden" value="no" id="PNo">
	
	<input type="hidden" value="" id="btPricetitle">
	
	<input type="hidden" value="" id="mxPrice">
	<input type="hidden" value="" id="mnPrice">
	
	<input type="hidden" value="" id="lt_Index">
	<input type="hidden" value="" id="ln_Index">
	<input type="hidden" value="USD" id="currENcYLiesYMBOL">
	<input type="hidden" value="" id="sdefPATHeaders">
	<input type="hidden" value="<?php echo $defaultMAP;?>" id="defaultMAP">
	<input type="hidden" value="<?php echo $stWEBZOOM;?>" id="stWEBZOOM">
	<input type="hidden" value="<?php echo $stWEBPANTO;?>" id="defGeTzOooOm">
	<input type="hidden" value="<?php echo $stWEBLAYER;?>" id="stWEBLAYER">
	
	
	<input type="hidden" value="<?php echo $defASGDescPON;?>" id="defsHAReDeScRIPTIon">
	<input type="hidden" value="<?php echo $stWEBFICON;?>" id="defsHARePHOTO">
	<input type="hidden" value="<?php echo $defASGTITLes;?>" id="defsHAReTITLe">
	<input type="hidden" value="" id="defFILTErs">
	
	<input type="hidden" value="" id="astdefURLOGosa">
	<input type="hidden" value="" id="astdefURLOGosb">
	
	<input type="hidden" value="<?php echo $dfCitYs; ?>" id="choosefrtaG">
	<input type="hidden" value="<?php echo $fCdists; ?>" id="choosefrtad">
	<input type="hidden" value="<?php echo $dfDistrict; ?>" id="choosefrtac">
	<input type="hidden" value="<?php echo $dfAddresss; ?>" id="choosefrtaA">
	<input type="hidden" value="<?php echo $dfTower; ?>" id="choosefrtar">
	
</div>

	<script src="<?php echo $smPATH;?>mdAssets/js/initiMAPsss.js"></script>
	
	<?php 
    require_once($smPATH.'mdReQuests/mdReQJs/mdReQMAPJs.php');
	require_once($smPATH.'mdReQuests/mdReQJs/mdReQmedia.php');
    ?>
	
<script>	
	$(document).ready(function()
	{
		//$(".full-Screen").addClass("astDnone")
	    firstIntail(); 
		/////////////
		users.on('clusterclick',function()
	    {
			defhEADeRsLst();
		    astMARKerVPeInOut(300);
		    //defMAPLOAD("dfLoINFOs");
		});  
	
	    map.on('zoom',function()
	    {
			defhEADeRsLst();
		    astMARKerVPeInOut(300);
		    //defMAPLOAD("dfLoINFOs");
		});
	
	    map.on("moveend",function()
	    {
			defhEADeRsLst();
			aststHEADURls(1);
			defMAPLOAD("dfLoINFOs");
		});

	    $(".leaflet-control-layers-base label").on('click',function()
	    {
		    let stWEBLAYER = $(this).find('span> span').text();
		
		        stWEBLAYER= stWEBLAYER.replace(" ","");
			    stWEBLAYER= stWEBLAYER.replace(" ","_");
		        $("#stWEBLAYER").val(stWEBLAYER);
		});
	
	});
	
    function firstIntail()
	{
		let dfCountries, dfCities,fDistricts, dfArea, dfAddress, dfProName, currencsYmbls;
		
			dfCountries = $(".mdMAPscountries").val();
			dfCities    = $(".mdMAPscities").val();
			fDistricts  = $(".mdMAPsdistrict").val();
			dfArea      = $(".mdMAPsareas").val();
			dfAddress   = $(".mdMAPsbuilds").val();
			dfProName   = $(".mdMAPsPname").val();
			
			dfCountries   = mdSTRNGRePlAce(dfCountries,"remove");
			dfCities      = mdSTRNGRePlAce(dfCities,"remove");
			fDistricts    = mdSTRNGRePlAce(fDistricts,"remove");
			dfArea        = mdSTRNGRePlAce(dfArea,"remove");
			dfAddress     = mdSTRNGRePlAce(dfAddress,"remove");
			dfProName     = mdSTRNGRePlAce(dfProName,"remove");
			
			//currencsYmbls = defcurrencsYmbols();
		
        mdFRsTLoAds("srSCNTRY","0",dfCountries,dfCities);		
		defMAPLOAD("default");
	}		

	dfLocationINFs.onAdd = function (map) 
	{	
		let InSZes, astMAPSs, sYmbol, dfLoINFOs, astDTBOIx;
            dfLoINFOs = L.DomUtil.create('div','dfLocationINFOs astFLex');
		    InSZes    = $(".mdMAPsSizeVLUe").val();
			astMAPSs  = astMAPSzs(InSZes);
			sYmbol    = defcurrencsYmbols();
			astDTBOIx = "";
			
			dfLoINFOs.innerHTML += '';
			
		    dfLoINFOs.innerHTML += '<div class="dfLocationINDeTitle astFLex">'+
										'<b class="astFLex">'+
										    '<a href="javascript:void(0)" class="mdviewINDeXDTes" onclick="viewINDeXDTes(this)">'+
											'View Details'+
											'</a>'+ 
										'</b>'+
								    '</div>';
									
			dfLoINFOs.innerHTML += '<div class="dfLocationINFOss astFLex">'+
			                            '<div class="astFLex dfLocINFOLabels">'+
										    '<span>Points</span>'+
										    '<span>mn</span>'+
											'<span>md</span>'+
											'<span>mx</span>'+
										'</div>'+
										'<div class="astFLex dfLocINFOPrices">'+
										    '<div><b>0</b></div>'+
										    '<div><span>'+sYmbol+'</span><b>0</b><span>'+astMAPSs+'</span></div>'+
											'<div><span>'+sYmbol+'</span><b>0</b><span>'+astMAPSs+'</span></div>'+
											'<div><span>'+sYmbol+'</span><b>0</b><span>'+astMAPSs+'</span></div>'+
										'</div>'+
								    '</div>';
			
		return dfLoINFOs; 
	};
	
	map.addControl(dfLocationINFs);
	
	function astMARKerVPeInOut(time)
	{
		setTimeout(function()
		{
			$("#defaultMAP").val("defaultMAP");
			aststHEADURls(1);
		},time);
	}
	
	////////////////////////
	function astdefURLOGo()
	{
		let response     = "", dfAction;
		let country       = $(".mdMAPscountries").val();
		    country       = mdSTRNGRePlAce(country,"remove");
		let stDTWEBLOGO   = '<?php echo $stDTWEBLOGO;?>';
        let stDTWEBFICON  = '<?php echo $stDTWEBFICON;?>';		
			
		let defURLOGo     = '<?php echo $smURLPARENt."club/templates/filters/TFLAGS/"?>';
		   
		    dfAction = "defURLOGo";
		$.ajax({
			url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
		    method:'POST',
			data:{country:country,
			      stDTWEBLOGO:stDTWEBLOGO,
				  stDTWEBFICON:stDTWEBFICON,
			      defURLOGo:defURLOGo,
				  dfAction:dfAction},
			beforeSend:function()
			{
				
			},
			success:function(res)
			{
				response = res.split("|");
				$("#real_title_top").attr("href",response[1]);
			    $(".mdMAPLODOsPHOTOs").attr("src",response[0]);
				astdefURLOGos();
			}
		});	    
	}
	
	function astdefURLOGos()
	{
		let response      = "";
		let country       = $(".mdMAPscountries").val();
		    country       = mdSTRNGRePlAce(country,"remove");
		let stDTWEBLOGO   = '<?php echo $stDTWEBLOGO;?>';
        let stDTWEBFICON  = '<?php echo $stDTWEBFICON;?>';		
			
		let defURLOGo     = '<?php echo $smURLPARENt."club/templates/filters/TFLAGS/"?>';
		    dfAction = "defURLOGo";
		$.ajax({
			url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
		    method:'POST',
			data:{country:country,
			      stDTWEBLOGO:stDTWEBLOGO,
				  stDTWEBFICON:stDTWEBFICON,
			      defURLOGo:defURLOGo,
				  dfAction:dfAction},
			beforeSend:function()
			{
				
			},
			success:function(res)
			{
				response = res.split("|");
				$("#astdefURLOGosa").val(response[1]);
				$("#astdefURLOGosb").val(response[2]);
			}
		});	 	
	}
	
	///////////////////////
	function chooseCOUNTRYies(id)
	{
		astMAPSIDesss("sideSEARch");
		autoMAPhelPrices();
		$("#defFILTErs").val("");
		$("#defaultMAP").val("defaultMAP");
		$(".astMAPSIDescolse").click();
		defMAPLOAD("default");
	}
	
	function stSEARchOKin()
	{
		$("#defFILTErs").val("");
		$("#defaultMAP").val("defaultMAP");
		$(".astMAPSIDescolse").click();
		defMAPLOAD("default");
	}
	
	function defmANiPULAtions(id)
	{
		$("#defFILTErs").val(1);
		$("#defaultMAP").val("defaultMAP");
		$(".astMAPSIDescolse").click();
		defhEADeRsLst();
		defMAPLOAD("default");
	}	
	
	///////////////////////
	
	function astMAPSzs(InSZes)
	{
		if(InSZes == "ft")
		{
			InSZess = "ft^2";
		}
		else
		{
			InSZess = "m^2";
		}
		
		return InSZess;
	}
	 	 
	function astMAPSIDes(id)
	{
		let fm = $(id).attr("fm");
		    astMAPSIDesss(fm); 
	}

	function astMAPSIDesss(fm)
	{
		if(fm == "sideSEARch")
		{
			if(sideSEARch == false)
			{
				$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");
				$(".astMAP_selections_mobile").css({'left':'0px'});
				sideSEARch = true;
			}
			else
			{
				$(".astDTBLeOFIndxes").addClass("astDTBLIndxs");
				$(".astMAP_selections_mobile").css({'left':'-700px'});
				sideSEARch = false;
			}
		}
	}
	
	function autoLOADmss(ast,defPATH)
	{
		if(ast == 1)
		{
			$("#error-msg").fadeIn("slow").text("LOADING "+defPATH+" MAP");
		    $("#loading").show("slow");
		    $("#loading-mask").show("slow");
		}
		else
		{
			$("#error-msg").fadeOut("slow").text("");
		    $("#loading").hide("slow");
		    $("#loading-mask").hide("slow");
		}
		
	}
	  
    ////////////////////////
	function astMAPPOINTers(id) 
	{
		let fm = $(id).attr("fm");
		if(fm == "start")
		{
			initRegistration();
		}
		else if(fm == "end")
		{
			cancelRegistration()
		}
		else
		{
			$('#updateModal').removeClass("astModalHiders");
		}
	}
	
	//////////////////////
	function asHMAOPRtion(id)
	{
		$("#astPT_InLAT").val("");
		$("#astPT_InLNG").val("");
		$("#astPT_InCountry").val("");
		$("#astPT_InCity").val("");
		$("#astPT_InID").val("");
		$("#astPT_InLATO").val("");
		$("#astPT_InLNGO").val("");
		//$("#astPT_PASS").val("");
		//$("#astDT_PASS").val("");
		
		$("#astPT_InArea").val("");
		$("#astPT_InPtName").val("");
		
		
		
		let fm        = $(id).attr("fm");
		let InLAT     = $(id).attr("InLAT");
        let InLNG     = $(id).attr("InLNG");
		let InCountry = $(id).attr("InCountry");
        let InCity    = $(id).attr("InCity");
		let InID      = $(id).attr("InID");
		let astNOs    = $(id).attr("astNOs");
		let InPtName  = $(id).attr("InPtName");
		
		$("#astPT_InArea").val(astNOs);
		$("#astPT_InPtName").val(InPtName);
		$("#astPT_InLAT").val(InLAT);
		$("#astPT_InLNG").val(InLNG);
		$("#astPT_InCountry").val(InCountry);
		$("#astPT_InCity").val(InCity);
		$("#astPT_InID").val(InID);
		$("#astMOReIMAPsLIST").removeClass("astMORehiders");

		if(fm == "edt")
		{
			$('#updateModal').addClass("astModalHiders");
			
			$("#astPT_InLATO").val(InLAT);
		    $("#astPT_InLNGO").val(InLNG);
		}
		else if(fm == "dlt")
		{
			$('#delModal').css({'margin-top':'-150px','width':'350px','height':'150px','margin-left':'-180px'});
		    $('#delModal').modal("show");
		}
	}
	
	function asHMAOPRtions(evt,id)
	{
		evt.preventDefault();
		let fm        = $(id).attr("fm");
		let InLAT     = $("#astPT_InLAT").val();
		let InLNG     = $("#astPT_InLNG").val();
		let InLATO    = $("#astPT_InLATO").val();
		let InLNGO    = $("#astPT_InLNGO").val();
		let InCountry = $("#astPT_InCountry").val();
	    let InAddress = $("#astPT_InCity").val();
		let InID      = $("#astPT_InID").val();
		let astNOs    = $("#astPT_InArea").val();
		let InPtName  = $("#astPT_InPtName").val();
		
		let astPASS;
		
		if(fm == "edt")
		{
			astPASS   = $("#astPT_PASS").val();
			//astPASS   = ""
		}
		else
		{
			astPASS   = $("#astDT_PASS").val();
		}
		
		
		if(astPASS == "")
		{
			dfAction = "asHMAOPRtions";
			$.ajax({
				url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
				method:'POST',
				data:{fm:fm,InLAT:InLAT,InLNG:InLNG,
				      InCountry:InCountry,InAddress:InAddress,
					  InID:InID,InLATO:InLATO,InLNGO:InLNGO,
					  astNOs:astNOs,InPtName:InPtName,
					  dfAction:dfAction},
				beforeSend:function()
				{
					$("#loading-mask").show("slow");
                    $("#loading").show("slow");	
				},
				success:function(res)
				{
					//$("#loading-mask").hide("slow");
                    //$("#loading").hide("slow");	
					
					if(res == "edt")
					{
						$("#updateSuccessModal h3").html("Updated Successfully");
						$("#astMOReIMAPsLIST").addClass("astMORehiders");
						$('#updateModal').removeClass("astModalHiders");
					}
					else
					{
						$("#updateSuccessModal h3").html("Deleted Successfully");
						$('#delModal').modal('hide');
					}
					
					firstIntail();
					
				}
			});
		}
		else
		{
			if(fm == "edt")
			{
				$("#astPT_PASS").focus();
			}
			else
			{
				$("#astDT_PASS").focus();
			}
		}
	}
	
	function asHMASOPRtion(id)
	{
		let fm      = $(id).attr("fm");
		let fmID    = $(id).attr("id");
		let InPID   = $(id).attr("InPID");
		let astGnos = $(id).attr("astGnos");
		
		    dfAction = "asHMASOPRtion";
		$.ajax({
			url:'<?php echo $smPATH;?>mdReQuests/mdReQPHP/mdReQmaPs.php',
			method:'POST',
			data:{fm:fm,fmID:fmID,InPID:InPID,astGnos:astGnos,dfAction:dfAction},
			beforeSend:function()
			{
				
			},
			success:function(res)
			{
				$("tr.astMOReROWss"+fmID).remove();
			}
		});
		
	}
	
	//////////////////////
	function onMapClick(e)
	{
		newUser.clearLayers();
        let markerLocation = new L.LatLng(e.latlng.lat, e.latlng.lng);
        let marker = new L.Marker(markerLocation);
        newUser.addLayer(marker);
		let lat = e.latlng.lat.toFixed(6);
		let lng = e.latlng.lng.toFixed(6);
		   
		showLatLng(lat,lng); 
	}
	
	function showLatLng(nblat,nblng)
	{
		$("#astPT_InLAT").val(nblat);
		$("#astPT_InLNG").val(nblng);
	}
	
	function initRegistration() 
	{ 		
        map.addEventListener('click', onMapClick);
        $('#map').css('cursor', 'crosshair');
        return false;
	}

    function cancelRegistration() 
	{
        newUser.clearLayers();
        $('#map').css('cursor', '');
        map.removeEventListener('click', onMapClick);
	}
	
	////////////////////////
	function side_menu_hide()
	{
		$("#share-side").hide("slow");
		mVar = false;
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
	
	function astMOReLOADer(LOADING)
	{
		let astMLOADer = '<div class="astMOReLOADer astFLex">'+
				            '<h3>'+LOADING+'</h3>'+
				         '</div>';
		
		return astMLOADer;
	}
	
	///////////////////
	function astMOReIMAPsTA(id)
	{
		let fm = $(id).attr("fm");
		
		if(fm == "start")
		{
			$("#astMOReIMAPsTA").addClass("astMORehiders");
			astMOReIMAPsTAs();
		}
		else if(fm == "close")
		{
			$("#astMOReIMAPsTA").removeClass("astMORehiders");
		}
	}
	
	////////////////////////////
		
	/////////////
	function asHWHOLeMAPlink(id)
	{
		let defURLs,astPaGeUrl,fm,defMAP;
		
		fm     = $(id).attr("fm");
		$("#defaultMAP").val("SHareDMAP");
		defhEADeRsLst();
		aststHEADURls("");
		
		defURLs    = $("#sdefPATHeaders").val();
		astPaGeUrl = encodeURIComponent(defURLs);
		
		if(fm == "wt")
		{
			shareUrl = "https://wa.me/?text=" + astPaGeUrl;
            socialWindow(shareUrl);
		}
		else if(fm == "fb")
		{
			shareUrl = "https://www.facebook.com/sharer.php?u=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		else if(fm == "tw")
		{
			shareUrl = "https://twitter.com/intent/tweet?url=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		else if(fm == "tl")
		{
			shareUrl = "https://me.te/?=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		
	}
	
	function asHMAPlink(id)
	{
		let defURLs,astPaGeUrl,fm,defMAP;
		
		fm     = $(id).attr("fm");
	    $("#defaultMAP").val("SHareDMAP");
		defhEADeRsLst();
		aststHEADURls("");
		
		defURLs    = $("#sdefPATHeaders").val();
		astPaGeUrl = encodeURIComponent(defURLs);
		
		if(fm == "wt")
		{
			shareUrl = "https://wa.me/?text=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		else if(fm == "fb")
		{
			shareUrl = "https://www.facebook.com/sharer.php?u=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		else if(fm == "tw")
		{
			shareUrl = "https://twitter.com/intent/tweet?url=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
		else if(fm == "tl")
		{
			shareUrl = "https://me.te/?=" + astPaGeUrl ;
            socialWindow(shareUrl);
		}
	}
	
	function socialWindow(url) {
        var left = (screen.width - 570) / 2;
        var top = (screen.height - 570) / 2;
        var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
        window.open(url,"NewWindow",params);
	}

    function astMARKerSHARe(id,InCity,InArea,InAddress)
	{
		let defsHARePHOTO,defURLs,defsHAReTTLe,
		    defsHAReDeScRIPTIon,socialmedSum;
	        
	        astdefURLOGos();
		    defsHARePHOTO = $("#astdefURLOGosa").val();
			
		$("#defaultMAP").val("SHareDMAP");
		defhEADeRsLst();
		aststHEADURls("");
		
		defURLs      = $("#sdefPATHeaders").val();
		defsHAReTTLe = $(".mdMAPscountries").val();
		
		
		defsHAReTITLe = "PROPERTY INDEX MAP FOR "+InAddress;
		
		defsHAReDeScRIPTIon = defsHAReTITLe+" ,"+InCity+" ,"+InArea+" ,"+InAddress;
		
		
		const socialmedia = GetSocialMediaSites_WithShareLinks_OrderedByPopularity();
		const socialmediaurls = GetSocialMediaSiteLinks_WithShareLinks({
			  'url':defURLs,
			  'title':defsHAReTITLe,
			  'image':defsHARePHOTO,
			  'desc':defsHAReDeScRIPTIon,
			  'appid':defURLs,
			  'redirecturl':defURLs,
			  'via':defURLs,
			  'hashtags':defURLs,
			  'provider':defURLs,
			  'language':"en",
			  'userid':defURLs,
			  'category':defURLs,
			  'phonenumber':defURLs,
			  'emailaddress':defURLs,
			  'ccemailaddress':defURLs,
			  'bccemailaddress':defURLs,
		});
				
		let children = [];
				
		for(var i = 0; i < socialmedia.length; i++) 
		{
			const socialmedium = socialmedia[i];

            socialmedSum = socialmedium;			
			if(socialmedSum == "telegram.me")
			{
				socialmedSum = "telegram";
			}
			
			if(socialmedium !="skype" && socialmedium !="sms" && socialmedium !="email")
			children.push(
						  
				
					'<button class="indexMAPlink btn astFLex" socialmedium="'+socialmedium+'" id="'+socialmediaurls[socialmedium]+'" onclick="shareThisLinksIconsOpen(this)">'+
						'<i class="fa fa-'+socialmedSum+'"></i>'+
					'</button>'
			);
		}
		
		$(".astMARKerSHAReee"+id).empty();
		$(".astMARKerSHAReee"+id).append(children.join());
		
	    return true;
	}
    
	function shareThisLinksIconsOpen(id)
	{
		let shareUrl = $(id).attr("id");
		
	    shareParams  = "";
	    window.open(shareUrl);
		side_menu_hide();
	}
	    
</script>
    <script type="text/javascript" src="<?php echo $smPATH;?>mdAssets/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	
	<!--
    <script type="text/javascript" src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-3.3.1.min.js"></script>
	<script>
	   $J = $.noConflict(true);
	</script>
	-->
	<input type="hidden" class="reGctvcurrency" value="USD"/>
	<?php
    require_once($reGPdirect.'reGccllPanel/reGcviews/reGctv/reGctvcall.php');	
	//require_once($smPATH.'mdReQuests/mdReTVs/mdJs/mdReQTVJs.php');
	?>
	
	<link type="text/css" rel="stylesheet" href="<?php echo $ccGHdirect;?>ccllPanel/ccllResources/css/ccGmodals0.css" />
	<?php
	require_once($ccGHdirect.'ccllPanel/ccGmodals.php');
	require_once($ccGHdirect.'ccllPanel/ccllControl/ccllJS/cGInitiate.php');
	?>
</body>
</html>