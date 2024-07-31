<?php require_once('../../mdDB/astinit.php');
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    require_once ('../vendor/autoload.php');
    ini_set('max_execution_time', 8000);
    ini_set('memory_limit','8000M');
    set_time_limit(0);
	
    $smPATH = "../../";
    require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smURLPARENt   = $stDBCONST->getsmURLPARENt();
	if(isset($_GET['tOaction']))
	{
		$tOaction = $_GET['tOaction'];
		if($tOaction == "load")
		{
			$tOactionVs = $_POST['tOaction'];
			$tOamaPVs   = $_POST['tOamaP'];
			$tOfileVs   = $_POST['tOfile'];
			
			if($tOactionVs == "import")
			{
				
				?>
				<div class="astBZBODYeimport">
		            <div class="row">
		                <div class="col-lg-12 defmANiPULchooses astFLex">
						    <div class="defmANiPULchoose astFLex">
								<div class="astFLex">
								    <input id="defmANiPULchoose" type="button" class="astFLex btn" value="choose files">
								    <input id="defmANiPULchooseName" type="hidden" value="0">	
									<input id="defmANiPULchooseNo" type="hidden" value="0">	
								</div>
								<div class="astFLex">
									<input id="defmANiPULuPload" type="button" class="astFLex btn" value="UPLOAD">
								</div>	
							</div>	
								
                            <div id="filelist" class="row astFLex">
							    <div></div>
							</div> 
								
							<div id="uPloadPRogresns" class="row astFLex"></div> 
						</div>
		            </div>
		        </div>
				<?php
				exit();
			}
			if($tOactionVs == "stUPLOADFiles")
			{
				
				$counter = 0;
		        if (empty($_FILES) || $_FILES["file"]["error"]) {
                    verbose(0, "Failed to move uploaded file.");
				}

				$filePath = __DIR__ . DIRECTORY_SEPARATOR . "uploads";
                if (!file_exists($filePath)) 
		        { 
	                if (!mkdir($filePath, 0777, true))
		            {
                        verbose(0, "Failed to create $filePath");
					}
				}
				
				////////////
				$fileName  = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
		        $filenames = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
                $filePath  = $filePath . DIRECTORY_SEPARATOR . $fileName;
      
	            $basename    = explode(".",$filenames);
		        $basename    = $basename[0];
		        // (D) DEAL WITH CHUNKS
                $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
                $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		
		
                $out = @fopen("{$filePath}_".$chunk."txt", $chunk == 0 ? "wb" : "ab");
			
			    if ($out) 
		        {
			
                    $in = @fopen($_FILES["file"]["tmp_name"], "rb");
                    if ($in) 
			        { 
		                while ($buff = fread($in, 4096)) 
				        { 
			                fwrite($out, $buff); 
						} 
					}
                    else 
			        { 
		                verbose(0, "Failed to open input stream"); 
					}
                    @fclose($in);
                    @fclose($out);
			       //@fclose($handle);
                   @unlink($_FILES["file"]["tmp_name"]);
			       rename("{$filePath}_".$chunk."txt", "uploads/".$basename."_".$chunk.".txt"); 
				} 
		        else 
		        { 
	                verbose(0, "Failed to open output stream"); 
				}
				
				if (!$chunks || $chunk == $chunks - 1) 
		        { 
	                rename("{$filePath}.part", $filePath); 
				}
                verbose(1, "Upload OK");
				echo $filePath;
				exit();
			}
		}
	}
?>