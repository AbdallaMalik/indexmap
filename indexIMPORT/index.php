<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    require_once ('./vendor/autoload.php');
    ini_set('max_execution_time', 8000);
    ini_set('memory_limit','8000M');
    set_time_limit(0);
	
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
	

    
    if (isset($_POST["import"])) {

        $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        if (in_array($_FILES["file"]["type"], $allowedFileType)) {

            $targetPath = 'uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadSheet = $Reader->load($targetPath);
            $excelSheet = $spreadSheet->getActiveSheet();
            $spreadSheetAry = $excelSheet->toArray();
            $sheetCount = count($spreadSheetAry);
  
            $InCNCYName  = "AED";
            $ChckCURRncYs = $stDBexTRas->CheckCURRencYs($InCNCYName);
				
            for ($i = 0; $i <= $sheetCount; $i ++) {
			    $inSource ="";
			    if (isset($spreadSheetAry[$i][0])) {
                    $InSource = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][0]);
				}
				$InLink ="";
			    if (isset($spreadSheetAry[$i][1])) {
                    $InLink = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][1]);
				}
				$InPrice ="";
			    if (isset($spreadSheetAry[$i][2])) {
                    $InPrice = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][2]);
				}
			    $InAddress ="";
			    if (isset($spreadSheetAry[$i][3])) {
                    $InAddress = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][3]);
				}
				$InProjectName ="";
			    if (isset($spreadSheetAry[$i][4])) {
                    $InProjectName = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][4]);
				}
			    $InArea ="";
			    if (isset($spreadSheetAry[$i][5])) {
                    $InArea = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][5]);
				}
			    $InCity ="";
			    if (isset($spreadSheetAry[$i][6])) {
                    $InCity = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][6]);
				}
			    $InCountry  ="";
			    if (isset($spreadSheetAry[$i][7])) {
                    $InCountry = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][7]);
				}
				$InDescription  ="";
			    if (isset($spreadSheetAry[$i][8])) {
                    $InDescription = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][8]);
				}
				$InBEDs  ="";
			    if (isset($spreadSheetAry[$i][9])) {
                    $InBEDs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][9]);
				}
				$InPATHs  ="";
			    if (isset($spreadSheetAry[$i][10])) {
                    $InPATHs = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][10]);
				}
				$InSizeFT  ="";
			    if (isset($spreadSheetAry[$i][11])) {
                    $InSizeFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][11]);
				}
				$InPricePFT ="";
			    if (isset($spreadSheetAry[$i][12])) {
                    $InPricePFT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][12]);
				}
				$InPricePMT ="";
			    if (isset($spreadSheetAry[$i][13])) {
                    $InPricePMT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][13]);
				}
				$InTYPE ="";
			    if (isset($spreadSheetAry[$i][14])) {
                    $InTYPE = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][14]);
				}
				
			    $InLAT  ="";
			    if (isset($spreadSheetAry[$i][15])) {
                    $InLAT = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][15]);
				}
			    $InLNG ="";
			    if (isset($spreadSheetAry[$i][16])) {
                    $InLNG = mysqli_real_escape_string($smCONNECT, $spreadSheetAry[$i][16]);
				}
				
				
				$InCNCYName = "AED";
			    $InKEY      = "";
			    $InSize     = "";
			
			    $InName     = str_replace("\'","'",$InDescription);
				
				
					if(!empty($InPricePFT) && !empty($InPricePMT))
					{
						$InPricePFTa   = $InPricePFT / $ChckCURRncYs;
				        $InPricePMTa   = $InPricePMT / $ChckCURRncYs;
				        $InPricea      = $InPrice / $ChckCURRncYs;
				        $InSizea       = 0.0929 * $InSizeFT;
						if($InKEY == "")
					    {
						    $InKEY = 1;
						}
						
						$InPricePFTa = round($InPricePFTa,3);
						$InPricePMTa = round($InPricePMTa,3);
						$InPricea    = round($InPricea,3);
						$InSizea     = round($InSizea,3);
						
					$tvs = " InID ";
					$tbs = " tb_indexmaz ";
					$tws = " AND InLAT='$InLAT' 
							 AND InLNG='$InLNG' 
							 AND InProjectName='$InProjectName'
							 AND InAddress='$InAddress' 
							 AND InSizeFT='$InSizeFT' 
							 AND InPricePFT='$InPricePFTa' ";
							 
					$CheckDATas = $stDBss->CheckDATA($tvs,$tbs,$tws);
					if(mysqli_num_rows($CheckDATas) > 0)
					{
						$type = "exist data";
                        $message = "not inserted";
					}
					else
					{
						$tv = " tb_indexmaz (InName,InCountry,InCity,InArea,InAddress,InSize,InSizeFT,
					                     InPrice,InPricePFT,InPricePMT,InLAT,InLNG,InProjectName,
										 InCNCYName,InTYPE,InSource,InLink,InKEY) ";
					    $ts = " VALUES('$InName','$InCountry','$InCity','$InArea','$InAddress','$InSizea','$InSizeFT',
					               '$InPricea','$InPricePFTa','$InPricePMTa','$InLAT','$InLNG','$InProjectName',
								   '$InCNCYName','$InTYPE','$InSource','$InLink','$InKEY') ";
					    $tb = $tv.$ts;
					    $CreateDATA = $stDBss->CreateDATA($tb);
					    if($CreateDATA)
					    {
						    $type = "success";
                            $message = "Excel Data Imported into the Database";
						}
					    else
					    {
						    $type = "error";
                            $message = "not inserted";
						}
						
					}
						
					}
						   
				
            }
			
		} 
		else 
		{
            $type = "error";
            $message = "Invalid File Type. Upload Excel File.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link href='<?php echo $smURLPARENt;?>GAssets/Amap/css/style-starter-st.css' rel='stylesheet' type='text/css'>
<script src="<?php echo $smURLPARENt;?>GAssets/Amap/js/jquery-3.3.1.min.js"></script>
<style>
body {
	font-family: Arial;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
	width:100%;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
	padding: 5px 20px;
	font-size: 0.9em;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}
</style>
</head>

<body>
  
    <div class="container">
        <h2>Import Excel File into MySQL Database using PHP</h2>
        <div class="row">
            <div class="outer-container col-md-12">
			    <?php 
				/*
				$InAddrss = "Beach Isle Tower 1 (Beach Isle, Emaar Beachfront, Dubai Harbour)";
				
				$ffset         = 0;
				$InLen         = strlen($InAddrss);
				
				if(strpos($InAddrss,"(") !==false)
				{
					$ffset         = strpos($InAddrss,"(",$ffset+1);
					$InProjectName = substr($InAddrss,0,$ffset);
				    $InAddress     = str_replace(")","",substr($InAddrss,$ffset + 1,$InLen - 1));
				    $InArea        = $InAddress;
				}
				else if(strpos($InAddrss,",") !==false)
				{
					$ffset         = strpos($InAddrss,",",$ffset+1);
					$InProjectName = substr($InAddrss,0,$ffset);
				    $InAddress     = substr($InAddrss,$ffset + 1,$InLen);
				    $InArea        = $InAddress;
				}
				
				
				echo "InProjectName:".$InProjectName."<br>";
				echo "InAddress:".$InAddress."<br>";
				echo "InArea:".$InArea."<br>";
				*/
				?>
                <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div>
                        <label>Choose Excel File</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
                        <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                    </div>
                </form>
            </div>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>


            <?php
			$tv  = " * ";
			$tb  = " tb_indexmaz ";
			$stw = " ORDER BY InCreatedOn DESC LIMIT 3 ";
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
	
</body>
</html>