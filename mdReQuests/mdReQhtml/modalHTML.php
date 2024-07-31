<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$smURLPATH    = $stDBCONST->getsmURLPATH();
	$smURLPARENt  = $stDBCONST->getsmURLPARENt();

	$mdDURLoGo  = $smURLPARENt."GAssets/icons/my-profile.png";
	
	$mdGDate    = date("Y-m-d");
	$mdGTDate   = date("Y-m-d H:i:s");
	
    $mdSUSerID   = 0;
	$mdSUSerName = "";
	$mdSUSerMail = "";
	$mdSUSerTYPE = "";
	
	$mdGVUsion  = $stDBCONST->getmdVUsion("mdUser");
	if($mdGVUsion != "false")
	{
		$mdSUSerID   = $mdGVUsion['ID'];
		$mdSUSerName = $mdGVUsion['display_name'];
		$mdSUSerMail = $mdGVUsion['user_email'];
		$mdSUSerTYPE = $mdGVUsion['is_user_type'];
	}
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	require_once($smPATH.'mdReQuests/mdReTVs/mdPHP/mdReQueries.php');
	
	if(isset($_POST['tfm']))
	{
		$tfm    = $_POST['tfm'];
		$mdResults = "";
		
		if($tfm == "modalHTML")
		{
			$tmd    = $_POST['tmd'];
		    $tmodal = $_POST['tmodal'];
			if($tmd == "mdProlist")
			{
				?>
				<div class="modal-header astFlex">
				    <div class="mheader-left astFlex">
					</div>
					<a href="javascript:void(0)" class="btn mdZoomOUTtn" modal="mdPROPertiesmodal" fm="modalHTML" md="mdProlist" onclick="mdPROPclose(this)">
			            <i class="fa fa-close"></i>
			        </a>
				</div>
				<div class="modal-body">
				    <div class="mdProlist astFlex">
					    
					</div>
					
					<div class="mdPROPiimlists" id="mdPROPiimlists">
					    <div class="mdPROPcontent">
						</div>
					</div>
					
				</div>
				<div class="modal-footer astFlex">
				    <div class="mdLOADmores astFlex">
					    <a href="javascript:void(0)" class="mdLOADmore mdITEMsmore"
						    tfm="<?php echo $tfm;?>" 
						    tmd="<?php echo $tmd;?>" 
						    tmodal="<?php echo $tmodal;?>"
							tmID=""
							tKind="items"
							onclick="mditLOADmore(this)">
						    more
					    </a>
				    </div>
				</div>
				<?php
				exit();
			}
			
			if($tmd == "mdPROPlist")
			{
				$tmOFFs   = $_POST['tmOFFset'];
				$tmROWs   = $_POST['tmROWs'];
				
				$tmOFFset = ($tmOFFs - 1) * $tmROWs;
				
				$mdWHeRs  = "";
				$mdtotals = mdITeMcounts($mdWHeRs);
	
				?>
				<input type="hidden" id="mdITEMStotals" value="<?php echo $mdtotals;?>">
				<div class="mdPROPlist astFlex">
				    <?php 
					$tBLe  = " tb_properties 
							   LEFT JOIN tb_users_properties 
							   ON tb_properties.id = tb_users_properties.pro_id 
							   AND tb_properties.owner_id = tb_users_properties.user_id";
				    $tVLUe = " * ";
				                    
					$tWHRe = " AND tb_properties.id = tb_users_properties.pro_id 
							   AND tb_properties.owner_id = tb_users_properties.user_id";
									
					$tORDer = " ORDER BY tb_properties.id DESC 
		                        LIMIT $tmOFFset,$tmROWs ";		
				
				    $tWHRes = $tWHRe.$tORDer;
				    $mdQuery = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
					if(mysqli_num_rows($mdQuery)> 0)
					{
						foreach($mdQuery as $mdROWs)
						{
							$mdPUSer      = $mdROWs['user_id'];
			                $mdPROID      = $mdROWs['id'];
			                $mdPCategory  = $mdROWs['pro_category'];
			                $mdPTYPe      = $mdROWs['pro_type'];
			                $mdPStatus    = $mdROWs['pro_status'];
			                $mdPCountry   = $mdROWs['pro_country'];
			                $mdPName      = $mdROWs['title'];
			                $mdPDesc      = $mdROWs['description'];
			                $mdPSize      = $mdROWs['size'];
			                $mdPsizeTYPE  = $mdROWs['sizeTYPE'];
			                $mdPRooms     = $mdROWs['rooms'];
			                $mdPBath      = $mdROWs['paths'];
			                $mdPBeds      = $mdROWs['beds'];
			                $mdPkitchens  = $mdROWs['kitchens'];
			                $mdPPrice     = $mdROWs['price'];
			                $mdPState     = $mdROWs['state'];
			                $mdPCity      = $mdROWs['city'];
			                $mdPAddress   = $mdROWs['address'];
							
							$mdimUrl      = dhPROtYMAInPhoto($mdPROID,"property","property","thump");
							?>
							<div class="mdPROPitems astFlex" id="mdPROPiPtems<?php echo $mdPROID;?>">
							    <div class="mdPROPiPhoto astFlex">
								    <a href="javascript:void(0)" class="astFlex mdPROPiurl" 
									    fm="modalHTML" md="mdPROPiims" modal="mdPROPiimlists" id="<?php echo $mdPROID;?>" 
										onclick="mdSHOWPROs(this)">
										<i class="fa fa-edit"></i>
									    <img src="<?php echo $mdimUrl;?>">
									</a>
								</div>
								<div class="mdPROPidetails astFlex">
								    <h1 class="astFlex">
									    <?php echo $mdPName;?>
									</h1>
									<div class="mdPROPidets astFlex">
									    <div>
										    <span>size</span>
										    <p><?php echo $mdPSize;?></p>
										</div>
										<div>
										    <span>Rooms</span>
										    <p><?php echo $mdPRooms;?></p>
										</div>
										<div>
										    <span>beds</span>
										    <p><?php echo $mdPBeds;?></p>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					else
					{
						
					}
									
					?>
					
				</div>
				
				<?php
				
				exit();
			}
			
			if($tmd == "mdPROPiims")
			{
				$tmID = $_POST['tmID'];
				
				?>
				<div class="mdPROPheader astFlex">
				    <div class="mheader-left astFlex">    
					    <label class="mmdPROPlinks astFlex btn" for="mdUPloadNZone">	                
							<input type="file" class="astDnone mdUPloadNZone mdVALUeReset" id="mdUPloadNZone"
								   fm="modalPHP" mdact="add" 
								   modal="<?php echo $tmodal;?>" 
								   md="<?php echo $tmd;?>" mdKnd="mdzone"
                                   tmID="<?php echo $tmID;?>"			   
								   onchange="mdPROPiims(event,this)"
								   name="mdUPloadNZone" multiple>
							<i class="fa fa-image"></i>
							<i class="fa fa-plus"></i>
							<div class="mdUPloadPRoGress">
							</div>
			            </label>
					</div>
					<a href="javascript:void(0)" class="btn mdZoomOUTtn" modal="<?php echo $tmodal;?>" fm="modalHTML" md="<?php echo $tmd;?>" onclick="mdPROPclose(this)">
			            <i class="fa fa-close"></i>
			        </a>
				</div>
				
				<div class="mdPROPbody">
				<div class="mdPROPimlist astFlex">
                
				</div>
				</div>
				<div class="mdPROPfooter astFlex">
				    <div class="mdLOADmores astFlex">
					    <a href="javascript:void(0)" class="mdLOADmore mdIMAGEsmore"
						    tfm="<?php echo $tfm;?>" 
						    tmd="<?php echo $tmd;?>" 
						    tmodal="<?php echo $tmodal;?>"
							tmID="<?php echo $tmID;?>"
							tKind="images"
							onclick="mditLOADmore(this)">
						    more
					    </a>
				    </div>
				</div>
				<?php
				exit();
			}
			
			if($tmd == "mdPROPimlist")
			{	
				$tmID     = $_POST['tmID'];
				$tmOFFs   = $_POST['tmOFFset'];
				$tmROWs   = $_POST['tmROWs'];
				
				$tmOFFset = ($tmOFFs - 1) * $tmROWs;

				$mdImRURL  = $smURLPARENt."homes/hAssets/images/bg_pattern_pro.png";
				$tVLUe  = " image_id,image_url,image_status ";
		        $tBLe   = " tb_properties_images ";
		        $tWHRes = " AND image_parent_id='$tmID' 
		                    AND image_meta='property' 
					        AND (image_status='gallery' OR 
							     image_status='thump')
					        ORDER BY image_date DESC 
							LIMIT $tmOFFset,$tmROWs ";
				
                $mdWHeRs  = " AND image_parent_id='$tmID' 
		                      AND image_meta='property' 
					          AND (image_status='gallery' OR 
							       image_status='thump') ";
				$mdtotals = mdIMAGEcounts($mdWHeRs);
				
				?>
				<input type="hidden" id="mdIMAGEStotals" value="<?php echo $mdtotals;?>">
				<?php
 				
                $mdQuerY = $stDBss->CheckDATA($tVLUe,$tBLe,$tWHRes);
                if(mysqli_num_rows($mdQuerY)> 0)
				{
					foreach($mdQuerY as $mdROWs)
					{
						$mdImURL = $mdROWs['image_url'];
						$mdImID  = $mdROWs['image_id'];
						$mdImST  = $mdROWs['image_status'];
						$mdImURL = $smURLPARENt.$mdImURL;
						if(@getimagesize($mdImURL))
						{
							$mdImRURL = $mdImURL;
						}
						
						$mdImSTclass = "";
						$mdImSTtitle = '<i class="fa fa-trash"></i>';
						if($mdImST == "thump")
						{
							$mdImSTclass = "mdImSTclass";
							$mdImSTtitle = '<span class="mdImSTtitle">featured image</span>
							                <i class="fa fa-edit"></i>';
						}
							
						?>
						<div class="mdPROPitems <?php echo $mdImSTclass;?> astFlex" id="mdPROPitems<?php echo $mdImID;?>">
							<div class="mdPROPiPhoto astFlex">
								<a href="javascript:void(0)" class="astFlex mdPROPiurl mdPROPiurl1">
									<?php echo $mdImSTtitle;?>
									
									<div class="mdPROPireurl">
									    <div class="mdPROPiremurl astFlex">
										<?php 
										if($mdImST == "thump")
										{
											?>
											<label class="mmdPROPlinks astFlex btn" for="mdUPloadFNZone">	                
							                    <input type="file" class="astDnone mdUPloadFNZone mdVALUeReset" id="mdUPloadFNZone"
								                    fm="modalPHP" mdact="edt" 
								                    modal="<?php echo $tmodal;?>" 
								                    md="mdPROPiims" 
													mdKnd="mdfeatured"
                                                    tmID="<?php echo $mdImID;?>"			   
								                    onchange="mdPROPiims(event,this)"
								                    name="mdUPloadFNZone" multiple>
							                      
							                        <i class="fa fa-edit"></i>
							                        
													<div class="mdUPloadPRoGress">
							                        </div>
			                                </label>
										    <?php 
										}
										?>
									        <button class="btn" fm="modalPHP" 
										        md="mdPROPiims" mdact="remove" 
											    modal="mdPROPiimlists" id="<?php echo $mdImID;?>" 
									            onclick="mdSHOWPROs(this)">
										        <i class="fa fa-trash"></i>
										    </button>
										    <button class="btn" fm="modalPHP" 
										        md="mdPROPiims" mdact="expand" 
											    modal="mdPROPiimlists" id="<?php echo $mdImID;?>" 
									            onclick="mdSHOWPROs(this)">
										        <i class="fa fa-expand"></i>
										    </button>
										</div>
									</div>
									
									<img src="<?php echo $mdImRURL;?>" class="mdImRURL">
								</a>
							</div>
						</div>		
						<?php
					} 
				}
			   
                exit();			   
			}
			
		}
	}
	else
	{
		echo "error";
		exit();
	}



?>