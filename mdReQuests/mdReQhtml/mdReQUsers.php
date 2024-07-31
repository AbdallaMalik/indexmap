<?php require_once('../../mdDB/astinit.php');
      
	$smPATH = "../../";

	set_time_limit(0);
	ini_set('max_execution_time', 20000);
    //ini_set('memory_limit','8000M');
    
	require_once($smPATH.'mdDB/stDBss.php');
    $stDBss     = new stDBss();
	$stDBexTRas = new stDBexTRas();
	$stDBCONST  = new stDBCONST();
	$smCONNECT  = $stDBss->getsmCONNECT();
	
	$mdSUSerID  = 0;
	
	$mdGVUsion  = $stDBCONST->getmdVUsion("mdUser");
	if($mdGVUsion != "false")
	{
		$mdSUSerID = $mdGVUsion['ID'];
	}
	//tb_IndexmaPs_meta
	//$mdTBconnct = $stDBss->mdTBconnect("root","bsV@1234Vsb","cclub_agents_club");
	//$mdTBconnct = $stDBss->mdTBconnect("cllubb_bright","bright@91mD#5","cllubb_agents_club");
	
	require_once($smPATH.'mdReQuests/mdReQPHP/mdQueries.php');
	
	if(isset($_POST['mdAction']))
	{
		$mdAction  = $_POST['mdAction']; 
		
		if($mdAction == "mdReG")
		{
			$md = $_POST['md'];
			
			if($md == "accessTAB")
			{
				?>
				<form class="astFLex mdUsROPTionscntnr mdUseRAFORmAction">
				    <input type="hidden" value="access" name="md">
					<input type="hidden" value="mdUseRAFORmAction" name="mdclass">
					<input type="hidden" value="mdReGPHP" name="mdAction">
					
					<div class="astFLex mdUsROPPTinPuts">
						<input type="text" placeholder="email" class="mdUsROPTinPuts mdUsrNOnull mdUserMAIL" name="mdUserMAIL">
						<input type="password" autocomplete="false"  placeholder="password" class="mdUsROPTinPuts mdUsrNOnull mdUserPAss" name="mdUserPAss">
					</div>
								
					<div class="astFLex mdUsROPPTLnk">
						<label class="astFLex">
							<input type="checkbox" class="mdUsROPTinPcheck" 
								md="remember" onclick="mdUseRAction(event,this)">
								
								<span> Remember me ?</span>
						</label>
						<a href="javascript:void(0)" class="btn mdUsROPTLnk astFLex"
							md="access" onclick="mdUseRAction(event,this)" 
							mdAction="mdReGPHP" mdclass="mdUseRAFORmAction">
							
							<span>submit</span>
						</a>
					</div>
								
				</form>
				<?php
				exit();
			}
			
			if($md == "createTAB")
			{
				$mdPROUserTass  = mdPROUserTass("users","user",0,"Agent","mdUserTYPe");
				$mdPROcountries = mdPROcountries("UAE","mdUserCountrY");
				?>
				<form class="astFLex mdUsROPTionscntnr mdUseRCFORmAction">
				    <input type="hidden" value="create" name="md">
					<input type="hidden" value="mdUseRCFORmAction" name="mdclass">
					<input type="hidden" value="mdReGPHP" name="mdAction">
					
					<div class="astFLex mdUsROPPTinPuts">
						<select class="mdUsROPTinPuts mdUserTYPe mdUsrNOnull" name="mdUserTYPe">
						<?php
						echo $mdPROUserTass;
						?>
						</select>
						<input type="email" placeholder="email" class="mdUsROPTinPuts mdUserMAIL mdUsrNOnull" name="mdUserMAIL">
									
						<input type="password" autocomplete="false" placeholder="password" class="mdUsROPTinPuts mdUserPAss mdUsrNOnull" name="mdUserPAss">
						<input type="text" placeholder="first name" class="mdUsROPTinPuts mdUserFName mdUsrNOnull" name="mdUserFName">
									
						<input type="text" placeholder="last name" class="mdUsROPTinPuts mdUserLName mdUsrNOnull" name="mdUserLName">
						<input type="text" placeholder="nicename" class="mdUsROPTinPuts mdUserName mdUsrNOnull" name="mdUserName">
									
						<input type="hidden" placeholder="registration way" value="mdIndex" class="mdUsROPTinPuts mdUserRewaY" name="mdUserRewaY">
						<select class="mdUsROPTinPuts mdUserCountrY mdUsrNOnull" name="mdUserCountrY">
						<?php 
						echo $mdPROcountries;
						?>
						</select>
						<input type="text" placeholder="city" class="mdUsROPTinPuts mdUserCitY" name="mdUserCitY">
						<input type="text" placeholder="address" class="mdUsROPTinPuts mdUserAddress" name="mdUserAddress">
					</div>
					
					<div class="astFLex mdUsROPPTLnk">
						<label class="astFLex">
							<input type="checkbox" class="mdUsROPTinPcheck" 
								md="remember" onclick="mdUseRAction(event,this)">
								
								<span> Remember me ?</span>
						</label>
						<a href="javascript:void(0)" class="btn mdUsROPTLnk astFLex"
							md="create" onclick="mdUseRAction(event,this)" 
							mdAction="mdReGPHP" mdclass="mdUseRCFORmAction">
							
							<span>submit</span>
						</a>
					</div>

					<div class="astFLex mdUsROPRefooter">
					    <label class="">By creating an account agreeing</label>
					    <div>
							<a href="javascript:void(0)">
								Terms of Service   
							</a> And  	
					        <a href="javascript:void(0)">  
								Privacy Policy
							</a>
						</div>	
					</div>
								
					<script>
			        $(".mdUserTYPe").val("Agent");
					$(".mdUserCountrY").val("UAE");
                    </script>
				</form>	
				<?php
				exit();
			}
			
			if($md == "activateTAB")
			{
				?>
				<form class="astFLex mdUsROPTionscntnr mdUseRACFORmAction">
				    <input type="hidden" value="activate" name="md">
					<input type="hidden" value="mdUseRACFORmAction" name="mdclass">
					<input type="hidden" value="mdReGPHP" name="mdAction">
				
					<div class="astFLex mdUsROPPTinPuts">
						<input type="text" placeholder="verification code" class="mdUsROPTinPuts mdUsrNOnull mdUserCode" name="mdUserCode">
					</div>
								
					<div class="astFLex mdUsROPPTLnk">
						<label class="astFLex">
							<input type="checkbox" class="mdUsROPTinPcheck" 
								md="remember" onclick="mdUseRAction(event,this)">
								
								<span> Remember me ?</span>
						</label>
						<a href="javascript:void(0)" class="btn mdUsROPTLnk astFLex"
							md="activate" onclick="mdUseRAction(event,this)" 
							mdAction="mdReGPHP" mdclass="mdUseRACFORmAction">
							
							<span>activate</span>
						</a>
					</div>
								
				</form>
				<?php
				exit();
			}
		}

		if($mdAction == "mdPRohtml")
		{
			
			$md = $_POST['md'];
			if($md == "mdnew")
			{
				$mdPROcountrs = mdPROcountries("UAE","mdInPRoCountry");
				?>
				        <div class="astFLex mdTBLePOPUPheader">
						    <h4> New Project </h4>
						</div>
					    <form class="astFLex mdActcontainer mdPROFORmtoAction" id="mdTBLePOPUPform">
						    <input type="hidden" value="mdPRcode" name="mdAction">
							<input type="hidden" value="mdsave" name="md">
							<input type="hidden" value="0" name="mdInPRoKeY">
							<input type="hidden" value="0" name="mdInPRocomm">
							
							<div class="astFLex mdAVLesection">
						    
							    <div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">Title</label>
							        <input type="text" placeholder="Title"
								        value="" 
									    class="mdAVLeINPut mdVLeNOtNull mdInPRoName mdVALUeReset" name="mdInPRoName">
						        </div>
								<div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">Description</label>
							        <input type="text" placeholder="Description" 
								        value="" 
									    class="mdAVLeINPut mdInPRoDesc mdVALUeReset" name="mdInPRoDesc">
						        </div>
								<div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">Type</label>
							        <input type="text" placeholder="type" 
								        value="" 
									    class="mdAVLeINPut mdVLeNOtNull mdInPRoKnd mdVALUeReset" name="mdInPRoKnd">
						        </div>
								<div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">status</label>
							        <select class="mdAVLeINPut mdVLeNOtNull mdInPRostatus mdVALUeReset" name="mdInPRostatus">
									    <option value="active">active</option>
										<option value="not active">not active</option>
									</select>	
						        </div>
								
								<div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">Country</label>
								    <select class="mdAVLeINPut mdVLeNOtNull mdInPRoCountry" name="mdInPRoCountry">
									<?php echo $mdPROcountrs;?>
								    </select>	
						        </div>
								
							    <script>
                                $(".mdInPRoCountry").val("UAE");
                                </script>
								
							    <div class="astFLex mdAVLecontainer">
						            <label class="mdAVLeLABeL">City</label>
							        <input type="text" placeholder="City" 
								        value="" 
									    class="mdAVLeINPut mdVLeNOtNull mdInPRoCity mdVALUeReset" name="mdInPRoCity">
						        </div>
							
							</div>
						</form>
						<div class="astFLex mdTBLePOPUPfooter">
						    <a href="javascript:void(0)" class="btn mdGlnk astFLex"
							    mdAction="mdPRcode" md="mdsave" mdID="" onclick="mdPROJecTAction(this)">
							    <i class="fa fa-check"></i>
								<span>save</span>
							</a>
							<a href="javascript:void(0)" class="btn mdGlnk astFLex"
							    mdAction="mdPRclose" md="mdclose" mdID="" onclick="mdPROJecTAction(this)">
							    <i class="fa fa-close"></i>
								<span>Close</span>
							</a>
						</div>
					
				
				<?php
				exit();
			}
			
			if($md == "mdPROsearch")
			{
				
				$mdVALUe = $_POST['mdVALUe'];
				
				$tb = " tb_projects ";
				$tv = " projectId, projectName ";
				$tw = " AND (projectName LIKE '%$mdVALUe%' OR projectDesc LIKE '%$mdVALUe%') 
				        AND projectOwner='$mdSUSerID' ";
				
				$mdQuery = $stDBss->CheckDATA($tv,$tb,$tw);
				if(mysqli_num_rows($mdQuery) > 0)
				{
					$mdROWs = mysqli_fetch_assoc($mdQuery);
					$mdPRID = $mdROWs['projectId'];
					$mdName = $mdROWs['projectName'];
					?>
					<li class="astFLex">
						<a href="javascript:void(0)" class="astFLex"
							mdAction="<?php echo $mdAction;?>" 
							md="<?php echo $md;?>" 
							mdVALUe="<?php echo $mdName;?>" 
							mdID="<?php echo $mdPRID;?>" 
							onclick="mdPROJecTCLksrch(this)">
							<span><?php echo $mdName;?></span>
						</a>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="astFLex">
						<a href="javascript:void(0)" class="astFLex"
							mdAction="<?php echo $mdAction;?>" 
							md="<?php echo $md;?>" 
							mdVALUe="" 
							mdID="" 
							onclick="mdPROJecTCLksrch(this)">
							<span>no mtach results</span>
						</a>
					</li>
					<?php
				}
				
				exit();
			}
		}
	}

?>