<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
	
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	$smURLPATH  = $stDBCONST->getsmURLPATH();
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['dfAction']))
	{
		$dfAction  = $_POST['dfAction'];
		$mdResults = "";
		
		if($dfAction == "mdTBLehtml")
		{
			$mdMAPscurrencY  = $_POST['mdMAPscurrencY'];
			$mdMAPscuncYVLUe = $_POST['mdMAPscuncYVLUe'];
			?>
			
			    <div class="astFLex mdDTLIMITation">
                    <label class="astFLex">
						limit
                    </label>						
					<input type="number" name="mdMAPSelmorestb_length" aria-controls="mdMAPSelmorestb"
						   value="5" placeholder="LIMIT NUMBER" class="astFLex mdDTLimits"
						   onkeyup="mdDTLIMITations(event,this)">
					<a href="javascript:void(0)" class="astFLex btn" fm="mdLMt" onclick="mdDTLIMITton(this)">
						<span class="">Done</span>
					</a>
				</div>
			
			    <table class="display stripe table-hover mdMAPSelmorestb nowrap" id="mdMAPSelmorestb">
				    <thead>
					    <tr>
						    <th class="mdsearchLstnone"><div>OPtions</div></th>
						    <th><div>ID</div></th>
						    <th><div>Country</div></th>
							<th><div>City</div></th>
							<th><div>District</div></th>
							<th><div>Area</div></th>
							<th><div>Address</div></th>
							<th><div>Building</div></th>
							<th><div>P.Name</div></th>
							<th><div>PurPose</div></th>
							<th><div>Type</div></th>
							<th><div>Price <i class="mdTBPRchanage mdTBPRchanages"><?php echo $mdMAPscurrencY;?></i></div></th>
							<th><div><i class="mdTBPRchanage mdTBPRchanages"><?php echo $mdMAPscurrencY;?></i>P <i class="mdTBPRchanages">mt^2</i></div></th>
							<th><div><i class="mdTBPRchanage mdTBPRchanages"><?php echo $mdMAPscurrencY;?></i>P <i class="mdTBPRchanages">ft^2</i></div></th>
							<th><div>size <i class="mdTBPRchanages">mt</i></div></th>
							<th><div>size <i class="mdTBPRchanages">ft</i></div></th>
							<th><div>Beds</div></th>
							<th><div>Baths</div></th>
							<th><div>Source</div></th>
							
						</tr>
					</thead>
					
					<tfoot class="mdTBsearch">
					    <tr>
						    <th class="mdsearchLstnone">OPtions</th>
						    <th>ID</th>
						    <th>Country</th>
							<th>City</th>
							<th>District</th>
							<th>Area</th>
							<th>Address</th>
							<th>Building</th>
							<th>P.Name</th>
							<th>PurPose</th>
							<th>Type</th>
							<th>Price</th>
							<th>P mt^2</th>
							<th>P ft^2</th>
							<th>size mt</th>
							<th>size ft</th>
							<th>Beds</th>
							<th>Baths</th>
							<th>Source</th>
						</tr>
					</tfoot>
				</table>
				
			<script>
			    $(document).ready(function(e)
				{
					$.extend(true, $.fn.dataTable.defaults.oLanguage.oPaginate,{
			            sNext: '<i class="fa fa-chevron-right"></i>',
			            sPrevious: '<i class="fa fa-chevron-left"></i>',
					});
		
		            $('#mdMAPSelmorestb tfoot th').each(function () {
                        mdtitle = $(this).text();
                        $(this).html(' <input type="text" class="form-control" placeholder="' + mdtitle + '" />');
					});
				})
			</script>
			
			
			<!--
            <script src="<?php echo $smURLPATH;?>assets/btns/buttons-1.7.1/js/dataTables.buttons.min.js"></script>
	        <script src="<?php echo $smURLPATH;?>assets/btns/JSZip-2.5.0/jszip.min.js"></script>
	        <script src="<?php echo $smURLPATH;?>assets/btns/pdfmake-0.1.36/pdfmake.min.js"></script>
	        <script src="<?php echo $smURLPATH;?>assets/btns/buttons-1.7.1/js/buttons.html5.min.js"></script>
	        <script src="<?php echo $smURLPATH;?>assets/btns/buttons-1.7.1/js/buttons.print.min.js"></script>
	        
	        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
            -->
          		
			<?php
			
			exit();
		}
	}
	
?>	